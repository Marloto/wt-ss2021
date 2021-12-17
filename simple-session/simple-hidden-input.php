<?php

$counter = 0;
if(isset($_POST["counter"])) {
    $counter = intval($_POST["counter"]);
}
$counter ++;
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
    <p>Counter: <?= $counter; ?></p>
    <form method="post">
        <input type="hidden" value="<?= $counter ?>" name="counter">
        <!-- 1. Strategie: alles was notwendig ist, mit jeder Anfrage über GET oder POST an den Server senden -->
        <!--Verlinkungen zw. Ansichten über Buttons, damit alle Formulardaten an den Server geliefert werden-->
        <button>Nochmal laden</button>
    </form>
</body>
</html>