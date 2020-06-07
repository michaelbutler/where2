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
use Where2\ParsedAddress;

class Assertions
{
    public static function assertAddressEquals(ParsedAddress $expected, ParsedAddress $actual): void
    {
        TestCase::assertSame($expected->getAddressLine1(), $actual->getAddressLine1());
        TestCase::assertSame($expected->getAddressLine2(), $actual->getAddressLine2());
        TestCase::assertSame($expected->getAddressLine3(), $actual->getAddressLine3());
        TestCase::assertSame($expected->getCity(), $actual->getCity());
        TestCase::assertSame($expected->getRegion(), $actual->getRegion());
        TestCase::assertSame($expected->getPostalCode(), $actual->getPostalCode());
        TestCase::assertSame($expected->getPostalCodeExtra(), $actual->getPostalCodeExtra());
        TestCase::assertSame($expected->getHouseNumber(), $actual->getHouseNumber());
        TestCase::assertSame($expected->getFullName(), $actual->getFullName());
        TestCase::assertSame($expected->getRawData(), $actual->getRawData());
    }
}
