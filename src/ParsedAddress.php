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

namespace Where2;

class ParsedAddress
{
    /** @var string Full recipient name */
    private $fullName = '';

    /** @var string House number. e.g. with "123 Main St.", this would be "123" */
    private $houseNumber = '';

    /** @var string Address Line 1 */
    private $addressLine1 = '';

    /** @var string Address Line 2 */
    private $addressLine2 = '';

    /** @var string Address Line 2 */
    private $addressLine3 = '';

    /** @var string City. E.g. "San Francisco" */
    private $city = '';

    /** @var string Region (AKA state). E.g. "Florida" */
    private $region = '';

    /** @var string Postal code (AKA Zip Code). E.g. "90210" */
    private $postalCode = '';

    /** @var string Postal code extra. For zip codes, this would be the 'Plus 4' data. */
    private $postalCodeExtra = '';

    /** @var string Two character country code. E.g. US */
    private $country = 'US';

    /** @var string Original unparsed address data */
    private $rawData = '';

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): ParsedAddress
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(string $houseNumber): ParsedAddress
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    public function getAddressLine1(): string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(string $addressLine1): ParsedAddress
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    public function getAddressLine2(): string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(string $addressLine2): ParsedAddress
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    public function getAddressLine3(): string
    {
        return $this->addressLine3;
    }

    public function setAddressLine3(string $addressLine3): ParsedAddress
    {
        $this->addressLine3 = $addressLine3;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): ParsedAddress
    {
        $this->city = $city;

        return $this;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): ParsedAddress
    {
        $this->region = $region;

        return $this;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): ParsedAddress
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getPostalCodeExtra(): string
    {
        return $this->postalCodeExtra;
    }

    public function setPostalCodeExtra(string $postalCodeExtra): ParsedAddress
    {
        $this->postalCodeExtra = $postalCodeExtra;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): ParsedAddress
    {
        $this->country = $country;

        return $this;
    }

    public function getRawData(): string
    {
        return $this->rawData;
    }

    public function setRawData(string $rawData): ParsedAddress
    {
        $this->rawData = $rawData;

        return $this;
    }
}
