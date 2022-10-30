<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Sendemailphpmailer extends CI_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index() {


        $this->load->library("phpmailer_library");
        $mail = $this->phpmailer_library->load();

       // $mail = new PHPMailer();
	   	$mail->IsSMTP();
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.banksampoerna.com";
		$mail->Port = 25; // or 587
		$mail->IsHTML(true);
		$mail->Username = "collection@banksampoerna.com";
		$mail->Password = "Sahabat12";
        $mail->IsHTML(true);
        $mail->SetFrom('collection@banksampoerna.com');
        $mail->AddReplyTo('dwiyan@anagata.co.id'); //set from & reply-to headers
        $mail->AddAddress('dwiyan@anagata.co.id'); //set destination address

        $mail->Subject = "some subject"; //set subject
        $mail->Body = "some body HTML <br/><br/>"; //set body content

        //$mail->AddAttachment('filepath', 'filename'); //attach file

        $mail->AltBody = "Can't see this message? Please view in HTML\n\n";
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
        
        //$mail->Send();
    }

}
