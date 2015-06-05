<?php
use Rapid\RapidSDK;

$rapidSDK = new RapidSDK();
$rapidSDKClient = $rapidSDK->createSDKClient('F9802Cv/5v0y/KmyxJR5ND7ujpSGeM9b3pytdI2UhI+sJzxcxxj0pPRjCpIixTc/IW2mw2', 'Dung1234$');

$accessCode = $_GET['AccessCode'];
$queryAccessCode = $rapidSDKClient->queryAccessCode($accessCode);

?>
<div align="center">
    <h2>Create Transaction: <span style="color: blue">Responsive Shared Page</span></h2>
    <h3>Step 3: Request the result</h3>
</div>

<?php print '<pre>'; print_r($queryAccessCode->toArray()); ?>
