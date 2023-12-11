<?php

use Controller\DetalleController;

$detalle = new DetalleController();

$registro = $detalle->borrar(); //El registro completo de la BD

$detalle->confirmarBorrar();

?>

<form method="post">

    <?php echo $registro['fkmateria']; ?>
    <br>
    <?php echo $registro['fkAlumno']; ?>
    <br>
    <?php echo $registro['fecha_asig']; ?>
    <br>
    <p>¿Seguro que quiere borrar?</p>

    <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">

    <button type="submit" class="btn btn-primary">Borrar</button>

</form>