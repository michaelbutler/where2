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

use Where2\Parser\USParser;

class AddressParser
{
    /** @var array Options to change the behavior of parsing. */
    private $options;

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function parse(string $inputAddress)
    {
        if (!\mb_check_encoding($inputAddress, 'UTF-8')) {
            throw new \InvalidArgumentException('Input address must be UTF-8 encoded.');
        }
        $country = $this->detectCountry($inputAddress);
        $parser = $this->getParserForCountry($country);

        return $parser->parse($inputAddress);
    }

    private function detectCountry(string $inputAddress)
    {
        $country = '';
        if (isset($this->options['country'])) {
            // Check for a direct country override
            if (2 !== strlen($this->options['country'])) {
                throw new \InvalidArgumentException('"country" option must be two characters');
            }

            return strtoupper($this->options['country']);
        }
        // todo: auto detect country from input address
        return 'US';
    }

    private function getParserForCountry(string $country): ParserInterface
    {
        switch ($country) {
            case 'US':
                return new USParser($this->options);

                break;
            default:
                throw new \InvalidArgumentException("Cannot parse {$country} addresses.");
        }
    }
}
