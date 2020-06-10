<?php

/*
 *   This file is part of the Where2 PHP Address Parser.
 *   Source: https://github.com/michaelbutler/where2
 *
 *   Where2 is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU Lesser General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   Where2 is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Lesser General Public License for more details.
 *
 *   You should have received a copy of the GNU Lesser General Public License
 *   along with Where2.  If not, see <https://www.gnu.org/licenses/>.
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

        $fullName = '';

        do {
            $peek = trim($pieces[0]);
            // Stop when we hit the house number
            if (0 === strpos($peek, $houseNumber)) {
                break;
            }
            $fullName .= $peek . ' ';
            array_shift($pieces);
        } while ($pieces);

        $address->setFullName(trim($fullName));

        // Next chunk after name is Address Line 1
        $addressLine1 = trim(array_shift($pieces));
        $address->setAddressLine1($addressLine1);

        // Next chunk after Address Line 1 is Line 2
        $addressLine2 = '';
        if ($pieces) {
            $addressLine2 = trim(array_shift($pieces));
        }
        $address->setAddressLine2($addressLine2);

        // Any other chunks should be compacted into Address Line 3
        $addressLine3 = '';
        while ($pieces) {
            $piece = trim(array_shift($pieces));
            $addressLine3 .= $piece . ' ';
        }
        $address->setAddressLine3(trim($addressLine3));

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

            if (is_string($stateCode) && isset(UnitedStates::STATE_LIST[$stateCode])) {
                $this->statePosition = strrpos($fullAddress, $stateCode);

                return $stateCode;
            }
        }

        // Try to find "full state" names and use the first one encountered
        foreach (UnitedStates::STATE_LIST as $key => $fullState) {
            if (false !== strrpos($addressChunk, $fullState)) {
                $this->statePosition = strrpos($fullAddress, $fullState);

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
