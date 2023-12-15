<?php
use Controller\AlumnoController;
use Controller\DireccionController;

$alumno = new AlumnoController();
$direccion = new DireccionController();
if(!empty($_SESSION['idUsu'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION
?>

<h1>Crear Alumno</h1>

<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Primer nombre</label>
                <input class="form-control" id="readOnlyInput" type="text" name="primerNombre" placeholder="Ingrese el primer nombre..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Segundo nombre</label>
                <input class="form-control" id="readOnlyInput" type="text" name="segundoNombre" placeholder="Ingrese el segundo nombre..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Primer apellido</label>
                <input class="form-control" id="readOnlyInput" type="text" name="primerApellido" placeholder="Ingrese el primer apellido..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Segundo apellido</label>
                <input class="form-control" id="readOnlyInput" type="text" name="segundoApellido" placeholder="Ingrese el segundo apellido..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Direccion</label></div>
                <!--<div class="col-10"><input class="form-control" type="text" name="fktarifa" required></div>-->
                <select class="form-select" name="idDirec">
                    <?php
                    foreach ($direccion->mostrar() as $row => $item) {
                        echo "<option value='{$item['idDirec']}'>{$item['direccion']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Carne</label>
                <input class="form-control" id="readOnlyInput" type="text" name="carne" placeholder="Ingrese el carne..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Grado</label>
                <input class="form-control" id="readOnlyInput" type="text" name="grado" placeholder="Ingrese el Grado..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-lg btn-primary" type="submit">Crear Alumno</button>

            </div>
        </div>
        <?php
        $resultado = $alumno->CAlumno();
        if ($resultado == "guardado") {
            echo "<div class='alert alert-success mt-5' role='alert'>
                    Alumno Creado
                 </div>";
        } elseif ($resultado == "error") {
            echo "<div class='alert alert-danger mt-5' role='alert'>
                    Error
                 </div>";
        }
        }//CIERRE DE VALIDACION, INICIO SESION OBLIGADO
        ?>
    </form>
</div>