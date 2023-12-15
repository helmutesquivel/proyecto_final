<?php

use Controller\MateriaController;

$materia = new MateriaController();

if(!empty($_SESSION['idUsu'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

?>
<h1>Crear Cursos</h1>


<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Curso</label>
                <input class="form-control" id="readOnlyInput" type="text" name="materia" placeholder="Ingrese la materia..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-lg btn-primary" type="submit">Crear Curso</button>

            </div>
        </div>
        <?php
        $resultado = $materia->CMateria();
        if ($resultado == "guardado") {
            echo "<div class='alert alert-success mt-5' role='alert'>
                    Materia Creada
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