<?php

use Rapid\RapidSDK;
use Rapid\Type\Regular\PaymentDetails;

$rapidSDK = new RapidSDK();
$rapidSDKClient = $rapidSDK->createSDKClient(API_KEY, API_PASSWORD);

if (isset($_POST['form_key'])) {

    $queryTransactionResponse = $rapidSDKClient->queryTransaction($_POST['TransactionID']);
    $errors = $queryTransactionResponse->getErrors();
    if (!empty($errors)) {
        print_r($errors); die;
    }

    if ($_POST['action'] == 'capture') {

        $payment = new PaymentDetails(array(
            'TotalAmount'   => $_POST['TotalAmount'],
        ));
        $capturePaymentResponse = $rapidSDKClient->capturePayment($_POST['TransactionID'], $payment);
        $errors = $capturePaymentResponse->getErrors();
        if (!empty($errors)) {
            print_r($errors);
            die;
        }

    } else if ($_POST['action'] == 'cancel_capture') {

        $cancelAuthorisationResponse = $rapidSDKClient->cancelAuthorisation($_POST['TransactionID']);
        $errors = $cancelAuthorisationResponse->getErrors();
        if (!empty($errors)) {
            print_r($errors); die;
        }

    }

    $transactions = $queryTransactionResponse->getTransactions();

    print 'Create transaction complete';
    print '<pre>'; print_r($transactions[0]); die;
}
