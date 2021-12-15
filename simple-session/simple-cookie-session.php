<?php
session_start();

$_SESSION["irgendwas"] = "test";

if(!isset($_SESSION["counter"])) {
    $_SESSION["counter"] = 0;
}

$_SESSION["counter"] ++;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?= $_SESSION["counter"] ?>
</body>
</html>