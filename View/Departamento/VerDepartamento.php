<?php

use Controller\DepartamentoController;

//if(!empty($_SESSION['id'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$departamento = new DepartamentoController;

$listado = $departamento->mostrar();

?>
<h1>Departamentos</h1>

<table class="table table-hove mt-3">
    <thead>
        <tr class="table-success">
            <th scope="row">No</th>
            <td>Departamento</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listado as $row => $item) : ?>
            <tr class="table-success">
                <td><?php echo $item['idDep']; ?></td>
                <td><?php echo $item['Departamento']; ?></td>
              
                <td><a href='index.php?action=departamentoEditar&idDep=<?php echo $item['idDep']; ?>'><button type="button" class="btn btn-success">Editar</button></a></td>
                <td><a href='index.php?action=departamentoEliminar&idDep=<?php echo $item['idDep']; ?>'><button type="button" class="btn btn-success">Eliminar</button></a></td>    
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php //} ?>