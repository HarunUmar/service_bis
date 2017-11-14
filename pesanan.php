<?php 
include_once "database.php";
/**
*  

*/
class Pesanan extends Database
{
	public static $id_kategori;
	public static $id_user;
	public static $id_kendaraan;
	public static $no_kursi;
	public static $ket;
	public static $waktu_berangkat;
	public static $tgl_pesanan;
	public static $status_pembayaran;
	
	
	public function __construct()
	{
		parent::__construct();
	}


	public function Store(){
	
	$id_kategori = self::$id_kategori;
	$id_user = self::$id_user;
	$id_kendaraan = self::$id_kendaraan;
	$no_kursi = self::$no_kursi;
	$ket = self::$ket;
	$waktu_berangkat = self::$waktu_berangkat;
	$tgl_pesanan = self::$tgl_pesanan;
	$status_pembayaran = self::$status_pembayaran;

	$query = 'INSERT INTO pesanan VALUES("","'.$id_kategori.'","'.$id_user.'","'.$id_kendaraan.'","'.$no_kursi.'","'.$ket.'","'.$waktu_berangkat.'","'.$tgl_pesanan.'","0")';
		$hasil = mysql_query($query);
		if($hasil) {
			$response = array('success' => 1,
							  'pesan' =>'pesanan berhasil');
			return json_encode($response);
		}
		else {
			$response = array('success' => 0,
							  'pesan' =>'pesanan gagal');

			return json_encode($response);
		}

	}


}



?>