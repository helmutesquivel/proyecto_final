<?php
use Controller\TelefonoController;
use Controller\AlumnoController;
use Controller\CaTelefonoController;

$telefono = new TelefonoController();
$alumno = new AlumnoController();
$catelefono = new CaTelefonoController();

?>

<h1>Crear Telefono de Alumno</h1>


<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Telefono</label>
                <input class="form-control" id="readOnlyInput" type="text" name="telefono" placeholder="Ingrese el numero de telefono del alumno..." required>
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
                <div class="col-2"><label>Compañia Telefonica</label></div>
                <!--<div class="col-10"><input class="form-control" type="text" name="fktarifa" required></div>-->
                <select class="form-select" name="idCatel">
                    <?php
                    foreach ($catelefono->mostrar() as $row => $item) {
                        echo "<option value='{$item['idCatel']}'>{$item['tipo']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-lg btn-primary" type="submit">Crear Municipio</button>

            </div>
        </div>
        <?php
        $resultado = $telefono->CTelefono();
        if ($resultado == "guardado") {
            echo "<div class='alert alert-success mt-5' role='alert'>
                    Telefono Creado
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