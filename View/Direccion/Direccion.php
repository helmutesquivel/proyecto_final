<?php
use Controller\DireccionController;
use Controller\MunicipioController;

$direccion = new DireccionController();
$municipio = new MunicipioController();
if(!empty($_SESSION['idUsu'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION
?>

<h1>Crear Direccion</h1>


<div class="container-login">
    <form class="form" method="POST">
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Direccion</label>
                <input class="form-control" id="readOnlyInput" type="text" name="direccion" placeholder="Ingrese la Direccion..." required>
            </fieldset>
        </div>
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Municipio</label></div>
                <!--<div class="col-10"><input class="form-control" type="text" name="fktarifa" required></div>-->
                <select class="form-select" name="id">
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
                <button class="btn btn-lg btn-primary" type="submit">Crear Direccion</button>

            </div>
        </div>
    
        <?php
        $resultado = $direccion->CDireccion();
        if ($resultado == "guardado") {
            echo "<div class='alert alert-success mt-5' role='alert'>
                    Direccion Creada
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