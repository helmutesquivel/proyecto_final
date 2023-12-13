<?php 
ob_start();
session_start();//Única ejecución, porque index carga a los demás archivos.

date_default_timezone_set('America/Guatemala');

require 'vendor/autoload.php';
require 'autoload.php';
require_once('Helpers/Helpers.php');
use Controller\PaginaController;

$pagina = new PaginaController;

$pagina->mostrarInicio();
?>