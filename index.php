<?php 

include "getdata.php";
include "user.php";

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
	$status = $_POST['status'];
	echo $member->daftar($nama,$email,$password,$status);
}


else if(isset($_GET['api']) and $_GET['api']  == "pesan")
	{
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$status = $_POST['status'];
	echo $member->daftar($nama,$email,$password,$status);
}

else if(isset($_GET['api']) and $_GET['api']  == "history" and $_GET['id'] != null and isset($_GET['id']))
	{
		
	echo $bis->getId($_GET['id'],"id_user","pesanan");
}





?>