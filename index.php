<?php

session_start();
require_once("./controllers/AdminController.php"); //controla el agregar, editar, eliminar, de la base de datos, asi como ver todos los maestros y alumnos 
require_once("./controllers/LoginController.php");
require_once("./controllers/VistasAdminController.php"); //solo enruta la vista, no hace ninguna solicitud de post
require_once("./controllers/MaestroController.php"); //solo enruta la vista, no hace ninguna solicitud de post
require_once("./controllers/AlumnoController.php"); //solo enruta la vista, no hace ninguna solicitud de post

$urlCompleta = $_SERVER["REQUEST_URI"];
$partes = explode("?", $urlCompleta);
$url = $partes[0];

$controller = new AdminController(); //controla el agregar, editar, eliminar, de la base de datos, asi como ver todos los maestros y alumnos
$loginController = new LoginController();
$vistasControl = new VistasAdminController(); //solo enruta la vista de admin, no hace ninguna solicitud de post
$MaestroController = new MaestroController(); //solo enruta la vista de naestro, no hace ninguna solicitud de post
$alumnoController = new AlumnoController(); //solo enruta la vista de alumno, no hace ninguna solicitud de post

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    switch ($url) {

            //inicio de login
        case '/index.php':
            $vistasControl->index();
            break;

            // solo muestra el Dashboard de admin, estudiante y maestro
        case '/vista-home':
            $vistasControl->home();
            break;

        case '/home-maestro':
            $MaestroController->HomeMaestro();
            break;

        case '/home-alumnos':
            $alumnoController->HomeAlumno();
            break;

            //fin 

            //muestra los todos los maestros y alumnos en admin

        case '/vista-maestros':
            $controller->vistamestros();
            break;

        case '/vista-alumnos':
            $controller->vistaalumnos();
            break;

        case '/vista-clases':
            $controller->AllClases();
            break;

        case '/vista-permisos':
            $controller->Roles();
            break;

            //muestra los datos de del usuario en el formulario de editar

        case '/vista-edit':
            $controller->edidMaestro($_GET["id"]);
            break;

        case '/vista-edit-alumno':
            $controller->editAlumno($_GET["id"]);
            break;

        case '/edit-clases':
            $controller->editClases($_GET["id"]);
            break;

        

                // edita la pantalla individual de cada maestor y cada alumno

        case '/edit-perfil-maestro':
            $id_maestro = $_SESSION['user']['id'] ?? null;
            $MaestroController->EditPerfilMaestro($id_maestro);
            break;

            case '/edit-calificaciones':
                $MaestroController->editCalificaciones($_GET["id"]);
                break;

        case '/edit-perfil-alumno':
            $id_alumno = $_SESSION['user']['id'] ?? null;
            $alumnoController->EditPerfilAlumno($id_alumno);
            break;

            //fin 

            // solo enrutamiento de vistas no hace ninguna accion post

            // a) vistas de admin

        case '/crear-maestros':
            $controller->obtenerListaMaterias();
            break;

        case '/crear-alumnos':
            $vistasControl->crearAlumno();
            break;

            // b) vistas de maestros
        case '/vista-maestro-alumnos':
            $id_maestro = $_SESSION['user']['id'];
            $MaestroController->MaestroVistaAlumnos($id_maestro);
            break;



            // c) vistas de alumno
        case '/calificaciones-alumno':
            $id_alumno = $_SESSION['user']['id'];
            $alumnoController->DatosMaterias($id_alumno);
            break;

        case '/clases-alumno':
            $id_alumno = $_SESSION['user']['id'];
            $alumnoController->ClasesAlumno($id_alumno);
            break;

            //fin de enrutamiento solo vista 

        default:
            echo "la pagina no esta disponible ";
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    switch ($url) {
            //solicitud de login
        case '/inicio':
            $loginController->login($_POST);
            break;

            //crea datos de mestros y alumnos
        case '/crear-maestro':
            $controller->crearMaestro($_POST);
            break;

        case '/crear-alumno':
            $controller->crearAlumno($_POST);
            break;

        case '/crear-materia':
            $controller->crearMateria($_POST);
            break;
            //finaliza creacion de datos de maestros y alumnos

            //inicia eliminacion de de maestros y alumnos
        case '/maestro-delete':
            $controller->delete($_POST["id"]);
            break;

        case '/alumno-delete':
            $controller->deleteAlumno($_POST["id"]);
            break;

            //finaliza eliminacion de maestros y alumnos

            //puede editar los datos el admin
        case '/maestro-update':
            $controller->updateMaestro($_POST);
            break;

        case '/alumno-update':
            $controller->updateAlumno($_POST);
            break;

        case '/materia-update';
        echo "entrando mal";
            //$controller->updateClase($_POST);

            // el perdil del maestro puede editar sus datos
        case '/perfil-maestro-update':
            $MaestroController->updatePerfilMaestro($_POST);
            break;

            //el perfil del alumno puede editar sus datos
        case '/perfil-alumno-update':
            $alumnoController->updatePerfilAlumno($_POST);
            break;

        case '/calificacion-update':
            $MaestroController->updateCalificacion($_POST);
            break;

        case '/exit':
            $loginController->Logout($_POST);
            break;




        default:
            echo "no se encontro ruta";
            break;
    }
}
