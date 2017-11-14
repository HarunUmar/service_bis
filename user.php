<?php 

include_once "database.php";
class User extends database {

private $acak = "HARUNUMARAZXCNVKSKIJDIJSIDJ";

public function __construct(){
		parent::__construct();
	}


public function daftar($nama,$email,$no_hp,$pass,$status){


		if(empty($nama or $email or $pass or $status)){

				$response = array(
						'success' => '0',
						'pesan'	=>'tidak boleh kosong');

				return json_encode($response);

		}
	
		$password = md5($this->acak. md5($pass) . $this->acak );

		$query= mysql_query("INSERT INTO user VALUES('','$nama','$email','$no_hp','$password','$status')");

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
			if (md5($this->acak . md5($pass) . $this->acak) == $row[4]) {

					$response = array(
						'id_user' =>$row[0],
						'nama' =>$row[1],
						'email' =>$row[2],
						'success' => 1,
						'pesan'	=> 'Login sukses'
						);
					return json_encode($response);
				}
			
			else {

					$response = array(
						'success' => 0,
						'pesan'	=> 'email atau password salah'
						);
				     return json_encode($response);
			}
		}

		else {

			$response = array(
						'success' => 0,
						'pesan'	=> 'gagal login terjadi kesalahan'
						);
			return json_encode($response);

		}



	}



}



?>