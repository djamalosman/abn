<?php

use Dompdf\Dompdf;
require_once './vendor/dompdf/dompdf/autoload.inc.php';

class PdfGenerator {

    public function generate($html, $filename) {

//        define('DOMPDF_ENABLE_AUTOLOAD', false);
        
//        require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");

        

        $dompdf = new DOMPDF();
        
        $dompdf->load_html($html);
        $dompdf->render();       
        
//        $dompdf->stream($filename . '.pdf', array("Attachment" => 0));
        
        $pdf = $dompdf->output();
        if($_SERVER['SERVER_NAME'] == 'localhost'){
            $file_location = $_SERVER['DOCUMENT_ROOT']."/dashboard_master/pdfReports/".$filename.".pdf";
        }else{
            $file_location = $_SERVER['DOCUMENT_ROOT']."/c24system/pdfReports/".$filename.".pdf";
        }    
        file_put_contents($file_location,$pdf);         
    }
}

?>