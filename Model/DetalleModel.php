<?php 

namespace Model;

use Model\ConexionModel;

class DetalleModel{

    public static function guardarDetalle($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO detalleasignatura (fkmateria, fkAlumno, fecha_asig) 
            VALUES (:fkma, :fkAlu, :fasig)");
            $stmt->bindParam(":fkma", $datos['fkmateria'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkAlu", $datos['fkAlumno'], \PDO::PARAM_STR);
            $stmt->bindParam(":fasig", $datos['fecha_asig'], \PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
        }
        catch( \Throwable $th){
            //echo $th;
            return false;

        }
    }
    public static function mostrarDetalle(){
        $stmt = ConexionModel::conectar()->prepare("SELECT id, alumno.primerNombre as Nombre, alumno.primerApellido as Apellido, materia.materia as Curso, detalleasignatura.fecha_asig as Asignado FROM detalleasignatura INNER JOIN alumno ON detalleasignatura.fkAlumno = alumno.idAlu inner JOIN materia ON detalleasignatura.fkmateria = materia.idMate");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarDetalle($id){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM detalleasignatura where id = :id");
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarDetalle($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE detalleasignatura SET  fkmateria = :fkma, fkAlumno = :fkAlu, fecha_asig = :fasig where id = :id");
        $stmt->bindParam(":fasig", $datos['fecha_asig'], \PDO::PARAM_STR);
        $stmt->bindParam(":fkAlu", $datos['fkAlumno'], \PDO::PARAM_STR);
        $stmt->bindParam(':fkma',$datos['fkmateria'],\PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['id'],\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
        
    }
    public static function borrarDetalle($id){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM detalleasignatura where id = :id");
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function borrarConfirmadoDetalle($id){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM detalleasignatura where id = :id");
        $stmt->bindParam(':id',$id,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
}
?>