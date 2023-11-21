<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/models/AdminModel.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/models/LoginModel.php");


class AdminController
{
    public function login($data)
    {

        $login = new Login();
        $newLogin = $login->loginModel($data);

        extract($newLogin);

        if (password_verify($data["contrasena"], $contrasena)) {

            session_start();

            if ($newLogin) {

                switch ($rol_id) {
                    case '1':

                        header('Location: ./views/PrincipalAdmin.php');
                        break;

                    case '2':

                        header('Location: ./views/PrincilpalEstudiante.php');
                        break;

                    case '3':
                         
                        header('Location: ./views/PrincipalMaestro.php');
                        break;

                    default:
                        echo "no se encontro usuario";
                        break;
                }
            }
        }
    }
    //inicio muestra maestros y alumnos
    public function vistamestros()
    {
        $maestros = new Admin();
        $data = $maestros->all();
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsMaestrosAdmin/VistaMaestroAdmin.php";
    }
    public function vistaalumnos()
    {
        $alumnos = new Admin(); // Cambia a un nombre más apropiado según tus datos
        $data = $alumnos->AllAlumnos(); // Llama al método que obtiene los datos
    
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsAdminEstudiante/VistaAEstudianteAdmin.php";
    }
    public function AllClases()
    {
        $materias = new Admin();
        $data = $materias->AllClases();

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsClasesAdmin/VistaClasesAdmin.php";
    }
    public function Roles()
    {
        $roles = new Admin();
        $data = $roles->Roles();

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsPermisos/AdminPermisos.php";
    }
    //fin de muestra de maestros y alumnos

    //crea maestros y alumnos
    public function crearMaestro($data)
    {
        $maestro = new Admin();
        $newmaestro = $maestro->add($data);

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsMaestrosAdmin/VistaMaestroAdmin.php";
    }
    public function crearAlumno($data)
    {
        $alumno = new Admin();
        $newAlumno = $alumno->addAlumno($data);

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsAdminEstudiante/VistaAEstudianteAdmin.php";
    }
    //fin de crear alumnos y maestros

    //inicia eliminacion de maestros y alumnos
    public function delete($id)
    {
        $maestro = new Admin();
        $delete = $maestro->Delete($id); 

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsMaestrosAdmin/VistaMaestroAdmin.php";
    }
    public function deleteAlumno($id)
    {
        $alumno = new Admin();
        $delete = $alumno->DeleteAlumno($id);

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsAdminEstudiante/VistaAEstudianteAdmin.php";
    }

    //acaba eliminacion de alumnos

    //inicia editar de datos

    public function UpdatePermisos()
    {
        $editPermiso = new Admin();
        $update =$editPermiso->editPermisos();

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsPermisos/EditPermisosAdmin.php";
    }
    public function UpdateAlumnos()
    {
        $editAlumno = new Admin();
        $update = $editAlumno->editAlumno();

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsAdminEstudiante/EditarEstudianteAdmin.php";
    }
    public function UpdateMaestros()
    {
        $editMaestro = new Admin();
        $update = $editMaestro->editMaestro();

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsMaestrosAdmin/EditarMaestroAdmin.php";
    }
    public function UpdateClases()
    {
        $editClases = new Admin();
        $update = $editClases->editClases();

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsClasesAdmin/EditClasesAdmin.php";
    }
    

    


}
