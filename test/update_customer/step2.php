<?php
use Rapid\RapidSDK;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\CardDetails;

$rapidSdk = new RapidSDK();
$rapidSdkClient = $rapidSdk->createSDKClient(API_KEY, API_PASSWORD);

if (isset($_POST['form_key'])) {

    // Token Customer ID
    $tokenCustomerID = trim($_POST['TokenCustomerID']);
    $queryCustomerResponse = $rapidSdkClient->queryCustomer($tokenCustomerID);
    //print '<pre>'; print_r($queryCustomerResponse); die;

    $errors = $queryCustomerResponse->getErrors();
    if (!empty($errors)) {
        print_r($errors); die;
    }

} else {
    print '<a href="/test/update_customer/index.php?s=step1">Back to step 1</a>'; die;
}

$customers = $queryCustomerResponse->getCustomers();
$customer = $customers[0];
$card = $customer->getCardDetails();

$infoCustomer = array(
    "Reference"      => array(
        'required'  => false,
        'value'     => $customer->getReference(),
    ),
    "Title"      => array(
        'required'  => true,
        'value'     => $customer->getTitle(),
    ),
    "FirstName"      => array(
        'required'  => true,
        'value'     => $customer->getFirstName(),
    ),
    "LastName"      => array(
        'required'  => true,
        'value'     => $customer->getLastName(),
    ),
    "CompanyName"      => array(
        'required'  => false,
        'value'     => $customer->getCompanyName(),
    ),
    "JobDescription"      => array(
        'required'  => false,
        'value'     => $customer->getJobDescription(),
    ),
    "Street1"      => array(
        'required'  => false,
        'value'     => $customer->getStreet1(),
    ),
    "Street2"      => array(
        'required'  => false,
        'value'     => $customer->getStreet2(),
    ),
    "City"      => array(
        'required'  => false,
        'value'     => $customer->getCity(),
    ),
    "State"      => array(
        'required'  => false,
        'value'     => $customer->getState(),
    ),
    "PostalCode"      => array(
        'required'  => false,
        'value'     => $customer->getPostalCode(),
    ),
    "Country"      => array(
        'required'  => true,
        'value'     => $customer->getCountry(),
    ),
    "Phone"      => array(
        'required'  => false,
        'value'     => $customer->getPhone(),
    ),
    "Mobile"      => array(
        'required'  => false,
        'value'     => $customer->getMobile(),
    ),
    "Email"      => array(
        'required'  => false,
        'value'     => $customer->getEmail(),
    ),
    "Url"      => array(
        'required'  => false,
        'value'     => $customer->getUrl(),
    ),
);

$infoCard = array(
    "Name"        => array(
        'required'  => false,
        'value'     => $card->getName(),
    ),
    "Number"        => array(
        'required'  => false,
        'value'     => $card->getNumber(),
    ),
    "ExpiryMonth"        => array(
        'required'  => false,
        'value'     => $card->getExpiryMonth(),
    ),
    "ExpiryYear"        => array(
        'required'  => false,
        'value'     => $card->getExpiryYear(),
    ),
    "CVN"        => array(
        'required'  => false,
        'value'     => $card->getCVN(),
    ),
);

$title = 'Update Customer';
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
<form action="/test/update_customer/index.php?s=step3" method="POST">

    <input type="hidden" name="form_key" value="<?= rand(1000, 9999) ?>">
    <input type="hidden" name="TokenCustomerID" value="<?= $tokenCustomerID ? $tokenCustomerID : 0 ?>">

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