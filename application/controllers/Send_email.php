<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index() {
//        $ci = get_instance();
//        $ci->load->library('email');
//        $config['protocol'] = "smtp";
//        $config['smtp_host'] = "ssl://smtp.gmail.com";
//        $config['smtp_port'] = "465";
//        $config['smtp_user'] = "m.dwiyan.hartono@gmail.com";
//        $config['smtp_pass'] = "dwi170897";
//        $config['smtp_timeout'] = '100';
//        $config['charset'] = "utf-8";
//        $config['mailtype'] = "html";
//        $config['newline'] = "\r\n";
//
//
//        $ci->email->initialize($config);
//
//        $ci->email->from('m.dwiyan.hartono@gmail.com', 'Your Name');
//        $list = array('dahelyasinta11@gmail.com');
//        $ci->email->to($list);
//        $ci->email->subject('judul email');
//        $ci->email->message('isi email');
//        if ($this->email->send()) {
//            echo 'Email sent.';
//        } else {
//            show_error($this->email->print_debugger());
//        }
        // Konfigurasi email
        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'protocol' => 'smtp.banksampoerna.com',
            'smtp_host' => 'banksampoerna.com',
            'smtp_user' => 'collection', 
            'smtp_pass' => 'Sahabat12', 
            'smtp_port' => '25',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('collection@banksampoerna.com', 'C24system.com | system');

        // Email penerima
        $this->email->to('dwiyan@anagata.co.id'); // Ganti dengan email tujuan kamu
        // Lampiran email, isi dengan url/path file
        //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Aproved | MasRud.com');
        $test = array('nama' => 'Dwiyan');
        $mesg = $this->load->view('table_aproveAgent', $test, true);
        // Isi email
        $this->email->message($mesg);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim  '.$this->email->print_debugger();
        }
    }

}
