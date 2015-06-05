<?php

$api_context = require 'common.php';

use Rapid\Api\AccessCode;
use Rapid\RapidSDK;
use Rapid\Type\Enumerated\PaymentMethod;
use Rapid\Type\Enumerated\ShippingMethod;
use Rapid\Type\Enumerated\TransactionType;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\LineItem;
use Rapid\Type\Regular\PaymentDetails;
use Rapid\Type\Regular\ShippingDetails;

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

$result = $rapidSDKClient->queryCustomer('913353737470');
print_r($result->getCustomers()[0]->toArray());
die();
$accessCode = new AccessCode(array(
    'Payment'         => new PaymentDetails(array(
        "TotalAmount"        => 1000,
        "InvoiceNumber"      => "Inv" . rand(100000, 999999),
        "InvoiceDescription" => "Individual Invoice Description",
        "InvoiceReference"   => "513456",
        "CurrencyCode"       => "AUD"
    )),
    'RedirectUrl'     => 'http://sdk.com/test/test.php',
    'Method'          => PaymentMethod::PROCESS_PAYMENT,
    'TransactionType' => TransactionType::PURCHASE,
    'Customer'        => new Customer(array(
        "Reference"      => "SmartOsc",
        "Title"          => "Mr.",
        "FirstName"      => "John",
        "LastName"       => "Smith",
        "CompanyName"    => "Demo Shop 123",
        "JobDescription" => "Developer",
        "Street1"        => "Level 5",
        "Street2"        => "369 Queen Street",
        "City"           => "Sydney",
        "State"          => "NSW",
        "PostalCode"     => "2000",
        "Country"        => "au",
        "Phone"          => "09 889 0986",
        "Mobile"         => "09 889 6542",
        "Email"          => "demo@example.org",
        "Url"            => "http://www.ewaypayments.com"
    )),
    'ShippingAddress' => new ShippingDetails(array(
        "ShippingMethod" => ShippingMethod::NEXT_DAY,
        "FirstName"      => "John",
        "LastName"       => "Smith",
        "Street1"        => "Level 5",
        "Street2"        => "369 Queen Street",
        "City"           => "Sydney",
        "State"          => "NSW",
        "Country"        => "au",
        "PostalCode"     => "2000",
        "Phone"          => "09 889 0986"
    )),
    'Items'           => array(
        new LineItem(array(
            "SKU"         => "12345678901234567890",
            "Description" => "Item Description 1",
            "Quantity"    => 1,
            "UnitCost"    => 400,
            "Tax"         => 100,
            "Total"       => 500
        ))
    )
));

$accessResult = json_decode($accessCode->create($api_context), true);

if (isset($_GET['AccessCode'])) {
    $accessCode->setAccessCode($_GET['AccessCode']);
    $result = $accessCode->requestResult($api_context);
    var_dump($result);
    die;
}
?>
<form method="POST" action="<?= $accessResult['FormActionURL'] ?>" id="payment_form">
    <input type="hidden" name="EWAY_ACCESSCODE" value="<?= $accessResult['AccessCode'] ?>"/><br>
    <input type="hidden" name="EWAY_PAYMENTTYPE" value="Credit Card"/><br>
    Card Name: <input type="text" name="EWAY_CARDNAME" value="Vuong Dung"/><br>
    Card Number: <input type="text" name="EWAY_CARDNUMBER" value="4005550000000001"/><br>
    Card Expiry Month: <input type="text" name="EWAY_CARDEXPIRYMONTH" value="05"/><br>
    Card Expiry Year: <input type="text" name="EWAY_CARDEXPIRYYEAR" value="17"/><br>
    Card Start Date: <input type="text" name="EWAY_CARDSTARTMONTH"/><br>
    Card Start Year: <input type="text" name="EWAY_CARDSTARTYEAR"/><br>
    Card Issue Number: <input type="text" name="EWAY_CARDISSUENUMBER"/><br>
    Card CVN: <input type="text" name="EWAY_CARDCVN" value="123"/><br>
    <input type="submit" value="Process" text="Process"/>
</form>
