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

            $stmt = $this->connection->query("SELECT * FROM alumnos WHERE correo = '$correo'");
            $dataUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$dataUsuario) {

                $stmt = $this->connection->query("SELECT * FROM maestros WHERE correo = '$correo'");
                $dataUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }

        return $dataUsuario;
    }
    public function Logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = array();

        session_destroy();

        header("location: ../index.php");
        exit();
    }
}
