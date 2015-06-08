<?php
use Rapid\RapidSDK;
use Rapid\Type\Regular\PaymentDetails;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\ShippingDetails;
use Rapid\Type\Regular\LineItem;
use Rapid\Type\Regular\Transaction;
use Rapid\Type\Regular\CardDetails;
use Rapid\Type\Enumerated\PaymentMethod;

if (isset($_POST['form_key'])) {

    $rapidSDK = new RapidSDK();
    $rapidSDKClient = $rapidSDK->createSDKClient(API_KEY, API_PASSWORD);

    if (isset($_POST['Customer']['TokenCustomerID'])) {
        $queryCustomerResponse = $rapidSDKClient->queryCustomer($_POST['Customer']['TokenCustomerID']);

        $errors = $queryCustomerResponse->getErrors();
        if (!empty($errors)) {
            print_r($errors); die;
        } else {
            $customers = $queryCustomerResponse->getCustomers();
            $customer = $customers[0];
            $cardDetails = new CardDetails($_POST['CardDetails']);
            $customer->setCardDetails($cardDetails);
        }

    } else {
        $_POST['Customer']['CardDetails'] = new CardDetails($_POST['CardDetails']);
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
        'Options'           => $options,
        'Capture'           => (boolean)$_POST['Capture'],
    ));

    $createTransactionResponse = $rapidSDKClient->createTransaction($transaction);
//    var_dump($createTransactionResponse->getTransactionID());die;

    $errors = $createTransactionResponse->getErrors();
    if (!empty($errors)) {
        print '<pre>'; print_r($errors);
    } else {

        if ($_POST['Method'] == PaymentMethod::AUTHORISE) {
            ?>
            <table width="30%">
                <tr>
                    <td width="50%">
                        <form action="/test/direct/index.php?s=step3" method="post">
                            <button type="submit">Capture</button>
                            <input type="hidden" name="action" value="capture">
                            <input type="hidden" name="form_key" value="<?=rand(1000, 9999)?>">
                            <input type="hidden" name="TransactionID" value="<?=$createTransactionResponse->getTransactionID()?>">
                            <input type="hidden" name="TotalAmount" value="<?=$_POST['Payment']['TotalAmount']?>">
                        </form>
                    </td>
                    <td>
                        <form action="/test/direct/index.php?s=step3" method="post">
                            <button type="submit">Cancel Capture</button>
                            <input type="hidden" name="action" value="cancel_capture">
                            <input type="hidden" name="form_key" value="<?=rand(1000, 9999)?>">
                            <input type="hidden" name="TransactionID" value="<?=$createTransactionResponse->getTransactionID()?>">
                        </form>
                    </td>
                </tr>
            </table>
            <?php
        }

        print '<pre>'; print_r($createTransactionResponse);die;
    }
}
