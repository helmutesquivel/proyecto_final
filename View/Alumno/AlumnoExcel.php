<?php
require 'vendor/autoload.php'; //Composer
//require 'vendor/phpoffice/phpspreadsheet/Spreadsheet.php';

use Controller\AlumnoController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

//use phpoffice\phpspreadsheet\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require 'Model/ConexionModel.php';
require 'Controller/AlumnoController.php';
require 'Model/AlumnoModel.php';

// Crear instancia, clase controller
$alumno = new AlumnoController();
$listado = $alumno->mostrar();

// Crear instancia de la hoja de cálculo
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Agregar encabezados
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Nombre');
$sheet->setCellValue('C1', 'Nombre');
$sheet->setCellValue('D1', 'Apellido');
$sheet->setCellValue('E1', 'Apellido');
$sheet->setCellValue('F1', 'Direccion');
$sheet->setCellValue('G1', 'Carne');
$sheet->setCellValue('H1', 'Grado');
// Agregar datos desde la base de datos
//print_r ($listado);
$row = 2;
foreach ($listado as $item) {
    $sheet->setCellValue('A' . $row, $item['idAlu']);
    $sheet->setCellValue('B' . $row, $item['primerNombre']);
    $sheet->setCellValue('C' . $row, $item['segundoNombre']);
    $sheet->setCellValue('D' . $row, $item['primerApellido']);
    $sheet->setCellValue('E' . $row, $item['segundoApellido']);
    $sheet->setCellValue('F' . $row, $item['Direccion']);
    $sheet->setCellValue('G' . $row, $item['carne']);
    $sheet->setCellValue('H' . $row, $item['grado']);
    $row++;
}

// Crea objeto de escritura para exportar a formato Excel (xlsx)
$writer = new Xlsx($spreadsheet);
// Establecer las cabeceras para forzar la descarga
ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadoalumno.xlsx"');
header('Cache-Control: max-age=0');

// Enviar la salida del escritor al navegador
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');

/*$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('output.xlsx'); */