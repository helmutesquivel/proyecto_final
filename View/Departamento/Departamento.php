<?php

use Controller\DepartamentoController;

$departamento = new DepartamentoController();

if(!empty($_SESSION['idUsu'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

?>

<h1>Crear Departamento</h1>


<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Nombre del Departamento</label>
                <input class="form-control" id="readOnlyInput" type="text" name="Departamento" placeholder="Ingrese el nombre del departamento..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-lg btn-primary" type="submit">Crear Departamento</button>

            </div>
        </div>
        <?php
    $resultado = $departamento->CDepartamento();
    if ($resultado == "guardado") {
        echo "<div class='alert alert-success mt-5' role='alert'>
                    Departamento Creado
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