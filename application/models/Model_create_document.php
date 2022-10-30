<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_create_document extends CI_Model {

    public function get_searcmpk_restrukturisasi($userid) {
        $select = "select * from bss_employee as a join t_dep_head  as b on a.nik = b.f_nik where a.nik = '" . $userid . "'";
        $a = $this->db2->query($select)->num_rows();
        if ($a > 0) {
            $select3 = "SELECT b.* FROM `bss_cad`as b WHERE b.`KodeCabang` in (SELECT a.f_kode_cabang FROM t_detail_cabang_dephead as a where a.f_nik = '" . $userid . "' ) group by b.NomorNasabah order by Max(b.JmlHariTunggakan)";
            $data = $this->db2->query($select3)->result();
        } else {
            $select3 = "SELECT b.* FROM `bss_cad`as b group by b.NomorNasabah order by Max(b.JmlHariTunggakan)";
            $data = $this->db2->query($select3)->result();
        }
        return $data;
    }
//area data news
    public function views_news() {
        $query = "select * from  document_news ";
        $data = $this->db2->query($query)->result();
        return $data;
    }

    public function doc_all_news() {
        $query = "select * from  document_news order by  tanggal_insert desc ";
        $data = $this->db2->query($query)->result();
        return $data;
    }

    public function insert_data_news($uploadData) {  
        //print_r($data);
        $this->db2->insert_batch('document_news',$uploadData);
    }
    public function ambildata_edit_news($codeimage,$id_news) {
        $query = "select * from  document_news where id_docnews='".$id_news."' AND code_image='".$codeimage."'  ";
        $data = $this->db2->query($query)->row();
        return $data;
    }
    public function update_data_news($uploadData,$id_docnews) {  
        //print_r($data);
                // $updatedelet1=$this->db2->where('id_docnews', $id_docnews);
                // $updatedelet1=$this->db2->delete('document_news');
                // if($updatedelet1=TRUE){
                    $this->db2->update_batch('document_news',$uploadData,'id_docnews');
                //}
    }
    public function delete_data_news($code_image,$id) {
        $usulan_kredit=$this->db2->where('code_image',$code_image);
        $usulan_kredit=$this->db2->delete('document_news');
        //print_r($usulan_kredit);
        return 1;
    }
    public function views_news_welcome($id_news) {
        $query = "select * from  document_news order by  tanggal_insert desc limit 4 ";
        $data = $this->db2->query($query)->result();
        return $data;
    }
    public function v_one_doc_news_row($codeimage,$id_news) {
        $query = "select * from  document_news where id_docnews='".$id_news."' ";
        $data = $this->db2->query($query)->row();
        return $data;
    }
    public function v_one_doc_news_result($codeimage,$id_news) {
        $query = "select *,id_docnews,code_image from document_news order by '".$id_news."' desc limit 4 ";
        $data = $this->db2->query($query)->result();
        return $data;
    }        
//////----------///////



//area data agenda
    public function views_agenda() {
        $query = "select * from  document_agenda ";
        $data = $this->db2->query($query)->result();
        return $data;
    }
    public function doc_all_agenda() {
        $query = "select * from  document_agenda order by  tanggal_insert  DESC ";
        $data = $this->db2->query($query)->result();
        return $data;
    }
    public function views_news_agenda() {
        $query = "select * from  document_agenda limit 4 ";
        $data = $this->db2->query($query)->result();
        return $data;
    }
    public function insert_data_agenda($uploadData) {
        //print_r($data);
        $this->db2->insert_batch('document_agenda',$uploadData);
    }
    public function ambildata_edit_agenda($codeimage,$id_agenda) {
        $query = "select * from  document_agenda where id_docagenda='".$id_agenda."' AND code_image='".$codeimage."'  ";
        $data = $this->db2->query($query)->row();
        return $data;
    }
    
    public function update_data_agenda($uploadData,$id_docagenda) {  
        //print_r($data);
                //$updatedelet1=$this->db2->where('id_docagenda', $id_docagenda);
                //$updatedelet1=$this->db2->delete('document_agenda');
               // if($updatedelet1=TRUE){
                    $this->db2->update_batch('document_agenda',$uploadData,'id_docagenda');
                //} 
    }
    public function delete_data_agenda($code_image_agenda,$id) {
        $usulan_kredit=$this->db2->where('code_image',$code_image_agenda);
        $usulan_kredit=$this->db2->delete('document_agenda');
        //print_r($usulan_kredit);
        return 1;
    }
    public function views_agenda_welcome($id_agenda) {
        $query = "select * from  document_agenda order by tanggal_insert desc limit 4  ";
        $data = $this->db2->query($query)->result();
        return $data;
    }
    public function v_one_doc_agenda_row($codeimage_agenda1,$id_agenda1) {
        $query = "select * from  document_agenda where id_docagenda='".$id_agenda1."'  ";
        $data = $this->db2->query($query)->row();
        return $data;
        //print_r($data);
    }
    public function v_one_doc_agenda_result($codeimage,$id_agenda) {
        $query = "select *,id_docagenda,code_image from document_agenda order by '".$id_agenda."' desc limit 4";
        $data = $this->db2->query($query)->result();
        return $data;
        //print_r($data);
    }     
//////----------///////


//area data opini
public function views_opini() {
    $query = "select * from  document_opini ";
    $data = $this->db2->query($query)->result();
    return $data;
}
public function doc_all_opini() {
    $query = "select * from  document_opini order by tanggal_insert desc ";
    $data = $this->db2->query($query)->result();
    return $data;
}
public function views_news_opini() {
    $query = "select * from  document_opini limit 4 ";
    $data = $this->db2->query($query)->result();
    return $data;
}
public function insert_data_opini($uploadData) {
    //print_r($data);
    $this->db2->insert_batch('document_opini',$uploadData);
}

public function ambildata_edit_opini($codeimage,$id_agenda) {
    $query = "select * from  document_opini where id_docopini='".$id_agenda."' AND code_image='".$codeimage."'  ";
    $data = $this->db2->query($query)->row();
    return $data;
}
public function update_data_opini($uploadData,$id_docagenda) {  
     // print_r($id_docagenda);
     // print_r($id_docagenda);
    //print_r($data);
            //$updatedelet1=$this->db2->where('id_docopini', $id_docagenda);
            ////$updatedelet1=$this->db2->delete('document_opini');
            //if($updatedelet1=TRUE){
               // $this->db2->where('id_docopini', $id_docagenda);
                $this->db2->update_batch('document_opini',$uploadData,'id_docopini');
            //}
}
public function delete_data_opini($code_image_opini,$id) {
    $usulan_kredit=$this->db2->where('code_image',$code_image_opini);
    $usulan_kredit=$this->db2->delete('document_opini');
    //print_r($usulan_kredit);
    return 1;
}
public function views_opini_welcome($id_opini) {
    $query = "select * from  document_opini order by tanggal_insert desc limit 4 ";
    $data = $this->db2->query($query)->result();
    return $data;
}
public function v_one_doc_opini_row($codeimage1,$id_opini1) {
    $query = "select * from  document_opini where   id_docopini='".$id_opini1."'  ";
    $data = $this->db2->query($query)->row();
    return $data;
    //print_r($data);
}
public function v_one_doc_opini_result($codeimage,$id_opini) {
    $query = "select *,id_docopini,code_image from document_opini order by '".$id_opini."' desc limit 4 ";
    $data = $this->db2->query($query)->result();
    return $data;
}        

//////----------///////



//area data image
public function views_image() {
    $query = "select * from  document_image ";
    $data = $this->db2->query($query)->result();
    return $data;
}
    public function insertimage($result) {
        //var_dump($result);
      $this->db2->insert_batch('document_image',$result);
    }
     public function deleteimage($idnya) {
        foreach ($idnya as $item) {
            $this->db2->where('file_content', $item);
            $this->db2->delete('document_image');
        }
    }

    //  public function views_image_welcome() {
    //     $query = "select * from  document_image ";
    //     $data = $this->db2->query($query)->result();
    //     return $data;
    // }
    public function imageview() {
        //var_dump($id);
        //var_dump($cif);
        //$data="SELECT b.file_content,b.cif,a.id_t_lelang,b.code FROM t_lelang AS a 
        //JOIN t_image_lelang AS b on a.id_t_lelang= b.code
        //WHERE a.id_t_lelang='".$id."' AND b.cif='".$cif."'";
		$data="SELECT * FROM document_image ";
       return $this->db2->query($data)->row();
    }
    public function views_image_welcome($id_image) {
        $query = "select * from  document_image order by id_image desc limit 6 ";
        $data = $this->db2->query($query)->result();
        return $data;
    }
  
    public function doc_all_image() {
    $query = "select * from  document_image order by id_image desc ";
    $data = $this->db2->query($query)->result();
    return $data;
}
    public function imagedeatil()
    {
        //var_dump($id);
        //var_dump($cif);
        $data="SELECT * FROM document_image";
        return $this->db2->query($data)->result();
    }

//////----------///////



//area data video
public function views_video() {
    $query = "select * from  document_video ";
    $data = $this->db2->query($query)->result();
    return $data;
}

public function update_video($idnya,$judul,$link_video) {
    //var_dump($result);
    $data=array(
        'judul'=>$judul,
        'link_video'=>$link_video,
    );
    $this->db2->where('id_video',$idnya);  
    $this->db2->update('document_video',$data);
}

public function views_video_welcome($id_video) {
    $query = "select * from  document_video order by id_video desc limit 4";
    $data = $this->db2->query($query)->result();
    return $data;
}
public function doc_all_video() {
    $query = "select * from  document_video order by id_video ";
    $data = $this->db2->query($query)->result();
    return $data;
}
public function insertvideo($judul,$link_video,$user,$codeivideo) {
    //var_dump($result);
    $data=array(
        'judul'=>$judul,
        'link_video'=>$link_video,
        'f_usercreate'=>$user,
        'codevideo'=>$codeivideo,
    );
  $this->db2->insert('document_video',$data);
}
 public function deleteivideo($idnya) {
    foreach ($idnya as $item) {
        $this->db2->where('codevideo', $item);
        $this->db2->delete('document_video');
    }
}

public function videoview() {
    //var_dump($id);
    //var_dump($cif);
    //$data="SELECT b.file_content,b.cif,a.id_t_lelang,b.code FROM t_lelang AS a 
    //JOIN t_image_lelang AS b on a.id_t_lelang= b.code
    //WHERE a.id_t_lelang='".$id."' AND b.cif='".$cif."'";
    $data="SELECT * FROM document_video ";
   return $this->db2->query($data)->row();
}
public function videodeatil()
{
    //var_dump($id);
    //var_dump($cif);
    $data="SELECT * FROM document_video";
    return $this->db2->query($data)->result();
}
//////----------///////

    //area data about
    public function views_about() {
        $query = "select * from  document_about ";
        $data = $this->db2->query($query)->result();
        return $data;
    }
    public function doc_all_about() {
        $query = "select * from  document_about ";
        $data = $this->db2->query($query)->row();
        return $data;
        //var_dump($data);
    }
    public function insert_data_about($uploadData) {  
        //print_r($data);
        $this->db2->insert_batch('document_about',$uploadData);
    }
    public function views_about_welcome() {
        $query = "select * from  document_about ";
        $data = $this->db2->query($query)->row();
        return $data;
    }
    public function delete_data_about($code_image,$id) {
        $usulan_kredit=$this->db2->where('code_image',$code_image);
        $usulan_kredit=$this->db2->delete('document_about');
        //print_r($usulan_kredit);
        return 1;
    }
    public function ambildata_edit_about($codeimage,$id_news) {
        $query = "select * from  document_about where id_docabout='".$id_news."' AND code_image='".$codeimage."'  ";
        $data = $this->db2->query($query)->row();
        return $data;
    }
    public function update_data_about($uploadData,$id_docnews) {  
        //print_r($data);
               // $updatedelet1=$this->db2->where('id_docabout', $id_docnews);
                //$updatedelet1=$this->db2->delete('document_about');
                //if($updatedelet1=TRUE){
                    $this->db2->update_batch('document_about',$uploadData,'id_docabout');
                //}
    }

    public function v_one_doc_about_row($codeimage,$id_news) {
        $query = "select * from  document_about where id_docabout='".$id_news."'  ";
        $data = $this->db2->query($query)->row();
        return $data;
    }
    public function v_one_doc_about_result($codeimage,$id_news) {
        $query = "select *,id_docabout,code_image from document_about ";
        $data = $this->db2->query($query)->result();
        return $data;
    }        


    //////----------///////

    //area data tokoh
    public function views_tokoh() {
        $query = "select * from  document_tokoh ";
        $data = $this->db2->query($query)->result();
        return $data;
    }
    public function doc_all_tokoh() {
        $query = "select * from  document_tokoh ";
        $data = $this->db2->query($query)->result();
        return $data;
    }
    public function insert_data_tokoh($uploadData) {
        //print_r($data);
        $this->db2->insert_batch('document_tokoh',$uploadData);
    }
    public function delete_data_tokoh($code_image_agenda,$id) {
        $usulan_kredit=$this->db2->where('code_image',$code_image_agenda);
        $usulan_kredit=$this->db2->delete('document_tokoh');
        //print_r($usulan_kredit);
        return 1;
    }
    public function ambildata_edit_tokoh($codeimage,$id_news) {
        $query = "select * from  document_tokoh where id_doctokoh='".$id_news."' AND code_image='".$codeimage."'  ";
        $data = $this->db2->query($query)->row();
        return $data;
    }

    public function update_data_tokoh($uploadData,$id_docagenda) {  
        //print_r($data);
                //$updatedelet1=$this->db2->where('id_doctokoh', $id_docagenda);
                //$updatedelet1=$this->db2->delete('document_tokoh');
                //if($updatedelet1=TRUE){
                    $this->db2->insert_batch('document_tokoh',$uploadData,'id_doctokoh');
                //} 
    }
    public function v_one_doc_tokoh_row($codeimage,$id_news) {
        $query = "select * from  document_tokoh where id_doctokoh='".$id_news."'  ";
        $data = $this->db2->query($query)->row();
        return $data;
    }
    public function v_one_doc_tokoh_result($codeimage,$id_tokoh) {
        $query = "select *,id_doctokoh,code_image from document_tokoh order by '".$id_tokoh."' desc limit 4";
        $data = $this->db2->query($query)->result();
        return $data;
    }        
    //////----------///////

     //area data staff
     public function views_staff() {
        $query = "select * from  document_staff ";
        $data = $this->db2->query($query)->result();
        return $data;
    }
    public function doc_all_staff() {
        $query = "select * from  document_staff ";
        $data = $this->db2->query($query)->result();
        return $data;
    }
    public function insert_data_staff($uploadData) {
        //print_r($data);
        $this->db2->insert_batch('document_staff',$uploadData);
    }
    public function delete_data_staff($code_image_agenda,$id) {
        $usulan_kredit=$this->db2->where('code_image',$code_image_agenda);
        $usulan_kredit=$this->db2->delete('document_staff');
        //print_r($usulan_kredit);
        return 1;
    }
    public function ambildata_edit_staff($codeimage,$id_news) {
        $query = "select * from  document_staff where id_docstaff='".$id_news."' AND code_image='".$codeimage."'  ";
        $data = $this->db2->query($query)->row();
        return $data;
    }

    public function update_data_staff($uploadData,$id_docagenda) {  
        //print_r($data);
                // $updatedelet1=$this->db2->where('id_docstaff', $id_docagenda);
                // $updatedelet1=$this->db2->delete('document_staff');
                //if($updatedelet1=TRUE){
                    $this->db2->update_batch('document_staff',$uploadData,'id_docstaff');
                //} 
    }

    public function v_one_doc_staff_row($codeimage,$id_news) {
        $query = "select * from  document_staff where id_docstaff='".$id_news."'  ";
        $data = $this->db2->query($query)->row();
        return $data;
    }
    public function v_one_doc_staff_result($codeimage,$id_tokoh) {
        $query = "select *,id_docstaff,code_image from document_staff order by '".$id_tokoh."' desc limit 4";
        $data = $this->db2->query($query)->result();
        return $data;
    }  

    //////----------///////
    public function dropdownloop() {
        $query = "SELECT SUBSTRING(a.f_type,3) AS nama,a.f_desc FROM t_parameter a WHERE a.f_type LIKE 'M1%'";
        $data = $this->db2->query($query)->result();
        return $data;
    }

    public function cekisitabel($cif, $userid){
        $cek="SELECT * FROM mrk_restrukturisasi WHERE nomor_nasabah='".$cif."' ";
        $data1 = $this->db2->query($cek);
        if($data1->num_rows() > 0){
            return 2;
        }else{
            return $data1->row();
        }
    }
    public function ceknomornasabah($cif, $userid) {
        if (!empty($cif)) {
            $query1 = "SELECT * from bss_cad as b WHERE b.NomorNasabah='" . $cif . "'";
            $data2 = $this->db2->query($query1);
            if ($data2->num_rows() > 0) {
                return $data2->row();
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getdata_restrukturisasi_pelunasan_kredit($a) {
        $query1 = "SELECT A.*,E.*, D.typeid, D.type_description as f_jaminan, C.COLLATERAL_TYPE, C.DESCRIPTION Deskripsi,C.ADDRESS as f_location,
        f.DESCRIPTION AS ketfasilitas, format(C.NOMINAL_VALUE,2) as f_value, C.EXECUTION_VALUE,C.NOMINAL_VALUE, 
        TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as selisih FROM bss_cad A
        LEFT JOIN bss_collateral_right_det B ON A.LimitID = B.limit_reference
        LEFT JOIN bss_collateral C on C.ID like (CONCAT(B.id,'%')) 
        LEFT JOIN bss_collateral_code D ON D.id = C.COLLATERAL_TYPE
        LEFT JOIN bss_coll_pd_balaces E ON A.ID=E.ID 
        LEFT JOIN bss_ld_sub_product F ON A.FacilityType=f.ID 
        where NomorNasabah='".$a."'";
     $data = $this->db2->query($query1);
    return $data->result();
    }

    public function getdata_restrukturisasi($a) {
        if (!empty($a)) {
            $query1 = "SELECT  b.*,a.* FROM `bss_cad` AS a left JOIN bss_customer AS b on a.NomorNasabah=b.CUSTOMER_NO WHERE a.NomorNasabah ='" . $a . "'";
            $data1 = $this->db2->query($query1);
            if ($data1->num_rows() > 0) {
                return $data1->row();
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    
    public function restrukturisasi_getdata($a) {
        $query1 = "SELECT A.*,E.*, D.typeid, D.type_description as f_jaminan, C.COLLATERAL_TYPE, C.DESCRIPTION Deskripsi,C.ADDRESS as f_location,
        f.DESCRIPTION AS ketfasilitas, format(C.NOMINAL_VALUE,2) as f_value, C.EXECUTION_VALUE,C.NOMINAL_VALUE, 
        TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as selisih FROM bss_cad A
        LEFT JOIN bss_collateral_right_det B ON A.LimitID = B.limit_reference
        LEFT JOIN bss_collateral C on C.ID like (CONCAT(B.id,'%')) 
        LEFT JOIN bss_collateral_code D ON D.id = C.COLLATERAL_TYPE
        LEFT JOIN bss_coll_pd_balaces E ON A.ID=E.ID 
        LEFT JOIN bss_ld_sub_product F ON A.FacilityType=f.ID 
        where NomorNasabah='".$a."' GROUP by a.NomorRekening";
        $data = $this->db2->query($query1);
        return $data->result();
    }


public function rekap_rekening_edit_row($a) {
    $query1 = "SELECT * from mrpk_rekaprekening_perpanjangan where id_mrpk_perpanjangan='" . $a . "'";
    $data = $this->db2->query($query1);
    return $data->row();
}
    
    public function getdata_rrestrukturisasi_pengapusan($a) {
        $query1 = "SELECT * from mrk_pengapusan where id_restruktur='".$a."'";
         $data = $this->db2->query($query1);
        return $data->result();
    }

    //  public function ulasan_kredit_edit($a)
    // {
    //     $query1 = "SELECT * from mrk_ulasan_kredit where id_restruktur='".$a."'";
    //      $data = $this->db2->query($query1);
    //     return $data->result();
    // }

      public function getdata_restrukturisasi_lampiran($a) {
        $query1 = "SELECT * from mrk_lampiran where id_restruktur='".$a."'";
         $data = $this->db2->query($query1);
        return $data->result();
    }
    public function restrukturisasi_deversiasi($a) {
        $query1 = "SELECT * from mrk_deversiasi where id_restruktur='".$a."'";
         $data = $this->db2->query($query1);
        return $data->result();
    }
    
    public function kredit_pelunasan_edit($a) {
        $query1 = "SELECT * from mrk_ulasan_kredit where nomor_nasabah='".$a."'";
         $data = $this->db2->query($query1);
        return $data->result();
    }
    public function usulankredit_edit($a) {
        $query1 = "SELECT * from mrk_ulasan_kredit where nomor_nasabah='".$a."' AND Jenis_fasilitas !='' ORDER BY nomor_urut";
         $data = $this->db2->query($query1);
        return $data->result();
    }
    public function search_norek($a) {
        $query1 = "SELECT a.key from mrk_ulasan_kredit AS a where nomor_nasabah='".$a."' group by a.key";
         $data = $this->db2->query($query1);
        return $data->result();
    }

    public function kredit_pelunasan_restrukturisasi_edit($a) {
        $query1 = "SELECT * from mrk_ulasan_kredit where nomor_nasabah='".$a."'";
         $data = $this->db2->query($query1);
        return $data->result();
    }

    public function getdata_restrukturisasi_edit($a) {
        if (!empty($a)) {
            $query1 = "SELECT * FROM mrk_restrukturisasi where nomor_nasabah='".$a."'";
            $data1 = $this->db2->query($query1);
            if ($data1->num_rows() > 0) {
                return $data1->row();
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

 public function restrukturisasi_getdata_edit($a) {
        $query1 = "SELECT * from mrk_restrukturisasi where nomor_nasabah='" . $a . "'";
        $data = $this->db2->query($query1);
        return $data->result();
    }
 

    public function  update_restrukturisasi($data,$cif1,$id,$pengapusan_keringanan,$lampiran,$deversiasi,$data1,$data12){
        //var_dump($id);
        // $hapus=$this->db2->where('nomor_nasabah', $cif1);
        // $hapus=$this->db2->delete('mrk_restrukturisasi');
		
        // $update=$this->db2->insert_batch('mrk_restrukturisasi',$data); 

       $update_a= $this->db2->WHERE('nomor_nasabah',$cif1);
        $update_a= $this->db2->update_batch('mrk_restrukturisasi',$data,'nomor_nasabah');
        if(!empty($update_a)){
           
                $updatedelet1=$this->db2->where('id_restruktur', $id);
                $updatedelet1=$this->db2->delete('mrk_pengapusan');
                $insert_pengapusan= $this->db2->insert_batch('mrk_pengapusan', $pengapusan_keringanan);
                    if($insert_pengapusan >0){
                        $updatedelet2=$this->db2->where('id_restruktur', $id);
                        $updatedelet2=$this->db2->delete('mrk_lampiran');
                        $insert_lampiran= $this->db2->insert_batch('mrk_lampiran',$lampiran);
						
                    } else {
						return 0 ;
					}
                    if($insert_lampiran > 0){
                        $updatedelet3=$this->db2->where('id_restruktur', $id);
                        $updatedelet3=$this->db2->delete('mrk_deversiasi'); 
                        $insert_deversiasi= $this->db2->insert_batch('mrk_deversiasi',$deversiasi);
                    } else {
						return 0 ;
					}
                    if($insert_deversiasi > 0){
                        $del_usulan=$this->db2->where ('nomor_nasabah',$cif1);
                        $del_usulan=$this->db2->delete ('mrk_ulasan_kredit');
                        
                        $insert_usulan= $this->db2->insert_batch('mrk_ulasan_kredit',$data12);
                        $insert_usulan= $this->db2->insert_batch('mrk_ulasan_kredit',$data1);
						return 1;
                    } else {
						return 0;
					}
		} else {
			return 0 ;
		}
	}
   
        public function delete_data_restrukturisasi($cif,$id) {
            $usulan_kredit=$this->db2->where('nomor_nasabah',$cif);
			$usulan_kredit=$this->db2->delete('mrk_ulasan_kredit');
            $retruktur=$this->db2->where('nomor_nasabah', $cif);
            $retruktur=$this->db2->delete('mrk_restrukturisasi');
            $deversiasi=$this->db2->where('id_restruktur',$id);
            $deversiasi=$this->db2->delete('mrk_deversiasi');
            $lampiran=$this->db2->where('id_restruktur',$id);
            $lampiran=$this->db2->delete('mrk_lampiran');
            $pengapusan=$this->db2->where('id_restruktur',$id);
            $pengapusan=$this->db2->delete('mrk_pengapusan');
           
            return 1;
        }
/////////////////////////////////////End MRK Restrukturisasi///////////////////////////////////////////////

public function get_searcmrpk_ptbam($userid) {
    $select = "select * from bss_employee as a join t_dep_head  as b on a.nik = b.f_nik where a.nik = '" . $userid . "'";
    $a = $this->db2->query($select)->num_rows();
    if ($a > 0) {
        $select3 = "SELECT b.* FROM `bss_cad`as b WHERE b.`KodeCabang` in (SELECT a.f_kode_cabang FROM t_detail_cabang_dephead as a where a.f_nik = '" . $userid . "' ) group by b.NomorNasabah order by Max(b.JmlHariTunggakan)";
        $data = $this->db2->query($select3)->result();
    } else {
        $select3 = "SELECT b.* FROM `bss_cad`as b  group by b.NomorNasabah order by Max(b.JmlHariTunggakan)";
        $data = $this->db2->query($select3)->result();
    }
    return $data;
}

public function read_mrpk_pelunasan_ptbam() {
    $query = "select * from  mrpk_pelunasan_ptbam group by cif";
    $data = $this->db2->query($query)->result();
    return $data;
}

public function get_data_pelunasan_ptbam_row($a) {
    if (!empty($a)) {
        $query1 = "SELECT  b.*,a.* FROM `bss_cad` AS a left JOIN bss_customer AS b on a.NomorNasabah=b.CUSTOMER_NO WHERE a.NomorNasabah ='".$a."'";
        $data1 = $this->db2->query($query1);
        if ($data1->num_rows() > 0) {
            return $data1->row();
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

public function get_data_pelunasan_ptbam_result1($a) {
    $query1 = "SELECT A.*,E.*, D.typeid, D.type_description as f_jaminan, C.COLLATERAL_TYPE, C.DESCRIPTION Deskripsi,C.ADDRESS as f_location,
    f.DESCRIPTION AS ketfasilitas, format(C.NOMINAL_VALUE,2) as f_value, C.EXECUTION_VALUE,C.NOMINAL_VALUE, 
    TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as selisih FROM bss_cad A
    LEFT JOIN bss_collateral_right_det B ON A.LimitID = B.limit_reference
    LEFT JOIN bss_collateral C on C.ID like (CONCAT(B.id,'%')) 
    LEFT JOIN bss_collateral_code D ON D.id = C.COLLATERAL_TYPE
    LEFT JOIN bss_coll_pd_balaces E ON A.ID=E.ID 
    LEFT JOIN bss_ld_sub_product F ON A.FacilityType=f.ID 
    where NomorNasabah='".$a."' GROUP BY a.NomorRekening";
     $data = $this->db2->query($query1);
    return $data->result();
}

public function get_data_pelunasan_ptbam_result($a) {
    $query1 = "SELECT A.*,E.*, D.typeid, D.type_description as f_jaminan, C.COLLATERAL_TYPE, C.DESCRIPTION Deskripsi,C.ADDRESS as f_location,
        f.DESCRIPTION AS ketfasilitas, format(C.NOMINAL_VALUE,2) as f_value, C.EXECUTION_VALUE,C.NOMINAL_VALUE, 
        TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as selisih FROM bss_cad A
        LEFT JOIN bss_collateral_right_det B ON A.LimitID = B.limit_reference
        LEFT JOIN bss_collateral C on C.ID like (CONCAT(B.id,'%')) 
        LEFT JOIN bss_collateral_code D ON D.id = C.COLLATERAL_TYPE
        LEFT JOIN bss_coll_pd_balaces E ON A.ID=E.ID 
        LEFT JOIN bss_ld_sub_product F ON A.FacilityType=f.ID 
        where NomorNasabah='".$a."' GROUP BY a.NomorRekening";
     $data = $this->db2->query($query1);
    return $data->result();
}

public function  insert_pelunasan_ptbam($insert_resul1,$kondisipenjualan,$upayapenagihan,$lampiran,$ambil){
       
      $insert_1=$this->db2->insert_batch('mrpk_pelunasan_ptbam', $insert_resul1);
     if(!empty($insert_1))
     {
         //$select="SELECT * from mrpk_pelunasan ";
         $this->db2->select('id_pt_bam');
         $this->db2->from('mrpk_pelunasan_ptbam');
         $this->db2->where('cif',$ambil['cif']);
         $this->db2->where_in('jenis_fasilitas',$ambil['fasilitas']);
         $ambil_all= $this->db2->get()->result();
     }
     
     foreach ($ambil_all as $value){
         foreach ($kondisipenjualan as $value2)
         {
             $arr_ins[] = array_merge($value2, array('id_pt_bam' => $value->id_pt_bam));
         }
     }
      if(!empty($arr_ins)){
         //echo 'masuk';
         $query=$this->db2->insert_batch('mrpkptbam_kondisipenyelesaian',$arr_ins);
         
         if($query > 0){
              foreach ($ambil_all as $value3){
         foreach ($upayapenagihan as $value4)
         {
             $arr_ins2[] = array_merge($value4, array('id_pt_bam' => $value3->id_pt_bam));
         }
       }
        if(!empty($arr_ins2)){
         //echo 'masuk';
         $query3=$this->db2->insert_batch('mrpkptbam_upayapenagihan',$arr_ins2);
         
         if($query3 > 0){
          foreach ($ambil_all as $value5){
              foreach ($lampiran as $value6)
              {
             $arr_ins3[] = array_merge($value6, array('id_pt_bam' => $value5->id_pt_bam));
              }
           }
           if(!empty($arr_ins3)){
                  $query2=$this->db2->insert_batch('mrpkptbam_lampiran',$arr_ins3);
               }
         }
         
              }
         }
     } 
  }

  public function getdata_pelunasanptbam_edit($a) {
    if (!empty($a)) {
        $query1 = "SELECT * FROM mrpk_pelunasan_ptbam where cif='".$a."'";
        $data1 = $this->db2->query($query1);
        if ($data1->num_rows() > 0) {
            return $data1->row();
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

public function pelunasanptbam_getdata_edit($a) {
    $query1 = "SELECT * from mrpk_pelunasan_ptbam where cif='".$a."'";
     $data = $this->db2->query($query1);
    return $data->result();
}

public function pelunasanptbam_getdata_edit1($a) {
    $query1 = "SELECT * from mrpk_pelunasan_ptbam where cif='".$a."' ";
     $data = $this->db2->query($query1);
    return $data->result();
}

public function ambil_kondisipenualan($param) {
    $query1 = "SELECT b.biayalain,b.dibayar,b.dihapus from mrpk_pelunasan_ptbam AS a join mrpkptbam_kondisipenyelesaian as b on a.id_pt_bam=b.id_pt_bam  where a.id_pt_bam='".$param."'";
     $data = $this->db2->query($query1);
    return $data->result();
  
}

public function ambil_upayapenagihan($param) {
    $query1 = "SELECT b.tgl_penagihan,b.desc_penagihan,b.pihak_hadir_penagihan from mrpk_pelunasan_ptbam AS a "
            . "join mrpkptbam_upayapenagihan as b on a.id_pt_bam=b.id_pt_bam  where a.id_pt_bam='".$param."'";
     $data = $this->db2->query($query1);
    return $data->result();
  
}

public function ambil_lampiran($param) {
    $query1 = "SELECT b.data_dokumen,b.ada_dokumen from mrpk_pelunasan_ptbam AS a"
            . " join mrpkptbam_lampiran as b on a.id_pt_bam=b.id_pt_bam  where a.id_pt_bam='".$param."'";
     $data = $this->db2->query($query1);
    return $data->result();
  
}

public function update_pelunasan_ptbam($data,$data_penyelesaian,$upayapenagihan,$data_lampiran,$cif,$id) {
        //$update_a= $this->db2->WHERE('cif',$cif);
        $update_a= $this->db2->update_batch('mrpk_pelunasan_ptbam',$data,'id_pt_bam');
         
        
          if(!empty($update_a)){
              
             $update_b=$this->db2->where('id_pt_bam',$id);
             $update_b=$this->db2->delete('mrpkptbam_kondisipenyelesaian`');
             
             $update_c=$this->db2->insert_batch('mrpkptbam_kondisipenyelesaian`',$data_penyelesaian);
              
              if($update_c > 0){
                  
             $update_d=$this->db2->where('id_pt_bam',$id);
             $update_d=$this->db2->delete('mrpkptbam_upayapenagihan');
             
             $update_e=$this->db2->insert_batch('mrpkptbam_upayapenagihan',$upayapenagihan);
                 if(!empty($update_e)){
                     
                     $update_f=$this->db2->where('id_pt_bam',$id);
                     $update_f=$this->db2->delete('mrpkptbam_lampiran');             
                    $update_g=$this->db2->insert_batch('mrpkptbam_lampiran',$data_lampiran);
                      
                  }
               }
           }
        }

    public function delete_data_pelunasanptbam($cif,$id) {

            $retruktur=$this->db2->where('cif', $cif);
            $retruktur=$this->db2->delete('mrpk_pelunasan_ptbam');
            if(!$retruktur){
                $deversiasi=$this->db2->where('id_pt_bam',$id);
                $deversiasi=$this->db2->delete('mrpkptbam_kondisipenyelesaian');
                if($deversiasi>0){
                    $lampiran=$this->db2->where('id_pt_bam',$id);
                    $lampiran=$this->db2->delete('mrpkptbam_upayapenagihan');

                    if($lampiran >0){
                        $pengapusan=$this->db2->where('id_pt_bam',$id);
                        $pengapusan=$this->db2->delete('mrpkptbam_lampiran');
                    }
                   
                }
            }
            return 1;
        }



/////////////////////////////////end MRPK Perpanjangan///////////////////////////////////////////////////////////
   
   public function get_searcmrpk_perpanjangan($userid) {
       $select = "select * from bss_employee as a join t_dep_head  as b on a.nik = b.f_nik where a.nik = '" . $userid . "'";
       $a = $this->db2->query($select)->num_rows();
       if ($a > 0) {
           $select3 = "SELECT b.* FROM `bss_cad`as b WHERE b.`KodeCabang` in (SELECT a.f_kode_cabang FROM t_detail_cabang_dephead as a where a.f_nik = '" . $userid . "' ) group by b.NomorNasabah order by Max(b.JmlHariTunggakan)";
           $data = $this->db2->query($select3)->result();
       } else {
           $select3 = "SELECT b.* FROM `bss_cad`as b  group by b.NomorNasabah order by Max(b.JmlHariTunggakan)";
           $data = $this->db2->query($select3)->result();
       }
       return $data;
   }

   public function read_mrpkView_perpanjangan() {
        //$data=$this->db2->where('f_cif',$a);
      //$data = $this->db2->get('mrpk_perpanjangan');
      //return $data->result();
    $query = "SELECT * FROM mrpk_perpanjangan group by cif";
    $data = $this->db2->query($query)->result();
    return $data;
}

public function insert_mrpk_perpanjangan($data,$rekaprekening,$notejaminan,$infomasisid,$ambil) {

    //print_r($data);
    
    //print_r($insert_perpanjangan);
    //$a=$this->db2->insert('mrk_restrukturisasi', $data_row);
    //$this->db2->insert_batch('mrpk_perpanjangan', $data);



    $insert_1=$this->db2->insert_batch('mrpk_perpanjangan', $data);
    if(!empty($insert_1))
    {
        $this->db2->select('id_mrpk_perpanjangan');
        $this->db2->from('mrpk_perpanjangan');
        $this->db2->where('cif',$ambil['cif']);
        $this->db2->where_in('jenis_fasilitas_a',$ambil['fasilitas']);
        $ambil_all= $this->db2->get()->result();
    }
    foreach ($ambil_all as $value){
        foreach ($rekaprekening as $value2)
        {
            $arr_ins[] = array_merge($value2, array('id_mrpk_perpanjangan' => $value->id_mrpk_perpanjangan));
            
        }
    }
     if(!empty($arr_ins)){
     
        $query=$this->db2->insert_batch('mrpk_rekaprekening_perpanjangan',$arr_ins);
        
        if($query > 0){
             foreach ($ambil_all as $value3){
        foreach ($notejaminan as $value4)
        {
            $arr_ins2[] = array_merge($value4, array('id_mrpk_perpanjangan' => $value3->id_mrpk_perpanjangan));
        }
      }
       if(!empty($arr_ins2)){
        //echo 'masuk';
        $query3=$this->db2->insert_batch('mrpk_notejaminan_perpanjangan',$arr_ins2);
        
        if($query3 > 0){
         foreach ($ambil_all as $value5){
             foreach ($infomasisid as $value6)
             {
            $arr_ins3[] = array_merge($value6, array('id_mrpk_perpanjangan' => $value5->id_mrpk_perpanjangan));
             }
          }
          if(!empty($arr_ins3))
            {
                 $query21=$this->db2->insert_batch('mrpk_informasisid_perpanjangan',$arr_ins3);
            }
        }
        
             }
        }
    } 
}

public function getdata_perpanjangan_edit_row($a) {
    if (!empty($a)) {
        $query1 = "SELECT * FROM mrpk_perpanjangan where cif='" . $a . "'";
        $data1 = $this->db2->query($query1);
        if ($data1->num_rows() > 0) {
            return $data1->row();
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}
public function perpanjangan_getdata_edit_result($a) {
    $query1 = "SELECT * from mrpk_perpanjangan where cif='" . $a . "'";
    $data = $this->db2->query($query1);
    return $data->result();
}

public function note_jaminan_edit($a) {
    $query1 = "SELECT * from mrpk_notejaminan_perpanjangan where id_mrpk_perpanjangan='" . $a . "'";
    $data = $this->db2->query($query1);
    return $data->result();
}
public function rekap_rekening_edit($a) {
    $query1 = "SELECT * from mrpk_rekaprekening_perpanjangan where id_mrpk_perpanjangan='" . $a . "'";
    $data = $this->db2->query($query1);
    return $data->result();
}
public function informasi_sid_edit($a) {
    $query1 = "SELECT * from mrpk_informasisid_perpanjangan where id_mrpk_perpanjangan='" . $a . "'";
    $data = $this->db2->query($query1);
    return $data->result();
}

public function update_perpanjangan_mrpk($data,$rekaprekening,$notejaminan,$infomasisid,$cif1,$id1) {
    

             $update_a= $this->db2->update_batch('mrpk_perpanjangan',$data,'id_mrpk_perpanjangan');
             $update_d=$this->db2->where('id_mrpk_perpanjangan',$id1);
             $update_d=$this->db2->delete('mrpk_notejaminan_perpanjangan');
             $update_e=$this->db2->insert_batch('mrpk_notejaminan_perpanjangan',$notejaminan);

             $a=$this->db2->where('id_mrpk_perpanjangan',$id1);
             $a=$this->db2->delete('mrpk_rekaprekening_perpanjangan'); 
             $aa=$this->db2->insert_batch('mrpk_rekaprekening_perpanjangan',$rekaprekening);
            
            $update_f=$this->db2->where('id_mrpk_perpanjangan',$id1);
            $update_f=$this->db2->delete('mrpk_informasisid_perpanjangan');
            $update_g=$this->db2->insert_batch('mrpk_informasisid_perpanjangan',$infomasisid);
}

public function delete_data_perpanjangan($cif,$id) {

    $this->db2->where('cif', $cif);
    $this->db2->delete('mrpk_perpanjangan');
}

//////////////////////////////////////END MRPK Perpanjangan/////////////////////////////////////////////////





    public function get_searcmrpk_pelunasan($userid) {
        $select = "select * from bss_employee as a join t_dep_head  as b on a.nik = b.f_nik where a.nik = '" . $userid . "'";
        $a = $this->db2->query($select)->num_rows();
        if ($a > 0) {
            $select3 = "SELECT b.* FROM `bss_cad`as b WHERE b.`KodeCabang` in (SELECT a.f_kode_cabang FROM t_detail_cabang_dephead as a where a.f_nik = '" . $userid . "' ) group by b.NomorNasabah order by Max(b.JmlHariTunggakan)";
            $data = $this->db2->query($select3)->result();
        } else {
            $select3 = "SELECT b.* FROM `bss_cad`as b  group by b.NomorNasabah order by Max(b.JmlHariTunggakan)";
            $data = $this->db2->query($select3)->result();
        }
        return $data;
    }

    public function update_mrpk_pelunasan($data,$data_kondisipenjualan,$upayapenagihan,$data_lampiran,$cif,$id) {
        //print_r($data);
        $update_a= $this->db2->update_batch('mrpk_pelunasan',$data,'id_pelunasan');
        
         if(!empty($update_a)){
             
            $update_b=$this->db2->where('id_pelunasan',$id);
            $update_b=$this->db2->delete('mrpk_pelunasan_kondisipenjualan');
            
            $update_c=$this->db2->insert_batch('mrpk_pelunasan_kondisipenjualan',$data_kondisipenjualan);
             
             if($update_c > 0){
                 
            $update_d=$this->db2->where('id_pelunasan',$id);
            $update_d=$this->db2->delete('mrpk_pelunasan_upayapenagihan');
            
            $update_e=$this->db2->insert_batch('mrpk_pelunasan_upayapenagihan',$upayapenagihan);
                if(!empty($update_e)){
                    
                    $update_f=$this->db2->where('id_pelunasan',$id);
                    $update_f=$this->db2->delete('mrpk_pelunasan_lampiran');       
                   $update_g=$this->db2->insert_batch('mrpk_pelunasan_lampiran',$data_lampiran);
                     
                 }
              }
          }
    }

    public function read_mrpk_pelunasanview() {
        $query = "select * from  mrpk_pelunasan group by cif";
        $data = $this->db2->query($query)->result();
        return $data;
    }

    public function get_data_pelunasan_row($a) {
        if (!empty($a)) {
            $query1 = "SELECT  b.*,a.* FROM `bss_cad` AS a left JOIN bss_customer AS b on a.NomorNasabah=b.CUSTOMER_NO WHERE a.NomorNasabah ='" . $a . "'";
            $data1 = $this->db2->query($query1);
            if ($data1->num_rows() > 0) {
                return $data1->row();
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function get_data_pelunasan_result($a) {
        $query1 = "SELECT A.*,E.*, D.typeid, D.type_description as f_jaminan, C.COLLATERAL_TYPE, C.DESCRIPTION Deskripsi,C.ADDRESS as f_location,
        f.DESCRIPTION AS ketfasilitas, format(C.NOMINAL_VALUE,2) as f_value, C.EXECUTION_VALUE,C.NOMINAL_VALUE, 
        TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as selisih FROM bss_cad A
        LEFT JOIN bss_collateral_right_det B ON A.LimitID = B.limit_reference
        LEFT JOIN bss_collateral C on C.ID like (CONCAT(B.id,'%')) 
        LEFT JOIN bss_collateral_code D ON D.id = C.COLLATERAL_TYPE
        LEFT JOIN bss_coll_pd_balaces E ON A.ID=E.ID 
        LEFT JOIN bss_ld_sub_product F ON A.FacilityType=f.ID 
        where NomorNasabah='".$a."' GROUP by a.NomorRekening";
        $data = $this->db2->query($query1);
        return $data->result();
    }

    public function  insert_pelunasan_result1($data,$data_kondisipenjualan,$upayapenagihan,$data_lampiran,$ambil){

        //print_r($data);
        $insert_1=$this->db2->insert_batch('mrpk_pelunasan', $data);
       if(!empty($insert_1))
       {
           //$select="SELECT * from mrpk_pelunasan ";
           $this->db2->select('id_pelunasan');
           $this->db2->from('mrpk_pelunasan');
           $this->db2->where('cif',$ambil['cif']);
           $this->db2->where_in('jenis_fasilitas',$ambil['fasilitas']);
           $ambil_all= $this->db2->get()->result();
       }

       foreach ($ambil_all as $value){
           foreach ($data_kondisipenjualan as $value2)
           {
               $arr_ins[] = array_merge($value2, array('id_pelunasan' => $value->id_pelunasan));
           }
       }
        if(!empty($arr_ins)){
           //echo 'masuk';
           $query=$this->db2->insert_batch('mrpk_pelunasan_kondisipenjualan',$arr_ins);
        
           if($query > 0){
                foreach ($ambil_all as $value3){
           foreach ($upayapenagihan as $value4)
           {
               $arr_ins2[] = array_merge($value4, array('id_pelunasan' => $value3->id_pelunasan));
           }
         }
          if(!empty($arr_ins2)){
           //echo 'masuk';
           $query3=$this->db2->insert_batch('mrpk_pelunasan_upayapenagihan',$arr_ins2);
        
           if($query3 > 0){
            foreach ($ambil_all as $value5){
                foreach ($data_lampiran as $value6)
                {
               $arr_ins3[] = array_merge($value6, array('id_pelunasan' => $value5->id_pelunasan));
                }
             }
             if(!empty($arr_ins3)){
                    $query2=$this->db2->insert_batch('mrpk_pelunasan_lampiran',$arr_ins3);
                 }
           }

                }
           }
       } 
    }

    public function getdata_pelunasan_edit_row($a) {
        if (!empty($a)) {
            $query1 = "SELECT * FROM mrpk_pelunasan where cif='" . $a . "'";
            $data1 = $this->db2->query($query1);
            if ($data1->num_rows() > 0) {
                return $data1->row();
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }


    public function ambil_kondisipenualan_mrpkpelunasan($a){
        if (!empty($a)) {
            $query1 = "SELECT * FROM mrpk_pelunasan_kondisipenjualan where id_pelunasan='". $a ."'";
            $data1 = $this->db2->query($query1);
            if ($data1->num_rows() > 0) {
                return $data1->result();
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function ambil_upayapenagihan_mrpkpelunasan($a){
        if (!empty($a)) {
            $query1 = "SELECT * FROM mrpk_pelunasan_upayapenagihan where id_pelunasan='" . $a . "'";
            $data1 = $this->db2->query($query1);
            if ($data1->num_rows() > 0) {
                return $data1->result();
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function ambil_lampiran_mrpkpelunasan($a){
        if (!empty($a)) {
            $query1 = "SELECT * FROM mrpk_pelunasan_lampiran where id_pelunasan='" . $a . "'";
            $data1 = $this->db2->query($query1);
            if ($data1->num_rows() > 0) {
                return $data1->result();
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function pelunasan_getdata_edit_result($a) {
        $query1 = "SELECT * from mrpk_pelunasan where cif='" . $a . "'";
        $data = $this->db2->query($query1);
        return $data->result();
    }
    
    public function update_pelunasan_result1($insert_resul1) {
        //print_r($insert_resul1);
        //$a=$this->db2->insert('mrk_restrukturisasi', $data_row);
        $this->db2->update_batch('mrpk_pelunasan', $insert_resul1, 'cif');
    }
    
    
    public function delete_data_pelunasan($id) {
    
        $this->db2->where('cif', $id);
        $this->db2->delete('mrpk_pelunasan');
    }
///////////////////////////////////////////END MRPK Pelunasan/////////////////////////////////////////////////
public function get_data_edit_wo_result($a) {
    $query1 = "SELECT * from mrpk_wo where cif ='" . $a . "'";
    $data = $this->db2->query($query1);
    return $data->result();
}
public function get_data_edit_wo_row($a) {
    if (!empty($a)) {
        $query1 = "SELECT * from mrpk_wo where cif ='" . $a . "'";
        $data1 = $this->db2->query($query1);
        if ($data1->num_rows() > 0) {
            return $data1->row();
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

public function ambil_kondisipenualan_mrpk_wo($a){
 $query1 = "SELECT * from mrpkp_wo_kondisipenyelesaian where  id_wo='".$a."'";
             $data = $this->db2->query($query1);
    return $data->result();
}

public function ambil_upayapenagihan_mrpk_wo($a){
   $query1 = "SELECT * from mrpkp_wo_upayapenagihan where  id_wo='".$a."'";
             $data = $this->db2->query($query1);
    return $data->result();
}

public function  ambil_lampiran_mrpk_wo($a){
    $query1 = "SELECT * from mrpk_wo_lampiran where  id_wo='".$a."'";
             $data = $this->db2->query($query1);
    return $data->result();
}




public function update_mrpk_wo($data,$data_penyelesaian,$upayapenagihan,$data_lampiran,$cif,$id) {
   //print_r($data_penyelesaian);
     $update_a= $this->db2->update_batch('mrpk_wo',$data,'id_wo');
     
         $update_b=$this->db2->where('id_wo',$id);
         $update_b=$this->db2->delete('mrpkp_wo_kondisipenyelesaian');
         $update_c=$this->db2->insert_batch('mrpkp_wo_kondisipenyelesaian',$data_penyelesaian);
         
         $update_d=$this->db2->where('id_wo',$id);
         $update_d=$this->db2->delete('mrpkp_wo_upayapenagihan');
         $update_e=$this->db2->insert_batch('mrpkp_wo_upayapenagihan',$upayapenagihan);
         
                 $update_f=$this->db2->where('id_wo',$id);
                 $update_f=$this->db2->delete('mrpk_wo_lampiran');             
                $update_g=$this->db2->insert_batch('mrpk_wo_lampiran',$data_lampiran);
                  
          
    }

public function get_searcmrpk_wo($userid) {
    $select = "select * from bss_employee as a join t_dep_head  as b on a.nik = b.f_nik where a.nik = '" . $userid . "'";
    $a = $this->db2->query($select)->num_rows();
    if ($a > 0) {
        $select3 = "SELECT b.* FROM `bss_cad`as b WHERE b.`KodeCabang` in (SELECT a.f_kode_cabang FROM t_detail_cabang_dephead as a where a.f_nik = '" . $userid . "' ) group by b.NomorNasabah order by Max(b.JmlHariTunggakan)";
        $data = $this->db2->query($select3)->result();
    } else {
        $select3 = "SELECT b.* FROM `bss_cad`as b group by b.NomorNasabah order by Max(b.JmlHariTunggakan)";
        $data = $this->db2->query($select3)->result();
    }
    return $data;
}
public function get_data_perpanjangan_row($a) {
    if (!empty($a)) {
        $query1 = "SELECT  b.*,a.* FROM `bss_cad` AS a LEFT JOIN bss_customer AS b on a.NomorNasabah=b.CUSTOMER_NO WHERE a.NomorNasabah ='" . $a . "'";
        $data1 = $this->db2->query($query1);
        if ($data1->num_rows() > 0) {
            return $data1->row();
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

public function get_data_perpanjangan_result($a) {
    $query1 = "SELECT A.*,E.*, D.typeid, D.type_description as f_jaminan, C.COLLATERAL_TYPE, C.DESCRIPTION Deskripsi,C.ADDRESS as f_location,
    f.DESCRIPTION AS ketfasilitas, format(C.NOMINAL_VALUE,2) as f_value, C.EXECUTION_VALUE,C.NOMINAL_VALUE, 
    TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as selisih FROM bss_cad A
    LEFT JOIN bss_collateral_right_det B ON A.LimitID = B.limit_reference
    LEFT JOIN bss_collateral C on C.ID like (CONCAT(B.id,'%')) 
    LEFT JOIN bss_collateral_code D ON D.id = C.COLLATERAL_TYPE
    LEFT JOIN bss_coll_pd_balaces E ON A.ID=E.ID 
    LEFT JOIN bss_ld_sub_product F ON A.FacilityType=f.ID 
    where NomorNasabah='".$a."' GROUP by A.ID";
    $data = $this->db2->query($query1);
    return $data->result();
}
public function read_mrpkView_wo() {
    
            $query = "SELECT * FROM mrpk_wo  group by cif";
            $data = $this->db2->query($query)->result();
            return $data;
        }

 public function get_data_wo_row($a) {
     if (!empty($a)) {
         $query1 = "SELECT  b.*,a.* FROM `bss_cad` AS a left JOIN bss_customer AS b on a.NomorNasabah=b.CUSTOMER_NO WHERE a.NomorNasabah='" . $a . "'";
         $data1 = $this->db2->query($query1);
         if ($data1->num_rows() > 0) {
             return $data1->row();
         } else {
             return 0;
         }
     } else {
         return 0;
     }
 }

 public function get_data_wo_result($a) {
    $query1 = "SELECT A.*,E.*, D.typeid, D.type_description as f_jaminan, C.COLLATERAL_TYPE, C.DESCRIPTION Deskripsi,C.ADDRESS as f_location,
    f.DESCRIPTION AS ketfasilitas, format(C.NOMINAL_VALUE,2) as f_value, C.EXECUTION_VALUE,C.NOMINAL_VALUE, 
    TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as selisih FROM bss_cad A
    LEFT JOIN bss_collateral_right_det B ON A.LimitID = B.limit_reference
    LEFT JOIN bss_collateral C on C.ID like (CONCAT(B.id,'%')) 
    LEFT JOIN bss_collateral_code D ON D.id = C.COLLATERAL_TYPE
    LEFT JOIN bss_coll_pd_balaces E ON A.ID=E.ID 
    LEFT JOIN bss_ld_sub_product F ON A.FacilityType=f.ID 
    where NomorNasabah='".$a."' GROUP by a.NomorRekening";
    $data = $this->db2->query($query1);
    return $data->result();
}

public function  insert_mrpk_wo($data,$data_kondisipenjualan,$upayapenagihan,$data_lampiran,$ambil){
       
    $insert_1=$this->db2->insert_batch('mrpk_wo', $data);
   if(!empty($insert_1))
   {
       //$select="SELECT * from mrpk_pelunasan ";
       $this->db2->select('id_wo');
       $this->db2->from('mrpk_wo');
       $this->db2->where('cif',$ambil['cif']);
       $this->db2->where_in('jenis_fasilitas',$ambil['fasilitas']);
       $ambil_all= $this->db2->get()->result();
   }
   
   foreach ($ambil_all as $value){
       foreach ($data_kondisipenjualan as $value2)
       {
           $arr_ins[] = array_merge($value2, array('id_wo' => $value->id_wo));
       }
   }
    if(!empty($arr_ins)){
       //echo 'masuk';
       $query=$this->db2->insert_batch('mrpkp_wo_kondisipenyelesaian',$arr_ins);
       
       if($query > 0){
            foreach ($ambil_all as $value3){
       foreach ($upayapenagihan as $value4)
       {
           $arr_ins2[] = array_merge($value4, array('id_wo' => $value3->id_wo));
       }
     }
      if(!empty($arr_ins2)){
       //echo 'masuk';
       $query3=$this->db2->insert_batch('mrpkp_wo_upayapenagihan',$arr_ins2);
       
       if($query3 > 0){
        foreach ($ambil_all as $value5){
            foreach ($data_lampiran as $value6)
            {
           $arr_ins3[] = array_merge($value6, array('id_wo' => $value5->id_wo));
            }
         }
         if(!empty($arr_ins3)){
                $query2=$this->db2->insert_batch('mrpk_wo_lampiran',$arr_ins3);
             }
       }
       
            }
       }
   } 
}



public function mrpk_update_wo($insert_wo) {
    //print_r($insert_wo);
    //$a=$this->db2->insert('mrk_restrukturisasi', $data_row);
    $this->db2->update_batch('mrpk_wo', $insert_wo, 'cif');
}

public function delete_data_wo($id) {

    $this->db2->where('cif', $id);
    $this->db2->delete('mrpk_wo');
}
public function laporanpdf($a) {
    $query1 = "SELECT * from mrk_restrukturisasi where  nomor_nasabah='" . $a . "'";

    $data = $this->db2->query($query1);
    return $data->row();
}
public function pdflaporan($a) {
    $query1 = "SELECT * from mrk_restrukturisasi where  nomor_nasabah='" . $a . "'";
    $data = $this->db2->query($query1);
    return $data->result();
}
public function usulan_kredit_pdf($a) {
    $query1 = "SELECT * from mrk_ulasan_kredit where nomor_nasabah='".$a."' AND Jenis_fasilitas !='' ORDER BY nomor_urut";
     $data = $this->db2->query($query1);
    return $data->result();
}
public function search_norek_pdf($a) {
    $query1 = "SELECT a.key from mrk_ulasan_kredit AS a where nomor_nasabah='".$a."' group by a.key";
     $data = $this->db2->query($query1);
    return $data->result();
}
public function  laporanpdf_ptbam($a){
    $query1 = "SELECT * from mrpk_pelunasan_ptbam where  cif='".$a."'";
             $data = $this->db2->query($query1);
    return $data->row();
}
public function ptbam_pdflaporan($a) {
    $query1 = "SELECT * from mrpk_pelunasan_ptbam where  cif='".$a."'";
     $data = $this->db2->query($query1);
    return $data->result();
}
public function perpanjangan_pdflaporan_result($a) {
    $query1 = "SELECT * from mrpk_perpanjangan where  cif='".$a."'";
     $data = $this->db2->query($query1);
    return $data->result();
}

public function  perpanjangan_pdflaporan_row($a){
    $query1 = "SELECT * from mrpk_perpanjangan where  cif='".$a."'";
             $data = $this->db2->query($query1);
    return $data->row();
}

public function pelunasan_pdflaporan_result($a) {
    $query1 = "SELECT * from mrpk_pelunasan where  cif='".$a."'";
     $data = $this->db2->query($query1);
    return $data->result();
}

public function  pelunasan_pdflaporan_row($a){
    $query1 = "SELECT * from mrpk_pelunasan where  cif='".$a."'";

             $data = $this->db2->query($query1);
    return $data->row();
}

public function wo_pdflaporan_row($a) {
    if (!empty($a)) {
        $query1 = "SELECT * from mrpk_wo where cif ='" . $a . "'";
        $data1 = $this->db2->query($query1);
        if ($data1->num_rows() > 0) {
            return $data1->row();
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

public function  wo_pdflaporan_result($a){
    $query1 = "SELECT * from mrpk_wo where  cif='".$a."'";
             $data = $this->db2->query($query1);
    return $data->result();
}

}
