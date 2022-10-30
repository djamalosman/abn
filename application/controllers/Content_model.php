<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Content_model extends CI_Model {
var $table = 't_accountlist_baru'; //nama tabel dari database
var $column_order=array( 
    'f_cif',
    'f_custname',
    'f_loanid ',
    'f_jenisfasilitas ',
    'f_plafound',
    'f_nama_produk ',
    'f_startdate',
    'f_duedate',
    'f_cycle',
    'f_tenor',
    'f_branch_id',
    'f_homepostcode',
    'f_dpd_eom',
    'f_dpd',
    'f_bucket',
    'f_flag',
    'f_angsuran',
    'f_buki_debit',
    'f_tunggakan_pokok',
    'f_bunga',
    'f_denda',
    'f_total_tagihan',
    'f_saldo_tabungan',
    'f_tanggal_restruktur',
    'f_restruktur_ke',
    'f_tanggal_update_data_t24',
    'f_tanggal_update_DWH',
    'f_alamat_tagih',
    'f_no_tlp_debitur',
    'f_acctno',
    'f_email',
    'f_status',
    'f_assign_id'
  );
  
  var $column_search=array(    
    'f_cif',
    'f_custname',
    'f_loanid ',
    'f_jenisfasilitas ',
    'f_plafound',
    'f_nama_produk ',
    'f_startdate',
    'f_duedate',
    'f_cycle',
    'f_tenor',
    'f_branch_id',
    'f_homepostcode',
    'f_dpd_eom',
    'f_dpd',
    'f_bucket',
    'f_flag',
    'f_angsuran',
    'f_buki_debit',
    'f_tunggakan_pokok',
    'f_bunga',
    'f_denda',
    'f_total_tagihan',
    'f_saldo_tabungan',
    'f_tanggal_restruktur',
    'f_restruktur_ke',
    'f_tanggal_update_data_t24',
    'f_tanggal_update_DWH',
    'f_alamat_tagih',
    'f_no_tlp_debitur',
    'f_acctno',
    'f_email',
    'f_status',
    'f_assign_id'
  );
  var $order = array('id' => 'asc');

   private function _get_datatables_query()
    {
         
        $this->db2->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db2->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db2->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db2->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db2->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db2->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db2->order_by(key($order), $order[key($order)]);
        }

    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db2->limit($_POST['length'], $_POST['start']);
        $query = $this->db2->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db2->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db2->from($this->table);
        return $this->db2->count_all_results();
    }
    public function depuser() {
        $data = $this->db->get('t_user');
        return $data->result();
    }

    public function get_accountSP() {

        $this->db2->query('CALL accountlist');
        $data = $this->db2->get();
        return $data->result();
    }

    public function get_SP() {
        $this->db2->select('f_acctno, f_custname, f_dpd, f_email');
        $this->db2->from('t_accountlist2');
        $this->db2->where('f_dpd > ', '170');

        $data = $this->db2->get();
        return $data->result();
    }

    public function get_tgh_list() {
        $query1 = "SELECT t_assignment.* ";
        $where = "t_accountlist.f_aproved <= '2' AND t_accountlist.f_status != '3' AND t_accountlist.f_active = '0' ";
        $this->db2->select('*,t_agent.f_agentname');
        $this->db2->from('t_accountlist');
        $this->db2->join('t_agent', 't_accountlist.f_agentid = t_agent.f_agentid');
//        $this->db2->where('t_accountlist.f_status', 0);
        $this->db2->where($where);
        $data = $this->db2->get();
        return $data->result();
    }

    public function get_tgh_listtransfer() {
        $query2 = "select *,agent.f_agentid,agent.f_agentname from t_assignment as assig JOIN t_accountlist_baru as accbaru on assig.f_id_debitur=accbaru.f_id JOIN t_agent as agent on agent.f_agentid=assig.f_agent WHERE assig.f_status='1'
";
//        $query1 = "SELECT t_assignment.* ";
//        $where = "t_accountlist.f_aproved <= '2' AND t_accountlist.f_status != '3' AND t_accountlist.f_active = '0' ";
//        $this->db2->select('*,t_agent.f_agentname');
//        $this->db2->from('t_accountlist');
//        $this->db2->join('t_agent', 't_accountlist.f_agentid = t_agent.f_agentid');
////        $this->db2->where('t_accountlist.f_status', 0);
//        $this->db2->where($where);
        $data = $this->db2->query($query2);
        return $data->result();
    }

    public function get_debitur() {
        $query = "SELECT * FROM `bss_cad`";
        $data = $this->db2->query($query)->result();
        return $data;
    }

     public function get_recovery() {
        $query = "SELECT * FROM `t_accountlist_baru` LIMIT 50";
        $data = $this->db2->query($query)->result();
        return $data;
    }

    public function get_detaildebitur($agentid){
      $query="SELECT *,agent.f_agentname,agent.f_agentid from t_accountlist_baru as accbaru JOIN t_agent as agent on accbaru.f_assign_id=agent.f_agentid where agent.f_agentid='$agentid'";

      //$data=$this->db2->query($query)->result();
       $data = $this->db2->query($query);
        return $data->result();
    }

    public function inserttbl_mrpk_pelunasan($a, $b, $c) {
        //print_r($a);
        $data = array(
            'f_namecustomer' => $a,
            'f_acctno' => $b,
            'f_bucket' => $c
        );

        $data = $this->db2->insert('t_mrpk_pelunasan', $data);
    }

   public function getspecialstage($a) {
        //print_r($a);
        $data = $this->db2->where('f_loanid', $a);
        $data = $this->db2->get('t_accountlist_baru');
        return $data->row();
    }

    public function updateInsertspecialstage($_result) {
//var_dump($a,$bb,$hasil1,$hasil2,$c);
      // $data=array(
      //   'f_cif'=>$a,
      //   'f_loanid'=>$bb,
      //   'f_flagspecialstage'=>$hasil2,
      //   'f_code'=>$hasil1,
      //   'f_filemanager'=>$data,
      // );


        $this->db2->insert_batch('t_specialstage',$_result);
       // $this->sucess_input_specialstage();
                    //redirect('content/read_actionsp_page');
    }

    public function special_stage_view() {
        $query ="SELECT *,accbaru.f_branch_id,accbaru.f_acctno,accbaru.f_custname,accbaru.f_nama_produk,stage.f_flagspecialstage from t_accountlist_baru as accbaru JOIN t_specialstage AS stage ON accbaru.f_loanid=stage.f_loanid";
       
        $data = $this->db2->query($query);
        return $data->result();
    }

    public function get_special_stage() {
        //$data = $this->db2->where('f_status', 1);
        $data = $this->db2->get('t_accountlist_baru');
        return $data->result();
    }

    public function get_as_agentproduct() {
        $data = $this->db2->get('t_paramassign');
        return $data->result();
    }

    public function get_as_datamanual() {
        $data = $this->db2->get('t_assignheader');
        return $data->result();
    }

    public function get_as_datadetail($as_id) {
        $this->db2->where('f_agentid', $as_id);
        $data = $this->db2->get('t_assigndetail');
        return $data->result();
    }

    public function get_as_datadetail_by_branch($as_id) {
        $query = "
            SELECT 
                t_assigndetail.f_assignid, t_assigndetail.f_assigndate, 
                t_assigndetail.f_agentid, t_assigndetail.f_cif, t_assigndetail.f_acctno, 
                t_assigndetail.f_loanid, t_assigndetail.f_productid, t_assigndetail.f_status 
            FROM t_assigndetail 
            LEFT JOIN t_accountlist2 on t_accountlist2.f_acctno = t_assigndetail.f_acctno
            WHERE t_accountlist2.f_branch_id = '$as_id'";

        $data = $this->db2->query($query);
        return $data->result();
    }

    public function get_as_data() {
        $data = $this->db2->where('f_status', 1);
        $data = $this->db2->get('t_assignheader');
        return $data->result();
    }

    public function get_as_data_by_branch() {
        $query = "SELECT t_branch.f_branchid, t_assigndetail.f_acctno, t_branch.f_branchname, 
                    SUM( if(t_assigndetail.f_acctno != '', 1,0) ) as total_record, 
                    SUM(IF(t_assigndetail.f_status = 1, 1, 0)) as finish_record

                FROM t_assigndetail
                JOIN t_accountlist2 on t_assigndetail.f_acctno = t_accountlist2.f_acctno
                RIGHT JOIN t_branch on t_accountlist2.f_branch_id = t_branch.f_branchid
                GROUP BY t_branch.f_branchid";

        $data = $this->db2->query($query);
        return $data->result();

//SELECT /*t_assigndetail.f_agentid, */t_branch.f_branchid, t_assigndetail.f_acctno, t_branch.f_branchname, SUM( if(t_assigndetail.f_acctno != '', 1,0) ) as total_record, SUM(IF(t_assigndetail.f_status = 1, 1, 0)) as finish_record
//FROM t_assigndetail
//JOIN t_accountlist2 on t_assigndetail.f_acctno = t_accountlist2.f_acctno
//RIGHT JOIN t_branch on t_accountlist2.f_branch_id = t_branch.f_branchid
//GROUP BY t_branch.f_branchid
    }

    public function get_dt_visit() {
        $data = $this->db2->get('t_kunjungan');
        return $data->result();
    }

    public function get_dk_harian() {
        $data = $this->db2->get('tb_dkh');
        return $data->result();
    }

    public function get_dt_survey() {
        $data = $this->db2->get('tbl_hasil_inventory');
        return $data->result();
    }

    public function get_ms_produk_one($id) {
        $this->db2->where('f_productid', $id);
        $data = $this->db2->get('t_product');
        return $data->row();
    }

