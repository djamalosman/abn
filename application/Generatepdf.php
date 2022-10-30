<?php

//require('pdfcreate/fpdf.php');

Class Generatepdf extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->helper(array('form', 'url'));
        if ($_SERVER['SERVER_NAME'] == 'localhost') {
            $dsn1 = 'mysqli://root:@localhost/xplmjdmx_dbmgmtmenu';
            $this->db = $this->load->database($dsn1, true);

            $dsn2 = 'mysqli://root:@localhost/xplmjdmx_dbbsscollection';
            $this->db2 = $this->load->database($dsn2, true);
        } else {
            $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
            $this->db = $this->load->database($dsn1, true);

            $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
            $this->db2 = $this->load->database($dsn2, true);
        }
        $this->load->model('Generatesp', '', TRUE);
    }

//// Page header


    function index($id, $sp) {
        $item = $this->Generatesp->getdatasp1($id);
        $cif = $item->NomorNasabah;
        $item1 = $this->Generatesp->getcustomer($cif);
        $alamat = $item1->ADDRESS;

        $nama = $item->f_nama_nasabah;
        $nomor = $item->f_nomer;
        $plafonamount = $item->PlafondAmount;
        $masa = $item->f_masa;

// Instanciation of inherited class
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 15);
// Move to the right
        $pdf->Cell(80);
// Title
        if ($sp == 'SP1') {
            $sp1 = 'Surat Peringatan I';
        } elseif ($sp == 'SP2') {
            $sp1 = 'Surat Peringatan II';
        } else {
            $sp1 = 'Surat Peringatan III';
        }
        $pdf->Cell(30, 5, $sp1, 0, 0, 'C');

        $pdf->Ln(5);

        $pdf->SetFont('Times', '', 12);
        $pdf->Ln(5);
// area di isi sesuai area date generate 

        $pdf->Cell(0, 10, 'Jakarata , ' . date('d M Y'), 0, 1);

// no surat 
//        $pdf->Cell(0, 5, 'Nomor : ' . $nomer, 0, 1);
// ... pemberitahuan ke ?
        $pdf->Cell(0, 5, 'Nomor    : ' . $nomor, 0, 1);
        $pdf->Cell(0, 5, 'Prihal     : ' . $sp1, 0, 1);
        $pdf->Cell(0, 10, 'KEPADA YTH : ' . $nama, 0, 1);

// nama nasbah 
        $pdf->SetTextColor(255, 0, 0);
        $pdf->Cell(0, 5, 'BAPAK/IBU ' . $nama, 0, 1);
// alamat lengkap nasbah 
        $pdf->MultiCell(70, 4, $alamat, 0, 1);
        $pdf->SetFont('', 'U', 11);
        $pdf->Cell(70, 4, 'UP : BAPAK/IBU', 0, 1);
        $pdf->SetFont('', '');

        function white($pdf, $val) {
            $pdf->SetTextColor(230, 230, 230);
            return $pdf->Text(0, 0, $val);
        }

        function black($pdf, $val) {
            $pdf->SetTextColor(0, 0, 0);
            return $pdf->Text(0, 0, $val);
        }

        

        $widtdim = 'lali memenuhi  kewajiban berdasarkan perjanjian yaitu sejumlah ';
        $widtdim1 = 'Rp.' . $plafonamount . ' ';
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Ln(10);
        $pdf->Cell(0, 5, 'Dengan hormat,', 0, 1);
        $pdf->Ln(5);
        $pdf->Cell(180, 5, 'Menunjuk pada perjanjian yang telah Bapak/Ibu sepakati dan ditanda tangani, dimana Bapak/Ibu telah', 0, 'LR');
        $pdf->Ln();
        $pdf->Cell($pdf->GetStringWidth($widtdim), 5, 'lali memenuhi kewajiban berdasarkan perjanjian yaitu sejumlah', 0, 0);
        $pdf->SetTextColor(255, 0, 0);
        $pdf->Cell($pdf->GetStringWidth($widtdim1), 5, 'Rp.' . $plafonamount, 0, 0);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 5, 'dengan rincian sebagai terlampir', 0, 0);
        $pdf->Ln(10);
        $pdf->MultiCell(180, 5, 'apabila Bapak/Ibu tidak melakukan pembayaran atas jumlah tunggakan sebagai mana di jelaskan di atas dalam batas jangka waktu ' . $masa . ' hari kalender sejak tanggal surat ini, dengan demikian Bapak/Ibu tidak beritikad baik untuk memenuhi kewajiban Bapak/Ibu sesuai perjanjian.', 0, 1);
        $pdf->Ln(10);
        $pdf->MultiCell(180, 5, 'Demikian surat ini kami sampaikan dan harap Bapak/Ibu memperhatikan. Atas perhatianya, kami ucapkan terimakasih.', 0, 1);
// jenis fasilitas di isi dari db
// 
        $pdf->Ln(10);
        $pdf->MultiCell(180, 5, 'Hormat kami,', 0, 1);
        $pdf->Cell(180, 5, 'PT. Bank Sahabat Sampoerna', 0, 1);


// nama dephead di isi dari db
        $pdf->Ln(40);
        $pdf->SetFont('', 'U');
        $namabm = ('Nama Branch Manager');
        $namadh = ('Nama Depthead');
        $pdf->Cell($pdf->GetStringWidth($namabm), 5, $namabm, 0, 0);
        $pdf->Cell(20);
        $pdf->Cell($pdf->GetStringWidth($namadh), 5, $namadh, 0, 1);
//$pdf->Cell(20);
        $pdf->SetFont('', '');
        $pdf->Cell(18, 5, 'Branch Manager', 0, 1);
        
        $pdf->Ln(40);
        $pdf->MultiCell(160, 10, 'Melakukan pelunasan, dengan meyetorkan sejumlah dana sesuai kewajiban debitur', 1, 1);

// $html='<table border="1">
// <tr>
// <td width="200" height="30">cell 1</td><td width="200" height="30" bgcolor="#D0D0FF">cell 2</td>
// </tr>
// <tr>
// <td width="200" height="30">cell 3</td><td width="200" height="30">cell 4</td>
// </tr>
// </table>';
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
// Instanciation of inherited class
        $dateTime = date("Ymd");
        $filename = "C:/tmp/BSS/testreport_" . $dateTime . ".pdf";

// $pdf->WriteHTML($html);
        $pdf->Output();
    }

}
