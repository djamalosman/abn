<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Setting_model extends CI_Model{
    
    public function get_setting_schedulers(){
        $data = $this->db2->get('t_schedulers');
        return $data->result();
    }
    
    public function get_setting_scheduler_one($id){
        $this->db2->where('f_id', $id);
        $data = $this->db2->get('t_schedulers');
        return $data->row();
    }
    
    public function delete_multi_setting_scheduler($id){
        foreach ($id as $item){
            $this->db2->where('f_id', $item);
            $this->db2->delete('t_schedulers');
        }
    }
    
    public function create_setting_scheduler_process($f_id, $f_progId, $f_startingdate, $f_startingtime, $f_refreshcounter, $f_finishtime, $f_status, $f_note){
        $data = array(
            'f_id' => $f_id,
            'f_progId' => $f_progId,
            'f_startingdate' => $f_startingdate,
            'f_startingtime' => $f_startingtime,
            'f_refreshcounter' => $f_refreshcounter,
            'f_finishtime' => $f_finishtime,
            'f_status' => $f_status,
            'f_note' => $f_note
        );
        
        $this->db2->insert('t_schedulers', $data);
    }
    
    public function update_setting_scheduler_process($f_id, $f_progId, $f_startingdate, $f_startingtime, $f_refreshcounter, $f_finishtime, $f_status, $f_note){
        $data = array(
            'f_id' => $f_id,
            'f_progId' => $f_progId,
            'f_startingdate' => $f_startingdate,
            'f_startingtime' => $f_startingtime,
            'f_refreshcounter' => $f_refreshcounter,
            'f_finishtime' => $f_finishtime,
            'f_status' => $f_status,
            'f_note' => $f_note
        );
        
        $this->db2->where('f_id', $f_id);
        $this->db2->update('t_schedulers', $data);
    }
}