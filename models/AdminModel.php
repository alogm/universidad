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
    LEFT JOIN clases c ON m.id = c.id_materia
    LEFT JOIN maestros ma ON c.id_maestro = ma.id
    LEFT JOIN alumnos_clase ac ON c.id = ac.id_clase
    GROUP BY m.id, ma.id, ma.nombre;
    ");
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
    public function addClase($data)
    {
        $materia = $data['materia'];
        $idMaestro = $data['id_maestro'];
    
        $stmt = $this->connection->prepare("INSERT INTO materias (materia) VALUES (?)");
        $stmt->execute([$materia]);
    
        $idMateria = $this->connection->lastInsertId();

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

 
    //fin agregar maestros, alumnos y clases

    //inicia eliminar maestro y alumno
    public function Delete($id)
    {
        try {
            // Inicia una transacción
            $this->connection->beginTransaction();
    
            // Elimina registros en la tabla alumnos_clase que tienen referencia a clases
            $stmt = $this->connection->prepare("DELETE FROM alumnos_clase WHERE id_clase IN (SELECT id FROM clases WHERE id_maestro = :id)");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            // Elimina registros en la tabla clases que tienen referencia al maestro
            $stmt = $this->connection->prepare("DELETE FROM clases WHERE id_maestro = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            // Elimina al maestro de la tabla maestros
            $stmt = $this->connection->prepare("DELETE FROM maestros WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            
            $this->connection->commit();
        } catch (PDOException $e) {
            // Revierte la transacción en caso de error
            $this->connection->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    public function DeleteAlumno($id)
    {
        // si me elimina a alumnos en la pagina de administrador 
        $this->connection->query("DELETE FROM alumnos WHERE id=$id");
    }
    public function DeleteMateria($id)
    {
        try {
            // Inicia una transacción
            $this->connection->beginTransaction();
    
            // Elimina registros en la tabla alumnos_clase que tienen referencia a clases
            $stmt = $this->connection->prepare("DELETE FROM alumnos_clase WHERE id_clase IN (SELECT id FROM clases WHERE id_materia = :id)");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            // Elimina registros en la tabla clases que tienen referencia a la materia
            $stmt = $this->connection->prepare("DELETE FROM clases WHERE id_materia = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            // Elimina la materia de la tabla materias
            $stmt = $this->connection->prepare("DELETE FROM materias WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $this->connection->commit();
        } catch (PDOException $e) {
            // Revierte la transacción en caso de error
            $this->connection->rollBack();
            echo "Error: " . $e->getMessage();
        }
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
    public function editClases($id)
    {
        $res = $this->connection->query("SELECT * FROM materias WHERE id = $id");

        $data = $res->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    //edita datos
    public function updateMaestro($data)
    {
        
        $res = $this->connection->query("
        UPDATE maestros 
        SET 
        nombre = '{$data["nombre"]}', 
        apellido = '{$data["apellido"]}',
        correo = '{$data["correo"]}', 
        direccion = '{$data["direccion"]}', 
        fecha_nacimiento = '{$data["fecha_nacimieno"]}'
        WHERE id = {$data["maestro_edit"]}
        ");
        $data = $res->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
    public function updateAlumno($data)
    {
       
        $res = $this->connection->query("
        UPDATE alumnos 
        SET 
        matricula = '{$data["matricula"]}', 
        correo = '{$data["correo"]}', 
        nombre = '{$data["nombre"]}', 
        apellido = '{$data["apellido"]}', 
        direccion = '{$data["direccion"]}', 
        fecha_nacimieno = '{$data["fecha_nacimieno"]}'
        WHERE id = {$data["alumno_edit"]}
        ");
        $data = $res->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
    public function updateClase($data)
    {
        $id_maestro = $data["id_maestro"];
        $id_materia = $data["id"];  // Cambia a "id" en lugar de "id_materia"
    
        // Actualizar la tabla clases para asignar el nuevo maestro a la materia
        $res = $this->connection->query("
            UPDATE clases 
            SET 
            id_maestro = '{$id_maestro}' 
            WHERE id_materia = {$id_materia}
        ");
    
        // Verificar si la actualización fue exitosa
        if ($res) {
            return "Actualización exitosa";
        } else {
            return "Error al actualizar la clase";
        }
    }
    
    
}
