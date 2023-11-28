<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/models/AlumnoModel.php");

class AlumnoController
{
    public function HomeAlumno()
    {
        include ($_SERVER["DOCUMENT_ROOT"] . "/views/PrincilpalEstudiante.php");
    }
 
    public function ClasesAlumno()
    {
        include ($_SERVER['DOCUMENT_ROOT'] . "/views/viewsEstudiante/clases.php");
    }
    public function EditPerfilAlumno($id)
    {
        $alumno = new Alumno();
        $data =$alumno->EditPerfilAlumno($id);
        include ($_SERVER['DOCUMENT_ROOT'] . "/views/viewsEstudiante/EditePerfil.php");
    }
    public function updatePerfilAlumno($data)
    {
        $res = new Alumno();
        $data = $res->updatePerfilAlumno($data);

        header("Location: /home-alumnos");
    }
    public function DatosMaterias($id_alumno)
    {
        $res = new Alumno();
        $data = $res->DatosMaterias($id_alumno);

        include_once ($_SERVER["DOCUMENT_ROOT"] . "/views/viewsEstudiante/calificaciones.php");
    }

   

    

}