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

namespace Where2Tests;

use PHPUnit\Framework\TestCase;
use Where2\AddressParser;
use Where2\ParsedAddress;

/**
 * @internal
 * @covers \Where2\AddressParser
 * @covers \Where2\ParsedAddress
 * @covers \Where2\Parser\USParser
 */
class AddressParserTest extends TestCase
{
    public function providerForSuccessfullyParsedAddresses(): array
    {
        return [
            [
                '35A New Jack Blvd., New York New York 10010',
                $this->parsedAddressFromIndexedValues([
                    '', // Full name
                    '35A NEW JACK BLVD.', // Address 1
                    '', // Address 2
                    '', // Address 3
                    'NEW YORK', // City
                    'NY', // State
                    '10010', // PostalCode
                    '', // PostalCode extra
                    'US', // Country
                    '35A', // HouseNumber
                    '35A New Jack Blvd., New York New York 10010', // Original Raw Data
                ]),
            ],
            [
                '487-5787 Mollis St., City of Industry Louisiana 67973-9123  ',
                $this->parsedAddressFromIndexedValues([
                    '', // Full name
                    '487-5787 MOLLIS ST.', // Address 1
                    '', // Address 2
                    '', // Address 3
                    'CITY OF INDUSTRY', // City
                    'LA', // State
                    '67973', // PostalCode
                    '9123', // PostalCode extra
                    'US', // Country
                    '487-5787', // HouseNumber
                    '487-5787 Mollis St., City of Industry Louisiana 67973-9123  ', // Original Raw Data
                ]),
            ],
            [
                "4348 Main St.\nTesterTon, VA 83921-1234",
                $this->parsedAddressFromIndexedValues([
                    '', // Full name
                    '4348 MAIN ST.', // Address 1
                    '', // Address 2
                    '', // Address 3
                    'TESTERTON', // City
                    'VA', // State
                    '83921', // PostalCode
                    '1234', // PostalCode extra
                    'US', // Country
                    '4348', // HouseNumber
                    "4348 Main St.\nTesterTon, VA 83921-1234", // Original Raw Data
                ]),
            ],
            [
                '343-6527 Purus. Avenue, Logan NV 12657',
                $this->parsedAddressFromIndexedValues([
                    '', // Full name
                    '343-6527 PURUS. AVENUE', // Address 1
                    '', // Address 2
                    '', // Address 3
                    'LOGAN', // City
                    'NV', // State
                    '12657', // PostalCode
                    '', // PostalCode extra
                    'US', // Country
                    '343-6527', // HouseNumber
                    '343-6527 Purus. Avenue, Logan NV 12657', // Original Raw Data
                ]),
            ],
        ];
    }

    /**
     * @dataProvider providerForSuccessfullyParsedAddresses
     */
    public function testUSAddressesParsingSuccessful(string $inputAddress, ParsedAddress $expectedResult): void
    {
        $where2parser = new AddressParser();
        $resultingAddress = $where2parser->parse($inputAddress);
        Assertions::assertAddressEquals($expectedResult, $resultingAddress);
    }

    private function parsedAddressFromIndexedValues(array $values): ParsedAddress
    {
        $address = new ParsedAddress();
        $address->setFullName($values[0] ?? '');
        $address->setAddressLine1($values[1] ?? '');
        $address->setAddressLine2($values[2] ?? '');
        $address->setAddressLine3($values[3] ?? '');
        $address->setCity($values[4] ?? '');
        $address->setRegion($values[5] ?? '');
        $address->setPostalCode($values[6] ?? '');
        $address->setPostalCodeExtra($values[7] ?? '');
        $address->setCountry($values[8] ?? '');
        $address->setHouseNumber($values[9] ?? '');
        $address->setRawData($values[10] ?? '');

        return $address;
    }
}
