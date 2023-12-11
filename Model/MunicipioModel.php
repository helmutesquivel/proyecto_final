<?php 

namespace Model;

use Model\ConexionModel;

class MunicipioModel{

    public static function guardarMunicipio($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO municipio (municipio, fkDep) 
            VALUES (:muni, :fkDep)");
            $stmt->bindParam(":muni", $datos['municipio'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkDep", $datos['fkDep'], \PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
        }
        catch( \Throwable $th){
            //echo $th;
            return false;

        }
    }
    public static function mostrarMunicipio(){
        $stmt = ConexionModel::conectar()->prepare("SELECT m.id as id, municipio, d.departamento as Departamento FROM municipio as m INNER JOIN departamento as d ON m.fkDep = d.idDep");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarMunicipio($idMuni){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM municipio where id = :id");
        $stmt->bindParam(':id',$idMuni,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarMunicipio($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE municipio SET  municipio = :muni, fkDep = :fkDep where id = :id");
        $stmt->bindParam(':fkDep',$datos['fkDep'],\PDO::PARAM_STR);
        $stmt->bindParam(':muni',$datos['municipio'],\PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['id'],\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
        
    }
    public static function borrarMunicipio($idMuni){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM municipio where id = :id");
        $stmt->bindParam(':id',$idMuni,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function borrarConfirmadoMunicipio($idMuni){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM municipio where id = :id");
        $stmt->bindParam(':id',$idMuni,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
}
?>