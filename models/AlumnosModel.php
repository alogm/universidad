<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/basedata/Data.php");

class viewsEstudiante
{
    private $connection;

    public function __construct()
    {
        $data = new Data();
        $this->connection = $data->connect();
    }
    public function AllAlumnos()
    {
        $res = $this->connection->query("SELECT * FROM alumnos");
        $alumno = $res->fetchAll(PDO::FETCH_ASSOC);

        return $alumno;
    }

}