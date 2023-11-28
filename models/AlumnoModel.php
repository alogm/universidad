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

        
        // Verificar si la contraseña se proporciona y no está en blanco antes de encriptarla
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

        // Incluir la contraseña solo si se proporciona y no está en blanco
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
}
