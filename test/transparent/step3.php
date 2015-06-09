<?php
use Rapid\RapidSDK;
use Rapid\Type\Regular\PaymentDetails;
use Rapid\Type\Regular\Transaction;
use Rapid\Type\Enumerated\PaymentMethod;

$rapidSDK = new RapidSDK();
$rapidSDKClient = $rapidSDK->createSDKClient(API_KEY, API_PASSWORD);

$accessCode = $_GET['AccessCode'];
$queryAccessCodeResponse = $rapidSDKClient->queryAccessCode($accessCode);

if (isset($_POST['form_key']) && isset($_POST['TransactionID'])) {

    $queryTransactionResponse = $rapidSDKClient->queryTransaction($_POST['TransactionID']);
    $transactions = $queryTransactionResponse->getTransactions();
    $transaction = array_shift($transactions);

    if (isset($_POST['action']) && $_POST['action'] == 'capture') {

        $payment = new PaymentDetails(array(
            'TotalAmount'   => $queryAccessCodeResponse->getTotalAmount(),
        ));
        $capturePaymentResponse = $rapidSDKClient->capturePayment($_POST['TransactionID'], $payment);

        $errors = $capturePaymentResponse->getErrors();
        if (!empty($errors)) {
            print_r($errors); die;
        } else {
            $errs = $queryTransactionResponse->getErrors();
            if (!empty($errs)) {
                print_r($errs);
            }
        }
    } else if ($_POST['action'] == 'cancel_capture') {

        $cancelAuthorisationResponse = $rapidSDKClient->cancelAuthorisation($_POST['TransactionID']);
        $errors = $cancelAuthorisationResponse->getErrors();
        if (!empty($errors)) {
            print_r($errors); die;
        }

    }

    print 'Create transaction complete';
    print '<pre>'; print_r($queryAccessCodeResponse);
}
?>
<div align="center">
    <h2>Create Transaction: <span style="color: blue">Transparent Redirect</span></h2>
    <h3>Step 3: Request the result</h3>
</div>

<?php if ($_GET['pm'] == PaymentMethod::AUTHORISE) { ?>
<table width="30%">
    <tr>
        <td width="50%">
            <form action="" method="post">
                <button type="submit">Capture</button>
                <input type="hidden" name="action" value="capture">
                <input type="hidden" name="form_key" value="<?=rand(1000, 9999)?>">
                <input type="hidden" name="TransactionID" value="<?=$queryAccessCodeResponse->getTransactionID()?>">
            </form>
        </td>
        <td>
            <form action="" method="post">
                <button type="submit">Cancel Capture</button>
                <input type="hidden" name="action" value="cancel_capture">
                <input type="hidden" name="form_key" value="<?=rand(1000, 9999)?>">
                <input type="hidden" name="TransactionID" value="<?=$queryAccessCodeResponse->getTransactionID()?>">
            </form>
        </td>
    </tr>
</table>
<?php } ?>

<?php print '<pre>'; print_r($queryAccessCodeResponse); ?>

