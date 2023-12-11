<?php 

namespace Model;

use Model\ConexionModel;

class DireccionModel{

    public static function guardarDireccion($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO direccion (direccion, fkmunicipio) 
            VALUES (:direc, :fkmuni)");
            $stmt->bindParam(":direc", $datos['direccion'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkmuni", $datos['fkmunicipio'], \PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
        }
        catch( \Throwable $th){
            //echo $th;
            return false;

        }
    }
    public static function mostrarDireccion(){
        $stmt = ConexionModel::conectar()->prepare("SELECT di.idDirec as idDirec, direccion, m.municipio as Municipio FROM direccion as di INNER JOIN municipio as m ON di.fkmunicipio = m.id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarDireccion($idDirec){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM direccion where idDirec = :idDirec");
        $stmt->bindParam(':idDirec',$idDirec,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarDireccion($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE direccion SET  direccion = :direc, fkmunicipio = :fkmuni where idDirec = :idDirec");
        $stmt->bindParam(':fkmuni',$datos['fkmunicipio'],\PDO::PARAM_STR);
        $stmt->bindParam('direc',$datos['direccion'],\PDO::PARAM_STR);
        $stmt->bindParam(':idDirec',$datos['idDirec'],\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
        
    }
    public static function borrarDireccion($idDirec){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM direccion where idDirec = :idDirec");
        $stmt->bindParam(':idDirec',$idDirec,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function borrarConfirmadoDireccion($idDirec){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM direccion where idDirec = :idDirec");
        $stmt->bindParam(':idDirec',$idDirec,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
}
?>