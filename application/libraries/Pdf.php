<?php

include_once APPPATH . '/third_party/fpdf/pdfcreate/fpdf.php';

class Pdf extends FPDF {

//    function __construct() {
//        
//    }
    function Header() {
        // Logo
        //$this->Image( site_url('image/logobss.png') ,140, 6, 60);
        // Arial bold 15
//        $this->SetFont('Arial', 'B', 15);
////         Move to the right
//        $this->Cell(80);
////         Title
//        $this->Cell(30, 40, 'Surat Peringatan', 0, 0, 'C');
////         Line break
        $this->Ln(20);
    }
// Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}
