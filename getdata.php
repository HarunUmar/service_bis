<?php 

include "database.php";

class getData extends database{

	public function __construct(){
		parent::__construct();
	}

	public function satuTable($table){
			
			$query = mysql_query("SELECT * FROM $table");
			while($data=mysql_fetch_assoc($query)){
				$hasil[]=$data;
			}
			$response= $hasil;
			return json_encode($response);
	}

	public function duaTable() {

	}

	public function tigaTable(){
	}

	public function getId($id,$id_tabel,$table){
		$query = mysql_query("select * from $table where $id_tabel = $id");
		$response[] = mysql_fetch_assoc($query);
			return json_encode($response);	
	}



}
?>