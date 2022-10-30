<?php

//require('pdfcreate/fpdf.php');

Class Generatepdf extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->helper(array('form', 'url'));

        $this->db = $this->load->database('default', true);
        $this->db2 = $this->load->database('second', true);

        $this->load->model('Generatesp', '', TRUE);
        $this->load->model('Model_spe', '', TRUE);
    }
	function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

    function integerToRoman($integer) {
        // Convert the integer into an integer (just to make sure)
        $integer = intval($integer);
        $result = '';

        // Create a lookup array that contains all of the Roman numerals.
        $lookup = array('M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1);

        foreach ($lookup as $roman => $value) {
            // Determine the number of matches
            $matches = intval($integer / $value);

            // Add the same number of characters to the string
            $result .= str_repeat($roman, $matches);

            // Set the integer to be the remainder of the integer and the value
            $integer = $integer % $value;
        }

        // The Roman numeral should be built, return it
        return $result;
    }

//// Page header


    function index($id, $sp) {
        $item = $this->Generatesp->getdatasp1($id);
        $cif = $item->NomorNasabah;
        $nama = $item->f_nama_nasabah;
        $tglrilis = $item->f_date_time;
        $namadir = $item->f_nama_up;
        $jabatan = $item->f_jabatan_up;
//        $nama = $item->NomorNasabah;
        $masa = $item->f_masa;
        $nomor = $item->f_nomer;
        $plafonamount = $item->PlafondAmount;
        $jabatan1 = $item->f_jabatan_1;
        $nama1 = $item->f_nama_asign_1;
        $jabatan2 = $item->f_jabatan_2;
        $nama2 = $item->f_nama_asign_2;
        if ($item->ADDRESS != null) {

            $alamat = $item->ADDRESS;
        } else {
            $alamat = 'null';
        }
        //$dt = $this->Generatesp->getdatatunggakanall($cif);
        if($sp == 'SP3'){
			$dt = $this->Generatesp->getdatatunggakanallsp3($cif,$nomor);
			$totalall = number_format($dt->total_all,2);
		} else{
			$dt = $this->Generatesp->getdatatunggakanall2($cif,$nomor);
			$totalall = number_format($dt->total_all,2);
		}

//        $item1 = $this->Generatesp->getcustomer($cif);
//        $alamat = $item1->ADDRESS;
// Instanciation of inherited class
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 15);
// Move to the right
		$pdf->Ln(10);
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

        $pdf->Cell(0, 10, 'Jakarta , ' .$this->tgl_indo(date('Y-m-d')) , 0, 1);

// no surat 
//        $pdf->Cell(0, 5, 'Nomor : ' . $nomer, 0, 1);
// ... pemberitahuan ke ?
        $pdf->Cell(15, 5, 'Nomor', 0, 0);
        $pdf->Cell(15, 5, ': ' . $nomor, 0, 1);
        $pdf->Cell(15, 5, 'Prihal', 0, 0);
        $pdf->Cell(15, 5, ': ' . $sp1, 0, 1);
        $pdf->Ln(5);
        $pdf->Cell(10, 5, 'KEPADA YTH :', 0, 1);
        $pdf->Cell(10, 5, $nama, 0, 1);
        $pdf->Ln(2);

// nama nasbah 
        //$pdf->Cell(0, 5, 'BAPAK/IBU ' . $nama, 0, 1);
// alamat lengkap nasbah 
        $pdf->MultiCell(70, 4, $alamat, 0, 1);
        $pdf->SetFont('', 'U', 11);
		if (strpos($nama, 'PT') !== false || strpos($nama, 'CV') !== false ) {
			$pdf->Cell(70, 4, 'UP : BAPAK/IBU '.$namadir, 0, 1);
			$pdf->SetFont('', '');
			$pdf->Cell(70, 4, $jabatan, 0, 1);
		}

        $pdf->SetFont('', '');

        function white($pdf, $val) {
            $pdf->SetTextColor(230, 230, 230);
            return $pdf->Text(0, 0, $val);
        }

        function black($pdf, $val) {
            $pdf->SetTextColor(0, 0, 0);
            return $pdf->Text(0, 0, $val);
        }

        $pdf->Ln(10);
        $pdf->Cell(0, 5, 'Dengan hormat,', 0, 1);
        $pdf->Ln(2);

        if ($sp == 'SP1') {
            $pdf->MultiCell(180, 5, 'Menunjuk pada perjanjian yang telah Bapak/Ibu sepakati dan ditanda tangani, dimana Bapak/Ibu telah lalai memenuhi kewajiban berdasarkan perjanjian yaitu sejumlah Rp. ' . $totalall . ' dengan rincian sebagai terlampir.', 0, 'J');
            $pdf->Ln();
            $pdf->MultiCell(180, 5, 'Apabila Bapak/Ibu tidak melakukan pembayaran atas jumlah tunggakan sebagai mana di jelaskan di atas dalam batas jangka waktu ' . $masa . ' hari kalender sejak tanggal surat ini, dengan demikian Bapak/Ibu tidak beritikad baik untuk memenuhi kewajiban Bapak/Ibu sesuai perjanjian.', 0, 'J', false, 1);
        } elseif ($sp == 'SP2') {

            $generatesp = $this->Generatesp->getdatageneratesp1($sp, $cif);
			if($generatesp->num_rows() > 0){
				$datasp1 = $generatesp->row();
				$nomorsp1 = $datasp1->f_nomer;
				$jenissp1 = $datasp1->f_sp;	
				$tglsp1 = $this->tgl_indo($datasp1->f_tgl_cetak);	
			} else {
				$nomorsp1 = '..................';
				$jenissp1 = '..................';
				$tglsp1 = '..................';
			}

//           foreach ($generatesp as $gsp){
//               if($gsp->f_sp == 'SP1'){
//                   $gsp1 = $gsp->f_nomer;
//                   $tglcetak = $gsp->f_tgl_cetak;
//               }
//           }
//        $pdf->Ln(10);
//        $pdf->MultiCell(180, 5, 'SP2 ' . $masa . '/'.$cif.'/'.$nomer.' hari kalender sejak tanggal surat ini, dengan demikian Bapak/Ibu tidak beritikad baik untuk memenuhi kewajiban Bapak/Ibu sesuai perjanjian.', 0, 1);
            $pdf->Ln(0);
            $pdf->MultiCell(180, 5, 'Menunjuk Surat Peringatan I No : '.$nomorsp1.', tertanggal '.$tglsp1.' (selanjutnya disebut "Surat Peringatan I"). Maka dengan ini kami, pihak PT.Bank Sahabat Sampoerna, Menyanpaikan Hal-hal sebagai berikut : ', 0, 'J', false);
            $pdf->Ln(5);
            $pdf->Cell(5, 5, '1.', 0, 0);
            $pdf->MultiCell(175, 5, 'Bahwa sampai saat ini Bapak sama sekali tidak mengindahkan Surat Peringatan I yang telah kami kirimkan kepada Bapak.', 0, 'J', false);
            $pdf->Ln(0);
            $pdf->Cell(5, 5, '2.', 0, 0);
            $pdf->MultiCell(175, 5, 'Bahwa sehubungan dengan hal tersebut di atas maka dengan ini secara tegas kami sampaikan SURAT PERINGATAN II ini kepada Bapak untuk segera memenuhi segala kewajiban yaitu sejumlah Rp. ' . $totalall . ' dengan rincian sebagaimana terlampir.', 0, 'J', false);
            $pdf->Ln(0);
            $pdf->Cell(5, 5, '3.', 0, 0);
            $pdf->MultiCell(175, 5, 'Bahwa dengan ini kami beri waktu selama ' . $masa . ' hari sejak tanggal surat ini untuk segera melunasi Jumlah Tunggakan sebagaiman tercantum di atas, kepada PT. Bank Sahabat Sampoerna.', 0, 'J', false);
            $pdf->Ln(5);
            $pdf->MultiCell(180, 5, 'Apabia Bapak/Ibu tidak melakukan pembayaran atas jumlah tunggakan sebagaimana di jelaskan di atas dalam batas jangka waktu ' . $masa . ' hari kalender sejak tanggal surat ini dengan demikian Bapak/Ibu tidak beritikad baik untuk memenuhi kewajiban Bapak/Ibu sesuai Perjanjian.', 0, 'J', false);
        } else {
            $generatesp = $this->Generatesp->getdatageneratesp1($sp, $cif);
            if($generatesp->num_rows() > 0){
				$datasp1 = $generatesp->row();
				$nomorsp1 = $datasp1->f_nomer;
				$jenissp1 = $datasp1->f_sp;	
				$tglsp1 = $this->tgl_indo($datasp1->f_tgl_cetak);	
			} else {
				$nomorsp1 = '..................';
				$jenissp1 = '..................';
				$tglsp1 = '..................';
			}
			
			$generatesp = $this->Generatesp->getdatageneratesp2($sp, $cif);
            if($generatesp->num_rows() > 0){
				$datasp2 = $generatesp->row();
				$nomorsp2 = $datasp2->f_nomer;
				$jenissp2 = $datasp2->f_sp;	
				$tglsp2 = $this->tgl_indo($datasp2->f_tgl_cetak);	
			} else {
				$nomorsp2 = '..................';
				$jenissp2 = '..................';
				$tglsp2 = '..................';
			}
            $pdf->Ln(0);
            $pdf->MultiCell(180, 5, 'Menunjuk Surat Peringatan I No : '.$nomorsp1.', tertanggal '.$tglsp1.' (selanjutnya disebut "Surat Peringatan I") dan Surat Peringatan II No : '.$nomorsp2.', tertanggal '.$tglsp2.' (selanjutnya di sebut "Surat Peringatan II"), maka dengan ini kami, pihak PT.Bank Sahabat Sampoerna, menyanpaikan Hal-hal sebagai berikut : ', 0, 'J', false);
            $pdf->Ln(2);
            $pdf->Cell(5, 5, '1.', 0, 0);
            $pdf->MultiCell(175, 5, 'Bahwa sampai saat ini Bapak sama sekali tidak mengindahkan surat Peringatan I & II yang telah kami kirimkan kepada Bapak.', 0, 'J', false);
            $pdf->Ln(0);
            $pdf->Cell(5, 5, '2.', 0, 0);
            $pdf->MultiCell(175, 5, 'Bahwa sehubungan dengan hal tersebut di atas maka dengan ini secara tegas kami sampaikan SURAT PERINGATAN III ini kepada Bapak/Ibu untuk segera memnuhi segala kewajiban berdasarkan perjanjian Yang telah di tandatangani, yaitu sejumlah Rp. ' . $totalall . ' dengan rincian sebagaimana terlampir.', 0, 'J', false);
            $pdf->Ln(0);
            $pdf->Cell(5, 5, '3.', 0, 0);
            $pdf->MultiCell(175, 5, 'Bahwa dengan ini kami beri waktu selama ' . $masa . ' hari sejak tanggal surat ini untuk segera melunasi Jumlah Tunggakan sebagaiman tercantum di atas, kepada PT. Bank Sahabat Sampoerna.', 0, 'J', false);
            $pdf->Ln(2);
            $pdf->MultiCell(180, 5, 'Apabia Bapak/Ibu sampai dengan jangka waktu sebagaimana dimaksud dalam angka 3 di atas, Bapak/Ibu tidak melakukan pembayaran, maka kami akan mengambil langkah hukum sebagaimana yang termuat dalam perjanjian jaminan termasuk namun tidak terbatas pada melaksanakan lelang atas jaminan.', 0, 'J', false);
        }
        $pdf->Ln(2);
        $pdf->MultiCell(180, 5, 'Demikian surat ini kami sampaikan dan harap Bapak/Ibu memperhatikan. Atas perhatianya, kami ucapkan terimakasih.', 0, 'J', false, 1);
// jenis fasilitas di isi dari db
// 
        $pdf->Ln(5);
        $pdf->MultiCell(180, 5, 'Hormat kami,', 0, 1);
        $pdf->Cell(180, 5, 'PT. Bank Sahabat Sampoerna', 0, 1);


// nama dephead di isi dari db
        $pdf->Ln(35);
        $pdf->SetFont('', 'U');
		//$pdf->GetStringWidth(90)
        $pdf->Cell(80, 5, $nama1, 0, 0);
        $pdf->Cell(20);
        $pdf->Cell($pdf->GetStringWidth($nama2), 5, $nama2, 0, 1);
//$pdf->Cell(20);
        $pdf->SetFont('', '');
        $pdf->Cell(80, 5, $jabatan1, 0, 0);
        $pdf->Cell(20);
        $pdf->Cell($pdf->GetStringWidth($nama2), 5, $jabatan2, 0, 1);

        $pdf->Ln(5);
        $pdf->MultiCell(180, 5, 'Mohon abaikan surat ini, Apabila anda telah melakukan pembayaran sebagaimana dinyatakan dalam ' . $sp1 . ' Ini. ', 1, 1);
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
        $pdf->AddPage();
		$pdf->Ln(15);
        $pdf->SetFont('', 'U', 12);
        $pdf->Cell(15, 5, 'Lampiran', 0, 1);
        $pdf->SetFont('', '', 11);
        $pdf->Ln(10);

        $pdf->Cell(15, 5, 'Nomor', 0, 0);
        $pdf->Cell(15, 5, ': ' . $nomor, 0, 1);
        $pdf->Cell(15, 5, 'Tanggal', 0, 0);
        $pdf->Cell(15, 5, ': ' . $this->tgl_indo(date('Y-m-d')), 0, 1);
        $pdf->Cell(15, 5, 'Nama', 0, 0);
        $pdf->Cell(15, 5, ': ' . $nama, 0, 1);
        $pdf->Cell(15, 5, 'Prihal', 0, 0);
        $pdf->Cell(15, 5, ': ' . $sp1, 0, 1);
        $pdf->Ln(8);

		if($sp == 'SP3'){
			 $data = $this->Generatesp->getdatatunggakansp3($cif,$nomor);
			 foreach ($data as $da) {
            $fasilitas = $da->fasilitas;
            if ($da->denda == '') {
                $denda = "0.00";
            } else {
                $denda = $da->denda;
            }
			if ($da->os == '') {
                $os = "0.00";
            } else {
                $os = $da->os;
            }
           
            if ($da->pokok == '') {
                $pokok = "0.00";
            } else {
                $pokok = $da->pokok;
            }
            if ($da->bunga == '') {
                $bunga = "0.00";
            } else {
                $bunga = $da->bunga;
            }
            if ($da->total_all == '') {
                $total = "0.00";
            } else {
                $total = $da->total_all;
            }
            //$pdf->MultiCell(180, 5, $fasilitas . '/' . $denda . '/' . $bunga . '/' . $pokok . '/' . $total, 0, 1);
            //$pdf->Ln();
            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(70, 5, 'Facitity ' . $fasilitas, 0, 1);
//            $pdf->Cell(, 5, ': ' . $fasilitas, 0, 1);
            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(70, 5, 'Sisa Outstanding per ' . $tglrilis, 0, 0);
            $pdf->Cell(10, 5, ': Rp.    ', 0, 0);
            $pdf->Cell(30, 5, number_format($os,2), 0, 1, 'R');
            $pdf->Cell(10, 5, '', 0, 0);
			
			$pdf->Cell(70, 5, 'Tunggakan Pokok per ' . $tglrilis, 0, 0);
            $pdf->Cell(10, 5, ': Rp.    ', 0, 0);
            $pdf->Cell(30, 5, number_format($pokok,2), 0, 1, 'R');
            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(70, 5, 'Tunggakan Bunga per ' . $tglrilis, 0, 0);
            $pdf->Cell(10, 5, ': Rp.    ', 0, 0);
            $pdf->Cell(30, 5, number_format($bunga,2), 0, 1, 'R');
            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(70, 5, 'Tunggakan Denda per ' . $tglrilis, 0, 0);
            $pdf->Cell(10, 5, ': Rp.    ', 0, 0);
            $pdf->Cell(30, 5, number_format($denda,2), 0, 1, 'R');
            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(70, 5, 'Jumlah Tunggakan', 0, 0);
            $pdf->Cell(10, 5, ': Rp.    ', 0, 0);
            $pdf->Cell(30, 5, number_format($total,2), 0, 1, 'R');
            $pdf->Ln(5);
        }


		} else {
			 $data = $this->Generatesp->getdatatunggakan($cif,$nomor);
        foreach ($data as $da) {
            $fasilitas = $da->fasilitas;
            if ($da->denda == '') {
                $denda = "0.00";
            } else {
                $denda = $da->denda;
            }
           
            if ($da->pokok == '') {
                $pokok = "0.00";
            } else {
                $pokok = $da->pokok;
            }
            if ($da->bunga == '') {
                $bunga = "0.00";
            } else {
                $bunga = $da->bunga;
            }
            if ($da->total_all == '') {
                $total = "0.00";
            } else {
                $total = $da->total_all;
            }
            //$pdf->MultiCell(180, 5, $fasilitas . '/' . $denda . '/' . $bunga . '/' . $pokok . '/' . $total, 0, 1);
            //$pdf->Ln();
            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(70, 5, 'Facitity ' . $fasilitas, 0, 1);
//            $pdf->Cell(, 5, ': ' . $fasilitas, 0, 1);
            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(70, 5, 'Tunggakan Pokok per ' . $tglrilis, 0, 0);
            $pdf->Cell(10, 5, ': Rp.    ', 0, 0);
            $pdf->Cell(30, 5, number_format($pokok,2), 0, 1, 'R');
            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(70, 5, 'Tunggakan Bunga per ' . $tglrilis, 0, 0);
            $pdf->Cell(10, 5, ': Rp.    ', 0, 0);
            $pdf->Cell(30, 5, number_format($bunga,2), 0, 1, 'R');
            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(70, 5, 'Tunggakan Denda per ' . $tglrilis, 0, 0);
            $pdf->Cell(10, 5, ': Rp.    ', 0, 0);
            $pdf->Cell(30, 5, number_format($denda,2), 0, 1, 'R');
            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(70, 5, 'Jumlah Tunggakan', 0, 0);
            $pdf->Cell(10, 5, ': Rp.    ', 0, 0);
            $pdf->Cell(30, 5, number_format($total,2), 0, 1, 'R');
            $pdf->Ln(5);
        }


		}
       
        $pdf->Ln(8);
        $pdf->MultiCell(180, 5, 'Jumlah Tunggakan yang tertera di atas akan bertambah seiring dengan berjalanya waktu hingga ada pembayaran.', 0, 1);

        $dateTime = date("Ymd");
        $filename = "C:/tmp/BSS/testreport_" . $dateTime . ".pdf";

// $pdf->WriteHTML($html);
        $pdf->Output();
    }

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//////////////////////////////////////////////////////////////////
    public function collreport() {
        $cif = $this->input->post('cif');
        $code = $this->input->post('codeimage');

        $date = date('d M Y');
        $data1 = $this->Generatesp->getkunjungan($cif, $code);
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
// Title
        $pdf->Ln();
        $pdf->SetFillColor(230, 230, 230);
        $pdf->Cell(180, 7, 'Call Report', 1, 0, 'C', 1);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Ln();

        $pdf->Cell(90, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Cell(90, 5, 'Debitur/Yg di temui :', 0, 0);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(25, 5, 'Tgl Meeting/Visit', 0, 0);
        $pdf->Cell(2, 5, ':', 0, 0);
        $pdf->Cell(63, 5, $data1->f_tgl_visit, 0, 0);

        $pdf->Cell(90, 5, $data1->f_bertemu . " : " . $data1->f_keterangan_bertemu, 0, 1);

        $pdf->Cell(25, 5, 'Tgl Report', 0, 0);
        $pdf->Cell(2, 5, ':', 0, 0);
        $pdf->Cell(63, 5, $date, 0, 1);

        $pdf->Cell(25, 5, 'Tempat', 0, 0);
        $pdf->Cell(2, 5, ':', 0, 0);
        $pdf->MultiCell(63, 5, $data1->f_lokasibertemu, 0, 1);

        $pdf->Cell(90, 5, '', 0, 0);
        $pdf->SetFont('Arial', 'U', 9);
        $pdf->MultiCell(90, 5, 'Pihak BSS', 0, 1);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(90, 5, '', 0, 0);
        $pdf->MultiCell(90, 5, $data1->namacoll, 0, 1);

        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Ln(5);
        $pdf->Cell(180, 0, '', 1, 0);
        $pdf->Ln(2);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Cell(90, 5, 'Data Debitur', 0, 0);
        $pdf->Cell(60, 5, '', 0, 1);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(25, 5, 'Nama', 0, 0);
        $pdf->Cell(2, 5, ':', 0, 0);
        $pdf->Cell(63, 5, $data1->f_nama_nasabah, 0, 0);

        $pdf->Cell(25, 5, 'Region', 0, 0);
        $pdf->Cell(2, 5, ':', 0, 0);
        $pdf->Cell(63, 5, 'Nama Region', 0, 1);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(25, 5, 'Jenis Usaha', 0, 0);
        $pdf->Cell(2, 5, ':', 0, 0);
        $pdf->Cell(63, 5, $data1->jenis_usaha, 0, 0);

        $pdf->Cell(25, 5, 'Cabang', 0, 0);
        $pdf->Cell(2, 5, ':', 0, 0);
        $pdf->Cell(63, 5, $data1->cabang, 0, 1);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(25, 5, 'Lokasi Usaha', 0, 0);
        $current_y1 = $pdf->GetY();
        $pdf->Cell(2, 5, ':', 0, 0);
        $pdf->MultiCell(63, 5, $data1->alamat_usaha, 0, 'L', 0);
        $current_y2 = $pdf->GetY();
        $current_x = $pdf->GetX();
        $cell_width = '90';


        $pdf->SetXY($current_x + $cell_width, $current_y1);
        $pdf->Cell(25, 5, 'DPD', 0, 0);
        $pdf->Cell(2, 5, ':', 0, 0);
        $pdf->Cell(63, 5, $data1->dpd, 0, 1);
        $current_x = $pdf->GetX();
        $current_y = $pdf->GetY();
        $cell_width = '90';


        $pdf->SetXY($current_x + $cell_width, $current_y2);
        $pdf->Cell(25, 5, 'COLL', 0, 0);
        $pdf->Cell(2, 5, ':', 0, 0);
        $pdf->Cell(63, 5, $data1->coll, 0, 1);


        $current_y = $pdf->GetY();
        $current_x2 = $pdf->GetX();
        $cell_width2 = '180';
        $pdf->SetXY($current_x2 + $cell_width2, $current_y);
        $pdf->Ln(1);
        $pdf->Cell(180, 0, '', 1, 0);
        $pdf->Ln();

        //fasilitas///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Cell(130, 5, 'Fasilitas', 0, 0);
        $pdf->Cell(50, 5, 'Data', 0, 1);
        $data = $this->Generatesp->getdatatunggakancoll($cif);
        foreach ($data as $da) {
            $fasilitas = $da->fasilitas;
            $denda = $da->denda;
            $os = $da->os;
            $bunga = $da->bunga;
            $dateplafond = $da->date_aproved;
//            $total = $da->total_all;


            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(130, 5, $fasilitas, 0, 0);
            $pdf->Cell(50, 5, $dateplafond, 0, 1);


//        looping
            $pdf->Cell(90, 5, 'OS', 0, 0);
            $pdf->Cell(30, 5, $os, 0, 1, 'R');
//        looping
            $pdf->Cell(90, 5, 'T.Bunga', 0, 0);
            $pdf->Cell(30, 5, $bunga, 0, 1, 'R');

            $pdf->Cell(90, 5, 'T.Denda', 0, 0);
            $pdf->Cell(30, 5, $denda, 0, 1, 'R');
        }






        $current_y = $pdf->GetY();
        $current_x2 = $pdf->GetX();
        $cell_width2 = '180';
        $pdf->SetXY($current_x2 + $cell_width2, $current_y);
        $pdf->Ln(1);
        $pdf->Cell(180, 0, '', 1, 0);
        $pdf->Ln();


        //jaminan////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Cell(60, 5, 'Jaminan', 0, 0);
        $pdf->Cell(35, 5, 'Nilai Pasar', 0, 0, 'C');
        $pdf->Cell(35, 5, 'Nilai Likuidasi', 0, 0, 'C');
        $pdf->Cell(50, 5, 'Data', 0, 1);
        $jaminan = $this->Generatesp->get_jaminan($cif);
        foreach ($jaminan as $ja) {
            $jenis = $ja->f_jaminan;
            $jaminan1 = $ja->Deskripsi;
            $nominal = $ja->f_value;
            $excv = $ja->excv;
            $datevalue = $ja->VALUE_DATE;
            $address = $ja->COLL_ADDRESS;
//            $bunga = $ja->bunga;
//            $dateplafond = $ja->date_aproved;



            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(20, 5, 'Jenis', 0, 0);
            $pdf->Cell(2, 5, ':', 0, 0);
            $current_y3 = $pdf->GetY();

            $pdf->MultiCell(38, 5, $jenis, 0, 0);

            $current_y31 = $pdf->GetY();
            $current_x3 = $pdf->GetX();
            $pdf->SetXY($current_x3 + 62, $current_y3);
            $pdf->Cell(35, 5, $nominal, 0, 0, 'C');
            $pdf->Cell(35, 5, $excv, 0, 0, 'C');

            $pdf->Cell(50, 5, $datevalue, 0, 1);

            $current_x3 = $pdf->GetX();
            $pdf->Ln();
            $pdf->SetXY($current_x3 + 0, $current_y31);
            $pdf->Cell(20, 5, 'Lokasi', 0, 0);
            $pdf->Cell(2, 5, ':', 0, 0);
            $pdf->MultiCell(38, 5, $address, 0, 'L', 0);
        }
        $pdf->Ln();

        $current_y = $pdf->GetY();
        $current_x2 = $pdf->GetX();
        $cell_width2 = '180';
        $pdf->SetXY($current_x2 + 0, $current_y);
        $pdf->Cell(180, 0, '', 1, 1);
        $pdf->Ln();

        //Hasil Kunjungan////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $pdf->Ln(1);
        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Cell(60, 5, 'Tujuan Visit / Meeting  :', 0, 1);
        $pdf->SetFont('Arial', '', 9);
        $pdf->MultiCell(180, 5, "\t" . "\t" . "\t" . $data1->f_tujuan, 0, 'L', 0);
        $pdf->Ln();

        $current_y = $pdf->GetY();
        $current_x2 = $pdf->GetX();
        $cell_width2 = '180';
        $pdf->SetXY($current_x2 + 0, $current_y);
        $pdf->Cell(180, 0, '', 1, 1);
        $pdf->Ln();

        //resume////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $pdf->Ln(1);
        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Cell(60, 5, 'Hasil Pembicaraan / Meeting  :', 0, 1);
        $pdf->SetFont('Arial', '', 9);
        $pdf->MultiCell(180, 5, "\t" . "\t" . "\t" . $data1->f_hasilkunjungan . "\n" . $data1->f_keterangan_hasilkunjungan, 0, 'L', 0);
        $pdf->Ln();

        $current_y = $pdf->GetY();
        $current_x2 = $pdf->GetX();
        $cell_width2 = '180';
        $pdf->SetXY($current_x2 + 0, $current_y);
        $pdf->Cell(180, 0, '', 1, 1);
        $pdf->Ln();

//        action plan//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $pdf->Ln(1);
        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Cell(90, 5, 'Action Plan  :', 0, 0);
        $pdf->Cell(90, 5, 'Date Target  :', 0, 1);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Ln(1);
        $pdf->Cell(90, 5, "\t" . "\t" . "\t" . $data1->f_actionplan, 0, 0);
        $pdf->Cell(90, 5, $data1->f_date_actionplan, 0, 1);
        $pdf->Ln();


        $current_y = $pdf->GetY();
        $current_x2 = $pdf->GetX();
        $cell_width2 = '180';
        $pdf->SetXY($current_x2 + 0, $current_y);
        $pdf->Cell(180, 0, '', 1, 1);
        $pdf->Ln();


        //tanda tangan///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $pdf->SetFont('Arial', '', 9);
        $current_y = $pdf->GetY();
        $current_x2 = $pdf->GetX();
        $pdf->MultiCell(45, 5, "\t" . "\t" . "\t" . 'Dibuat  :' . "\n" . "\n" . "\n" . "\n" . "\n" . "\n", 1, 'L', 0);
        $current_y33 = $pdf->GetY();

        $current_x33 = $pdf->GetX();
        $cell_width2 = '180';
        $pdf->SetXY($current_x2 + 45, $current_y);

        $current_y = $pdf->GetY();
        $current_x2 = $pdf->GetX();
        $pdf->MultiCell(45, 5, "\t" . "\t" . "\t" . 'Mengetahui  :' . "\n" . "\n" . "\n" . "\n", 1, 'L', 0);

        $pdf->SetXY($current_x2 + 45, $current_y);
        $current_y = $pdf->GetY();
        $current_x2 = $pdf->GetX();
        $pdf->MultiCell(45, 5, "\t" . "\t" . "\t" . 'Menyetujui  :' . "\n" . "\n" . "\n" . "\n", 1, 'L', 0);

        $cell_width2 = '180';
        $pdf->SetXY($current_x2 + 45, $current_y);
        $pdf->MultiCell(45, 5, "\t" . "\t" . "\t" . 'Menyetujui  :' . "\n" . "\n" . "\n" . "\n", 1, 'L', 0);



        $current_y = $pdf->GetY();
        $current_x2 = $pdf->GetX();
        $cell_width2 = '180';
        $pdf->SetXY($current_x2 + 0, $current_y);
        $pdf->Cell(45, 5, "\t" . "\t" . 'Name :', 1, 0);
        $pdf->Cell(45, 5, "\t" . "\t" . 'Name :', 1, 0);
        $pdf->Cell(45, 5, "\t" . "\t" . 'Name :', 1, 0);
        $pdf->Cell(45, 5, "\t" . "\t" . 'Name :', 1, 1);




        $current_y = $pdf->GetY();
        $current_x2 = $pdf->GetX();
        $cell_width2 = '180';
        $pdf->SetXY($current_x2 + 0, $current_y);
        $pdf->Cell(45, 5, "\t" . "\t" . 'Tgl :', 1, 0);
        $pdf->Cell(45, 5, "\t" . "\t" . 'Tgl :', 1, 0);
        $pdf->Cell(45, 5, "\t" . "\t" . 'Tgl :', 1, 0);
        $pdf->Cell(45, 5, "\t" . "\t" . 'Tgl :', 1, 0);



//        //        $current_y = $pdf->GetY();
//        $current_x23 = $pdf->GetX();
//        $cell_width = '90';
//        $pdf->MultiCell(90, 5, "\n" . 'Tgl Meeting/Visit' . "\t" . ' :' . "\t" . ' 18-05-2019' . "\n" . 'Tgl Report' . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . ':' . "\t" . '18-05-2019' . "\n" . 'Tempat' . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . ':' . "\t" . 'Alamat' . "\n" . "\n" . "\n" . "\n", 1, 'L', 0);
//        $pdf->SetXY($current_x23 + $cell_width, $current_y);
////        $current_x = $pdf->GetX();
//        $pdf->MultiCell(90, 5, 'Debitur/Yg Ditemui :' . "\n" . 'Nama Debitur' . "\n" . "\n" . 'Pihak Bss :' . "\n" . 'Nama Collector' . "\n" . "\n" . "\n", 1, 'L', 0);
//        $pdf->MultiCell(90, 5, '', 1, 'L', 0);



        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $pdf->Output();
    }

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	////////////////////////////////////////////////////////////////////////
    function spe($id, $sp) {
        $item = $this->Model_spe->getdatasp1($id);
        $prd = $item->prd;
        $cif = $item->NomorNasabah;
        $nama = $item->f_nama_nasabah;
        $tglrilis = $item->f_date_time;
//        $nama = $item->NomorNasabah;
        $enddate = $item->DATEEXPIRED;
        $nomor = $item->f_nomer;
        $produk = $item->f_produk;
        $plafonamount = $item->PlafondAmount1;
        $tenor = $item->selisih_bulan;
        $jabatan1 = $item->f_jabatan_1;
        $nama1 = $item->f_nama_asign_1;
        $contact = $item->f_nama_asign_2;
//        $jabatan2 = $item->f_jabatan_2;
//        $nama2 = $item->f_nama_asign_2;
        if ($item->ADDRESS != null) {

            $alamat = $item->ADDRESS;
        } else {
            $alamat = 'null';
        }
        $dt = $this->Generatesp->getdatatunggakanall($cif);
        $totalall = $dt->total_all2;

//        $item1 = $this->Generatesp->getcustomer($cif);
//        $alamat = $item1->ADDRESS;
// Instanciation of inherited class
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();

        
        $spe = trim($sp, "SPe");
        $roman = $this->integerToRoman($spe);

		$pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 15);
// Move to the right
        $pdf->Cell(80);
// Title
        $pdf->Cell(30, 5, 'Surat Pemberitahuan ' . $roman, 0, 0, 'C');

        $pdf->Ln(5);

        $pdf->SetFont('Times', '', 12);
        $pdf->Ln(5);
// area di isi sesuai area date generate
        $newdate = date("d-M-Y", strtotime($tglrilis));

        $pdf->Cell(0, 10, 'Jakarta, '.$this->tgl_indo(date('Y-m-d')), 0, 1);

// no surat 
        $pdf->Cell(0, 5, 'Nomor : ' . $nomor, 0, 1);

// ... pemberitahuan ke ?

        $pdf->Cell(0, 5, 'Prihal : Surat Pemberitahuan ' . $roman, 0, 1);
        $pdf->Cell(0, 10, 'KEPADA YTH :', 0, 1);

// nama nasbah 
        $pdf->Cell(0, 5, $nama, 0, 1);
// alamat lengkap nasbah 
        $pdf->Ln(2);
        $pdf->MultiCell(70, 4,$alamat, 0, 1);
		
		if($prd == "PT" ){
			
        $pdf->Ln(10);
        $pdf->Cell(0, 5, 'Dengan hormat,', 0, 1);
        $pdf->Ln(5);
        $pdf->MultiCell(180, 5, 'Menunjuk pada Perjanjian kredit yang telah Bapak/Ibu sepakati dan tanda tangani dengan Bank Sahabat Sampoerna ("BSS"), Bersama surat ini kami sampaikan informasi jatuh tempo fasilitas pinjaman Bapak/Ibu dengan rincian sebagai berikut :', 0,'J', false);

// jenis fasilitas di isi dari db
        $pdf->Cell(30, 10, 'JenisFasilitas', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0);
        $pdf->Cell(0, 10, 'Pinjaman Tetap (PT)', 0, 1);

// plafond di isi dari db
        $pdf->Cell(30, 10, 'Plafond', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0);
        $pdf->Cell(0, 10, 'Rp. ' . $plafonamount, 0, 1);

// bulan di isi dari db
        $pdf->Cell(30, 10, 'Jangka Waktu', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0);
        $pdf->Cell(0, 10, $tenor . ' Bulan', 0, 1);

        $pdf->Cell(45, 10, 'Akan jatuh tempo pada ', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 1);

        $pdf->SetFillColor(230, 230, 230);
        $pdf->Cell(45, 5, 'Tenor', 1, 0, 'C', 1);
        $pdf->Cell(60, 5, 'Jatuh Tempo', 1, 1, 'C', 1);

// tanggal di isi dari db 
        $pdf->Cell(45, 5, 'Fasilitas', 1, 0, 'L');
        $pdf->Cell(60, 5, $produk, 1, 1, 'L');

// tanggal di isi dari db 
        $newendate = $this->tgl_indo(date("Y-m-d", strtotime($enddate)));

        $pdf->Cell(45, 5, 'Promes', 1, 0, 'L');
        $pdf->Cell(60, 5, $newendate, 1, 1, 'L');
        $pdf->Ln();


        $pdf->MultiCell(180, 5, 'Sehubungan dengan hal tersebut, maka kami sampaikan hal-hal yang harus dilakukan sebagai tindak lanjut sehubungan dengan fasilitas dan / atau promes yang akan jatuh tempo tersebut dengan pilihan sebagai berikut  :', 0, 'J', false);
        $pdf->Ln();
        $pdf->Cell(20, 30, '1', 1, 0, 'T');

// Rp. di isi dari db
        $pdf->MultiCell(160, 5, 'Melakukan perpanjangan tenor fasilitas, dengan melakukan update data dan dokumen yang di peersyaratkan untuk proses perpanjangan dan menyediakan jumlah dana yang wajib di penuhi tepat pada waktunya sejumlah' . "\n" . chr(149) . "\t" . "\t" . 'Kewajiban plafond sesuai promes Rp. ' . $plafonamount . ', DAN/ATAU' . "\n" . chr(149) . "\t" . "\t" . 'Minimal kewajiban bunga sesuai jangka waktu promes fasilitas yang akan diberikan' . "\n" . "\t" . "\t" . "\t" . 'kepada debitur terkait.', 1, 'J', false);
        $pdf->Cell(20, 5, '2', 1, 0, 'T');

        $pdf->MultiCell(160, 5, 'Melakukan pelunasan, dengan menyetorkan sejumlah dana sesuai kewajiban debitur', 1, 'J', false);

        $pdf->Cell(0, 5, '* agar di pilih tindakan Nasabah yang akan di ambil', 0, 0, 'T');


// break page
        $pdf->AddPage();
        $pdf->Ln(5);

// no tlpon di isi dari db 
        $pdf->MultiCell(180, 5, 'Mohon agar Bapak/Ibu dapat memberikan konfirmasi kepada kami dengan menghubungi no '.$contact.' atau menyampaikan konfirmasi ketika di hubungi oleh petugas BSS.', 0, 'J', false);

        $pdf->Ln(10);
        $pdf->MultiCell(180, 5, 'Apabila Bapak/Ibu tidak melakukan konfirmasi tindakan yang akan di ambil dalam jangka waktu 30 (tiga puluh) hari kalender sejak tanggal surat ini, maka kami akan mengambil langkah-langkah yang diperlukan sesuai dengan ketentuan yang berlaku di BSS.', 0, 'J', false);

        $pdf->Ln(10);
        $pdf->MultiCell(180, 5, 'Demikian surat ini kami sampaikan. Atas perhatianya, kami ucapkan trimakasih.', 0, 'J', false);


// 
        $pdf->Ln(10);
        $pdf->MultiCell(180, 5, 'Hormat kami,', 0, 1);
        $pdf->Cell(180, 5, 'PT. Bank Sahabat Sampoerna', 0, 1);


// nama dephead di isi dari db
        $pdf->Ln(40);
        $pdf->SetFont('', 'U');
        $pdf->Cell(180, 5, $nama1, 0, 1);
        $pdf->SetFont('', '');
        $pdf->Cell(180, 5, $jabatan1, 0, 1);

		}
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
        $filename = "C:/BSS/testreport1_" . $dateTime . ".pdf";

// $pdf->WriteHTML($html);$filename,"F"

        $pdf->Output();
    }
	
	

}