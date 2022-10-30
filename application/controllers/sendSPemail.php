<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class sendSPemail extends CI_Controller {

    public function __construct() {
        parent::__construct();


//        $this->load->library('pdf');

        /* CONNECT 2 DATABASE */

		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

       /*  if ($_SERVER['SERVER_NAME'] == 'localhost:8080') {
            $dsn1 = 'mysqli://root:@localhost/dbmgmtmenu';
            $this->db = $this->load->database($dsn1, true);

            $dsn2 = 'mysqli://root:@localhost/dbbsscollection';
            $this->db2 = $this->load->database($dsn2, true);
        } else {
            $dsn1 = 'mysqli://xplmjdmx_4nagata:4N4G4T49876@localhost/xplmjdmx_mgmtmenu';
            $this->db = $this->load->database($dsn1, true);

            $dsn2 = 'mysqli://xplmjdmx_4nagata:4N4G4T49876@localhost/xplmjdmx_dbcollection';
            $this->db2 = $this->load->database($dsn2, true);
        }
 */





//        $dsn3 = 'mysqli://root:@localhost/kspkss';
//        $this->db3= $this->load->database($dsn3, true);         
        /* CONNECT 2 DATABASE */

        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
    }

    public function SPemail($value = '') {
        //var_dump($id,$status);  
        if ($this->session->has_userdata('username')) {
            $this->load->library('email');
            //$sp = $this->getSPaccount();

            $config = array(
                'charset' => 'utf-8',
                'useragent' => 'Codeigniter',
                'protocol' => "smtp",
                'mailtype' => "html",
                'smtp_host' => "mail.anagata.co.id",
                'smtp_port' => '587',
                'smtp_user' => "djamal@anagata.co.id",
                'smtp_pass' => 'Jamal123456789',
                'smtp_crypto' => 'tls',
                'crlf' => "\r\n",
                'newline' => "\r\n"
            );

            // if ($sp !=null) {

            $data = $this->db2->query("CALL accountlist");
            foreach ($data->result() as $key) {

                $a = array(
                    $key->f_email
                );

                //      foreach($data as $row =>$value) {
                // $toemail[]=$value['f_email'];  
                // print_r($toemail); 
                //$test = array('nama' => $id);
                //$mesg = $this->load->view('table_aproveAgent',$test,true);
                //foreach($penunggak as $row){ 
                $this->email->initialize($config);
                $this->email->clear(TRUE);
                $this->email->to($key->f_email);
                $this->email->from('djamal@anagata.co.id', 'djamal@anagata.co.id');
                $this->email->subject('Permintaan Approvel');
                $string = $this->email->message('hy pak david');
                $this->email->send();
                // return TRUE;
            }
            //}
            //redirect('/');    
        }
    }

}
