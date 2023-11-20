<?php

class VistasAdminController
{
    public function home()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/PrincipalAdmin.php";
    }
    public function vistapermiso()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsPermisos/AdminPermisos.php";
    }

    public function edidPermisos()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsPermisos/PermisosAdmin.php";
    }
   
    public function vistaalumnos()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsAdminEstudiante/VistaAEstudianteAdmin.php";
    }
    public function vistaclases()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsClasesAdmin/VistaClasesAdmin.php";
    }
    //lleva a la vista de crear (no hace la funcion de crear)
    public function crearMaestro()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsMaestrosAdmin/AddMaestroAdmin.php";
    }
    public function crearAlumno()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsAdminEstudiante/AddEstudianteAdmin.php";
    }

    //finaliza lleva a la vista de crear (no hace la funcion de crear)

    public function index()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/views/login.php";
    }
}
