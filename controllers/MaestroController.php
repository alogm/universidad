<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/models/MaestroModel.php");

class MaestroController
{
    public function HomeMaestro()
    {
        include($_SERVER["DOCUMENT_ROOT"] . "/views/PrincipalMaestro.php");
    }
    public function EditPerfilMaestro($id)
    {
        $res = new Maestros();
        $data = $res->editPerfilMaestro($id);
        include($_SERVER["DOCUMENT_ROOT"] . "/views/viewsMaestro/editePerfil.php");
    }
    public function updatePerfilMaestro($data)
    {
        $res = new Maestros();
        $updateData = $res->updatePerfilMaestro($data);

        header("Location: /home-maestro");
    }

    public function MaestroVistaAlumnos($id_maestro)
    {
        $vistaAlumnos = new Maestros();
        $data = $vistaAlumnos->DatosAlumno($id_maestro);

        include($_SERVER["DOCUMENT_ROOT"] . "/views/viewsMaestro/VistaAlumnosMaestro.php");
    }
}
