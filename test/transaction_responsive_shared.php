<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */


$api_context = require 'common.php';

use Rapid\Api\AccessCodeShared;
use Rapid\RapidSDK;
use Rapid\Type\Enumerated\CustomView;
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

/**
 * Transparent Redirect
 */
/* STEP 1: CREATE AN ACCESS CODE */
$accessCodeResponse = $rapidSDKClient->createAccessCodeShared(new AccessCodeShared(array(
    'Payment'             => new PaymentDetails(array(
        'TotalAmount' => 1000,
    )),
    'Customer'            => new Customer(array(
        'Reference'      => 'A12345',
        'Title'          => 'Mr.',
        'FirstName'      => 'John',
        'LastName'       => 'Smith',
        'CompanyName'    => 'Demo Shop 123',
        'JobDescription' => 'Developer',
        'Street1'        => 'Level 5',
        'Street2'        => '369 Queen Street',
        'City'           => 'Sydney',
        'State'          => 'NSW',
        'PostalCode'     => '2000',
        'Country'        => 'au',
        'Phone'          => '09 889 0986',
        'Mobile'         => '09 889 6542',
        'Email'          => 'demo@example.org',
        'Url'            => 'http://www.ewaypayments.com',
    )),
    'ShippingAddress'     => new ShippingDetails(array(
        'ShippingMethod' => ShippingMethod::NEXT_DAY,
        'FirstName'      => 'John',
        'LastName'       => 'Smith',
        'Street1'        => 'Level 5',
        'Street2'        => '369 Queen Street',
        'City'           => 'Sydney',
        'State'          => 'NSW',
        'Country'        => 'au',
        'PostalCode'     => '2000',
        'Phone'          => '09 889 0986',
    )),
    'Items'               => array(
        new LineItem(array(
            'SKU'         => '12345678901234567890',
            'Description' => 'Item Description 1',
            'Quantity'    => 1,
            'UnitCost'    => 500,
            'Tax'         => 100,
            'Total'       => 500,
        )),
        new LineItem(array(
            'SKU'         => '123456789',
            'Description' => 'Item Description 2',
            'Quantity'    => 1,
            'UnitCost'    => 500,
            'Tax'         => 100,
            'Total'       => 500,
        )),
    ),
    "PartnerID"           => "ID",
    'DeviceID'            => 'DZPC',
    "CustomerIP"          => "127.0.0.1",
    'RedirectUrl'         => 'http://www.eway.com.au',
    'Method'              => PaymentMethod::PROCESS_PAYMENT,
    'TransactionType'     => TransactionType::PURCHASE,
    "LogoUrl"             => "",
    "HeaderText"          => "This is demo Shared page",
    "Language"            => "EN",
    "CustomerReadOnly"    => false,
    "CustomView"          => CustomView::BOOTSTRAP,
    "VerifyCustomerPhone" => false,
    "VerifyCustomerEmail" => false
)));
echo "STEP 1: CREATE A NEW ACCESS CODE \n";
print_r($accessCodeResponse->toJSON());

/* STEP 2: REDIRECT CUSTOMER TO EWAY */
/* Using the SharedPaymentUrl you must now redirect the customer’s browser to eWAY to process their credit card details. */
echo "\nSTEP 2: REDIRECT CUSTOMER TO EWAY \n";

/* STEP 3 : REQUEST THE RESULTS */
//$queryAccessCode = $rapidSDKClient->queryAccessCode($accessCodeResponse->getAccessCode());
echo "\nSTEP 3 : REQUEST THE RESULTS \n";
//print_r($queryAccessCode->toArray());