//model punya dj
    public function selectayda(){
        $data=$this->db2->get('t_ayda');
        return $data->result();
    }

    public function ayda_insert($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$yy,$z,$bb,$cc,$dd){
// var_dump($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$yy,$z,$bb,$cc,$dd);
$data= array(
  'f_custname'          =>$a,
  'f_cif'               =>$b,
  'f_plafondawal'       =>$c,
  'f_mv_a'              =>$d,
  'f_ltcr'              =>$e,
  'f_tglayda'           =>$f,
  'f_thnayda'           =>$g,
  'f_mobayda'           =>$h,
  'f_rangemob'          =>$i,
  'f_branch'            =>$j,
  'f_tgllpjawalayda'    =>$k,
  'f_mv_b'              =>$l,
  'f_lv'                =>$m,
  'tlgllpjlbh_satuthn'  =>$n,
  'f_mvtwo'             =>$o,
  'f_lvtwo'             =>$p,
  'tlgllpjlbh_duathn'   =>$q,
  'f_mvthree'           =>$r,
  'f_lvthree'           =>$s,
  'f_jenisasset'        =>$t,
  'alamat_jaminan'      =>$u,
  'lt_lb'               =>$v,
  'os_awal'             =>$w,
  'hpustgih_ayda'       =>$x,
  'nilai_awal_ayda'     =>$y,
  'biaya'               =>$yy,
  'penjualan_ayda'      =>$z,
  'neet_penjualan'      =>$cc,
  'tglpenjualan_ayda'   =>$cc,
  'ckpn'                =>$dd
      );  
      $this->db2->insert('t_ayda',$data);
    }
public function aydaedit($a){
   $data=$this->db2->where('f_cif',$a);
   $data=$this->db2->get('t_ayda');

   return $data->row();
}

public function ayda_update($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$bb,$cc,$dd,$cif){
      $data=array(

  'f_custname'          =>$a,
  'f_cif'               =>$b,
  'f_plafondawal'       =>$c,
  'f_mv_a'              =>$d,
  'f_ltcr'              =>$e,
  'f_tglayda'           =>$f,
  'f_thnayda'           =>$g,
  'f_mobayda'           =>$h,
  'f_rangemob'          =>$i,
  'f_branch'            =>$j,
  'f_tgllpjawalayda'    =>$k,
  'f_mv_b'              =>$l,
  'f_lv'                =>$m,
  'tlgllpjlbh_satuthn'  =>$n,
  'f_mvtwo'             =>$o,
  'f_lvtwo'             =>$p,
  'tlgllpjlbh_duathn'   =>$q,
  'f_mvthree'           =>$r,
  'f_lvthree'           =>$s,
  'f_jenisasset'        =>$t,
  'alamat_jaminan'      =>$u,
  'lt_lb'               =>$v,
  'os_awal'             =>$w,
  'hpustgih_ayda'       =>$x,
  'penjualan_ayda'      =>$y,
  'biaya'               =>$z,
  'neet_penjualan'      =>$bb,
  'tglpenjualan_ayda'   =>$cc,
  'ckpn'                =>$dd
  );
      $this->db2->where('f_cif',$cif);
       $this->db2->update('t_ayda',$data);
}

  public function insert_lelang($data) {
        $this->db2->insert('t_lelang', $data);
        $this->db2->error();
    }
 public function debsearchlelang(){
        $data=$this->db2->get(' t_accountlist_baru');
        return $data->result();
    }
 public function viewlelang(){
       $data=$this->db2->where('flaglelang',1); 
       $data=$this->db2->get('t_lelang');
        return $data->result();
        }
 public function getaccountlist($cif){
      $data=$this->db2->where('f_cif',$cif);
      $data=$this->db2->get('t_accountlist_baru');
      return $data->row();
    }
  public function get_searcmrpk($a) {
           $data=$this->db2->group_by('f_cif');
         $data=$this->db2->get('v_dammiaccountlist');
        return $data->result();
    }
  public function read_mrpk(){
        $data=$this->db2->where('flagmrpk',001);
        $data=$this->db2->get('i_dammymrpkpelunasan');
        return $data->result();
    }

   public function vieweditpenjualan($a){

        $data=$this->db2->where('f_cif',$a);
        $data=$this->db2->where('flagmrpk',002);
        $data=$this->db2->get('i_dammymrpkpelunasan');
        return $data->row();
    }
     public function update_penjualan_mrpk($a,$b,$c,$d,$dd,$e,$f,$g,
                $h,$i,$j,$k,$l,$m,$n,$o,$p,$t,$u){
         $data = array(
//            'f_agencyid' => $id_agen,
//            'f_agentid' => $nik,
            'kondibiayalain' =>$b,
            'kondibayar'=>$c,
            'kondihapus'=>$d,
            'upayadesk'=>$e,
            'upayapihak'=>$f,
            'pengumuman_ada'=>$g,    
'pengumuman_tidak'=>$h, 
'risalah_ada'=>$i,       
'risalah_tidak'=>$j,    
'permohonan_ada'=>$k,  
'permohonan_tidak'=>$l,  
'lpj_ada'=>$m,           
'lpj_tidak'=>$n,         
'lainya_ada'=>$o,        
'lainya_tidak'=>$p,                 
'dasar_pertimbangan'=>$t,
'rekomen_kredit'=>$u
            
        );

        $this->db2->where('f_cif', $a);
        $this->db2->update('i_dammymrpkpelunasan', $data);
    }
  public function get_datadamy() {
        $data = $this->db2->group_by('f_cif');
        $data = $this->db2->get('i_dammymrpkpelunasan');
        return $data->result();
    }

 public function mrpkdatadammy($a){
  if(!empty($a)){
        $query1 = "SELECT * FROM `v_dammiaccountlist` WHERE `f_cif` = '".$a."'";
        $data1 = $this->db2->query($query1);
          if ($data1->num_rows() > 0) { 
            return $data1->row();
          }else{
           return 0 ;
          }
  }else {
    return 0 ;
  }
    }


