<?php

use Controller\CaTelefonoController;

$CaTelefono = new CaTelefonoController();

$registro = $CaTelefono->editar();
$CaTelefono->actualizar();
?>
<h1>Actualizar Compañia de Telefono</h1>
<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Compañia</label>
                <input class="form-control" id="readOnlyInput" type="text" name="tipo" placeholder="Ingrese La compañia de Telefono..." value="<?php echo $registro['tipo']; ?>"  required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-lg btn-primary" type="submit">Actualizar</button>

            </div>
            <input class="form-control" id="readOnlyInput" type="hidden" name="idCatel" value="<?php echo $registro['idCatel']; ?>" required>
        </div>
    </form>
</div>