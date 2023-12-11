<?php

namespace Controller;

use Model\TelefonoModel;

class TelefonoController
{
    public function CTelefono()
    {
        if (!empty($_POST['telefono']) && !empty($_POST['idAlu']) && !empty($_POST['idCatel'])) {
            $datos = array(
                "telefono" => $_POST['telefono'],
                "fkAlumno" => $_POST['idAlu'],
                "fkCatTel" => $_POST['idCatel']
            );
            //print_r($datos);
            $respuesta = TelefonoModel::guardarTelefono($datos);

            return $respuesta ? "guardado" : "error";
        }
    }
    public function mostrar()
    {
        $telefono = TelefonoModel::mostrarTelefono();
        return $telefono;
    }
    public function editar()
    {
        $idTel = $_GET['idTel'];
        $idTel = TelefonoModel::editarTelefono($idTel);
        return $idTel;
    }
    public function actualizar()
    {
        if (!empty($_POST['telefono'])) {
            $datos = array(
                "idTel" => $_POST['idTel'],
                "telefono" => $_POST['telefono'],
                "fkAlumno" => $_POST['idAlu'],
                "fkCatTel" => $_POST['idCatel']
            );
            // print_r($datos);
            $respuesta = TelefonoModel::actualizarTelefono($datos);

            if ($respuesta) { //{ header("Location: index.php?action=VermuniCipio"); }
                //if($respuesta){ header("Location: index.php?action=verVehiculo");}
                //return $respuesta ? "guardado" : "error";
                echo '<script>window.location.href = "index.php?action=telefonoVer";</script>';
            }
        }
    }
    public function borrar()
    {
        if (!empty($_GET['idTel'])) {
            $idTel = TelefonoModel::borrarTelefono($_GET['idTel']);
            return $idTel;
        }
    }

    public function confirmarBorrar()
    {
        if (!empty($_POST['idTel'])) {
            $idTel = TelefonoModel::borrarConfirmadoTelefono($_POST['idTel']);
            if ($idTel) { //{ header("Location: index.php?action=VermuniCipio"); }
                echo '<script>window.location.href = "index.php?action=telefonoVer";</script>';
            }
        }
    }
}
?>