<?php

use Controller\AlumnoController;

//if(!empty($_SESSION['id'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$alumno = new AlumnoController;

$listado = $alumno->mostrar();

?>
<h1>Alumnos</h1>

<table class="table table-hove mt-3">
    <thead>
        <tr class="table-success">
            <th scope="row">No</th>
            <td>Primer Nombre</td>
            <td>Segundo Nombre</td>
            <td>Primer Apellido</td>
            <td>Segundo Apellido</td>
            <td>Direccion</td>
            <td>Carne</td>
            <td>Grado</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listado as $row => $item) : ?>
            <tr class="table-success">
                <td><?php echo $item['idAlu']; ?></td>
                <td><?php echo $item['primerNombre']; ?></td>
                <td><?php echo $item['segundoNombre']; ?></td>
                <td><?php echo $item['primerApellido']; ?></td>
                <td><?php echo $item['segundoApellido']; ?></td>
                <td><?php echo $item['fkdireccion']; ?></td>
                <td><?php echo $item['carne']; ?></td>
                <td><?php echo $item['grado']; ?></td>
                <td><a href='index.php?action=alumnoEditar&idAlu=<?php echo $item['idAlu']; ?>'><button type="button" class="btn btn-success">Editar</button></a></td>
                <td><a href='index.php?action=alumnoEliminar&idAlu=<?php echo $item['idAlu']; ?>'><button type="button" class="btn btn-success">Eliminar</button></a></td>    
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php //} ?>