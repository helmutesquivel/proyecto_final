<?php

use Controller\DetalleController;

//if(!empty($_SESSION['id'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$detalle = new DetalleController;

$listado = $detalle->mostrar();

?>
<h1>Asigacion de cursos</h1>
<a href='index.php?action=detallePdf'><button type="button" class="btn btn-success">Descargar Pdf</button></a>
<table class="table table-hove mt-3">
    <thead>
        <tr class="table-success">
            <th scope="row">No</th>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Curso</td>
            <td>Fecha de Asignacion</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listado as $row => $item) : ?>
            <tr class="table-success">
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['Nombre']; ?></td>
                <td><?php echo $item['Apellido']; ?></td>
                <td><?php echo $item['Curso']; ?></td>
                <td><?php echo $item['Asignado']; ?></td>
                <td><a href='index.php?action=detalleEditar&id=<?php echo $item['id']; ?>'><button type="button" class="btn btn-success">Editar</button></a></td>
                <td><a href='index.php?action=detalleEliminar&id=<?php echo $item['id']; ?>'><button type="button" class="btn btn-success">Eliminar</button></a></td>    
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php //} ?>