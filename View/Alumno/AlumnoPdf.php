<?php
//require 'autoload.php';
//require 'vendor/autoload.php';
use Controller\AlumnoController;
use Dompdf\Dompdf;
use Dompdf\Options;
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Alumnos</title>

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
    <div class="titulo center">LISTADO ALUMNOS</div>
    <table class="table mt-3" id="tabla">
        <thead>
            <tr class="table-primary">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>APELLIDO</th>
                <th>DIRECCION</th>
                <th>CARNE</th>
                <th>GRADO</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Crear una instancia del controlador y obtener los datos de la base de datos
            $alumno = new AlumnoController();
            $listado = $alumno->mostrar();

            foreach ($listado as $row => $item) : ?>
                <tr>
                    <td><?php echo $item['idAlu']; ?></td>
                    <td><?php echo $item['primerNombre']; ?></td>
                    <td><?php echo $item['segundoNombre']; ?></td>
                    <td><?php echo $item['primerApellido']; ?></td>
                    <td><?php echo $item['segundoApellido']; ?></td>
                    <td><?php echo $item['Direccion']; ?></td>
                    <td><?php echo $item['carne']; ?></td>
                    <td><?php echo $item['grado']; ?></td>
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
header("Content-Disposition: inline; filename=listadoAlumno.pdf");
ob_end_clean();
echo $dompdf->output();
//$dompdf->stream();
?>