<?php 

namespace Controller;

require 'vendor/autoload.php';
use Dompdf\Dompdf;

class PdfController{
    public function generate(){
       // $usuarios = new UsuarioController();
        //$listUsuarios = $usuarios->listarUsuarios();
        $dompdf = new Dompdf();

        $headerTable= '
       <a>hola</a>';

        $footerTable='';

        $bodyTable="";
        /*
        foreach($listUsuarios as $usuario){
            $bodyTable = $bodyTable."<tr><td>".$usuario['nombres']."</td>"."<td>".$usuario['apellidos']."</td></tr>";
        }
    */
        $completeTable = $headerTable.$bodyTable.$footerTable;

        $dompdf->loadHtml($completeTable);
        $dompdf->render();
        
        ob_end_clean();//Limpiar las etiquetas del header
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=documento.pdf");
        
        
       exit;
    }
}

?>