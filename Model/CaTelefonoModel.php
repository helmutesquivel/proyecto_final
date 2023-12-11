<?php 
namespace Model;

use Model\ConexionModel;

class CaTelefonoModel{
    public static function guardarCaTelefono($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO categoriatelefono (tipo) 
            VALUES (:tipo)");
            $stmt->bindParam(":tipo", $datos['tipo'], \PDO::PARAM_STR);
           
            return $stmt->execute() ? true : false;
        }
        catch( \Throwable $th){
            //echo $th;
            return false;

        }
    }
  
    
    public static function mostrarCaTelefono(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM categoriatelefono");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarCaTelefono($idCatel){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM categoriatelefono where idCatel = :idCatel");
        $stmt->bindParam(':idCatel',$idCatel,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarCaTelefono($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE categoriatelefono SET  tipo = :tipo where idCatel = :id");
        $stmt->bindParam(':tipo',$datos['tipo'],\PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['idCatel'],\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
        
    }
    public static function borrarCaTelefono($idCatel){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM categoriatelefono where idCatel = :idCatel");
        $stmt->bindParam(':idCatel',$idCatel,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function borrarConfirmadoCaTelefono($idCatel){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM categoriatelefono where idCatel = :idCatel");
        $stmt->bindParam(':idCatel',$idCatel,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
    
}

?>
