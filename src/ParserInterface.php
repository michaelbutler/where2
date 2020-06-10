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

namespace Where2;

interface ParserInterface
{
    public function parse(string $inputAddress): ParsedAddress;
}
