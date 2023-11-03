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
        $res = $this->connection->query("SELECT * FROM maestros");
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
        $foto = $data['foto'];
        $id_maestro = $data['id_maestro'];

        $res = $this->connection->query("INSERT INTO  maestro (maestro, email, contrasena, direccion, telefono, foto, id_maestro)
VALUES ('$maestro', '$email', '$contrasena', '$direccion', '$telefono', '$foto', '$id_maestro')");

if($res){
    return true;
  }
  return false;
    }
    public function __destruct() {
        $this->connection = null; // Cierra la conexión a la base de datos.
    }
    

}