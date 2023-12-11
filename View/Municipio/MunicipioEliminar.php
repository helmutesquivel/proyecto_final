<?php

use Controller\MunicipioController;

$municipio = new MunicipioController();

$registro = $municipio->borrar(); //El registro completo de la BD

$municipio->confirmarBorrar();

?>

<form method="post">

    <?php echo $registro['municipio']; ?>
    <br>
    <?php echo $registro['fkDep']; ?>
    <br>
    <p>¿Seguro que quiere borrar?</p>

    <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">

    <button type="submit" class="btn btn-primary">Borrar</button>

</form>