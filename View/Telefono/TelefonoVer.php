<?php

use Controller\TelefonoController;

if(!empty($_SESSION['idUsu'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$telefono = new telefonoController;

$listado = $telefono->mostrar();

?>
<h1>Telefonos</h1>
<a href='index.php?action=telefonoPdf'><button type="button" class="btn btn-warning">Descargar Pdf</button></a> <a href='index.php?action=telefonoExcel'><button type="button" class="btn btn-success">Descargar Excel</button></a>
<table class="table table-hove mt-3">
    <thead>
        <tr class="table-success">
            <th scope="row">No</th>
            <td>Telefono</td>
            <td>Nombre</td>
            <td>Apellido</td>
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
                <td><?php echo $item['primerNombre']; ?></td>
                <td><?php echo $item['primerApellido']; ?></td>
                <td><?php echo $item['tipo']; ?></td>
                <td><a href='index.php?action=telefonoEditar&idTel=<?php echo $item['idTel']; ?>'><button type="button" class="btn btn-success">Editar</button></a></td>
                <td><a href='index.php?action=telefonoEliminar&idTel=<?php echo $item['idTel']; ?>'><button type="button" class="btn btn-success">Eliminar</button></a></td>    
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php } ?>