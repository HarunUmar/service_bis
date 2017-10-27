<?php 


include "database.php";


class User extends database{

private $acak = "HARUNUMARAZXCNVKSKIJDIJSIDJ";

public function __construct(){
		parent::__construct();
	}


public function daftar($nama,$email,$pass,$status){


		if(empty($nama or $email or $pass or $status)){

				$response = array(
						'success' => '0',
						'pesan'	=>'tidak boleh kosong');

				return json_encode($response);

		}
	
		$password = md5($this->acak. md5($pass) . $this->acak );

		$query= mysql_query("INSERT INTO user VALUES('','$nama','$email','$password','$status')");

		if($query){

			$response = array(
						'success' => '1',
						'pesan'	=>'pendaftaran berhasil');

			return json_encode($response);
		}
		else {


			$response = array(
						'success' => '0',
						'pesan'	=>'terjadi kesalahan');

			return json_encode($response);
		}


}

public function login ($email, $pass){



	$query = mysql_query("SELECT * FROM user WHERE email='$email'");
				
		if($query) {
	
			$row = mysql_fetch_row($query);
			if (md5($this->acak . md5($pass) . $this->acak) == $row[3]) {

					$response = array(
						'success' => '1',
						'pesan'	=> 'Login sukses'
						);
					return json_encode($response);
				}
			
			else {

					$response = array(
						'success' => '0',
						'pesan'	=> 'email atau password salah'
						);
				     return json_encode($response);
			}
		}

		else {

			$response = array(
						'success' => '0',
						'pesan'	=> 'gagal login terjadi kesalahan'
						);
			return json_encode($response);

		}



	}



}

$member  = new User;


if(isset($_GET['login'])){

	$email = $_POST['email'];
	$password = $_POST['password'];
	echo $member->login($email,$password);
}

else if(isset($_GET['daftar'])){

	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$status = $_POST['status'];


	echo $member->daftar($nama,$email,$password,$status);
}






?>