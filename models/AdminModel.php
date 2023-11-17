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
    public function index()
    {
    }
    public function all()
    {
        $res = $this->connection->query("SELECT * FROM usuarios");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function add($data)
    {
        $maestro = $data['maestro'];
        $email = $data['email'];
        $contrasena = $data['contrasena'];
        $direccion = $data['direccion'];
        $telefono = $data['telefono'];
        $id_maestro = $data['id_maestro'];

        $res = $this->connection->query("INSERT INTO  maestros (maestro, email, contrasena, direccion, telefono, id_maestro)
                VALUES ('$maestro', '$email', '$contrasena', '$direccion', '$telefono', '$id_maestro')");

        if ($res) {
            return true;
        }
        return false;
    }
    public function Delete($id)
    {
        echo "Eliminando ID: " . $id; // Verifica si el método se ejecuta y muestra el ID
        $res = $this->connection->query("DELETE FROM maestros WHERE id ='$id'");
        var_dump($res); // Verifica si la consulta de eliminación devuelve algún error
    
        return $res !== false; // Devuelve true si la eliminación fue exitosa, de lo contrario, devuelve false
    }
    

    public function update($id, $maestro, $email, $contrasena, $direccion, $telefono, $id_maestro)
    {
        // Prepara la consulta SQL
        $stament = $this->connection->prepare("UPDATE maestros SET maestro = :maestro, email = :email, contrasena = :contrasena, direccion = :direccion, telefono = :telefono, id_maestro = :id_maestro WHERE id = :id");
        
        // Enlaza los valores a los marcadores de posición
        $stament->bindParam(":maestro", $maestro);
        $stament->bindParam(":email", $email);
        $stament->bindParam(":contrasena", $contrasena);
        $stament->bindParam(":direccion", $direccion);
        $stament->bindParam(":telefono", $telefono);
        $stament->bindParam(":id_maestro", $id_maestro);
        $stament->bindParam(":id", $id);
    
        // Ejecuta la consulta
        return ($stament->execute()) ? $id : false;
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