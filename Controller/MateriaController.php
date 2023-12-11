<?php

namespace Controller;

use Model\MateriaModel;

class MateriaController
{

    public function CMateria()
    {
        if (!empty($_POST['materia'])) {
            $datos = array(
                "materia" => $_POST['materia']
            );
            //print_r($datos);
            $respuesta = MateriaModel::guardarMateria($datos);

            return $respuesta ? "guardado" : "error";
        }
    }

    public function mostrar()
    {
        $materia = MateriaModel::mostrarMateria();
        return $materia;
    }
    public function editar()
    {
        $idMate = $_GET['idMate'];
        $idMate = MateriaModel::editarMateria($idMate);
        return $idMate;
    }
    public function actualizar()
    {
        if (!empty($_POST['materia'])) {
            $datos = array(
                "idMate" => $_POST['idMate'],
                "materia" => $_POST['materia']
            );
            // print_r($datos);
            $respuesta = MateriaModel::actualizarMateria($datos);

            if ($respuesta) { //{header("Location: index.php?action=vermateria"); }
                //if($respuesta){ header("Location: index.php?action=verVehiculo");}
                //return $respuesta ? "guardado" : "error";
                echo '<script>window.location.href = "index.php?action=vermateria";</script>';
            }
        }
    }
    public function borrar()
    {
        if (!empty($_GET['idMate'])) {
            $idMate = MateriaModel::borrarMateria($_GET['idMate']);
            return $idMate;
        }
    }

    public function confirmarBorrar()
    {
        if (!empty($_POST['idMate'])) {
            $idMate = MateriaModel::borrarConfirmadoMateria($_POST['idMate']);
            if ($idMate) {
                //{header("Location: index.php?action=vermateria"); }
                echo '<script>window.location.href = "index.php?action=vermateria";</script>';
            }
        }
    }
}
?>