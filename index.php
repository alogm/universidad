<?php
require_once("./controllers/AdminController.php");
require_once("./models/AdminModel.php");

$urlCompleta = $_SERVER["REQUEST_URI"];
$partes = explode("?", $urlCompleta);
$url = $partes[0];

$controller = new AdminController();

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    switch ($url) {
        case '/index.php':
            $controller->index();
            break;

            case '/vista-home':
                $controller->home();
                break;

        case '/vista-permisos':
            $controller->vistapermiso();
            break;

        case '/vista-maestros':
            $controller->vistamestros();
            break;
        case '/vista-alumnos':
            $controller->vistaalumnos();
            break;

        case '/vista-clases':
            $controller->vistaclases();
            break;

        case '/crear-maestros':
            $controller->crearMaestro();
            break;


        default:
            # code...
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    switch ($url) {
        case '/inicio':
            $controller->login($_POST);
            break;

        default:
            echo "no se encontro ruta";
            break;
    }
}




/*




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


$index = $controller->all();*/
