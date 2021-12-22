<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function($class) {
    include str_replace('\\', '/', $class) . '.php';
});

// Simulation Datenbank
$users = new Model\UserDAO();
$users->insertUser("Ich", "12345678");

$controller = new Controller($users);
$controller->run();
?>
