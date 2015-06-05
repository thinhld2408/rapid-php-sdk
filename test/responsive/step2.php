<?php
use Rapid\RapidSDK;
use Rapid\Type\Regular\PaymentDetails;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\ShippingDetails;
use Rapid\Type\Regular\LineItem;
use Rapid\Api\AccessCodeShared;

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
        $customer = new Customer($_POST['Customer']);
    }

    $payment = new PaymentDetails($_POST['Payment']);
    $shipping = new ShippingDetails($_POST['ShippingAddress']);
    $item0 = new LineItem($_POST['Item0']);
    $item1 = new LineItem($_POST['Item1']);
    $item = array($item0, $item1);

    $accessCode = new AccessCodeShared(array(
        'Payment'           => $payment,
        'Customer'          => $customer,
        'ShippingAddress'   => $shipping,
        'Items'             => $item,
        'PartnerID'         => $_POST['PartnerID'],
        'DeviceID'          => $_POST['DeviceID'],
        'CustomerIP'        => $_POST['CustomerIP'],
        'RedirectUrl'       => $_POST['RedirectUrl'],
        'Method'            => $_POST['Method'],
        'TransactionType'   => $_POST['TransactionType'],
        'CustomerReadOnly'  => (boolean)$_POST['CustomerReadOnly'],
        'VerifyCustomerPhone'   => (boolean)$_POST['VerifyCustomerPhone'],
        'VerifyCustomerEmail'   => (boolean)$_POST['VerifyCustomerEmail'],
        'CustomView'            => $_POST['CustomView'],
        'CancelUrl'             => $_POST['CancelUrl'],
        'LogoUrl'               => $_POST['LogoUrl'],
        'HeaderText'            => $_POST['HeaderText'],
        'Language'              => $_POST['Language'],
    ));

    $accessCodeResponse = $rapidSDKClient->createAccessCodeShared($accessCode);
//    print '<pre>'; print_r($accessCodeResponse);die;

    $errors = $accessCodeResponse->getErrors();
    if (!empty($errors)) {
        print '<pre>'; print_r($errors);
    } else {

        header('Location: '. $accessCodeResponse->getSharedPaymentUrl());
    }
}
