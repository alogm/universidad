<?php
require_once("./controllers/AdminController.php");
require_once("./models/AdminModel.php");



$controller = new AdminController();
$index = $controller->all();


