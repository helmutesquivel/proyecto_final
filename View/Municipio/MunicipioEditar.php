<?php

use Controller\MunicipioController;
use Controller\DepartamentoController;

$municipio = new MunicipioController();
$departamento = new DepartamentoController();

$registro = $municipio->editar();
$municipio->actualizar();
?>

<h1>actualizar Municipio</h1>


<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Nombre del Municipio</label>
                <input class="form-control" id="readOnlyInput" type="text" name="municipio" placeholder="Ingrese el nombre del municipio..." value="<?php echo $registro['municipio']; ?>" required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Departamento</label></div>
                <!--<div class="col-10"><input class="form-control" type="text" name="fktarifa" required></div>-->
                <select class="form-select" name="idDep" value="<?php echo $registro['idDep']; ?>">
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
                <button class="btn btn-lg btn-primary" type="submit">actualizar</button>

            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
    </form>
</div>