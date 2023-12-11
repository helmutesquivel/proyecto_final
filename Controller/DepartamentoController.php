<?php

namespace Controller;

use Model\DepartamentoModel;

class DepartamentoController
{
    public function CDepartamento()
    {
        if (!empty($_POST['Departamento'])) {
            $datos = array(
                "Departamento" => $_POST['Departamento']
            );
            //print_r($datos);
            $respuesta = DepartamentoModel::guardarDepartamento($datos);

            return $respuesta ? "guardado" : "error";
        }
    }
    public function mostrar()
    {
        $departamento = DepartamentoModel::mostrarDepartamento();
        return $departamento;
    }
    public function editar()
    {
        $idDep = $_GET['idDep'];
        $idDep = DepartamentoModel::editarDepartamento($idDep);
        return $idDep;
    }
    public function actualizar()
    {
        if (!empty($_POST['Departamento'])) {
            $datos = array(
                "idDep" => $_POST['idDep'],
                "Departamento" => $_POST['Departamento']
            );
            // print_r($datos);
            $respuesta = DepartamentoModel::actualizarDepartamento($datos);

            if ($respuesta) { //{ header("Location: index.php?action=verDepartamento"); }
                //if($respuesta){ header("Location: index.php?action=verVehiculo");}
                //return $respuesta ? "guardado" : "error";
                echo '<script>window.location.href = "index.php?action=verDepartamento";</script>';
            }
        }
    }
    public function borrar()
    {
        if (!empty($_GET['idDep'])) {
            $idDep = DepartamentoModel::borrarDepartamento($_GET['idDep']);
            return $idDep;
        }
    }

    public function confirmarBorrar()
    {
        if (!empty($_POST['idDep'])) {
            $idDep = DepartamentoModel::borrarConfirmadoDepartamento($_POST['idDep']);
            if ($idDep) { //{header("Location: index.php?action=verDepartamento"); }
                echo '<script>window.location.href = "index.php?action=verDepartamento";</script>';
            }
        }
    }
}
