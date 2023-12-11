<?php

use Controller\DepartamentoController;

$departamento = new DepartamentoController();

$registro = $departamento->editar();
$departamento->actualizar();
?>
<h1>Actualizar Compañia de Telefono</h1>
<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Nombre del Departamento</label>
                <input class="form-control" id="readOnlyInput" type="text" name="Departamento" placeholder="Ingrese el nombre del departamento..." value="<?php echo $registro['Departamento']; ?>" required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-lg btn-primary" type="submit">Actualizar</button>

            </div>
        </div>
        <input class="form-control" id="readOnlyInput" type="hidden" name="idDep" value="<?php echo $registro['idDep']; ?>" required>
    </form>
</div>