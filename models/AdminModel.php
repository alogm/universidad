<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/basedata/Data.php");

class Admin
{
    private $connection;

    public function __construct()
    {
        $data = new Data();
        $this->connection = $data->connect();
    }
    public function all()
    {
        $res = $this->connection->query("SELECT * FROM maestros");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function AllAlumnos()
    {
        $res = $this->connection->query("SELECT * FROM alumnos");
        $alumno = $res->fetchAll(PDO::FETCH_ASSOC);

        return $alumno;
    }
    public function add($data)
    {
        $nombre = $data['nombre'];
        $correo = $data['correo'];
        $direccion = $data['direccion'];
        $fechaNacimieno = $data['fecha_nacimieno'];


        $res = $this->connection->query("INSERT INTO  maestros (nombre, correo, direccion, fecha_nacimieno)
                VALUES ('$nombre', '$correo', '$direccion', '$fechaNacimieno')");

        if ($res) {
            return true;
        }
        return false;
    }
    public function Delete($id)
    {
        $this->connection->query("DELETE FROM maestros WHERE id=$id");
    }
    

    public function update($id, $nombre, $correo, $direccion, $fecha_nacimieno)
    {
        try {
            
            $statement = $this->connection->prepare("UPDATE maestros SET nombre = :nombre, correo = :correo, direccion = :direccion, fecha_nacimieno = :fecha_nacimieno WHERE id = :id");
            
    
            $statement->bindParam(":nombre", $nombre);
            $statement->bindParam(":correo", $correo);
            $statement->bindParam(":direccion", $direccion);
            $statement->bindParam(":fecha_nacimieno", $fecha_nacimieno);
            $statement->bindParam(":id", $id);
        
            // Ejecuta la consulta
            $result = $statement->execute();
    
            return $result !== false;
        } catch (PDOException $e) {
            echo "Error en la consulta de actualización: " . $e->getMessage();
            return false;
        }
    }
    
    
}


/*  public function update($data)
    {
        $id = $data['id'];
        $maestro = $data['maestro'];
        $email = $data['email'];
        $contrasena = $data['contrasena'];
        $direccion = $data['direccion'];
        $telefono = $data['telefono'];
        $id_maestro = $data['id_maestro'];

        $res = $this->connection->query("UPDATE maestros SET maestro='$maestro', email='$email', contrasena ='$contrasena', direccion='$direccion', telefono='$telefono', id_maestro='$id_maestro' WHERE id ='$id'");
    } */