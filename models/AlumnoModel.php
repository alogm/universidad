<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/basedata/Data.php");

class Alumno
{
    private $connection;

    public function __construct()
    {
        $data = new Data();
        $this->connection = $data->connect();
    }
    public function EditPerfilAlumno($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM alumnos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
    public function updatePerfilAlumno($data)
    {
        $contrasena = isset($data["contrasena"]) && $data["contrasena"] !== "" ? password_hash($data["contrasena"], PASSWORD_DEFAULT) : null;

        $stmt = $this->connection->prepare("
            UPDATE alumnos 
            SET 
            matricula = :matricula,
            correo = :correo,           
            " . ($contrasena !== null ? "contrasena = :contrasena," : "") . "
            nombre = :nombre, 
            apellido = :apellido, 
            direccion = :direccion, 
            fecha_nacimieno = :fecha_nacimieno
            WHERE id = :id
            ");

        $stmt->bindParam(':matricula', $data["matricula"]);
        $stmt->bindParam(':correo', $data["correo"]);

        if ($contrasena !== null) {
            $stmt->bindParam(':contrasena', $contrasena);
        }
        $stmt->bindParam(':nombre', $data["nombre"]);
        $stmt->bindParam(':apellido', $data["apellido"]);
        $stmt->bindParam(':direccion', $data["direccion"]);
        $stmt->bindParam(':fecha_nacimieno', $data["fecha_nacimieno"]);

        $stmt->bindParam(':id', $_SESSION['user']['id']);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function DatosMaterias($id_alumno)
    {
        $stmt = $this->connection->prepare(
            "    
            SELECT
            m.materia AS nombre_materia,
            ac.calificacion,
            ac.comentarios
        FROM
            alumnos a
        JOIN
            alumnos_clase ac ON a.id = ac.id_alumno
        JOIN
            clases c ON ac.id_clase = c.id
        JOIN
            materias m ON c.id_materia = m.id
        WHERE
            a.id = :id_alumno;"
        );

        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function todasMaterias()
    {
        $res = $this->connection->query("SELECT * FROM materias");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}
