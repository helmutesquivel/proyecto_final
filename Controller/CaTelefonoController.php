<?php 

namespace Controller;

use Model\CaTelefonoModel;

class CaTelefonoController{

    public function CCaTelefono(){
        if(!empty($_POST['tipo'])){
            $datos = array(
                "tipo" => $_POST['tipo']
            );
            //print_r($datos);
            $respuesta = CaTelefonoModel::guardarCaTelefono($datos);
           
            return $respuesta ? "guardado" : "error";
        }

    }
   
    public function mostrar(){
        $caTelefono = CaTelefonoModel::mostrarCaTelefono();
        return $caTelefono;
    }
    public function editar(){
        $idCatel = $_GET['idCatel'];
        $idCatel = CaTelefonoModel::editarCaTelefono($idCatel);
        return $idCatel;
    }
    public function actualizar(){
        if(!empty($_POST['tipo'])){
            $datos = array(
                "idCatel" => $_POST['idCatel'],
                "tipo" => $_POST['tipo']
            );
           // print_r($datos);
            $respuesta = CaTelefonoModel::actualizarCaTelefono($datos);
        
            if($respuesta){ //{ header("Location: index.php?action=vercaTelefono"); }
            //if($respuesta){ header("Location: index.php?action=verVehiculo");}
            //return $respuesta ? "guardado" : "error";
            echo '<script>window.location.href = "index.php?action=vercaTelefono";</script>';
            }
        }
    }
    public function borrar(){
        if( !empty($_GET['idCatel'])){
            $idCatel = CaTelefonoModel::borrarCaTelefono($_GET['idCatel']);
            return $idCatel;
        }
    }

    public function confirmarBorrar(){
        if( !empty($_POST['idCatel'])){
            $idCatel = CaTelefonoModel::borrarConfirmadoCaTelefono($_POST['idCatel']);
            if($idCatel){ //{ header("Location: index.php?action=vercaTelefono"); } 
            echo '<script>window.location.href = "index.php?action=vercaTelefono";</script>';  
            }
        }
    }
   
}

?>