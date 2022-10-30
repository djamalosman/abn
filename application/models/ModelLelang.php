<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelLelang extends CI_Model {

    public function viewlelang($userid){
      $data="SELECT a.f_cif,a.f_nama_nasabah,b.* FROM t_kunjungan AS a
      LEFT JOIN t_lelang AS b on a.f_cif=b.cif
      WHERE  a.f_actionplan='Lelang'";
        return $this->db2->query($data)->result();
        }
        public function dokumenfile($id){
            $data="Select a.nama_debitur,a.cif,a.id_t_lelang,a.cif,a.col,a.dpd,a.plafond,a.jenis_jaminan,a.hasil_lelang,
            a.biaya_lelang from
             t_lelang AS a 
            WHERE a.cif='$id' ";
              return $this->db2->query($data)->result();
              }
             
 public function vieweditlelang($id){
       $data="SELECT 
a.id_t_lelang,
a.no_ld,
a.cif,
a.cabang,
a.nama_debitur,
a.fasilitas_pinjaman,
a.flag_probis,
a.col,
a.dpd,
a.plafond,
a.outstanding,
a.ckpn,
a.jenis_jaminan,
a.keterangan_jaminan,
a.lt,
a.lb,
a.alamat_jaminan,
a.periode_lelang_ke,
a.tgl_collect_D,
a.tgl_order_apraisal,
a.mv,
a.lv,
a.penilai_apraisal,
a.tgl_memo_limit,
a.tgl_spk_bls,
a.bls,
a.tgl_somasi_bls,
a.tgl_permohonan_lelang,
a.tgl_pedaftaran_lelang,
a.nilai_limit_lelang,
a.tgl_penepatan_lelang,
a.tgl_lelang,
a.tgl_pengumuman_lelang1,
a.tgl_pengumuman_lelang2,
a.hasil_lelang,
a.terjual_lelang,
a.keterangan,
a.biaya_lelang,
a.pajak_lelang,
a.cutloos,
a.last_status,
a.state_lelang,
b.f_actionplan
from t_lelang AS a 
JOIN t_kunjungan AS b on a.cif=b.f_cif
WHERE b.f_actionplan='Lelang' AND b.f_cif='".$id."' AND a.hasil_lelang !=''";
        return $this->db2->query($data)->result();
        }

     public function get_mntr_lelang_one($id) {
       $data="
       SELECT a.PlafondAmount,a.id,a.NamaDebitur,a.NomorRekening,a.NomorNasabah,a.KodeCabang,a.DueBunga,a.DuePokok,
       a.BakiDebet, a.JmlHariTunggakan,a.FacilityType,
       h.col,h.dpd,h.plafond,h.jenis_jaminan,h.hasil_lelang,
       h.biaya_lelang,
       d.description, e.COMPANY_NAME,f.DESCRIPTION,g.ANNUITY_REPAY_AMT, b.*
from bss_cad AS a 
LEFT JOIN t_kunjungan AS b on a.NomorNasabah=b.f_cif 
LEFT JOIN BSS_LD_SUB_PRODUCT AS d on a.FacilityType=d.ID 
LEFT JOIN bss_company AS e on a.KodeCabang=e.ID 
LEFT JOIN bss_category AS f on a.FacilityType=f.id 
LEFT JOIN bss_ld AS g on a.ID=g.ID 
LEFT JOIN t_lelang AS h on a.NomorNasabah=h.cif 
WHERE b.f_actionplan='Lelang' AND a.NomorNasabah='".$id."'";

         return $this->db2->query($data)->row();
    }
    public function data_insertlelang($uploadData,$Dataupload,$ambilcodein) {
       // print_r($Dataupload);
        $this->db2->insert('t_lelang',$Dataupload);
        $this->db2->select('code_in,id_t_lelang');
        $this->db2->from('t_lelang');
        $this->db2->where_in('code_in',$ambilcodein);
        
        $select = $this->db2->get()->result(); 
        //var_dump($select);
        foreach($select as $codein){
            foreach($uploadData as $valcodein){
                if ($valcodein['code_in']==$codein->code_in) {
                   $data [] = array(
                       'code'=>$valcodein['code_in'],
                       'cif'=>$valcodein['cif'],
                       'name_file'=>$valcodein['name_file'],
                       'type_file'=>$valcodein['type_file'],
                       'file_content'=>$valcodein['file_content'],
                       'file_size'=>$valcodein['file_size'],
                       'tanggal_insert	'=>$valcodein['tanggal_insert'],
                       
                       'code_image'=>$valcodein['code_image'],
                       'code_in	'=>$valcodein['code_in'],
                       'code'=>$codein->id_t_lelang
                   );
                   
                  
                }
                
            }
        }
           $this->db2->insert_batch('t_image_lelang',$data);
           //$nol=null;
           $this->db2->update('t_lelang',array('code_in'=>''));
           $this->db2->update('t_image_lelang',array('code_in'=>''));
    }
    public function deleteupdate_lelang($id1)
    {
        $null=null;
       foreach ($id1 as $item) {
            $this->db2->where('id_t_lelang',$item);
            $this->db2->delete('t_lelang');

            $this->db2->where('f_id',$item);
            $this->db2->delete('t_image_lelang');
        }
    }
    public function delete_multi_mntr_lelang($cif1)
    {
        $null=null;
       foreach ($cif1 as $item) {
            $this->db2->where('cif',$item);
            $this->db2->delete('t_lelang');

            $this->db2->where('cif',$item);
            $this->db2->delete('t_image_lelang');

			$a=array(
			'f_actionplan'=>$null
				);
            $this->db2->where('f_cif',$item);
            $this->db2->update('t_kunjungan',$a);
        }
    }
     public function createlelang_process($data,$nama,$diloan,$cif,$namestatus) {
        //var_dump($data);
        $this->db2->insert('t_lelang', $data);

        $data=array(
            'f_nama_nasabah'=>$nama,
            'f_cif'=>$cif,
            'f_loanid'=>$diloan,
            'f_actionplan'=>$namestatus
        );
        $this->db2->insert('t_kunjungan',$data);

        $this->db2->error();
    }
     public function getaccountlist($cif) {
        $data = "SELECT a.PlafondAmount,a.id,a.NamaDebitur,a.NomorRekening,a.NomorNasabah,a.KodeCabang,a.DueBunga,a.DuePokok,a.BakiDebet, a.JmlHariTunggakan,a.FacilityType,d.description, e.COMPANY_NAME,f.DESCRIPTION,g.ANNUITY_REPAY_AMT from bss_cad AS a LEFT JOIN BSS_LD_SUB_PRODUCT AS d on a.FacilityType=d.ID LEFT JOIN bss_company AS e on a.KodeCabang=e.ID LEFT JOIN bss_category AS f on a.FacilityType=f.id LEFT JOIN bss_ld AS g on a.ID=g.ID WHERE a.NomorNasabah='".$cif."'";
        return $this->db2->query($data)->row();
    }
    public function debsearchlelang() {
        $data = $this->db2->get('bss_cad');
        return $data->result();
    }
    public function datalelangupdate($no_ld,$cif,$cabang,$nama_debitur,$fasilitas_pinjaman,$flag_probis,$col,$dpd,$plafond,$outstanding,$ckpn,$jenis_jaminan,$keterangan_jaminan ,$lt,$lb,$alamat_jaminan,$periode_lelang_ke,$tgl_collect_D,$tgl_order_apraisal,$mv,$lv,$penilai_apraisal,$tgl_memo_limit,$tgl_spk_bls,$bls,$tgl_somasi_bls,$tgl_permohonan_lelang,$tgl_pedaftaran_lelang,$nilai_limit_lelang,$tgl_penepatan_lelang,$tgl_lelang,$tgl_pengumuman_lelang1,$tgl_pengumuman_lelang2,$hasil_lelang,$terjual_lelang,$keterangan,$biaya_lelang,$pajak_lelang,$cutloos,$last_status,$state_lelang,$id_t_lelang)
    {
        
        $data=array
        (
            'no_ld'=>$no_ld, 			      
            'cif'=>$cif,    			      
            'cabang'=>$cabang, 			      
            'nama_debitur'=>$nama_debitur,   	      
            'fasilitas_pinjaman'=>$fasilitas_pinjaman,       
            'flag_probis'=>$flag_probis,  		      
            'col'=>$col,  				      
            'dpd'=>$dpd,  				      
            'plafond'=>$plafond,                  
            'outstanding'=>$outstanding,              
            'ckpn'=>$ckpn,      
            'jenis_jaminan'=>$jenis_jaminan,            
            'keterangan_jaminan'=>$keterangan_jaminan,       
            'lt'=>$lt,  				      
            'lb'=>$lb,  				      
            'alamat_jaminan'=>$alamat_jaminan,           
            'periode_lelang_ke'=>$periode_lelang_ke,        
            'tgl_collect_D'=>$tgl_collect_D,            
            'tgl_order_apraisal'=>$tgl_order_apraisal,       
            'mv'=>$mv,  				      
            'lv'=>$lv,   
            'penilai_apraisal'=>$penilai_apraisal,
            'tgl_memo_limit'=>$tgl_memo_limit,           
            'tgl_spk_bls'=>$tgl_spk_bls,              
            'bls'=>$bls,                      
            'tgl_somasi_bls'=>$tgl_somasi_bls,           
            'tgl_permohonan_lelang'=>$tgl_permohonan_lelang,    
            'tgl_pedaftaran_lelang'=>$tgl_pedaftaran_lelang, 
            'nilai_limit_lelang'=>$nilai_limit_lelang,       
            'tgl_penepatan_lelang'=>$tgl_penepatan_lelang, 
            'tgl_lelang'=>$tgl_lelang,               
            'tgl_pengumuman_lelang1'=>$tgl_pengumuman_lelang1,   
            'tgl_pengumuman_lelang2'=>$tgl_pengumuman_lelang2,   
            'hasil_lelang'=>$hasil_lelang,  
            'terjual_lelang'=>$terjual_lelang,           
            'keterangan'=>$keterangan,              
            'biaya_lelang'=>$biaya_lelang,           
            'pajak_lelang'=>$pajak_lelang,             
            'cutloos'=>$cutloos,
            'last_status'=>$last_status,
            'state_lelang'=>$state_lelang
        );
        $this->db2->where('id_t_lelang',$id_t_lelang);
        $this->db2->update('t_lelang',$data);
       return 1;
      
    }
    public function viewfoto($id) {
     $data="SELECT file_content,cif,nama_image from t_image_lelang WHERE cif='".$id."'";
     return $this->db2->query($data)->result();
    }

    public function detailrestru($selection) {
      $data = "SELECT a.NamaDebitur,a.NomorNasabah,c.f_desc,b.* from bss_cad AS a LEFT JOIN t_kunjungan AS b on a.NomorNasabah=b.f_cif LEFT JOIN t_parameter AS c on b.f_status_restru=c.f_code WHERE b.f_actionplan='Restrukturisasi'AND b.f_cif='".$selection."' ";
        return $this->db2->query($data)->row();
    }

    public function image_restru($id) {
        $data="SELECT file_content from t_image_restru WHERE cif='".$id."'";
        return $this->db2->query($data)->result();
    }

    public function deleteimage($delimage) {
        foreach ($delimage as $item) {
            $this->db2->where('file_content', $item);
            $this->db2->delete('t_image_lelang');
        }
    }
    
    public function excel_lelang(){
          $data="SELECT * from t_lelang";
 return $this->db2->query($data)->result();
    }

        public function foto_lelang_insert($uploadData) {
//        $querycabang = "select * from bss_company order by COMPANY_NAME asc";
        print_r($uploadData);
        $this->db2->insert_batch('t_image_lelang',$uploadData);
    }

    public function parameter() {
       $data="SELECT f_code,f_desc from t_parameter WHERE f_untuk ='w'";
       return $this->db2->query($data)->result();
    }

    public function delete($selection,$nik){

    }
    public function updateimage($result) {
        //var_dump($result);
      $this->db2->insert_batch('t_image_lelang',$result);
    }
     public function deleteimagelelang($id,$idnya) {
        foreach ($idnya as $item) {
            $this->db2->where('file_content', $item);
            $this->db2->delete('t_image_lelang');
        }
    }
    
    public function imageview($id,$cif) {
        //var_dump($id);
        //var_dump($cif);
        //$data="SELECT b.file_content,b.cif,a.id_t_lelang,b.code FROM t_lelang AS a 
        //JOIN t_image_lelang AS b on a.id_t_lelang= b.code
        //WHERE a.id_t_lelang='".$id."' AND b.cif='".$cif."'";
		$data="SELECT a.cif,a.id_t_lelang FROM t_lelang AS a 
        WHERE a.id_t_lelang='".$id."' AND a.cif='".$cif."'";
       return $this->db2->query($data)->row();
    }
    public function imagedeatil($id,$cif)
    {
        //var_dump($id);
        //var_dump($cif);
        $data="SELECT b.file_content,b.cif,b.type_file FROM t_lelang AS a 
        JOIN t_image_lelang AS b on a.id_t_lelang= b.code
        WHERE a.id_t_lelang='".$id."'AND b.cif='".$cif."'";
        return $this->db2->query($data)->result();
    }
    
}
