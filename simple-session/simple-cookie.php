<?php
// $_COOKIE
// setcookie() neue Funktion zum setzen neuer Cookies

$counter = 0;
if(isset($_COOKIE["counter"])) {
    $counter = intval($_COOKIE["counter"]);
}

$counter ++;

setcookie('counter', $counter);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Counter: <?= $_COOKIE["counter"]; ?></p>
</body>
</html>