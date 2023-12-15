<?php

use Controller\MunicipioController;

//if(!empty($_SESSION['id'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$municipio = new MunicipioController;

$listado = $municipio->mostrar();
if(!empty($_SESSION['idUsu'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION
?>
<h1>Municipio</h1>

<table class="table table-hove mt-3">
    <thead>
        <tr class="table-success">
            <th scope="row">No</th>
            <td>Municipio</td>
            <td>Departamento</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listado as $row => $item) : ?>
            <tr class="table-success">
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['municipio']; ?></td>
                <td><?php echo $item['Departamento']; ?></td>
                <td><a href='index.php?action=municipioEditar&id=<?php echo $item['id']; ?>'><button type="button" class="btn btn-success">Editar</button></a></td>
                <td><a href='index.php?action=municipioEliminar&id=<?php echo $item['id']; ?>'><button type="button" class="btn btn-success">Eliminar</button></a></td>    
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php } ?>