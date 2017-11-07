<?php 

	class database{
		
	private $host = "localhost";
	private $user = "tarsiust_bsc";
	private $pass = "bsc010203";
	private $db = "tarsiust_bis";

	public function __construct(){

		$koneksi = mysql_connect($this->host,$this->user,$this->pass);
		$db = mysql_select_db($this->db);

		if(!$db){
			echo "terjadi kesalahan db";
		}
	}
			
	}


?>