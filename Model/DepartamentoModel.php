<?php 

namespace Model;

use Model\ConexionModel;

class DepartamentoModel{

    public static function guardarDepartamento($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO departamento (Departamento) 
            VALUES (:depto)");
            $stmt->bindParam(":depto", $datos['Departamento'], \PDO::PARAM_STR);
           
            return $stmt->execute() ? true : false;
        }
        catch( \Throwable $th){
            //echo $th;
            return false;

        }
    }
    public static function mostrarDepartamento(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM departamento");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarDepartamento($idDep){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM departamento where idDep = :idDep");
        $stmt->bindParam(':idDep',$idDep,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarDepartamento($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE departamento SET  Departamento = :depto where idDep = :id");
        $stmt->bindParam(':depto',$datos['Departamento'],\PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['idDep'],\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
        
    }
    public static function borrarDepartamento($idDep){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM departamento where idDep = :idDep");
        $stmt->bindParam(':idDep',$idDep,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function borrarConfirmadoDepartamento($idDep){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM departamento where idDep = :idDep");
        $stmt->bindParam(':idDep',$idDep,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
}
?>