public function mrpkdatadammy1($a){
   $query1 = "SELECT * FROM `v_dammiaccountlist` WHERE `f_cif` = '".$a."'";
        $data1 = $this->db2->query($query1);
            return $data1->row();
}

 public function dammy($a){
        $data=$this->db2->where('f_cif',$a);
        $data=$this->db2->get('v_dammiaccountlist');
        return $data->result();
    }

 public function insert_mrpk_pelunasan($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v){

            $namacif=$v;
            $cifambil=explode("%20",$namacif);
            $nama=$cifambil['0'];
            $lasname=$cifambil['1'];
            
                  $data=array(

'f_cif' =>$u,
'f_nama'=>$nama,
'kondibiayalain'=>$a,    
'kondibayar'=>$b,
'kondihapus'=>$c,   
'upayadesk'=>$d,  
'upayapihak'=>$e,
'pengumuman_ada'=>$f,    
'pengumuman_tidak'=>$g, 
'risalah_ada'=>$h,       
'risalah_tidak'=>$i,    
'permohonan_ada'=>$j,  
'permohonan_tidak'=>$k,  
'lpj_ada'=>$l,           
'lpj_tidak'=>$m,         
'lainya_ada'=>$n,        
'lainya_tidak'=>$o,      
'permasalahan_dep'=>$p,  
'kondisi_penjelasan'=>$q,
'catatan'=>$r,           
'dasar_pertimbangan'=>$s,
'rekomen_kredit'=>$t,
'flagmrpk'=>001    
        );

        $this->db2->insert('i_dammymrpkpelunasan',$data);
        $this->db2->where('f_cif',$u);
        $this->db2->order_by('f_cif',$u);
    }


    public function insert_mrpk_penjualan($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q,$r, $u, $v){

            //         $namacif=$v;
            // $cifambil=explode("%20",$namacif);
            // $nama=$cifambil['0'];
            // $lasname=$cifambil['1'];
            
                  $data=array(

'f_cif' =>$u,
'f_nama'=>$v,
'kondibiayalain'=>$a,
'kondibayar'=>$b,
'kondihapus'=>$c,
'tanggalpenagihan'=>$d,
'upayadesk'=>$e,
'upayapihak'=>$f,
'pengumuman_ada'=>$g,
'pengumuman_tidak'=>$h,
'risalah_ada'=>$i,
'risalah_tidak'=>$j,
'permohonan_ada'=>$k,
'permohonan_tidak'=>$l,
'lpj_ada'=>$m,
'lpj_tidak'=>$n,
'lainya_ada'=>$o,
'lainya_tidak'=>$p,
'dasar_pertimbangan'=>$q,
'rekomen_kredit'=>$r,
'flagmrpk'=>002    
        );

        $this->db2->insert('i_dammymrpkpelunasan',$data);
        $this->db2->where('f_cif',$u);
        $this->db2->order_by('f_cif',$u);

    }

  public function get_searchmrpkpenjualan() {
        $data = $this->db2->group_by('f_cif');
        $data = $this->db2->get('t_mrpkpenjualan');
        return $data->result();
    }
 public function read_mrpkView_penjualan(){
        $data=$this->db2->where('flagmrpk',002);
        $data=$this->db2->get('i_dammymrpkpelunasan');
        return $data->result();
    }


     public function create_viewmrpkpenjualan($a){
        $data=$this->db2->where('f_cif',$a);
        $data=$this->db2->get(' t_mrpkpenjualan');
        return $data->row();
    }
    public function view_createmrpkpenjualan($a){
        $data=$this->db2->where('f_cif',$a);
        $data=$this->db2->get('t_mrpkpenjualan');
        return $data->result();
    }

    public function get_searcmrpk_wo(){
        $data=$this->db2->group_by('f_cif');
         $data=$this->db2->get('v_dammiaccountlist');
        return $data->result();
    }
    public function get_searcmrpk_perpanjangan(){
        $data=$this->db2->group_by('f_cif');
         $data=$this->db2->get('v_dammiaccountlist');
        return $data->result();
    }
     public function read_mrpkView_perpanjangan(){
         //$data=$this->db2->where('f_cif',$a);
        $data=$this->db2->where('flagmrpk',003);
        $data=$this->db2->get('i_dammymrpkpelunasan');
        return $data->result();
    }

    public function read_mrpkView_wo(){
         //$data=$this->db2->where('f_cif',$a);
        $data=$this->db2->where('flagmrpk',004);
        $data=$this->db2->get('i_dammymrpkpelunasan');
        return $data->result();
    }
     public function read_mrpkedit_wo($a){
         $data=$this->db2->where('f_cif',$a);
        $data=$this->db2->where('flagmrpk',004);
        $data=$this->db2->get('i_dammymrpkpelunasan');
        return $data->row();
    }
    public function update_perpanjangan_wo($a,$b,$c,$d,$dd,$e,$f,$g,
                $h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u){
         $data = array(
//            'f_agencyid' => $id_agen,
//            'f_agentid' => $nik,
            'kondibiayalain' =>$b,
            'kondibayar'=>$c,
            'kondihapus'=>$d,
            'tanggalpenagihan'=>$dd,
            'upayadesk'=>$e,
            'upayapihak'=>$f,
            'pengumuman_ada'=>$g,    
'pengumuman_tidak'=>$h, 
'risalah_ada'=>$i,       
'risalah_tidak'=>$j,    
'permohonan_ada'=>$k,  
'permohonan_tidak'=>$l,  
'lpj_ada'=>$m,           
'lpj_tidak'=>$n,         
'lainya_ada'=>$o,        
'lainya_tidak'=>$p,      
'permasalahan_dep'=>$q,  
'kondisi_penjelasan'=>$r,
'catatan'=>$s,           
'dasar_pertimbangan'=>$t,
'rekomen_kredit'=>$u
            
        );

        $this->db2->where('f_cif', $a);
        $this->db2->update('i_dammymrpkpelunasan', $data);
    }
      public function read_preView_wo($a){
         $data=$this->db2->where('f_cif',$a);
        $data=$this->db2->where('flagmrpk',004);
        $data=$this->db2->get('i_dammymrpkpelunasan');
        return $data->row();
    }
     public function read_preView_mrpkperpanjangan($a){
         $data=$this->db2->where('f_cif',$a);
        $data=$this->db2->where('flagmrpk',003);
        $data=$this->db2->get('i_dammymrpkpelunasan');
        return $data->row();
    }
      public function read_mrpkedit_perpanjangan($a){
         $data=$this->db2->where('f_cif',$a);
        $data=$this->db2->where('flagmrpk',003);
        $data=$this->db2->get('i_dammymrpkpelunasan');
        return $data->row();
    }
       public function priView_perpanjangan($a){
         $data=$this->db2->where('f_cif',$a);
        $data=$this->db2->where('flagmrpk',003);
        $data=$this->db2->get('i_dammymrpkpelunasan');
        return $data->row();
    }
     public function update_perpanjangan_mrpk($a,$b,$c,$d,$dd,$e,$f,$g,
                $h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u){
         $data = array(
//            'f_agencyid' => $id_agen,
//            'f_agentid' => $nik,
            'kondibiayalain' =>$b,
            'kondibayar'=>$c,
            'kondihapus'=>$d,
            'tanggalpenagihan'=>$dd,
            'upayadesk'=>$e,
            'upayapihak'=>$f,
            'pengumuman_ada'=>$g,    
'pengumuman_tidak'=>$h, 
'risalah_ada'=>$i,       
'risalah_tidak'=>$j,    
'permohonan_ada'=>$k,  
'permohonan_tidak'=>$l,  
'lpj_ada'=>$m,           
'lpj_tidak'=>$n,         
'lainya_ada'=>$o,        
'lainya_tidak'=>$p,      
'permasalahan_dep'=>$q,  
'kondisi_penjelasan'=>$r,
'catatan'=>$s,           
'dasar_pertimbangan'=>$t,
'rekomen_kredit'=>$u
            
        );

        $this->db2->where('f_cif', $a);
        $this->db2->update('i_dammymrpkpelunasan', $data);
    }
     public function update_pelunasan_mrpk($a,$b,$c,$d,$e,$f,$g,
                $h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u){
         $data = array(
//            'f_agencyid' => $id_agen,
//            'f_agentid' => $nik,
            'kondibiayalain' =>$b,
            'kondibayar'=>$c,
            'kondihapus'=>$d,
            'upayadesk'=>$e,
            'upayapihak'=>$f,
            'pengumuman_ada'=>$g,    
'pengumuman_tidak'=>$h, 
'risalah_ada'=>$i,       
'risalah_tidak'=>$j,    
'permohonan_ada'=>$k,  
'permohonan_tidak'=>$l,  
'lpj_ada'=>$m,           
'lpj_tidak'=>$n,         
'lainya_ada'=>$o,        
'lainya_tidak'=>$p,      
'permasalahan_dep'=>$q,  
'kondisi_penjelasan'=>$r,
'catatan'=>$s,           
'dasar_pertimbangan'=>$t,
'rekomen_kredit'=>$u
            
        );
//var_dump($data);

        $this->db2->where('f_cif', $a);
        $this->db2->update('i_dammymrpkpelunasan', $data);
    }

        public function insert_mrpk_wo($a, $b, $c,$cc, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $p, $q, $r, $s, $t, $u, $v){

            // $namacif=$v;
            // $cifambil=explode("%20",$namacif);
            // $nama=$cifambil['0'];
            // $lasname=$cifambil['1'];
            
$data=array(

'f_cif' =>$u,
'f_nama'=>$v,
'kondibiayalain'=>$a,    
'kondibayar'=>$b,
'kondihapus'=>$c,
'tanggalpenagihan'=>$cc,   
'upayadesk'=>$d,  
'upayapihak'=>$e,
'pengumuman_ada'=>$f,    
'pengumuman_tidak'=>$g, 
'risalah_ada'=>$h,       
'risalah_tidak'=>$i,    
'permohonan_ada'=>$j,  
'permohonan_tidak'=>$k,  
'lpj_ada'=>$l,           
'lpj_tidak'=>$m,               
'permasalahan_dep'=>$p,  
'kondisi_penjelasan'=>$q,
'catatan'=>$r,           
'dasar_pertimbangan'=>$s,
'rekomen_kredit'=>$t,
'flagmrpk'=>004    
        );

        $this->db2->insert('i_dammymrpkpelunasan',$data);
        $this->db2->where('f_cif',$u);
        $this->db2->order_by('f_cif',$u);
    }



    public function insert_mrpk_perpanjangan($a, $b, $c,$cc, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $p, $q, $r, $s, $t, $u, $v){

            // $namacif=$v;
            // $cifambil=explode("%20",$namacif);
            // $nama=$cifambil['0'];
            // $lasname=$cifambil['1'];
            
$data=array(

'f_cif' =>$u,
'f_nama'=>$v,
'kondibiayalain'=>$a,    
'kondibayar'=>$b,
'kondihapus'=>$c,
'tanggalpenagihan'=>$cc,   
'upayadesk'=>$d,  
'upayapihak'=>$e,
'pengumuman_ada'=>$f,    
'pengumuman_tidak'=>$g, 
'risalah_ada'=>$h,       
'risalah_tidak'=>$i,    
'permohonan_ada'=>$j,  
'permohonan_tidak'=>$k,  
'lpj_ada'=>$l,           
'lpj_tidak'=>$m,               
'permasalahan_dep'=>$p,  
'kondisi_penjelasan'=>$q,
'catatan'=>$r,           
'dasar_pertimbangan'=>$s,
'rekomen_kredit'=>$t,
'flagmrpk'=>003    
        );

        $this->db2->insert('i_dammymrpkpelunasan',$data);
        $this->db2->where('f_cif',$u);
        $this->db2->order_by('f_cif',$u);
    }

 public function pelunasanprintmrpk($a){

        $data=$this->db2->where('f_cif',$a);
        $data=$this->db2->where('flagmrpk',001);
        $data=$this->db2->get('i_dammymrpkpelunasan');
        return $data->row();
    }

//end model punya dj


    public function get_ms_kodepos_one($id) {
        $this->db2->where('f_postcode', $id);
        $data = $this->db2->get('t_postcode');
        return $data->row();
    }

