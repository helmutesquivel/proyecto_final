<?php

use Controller\TelefonoController;

$telefono = new TelefonoController();

$registro = $telefono->borrar(); //El registro completo de la BD

$telefono->confirmarBorrar();

?>

<form method="post">

    <?php echo $registro['telefono']; ?>
    <br>
    <?php echo $registro['fkAlumno']; ?>
    <br>
    <?php echo $registro['fkCatTel']; ?>
    <br>
    <p>¿Seguro que quiere borrar?</p>

    <input type="hidden" name="idTel" value="<?php echo $registro['idTel']; ?>">

    <button type="submit" class="btn btn-primary">Borrar</button>

</form>