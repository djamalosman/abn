<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelRestru extends CI_Model {

    public function get_restru() {
       $data = "select a.f_nama_nasabah,a.f_cif,a.f_tgl_visit from t_kunjungan AS a WHERE a.f_actionplan LIKE '%Restruktur%' order by a.f_id desc ";
        return $this->db2->query($data)->result();
        //return;
    }

    public function vtables1($value)
    {
$data="SELECT 
a.no_nasabah,a.id_loan,a.sub_product,a.f_id,a.nama_debitur,
a.fasilitas_awal,a.fasilitas_baru,a.plafound_awal,
a.bunga_awal,a.plafound_baru,a.cabang,a.ao,a.jaminan,
a.sruktur_fasilitas_baru,a.lbu_sifat_kredit,a.cara_restruktur,
a.restruktur_ke,a.kol_sebelumnya,a.kol_baru,a.jmlhr_tunggkn,
a.jk_waktu_awal,a.jkwaktu_expireddate,a.jenis_usaha,
a.alasan_restruktur,a.kondisi_usaha,a.tgleksekusirestruktur,
a.gp,a.jk_waktu_gp,a.tgl_berakhir_gp,a.bunga_gp,a.keterangan,a.pic 
FROM t_restrukturisasi AS a 
LEFT JOIN t_kunjungan As b ON a.no_nasabah=b.f_cif
LEFT JOIN t_image_restru AS d ON a.no_nasabah=d.cif
WHERE a.no_nasabah='".$value."' AND a.restruktur_ke !=''  GROUP by a.restruktur_ke";
 return $this->db2->query($data)->result();
    }
    
        public function vtables2($value)
    {
$data="SELECT 
a.no_nasabah,a.id_loan,a.sub_product,a.nama_debitur,
a.fasilitas_awal,a.fasilitas_baru,a.plafound_awal,
a.bunga_awal,a.plafound_baru,a.cabang,a.ao,a.jaminan,
a.sruktur_fasilitas_baru,a.lbu_sifat_kredit,a.cara_restruktur,
a.restruktur_ke,a.kol_sebelumnya,a.kol_baru,a.jmlhr_tunggkn,
a.jk_waktu_awal,a.jkwaktu_expireddate,a.jenis_usaha,
a.alasan_restruktur,a.kondisi_usaha,a.tgleksekusirestruktur,
a.gp,a.jk_waktu_gp,a.tgl_berakhir_gp,a.bunga_gp,a.keterangan,a.pic 
FROM t_restrukturisasi AS a 
LEFT JOIN t_kunjungan As b ON a.no_nasabah=b.f_cif
LEFT JOIN t_image_restru AS d ON a.no_nasabah=d.cif
WHERE a.no_nasabah='".$value."' AND a.restruktur_ke !=''  GROUP by a.restruktur_ke";
 return $this->db2->query($data)->result();
    }


    public function delete_all_restru($var)
    {
        $null=null;
        $flag="restrukturisasi";
       foreach ($var as $item) {
            $this->db2->where('no_nasabah',$item);
            $this->db2->delete('t_restrukturisasi');

            $this->db2->where('cif',$item);
            $this->db2->delete('t_image_restru');

            $this->db2->set('f_actionplan',$null);
            $this->db2->where('f_cif',$item);
            $this->db2->where('f_actionplan',$flag);
            $this->db2->update('t_kunjungan');
        }
    }

    public function deleteupdate_restru($id1)
    {
        $null=null;
       foreach ($id1 as $item) {
            $this->db2->where('restruktur_ke',$item);
            $this->db2->delete('t_restrukturisasi');

            $this->db2->where('code',$item);
            $this->db2->delete('t_image_restru');
			
			$a=array(
			'f_actionplan'=>$null
				);
            $this->db2->where('f_cif',$item);
            $this->db2->update('t_kunjungan',$a);
        }
    }
    public function restru_updatemodal($cif_nsb,$restrukturke,$data,$idnya) {
       // var_dump($cif_nsb,$f_id_nsb,$data);

       
        // $this->db2->SET('code',$restrukturke);
        // $this->db2->where('code',$idnya);
        // $this->db2->UPDATE('t_image_restru');

        $this->db2->WHERE('restruktur_ke',$restrukturke);
        $this->db2->WHERE('no_nasabah',$cif_nsb);
        $this->db2->UPDATE('t_restrukturisasi',$data);
        
        
//        if(!empty($data))
//        {
//            
//        }
    }
    public function updateimage($result) {
        //var_dump($result);
      $this->db2->insert_batch('t_image_restru',$result);
    }
    
    public function deleteimage($nomor_nasabah,$restruktur_ke,$idnya) {
        foreach ($idnya as $item) {
            $this->db2->where('file_content', $item);
            $this->db2->where('code', $restruktur_ke);
            
            $this->db2->delete('t_image_restru');
        }
//        echo var_dump($restruktur_ke);
//        echo var_dump($idnya);
    }
    public function imageview($cif,$get_restru) {
        $data="SELECT  a.no_nasabah,a.restruktur_ke FROM t_restrukturisasi AS a 
WHERE a.restruktur_ke='".$get_restru."' AND a.no_nasabah='".$cif."' GROUP BY a.no_nasabah";
        return $this->db2->query($data)->row();
        
    }
    public function imagedeatil($cif,$get_restru)
    {
        //var_dump($cif);
       $data="SELECT b.name_dokumen,b.file_content,b.cif,b.type_file FROM t_restrukturisasi AS a 
JOIN t_image_restru AS b on a.restruktur_ke= b.code
WHERE a.restruktur_ke='".$get_restru."' AND b.cif='".$cif."'";
return $this->db2->query($data)->result();
    }

    public function rowActivity($value)
    {
       $data="SELECT a.PlafondAmount,a.id,a.NamaDebitur,a.NomorRekening,
       a.NomorNasabah,a.KodeCabang,a.JmlHariTunggakan,
       e.COMPANY_NAME,b.* from bss_cad AS a
LEFT JOIN t_kunjungan AS b on a.NomorNasabah=b.f_cif 
LEFT JOIN BSS_LD_SUB_PRODUCT AS d on a.FacilityType=d.ID 
LEFT JOIN bss_company AS e on a.KodeCabang=e.ID 
LEFT JOIN bss_category AS f on a.FacilityType=f.id
LEFT JOIN bss_ld AS g on a.ID=g.ID 
WHERE a.NomorNasabah='".$value."' GROUP BY  a.NomorNasabah";
return $this->db2->query($data)->row();
    }

    public function parameter() {
       $data="SELECT f_code,f_desc from t_parameter WHERE f_untuk ='w'";
       return $this->db2->query($data)->result();
    }

     public function insertrestru($result,$dataupload) {
//         var_dump($result);
//         var_dump($dataupload);
       $this->db2->insert_batch('t_image_restru',$result);
       $this->db2->insert('t_restrukturisasi',$dataupload);
       
    }

    public function detailrestru($selection) {
      $data = "SELECT a.NamaDebitur,a.NomorNasabah,a.ID,c.f_desc,b.* from bss_cad AS a LEFT JOIN t_kunjungan AS b on a.NomorNasabah=b.f_cif LEFT JOIN t_parameter AS c on b.f_status_restru=c.f_code WHERE b.f_actionplan='Restrukturisasi'AND b.f_cif='".$selection."' ";
        return $this->db2->query($data)->row();
    }

    public function image_restru($id) {
        $data="SELECT file_content from t_image_restru WHERE cif='".$id."'";
        return $this->db2->query($data)->result();
    }

    public function branch($nik) {
//     
    }

    public function branchdata() {
//        $querycabang = "select * from bss_company order by COMPANY_NAME asc";
        
    }

    public function input($selection, $nik) {
       
    }

   public function excelrestru() {
        $data="SELECT * from t_restrukturisasi";
 return $this->db2->query($data)->result();
    }
}
