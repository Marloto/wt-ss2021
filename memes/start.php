<?php
// Show errors, should be removed in productive
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load classes, use namespaces as folders
spl_autoload_register(function($class) {
    include str_replace('\\', '/', $class) . '.php';
});

$memes = new MemesDAO();
?>