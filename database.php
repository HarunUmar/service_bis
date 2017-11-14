<?php 

	class database{
		
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $db = "bis";

	public function __construct(){

		$koneksi = mysql_connect($this->host,$this->user,$this->pass);
		$db = mysql_select_db($this->db);

		if(!$db){
			echo "terjadi kesalahan db";
		}
	}
			
	}


?>