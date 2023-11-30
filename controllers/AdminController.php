<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/models/AdminModel.php");



class AdminController
{

    //inicio muestra maestros y alumnos
    public function vistamestros()
    {
        $maestros = new Admin();
        $data = $maestros->all();
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsMaestrosAdmin/VistaMaestroAdmin.php";

        
    }
    public function vistaalumnos()
    {
        $alumnos = new Admin(); 
        $data = $alumnos->AllAlumnos(); 

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsAdminEstudiante/VistaAEstudianteAdmin.php";
    }
    public function obtenerListaMaterias()
    {
        $materias = new Admin();
        $data = $materias->obtenerListaMaterias();

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsMaestrosAdmin/AddMaestroAdmin.php";
    }
    public function VistaEditClases()
    {
        $maestro = new Admin();
        $data = $maestro->all();
        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsClasesAdmin/AddClasesAdmin.php";
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
        $data['materias'] = $maestro->obtenerListaMaterias();
        $newmaestro = $maestro->add($data);

        header("Location: /vista-maestros");
    }

    public function crearAlumno($data)
    {
        $alumno = new Admin();
        $newAlumno = $alumno->addAlumno($data);

        header("Location: /vista-alumnos");
    }
    public function crearMateria($data)
    {
        $alumno = new Admin();
        $newAlumno = $alumno->addClase($data);

        header("Location: /vista-clases");
    }

    //fin de crear alumnos y maestros

    //inicia eliminacion de maestros y alumnos
    public function delete($id)
    {
        $maestro = new Admin();
        $delete = $maestro->Delete($id);

        header("Location: /vista-maestros");
    }
    public function deleteAlumno($id)
    {
        $alumno = new Admin();
        $delete = $alumno->DeleteAlumno($id);

        header("Location: /vista-alumnos");
    }
    public function DeleteMateria($id)
    {
        $alumno = new Admin();
        $delete = $alumno->DeleteMateria($id);

        header("Location: /vista-clases");
    }

    //acaba eliminacion de alumnos

    //vista de datos en el formulario de editar 

    public function edidMaestro($id)
    {
        $res = new Admin();
        $data = $res->editMaestro($id);

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsMaestrosAdmin/EditarMaestroAdmin.php";
    }

    public function editAlumno($id)
    {
        $res = new Admin();
        $data = $res->editAlumno($id);

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsAdminEstudiante/EditarEstudianteAdmin.php";
    }
    public function editClases($id)
    {
        $res = new Admin();
        $data = $res->editClases($id);
        $maestros = $res->all();

        include $_SERVER['DOCUMENT_ROOT'] . "/views/viewsAdmin/viewsClasesAdmin/EditClasesAdmin.php";
    }

    //inicia editar de datos
    public function updateMaestro($data)
    {
        $res = new Admin();
        $updateData = $res->updateMaestro($data);

        header("Location: /vista-maestros");
    }
    public function updateAlumno($data)
    {
        $res = new Admin();
        $updateData = $res->updateAlumno($data);

        header("Location: /vista-alumnos");
    }
    public function updateClase($data)
    {
        $res = new Admin();
        $updateData = $res->updateClase($data);
    
        header("Location: /vista-clases"); 
        exit(); 
    }


}
