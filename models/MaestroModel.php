<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/basedata/Data.php");

class Maestros
{
    private $connection;

    public function __construct()
    {
        $data = new Data();
        $this->connection = $data->connect();
    }

    public function DatosAlumno($id)
    {
    $res = $this->connection->query("SELECT
    m.id AS id_maestro,
    m.nombre AS nombre_maestro,
    a.id AS id_alumno,
    a.nombre AS nombre_alumno,
    ac.calificacion
    FROM maestros m
    JOIN clases c ON m.id = c.id_maestro
    JOIN alumnos_clases ac ON c.id = ac.id_clase
    JOIN alumnos a ON ac.id_alumno = a.id
    WHERE m.id = $id");
    $data = $res->fetchAll(PDO::FETCH_ASSOC);
    return $data;
    }

}
