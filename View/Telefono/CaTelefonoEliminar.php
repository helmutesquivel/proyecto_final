<?php

use Controller\CaTelefonoController;

$CaTelefono = new CaTelefonoController();

$registro = $CaTelefono->borrar(); //El registro completo de la BD

$CaTelefono->confirmarBorrar();

?>

<form method="post">

    <?php echo $registro['tipo']; ?>
    <br>
    
    <p>¿Seguro que quiere borrar?</p>

    <input type="hidden" name="idCatel" value="<?php echo $registro['idCatel']; ?>">

    <button type="submit" class="btn btn-primary">Borrar</button>

</form>