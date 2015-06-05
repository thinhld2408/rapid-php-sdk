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

use Rapid\RapidSDK;
use Rapid\Type\Enumerated\PaymentMethod;
use Rapid\Type\Enumerated\ShippingMethod;
use Rapid\Type\Enumerated\TransactionType;
use Rapid\Type\Regular\CardDetails;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\LineItem;
use Rapid\Type\Regular\PaymentDetails;
use Rapid\Type\Regular\ShippingDetails;
use Rapid\Type\Regular\Transaction;

$rapidSDK = new RapidSDK();
//$rapidSDKClient = $rapidSDK->createSDKClient('F9802Cv/5v0y/KmyxJR5ND7ujpSGeM9b3pytdI2UhI+sJzxcxxj0pPRjCpIixTc/IW2mw2', 'Dung1234$');
$rapidSDKClient = $rapidSDK->createSDKClient('60CF3CHYfIrcF4ul8FwT+s/8VTh4AmDDz1MtME9oCsPNK3Yd25wNUqtqH5rJbd5rVXyn19', 'tuonglai');

/**
 * Direct Connection
 */
$createTransactionResponse = $rapidSDKClient->createTransaction(new Transaction(array (
    'Customer' => new Customer(array (
        'Reference' => 'A12345',
        'Title' => 'Mr.',
        'FirstName' => 'John',
        'LastName' => 'Smith',
        'CompanyName' => 'Demo Shop 123',
        'JobDescription' => 'Developer',
        'Street1' => 'Level 5',
        'Street2' => '369 Queen Street',
        'City' => 'Sydney',
        'State' => 'NSW',
        'PostalCode' => '2000',
        'Country' => 'au',
        'Phone' => '09 889 0986',
        'Mobile' => '09 889 6542',
        'Email' => 'demo@example.org',
        'Url' => 'http://www.ewaypayments.com',
        'CardDetails' => new CardDetails(array (
            'Name' => 'John Smith',
            'Number' => '4444333322221111',
            'ExpiryMonth' => '12',
            'ExpiryYear' => '25',
            'StartMonth' => '01',
            'StartYear' => '13',
            'IssueNumber' => '01',
            'CVN' => '123',
        )),
    )),
    'ShippingAddress' => new ShippingDetails(array (
        'ShippingMethod' => ShippingMethod::NEXT_DAY,
        'FirstName' => 'John',
        'LastName' => 'Smith',
        'Street1' => 'Level 5',
        'Street2' => '369 Queen Street',
        'City' => 'Sydney',
        'State' => 'NSW',
        'Country' => 'au',
        'PostalCode' => '2000',
        'Phone' => '09 889 0986',
    )),
    'Items' =>
        array (
            0 => new LineItem(array (
                'SKU' => '12345678901234567890',
                'Description' => 'Item Description 1',
                'Quantity' => 1,
                'UnitCost' => 400,
                'Tax' => 100,
                'Total' => 500,
            )),
            1 => new LineItem(array (
                'SKU' => '123456789012',
                'Description' => 'Item Description 2',
                'Quantity' => 1,
                'UnitCost' => 400,
                'Tax' => 100,
                'Total' => 500,
            )),
        ),
    'Options' =>
        array (
            0 =>
                array (
                    'Value' => 'Option1',
                ),
            1 =>
                array (
                    'Value' => 'Option2',
                ),
        ),
    'Payment' => new PaymentDetails(array (
        'TotalAmount' => 1000,
        'InvoiceNumber' => 'Inv 21540',
        'InvoiceDescription' => 'Individual Invoice Description',
        'InvoiceReference' => '513456',
        'CurrencyCode' => 'AUD',
    )),
    'Method' => PaymentMethod::PROCESS_PAYMENT,
    'DeviceID' => 'D1234',
    'CustomerIP' => '127.0.0.1',
    'PartnerID' => 'ID',
    'TransactionType' => TransactionType::PURCHASE,
)));
print_r($createTransactionResponse->toArray());

/* Transaction */
$queryTransaction = $rapidSDKClient->queryTransaction($createTransactionResponse->getTransactionID());
print_r($queryTransaction->getTransactions()[0]->toArray());