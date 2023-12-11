<?php

use Controller\CaTelefonoController;

//if(!empty($_SESSION['id'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$CaTelefono = new CaTelefonoController;

$listado = $CaTelefono->mostrar();

?>
<h1>Compañia de Telefono</h1>

<table class="table table-hove mt-3">
    <thead>
        <tr class="table-success">
            <th scope="row">No</th>
            <td>Tipo</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listado as $row => $item) : ?>
            <tr class="table-success">
                <td><?php echo $item['idCatel']; ?></td>
                <td><?php echo $item['tipo']; ?></td>
              
                <td><a href='index.php?action=caTelefonoEditar&idCatel=<?php echo $item['idCatel']; ?>'><button type="button" class="btn btn-success">Editar</button></a></td>
                <td><a href='index.php?action=caTelefonoEliminar&idCatel=<?php echo $item['idCatel']; ?>'><button type="button" class="btn btn-success">Eliminar</button></a></td>    
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php //} ?>