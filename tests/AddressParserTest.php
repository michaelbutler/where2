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
