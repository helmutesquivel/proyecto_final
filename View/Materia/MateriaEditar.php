<?php

use Controller\MateriaController;

$materia = new MateriaController();

$registro = $materia->editar();
$materia->actualizar();
?>
<h1>Actualizar Cursos</h1>
<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Curso</label>
                <input class="form-control" id="readOnlyInput" type="text" name="materia" placeholder="Ingrese La compañia de Telefono..." value="<?php echo $registro['materia']; ?>"  required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-lg btn-primary" type="submit">Actualizar</button>

            </div>
            <input class="form-control" id="readOnlyInput" type="hidden" name="idMate" value="<?php echo $registro['idMate']; ?>" required>
        </div>
    </form>
</div>