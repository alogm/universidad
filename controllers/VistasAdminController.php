<?php

class VistasAdminController
{
    //lleva a la vista de crear (no hace la funcion de crear)
    public function home()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/PrincipalAdmin.php";
    }
    public function index()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/views/login.php";
    }
    public function vistaalumnos()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsAdminEstudiante/VistaAEstudianteAdmin.php";
    }

    public function crearMaestro()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsMaestrosAdmin/AddMaestroAdmin.php";
    }
    public function crearAlumno()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsAdminEstudiante/AddEstudianteAdmin.php";
    }
    public function VistaEditPermisos()
    {
            include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsPermisos/EditPermisosAdmin.php";
    }
    public function VistaEditAlumnos()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsAdminEstudiante/EditarEstudianteAdmin.php";
    }
    public function VistaEditClases()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsClasesAdmin/EditClasesAdmin.php";
    }

    //finaliza lleva a la vista de crear (no hace la funcion de crear)
}
