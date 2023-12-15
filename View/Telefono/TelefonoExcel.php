<?php
require 'vendor/autoload.php'; //Composer
//require 'vendor/phpoffice/phpspreadsheet/Spreadsheet.php';

use Controller\TelefonoController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

//use phpoffice\phpspreadsheet\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require 'Model/ConexionModel.php';
require 'Controller/TelefonoController.php';
require 'Model/TelefonoModel.php';

// Crear instancia, clase controller
$telefono = new TelefonoController();
$listado = $telefono->mostrar();

// Crear instancia de la hoja de cálculo
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Agregar encabezados
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Telefono');
$sheet->setCellValue('C1', 'Nombre');
$sheet->setCellValue('D1', 'Apellido');
$sheet->setCellValue('E1', 'Compañilla');
// Agregar datos desde la base de datos
//print_r ($listado);
$row = 2;
foreach ($listado as $item) {
    $sheet->setCellValue('A' . $row, $item['idTel']);
    $sheet->setCellValue('B' . $row, $item['telefono']);
    $sheet->setCellValue('C' . $row, $item['primerNombre']);
    $sheet->setCellValue('D' . $row, $item['primerApellido']);
    $sheet->setCellValue('E' . $row, $item['tipo']);
    $row++;
}

// Crea objeto de escritura para exportar a formato Excel (xlsx)
$writer = new Xlsx($spreadsheet);
// Establecer las cabeceras para forzar la descarga
ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadotelefono.xlsx"');
header('Cache-Control: max-age=0');

// Enviar la salida del escritor al navegador
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');

/*$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('output.xlsx'); */