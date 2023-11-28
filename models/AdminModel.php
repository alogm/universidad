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
        m.materia,
        ma.nombre AS nombre_maestro,
        COUNT(ac.id_alumno) AS total_alumnos
                FROM materias m
                JOIN clases c ON m.id = c.id_materia
                JOIN maestros ma ON c.id_maestro = ma.id
                LEFT JOIN alumnos_clase ac ON c.id = ac.id_clase
                GROUP BY m.id, ma.id, ma.nombre;");
        $data = $res->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    //consulta a la base de datos cuantos alumnos hay inscritos en las clases
    public function Roles()
    {
        $res = $this->connection->query("SELECT
        u.nombre AS nombre_usuario,
        r.rol,
        CASE
            WHEN r.rol = 'maestro' THEN m.nombre
            WHEN r.rol = 'alumno' THEN a.nombre
            ELSE ''
        END AS nombre_persona
            FROM
                usuarios u
            JOIN
                roles r ON u.rol_id = r.id
            LEFT JOIN
                maestros m ON u.id = m.id_rol
            LEFT JOIN
                alumnos a ON u.id = a.id_rol;
            ");
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
        $fechaNacimiento = $data['fecha_nacimieno'];
        $idMateria = $data['id_materia'];


        $stmt = $this->connection->prepare("INSERT INTO maestros (nombre, correo, direccion, fecha_nacimiento) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombre, $correo, $direccion, $fechaNacimiento]);

        $idMaestro = $this->connection->lastInsertId();


        $stmt = $this->connection->prepare("INSERT INTO clases (id_maestro, id_materia) VALUES (?, ?)");
        $stmt->execute([$idMaestro, $idMateria]);

        return true;
    }
    public function obtenerListaMaterias()
    {
        $res = $this->connection->query("SELECT * FROM materias");
        $materias = $res->fetchAll(PDO::FETCH_ASSOC);
        return $materias;
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
        $res = $this->connection->query("SELECT * FROM maestros WHERE id = $id");

        $data = $res->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
    public function editAlumno($id)
    {
        $res = $this->connection->query("SELECT * FROM alumnos WHERE id = $id");

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
        fecha_nacimiento = '{$data["fecha_nacimieno"]}'
        WHERE id = {$_SESSION["maestro_edit"]}
        ");
        $data = $res->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
    public function updateAlumno($data)
    {
        session_start();
        $res = $this->connection->query("
        UPDATE alumnos 
        SET 
        matricula = '{$data["matricula"]}', 
        correo = '{$data["correo"]}', 
        nombre = '{$data["nombre"]}', 
        apellido = '{$data["apellido"]}', 
        direccion = '{$data["direccion"]}', 
        fecha_nacimieno = '{$data["fecha_nacimieno"]}'
        WHERE id = {$_SESSION["alumno_edit"]}
        ");
        $data = $res->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}
