<?php
use Rapid\RapidSDK;
use Rapid\Type\Regular\PaymentDetails;
use Rapid\Type\Enumerated\PaymentMethod;

$rapidSDK = new RapidSDK();
$rapidSDKClient = $rapidSDK->createSDKClient(API_KEY, API_PASSWORD);

$accessCode = $_GET['AccessCode'];
$queryAccessCode = $rapidSDKClient->queryAccessCode($accessCode);

if (isset($_POST['form_key'])) {
    if (isset($_POST['TransactionID'])) {

        $payment = new PaymentDetails(array(
            'TotalAmount'   => $queryAccessCode->getTotalAmount(),
        ));
        $capturePaymentResponse = $rapidSDKClient->capturePayment($_POST['TransactionID'], $payment);

        $errors = $capturePaymentResponse->getErrors();
        if (!empty($errors)) {
            print_r($errors); die;
        } else {
            $queryTransactionResponse = $rapidSDKClient->queryTransaction($_POST['TransactionID']);

            $errs = $queryTransactionResponse->getErrors();
            if (!empty($errs)) {
                print_r($errs);
            }
        }
    }
    $transactions = $queryTransactionResponse->getTransactions();
    $transaction = array_shift($transactions);
    print 'Create transaction complete';
    print '<pre>'; print_r($transaction); die;
}
?>
<div align="center">
    <h2>Create Transaction: <span style="color: blue">Responsive Shared Page</span></h2>
    <h3>Step 3: Request the result</h3>
</div>

<?php if ($_GET['pm'] == PaymentMethod::AUTHORISE) { ?>
    <table width="30%">
        <tr>
            <td width="50%">
                <form action="" method="post">
                    <button type="submit">Capture</button>
                    <input type="hidden" name="form_key" value="<?=rand(1000, 9999)?>">
                    <input type="hidden" name="TransactionID" value="<?=$queryAccessCode->getTransactionID()?>">
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <button type="submit">Cancel Capture</button>
                    <input type="hidden" name="form_key" value="<?=rand(1000, 9999)?>">
                </form>
            </td>
        </tr>
    </table>
<?php } ?>

<?php print '<pre>'; print_r($queryAccessCode->toArray()); ?>
