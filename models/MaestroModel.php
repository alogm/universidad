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
    public function DatosAlumno($id_maestro)
    {
        $stmt = $this->connection->prepare("
            SELECT 
                a.nombre AS nombre_alumno,
                ac.calificacion,
                ac.comentarios
            FROM 
                alumnos_clase ac
            JOIN 
                alumnos a ON ac.id_alumno = a.id
            JOIN 
                clases c ON ac.id_clase = c.id
            JOIN 
                materias m ON c.id_materia = m.id
            JOIN
                maestros ma ON c.id_maestro = ma.id
            WHERE
                ma.id = :id_maestro
        ");

        $stmt->bindParam(':id_maestro', $id_maestro, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function editPerfilMaestro($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM maestros WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
    public function updatePerfilMaestro($data)
    {
        session_start();

        $contrasena = isset($data["contrasena"]) && $data["contrasena"] !== "" ? password_hash($data["contrasena"], PASSWORD_DEFAULT) : null;

        $stmt = $this->connection->prepare("
        UPDATE maestros 
        SET 
        nombre = :nombre, 
        correo = :correo,
        " . ($contrasena !== null ? "contrasena = :contrasena," : "") . "
        direccion = :direccion, 
        fecha_nacimiento = :fecha_nacimiento,
        apellido = :apellido
        WHERE id = :id
    ");

        $stmt->bindParam(':nombre', $data["nombre"]);
        $stmt->bindParam(':correo', $data["correo"]);

        if ($contrasena !== null) {
            $stmt->bindParam(':contrasena', $contrasena);
        }

        $stmt->bindParam(':direccion', $data["direccion"]);
        $stmt->bindParam(':fecha_nacimiento', $data["fecha_nacimieno"]);
        $stmt->bindParam(':apellido', $data["apellido"]);
        $stmt->bindParam(':id', $_SESSION['user']['id']);

        $stmt->execute();
    }
}
