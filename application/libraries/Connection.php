<?php

	function index() {
		if($_SERVER['SERVER_NAME'] == 'anagata.co.id'){
				 $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
				 $this->db = $this->load->database($dsn1, true);     
				 $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
				 $this->db2= $this->load->database($dsn2, true);
			 } else {  
				 $dsn1 = 'mysqli://root:@localhost/dbmgmtmenu';
				 $this->db = $this->load->database($dsn1, true);     
				 $dsn2 = 'mysqli://root:@localhost/dbbsscollection';
				 $this->db2= $this->load->database($dsn2, true);         
			 }
	}	
 