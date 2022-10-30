<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPdf extends CI_Controller {
         public function __construct(){

        parent::__construct();

        $this->db = $this->load->database('default', true);     
		$this->db2 = $this->load->database('second', true); 

  

        

        $this->load->helper(array('url', 'form'));

        $this->load->library('session');
        
        //$this->load->library('Koneksi');

        $this->load->model('Menu_model', '', TRUE);

        $this->load->model('Content_model', '', TRUE);

         $this->load->helper('captcha');

         $this->load->model('Model_create_document', '', TRUE);
        


    }
    public function  index($cif1)
    {
        $namacif = $cif1;
                $cifambil = explode("-", $namacif);
                $cif = $cifambil['0'];
                $id=$cifambil['1'];
        $data['getdata_restrukturisasi'] = $this->Model_create_document->laporanpdf($cif);
        $data['restrukturisasi_getdata'] = $this->Model_create_document->pdflaporan($cif);
        $data['usulan_kredit_pdf'] = $this->Model_create_document->usulan_kredit_pdf($cif);
        $data['search_norek'] = $this->Model_create_document->search_norek_pdf($cif);
        $data['restrukturisasi_pengapusan'] = $this->Model_create_document->getdata_rrestrukturisasi_pengapusan($id);
        $data['restrukturisasi_lampiran'] = $this->Model_create_document->getdata_restrukturisasi_lampiran($id);
        $data['restrukturisasi_deversiasi'] = $this->Model_create_document->restrukturisasi_deversiasi($id);
        $this->load->library('mypdf');
        $this->mypdf->generate('laporan_pdf_restruktur',$data);
    }

    public function pelunasan_ptbam ($cif1)
    {
        $cifambil = explode("-", $cif1);
        $cif = $cifambil['0'];
        $id=$cifambil['1'];
        $data['getdata_pelunasan_ptbam_row'] = $this->Model_create_document->laporanpdf_ptbam($cif);
        $data['pelunasan_ptbam_getdata_result'] = $this->Model_create_document->ptbam_pdflaporan($cif);
        $data['ambil_upayapenagihan']= $this->Model_create_document->ambil_upayapenagihan($id);
        $data['kondisi_penjualan']= $this->Model_create_document->ambil_kondisipenualan($id);
        $data['lampiran']=$this->Model_create_document->ambil_lampiran($id);
        $this->load->library('mypdf');
        $this->mypdf->generate('pdf_pelunasan_ptbam',$data);
    }

    public function perpanjangan($cif1)
    {
        $cifambil = explode("-", $cif1);
        $cif = $cifambil['0'];
        $id=$cifambil['1'];
        $data['perpanjangan_row'] = $this->Model_create_document->perpanjangan_pdflaporan_row($cif);
        $data['perpanjangan_result'] = $this->Model_create_document->perpanjangan_pdflaporan_result($cif);
        $data['note_jaminan_edit']= $this->Model_create_document->note_jaminan_edit($id);
        $data['rekap_rekening_edit']= $this->Model_create_document->rekap_rekening_edit($id);
        $data['informasi_sid_edit']= $this->Model_create_document->informasi_sid_edit($id);
		 $data['rekap_rekening_edit_row'] = $this->Model_create_document->rekap_rekening_edit_row($id);
        $this->load->library('mypdf');
        $this->mypdf->generate('pdf_perpanjangan',$data);
    }

    public function pelunasan($cif1)
    {
        $cifambil = explode("-", $cif1);
        $cif = $cifambil['0'];
        $id=$cifambil['1'];
        $data['pelunasan_row'] = $this->Model_create_document->pelunasan_pdflaporan_row($cif);
        $data['pelunasan_result'] = $this->Model_create_document->pelunasan_pdflaporan_result($cif);
        $data['kondisi_penlunasan']= $this->Model_create_document->ambil_kondisipenualan_mrpkpelunasan($id);
        $data['ambil_upayapenagihan']= $this->Model_create_document->ambil_upayapenagihan_mrpkpelunasan($id);
        $data['ambil_lampiran']= $this->Model_create_document->ambil_lampiran_mrpkpelunasan($id);
        $this->load->library('mypdf');
        $this->mypdf->generate('pdf_pelunasan',$data);
    } 
   public function writeof($cif1)
    {
        $cifambil = explode("-", $cif1);
        $cif = $cifambil['0'];
        $id=$cifambil['1'];
        $data['wo_row'] = $this->Model_create_document->wo_pdflaporan_row($cif);
        $data['wo_result'] = $this->Model_create_document->wo_pdflaporan_result($cif);
        $data['kondisi_penjualan'] = $this->Model_create_document->ambil_kondisipenualan_mrpk_wo($id);
        $data['ambil_upayapenagihan'] = $this->Model_create_document->ambil_upayapenagihan_mrpk_wo($id);
        $data['ambil_lampiran'] = $this->Model_create_document->ambil_lampiran_mrpk_wo($id);
        $this->load->library('mypdf');
        $this->mypdf->generate('pdf_writeof',$data);
    }





}

