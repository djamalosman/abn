<?php

/* * To change this license header, choose License Headers in Project Properties. * To change this template file, choose Tools | Templates * and open the template in the editor. */

class Modelreguler extends CI_Model {

    public function get_reguler() {
        $data = "SELECT COUNT(a.f_cif) as jmlh_recod,max(a.f_tgl_visit)as tgl_terakhirkunjungan ,a.* FROM t_kunjungan as a where 
		a.f_actionplan like '%pelunasan%'  
		GROUP by a.f_cif order by a.f_id desc ";
        return $this->db2->query($data)->result();
    }

    public function inputdata($cif, $status, $code, $sumberdana, $namapmbdana, $nominal, $notlp, $tanggal, $nominalplan, $idkj) {
        $data = array(
            'f_cif' => $cif,
            'f_idkj' => $idkj,
            'f_code_file' => $code,
            'f_status_plan' => $status,
            'f_methode' => $sumberdana,
            'f_nama_pd' => $namapmbdana,
            'f_no_tlp_pd' => $notlp,
            'f_nominal_pd' => $nominal,
            'f_nominal_plan' => $nominalplan,
            'f_tgl' => $tanggal
        );
        $insert = $this->db2->insert('t_plan_plunasan', $data);
        if ($insert == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update($cif, $idkj, $status, $sumberdana, $namapmbdana, $nominal, $notlp, $tanggal) {
        $data = array(
            'f_status_plan' => $status,
            'f_methode' => $sumberdana,
            'f_nama_pd' => $namapmbdana,
            'f_no_tlp_pd' => $notlp,
            'f_nominal_pd' => $nominal,
            'f_tgl' => $tanggal
        );
        $this->db2->where('f_cif', $cif);
        $this->db2->where('f_idkj', $idkj);
        $insert = $this->db2->update('t_plan_plunasan', $data);
        if ($insert == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public function sendimage($data) {

        $input = $this->db2->insert_batch('t_image', $data);
        if ($input == TRUE) {
            return 1;
        } else {
            return 0;
        }
//        echo var_dump($data);
    }

    public function sendimage2($data) {

        $input = $this->db2->insert('t_image', $data);
        if ($input == TRUE) {
            return 1;
        } else {
            return 0;
        }
//        echo var_dump($data);
    }

    public function get_hasil_visit($cif, $idkj) {
        $select = "select * from t_kunjungan where f_cif = '" . $cif . "' AND f_id = '" . $idkj . "' ";
        $select1 = $this->db2->query($select)->row();
        return $select1;
    }

    public function get_hasil_pp($cif, $idkj) {
        $select = "select * from t_plan_plunasan where f_cif = '" . $cif . "' AND f_idkj = '" . $idkj . "' ";
        $select1['data'] = $this->db2->query($select)->row();
        $select1['numrow'] = $this->db2->query($select)->num_rows();
        return $select1;
    }

    public function get_imagevisit($cif, $idkj) {
        $select = "select * from t_image as a JOIN t_kunjungan as b on b.f_code_image = a.f_code where b.f_cif = '" . $cif . "' AND b.f_id = '" . $idkj . "'";
        $select1 = $this->db2->query($select)->result_array();
        return $select1;
    }

    public function get_pp($cif, $idkj) {
        $select = "select * from t_image as a JOIN t_plan_plunasan as b on b.f_code_file = a.f_code where b.f_cif = '" . $cif . "' AND b.f_idkj = '" . $idkj . "'";
        $select1 = $this->db2->query($select)->result_array();
        return $select1;
    }

    public function deleteimage($selection) {
        foreach ($selection as $a) {
            $this->db2->where('f_id', $a);
            $delete = $this->db2->delete('t_image');
        }
        if ($delete == true) {
            return 1;
        } else {
            return 0;
        }
    }

}
