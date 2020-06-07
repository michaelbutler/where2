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