// DATA TABLES    
    function make_query($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->db2->select($select_column);
        $this->db2->from($table);

        $this->db2->group_start();
        $this->db2->or_like($like);
        $this->db2->group_end();

        if (isset($_POST["order"])) {
//            print_r($_POST['order']);
            for ($i = 0; $i < count($_POST["order"]); $i++) {
                $this->db2->order_by($order_column[$_POST['order'][$i]['column']], $_POST['order'][$i]['dir']);
            }
        } else {
            $this->db2->order_by($order_query, 'DESC');
        }
    }

    function make_datatables($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->make_query($table, $select_column, $order_column, $order_query, $like, $where);

        $this->db2->group_start();

        $this->db2->where($where);

        $this->db2->group_end();
        if ($_POST["length"] != -1) {
            $this->db2->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db2->get();
        return $query->result();
    }

    function get_filtered_data($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->make_query($table, $select_column, $order_column, $order_query, $like, $where);
        $this->db2->where($where);
        $query = $this->db2->get();
        return $query->num_rows();
    }

    function get_all_data($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->db2->select("*");
        $this->db2->from($table);
//        $this->make_datatables($table, $select_column, $order_column, $order_query, $like, $where);
        $this->db2->where($where);
        return $this->db2->count_all_results();
//        return $this->db2->num_rows();
    }

//DATATABLES
//==============================================    

    public function updatefileNpwp($name, $f_agentid) {
        $this->db2->set('f_file', $name);
        $this->db2->where('f_agentid', $f_agentid);
        $this->db2->update('t_agent');
    }

    public function get_ms_produk() {
        $data = $this->db2->get('t_product');
        return $data->result();
    }

    public function get_ms_kodepos() {
        $data = $this->db2->get('t_postcode');
        return $data->result();
    }

    public function create_agent_collector($selection){
       if(!empty($selection['id'])){
            $status = '0';
            foreach($selection['id'] as $value){
                $d[] = array(
                  'f_agencyid' => $value,
                  'f_agentid' => $selection['nik'][$value],
                  'f_agentname' => $selection['nama'][$value],
                  'f_username'=>$selection['nik'][$value],
                  'f_userpswd'=>$selection['nik'][$value],
                  'f_status'=>$status
                );
            }
            if($d === ''){
                return 0 ;
            } else {
                $insert = $this->db2->insert_batch('t_agent', $d);
               return 1 ;
            }
        } else{
              return 0 ;
        }
    } 
 
    public function get_um_datakaryawan() {
        $this->db2->where('f_status', 1);
        $data = $this->db2->get('t_employee_bss');
        return $data;
    }

    public function rejectApprove_um_agent($flagrjt, $idrjt) {
        $this->db2->set('f_status', $flagrjt);
        $this->db2->where('f_agencyid', $idrjt);
        $this->db2->update('t_agent_bss');
    }

    public function Approve_um_agent($appflag, $id) {
        $this->db2->set('f_status',$appflag);
        $this->db2->where('f_agentid',$id);
        $this->db2->update('t_agent');
    }

    // public function get_um_agent($reqflag) {
    //     //var_dump($c);

    //     $stringarr = explode(',', $reqflag);
    //     //var_dump($stringarr);
        
    //     $this->db2->SELECT('*');
    //     $this->db2->where_in('f_active', 1);
    //     //$this->db2->where('reqflag',$stringarr[0]);
    //     $data = $this->db2->get('t_agent_bss');

        public function get_um_agent($reqflag) {
 //var_dump($c);

$stringarr = explode(',',$reqflag);
 //var_dump($stringarr);
//$data =$this->db2->where('reqflag',$stringarr[0]);
$data =$this->db2->SELECT('*');
$data =$this->db2->where_in('f_status',$stringarr);
$data = $this->db2->get('t_agent');
        // if ($this->session->userdata('level')==99) {
        //     $data = $this->db2->get('t_agent2');
        // }elseif ($this->session->userdata('level')==1) {
        //     $data =$this->db2->where('f_status');
        //     $data =$this->db2->get(' t_agent2');
        // }

        return $data->result();
    }

//       public function get_debiturperagent($agentid){
//         $query="SELECT f_assign_id FROM t_accountlist_baru as accbaru JOIN t_agent as agent on accbaru.f_assign_id=agent.f_agentid where accbaru.f_assignid =$agentid";

//           // $data=$this->db2->from ('t_accountlist_baru as accbaru');
//           // $data=$this->db2->JOIN('t_agent as agent','accbaru.f_assign_id=agent.f_agentid');
//           // $data=$this->db2->where('accbaru.f_assign_id =',$agentid);
//     //$data = $this->db2->query($query);
// //        $data = $this->db2->get();
//         //var_dump($query);
//         return $query;
         
//       }

    public function get_tgh_list_one($id) {
        $this->db2->where('f_cif', $id);
        $data = $this->db2->get('t_accountlist2');
        return $data->row();
    }

    public function get_as_data_one($id) {
        $this->db2->where('f_assignid', $id);
        $data = $this->db2->get('t_assignheader');
        return $data->row();
    }

    public function get_um_datakaryawan_one($id) {
        $this->db2->where('f_nik', $id);
        $data = $this->db2->get('t_employee');
        return $data->row();
    }

    public function get_sp_administration_one($id) {
        $this->db2->where('f_jenisSp', $id);
        $data = $this->db2->get('t_administrationsp');
        return $data->row();
    }

     public function update_edit_lelang($data,$loanid) {
        $this->db2->where('f_loanid',$loanid);
        $this->db2->update('t_lelang', $data);
        $this->db2->error();
    }
    public function get_mntr_lelang_one($id) {
        $this->db2->where('f_loanid', $id);
        $data = $this->db2->get('t_lelang');
        return $data->row();
    }

    public function get_um_agent_one($id) {
        $this->db2->where('f_agentid', $id);
        $data = $this->db2->get('t_agent');
        return $data->row();
    }

    public function get_param_branch() {
        $data = $this->db2->get('t_branch');
        return $data->result();
    }

    public function get_param_city() {
        $data = $this->db2->get('t_city');
        return $data->result();
    }

    public function getparamspecialstage() {
        $data = $this->db2->get('t_parameter ');
        return $data->result();
    }

    public function read_param_actioncode() {
        $data = $this->db2->get('t_actioncode');
        return $data->result();
    }

    public function get_param_area() {
        $data = $this->db2->get('t_area');
        return $data->result();
    }

    public function delete_multi_param_city($id) {
        foreach ($id as $item) {
            $this->db2->where('f_cityid', $item);
            $this->db2->delete('t_city');
        }
    }

    public function delete_multi_param_branch($id) {
        foreach ($id as $item) {
            $this->db2->where('f_branchid', $item);
            $this->db2->delete('t_branch');
        }
    }

      public function delete_Allparam($id) {

            $this->db2->where('f_id',$id);
            $this->db2->delete('t_parameter');
        
    }
    
         public function delete_multimasterparameter($id) {
        foreach ($id as $item) {
            $this->db2->where('f_code', $item);
            $this->db2->delete('t_m_param');
        }
         foreach ($id as $item) {
            $this->db2->where('f_code', $item);
            $this->db2->delete('t_parameter');
        }
    }


    public function delete_multi_tgh_list($id) {
        foreach ($id as $item) {
            $this->db2->where('f_cif', $item);
            $this->db2->delete('t_accountlist2');
        }
    }

    public function delete_multi_as_agentproduct($id) {
        foreach ($id as $item) {
            $this->db2->where('f_linkid', $item);
            $this->db2->delete('t_paramassign');
        }
    }

    public function delete_multi_as_datamanual($id) {
        foreach ($id as $item) {
            $this->db2->where('f_assignid', $item);
            $this->db2->delete('t_assignheader');
        }
    }

    public function delete_multi_as_data($id) {
        foreach ($id as $item) {
            $this->db2->where('f_assignid', $item);
            $this->db2->delete('t_assignheader');
        }
    }

    public function delete_multi_ms_produk($id) {
        foreach ($id as $item) {
            $this->db2->where('f_productid', $item);
            $this->db2->delete('t_product');
        }
    }
     public function update_process_allparameter($f_id,$f_untuk,$f_type,$f_status,$f_code,$f_desc) {
        $data = array(
            // 'f_untuk' => $id_agen,
            // 'f_type' => $nik,
            // 'f_code' => $agent_name,
            // 'f_desc' => $username,
            // 'f_userpswd' => $password

            'f_id'=>$f_id,
            'f_untuk'=>$f_untuk,
            'f_type'=>$f_type,
            'f_code'=>$f_code,
            'f_status'=>$f_status,
            'f_desc'=>$f_desc
            
        );
        //var_dump($data);
        $this->db2->where('f_id', $f_id);
        $this->db2->update('t_parameter', $data);
        //print_r($this->db2->error());
    }

     public function allparameter_edit($id) {
        $this->db2->where('f_id', $id);
        $data = $this->db2->get('t_parameter');
        return $data->row();
    }
    public function delete_multi_sp_administration($id) {
        foreach ($id as $item) {
            $this->db2->where('id_sp', $item);
            $this->db2->delete('t_param_sp');
        }
    }

    public function delete_ayda($id) {
        foreach ($id as $item) {
            $this->db2->where('f_cif', $item);
            $this->db2->delete('t_ayda');
        }
    }

    public function delete_multi_mntr_lelang($id) {
        foreach ($id as $item) {
            $this->db2->where('f_cif', $item);
            $this->db2->delete('t_lelang');
        }
    }

      public function delete_multi_sysprosess($id) {
        foreach ($id as $item) {
            $this->db2->where('f_id', $item);
            $this->db2->delete('t_sysprocess');
        }
    }

    public function delete_multi_ms_kodepos($id) {
        foreach ($id as $item) {
            $this->db2->where('f_postcode', $item);
            $this->db2->delete('t_postcode');
        }
    }

    public function delete_multi_um_datakaryawan($id) {
        foreach ($id as $item) {
            $this->db2->set('f_status', 0);
            $this->db2->where('f_id', $item);
            $this->db2->update('t_employee_bss');
        }
    }

    public function delete_multi_um_agent($id) {
        foreach ($id as $item) {
            $this->db2->where('f_agentid', $item);
            $this->db2->delete('t_agent');
        }
    }
      public function delete_idspecialstage($id) {
        foreach ($id as $item) {
            $this->db2->where('f_loanid', $item);
            $this->db2->delete('t_specialstage');
        }
    }

    public function delete_multi_param_area($id) {
        foreach ($id as $item) {
            $this->db2->where('f_areaid', $item);
            $this->db2->delete('t_area');
        }
    }

   public function update_um_agent_process($id_agen,$agent_name,$username,$password,$status,$jabatan,$imei,$nohp,$sn) {
        $data = array(
//            'f_agencyid' => $id_agen,
//            'f_agentid' => $nik,
            'f_agentname' => $agent_name,
            'f_username' => $username,
            'f_userpswd' => $password,
            'f_status' => $status,
            'f_jabatan' => $jabatan,
            'f_imeihp' => $imei,
            'f_nohp' => $nohp,
            'f_snhp' => $sn
            
        );
        //var_dump($data);
        $this->db2->where('f_agentid', $id_agen);
        $this->db2->update('t_agent', $data);
        //print_r($this->db2->error());
    }
    public function update_tgh_list_process($data) {
        $this->db2->where('f_cif', $data['f_cif']);
        $this->db2->update('t_accountlist2', $data);
    }

    public function create_tgh_list_process($data) {
        $this->db2->insert('t_accountlist2', $data);
    }

    public function create_as_data_process($f_assignid, $f_assigndate, $f_agentid, $f_status, $f_rectotal, $f_recdone, $f_trftoagentid, $f_originagent, $f_trfdate) {
        $data = array(
            'f_assignid' => $f_assignid,
            'f_assigndate' => $f_assigndate,
            'f_agentid' => $f_agentid,
            'f_status' => $f_status,
            'f_rectotal' => $f_rectotal,
            'f_recdone' => $f_recdone,
            'f_trftoagentid' => $f_trftoagentid,
            'f_originagent' => $f_originagent,
            'f_trfdate' => $f_trfdate,
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->insert('t_assignheader', $data);
    }

    public function update_as_data_process($f_assignid, $f_trftoagentid, $f_originagent, $f_alasan, $f_keterangan, $f_trfdate) {
        $data = array(
//            'f_assignid' => $f_assignid,
//            'f_assigndate' => $f_assigndate,
//            'f_agentid' => $f_agentid,
//            'f_status' => $f_status,
//            'f_rectotal' => $f_rectotal,
//            'f_recdone' => $f_recdone,
            'f_trftoagentid' => $f_trftoagentid,
            'f_originagent' => $f_originagent,
            'f_trfdate' => $f_trfdate,
//            'f_usercreate' => $this->session->userdata('username'),
//            'f_datecreate' => date('Y-m-d'),
            'f_alasan' => $f_alasan,
            'f_keterangan' => $f_keterangan,
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->where('f_assignid', $f_assignid);
        $this->db2->update('t_assignheader', $data);

        return $this->db2->error();
    }

    public function update_um_datakaryawan_process($data) {
        $this->db2->where('f_nik', $data['f_nik']);
        $this->db2->update('t_employee', $data);
    }

    public function update_ms_kodepos_process($data) {
        $this->db2->where('f_postcode', $data['f_postcode']);
        $this->db2->update('t_postcode', $data);
    }

    public function update_ms_produk_process($data) {
        $this->db2->where('f_productid', $data['f_productid']);
        $this->db2->update('t_product', $data);
    }

    public function create_ms_produk_process($data) {
        $this->db2->insert('t_product', $data);
    }

    public function create_ms_kodepos_process($data) {
        $this->db2->insert('t_postcode', $data);
    }

    public function create_um_datakaryawan_process($data) {
        $insert = $this->db2->insert('bss_employee', $data);
        if ($insert === TRUE) {
            return 1;
        } else {
            return $insert;
        }
    }

    public function create_sp_administration_process($data) {
        $this->db2->insert('t_administrationsp', $data);
    }

    public function update_sp_administration_process($data) {
        $this->db2->where('f_jenisSp', $data['f_jenisSp']);
        $this->db2->update('t_administrationsp', $data);
    }

    public function update_mntr_lelang_process($data) {
        $this->db2->where('f_debtNum', $data['f_debtNum']);
        $this->db2->update('t_lelang', $data);
    }

    //$id_agen,
    public function create_um_agent_process($nik, $agent_name, $id_branch, $username, $pass, $email, $no_hp, $imei, $phone_sn, $userdep) {
        $data = array(
            //'f_agencyid' => $id_agen,
            'f_agentid' => $nik,
            'f_agentname' => $agent_name,
            'f_branch_id' => $id_branch,
            'f_username' => $username,
            'f_userpswd' => $pass,
            'f_email' => $email,
            'f_nohp' => $no_hp,
            'f_imeihp' => $imei,
            'f_snhp' => $phone_sn,
            'f_emailuserdep' => $userdep
        );

        //print_r($data);


        $this->db2->insert('t_agent', $data);
//        print_r($this->db2->error());
    }

    public function create_param_city_process($id_kota, $city_name, $status) {
        $data = array(
            'f_cityid' => $id_kota,
            'f_cityname' => $city_name,
            'f_active' => $status,
            'f_usercreate' => 'System',
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => 'System',
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->insert('t_city', $data);
    }

    public function create_param_branch_process($id_branch, $branch_name, $id_area, $address, $id_kota, $postal_code) {
        $data = array(
            'f_branchid' => $id_branch,
            'f_branchname' => $branch_name,
            'f_areaid' => $id_area,
            'f_address' => $address,
            'f_cityid' => $id_kota,
            'f_postcode' => $postal_code,
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );

        $a=$this->db2->insert('t_branch', $data);
        return $a;
    }

    public function update_param_branch_process($id_branch, $branch_name, $id_area, $address, $id_kota, $postal_code) {
        $data = array(
            'f_branchid' => $id_branch,
            'f_branchname' => $branch_name,
            'f_areaid' => $id_area,
            'f_address' => $address,
            'f_cityid' => $id_kota,
            'f_postcode' => $postal_code,
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->where('f_branchid', $id_branch);
        $this->db2->update('t_branch', $data);
    }

    public function create_param_actioncode_process($category, $actioncode, $Description) {
        $data = array(
            'f_category' => $category,
            'f_actcode' => $actioncode,
            'f_description' => $Description,
            'f_usercreate' => "System",
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => "System",
            'f_dateupdate' => date('Y-m-d')
        );
        $this->db2->insert('`t_actioncode', $data);
    }

    public function create_param_specialstage_process($categoryspecialstage, $specialstageCode) {
        $data = array(
            // 'f_specialstageid'=>'',
            'f_specialstage' => $categoryspecialstage,
            'f_specialstagecode' => $specialstageCode,
            'f_usercreate' => "System",
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => "System",
            'f_dateupdate' => date('Y-m-d')
        );
        $this->db2->insert('`t_paramspecialstage', $data);
        redirect('content/read_param_specialstage');
    }

    public function create_param_area_process($id_area, $area_name, $notes) {
        $data = array(
            'f_areaid' => $id_area,
            'f_areaname' => $area_name,
            'f_notes' => $notes,
            'f_usercreate' => "System",
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => "System",
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->insert('t_area', $data);
    }

    public function update_param_area_process($id_area, $area_name, $notes) {
        $data = array(
            'f_areaid' => $id_area,
            'f_areaname' => $area_name,
            'f_notes' => $notes,
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );
        $this->db2->where('f_areaid', $id_area);
        $this->db2->update('t_area', $data);
    }

    public function update_param_city_process($id_kota, $city_name, $status) {
        $data = array(
            'f_cityid' => $id_kota,
            'f_cityname' => $city_name,
            'f_active' => $status,
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->where('f_cityid', $id_kota);
        $this->db2->update('t_city', $data);
    }

    public function get_city_one($id) {
        $data = $this->db2->get_where('t_city', array('f_cityid' => $id));
        return $data->row();
    }

    public function get_branch_one($id) {
        $data = $this->db2->get_where('t_branch', array('f_branchid' => $id));
        return $data->row();
    }

    public function get_area_one($id) {
        $data = $this->db2->get_where('t_area', array('f_areaid' => $id));
        return $data->row();
    }

//    DATA TABLES SERVER SIDE PROCESSING
    function make_datatables_compact($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->db2->select($select_column);
        $this->db2->from($table);
        $this->db2->join('t_accountlist2', 't_accountlist2.f_cif = t_assigndetail.f_cif', 'left');

        $this->db2->group_start();
        $this->db2->or_like($like);
        $this->db2->group_end();

        if (isset($_POST["order"])) {
            for ($i = 0; $i < count($_POST["order"]); $i++) {
                $this->db2->order_by($order_column[$_POST['order'][$i]['column']], $_POST['order'][$i]['dir']);
            }
        } else {
            $this->db2->order_by($order_query, 'DESC');
        }

        $this->db2->group_start();
        $this->db2->where($where);
        $this->db2->group_end();



        if ($_POST["length"] != -1) {
            $this->db2->limit($_POST['length'], $_POST['start']);
        }


        $query = $this->db2->get();
        $query->result();

        $data = array();
        foreach ($query->result() as $row) {
            $sub_array = array();
//                $sub_array[] = "<p class='text-center'><input class='ceklis' type='checkbox' value='$row->f_assignid' name='idnya[]'/></p>";
            $sub_array[] = $row->f_assignid;
            $sub_array[] = $row->f_assigndate;
            $sub_array[] = $row->f_agentid;
            $sub_array[] = $row->f_cif;
            $sub_array[] = $row->f_acctno;
            $sub_array[] = $row->f_custname;
            $sub_array[] = $row->f_loanid;
            $sub_array[] = $row->f_productid;
            $sub_array[] = $row->f_status;
//                $sub_array[] = "<a title='Edit' href='". base_url('content/update_mntr_lelang/'.$row->f_assignid)."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";


            $data[] = $sub_array;
        }

        $this->db2->group_start();
        $this->db2->or_like($like);
        $this->db2->group_end();
        $this->db2->group_start();
        $this->db2->where($where);
        $this->db2->group_end();

        $this->db2->where(array('f_status =' => '0'));
        $recordsTotal = $this->db2->count_all_results($table);

        $this->db2->select('*');
        $this->db2->from($table);
        $this->db2->group_start();
        $this->db2->or_like($like);
        $this->db2->group_end();
        $this->db2->group_start();
        $this->db2->where($where);
        $this->db2->group_end();

        $this->db2->where(array('f_status =' => '0'));
        if (isset($_POST["order"])) {
            for ($i = 0; $i < count($_POST["order"]); $i++) {
                $this->db2->order_by($order_column[$_POST['order'][$i]['column']], $_POST['order'][$i]['dir']);
            }
        } else {
            $this->db2->order_by($order_query, 'DESC');
        }
        $recordsFiltered = ($this->db2->get()->num_rows());

        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        );

        return $output;
    }

    function make_query_ins($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->db2->select($select_column);
        $this->db2->from($table);
        $this->db2->join('t_accountlist2', 't_accountlist2.f_cif = t_assigndetail.f_cif', 'left');

        $this->db2->group_start();
        $this->db2->or_like($like);
        $this->db2->group_end();

        if (isset($_POST["order"])) {
            for ($i = 0; $i < count($_POST["order"]); $i++) {
                $this->db2->order_by($order_column[$_POST['order'][$i]['column']], $_POST['order'][$i]['dir']);
            }
        } else {
            $this->db2->order_by($order_query, 'DESC');
        }
    }

    function make_datatables_ins($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->make_query_ins($table, $select_column, $order_column, $order_query, $like, $where);

        $this->db2->group_start();

        $this->db2->where($where);

        $this->db2->group_end();
        if ($_POST["length"] != -1) {
            $this->db2->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db2->get();
        return $query->result();
    }

    function get_filtered_data_ins($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->make_query_ins($table, $select_column, $order_column, $order_query, $like, $where);
        $this->db2->where($where);
        $query = $this->db2->get();
        return $query->num_rows();
    }

    function get_all_data_ins($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->db2->select("*");
        $this->db2->from($table);
        $this->db2->where($where);
        return $this->db2->count_all_results();
    }

//    bss baru

    public function loadMparam() {
        $data1 = $this->db2->get('t_m_param');
        return $data1;
    }
    
    public function getparam(){
       $this->db2->where('f_active', '0');
        $data1 = $this->db2->get('t_parameter');
        return $data1;
    }

    public function loadparam() {
        $this->db2->where('f_active', '0');
        $data1 = $this->db2->get('t_parameter');
        return $data1;
      // $data1="SELECT *,view_param.f_untuk FROM t_m_param as get_param JOIN t_parameter AS view_param ON view_param.f_id=get_param.f_id where view_param.f_active=0";
      //    $data = $this->db2->query($data1)->result();

      //    return $data;
    }

    public function create_m_param_process($data) {
        $inset = $this->db2->insert('t_m_param', $data);
        if ($inset === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public function create_param_process($data,$code) {
      $type=$this->input->post('f_type');
        $inset = $this->db2->insert('t_parameter', $data);

        $inset=$this->db2->where('f_type',$type);
        $inset =$this->db2->update('t_m_param',$code);
        if ($inset === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }
    
     public function delete_param_process($id) {
        if (empty($id)) {
            return 2;
        } else {
            foreach ($id as $item) {
                $this->db2->where('f_code', $item);
                $delete = $this->db2->delete('t_parameter');

            }
             foreach ($id as $item) {
                $this->db2->where('f_code', $item);
                $delete = $this->db2->delete('t_m_param');

            }
            if ($delete === TRUE) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function getassignment() {

//        $this->db->select('f_agentid , COUNT(f_cif)');
//        $this->db->group_by('f_agentid');
//        $this->db->order_by('total', 'desc');
//        $this->db->get('t_accountlist');
//        $this->db2->where('f_aproved', 1);
//        JOIN t_agent ON t_agent.f_agentid = t_accountlist.f_agentid  
        $query = "SELECT *,t_agent.f_agentname, COUNT(t_accountlist_baru.f_loanid) as jmlh FROM t_accountlist_baru JOIN t_assignment ON t_assignment.f_id_debitur = t_accountlist_baru.f_id JOIN t_agent ON t_agent.f_agentid = t_assignment.f_agent WHERE t_assignment.f_aproved = '1' GROUP BY t_assignment.f_agent  ";
        $data = $this->db2->query($query)->result();

        return $data;
    }

    public function getassignmentdetail($agentid) {
        $query = "SELECT * FROM t_accountlist_baru JOIN t_assignment ON t_assignment.f_id_debitur = t_accountlist_baru.f_id WHERE t_assignment.f_agent = '".$agentid."' AND t_assignment.f_aproved = '1'  ";
        $data = $this->db2->query($query)->result();

        return $data;
    }

    public function paramselectcompany() {
        $this->db2->where('f_type', 'CMP');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $cmp = $this->db2->get('t_parameter');
        return $cmp;
    }

    public function paramselectdirect() {
        $this->db2->where('f_type', 'DIRC');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $direct = $this->db2->get('t_parameter');
        return $direct;
    }

    public function paramselectdept() {
        $this->db2->where('f_type', 'DEP');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $dept = $this->db2->get('t_parameter');
        return $dept;
    }

    public function paramselectdiv() {
        $this->db2->where('f_type', 'DIV');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $dept = $this->db2->get('t_parameter');
        return $dept;
    }

    public function paramselectposition() {
        $this->db2->where('f_type', 'PST');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $pst = $this->db2->get('t_parameter');
        return $pst;
    }

    public function paramselectgroup() {
        $this->db2->where('f_type', 'GR');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $group = $this->db2->get('t_parameter');
        return $group;
    }

    public function paramselectemparea() {
        $this->db2->where('f_type', 'EMPAREA');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $emparea = $this->db2->get('t_parameter');
        return $emparea;
    }

    public function paramselectempstatus() {
        $this->db2->where('f_type', 'EMPSTS');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $empsts = $this->db2->get('t_parameter');
        return $empsts;
    }

    public function paramselectempoffice() {
        $this->db2->where('f_type', 'EMPOF');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $empoffice = $this->db2->get('t_parameter');
        return $empoffice;
    }

    public function paramselectorgunit() {
        $this->db2->where('f_type', 'ORGUNIT');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $orgunit = $this->db2->get('t_parameter');
        return $orgunit;
    }

    public function paramselectcostcenter() {
        $this->db2->where('f_type', 'CC');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $cc = $this->db2->get('t_parameter');
        return $cc;
    }

    public function paramselectspv() {
        $this->db2->where('f_status', '1');
        $employee = $this->db2->get('t_employee_bss');
        return $employee;
    }

    public function aproved_proses($id) {
        $updatedata = array(
            'f_aproved' => '2'
        );
        foreach ($id as $item) {
            $this->db2->where('f_loanid', $item);
            $this->db2->update('t_assignment', $updatedata);
        }
    }

    public function getagent($agentid) {
        $this->db2->where('f_agentid', $agentid);
        $agent = $this->db2->get('t_agent');

        return $agent->row();
    }

    public function countlist($agentid) {
        $query = "SELECT * FROM t_accountlist_baru JOIN t_assignment ON t_assignment.f_id_debitur = t_accountlist_baru.f_id WHERE t_assignment.f_aproved = '' AND t_assignment.f_agent = '".$agentid."'";
        $data = $this->db2->query($query)->result();

        return $data;
    }

     public function transfer_debitur_proses($id, $data, $desc,$namaagen,$idagenawal) {
         
        foreach ($id as $item) {
//            echo $item;
            $d = array(
                'f_loanid' => $item,
                'f_agentidawal'=>$idagenawal,
                'f_agent_awal'=>$namaagen,
                'f_transfer_to' => $data,
                'f_desc' => $desc,
                'f_user_create' => $this->session->userdata('username'),
                'f_create_date' => date('Y-m-d')
            );
            //var_dump($id, $data, $desc,$namaagen,$idagenawal);
            $createtf = $this->db2->insert('t_transfer_account', $d);
            if ($createtf === TRUE) {
                $query = "SELECT *,f_id FROM t_transfer_account WHERE f_aproved = '0' AND f_loanid = '" . $item . "'";
                $a = $this->db2->query($query)->row();
//                echo $a->f_id;
                $nilai=2;
                $updatedata = array(
                    'f_status' => $nilai,
                    'f_id_tf' => $a->f_id,
                    'f_agent'=>$a->f_agentidawal
                );
                 print_r($updatedata);
                 $this->db2->where('f_loanid', $item);
                 $update = $this->db2->update('t_assignment', $updatedata);
            }
        }
         if ($update === TRUE) {
             return 1;
         } else {
             return 0;
         }
    }
    public function testing($data) {
        $data3 = array('nik' => '2', 'birth_date' => '2');
        $data1 = $this->db2->insert('t_testing', $data);
        if ($data1 == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public function create_datakaryawan_process($data) {
      
        $inst = $this->db2->insert('t_employee_bss', $data);
        if ($inst == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

     public function sysprocess() {
        $syspro = $this->db2->get('t_sysprocess');
        return $syspro->result();
    }

    public function sysprocessedit($id) {
        $this->db2->where('f_id', $id);
        $syspro = $this->db2->get('t_sysprocess');
        return $syspro->row();
    }

    public function get_agent() {
        $this->db2->where('f_status', 1);
        $agent = $this->db2->get('t_agent');
        return $agent->result();
    }

    public function tambah_debitur_proses($id) {
        $updatedata = array(
            'f_aproved' => '1',
        );

        foreach ($id as $item) {
            $this->db2->where('f_loanid', $item);
            $this->db2->update('t_assignment', $updatedata);
        }
    }

    public function get_collector_aprove(){
      $query ="select * from t_agent where f_status=0";
      $data = $this->db2->query($query);
       return $data->result();
    }

    public function get_transfer_list() {
        //$query =  "SELECT *,t_transfer_account.f_transfer_to,t_transfer_account.f_cif,t_transfer_account.f_desc FROM t_accountlist JOIN t_transfer_account ON t_transfer_account.f_id = t_accountlist.f_id_tf";
//       $query =  "SELECT *,t_accountlist.f_agentid,t_accountlist.f_cif FROM t_transfer_account JOIN t_accountlist ON t_transfer_account.f_id = t_accountlist.f_id_tf WHERE t_transfer_account.f_aproved = 0";
        $query = "SELECT t_transfer_account.*,t_agent.f_agentname,t_assignment.f_cif,t_assignment.f_agent, t_accountlist_baru.f_acctno ,t_accountlist_baru.f_custname FROM t_transfer_account JOIN t_assignment ON t_transfer_account.f_id = t_assignment.f_id_tf JOIN t_accountlist_baru ON t_accountlist_baru.f_loanid = t_assignment.f_loanid JOIN t_agent ON t_transfer_account.f_transfer_to =t_agent.f_agentid WHERE t_transfer_account.f_aproved = 0";
//        $data = $this->db2->get('t_transfer_account')->result();
        // $this->db2->select('*, t_accountlist.f_agentid ,t_accountlist.f_cif,t_accountlist.f_acctno,t_accountlist.f_cusname');
        // $this->db2->from('t_transfer_account');
        // $this->db2->join('t_accountlist', 't_transfer_account.f_id = t_accountlist.f_id_tf ');
//        $this->db2->where('t_transfer_account.f_aproved', 0 );
        $data = $this->db2->query($query);
//        $data = $this->db2->get();

        return $data->result();
    }

    public function updatestatus_approve($a){
       $updatedata = array(
            'f_status' => '1'
        );
        foreach ($a as $item) {
            $this->db2->where('f_agentid', $item);
            $this->db2->update('t_agent', $updatedata);
        }
    }
    
	 public function transfer_debitur_prosesfinal($id){
      // $agenawalid=$id;
      //  $aid=explode("-",$agenawalid);
      //           $idnya=$aid['0'];
                //$arrayName = array('f_id' =>$idnya  );
        foreach ($id as $item){
            $query = "SELECT * FROM `t_assignment` WHERE `f_id_tf` = '".$item."'";
            $data1 = $this->db2->query($query)->row();
            if(!empty($data1) ){
                $agent = $data1->f_agent;
                $update = "UPDATE `t_transfer_account` SET f_aproved = '1', `f_agent_awal` = '".$agent."' WHERE f_id = '".$item."' ";
                if($this->db2->query($update) === TRUE){
                    $agent2 = "SELECT `f_transfer_to` FROM t_transfer_account WHERE f_id = '".$item."'";
                    $agentto = $this->db2->query($agent2)->row();
                    $update2 = "UPDATE `t_assignment` SET `f_agent` = '".$agentto->f_transfer_to."' ,`f_status` = '1' WHERE f_id_tf = '".$item."'";
                    
                      $delete= "DELETE  FROM t_transfer_account WHERE f_id = '".$item."'";
                      $updateassignment = $this->db2->query($delete);
                }


            }
        } 
            if($updateassignment === TRUE){
            return 1;
        } else {
            return 0;
        }
        
    }

	 public function process_reject_account($id){
        //$f_status=2;
        //$status=1;
        $updateassignment=$this->db2->where('f_transfer_to',$id);
        $updateassignment=$this->db2->delete('t_transfer_account');

        $updateassignment=$this->db2->set('f_status',1);
        $updateassignment=$this->db2->set('f_aproved','');
        $updateassignment=$this->db2->where('f_agent', $id);
        $updateassignment=$this->db2->update('t_assignment');

         if($updateassignment === TRUE){
            return 1;
        } else {
            return 0;
        }
    }

      public function gagal_notif_input() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Data Gagal Di update,Silahkan pilih data yang akan di update',
              'error'
            )</script>"
        );
    }
    public function transfer_debitur_proses2($id, $agentid, $desc, $code) {
        if ($code === 'edit') {
          if ($id == null) {
            $this->gagal_notif_input();
            redirect('content/transfer_account');
          }else{
            foreach ($id as $item) {
                $d = array(
          
//                'f_id' => $item,
                    'f_transfer_to' => $agentid,
                    'f_desc' => $desc,
                    'f_user_update' => $this->session->userdata('username'),
                    'f_update_date' => date('Y-m-d')
                );
                $this->db2->where('f_id', $item);
                $update = $this->db2->update('t_transfer_account', $d);
            }
          }
            if ($update === TRUE) {
                return 1;
            } else {
                return 0;
            }
        } elseif ($code === 'delete') {
            foreach ($id as $item) {
                $d = array(
                    'f_aproved' => '5');

                $this->db2->where('f_id', $item);
                $delete = $this->db2->update('t_transfer_account', $d);
            }
            if ($delete === TRUE) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function get_list_debitur() {
//        $this->db2->where('f_assignment','');
//        $this->db2->where('f_assignment_to','');
//        $this->db2->get('t_bssdebitur')->result();
        $query = "SELECT * FROM t_accountlist_baru WHERE f_dpd > 91 AND f_assign_id = ''";
        $data = $this->db2->query($query);
        return $data->result();
//        $this->session->userdata('username');
    }


    public function view_dataassigment() {
//        $this->db2->where('f_assignment','');
//        $this->db2->where('f_assignment_to','');
//        $this->db2->get('t_bssdebitur')->result();
        $query = "select *,agent.f_agentid,agent.f_agentname from t_assignment as assig JOIN t_accountlist_baru as accbaru on assig.f_id_debitur=accbaru.f_id JOIN t_agent as agent on agent.f_agentid=assig.f_agent WHERE assig.f_status >='1'";
        $data = $this->db2->query($query);
        return $data->result();
//        $this->session->userdata('username');
    }

    public function assign_dibutur($id, $agent) {
        foreach ($id as $item) {
            $query = "SELECT * FROM `t_accountlist_baru` WHERE f_id = '" . $item . "'";
            $b = $this->db2->query($query)->row();
            $iddeb = $b->f_id;
            $cif = $b->f_cif;
            $loan = $b->f_loanid;
//            echo $loan;
            $querycek = "SELECT * FROM t_assignment WHERE f_loanid = '" . $loan . "'";
            if ($querycek !=null ) {
                $queryassign = "INSERT INTO `t_assignment`(`f_id_debitur`,"
                        . " `f_cif`, f_loanid ,`f_agent`,"
                        . "`f_user_create`, `f_date_cerate`) VALUES ('" . $iddeb . "','" . $cif . "','" . $loan . "','" . $agent . "','" . $this->session->userdata('username') . "','" . date('Y-m-d') . "')";
                $insert = $this->db2->query($queryassign);
                if ($insert === TRUE) {
//                return 'success';
                    $assignid = "SELECT * FROM `t_assignment` WHERE `f_id_debitur` = '" . $item . "' AND f_status = '' AND f_agent = '" . $agent . "'";
                    $idassign = $this->db2->query($assignid)->row();
                    $updatedebit = "UPDATE `t_accountlist_baru` SET `f_assign_id` = '" . $idassign->f_agent . "' , `f_status` ='1' WHERE f_id = '" . $item . "'";
                    $success = $this->db2->query($updatedebit);
                    if ($success === TRUE) {
                        $updateassign = "UPDATE `t_assignment` SET `f_status` = '1' WHERE f_agent = '" . $agent . "'";
                        $c = $this->db2->query($updateassign);
                    } else {
//                  echo 'gagagal';
                        return 0;
                    }
                } else {
//                echo 'gagal';
                    return 0;
                }
            } else {
                return 2;    
            }
        }
        return 1;
    }

    public function get_tgh_list2() {
        $query = "SELECT t_accountlist_baru.* ,t_pelunasandetail.*, t_kunjungan.f_actionplan, t_kunjungan.f_date_actionplan, t_kunjungan.f_nominal_pelunasan , t_lelang.* , t_lelang.f_no_tlp_pembeli FROM `t_accountlist_baru` JOIN t_pelunasandetail ON (t_accountlist_baru.f_loanid = t_pelunasandetail.f_loanid)  JOIN t_kunjungan ON (t_kunjungan.f_loanid = t_accountlist_baru.f_loanid) JOIN t_lelang ON (t_kunjungan.f_loanid = t_lelang.f_loanid) WHERE t_kunjungan.f_actionplan_status = '1'";
        $data = $this->db2->query($query);
        return $data->result();
    }

    public function update_plunasan1($param0, $param1, $param2, $param3, $param4) {
        $query0 = "SELECT * FROM `t_pelunasandetail` WHERE f_cif = '" . $param0 . "'";
        $numrow = $this->db2->query($query0)->num_rows();
        if ($numrow > 0) {
            $query1 = "UPDATE `t_pelunasandetail` SET `f_validasi_telpon` = '" . $param1 . "',`f_validasi_plunasan` = '" . $param2 . "',`f_fc_visit` = '" . $param3 . "',`f_validitas` = '" . $param4 . "' WHERE f_cif = '" . $param0 . "' ";
            $update1 = $this->db2->query($query1);
            if ($update1 === TRUE) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $query2 = "INSERT INTO `t_pelunasandetail`("
                    . "`f_cif`, "
                    . "`f_validasi_telpon`, "
                    . "`f_validasi_plunasan`,"
                    . "`f_fc_visit`, "
                    . "`f_validitas`) "
                    . "VALUES ('" . $param0 . "','" . $param1 . "','" . $param2 . "','" . $param3 . "','" . $param4 . "')";

            $insert1 = $this->db2->query($query2);
            if ($insert1 === TRUE) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function location() {

        $query1 = "SELECT `f_id`, `f_agentid`, `f_lat`, f_lng FROM t_kunjungan ORDER BY f_id ASC LIMIT 0,3";
        $select = $this->db2->query($query1)->result();
        return $select;
    }
    public function getparamsp(){
        $queryselect = "SELECT * FROM `t_parameter` WHERE f_type = 'SP'";
        return $this->db2->query($queryselect)->result();
    }
    public function getpproduk(){
         $queryselect = "SELECT a.ID,a.LD_CATEG,a.DESCRIPTION,b.SHORT_NAME from  bss_ld_sub_product AS a join bss_category AS b on a.LD_CATEG = b.ID order by b.ID desc";
        return $this->db2->query($queryselect)->result();
    }
    public function gagal_input() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Data Gagal Di Input',
              'Gagal'
            )</script>"
        );
    }
    public function inputsp($jsp,$prd,$mindpd,$masa){
        if ($mindpd ==null) {
          
          $this->gagal_input();
          redirect('content/read_sp_administration');
        }else{

        $jsp1 = explode("|", $jsp, 2);
        $prd1 = explode("|", $prd, 2);
        $insert = "INSERT INTO `t_param_sp`(`f_sp_code`, `f_sp`, `f_produk_id`, `f_produk`, `f_min_dpd`, `f_masa`, f_status) VALUES ('".$jsp1[0]."','".$jsp1[1]."','".$prd1[0]."','".$prd1[1]."','".$mindpd."','".$masa."','1')";
        }
        if($this->db2->query($insert) === TRUE){
            return 1;
        } else{
            return 0;
        }
    }
       public function create_mntr_lelang_process($data) {
        $this->db2->insert('t_lelang', $data);
        $this->db2->error();
    }
    public function updatetsp(){
         $jsp1 = explode("|", $jsp, 2);
        $prd1 = explode("|", $prd, 2);
        $insert = "UPDATE `t_param_sp` SET `f_sp_code`='".$jsp1[0]."',`f_sp`='".$jsp1[1]."',`f_produk_id`='".$prd1[0]."',`f_produk`='".$prd1[1]."',`f_min_dpd`='".$mindpd."',`f_masa`='".$masa."'WHERE f_id = ''";
        
        if($this->db2->query($insert) === TRUE){
            return 1;
        } else{
            return 0;
        }
    }

    public function getsp(){
        $getsp = "SELECT * FROM `t_param_sp`";
        return $this->db2->query($getsp)->result();
    }


////////////////////// update 08 04 2019
    public function insertsysproces($sysname, $string, $string1, $string2, $integer, $decimal) {
        if(empty($sysname)){
            return 2;
        } else {
        $q1 = "SELECT * FROM t_sysprocess";
        $id = $this->db2->query($q1)->num_rows;
        $id1 = 'A0' . $id;
        $data = array(
            'f_id' => $id1,
            'f_sysname' => $sysname,
            'f_string' => $string,
            'f_string1' => $string1,
            'f_string2' => $string2,
            'f_integer' => $integer,
            'f_decimal' => $decimal
        );

        $insert = $this->db2->insert('t_sysprocess', $data);
        if ($insert === TRUE) {
            return 1;
        } else {
            return 0;
        }
        }
    }

    public function updatesysprocess($id, $sysname, $string, $string1, $string2, $integer, $decimal) {
//        $data = array(
//            'f_sysname' => $sysname,
//            'f_string' => $string,
//            'f_string1' => $string1,
//            'f_string2' => $string2,
//            'f_integer' => $integer,
//            'f_decimal' => $decimal
//        );
        $query1 ="UPDATE `t_sysprocess` SET`f_sysname`='".$sysname."',`f_string`='".$string."',`f_string1`='".$string1."',`f_string2`='".$string2."',`f_integer`='".$integer."',`f_decimal`='".$decimal."' WHERE f_id = '".$id."'";
//        $this->db->where('f_id', $id);
//        $insert = $this->db2->update('t_sysprocess', $data);
//        return $id;
        $update = $this->db2->query($query1);
        if ($update === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public function deletesysprocess($selected) {
        if (empty($selected)) {
            return 2;
        } else {
        foreach ($selected as $item) {
            $this->db2->where('f_id', $item);
            $delete = $this->db2->delete('t_sysprocess');
        }
        if ($delete === TRUE) {
            return 1;
        } else {
            return 0;
        }
        }
    }

     public function location2($agent,$tglvisit) {
        $query1 = "SELECT `f_id`, `f_agentid`, `f_lat`, f_lng FROM t_kunjungan WHERE f_agentid = '".$agent."' AND f_tgl_visit = '".$tglvisit."' ";
        $select = $this->db2->query($query1)->result();
        return $select;
    }
    
    // public function schprocess() {
    //     $syspro = $this->db2->get('t_schprocess');
    //     return $syspro->result();
    // }
    
    public function schprocess() {
        $syspro = $this->db2->get('t_schprocess');
        return $syspro->result();
    }
    public function schprocess_edit($id) {
        $this->db2->where('f_processid',$id);
        $syspro = $this->db2->get('t_schprocess');
        return $syspro->row();
    }
    
    public function insertschproces($processname, $programtype, $timestart, $maxrun, $counterrun, $timestop,$statusdone,$active) {
        if(empty($processname)){
            return 2;
        } else {
        $data = array(
            'f_processname' => $processname,
            'f_progtype' => $programtype,
            'f_timestart' => $timestart,
            'f_maxrun' => $maxrun,
            'f_countrun' => $counterrun,
            'f_timestop' => $timestop,
            'f_stsdone' => $statusdone,
            'f_active' => $active
        );

        $insert = $this->db2->insert('t_schprocess', $data);
        if ($insert === TRUE) {
            return 1;
        } else {
            return 0;
        }
        }
    }

    
    public function updateschprocess($id, $processname, $programtype, $timestart, $maxrun, $counterrun, $timestop,$statusdone,$active) {
//        $data = array(
//            'f_sysname' => $sysname,
//            'f_string' => $string,
//            'f_string1' => $string1,
//            'f_string2' => $string2,
//            'f_integer' => $integer,
//            'f_decimal' => $decimal
//        );
        $query1 ="UPDATE `t_schprocess` SET`f_processname`='".$processname."',`f_progtype`='".$programtype."',`f_timestart`='".$timestart."',`f_maxrun`='".$maxrun."',`f_countrun`='".$counterrun."',`f_timestop`='".$timestop."',`f_stsdone`='".$statusdone."',`f_active`='".$active."' WHERE f_processid = '".$id."'";
//        $this->db->where('f_id', $id);
//        $insert = $this->db2->update('t_sysprocess', $data);
//        return $id;
        $update = $this->db2->query($query1);
        if ($update === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

   
    public function deleteschprocess($selected) {
        if(empty($selected)){
            return 2;
        } else {
        foreach ($selected as $item) {
            $this->db2->where('f_processid', $item);
            $delete = $this->db2->delete('t_schprocess');
        }
        if ($delete === TRUE) {
            return 1;
        } else {
            return 0;
        }
        }
    }

}
