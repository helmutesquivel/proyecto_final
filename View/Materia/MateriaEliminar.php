<?php

use Controller\MateriaController;

$materia = new MateriaController();

$registro = $materia->borrar(); //El registro completo de la BD

$materia->confirmarBorrar();

?>

<form method="post">

    <?php echo $registro['materia']; ?>
    <br>
    
    <p>¿Seguro que quiere borrar?</p>

    <input type="hidden" name="idMate" value="<?php echo $registro['idMate']; ?>">

    <button type="submit" class="btn btn-primary">Borrar</button>

</form>