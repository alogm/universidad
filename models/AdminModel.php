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
    //se muestran todos los maestros, alumnos y clases
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
    public function AllClases()
    {
        $res = $this->connection->query("SELECT
	    m.id AS id_materia,
	    m.materia AS nombre_materia,
	    ma.nombre AS nombre_maestro,
	    COUNT(a.id) AS cantidad_alumnos
	    FROM materias m
	    JOIN maestros ma ON m.id = ma.id_materia
	    LEFT JOIN alumnos a ON m.id = a.id_materia
	    GROUP BY m.id, m.materia, ma.nombre;");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function Roles()
    {
        $res = $this->connection->query("SELECT
        CASE
            WHEN alumnos.id IS NOT NULL THEN 'Alumno'
            WHEN maestros.id IS NOT NULL THEN 'Maestro'
        END AS rol,
        COALESCE(alumnos.id, maestros.id) AS usuario_id,
        COALESCE(alumnos.nombre, maestros.nombre) AS nombre,
        usuarios.rol_id
        FROM usuarios
        LEFT JOIN alumnos ON usuarios.id = alumnos.id_rol
        LEFT JOIN maestros ON usuarios.id = maestros.id_rol;");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    //fin muestra maestros, alumnos y clases

    //inicia agregar Maestros y Alumnos
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
    public function addAlumno($data)
    {
        $matricula = $data['matricula'];
        $correo = $data['correo'];
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $direccion = $data['direccion'];
        $fechaNacimieno = $data['fecha_nacimieno'];

        $res = $this->connection->query("INSERT INTO alumnos (matricula, correo, nombre, apellido, direccion, fecha_nacimieno)
        VALUES ('$matricula', '$correo', '$nombre', '$apellido', '$direccion', '$fechaNacimieno')");

        if ($res) {
            return true;
        }
        return false;
    }
    //fin agregar maestros y alumnos

    //inicia eliminar maestro y alumno
    public function Delete($id)
    {
        $this->connection->query("DELETE FROM maestros WHERE id=$id");
    }
    public function DeleteAlumno($id)
    {
        $this->connection->query("DELETE FROM alumnos WHERE id=$id");
    }

    //finaliza eliminar maestro y alumno

    //se ven datos de maestro en el formulario de editar

    public function editMaestro($id)
    {
        $res = $this->connection->query("SELECT * FROM maestros WHERE id =$id");
        $data = $res->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    //edita datos
    public function updateMaestro($data)
    {
        session_start();
        $res = $this->connection->query("
        UPDATE maestros 
        SET 
        nombre = '{$data["nombre"]}', 
        apellido = '{$data["apellido"]}', 
        direccion = '{$data["direccion"]}', 
        fecha_nacimieno = '{$data["fecha_nacimieno"]}'
        WHERE id = {$_SESSION["maestro_edit"]}
        ");
        $data = $res->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}
