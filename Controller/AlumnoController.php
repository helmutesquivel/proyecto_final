<?php

namespace Controller;

use Model\AlumnoModel;

class AlumnoController
{
    public function CAlumno()
    {
        if (!empty($_POST['primerNombre']) && !empty($_POST['segundoNombre']) && !empty($_POST['primerApellido']) && !empty($_POST['segundoApellido']) && !empty($_POST['idDirec']) && !empty($_POST['carne']) && !empty($_POST['grado'])){
            $datos = array(
                "primerNombre" => $_POST['primerNombre'],
                "segundoNombre" => $_POST['segundoNombre'],
                "primerApellido" => $_POST['primerApellido'],
                "segundoApellido" => $_POST['segundoApellido'],
                "fkdireccion" => $_POST['idDirec'],
                "carne" => $_POST['carne'],
                "grado" => $_POST['grado'],                
            );
            //print_r($datos);
            $respuesta = AlumnoModel::guardarAlumno($datos);

            return $respuesta ? "guardado" : "error";
        }
    }
    public function mostrar()
    {
        $alumno = AlumnoModel::mostrarAlumno();
        return $alumno;
    }
    public function editar()
    {
        $idAlu = $_GET['idAlu'];
        $idAlu = AlumnoModel::editarAlumno($idAlu);
        return $idAlu;
    }
    public function actualizar()
    {
        if (!empty($_POST['primerNombre'])) {
            $datos = array(
                "idAlu" => $_POST['idAlu'],
                "primerNombre" => $_POST['primerNombre'],
                "segundoNombre" => $_POST['segundoNombre'],
                "primerApellido" => $_POST['primerApellido'],
                "segundoApellido" => $_POST['segundoApellido'],
                "fkdireccion" => $_POST['idDirec'],
                "carne" => $_POST['carne'],
                "grado" => $_POST['grado'],
            );
            // print_r($datos);
            $respuesta = AlumnoModel::actualizarAlumno($datos);

            if ($respuesta) { //{ header("Location: index.php?action=VermuniCipio"); }
                //if($respuesta){ header("Location: index.php?action=verVehiculo");}
                //return $respuesta ? "guardado" : "error";
                echo '<script>window.location.href = "index.php?action=verAlumno";</script>';
            }
        }
    }
    public function borrar()
    {
        if (!empty($_GET['idAlu'])) {
            $idAlu = AlumnoModel::borrarAlumno($_GET['idAlu']);
            return $idAlu;
        }
    }

    public function confirmarBorrar()
    {
        if (!empty($_POST['idAlu'])) {
            $idAlu = AlumnoModel::borrarConfirmadoAlumno($_POST['idAlu']);
            if ($idAlu) { //{ header("Location: index.php?action=VermuniCipio"); }
                echo '<script>window.location.href = "index.php?action=verAlumno";</script>';
            }
        }
    }
}
?>