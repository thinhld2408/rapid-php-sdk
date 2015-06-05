<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once 'config.php';

use Rapid\RapidSDK;

if (isset($_POST['form_key'])) {

    $rapidSDK = new RapidSDK();
    $rapidSDKClient = $rapidSDK->createSDKClient(API_KEY, API_PASSWORD);

    $queryTransactionResponse = $rapidSDKClient->queryCustomer($_POST['TokenCustomerID']);
    $errors = $queryTransactionResponse->getErrors();

    if (!empty($errors)) {
        print '<pre>'; print_r($errors); die;
    } else {
        print '<pre>'; print_r($queryTransactionResponse->getCustomers()); die;
    }
}

$title = 'Query Customer';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
</head>

<body>
<div align="center">
    <h2><?=$title?></h2>
</div>
<form action="" method="post">
    <input type="hidden" name="form_key" value="<?= rand(1000, 9999) ?>">

    <table width="50%">
        <tr>
            <td width="30%">Token Customer ID</td>
            <td>
                <input type="text" name="TokenCustomerID" placeholder="Enter Token Customer ID...">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit">Submit</button>
            </td>
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

