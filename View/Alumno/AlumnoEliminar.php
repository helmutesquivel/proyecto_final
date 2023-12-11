<?php

use Controller\AlumnoController;

$alumno = new AlumnoController();

$registro = $alumno->borrar(); //El registro completo de la BD

$alumno->confirmarBorrar();

?>

<form method="post">

    <?php echo $registro['primerNombre']; ?>
    <br>
    
    <br>
    <p>¿Seguro que quiere borrar?</p>

    <input type="hidden" name="idAlu" value="<?php echo $registro['idAlu']; ?>">

    <button type="submit" class="btn btn-primary">Borrar</button>

</form>