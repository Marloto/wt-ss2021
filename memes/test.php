<?php
require("start.php");

// Ziel: Schnittstelle, die JSON anbietet!
//header("Content-Type: application/json");

$requestType = $_SERVER['REQUEST_METHOD'];

if(isset($_REQUEST['_url'])) {
    $url = $_REQUEST['_url'];
    
    echo "REQUEST_TYPE: " . $requestType . "<br>";
    echo "URL: " . $url;

    /**
     * if(/meme && methode == GET) -> liste
     * if(/meme/<id> && methode == GET) -> ausliefern von einem element
     * if(/meme/<id> && method == PUT) -> aktualisieren von einem element
     * if(/meme && method == POST) -> hinzufügen von eines neuen elements
     * if(/meme/<id> && method == DELETE) -> löschen von einem element
     */
}
?>