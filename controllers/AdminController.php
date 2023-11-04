<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/models/AdminModel.php");

class AdminController
{
    public function index()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/views/PrincipalAdmin.php";
    }
    public function all()
    {
        $maestros = new Admin();
        $data = $maestros->all();
        include $_SERVER["DOCUMENT_ROOT"] . "/views/viewsAdmin/viewsMaestrosadmin/VistaMaestroAdmin.php";
    }
    public function create()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/views/viewsAdmin/viewsMaestrosAdmin/AddMaestroAdmin.php";
    }
    public function add($data)
    {
        $maestro = new Admin();
        $newmaestro = $maestro->add($data);

        $newmaestro === true && header("Location: /index.php");
        
        var_dump($newmaestro);
    }

}
