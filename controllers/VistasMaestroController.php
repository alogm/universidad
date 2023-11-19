<?php

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
  
    public function MaestroVistaAlumnos()
    {
        include ($_SERVER["DOCUMENT_ROOT"] . "/views/viewsMaestro/VistaAlumnosMaestro.php");
    }

}