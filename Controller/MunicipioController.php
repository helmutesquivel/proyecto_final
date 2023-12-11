<?php

namespace Controller;

use Model\MunicipioModel;

class MunicipioController
{
    public function CMunicipio()
    {
        if (!empty($_POST['municipio']) && !empty($_POST['idDep'])) {
            $datos = array(
                "municipio" => $_POST['municipio'],
                "fkDep" => $_POST['idDep']
            );
            //print_r($datos);
            $respuesta = MunicipioModel::guardarMunicipio($datos);

            return $respuesta ? "guardado" : "error";
        }
    }
    public function mostrar()
    {
        $municipio = MunicipioModel::mostrarMunicipio();
        return $municipio;
    }
    public function editar()
    {
        $idMuni = $_GET['id'];
        $idMuni = MunicipioModel::editarMunicipio($idMuni);
        return $idMuni;
    }
    public function actualizar()
    {
        if (!empty($_POST['municipio'])) {
            $datos = array(
                "id" => $_POST['id'],
                "municipio" => $_POST['municipio'],
                "fkDep" => $_POST['idDep']
            );
            // print_r($datos);
            $respuesta = MunicipioModel::actualizarMunicipio($datos);

            if ($respuesta) { //{ header("Location: index.php?action=VermuniCipio"); }
                //if($respuesta){ header("Location: index.php?action=verVehiculo");}
                //return $respuesta ? "guardado" : "error";
                echo '<script>window.location.href = "index.php?action=VermuniCipio";</script>';
            }
        }
    }
    public function borrar()
    {
        if (!empty($_GET['id'])) {
            $idMuni = MunicipioModel::borrarMunicipio($_GET['id']);
            return $idMuni;
        }
    }

    public function confirmarBorrar()
    {
        if (!empty($_POST['id'])) {
            $idMuni = MunicipioModel::borrarConfirmadoMunicipio($_POST['id']);
            if ($idMuni) { //{ header("Location: index.php?action=VermuniCipio"); }
                echo '<script>window.location.href = "index.php?action=VermuniCipio";</script>';
            }
        }
    }
}
