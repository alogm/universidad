<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/models/MaestroModel.php");

class VistaMaestroController
{
    public function HomeMaestro()
    {
        include ($_SERVER["DOCUMENT_ROOT"] . "/views/PrincipalMaestro.php");
    }
    public function EditPerfilMaestro()
    {
        include ($_SERVER["DOCUMENT_ROOT"] . "/views/viewsMaestro/editePerfil.php");
    }
  
    public function MaestroVistaAlumnos($id)
    {
        $vistaAlumnos = new Maestros();
         $data = $vistaAlumnos->DatosAlumno($id);

        include ($_SERVER["DOCUMENT_ROOT"] . "/views/viewsMaestro/VistaAlumnosMaestro.php");
    }

}