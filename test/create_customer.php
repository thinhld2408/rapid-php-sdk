<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'config.php';

use Rapid\RapidSDK;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\CardDetails;

$infoCustomer = array(
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
    "Url"            => "http://www.ewaypayments.com",
);

/*$infoCustomer = array(
    "Reference"      => "",
    "Title"          => "",
    "FirstName"      => "",
    "LastName"       => "",
    "CompanyName"    => "",
    "JobDescription" => "",
    "Street1"        => "",
    "Street2"        => "",
    "City"           => "",
    "State"          => "",
    "PostalCode"     => "",
    "Country"        => "",
    "Phone"          => "",
    "Mobile"         => "",
    "Email"          => "",
    "Url"            => "",
);*/

$infoCard = array(
    "Name"        => "John Smith",
    "Number"      => "4444333322221111",
    "ExpiryMonth" => "12",
    "ExpiryYear"  => "25",
    "CVN"         => "123"
);

/*$infoCard = array(
    "Name"        => "",
    "Number"      => "",
    "ExpiryMonth" => "",
    "ExpiryYear"  => "",
    "CVN"         => ""
);*/

if (isset($_POST['form_key'])) {

    $customer = $_POST['Customer'];
    $card = $_POST['CardDetails'];

    $make = true;
    if (!empty($_POST['CardDetails'])) {
        foreach ($_POST['CardDetails'] as $item) {
            if (trim($item) == '') {
                $make = false;
                break;
            }
        }
    }

    $cardDetails = ($make) ? new CardDetails(array(
        "Name"        => $card['Name'],
        "Number"      => $card['Number'],
        "ExpiryMonth" => $card['ExpiryMonth'],
        "ExpiryYear"  => $card['ExpiryYear'],
        "CVN"         => $card['CVN'],
    )) : null;

    $rapidSdk = new RapidSDK();
    $rapidSdkClient = $rapidSdk->createSDKClient(API_KEY, API_PASSWORD);

    $customer = new Customer(array(
        "Reference"      => $customer['Reference'],
        "Title"          => $customer['Title'],
        "FirstName"      => $customer['FirstName'],
        "LastName"       => $customer['LastName'],
        "CompanyName"    => $customer['CompanyName'],
        "JobDescription" => $customer['JobDescription'],
        "Street1"        => $customer['Street1'],
        "Street2"        => $customer['Street2'],
        "City"           => $customer['City'],
        "State"          => $customer['State'],
        "PostalCode"     => $customer['PostalCode'],
        "Country"        => $customer['Country'],
        "Phone"          => $customer['Phone'],
        "Mobile"         => $customer['Mobile'],
        "Email"          => $customer['Email'],
        "Url"            => $customer['Url'],
        "CardDetails"    => $cardDetails,
    ));
    $createCustomerResponse = $rapidSdkClient->createCustomer($customer);

    $errors = $createCustomerResponse->getErrors();
    if (!empty($errors)) {
        print '<pre>'; print_r($errors); die;
    } else {
        print '<pre>'; print_r($createCustomerResponse->getCustomer()); die;
    }
}
$title = 'Create Customer';
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
<form action="" method="POST">
    <input type="hidden" name="form_key" value="<?= rand(1000, 9999) ?>">
    <table width="50%" border="0" style="border-collapse: collapse">

        <?php
        foreach ($infoCustomer as $key => $val) {
            ?>
            <tr>
                <td width="30%"><?= $key ?> :</td>
                <td>
                    <input type="text" name="Customer[<?= $key ?>]" value="<?= $val ?>">
                </td>
            </tr>
        <?php
        }
        ?>

        <tr>
            <td colspan="2"><hr></td>
        </tr>
        <tr>
            <td colspan="2"><b>[Card Details]</b></td>
        </tr>

        <?php
        foreach ($infoCard as $key => $val) {
            ?>
            <tr>
                <td><?= $key ?> :</td>
                <td>
                    <input type="text" name="CardDetails[<?= $key ?>]" value="<?= $val ?>">
                </td>
            </tr>
        <?php
        }
        ?>

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