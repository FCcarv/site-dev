<?php



$controller = require BASE.'/app/functions/controllers.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller();
    die();
}

$data = $controller();
