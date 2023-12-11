<?php

use Controller\TelefonoController;

//if(!empty($_SESSION['id'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$telefono = new telefonoController;

$listado = $telefono->mostrar();

?>
<h1>Telefonos</h1>

<table class="table table-hove mt-3">
    <thead>
        <tr class="table-success">
            <th scope="row">No</th>
            <td>Telefono</td>
            <td>Alumno</td>
            <td>Compañia</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listado as $row => $item) : ?>
            <tr class="table-success">
                <td><?php echo $item['idTel']; ?></td>
                <td><?php echo $item['telefono']; ?></td>
                <td><?php echo $item['fkAlumno']; ?></td>
                <td><?php echo $item['fkCatTel']; ?></td>
                <td><a href='index.php?action=telefonoEditar&idTel=<?php echo $item['idTel']; ?>'><button type="button" class="btn btn-success">Editar</button></a></td>
                <td><a href='index.php?action=telefonoEliminar&idTel=<?php echo $item['idTel']; ?>'><button type="button" class="btn btn-success">Eliminar</button></a></td>    
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php //} ?>