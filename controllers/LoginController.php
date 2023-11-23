<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/models/LoginModel.php");

class LoginController
{
    public function login($data)
    {
        $login = new Login();
        $newLogin = $login->loginModel($data);
    
        // Verifica si se encontró un usuario
        if ($newLogin) {
            // Extrae la información del usuario
            extract($newLogin);
    
            if (password_verify($data["contrasena"], $contrasena)) {
                session_start();
    
                // Ajusta el nombre de la columna del rol según la tabla
                if (isset($newLogin['rol_id'])) {
                    $rol_id = $newLogin['rol_id'];
                } elseif (isset($newLogin['id_rol'])) {
                    $rol_id = $newLogin['id_rol'];
                } else {
                    echo "Error: No se encontró la columna del rol";
                    return;
                }
    
                switch ($rol_id) {
                    case '1':
                        header('Location: /vista-home');
                        break;
                    case '2':
                        header('Location: ./views/PrincilpalEstudiante.php');
                        break;
                    case '3':
                        header('Location: ./views/PrincipalMaestro.php');
                        break;
                    default:
                        echo "No se encontró el usuario";
                        break;
                }
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "No se encontró el usuario";
        }
    }
    

}