<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/basedata/Data.php");

class Login
{
    private $connection;

    public function __construct()
    {
        $data = new Data();
        $this->connection = $data->connect();
    }
   
    public function loginModel($data)
    {
        extract($data);
    
        $stmt = $this->connection->query("SELECT * FROM usuarios WHERE correo = '$correo'");
        $dataUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$dataUsuario) {
            // El usuario no se encontró en la tabla de usuarios, ahora verifica en otras tablas.
            $stmt = $this->connection->query("SELECT * FROM alumnos WHERE correo = '$correo'");
            $dataUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$dataUsuario) {
                // No se encontró en la tabla de alumnos, verifica en la tabla de maestros.
                $stmt = $this->connection->query("SELECT * FROM maestros WHERE correo = '$correo'");
                $dataUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
                // Puedes seguir añadiendo más bloques como este para otras tablas si es necesario.
            }
        }
    
        return $dataUsuario;
    }
    
}
