<?php

use Controller\DireccionController;

if(!empty($_SESSION['idUsu'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$direccion = new DireccionController;

$listado = $direccion->mostrar();

?>
<h1>Direcciones</h1>

<table class="table table-hove mt-3">
    <thead>
        <tr class="table-success">
            <th scope="row">No</th>
            <td>Direcciones</td>
            <td>Municipios</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listado as $row => $item) : ?>
            <tr class="table-success">
                <td><?php echo $item['idDirec']; ?></td>
                <td><?php echo $item['direccion']; ?></td>
                <td><?php echo $item['Municipio']; ?></td> <!--Cambiar por lo de la SQL el campo -->
                <td><a href='index.php?action=direccionEditar&idDirec=<?php echo $item['idDirec']; ?>'><button type="button" class="btn btn-success">Editar</button></a></td>
                <td><a href='index.php?action=direccionEliminar&idDirec=<?php echo $item['idDirec']; ?>'><button type="button" class="btn btn-success">Eliminar</button></a></td>    
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php } ?>
