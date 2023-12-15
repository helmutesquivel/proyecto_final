<?php

namespace Model;

use Model\ConexionModel;

class UsuarioModel{

    public static function login($datos){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM usuarios where nombre=:usuario");
        $stmt->bindParam(":usuario", $datos['usuario'], \PDO::PARAM_STR);
        $stmt->execute();
        //Si hay un resultado que coincide
        return $stmt->fetch();//devolviendo la respuesta
    }

    public static function guardarUsuario($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO usuarios (nombre,apellido,usuario,password,rol) 
            VALUES (:nom,:apell,:usua,:pass,:rol)");
            $stmt->bindParam(":nom", $datos['nombre'], \PDO::PARAM_STR);//INT, STR, STR
            $stmt->bindParam(":apell", $datos['apellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":usua", $datos['usuario'], \PDO::PARAM_STR);
            $stmt->bindParam(":pass", $datos['password'], \PDO::PARAM_STR);
            $stmt->bindParam(":rol", $datos['rol'], \PDO::PARAM_STR);
            //Delete o update
            //No ejecución de Código SQL
            return $stmt->execute() ? true : false;
            }
            catch( \Throwable $th ){
                  return false;
            }
    }
    public static function mostrarUsuario(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

?>