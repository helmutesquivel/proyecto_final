<?php

use Controller\DetalleController;

//if(!empty($_SESSION['id'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$detalle = new DetalleController;

$listado = $detalle->mostrar();

?>
<h1>Asigacion de cursos</h1>

<table class="table table-hove mt-3">
    <thead>
        <tr class="table-success">
            <th scope="row">No</th>
            <td>Fecha de Asignacion</td>
            <td>Alumno</td>
            <td>Asignar curso</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listado as $row => $item) : ?>
            <tr class="table-success">
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['fecha_asig']; ?></td>
                <td><?php echo $item['fkAlumno']; ?></td>
                <td><?php echo $item['fkmateria']; ?></td>
                <td><a href='index.php?action=detalleEditar&id=<?php echo $item['id']; ?>'><button type="button" class="btn btn-success">Editar</button></a></td>
                <td><a href='index.php?action=detalleEliminar&id=<?php echo $item['id']; ?>'><button type="button" class="btn btn-success">Eliminar</button></a></td>    
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php //} ?>