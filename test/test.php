<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Rapid\RapidSDK;
use Rapid\Type\Regular\Address;

echo RapidSDK::init();

$add = new Address(array(
    'PostalCode' => 'ssssssssssss'
));
//$add->setCity('HaNoi')
//    ->setCountry('VN')
//    ->setPostalCode('10000')
//    ->setState('DONGANH')
//    ->setStreet1('aaaaaaaaaa');
print_r($add->getPostalCode());
