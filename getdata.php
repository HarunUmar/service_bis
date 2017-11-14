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

	
	public function getId($id,$id_tabel,$table){
		$query = mysql_query("select * from $table where $id_tabel = $id");
		$response[] = mysql_fetch_assoc($query);
			return json_encode($response);	
	}

	public function getInfo($id,$id_tabel,$table){
		$query = mysql_query("SELECT pesanan.`id_pesanan`, user.`nama`,kategori.`jalur` AS jurusan,kendaraan.`nama` AS kendaraan, pesanan.`no_kursi`,pesanan.`waktu_berangkat`, pesanan.`tgl_pesanan`, CASE WHEN  pesanan.`status_pembayaran` = '1' THEN 'lunas' ELSE 'pending' END AS status FROM pesanan INNER JOIN user ON pesanan.`id_user` = user.`id_user` INNER JOIN kategori ON pesanan.`id_kategori` = kategori.`id_kategori` INNER JOIN kendaraan ON pesanan.`id_kendaraan` = kendaraan.`id_kendaraan` WHERE pesanan.`id_user`=  $id");
			while ($data = mysql_fetch_assoc($query)) {
					$hasil[] = $data;
			}
			$response = $hasil;
			return json_encode($response);

	}

}
?>