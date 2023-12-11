<?php 

namespace Model;

use Model\ConexionModel;

class TelefonoModel{

    public static function guardarTelefono($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO telefono (telefono, fkAlumno, fkCatTel) 
            VALUES (:tel, :fkAlu, :fkCt)");
            $stmt->bindParam(":tel", $datos['telefono'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkAlu", $datos['fkAlumno'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkCt", $datos['fkCatTel'], \PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
        }
        catch( \Throwable $th){
            //echo $th;
            return false;

        }
    }
    public static function mostrarTelefono(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM telefono");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarTelefono($idTel){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM telefono where idTel = :idTel");
        $stmt->bindParam(':idTel',$idTel,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarTelefono($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE telefono SET  telefono = :tel, fkAlumno = :fkAlu, fkCatTel = :fkCt where idTel = :idTel");
        $stmt->bindParam(":fkCt", $datos['fkCatTel'], \PDO::PARAM_STR);
        $stmt->bindParam(":fkAlu", $datos['fkAlumno'], \PDO::PARAM_STR);
        $stmt->bindParam(':tel',$datos['telefono'],\PDO::PARAM_STR);
        $stmt->bindParam(':idTel',$datos['idTel'],\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
        
    }
    public static function borrarTelefono($idTel){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM telefono where idTel = :idTel");
        $stmt->bindParam(':idTel',$idTel,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function borrarConfirmadoTelefono($idTel){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM telefono where idTel = :idTel");
        $stmt->bindParam(':idTel',$idTel,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
}
?>