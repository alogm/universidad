<?php

class VistasController
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
    public function crearMaestro()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsMaestrosAdmin/AddMaestroAdmin.php";
    }
    public function index()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/views/login.php";
    }
}
