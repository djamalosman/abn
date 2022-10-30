<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelAyda extends CI_Model {



    public function ayda_insert($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u, $v, $w, $x, $y, $yy, $z, $bb, $cc, $dd) {
        // var_dump($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$yy,$z,$bb,$cc,$dd);
                $data = array(
                    'f_custname' => $a,
                    'f_cif' => $b,
                    'f_plafondawal' => $c,
                     'f_mv_a' => $d,
                     'f_ltcr' => $e,
                    'f_tglayda' => $f,
                    'f_thnayda' => $g,
                    'f_mobayda' => $h,
                    'f_rangemob' => $i,
                    'f_branch' => $j,
                    'f_tgllpjawalayda' => $k,
                    'f_mv_b' => $l,
                    'f_lv' => $m,
                    'tlgllpjlbh_satuthn' => $n,
                    'f_mvtwo' => $o,
                    'f_lvtwo' => $p,
                    'tlgllpjlbh_duathn' => $q,
                    'f_mvthree' => $r,
                    'f_lvthree' => $s,
                    'f_jenisasset' => $t,
                    'alamat_jaminan' => $u,
                    'lt_lb' => $v,
                    'os_awal' => $w,
                    'hpustgih_ayda' => $x,
                    'nilai_awal_ayda' => $y,
                    'biaya' => $yy,
                    'penjualan_ayda' => $z,
                    'neet_penjualan' => $cc,
                    'tglpenjualan_ayda' => $cc,
                    'ckpn' => $dd
                );
                $this->db2->insert('t_ayda', $data);
            }


    public function ayda_insert_edit($result,$Dataupload) {
       
        


         $this->db2->insert_batch('t_image_ayda',$result);
         $this->db2->insert('t_ayda',$Dataupload);
       
    }

    public function ayda_update($uploadData,$Dataupload,$cif)
    {   
        $data=$this->db2->where('cif',$cif);
        $data=$this->db2->delete('t_image_ayda');
       if (!empty($data)) {
           $cekinputupdate=$this->db2->insert_batch('t_image_ayda',$uploadData);
       }
        if (empty($cekinputupdate)) {
          
            $this->db2->where('f_cif',$cif);
            $this->db2->update('t_ayda',$Dataupload);
        }
        
        
        
    }
    
    public function get_excelAyda(){
        $data="SELECT * from t_ayda";
 return $this->db2->query($data)->result();
    }

        public function tanpafoto_updateayda($result,$cif)
    {
        $this->db2->where('f_cif',$cif);
        $this->db2->update('t_ayda',$result);
    }

    public function aydaedit($a) {
        $data = $this->db2->where('f_cif', $a);
        $data = $this->db2->get('t_ayda');

        return $data->row();
    }
     public function fotoaydaedit($a) {
        $query='SELECT foto,nama_foto FROM t_ayda where f_cif ="'.$a.'"';
         $data1 = $this->db2->query($query);
          return $data1->result();
    }

    public function get_ayda() {
        $data ="select a.f_nama_nasabah,a.f_cif,a.f_tgl_visit
        from t_kunjungan AS a 
WHERE a.f_actionplan='AYDA'";
        //return $data->result();
        return $this->db2->query($data)->result();
    }
  
    public function deleteupdate_ayda($id1)
    {
		$b=null;
      //echo $id1;
       foreach ($id1 as $item) {
			
			$this->db2->where('f_cif',$item);
            $this->db2->delete('t_ayda');
            
            $this->db2->where('cif',$item);
            $this->db2->delete('t_image_ayda');
		
			$a=array(
				'f_actionplan'=>$b
			);
			$this->db2->where('f_cif',$item);
			$this->db2->update('t_kunjungan',$a);
      }
    }
  
    public function ayda_updatemodal($codein,$data) {
        // var_dump($cif_nsb,$f_id_nsb,$data);
         $this->db2->WHERE('code_in',$codein);
         $this->db2->UPDATE('t_ayda',$data);
         
 //        if(!empty($data))
 //        {
 //            
 //        }
     }
    public function aydaview_detail($value) {
        $data="SELECT 
        f_thnayda,a.code_in,a.f_ltcr,a.f_custname,a.f_cif,a.f_plafondawal,a.f_tglayda,a.f_mobayda,
        a.f_rangemob,a.f_branch,a.f_tgllpjawalayda,a.f_mv_b,a.f_lv,a.tlgllpjlbh_satuthn,
        a.f_mvtwo,a.f_lvtwo,a.tlgllpjlbh_duathn,
        a.f_mvthree,a.f_lvthree,
        a.f_jenisasset,a.alamat_jaminan,a.lt_lb,a.os_awal,a.hpustgih_ayda,
        a.nilai_awal_ayda,a.penjualan_ayda,a.biaya,a.neet_penjualan,a.tglpenjualan_ayda,
        a.ckpn,a.tgl_create_ayda
        FROM t_ayda AS a 
        WHERE a.f_cif='".$value."'";
        return $this->db2->query($data)->result();
    }

    public function resultviewimage($value) {
        $data="SELECT 
        f_thnayda,a.code_in,a.f_ltcr,a.f_custname,a.f_cif,a.f_plafondawal,a.f_tglayda,a.f_mobayda,
        a.f_rangemob,a.f_branch,a.f_tgllpjawalayda,a.f_mv_b,a.f_lv,a.tlgllpjlbh_satuthn,
        a.f_mvtwo,a.f_lvtwo,a.tlgllpjlbh_duathn,
        a.f_mvthree,a.f_lvthree,
        a.f_jenisasset,a.alamat_jaminan,a.lt_lb,a.os_awal,a.hpustgih_ayda,
        a.nilai_awal_ayda,a.penjualan_ayda,a.biaya,a.neet_penjualan,a.tglpenjualan_ayda,
        a.ckpn,a.tgl_create_ayda
        FROM t_ayda AS a 
        WHERE a.f_cif='".$value."'";
        return $this->db2->query($data)->result();
    }
    
     public function rowDataNasabah($value)
    {
       $data="SELECT a.PlafondAmount,a.id,a.NamaDebitur,a.NomorRekening,
       a.NomorNasabah,a.KodeCabang,a.JmlHariTunggakan,h.f_cif,
       e.COMPANY_NAME,b.* from bss_cad AS a
LEFT JOIN t_kunjungan AS b on a.NomorNasabah=b.f_cif 
LEFT JOIN BSS_LD_SUB_PRODUCT AS d on a.FacilityType=d.ID 
LEFT JOIN bss_company AS e on a.KodeCabang=e.ID 
LEFT JOIN bss_category AS f on a.FacilityType=f.id
LEFT JOIN bss_ld AS g on a.ID=g.ID 
LEFT JOIN t_ayda AS h on a.NomorNasabah=h.f_cif
WHERE b.f_actionplan='AYDA' AND a.NomorNasabah='".$value."'" ;
return $this->db2->query($data)->row();
    }
public function updateimage($result) {
        //var_dump($result);
      $this->db2->insert_batch('t_image_ayda',$result);
    }
     public function deleteimage($codein,$idnya) {

		//var_dump($codein);
		//var_dump($idnya);
		foreach ($idnya as $item) {
			
            $this->db2->where('file_content', $item);
            $this->db2->where('code_in', $codein);
            $this->db2->delete('t_image_ayda');
        }
//        echo var_dump($restruktur_ke);
//        echo var_dump($idnya);
    }
    public function deletemodel_ayda($cif1)
    {
        $null=null;
       foreach ($cif1 as $item) {
            $this->db2->where('cif',$item);
            $this->db2->delete('t_ayda');

            $this->db2->where('cif',$item);
            $this->db2->delete('t_image_ayda');

            $this->db2->set('f_actionplan',$null);
            $this->db2->where('f_cif',$item);
            $this->db2->update('t_kunjungan');
        }
    }

//     public function deletemodel_ayda($idnya) {
//         $null=null;
//         foreach ($idnya as $item) {
            
          
//             // $this->db2->where('cif', $item);
//             // $this->db2->delete('t_image_ayda');
            


//             $this->db2->SET('f_actionplan',$null);
//             $this->db2->WHERE('f_cif',$item);
//             $this->db2->UPDATE('t_kunjungan', $item);
//         }
// //        echo var_dump($restruktur_ke);
// //        echo var_dump($idnya);
//     }



  public function imageview_ayda($value) {
        $data="SELECT b.file_content,b.name_file,b.cif,b.type_file,b.code_in FROM t_ayda AS a 
JOIN t_image_ayda AS b on a.code_in= b.code_in
WHERE a.code_in='".$value."'";
        return $this->db2->query($data)->result();
        
    }
	
	  public function viewfile_aydaimage($value) {
        $data="SELECT a.f_cif,a.code_in FROM t_ayda AS a 
WHERE a.code_in='".$value."'";
        return $this->db2->query($data)->row();
        
    }
   
     
    
    public function aydadetail($a) {
        $data = $this->db2->where('f_cif',$a);
        $data = $this->db2->get('t_ayda');
        return $data->row();
    }

    public function fotoaydadetail($a) {
    $data = 'SELECT * FROM t_image_ayda where cif ="'.$a.'"';
         $data1 = $this->db2->query($data);
        return $data1->result();
    }

   
}
