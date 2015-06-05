<?php
use Rapid\RapidSDK;
use Rapid\Type\Regular\PaymentDetails;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\ShippingDetails;
use Rapid\Type\Regular\LineItem;
use Rapid\Type\Regular\Transaction;
use Rapid\Type\Regular\CardDetails;

if (isset($_POST['form_key'])) {

    $rapidSDK = new RapidSDK();
    $rapidSDKClient = $rapidSDK->createSDKClient(API_KEY, API_PASSWORD);

    if (isset($_POST['Customer']['TokenCustomerID'])) {
        $queryCustomerResponse = $rapidSDKClient->queryCustomer($_POST['Customer']['TokenCustomerID']);

        $errors = $queryCustomerResponse->getErrors();
        if (!empty($errors)) {
            print_r($errors); die;
        } else {
            $customer = $queryCustomerResponse[0];
        }

    } else {
        $_POST['Customer']['CardDetails'] = new CardDetails($_POST['CardDetails']);
        $customer = new Customer($_POST['Customer']);
    }

    $payment = new PaymentDetails($_POST['Payment']);
    $shipping = new ShippingDetails($_POST['ShippingAddress']);
    $item0 = new LineItem($_POST['Item0']);
    $item1 = new LineItem($_POST['Item1']);
    $item = array($item0, $item1);

    $transaction = new Transaction(array(
        'Payment'           => $payment,
        'Customer'          => $customer,
        'ShippingAddress'   => $shipping,
        'Items'             => $item,
        'PartnerID'         => $_POST['PartnerID'],
        'DeviceID'          => $_POST['DeviceID'],
        'CustomerIP'        => $_POST['CustomerIP'],
        'Method'            => $_POST['Method'],
        'TransactionType'   => $_POST['TransactionType'],
    ));

    $createTransactionResponse = $rapidSDKClient->createTransaction($transaction);

    $errors = $createTransactionResponse->getErrors();
    if (!empty($errors)) {
        print '<pre>'; print_r($errors);
    } else {
        print '<pre>'; print_r($createTransactionResponse);die;
    }
}
