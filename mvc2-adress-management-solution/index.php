<?php
ini_set("display_errors", 1);

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

session_start();

if (!isset($_SESSION['controller'])) {
    // erster Aufruf: Controller und Data Access Object für Adressen erzeugen
    // und in Session speichern
	$controller = new Controller();
	$_SESSION['controller'] = $controller;
	$_SESSION['adressenDAO'] = new AdressenDAO();
} else {
	$controller = $_SESSION['controller'];
}
$controller->run();
?>