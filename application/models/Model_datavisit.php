<?php

class Model_datavisit extends CI_Model {

    public function get_dt_visit() {

	$select = "SELECT (SELECT b.f_agentname from t_agent as b where b.f_agentid = a.f_agentid) as agent,a.* FROM t_kunjungan as a order by a.f_id Desc";
        $data = $this->db2->query($select);

        return $data->result();
    }

    public function get_foto_visit($codeimage) {
        $query = "SELECT a.* from t_image as a  WHERE  a.f_code='" . $codeimage . "'";
        $data1 = $this->db2->query($query);
        return $data1->result();
    }

    public function get_detail_visit($value) {
        // $data = $this->db2->where('t_kunjungan',$value);
        // $data = $this->db2->get('t_kunjungan');
        $query = "SELECT 
				  a.f_tujuan,
				  a.f_nama_nasabah,
				  a.f_cif,
				  a.f_hasilkunjungan,
				  a.f_keterangan_hasilkunjungan,
				  a.f_tanggal_ptp,
				  a.f_bertemu,
				  a.f_lokasibertemu,
				  a.f_keterangan_lokasi,
				  a.f_karakter,
				  a.f_keterangan_karakter,
				  a.f_negatif_issue,
				  a.f_actionplan,
				  a.f_resumenasabah,
				  a.f_total_tunggakan,
				  a.f_total_bayar,
				  a.f_perkiraan,
				  a.f_tgl_visit
				  from t_kunjungan AS a  WHERE a.f_id='".$value."'";
        $data1 = $this->db2->query($query);
        return $data1->row();
    }

	
	
	public function get_dt_visit2($cif) {

	$select = "SELECT (SELECT b.f_agentname from t_agent as b where b.f_agentid = a.f_agentid) as agent,a.* FROM t_kunjungan as a where a.f_cif = '".$cif."' order by a.f_id Desc";
        $data = $this->db2->query($select);

        return $data->result();
    }
}
