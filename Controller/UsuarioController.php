<?php

namespace Controller;

use Model\UsuarioModel;

require_once('Helpers/Helpers.php');

class UsuarioController{
    public function login(){
        if(!empty($_POST['usuario']) && !empty($_POST['password'])){
            $usuario = strClean($_POST['usuario']);
            $password = strClean($_POST['password']);

            $datos = array(
                'usuario' => $usuario,
            );
            $respuesta = UsuarioModel::login($datos);

            $resultado = password_verify($password,$respuesta['password']);

            if($resultado==true){
                $_SESSION['usuario'] = $respuesta['usuario'];
                $_SESSION['nombre'] = $respuesta['nombre'];
                $_SESSION['apellido'] = $respuesta['apellido'];
                $_SESSION['idUsu'] = $respuesta['idUsu'];
                
                header("Location: index.php?action=inicio&id={$respuesta['id']}");
            }else{
                return "error";
            }
        }
    }
    public function crearUsuario(){
        if(!empty($_POST['usuario']) && !empty($_POST['password']) &&!empty($_POST['nombre'])){
           $usuario = strClean($_POST['usuario']);
           $password = strClean($_POST['password']);

           $password = password_hash($password,PASSWORD_ARGON2ID);//Contraseña Cifrada 

           $nombre = strClean($_POST['nombre']);
           $apellido = strClean($_POST['apellido']);
           $rol = strClean($_POST['rol']);
                    
           $datos = array(
            "usuario" => $usuario,
            "password" => $password,
            "nombre" => $nombre,
            "apellido" => $apellido,
            "rol" => $rol,                
           );
           $respuesta = UsuarioModel::guardarUsuario($datos);

           return $respuesta; //? "guardado" : "error";
        }
    }

    public function logout(){
        session_destroy();
        header("location: index.php?action=inicio");
    }
    public function mostrar(){
        $usuario = UsuarioModel::mostrarUsuario();
        return $usuario;
    }


}



?>