<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'config.php';

use Rapid\RapidSDK;
use Rapid\Type\Regular\Refund;
use Rapid\Type\Regular\RefundDetails;

if (isset($_POST['form_key'])) {

    $rapidSdk = new RapidSDK();
    $rapidSdkClient = $rapidSdk->createSDKClient(API_KEY, API_PASSWORD);

    $refundDetails = new RefundDetails(array(
        'TotalAmount'   => $_POST['TotalAmount'],
    ));
    $refund = new Refund(array(
        'Refund'    => $refundDetails,
    ));

    $refundResponse = $rapidSdkClient->refundTransaction($_POST['TransactionID'], $refund);

    $errors = $refundResponse->getErrors();
    if (!empty($errors)) {
        print_r($errors); die;
    } else {
        print '<pre>'; print_r($refundResponse); die;
    }

}

$title = 'Refund Transaction';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>

<div align="center">
    <h2><?= $title ?></h2>
</div>
<form action="" method="post">
    <input type="hidden" name="form_key" value="<?= rand(1000, 9999) ?>">
    <table width="50%">
        <tr>
            <td width="30%">Transaction ID</td>
            <td>
                <input type="text" name="TransactionID" value="" required>
            </td>
        </tr>
        <tr>
            <td width="30%">Total Amount</td>
            <td>
                <input type="text" name="TotalAmount" value="" required>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2"><button type="submit">Submit</button></td>
        </tr>
    </table>
</form>
<style type="text/css">
    input[type=text] {
        width: 100%;
    }
</style>

</body>
</html>