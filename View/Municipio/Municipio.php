<?php
use Controller\MunicipioController;
use Controller\DepartamentoController;

$municipio = new MunicipioController();
$departamento = new DepartamentoController();

?>

<h1>Crear Municipio</h1>


<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Nombre del Municipio</label>
                <input class="form-control" id="readOnlyInput" type="text" name="municipio" placeholder="Ingrese el nombre del municipio..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Departamento</label></div>
                <!--<div class="col-10"><input class="form-control" type="text" name="fktarifa" required></div>-->
                <select class="form-select" name="idDep">
                    <?php
                    foreach ($departamento->mostrar() as $row => $item) {
                        echo "<option value='{$item['idDep']}'>{$item['Departamento']}</option>";
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
        $resultado = $municipio->CMunicipio();
        if ($resultado == "guardado") {
            echo "<div class='alert alert-success mt-5' role='alert'>
                    Municipio Creado
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