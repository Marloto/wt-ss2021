<?php
class Position
{
    private $x;
    private $y;
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    public function getX()
    {
        return $this->x;
    }
    public function getY()
    {
        return $this->y;
    }
}
/* Aufgabenteil a */
// wie werden sitzungen in PHP gestartet?
session_start();

// array in der sitzung speichern?
if(!isset($_SESSION["positionen"])) {
    $_SESSION["positionen"] = array();
}




/* Aufgabenteil b */
if(isset($_POST['action'])) {
    if($_POST["action"] == "clear") {
        $_SESSION["positionen"] = array();
    }
    
    if($_POST["action"] == "add") {
        // mit add müssten x und y hinzugefügt werden
        $x = $_POST["x"];
        $y = $_POST["y"];
        $_SESSION["positionen"][] = new Position($x, $y);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kasse</title>
</head>

<body>
    <h1>Streckenliste</h1>
    <h2>Abfolge</h2>
    <ul>
        <?php
        /* Aufgabenteil c */
        foreach($_SESSION["positionen"] as $element) {
            echo "<li>" . $element->getX() . "/" . $element->getY() . "</li>";
        }
        ?> 
    </ul>
    <h2>Distanz</h2> <?php
                        /* Aufgabenteil d */
function distance($p, $q) {
    return sqrt(pow($p->getX() - $q->getX(), 2) + pow($p->getY() - $q->getY(), 2));
}

if(sizeof($_SESSION["positionen"]) >= 2) {
    $distance = 0;
    for($i = 1; $i < sizeof($_SESSION["positionen"]); $i ++) {
        $distance += distance($_SESSION["positionen"][$i - 1], $_SESSION["positionen"][$i]);
    }
    echo "<p>Aktuelle Distanz: " . $distance . "</p>";
} else {
    echo "<p>Zu wenig Positionen erfasst</p>";
}


                        ?>
    <h2>Neuer Eintrag</h2>
    <form method="post">
        <input name="x" type="number" placeholder="x">
        <input name="y" type="number" placeholder="y">
        <button name="action" value="add">Eintragen</button>
        <button name="action" value="clear">Liste Leeren</button>
    </form>
</body>

</html>