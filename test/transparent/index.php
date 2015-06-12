<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../config.php';

$step = isset($_GET['s']) ? $_GET['s'] : 'step1';
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Transparent Redirect</title>
    <script type="text/javascript" src="../js/jquery.js"></script>
</head>

<body>

<?php include '../header.php' ?>
<?php include $step . '.php' ?>

</body>
</html>
