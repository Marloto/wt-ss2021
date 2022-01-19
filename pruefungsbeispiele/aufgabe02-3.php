<!-- Formulardaten verarbeiten -->
<?php

$zahl1 = 0;
$zahl2 = 0;
$ergebnis = "";

if(isset($_POST["zahl1"])) {
    $zahl1 = $_POST["zahl1"];
}
if(isset($_POST["zahl2"])) {
    $zahl2 = $_POST["zahl2"];
}

$plusChecked = "";
$malChecked = "";
if(isset($_POST["operator"])) {
    $operator = $_POST["operator"];
    // Wie könnte man jetzt zahl1 und zahl2 mit dem raido-Feld verrechnen?
    if($_POST["operator"] == "1") {
        $plusChecked = "checked";
        $ergebnis = $zahl1 + $zahl2;
    } else {
        $malChecked = "checked";
        $ergebnis = $zahl1 * $zahl2;
    }
}




?>

<!-- Formular anpassen -->
<!DOCTYPE html>
<html>

<head>
    <title>Taschenrechner</title>
</head>

<body>
    <form method="post">
        <p>Zahl 1: <input type="number" name="zahl1"
            value="<?= $zahl1 ?>"> </p>
        <input type="radio" value="1" id="plus" name="operator" checked
            <?= $operator == "1" ? "checked" : "" ?>
            <?php if($operator == "1") {?> checked <?php } ?>
            <?php if($operator == "1") { echo" checked "; } ?>
            <?= $plusChecked ?>
            >
        <label for="plus">+</label><br>
        <input type="radio" value="2" id="mal" name="operator"
            <?= $malChecked ?>
            > <label for="mal">*</label>
        <p>Zahl 2: <input type="number" name="zahl2" 
            value="<?= $zahl2 ?>">
            <button>Berechnen</button>
        </p>
    </form>
    <!-- Ergebnis ausgeben -->

    <?php
    if(isset($_POST["zahl1"])) {
    ?>
    <p>Ergebnis: <?= $ergebnis; ?></p>
    <?php
    }
    ?>



    </body>
</html>