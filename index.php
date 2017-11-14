<?php 

include "getdata.php";
include "user.php";
include "pesanan.php";

$member  = new User;
$bis = new getdata;

if(isset($_GET['api']) and $_GET['api']  == "tampil_kategori")
	{
	
	echo $bis->satuTable('kategori');
}


else if(isset($_GET['api']) and $_GET['api']  == "login")
	{
	$email = $_POST['email'];
	$password = $_POST['password'];
	echo $member->login($email,$password);
}

else if(isset($_GET['api']) and $_GET['api']  == "daftar")
	{
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$no_hp = $_POST['no_hp'];
	$status = "1";
	echo $member->daftar($nama,$email,$no_hp,$password,$status);
}
else if(isset($_GET['api']) and $_GET['api']  == "history" and $_GET['id'] != null and isset($_GET['id']))
	{
		
	echo $bis->getId($_GET['id'],"id_user","pesanan");
}

else if(isset($_GET['api']) and $_GET['api']  == "user" and $_GET['id'] != null and isset($_GET['id']))
	{
		
		echo $bis->getInfo($_GET['id'],"id_user","pesanan");
}
else if(isset($_GET['api']) and $_GET['api']  == "pesan")
	{
	pesanan::$id_kategori = $_POST['id_kategori'];
	pesanan::$id_user  = $_POST['id_user'];
	pesanan::$id_kendaraan  = $_POST['id_kendaraan'];
	pesanan::$no_kursi  = $_POST['no_kursi'];
	pesanan::$ket  = $_POST['ket'];
	pesanan::$waktu_berangkat  = $_POST['waktu_berangkat'];
	pesanan::$tgl_pesanan  = $_POST['tgl_pesanan'];
	pesanan::$status_pembayaran  = $_POST['status_pembayaran'];
	echo pesanan::Store();
}

?>