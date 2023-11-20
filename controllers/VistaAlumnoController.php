<?php

class VistaAlumnoController
{
    public function HomeAlumno()
    {
        include ($_SERVER["DOCUMENT_ROOT"] . "/views/PrincilpalEstudiante.php");
    }
    public function Calificaciones()
    {
        include ($_SERVER['DOCUMENT_ROOT'] . "/views/viewsEstudiante/calificaciones.php");
    }
    public function ClasesAlumno()
    {
        include ($_SERVER['DOCUMENT_ROOT'] . "/views/viewsEstudiante/clases.php");
    }
    public function EditPerfilAlumno()
    {
        include ($_SERVER['DOCUMENT_ROOT'] . "/views/viewsEstudiante/EditePerfil.php");
    }
}