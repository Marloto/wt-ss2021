<?php
$wert1 = "";
$wert2 = "";

if(isset($_POST["action"])) {
    if($_POST["action"] == "doSomething") {
        if(isset($_POST["wert1"]) && !empty($_POST["wert1"])) {
            $wert1 = $_POST["wert1"];
        }
        if(isset($_POST["wert2"]) && !empty($_POST["wert2"])) {
            $wert2 = $_POST["wert2"];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <form action="form2.php" method="post">
        <input type="text" placeholder="Nachricht eingeben" name="wert1" value="<?= $wert1; ?>">
        <input type="text" placeholder="Nachricht2 eingeben" name="wert2" value="<?= isset($_POST["wert2"]) ? $_POST["wert2"] : ""; ?>">
        <button type="submit" name="action" value="doSomething">Absenden</button>
    </form>

    <?php
    if(!empty($wert1) || !empty($wert2)) {
        echo "<p>$wert1 / $wert2</p>";
    }
    ?>
</body>
</html>