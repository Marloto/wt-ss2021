<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <!-- Was war alles notwendig für HTML-Formulare, damit etwas sinnvolles abgesendet wird? 
      -> an buttons formaction und formmethod
      -> form braucht action und method (Default selbes dokument und get)
    -->
    <input type="text" placeholder="Nachricht3 eingeben" name="wert3" value="">
    <form action="form.php" method="post">
        <input type="text" placeholder="Nachricht eingeben" name="wert1" value="">
        <input type="text" placeholder="Nachricht2 eingeben" name="wert2" value="">
        <button type="submit">Absenden</button>
    </form>

    <?php
    echo "GET Daten: ";
    var_dump($_GET);
    echo "<br>";
    echo "POST Daten: ";
    var_dump($_POST);
    echo "<br>";
    ?>
</body>
</html>