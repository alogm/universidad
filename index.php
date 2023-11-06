<?php
require_once("./controllers/AdminController.php");
require_once("./models/AdminModel.php");

$urlCompleta = $_SERVER["REQUEST_URI"];
$partes = explode("/", $urlCompleta);

$controller = new AdminController();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (end($partes) === "create") {
        $controller->create();
        die();
    }
    
    if (end($partes) === "delete" && isset($_GET['id'])) {
        $controller->delete($_GET['id']);
        die();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (end($partes) === "create") {
        $controller->add($_POST);
        die();
    }
    
    if (end($partes) === "delete" && isset($_POST['id'])) {
        $controller->delete($_POST['id']);
        die();
    }
}


$index = $controller->all();
