<?php

namespace Controller;

use Model\DetalleModel;

class DetalleController
{
    public function CDetalle()
    {
        if (!empty($_POST['idMate']) && !empty($_POST['idAlu']) && !empty($_POST['fecha_asig'])) {
            $datos = array(
                "fkmateria" => $_POST['idMate'],
                "fkAlumno" => $_POST['idAlu'],
                "fecha_asig" => $_POST['fecha_asig']
            );
            //print_r($datos);
            $respuesta = DetalleModel::guardarDetalle($datos);

            return $respuesta ? "guardado" : "error";
        }
    }
    public function mostrar()
    {
        $detalle = DetalleModel::mostrarDetalle();
        return $detalle;
    }
    public function editar()
    {
        $id = $_GET['id'];
        $id = DetalleModel::editarDetalle($id);
        return $id;
    }
    public function actualizar()
    {
        if (!empty($_POST['fkmateria'])) {
            $datos = array(
                "id" => $_POST['idT'],
                "fkmateria" => $_POST['idMate'],
                "fkAlumno" => $_POST['idAlu'],
                "fecha_asig" => $_POST['fecha_asig']
            );
            // print_r($datos);
            $respuesta = DetalleModel::actualizarDetalle($datos);

            if ($respuesta) { //{ header("Location: index.php?action=VermuniCipio"); }
                //if($respuesta){ header("Location: index.php?action=verVehiculo");}
                //return $respuesta ? "guardado" : "error";
                echo '<script>window.location.href = "index.php?action=detalleVer";</script>';
            }
        }
    }
    public function borrar()
    {
        if (!empty($_GET['id'])) {
            $id = DetalleModel::borrarDetalle($_GET['id']);
            return $id;
        }
    }

    public function confirmarBorrar()
    {
        if (!empty($_POST['id'])) {
            $id = DetalleModel::borrarConfirmadoDetalle($_POST['id']);
            if ($id) { //{ header("Location: index.php?action=VermuniCipio"); }
                echo '<script>window.location.href = "index.php?action=detalleVer";</script>';
            }
        }
    }
}
?>