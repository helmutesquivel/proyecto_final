<?php
//require 'autoload.php';
//require 'vendor/autoload.php';
use Controller\DetalleController;
use Dompdf\Dompdf;
use Dompdf\Options;
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Cursos</title>

    <style>
        /* Estilos CSS para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .btn {
            padding: 6px 12px;
        }
    </style>
</head>

<body>
    <div class="titulo center">ASIGNACION DE CURSOS</div>
    <table class="table mt-3" id="tabla">
        <thead>
            <tr class="table-primary">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>CURSO</th>
                <th>FECHA DE ASIGNACION</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Crear una instancia del controlador y obtener los datos de la base de datos
            $detalle = new DetalleController();
            $listado = $detalle->mostrar();

            foreach ($listado as $row => $item) : ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['Nombre']; ?></td>
                    <td><?php echo $item['Apellido']; ?></td>
                    <td><?php echo $item['Curso']; ?></td>
                    <td><?php echo $item['Asignado']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<?php
$html = ob_get_clean(); // En $html está almacenado todo el HTML para pasarlo a PDF

// Configuración de opciones
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

// Crear instancia de Dompdf
$dompdf = new Dompdf($options);

// Agregar esta línea para habilitar PHP en Chrome
//$dompdf->set_option('isPhpEnabled', true);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter', 'portrait');

// Renderizar PDF
$dompdf->render();

// Descargar o mostrar en línea el PDF
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=asignacioncursos.pdf");
ob_end_clean();
echo $dompdf->output();
//$dompdf->stream();
?>