<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="post">
        <input type="text" placeholder="Nachricht eingeben" name="wert1" value="">
        <input type="text" placeholder="Nachricht2 eingeben" name="wert2" value="">
        <!--input name="action" value="doSomething" type="hidden"-->
        <button type="submit" name="action" value="doSomething">Absenden</button>
        <button type="submit" name="action" value="doOtherthing">Absenden 2</button>
    </form>

    <?php
    // if(count($_POST) != 0) { 1. Variante, zählen
    // if($_GET["action"] === "doSomething") { // 2. Variante schauen, ob ein spezielles Feld existiert (über Query-Teil)
    if(isset($_POST["action"])) {
        if(isset($_POST["wert1"])) {
            if(empty(trim($_POST["wert1"]))) {
                echo "Hier fehlt was (wert1)<br>";
            } else {
                echo "Wert1 ist da<br>";
            }
        }


        if($_POST["action"] === "doSomething" || $_POST["action"] === "doOtherthing") { // 3. Variante schauen, ob ein spezielles Input-Feld existiert
            echo "GET Daten: ";
            var_dump($_GET); // ggf. hat $_GET nicht ausschließlich was mit HTTP-GET zu tun, sondern viel mehr mit dem Query-Teil der Anfrage
            echo "<br>";
            echo "POST Daten: ";
            var_dump($_POST);
            echo "<br>";
            echo "Anzahl der Elemente: " . count($_POST);
            echo "<br>";
            echo "REQUEST Daten: ";
            var_dump($_REQUEST);
            echo "<br>";
        }
    }

    // 1. herausfinden ob ein Formular abgesendet wurde
    // -> Indikator finden, ob das Formular gerade abgesendet wurde
    // 2. prüfen ob informationen da sind, und ggf. nicht leer
    // -> mittels isset prüfen, ob etwas in $_POST oder $_GET existiert
    // -> empty für ggf. leere Informationen
    // -> trim um Leerzeichen / Whitespaces am Anfang und Ende einer Zeichenkette zu entfernen, Ergebnis ist der gekürzte String
    // 3. ausfüllen von Formularen mit bestehenden Informationen
    // -> was wäre notwendig, damit ein übermittelter Wert wieder im Formular ausgegeben wird?
    // -> wie kann man in HTML-Input-Feldern einen Wert vorausfüllen? -> value-Attribut
    ?>
</body>
</html>