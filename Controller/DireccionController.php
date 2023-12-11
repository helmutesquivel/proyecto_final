<?php

namespace Controller;

use Model\DireccionModel;

class DireccionController
{
    public function CDireccion()
    {
        if (!empty($_POST['direccion']) && !empty($_POST['id'])) {
            $datos = array(
                "direccion" => $_POST['direccion'],
                "fkmunicipio" => $_POST['id']
            );
            //print_r($datos);
            $respuesta = DireccionModel::guardarDireccion($datos);

            return $respuesta ? "guardado" : "error";
        }
    }
    public function mostrar()
    {
        $direccion = DireccionModel::mostrarDireccion();
        return $direccion;
    }
    public function editar()
    {
        $idDirec = $_GET['idDirec'];
        $idDirec = DireccionModel::editarDireccion($idDirec);
        return $idDirec;
    }
    public function actualizar()
    {
        if (!empty($_POST['direccion'])) {
            $datos = array(
                "idDirec" => $_POST['idDirec'],
                "direccion" => $_POST['direccion'],
                "fkmunicipio" => $_POST['id']
            );
            // print_r($datos);
            $respuesta = DireccionModel::actualizarDireccion($datos);

            if ($respuesta) { //{ header("Location: index.php?action=verdireccion"); }
                //if($respuesta){ header("Location: index.php?action=verVehiculo");}
                //return $respuesta ? "guardado" : "error";
                echo '<script>window.location.href = "index.php?action=verdireccion";</script>';
            }
        }
    }
    public function borrar()
    {
        if (!empty($_GET['idDirec'])) {
            $idDirec = DireccionModel::borrarDireccion($_GET['idDirec']);
            return $idDirec;
        }
    }

    public function confirmarBorrar()
    {
        if (!empty($_POST['idDirec'])) {
            $idDirec = DireccionModel::borrarConfirmadoDireccion($_POST['idDirec']);
            if ($idDirec) { //{ header("Location: index.php?action=verdireccion"); }
                echo '<script>window.location.href = "index.php?action=verdireccion";</script>';
            }
        }
    }
}
