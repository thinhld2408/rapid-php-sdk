<?php

$api_context = require 'common.php';

use Rapid\RapidSDK;

//$msg = new Rapid\Type\Response\CancelAuthorisationResponse();
//$msg->setErrors('V6062,V6064,V6068,V6063');
//$msg->prepareMessages('EN');
//
//print_r($msg->getErrors());die;

$rapidSDK = new RapidSDK();
//$rapidSDKClient = $rapidSDK->createSDKClient('F9802Cv/5v0y/KmyxJR5ND7ujpSGeM9b3pytdI2UhI+sJzxcxxj0pPRjCpIixTc/IW2mw2', 'Dung1234$');
$rapidSDKClient = $rapidSDK->createSDKClient('60CF3CHYfIrcF4ul8FwT+s/8VTh4AmDDz1MtME9oCsPNK3Yd25wNUqtqH5rJbd5rVXyn19', 'tuonglai');

//$result = $rapidSDKClient->createCustomer(new Customer(array(
//    "Reference"      => "SmartOsc",
//    "Title"          => "Mr.",
//    "FirstName"      => "John",
//    "LastName"       => "Smith",
//    "CompanyName"    => "Demo Shop 123",
//    "JobDescription" => "Developer",
//    "Street1"        => "Level 5",
//    "Street2"        => "369 Queen Street",
//    "City"           => "Sydney",
//    "State"          => "NSW",
//    "PostalCode"     => "2000",
//    "Country"        => "au",
//    "Phone"          => "09 889 0986",
//    "Mobile"         => "09 889 6542",
//    "Email"          => "demo@example.org",
//    "Url"            => "http://www.ewaypayments.com",
//    "CardDetails"    => new CardDetails(array(
//        "Name"        => "John Smith",
//        "Number"      => "4444333322221111",
//        "ExpiryMonth" => "12",
//        "ExpiryYear"  => "25",
//        "CVN"         => "123"
//    ))
//)));

//$result = $rapidSDKClient->updateCustomer(new Customer(array(
//    "TokenCustomerID" => "910898059206",
//    "Reference"       => "SmartOsc",
//    "Title"           => "Mr.",
//    "FirstName"       => "Dzung",
//    "LastName"        => "Tran",
//    "CompanyName"     => "",
//    "JobDescription"  => "",
//    "Street1"         => "Level 5",
//    "Street2"         => "369 Queen Street",
//    "City"            => "Sydney",
//    "State"           => "NSW",
//    "PostalCode"      => "2000",
//    "Country"         => "au",
//    "Phone"           => "09 889 0986",
//    "Mobile"          => "09 889 6542",
//    "Email"           => "abc@123.org",
//    "Url"             => "http://goio.com",
//)));

$result = $rapidSDKClient->queryTransaction('11622699');
print_r($result->toArray());
die();

