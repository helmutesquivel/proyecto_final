<?php

use Controller\DireccionController;

$direccion = new DireccionController();

$registro = $direccion->borrar(); //El registro completo de la BD

$direccion->confirmarBorrar();

?>

<form method="post">

    <?php echo $registro['direccion']; ?>
    <br>
    <?php echo $registro['fkmunicipio']; ?>
    <br>
    <p>¿Seguro que quiere borrar?</p>

    <input type="hidden" name="idDirec" value="<?php echo $registro['idDirec']; ?>">

    <button type="submit" class="btn btn-primary">Borrar</button>

</form>