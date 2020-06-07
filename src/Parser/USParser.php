<?php

/*
 * This file is part of michaelbutler/where2.
 * Source: https://github.com/michaelbutler/where2
 *
 * (c) Michael Butler <michael@butlerpc.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file named LICENSE.
 */

namespace Where2\Parser;

use Where2\Data\UnitedStates;
use Where2\ParsedAddress;
use Where2\ParserInterface;
use Where2\Where2Exception;

class USParser implements ParserInterface
{
    /** @var array Options array to change the behavior of this parser. */
    private $options;

    /** @var int Textual position of the state in the address. Internal use only. */
    private $statePosition;

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * @throws Where2Exception when there was an error in parsing
     */
    public function parse(string $inputAddress): ParsedAddress
    {
        $upperCaseAddress = strtoupper(trim($inputAddress, ",. \t\n\r\0\x0B"));
        $address = new ParsedAddress();
        $address->setRawData($upperCaseAddress);
        [$postalCode, $postalCodeExtra, $fullCode] = $this->findPostalCode($upperCaseAddress);

        if (!$postalCode) {
            throw new Where2Exception('Postal code not found', 1);
        }

        $secondHalf = $this->secondHalfOfString($upperCaseAddress);
        $state = $this->findStateCode($secondHalf, $upperCaseAddress) ?:
            $this->findStateCode($upperCaseAddress, $upperCaseAddress);

        if (!$state) {
            throw new Where2Exception('State information not found', 2);
        }

        $address->setPostalCode($postalCode)
            ->setPostalCodeExtra($postalCodeExtra)
            ->setRegion($state)
        ;

        $nameStreetCity = substr($upperCaseAddress, 0, $this->statePosition);
        $nameStreetCity = rtrim($nameStreetCity, ",. \t\n\r\0\x0B");

        $pieces = preg_split("/[,\n]/", $nameStreetCity);

        $houseNumber = $this->getHouseNumber($pieces);

        $address->setHouseNumber($houseNumber);

        $city = trim(array_pop($pieces), ', ');

        $address->setCity($city);

        $addressLine = array_pop($pieces);

        $address->setAddressLine1($addressLine);

        $address->setRawData($inputAddress);

        return $address;
    }

    /**
     * @return array Returns list of [$postalCode, $postalCodeExtra, $fullCode]
     */
    private function findPostalCode(string $inputAddress): array
    {
        $matches = [];
        preg_match_all('~([\d]{5})(-[\d]{4})?~', $inputAddress, $matches);

        $code = '';

        if (isset($matches[0]) && count($matches[0]) > 0) {
            // Use the LAST found code, so we don't grab the house number.
            $code = array_pop($matches[0]);
        }

        if (!$code) {
            return [
                '',
                '',
                '',
            ];
        }

        $parts = explode('-', $code);

        return [
            $parts[0] ?? '',
            $parts[1] ?? '',
            $code,
        ];
    }

    private function findStateCode(string $addressChunk, string $fullAddress): string
    {
        // Find all 2 char codes
        $matches = [];
        preg_match_all('/\b[A-Z]{2}\b/', $addressChunk, $matches);

        if (isset($matches[0])) {
            // take the state code farthest to end of string
            $stateCode = array_pop($matches[0]);

            $this->statePosition = strpos($fullAddress, $stateCode);

            if (isset(UnitedStates::STATE_LIST[$stateCode])) {
                return $stateCode;
            }
        }

        // Try to find "full state" names and use the first one encountered
        foreach (UnitedStates::STATE_LIST as $key => $fullState) {
            if (false !== strpos($addressChunk, $fullState)) {
                $this->statePosition = strpos($fullAddress, $fullState);

                return $key;
            }
        }

        return '';
    }

    private function getHouseNumber(array $pieces)
    {
        foreach ($pieces as $piece) {
            $firstHalf = $this->firstHalfOfString($piece, 0.667);
            if (preg_match('/([0-9][0-9A-Z.-]*)/', $firstHalf, $matches)) {
                return $matches[1];
            }
        }

        return '';
    }

    /**
     * Return the substring of $inputAddress up to the cutPoint.
     * 0.5 is the midway point, lower numbers will move the cutPoint to the left, higher to the right.
     */
    private function firstHalfOfString(string $inputAddress, float $cutPoint = 0.5): string
    {
        return substr($inputAddress, 0, ceil(strlen($inputAddress) * $cutPoint));
    }

    /**
     * Return the substring of $inputAddress FROM the cutPoint to the end.
     * 0.5 is the midway point, lower numbers will move the cutPoint to the left, higher to the right.
     */
    private function secondHalfOfString(string $inputAddress, float $cutPoint = 0.5): string
    {
        return substr($inputAddress, floor(strlen($inputAddress) * $cutPoint));
    }
}
