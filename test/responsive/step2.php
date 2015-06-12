<?php
use Rapid\RapidSDK;
use Rapid\Type\Regular\PaymentDetails;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\ShippingDetails;
use Rapid\Type\Regular\LineItem;
use Rapid\Api\AccessCodeShared;
use Rapid\Type\Regular\CardDetails;

if (isset($_POST['form_key'])) {

    $rapidSDK = new RapidSDK();
    $rapidSDKClient = $rapidSDK->createSDKClient(API_KEY, API_PASSWORD);

    if (isset($_POST['Customer']['TokenCustomerID']) && $_POST['Customer']['TokenCustomerID'] > 0) {
        $queryCustomerResponse = $rapidSDKClient->queryCustomer($_POST['Customer']['TokenCustomerID']);

        $errors = $queryCustomerResponse->getErrors();
        if (!empty($errors)) {
            print_r($errors); die;
        } else {
            $customers = $queryCustomerResponse->getCustomers();
            $customer = $customers[0];
        }

    } else {
        $customer = new Customer($_POST['Customer']);
    }

    $payment = new PaymentDetails($_POST['Payment']);

    $_POST['ShippingAddress']['ShippingMethod'] = $_POST['ShippingMethod'];
    $shipping = new ShippingDetails($_POST['ShippingAddress']);
    $item0 = new LineItem($_POST['Item0']);
    $item1 = new LineItem($_POST['Item1']);
    $item = array($item0, $item1);
    $options = array(
        array('Value'   => $_POST['Option1']),
        array('Value'   => $_POST['Option2']),
    );

    $accessCode = new AccessCodeShared(array(
        'Payment'           => $payment,
        'Customer'          => $customer,
        'ShippingAddress'   => $shipping,
        'Items'             => $item,
        'PartnerID'         => $_POST['PartnerID'],
        'DeviceID'          => $_POST['DeviceID'],
        'CustomerIP'        => $_POST['CustomerIP'],
        'RedirectUrl'       => $_POST['RedirectUrl'] . '&pm=' . $_POST['Method'],
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
//        'Capture'               => (boolean)$_POST['Capture'],
        'Options'               => $options,
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
