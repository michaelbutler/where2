# Where2

A mailing address parser written in PHP, using a best-guess algorithm. Does not
require any external APIs, but may not be 100% accurate in all cases.

Currently provides support for these countries:

- USA

# Usage

```php
<?php

use Where2\AddressParser;

require 'vendor/autoload.php';

$parser = new AddressParser();
$address = $parser->parse('71777 32nd St. Apt 208, Tinton Falls, PA 43712-3438');

print_r($address); 

// Outputs:
/*
Where2\ParsedAddress Object
(
    [fullName:Where2\ParsedAddress:private] => 
    [houseNumber:Where2\ParsedAddress:private] => 71777
    [addressLine1:Where2\ParsedAddress:private] => 71777 32ND ST. APT 208
    [addressLine2:Where2\ParsedAddress:private] => 
    [addressLine3:Where2\ParsedAddress:private] => 
    [city:Where2\ParsedAddress:private] => TINTON FALLS
    [region:Where2\ParsedAddress:private] => PA
    [postalCode:Where2\ParsedAddress:private] => 43712
    [postalCodeExtra:Where2\ParsedAddress:private] => 3438
    [country:Where2\ParsedAddress:private] => US
    [rawData:Where2\ParsedAddress:private] => 71777 32nd St. Apt 208, Tinton Falls, PA 43712-3438
)
*/
```

As this is a best-guess algorithm and not machine-learning based, not all addresses can be
parsed correctly. For best results, address lines should at least be separated by either
commas or line breaks.

If an address cannot be parsed, a \Where2\Where2Exception will be thrown.
