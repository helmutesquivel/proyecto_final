<?php

use Controller\MateriaController;

if(!empty($_SESSION['idUsu'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$materia = new MateriaController;

$listado = $materia->mostrar();

?>
<h1>Cursos</h1>
<a href='index.php?action=materiaPdf'><button type="button" class="btn btn-warning mr-4">Descargar Pdf</button></a> <a href='index.php?action=materiaExcel'><button type="button" class="btn btn-success">Descargar Excel</button></a>
<table class="table table-hove mt-3">
    <thead>
        <tr class="table-success">
            <th scope="row">No</th>
            <td>Cursos</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listado as $row => $item) : ?>
            <tr class="table-success">
                <td><?php echo $item['idMate']; ?></td>
                <td><?php echo $item['materia']; ?></td>
              
                <td><a href='index.php?action=materiaEditar&idMate=<?php echo $item['idMate']; ?>'><button type="button" class="btn btn-success">Editar</button></a></td>
                <td><a href='index.php?action=materiaEliminar&idMate=<?php echo $item['idMate']; ?>'><button type="button" class="btn btn-success">Eliminar</button></a></td>    
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php } ?>