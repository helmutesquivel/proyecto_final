<?php

use Controller\DepartamentoController;

$departamento = new DepartamentoController();

$registro = $departamento->borrar(); //El registro completo de la BD

$departamento->confirmarBorrar();

?>

<form method="post">

    <?php echo $registro['Departamento']; ?>
    <br>
    
    <p>¿Seguro que quiere borrar?</p>

    <input type="hidden" name="idDep" value="<?php echo $registro['idDep']; ?>">

    <button type="submit" class="btn btn-primary">Borrar</button>

</form>