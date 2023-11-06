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
   
    public function login($email, $contrasena)
    {
        // Utiliza consultas preparadas para prevenir inyección de SQL
        $consulta = "SELECT * FROM login_db WHERE email = ?";
        $stmt = $this->connection->prepare($consulta);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $email = $resultado->fetch_assoc();

            if (password_verify($contrasena, $email['Contrasena'])) {
                // Inicio de sesión exitoso
                session_start();
                $_SESSION['user_data'] = $email;
                header("location: ../views/perfil.php");
            } else {
                // Contraseña incorrecta
                header("location: /manejo_errores/errorLogin.php");
            }
        } else {
            // Usuario no encontrado
            header("location: /manejo_errores/errorLogin.php");
        }

        $stmt->close();
        $this->connection->close();
    }
}
