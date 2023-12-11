<?php

use Controller\DireccionController;
use Controller\MunicipioController;

$direccion = new DireccionController();
$municipio = new MunicipioController();

$registro = $direccion->editar();
$direccion->actualizar();
?>

<h1>actualizar Direccion</h1>


<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Direccion</label>
                <input class="form-control" id="readOnlyInput" type="text" name="direccion" placeholder="Ingrese la direccion..." value="<?php echo $registro['direccion']; ?>" required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Municipio</label></div>
                <!--<div class="col-10"><input class="form-control" type="text" name="fktarifa" required></div>-->
                <select class="form-select" name="id" value="<?php echo $registro['id']; ?>">
                    <?php
                    foreach ($municipio->mostrar() as $row => $item) {
                        echo "<option value='{$item['id']}'>{$item['municipio']}</option>";
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
        <input type="hidden" name="idDirec" value="<?php echo $registro['idDirec']; ?>">
    </form>
</div>