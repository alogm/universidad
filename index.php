<?php
require_once("./controllers/AdminController.php");

require_once("./controllers/VistasAdminController.php");
require_once("./controllers/VistasMaestroController.php");
require_once("./controllers/VistaAlumnoController.php");
require_once("./models/AdminModel.php");

$urlCompleta = $_SERVER["REQUEST_URI"];
$partes = explode("?", $urlCompleta);
$url = $partes[0];

$controller = new AdminController();

$vistasControl = new VistasAdminController();
$vistaMaestro = new VistaMaestroController();
$vistaAlumno = new VistaAlumnoController();

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    switch ($url) {
        case '/index.php':
            $vistasControl->index();
            break;

        case '/vista-home':
            $vistasControl->home();
            break;

        case '/vista-permisos':
            $vistasControl->vistapermiso();
            break;

        case '/vista-edid-permisos':
            $vistasControl->edidPermisos();
            break;

        case '/vista-maestros':
            $controller->vistamestros();
            break;

            // lleva solo a la vista para crear datos
        case '/crear-maestros':
            $vistasControl->crearMaestro();
            break;

        case '/crear-alumnos';
            $vistasControl->crearAlumno();
            break;

            //finaliza la ruta de solo vista 

        case '/vista-alumnos':
            $controller->vistaalumnos();
            break;

        case '/vista-clases':
            $vistasControl->vistaclases();
            break;

        case '/home-maestro';
            $vistaMaestro->HomeMaestro();
            break;

        case '/vista-maestro-alumnos':
            $vistaMaestro->MaestroVistaAlumnos();
            break;

        case '/edit-perfil-maestro';
            $vistaMaestro->EditPerfilMaestro();
            break;

        case '/home-alumnos';
            $vistaAlumno->HomeAlumno();
            break;

        case '/calificaciones-alumno';
            $vistaAlumno->Calificaciones();
            break;

        case '/clases-alumno';
            $vistaAlumno->ClasesAlumno();
            break;

        case '/edit-alumno';
            $vistaAlumno->EditPerfilAlumno();
            break;



        default:
            echo "la pagina no esta disponible ";
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    switch ($url) {
        case '/inicio':
            $controller->login($_POST);
            break;

            //crea datos de mestros y alumnos
        case '/crear-maestro':
            $controller->crearMaestro($_POST);
            break;

        case '/crear-alumno';
            $controller->crearAlumno($_POST);
            break;
            //finaliza creacion de datos de maestros y alumnos

            //inicia eliminacion de de maestros y alumnos
        case '/maestro-delete':
            $controller->delete($_POST["id"]);
            break;

        case '/alumno-delete';
            $controller->deleteAlumno($_POST["id"]);
            break;

            //finaliza eliminacion de maestros y alumnos

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
