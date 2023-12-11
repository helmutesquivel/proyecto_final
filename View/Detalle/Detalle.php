<?php
use Controller\DetalleController;
use Controller\AlumnoController;
use Controller\MateriaController;

$detalle = new DetalleController();
$alumno = new AlumnoController();
$materia = new MateriaController();

?>

<h1>Crear Asignacion de Cursos</h1>


<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Fecha de Asignacion</label>
                <input class="form-control" id="readOnlyInput" type="text" name="fecha_asig" placeholder="Ingrese la fecha de asignacion..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Alumno</label></div>
                <!--<div class="col-10"><input class="form-control" type="text" name="fktarifa" required></div>-->
                <select class="form-select" name="idAlu">
                    <?php
                    foreach ($alumno->mostrar() as $row => $item) {
                        echo "<option value='{$item['idAlu']}'>{$item['primerNombre']}-{$item['primerApellido']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Asignar Curso</label></div>
                <!--<div class="col-10"><input class="form-control" type="text" name="fktarifa" required></div>-->
                <select class="form-select" name="idMate">
                    <?php
                    foreach ($materia->mostrar() as $row => $item) {
                        echo "<option value='{$item['idMate']}'>{$item['materia']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-lg btn-primary" type="submit">Asignar Curso</button>

            </div>
        </div>
        <?php
        $resultado = $detalle->CDetalle();
        if ($resultado == "guardado") {
            echo "<div class='alert alert-success mt-5' role='alert'>
                    Asignacion de Curso Creada
                 </div>";
        } elseif ($resultado == "error") {
            echo "<div class='alert alert-danger mt-5' role='alert'>
                    Error
                 </div>";
        }
        //}//CIERRE DE VALIDACION, INICIO SESION OBLIGADO
        ?>
    </form>
</div>