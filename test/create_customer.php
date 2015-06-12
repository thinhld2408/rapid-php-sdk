<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'config.php';

use Rapid\RapidSDK;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\CardDetails;

$infoCustomer = array(
    "Reference"      => array(
        'required'  => false,
        'value'     => 'SmartOsc',
    ),
    "Title"      => array(
        'required'  => true,
        'value'     => 'Mr.',
    ),
    "FirstName"      => array(
        'required'  => true,
        'value'     => 'John',
    ),
    "LastName"      => array(
        'required'  => true,
        'value'     => 'Smith',
    ),
    "CompanyName"      => array(
        'required'  => false,
        'value'     => 'Demo Shop 123',
    ),
    "JobDescription"      => array(
        'required'  => false,
        'value'     => 'Developer',
    ),
    "Street1"      => array(
        'required'  => false,
        'value'     => '266 Doi Can Street',
    ),
    "Street2"      => array(
        'required'  => false,
        'value'     => '',
    ),
    "City"      => array(
        'required'  => false,
        'value'     => 'Ha noi',
    ),
    "State"      => array(
        'required'  => false,
        'value'     => 'Ba Dinh',
    ),
    "PostalCode"      => array(
        'required'  => false,
        'value'     => '10000',
    ),
    "Country"      => array(
        'required'  => true,
        'value'     => 'UK',
    ),
    "Phone"      => array(
        'required'  => false,
        'value'     => '043633466',
    ),
    "Mobile"      => array(
        'required'  => false,
        'value'     => '0906600788',
    ),
    "Email"      => array(
        'required'  => false,
        'value'     => 'dungvv@smartosc.com',
    ),
    "Url"      => array(
        'required'  => false,
        'value'     => 'http://dungvv.blogspot.com',
    ),
);

$infoCard = array(
    "Name"        => array(
        'required'  => false,
        'value'     => 'John Smith',
    ),
    "Number"        => array(
        'required'  => false,
        'value'     => '4444333322221111',
    ),
    "ExpiryMonth"        => array(
        'required'  => false,
        'value'     => '05',
    ),
    "ExpiryYear"        => array(
        'required'  => false,
        'value'     => '17',
    ),
    "CVN"        => array(
        'required'  => false,
        'value'     => '123',
    ),
);


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

<?php include 'header.php' ?>

<div align="center">
    <h2><?=$title?></h2>
</div>
<form action="" method="POST">
    <input type="hidden" name="form_key" value="<?= rand(1000, 9999) ?>">
    <table width="50%" border="0" style="border-collapse: collapse">

        <?php
        foreach ($infoCustomer as $key => $val) {
            $required = ($val['required']) ? 'required' : '';
            ?>
            <tr>
                <td width="30%"><?= $key ?> :</td>
                <td>
                    <input type="text" <?=$required?> name="Customer[<?= $key ?>]" value="<?= $val['value'] ?>">
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
                    <input type="text" name="CardDetails[<?= $key ?>]" value="<?= $val['value'] ?>">
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