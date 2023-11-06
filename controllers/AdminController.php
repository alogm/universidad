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
    }
    public function delete($id)
    {
        $maestro = new Admin();
        $delete = $maestro->Delete($id); // Asegúrate de que Delete reciba el ID
    
        if ($delete === true) {
            header("Location: /index.php");
            die();
        }
    }
    
    public function actualizar()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/views/viewsAdmin/viewsMaestrosAdmin/EditarMaestroAdmin.php";
    }

    public function update($id, $maestro, $email, $contrasena, $direccion, $telefono, $id_maestro)
    {
        // Crea una instancia de AdminController en lugar de Admin
        $controller = new AdminController();
        
        // Llama a la función update del controlador con los parámetros correctos
        $result = $controller->update($id, $maestro, $email, $contrasena, $direccion, $telefono, $id_maestro);
        
        // Procede con el manejo de resultados
        if ($result !== false) {
            header("Location: /views/viewsAdmin/viewsMaestrosAdmin/VistaMaestroAdmin.php");
        } else {
            header("Location: index.php");
        }
    }
    
    
    

}
