<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../config.php';

$step = isset($_GET['s']) ? $_GET['s'] : 'step1';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Transparent Redirect</title>
    <script type="text/javascript" src="../js/jquery.js"></script>
</head>

<body>

    <?php include $step . '.php' ?>

</body>
</html>
