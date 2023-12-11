<?php 
namespace Model;

use Model\ConexionModel;

class MateriaModel{
    public static function guardarMateria($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO materia (materia) 
            VALUES (:mate)");
            $stmt->bindParam(":mate", $datos['materia'], \PDO::PARAM_STR);
           
            return $stmt->execute() ? true : false;
        }
        catch( \Throwable $th){
            //echo $th;
            return false;

        }
    }  
    public static function mostrarMateria(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM materia");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarMateria($idMate){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM materia where idMate = :idMate");
        $stmt->bindParam(':idMate',$idMate,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarMateria($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE materia SET  materia = :mate where idMate = :idMate");
        $stmt->bindParam(':mate',$datos['materia'],\PDO::PARAM_STR);
        $stmt->bindParam(':idMate',$datos['idMate'],\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
        
    }
    public static function borrarMateria($idMate){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM materia where idMate = :idMate");
        $stmt->bindParam(':idMate',$idMate,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function borrarConfirmadoMateria($idMate){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM materia where idMate = :idMate");
        $stmt->bindParam(':idMate',$idMate,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
    
}

?>
