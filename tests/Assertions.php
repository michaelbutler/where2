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
