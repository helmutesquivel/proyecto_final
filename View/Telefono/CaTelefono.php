<?php

use Controller\CaTelefonoController;

$CaTelefono = new CaTelefonoController();

// if(!empty($_SESSION['id'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

?>
<h1>Crear Tipo de Telefono o compañia</h1>


<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Compañia</label>
                <input class="form-control" id="readOnlyInput" type="text" name="tipo" placeholder="Ingrese el tipo de tarifia..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-lg btn-primary" type="submit">Crear La compañia</button>

            </div>
        </div>
        <?php
        $resultado = $CaTelefono->CCaTelefono();
        if ($resultado == "guardado") {
            echo "<div class='alert alert-success mt-5' role='alert'>
                    Compañia Creada
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