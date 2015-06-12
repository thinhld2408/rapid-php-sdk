<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'config.php';
ini_set("error_reporting", E_ALL & ~E_DEPRECATED);

$codes = isset($_POST['codes']) ? $_POST['codes'] : '';
$lang = isset($_POST['lang']) ? $_POST['lang'] : '';
$messages = array();

if (isset($_POST['form_key'])) {
    $obj = new Rapid\Type\Response\CancelAuthorisationResponse();
    $obj->setErrors($_POST['codes']);
    $obj->prepareMessages($_POST['lang']);

    if (count($obj->getErrors()) > 0) {
        $messages = $obj->getErrors();
    }
}

$title = 'Test Messages';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>
<?php include 'header.php' ?>
<div align="center">
    <h2><?= $title ?></h2>
</div>
<form action="" method="POST">
    <input type="hidden" name="form_key" value="<?= rand(1000, 9999) ?>">
    <table width="50%" border="0" style="border-collapse: collapse">
        <tr>
            <td width="30%">Message Codes :</td>
            <td>
                <input type="text" required name="codes" value="<?php echo $codes ?>" placeholder="Message Codes">
            </td>
        </tr>
        <tr>
            <td width="30%">Language :</td>
            <td>
                <input type="text" required name="lang" value="<?php echo $lang ?>"
                       placeholder="Language Code. eg: en ..">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit">Submit</button>
            </td>
        </tr>
    </table>
</form>
        <pre>
            <?php
            if (isset($_POST['form_key'])) {
                print_r($messages);
            }
            ?>
        </pre>
<style type="text/css">
    input[type=text] {
        width: 100%;
    }
</style>

</body>
</html>