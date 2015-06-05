<?php
use Rapid\RapidSDK;
use Rapid\Type\Regular\PaymentDetails;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\ShippingDetails;
use Rapid\Type\Regular\LineItem;
use Rapid\Api\AccessCode;

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

    $accessCode = new AccessCode(array(
        'Payment'   => $payment,
        'Customer'  => $customer,
        'ShippingAddress'   => $shipping,
        'Items'     => $item,
        'PartnerID' => $_POST['PartnerID'],
        'DeviceID' => $_POST['DeviceID'],
        'CustomerIP' => $_POST['CustomerIP'],
        'RedirectUrl' => $_POST['RedirectUrl'],
        'Method' => $_POST['Method'],
        'TransactionType' => $_POST['TransactionType'],
    ));

    $accessCodeResponse = $rapidSDKClient->createAccessCode($accessCode);
    //print '<pre>'; print_r($accessCodeResponse);die;

    $errors = $accessCodeResponse->getErrors();
    if (empty($errors)) {
        ?>
        <div align="center">
            <h2>Create Transaction: <span style="color: blue">Transparent Redirect</span></h2>
            <h3>Step 2: Submit card details</h3>
        </div>

        <form method="POST" action="<?= $accessCodeResponse->getFormActionUrl() ?>" id="payment_form">
            <table width="50%">
                <input type="hidden" name="EWAY_ACCESSCODE" value="<?= $accessCodeResponse->getAccessCode() ?>" />
                <input type="hidden" name="EWAY_PAYMENTTYPE" value="Credit Card" />
                <tr>
                    <td width="30%">Card Name</td>
                    <td>
                        <input type="text" name="EWAY_CARDNAME" value="Vuong Dung" required />
                    </td>
                </tr>
                <tr>
                    <td>Card Number</td>
                    <td>
                        <input type="text" name="EWAY_CARDNUMBER" value="4005550000000001" required />
                    </td>
                </tr>
                <tr>
                    <td>Card Expiry Month</td>
                    <td>
                        <input type="text" name="EWAY_CARDEXPIRYMONTH" value="05" required />
                    </td>
                </tr>
                <tr>
                    <td>Card Expiry Year</td>
                    <td>
                        <input type="text" name="EWAY_CARDEXPIRYYEAR" value="17" required />
                    </td>
                </tr>
                <tr>
                    <td>Card Start Date</td>
                    <td>
                        <input type="text" name="EWAY_CARDSTARTMONTH" />
                    </td>
                </tr>
                <tr>
                    <td>Card Start Year</td>
                    <td>
                        <input type="text" name="EWAY_CARDSTARTYEAR" />
                    </td>
                </tr>
                <tr>
                    <td>Card Issue Number</td>
                    <td>
                        <input type="text" name="EWAY_CARDISSUENUMBER" />
                    </td>
                </tr>
                <tr>
                    <td>Card CVN</td>
                    <td>
                        <input type="text" name="EWAY_CARDCVN" value="123" required />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="submit">Submit</button>
                    </td>
                </tr>
            </table>

        </form>

        <?php
    } else {
        print $errors;
    }
}
?>
<style type="text/css">
    input[type=text] {
        width: 100%;
    }
</style>

