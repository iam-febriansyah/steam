<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();

        date_default_timezone_set('Asia/Jakarta');
        $now=date('Y-m-d H:i:s');
        $this->load->helper('tgl_indo');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Model_api');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

        // if($this->session->userdata('status') != "login"){
        

	}
	
	public function getData()
	{
        //$id_user = $this->input->get('id_user');
        $rows = $this->Model_api->Get_users(" ")->result_array();
		if(COUNT($rows) > 0){
			foreach($rows as $row){
				$data[] = array(
					'status'	=> 'true',
					'id_user'	=> $row['id_user'],
					'username'	=> $row['username'],
					'password'	=> $row['password'],
					'level'		=> $row['level'],
					'nama'		=> $row['nama'],
					'no_ktp'	=> $row['no_ktp'],
					'no_telp'	=> $row['no_telp'],
				);
			}
		}else{
			$data[] = array(
				'status'	=> 'false',
				'id_user'	=> '',
				'username'	=> '',
				'password'	=> '',
				'level'		=> '',
				'nama'		=> '',
				'no_ktp'	=> '',
				'no_telp'	=> '',
			);
		}	
		echo json_encode($data);
    }
	
    public function do_action()
	{
        $username = addslashes($this->input->post('username'));
        $password = addslashes($this->input->post('password'));
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->Model_api->cek_login("tbl_user", $where)->num_rows();
		if($cek > 0){ 
			$row = $this->Model_api->Get_users(" WHERE username = '".$username."' ")->result_array();
			$data = array(
				'status'	=> 'true',
				'id_user'	=> $row[0]['id_user'],
				'username'	=> $row[0]['username'],
				'password'	=> $row[0]['password'],
				'level'		=> $row[0]['level'],
				'nama'		=> $row[0]['nama'],
				'no_ktp'	=> $row[0]['no_ktp'],
				'no_telp'	=> $row[0]['no_telp'],
			);
			echo json_encode($data);
 
		}else{
			$data = array(
				'status'	=> 'false',
				'id_user'	=> '',
				'username'	=> '',
				'password'	=> '',
				'level'		=> '',
				'nama'		=> '',
				'no_ktp'	=> '',
				'no_telp'	=> '',
			);
			echo json_encode($data);
		}
    }
	
	public function do_otp()
	{
		$nohp = addslashes($this->input->post('no_telp'));
		$chary = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		$return_str = "";
		for ( $x=0; $x<=3; $x++ ) {
			$return_str .= $chary[rand(0, count($chary)-1)];
		}
		
		$row = $this->Model_api->Get_users(" WHERE no_telp = '".$nohp."' Order by id_user desc LIMIT 1")->result_array();
		if(COUNT($row) < 0){
			$dataInsert=array( 
				'username'  => $nohp,
				'no_telp'   => $nohp,
				'level'		=> 'Pelanggan',
				'otp'		=> $return_str
			);    
			$this->Model_api->InsertData('tbl_user', $dataInsert);
			
			$getID = $this->Model_api->Get_users(" WHERE no_telp = '".$nohp."' Order by id_user desc LIMIT 1 ")->result_array();
		
			$data = array(
				'status'	=> 'true',
				'username'	=> $nohp,
				'id_user'	=> $getID[0]['id_user'],
			);
		}else{
			$dataUpdate=array( 
				'otp'		=> $return_str
			);    
			$this->Model_api->UpdateData('tbl_user', $dataUpdate, array('no_telp' => $nohp));
			$data = array(
				'status'	=> 'true',
				'username'	=> $nohp,
				'id_user'	=> $row[0]['id_user'],
			);
		}
		
		$userkey="abynet"; // userkey di SMS Notifikasi //
		$passkey="abynet313"; // passkey di SMS Notifikasi //

		$message="OTP ".$return_str ;
		$url = "http://reguler.sms-notifikasi.com/apps/smsapi.php"; $curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "userkey=".$userkey."&passkey=".$passkey."&nohp=".$nohp.
		"&pesan=".urlencode($message));
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		$results = curl_exec($curlHandle);
		curl_close($curlHandle);

		echo json_encode($data);
		
        // 
        
		
    }
	
	public function do_timeout()
	{
		$nohp = addslashes($this->input->post('no_telp'));
		$dataUpdate=array( 
			'otp'		=> 0
		);    
		$this->Model_api->UpdateData('tbl_user', $dataUpdate, array('no_telp' => $nohp));
		$data = array(
			'status'	=> 'true',
		);
		echo json_encode($data);
    }
	
	public function do_confirm_otp()
	{
		$no_telp = addslashes($this->input->post('no_telp'));
		$otp = addslashes($this->input->post('otp'));
		$row = $this->Model_api->Get_users(" WHERE no_telp = '".$no_telp."' AND otp = '".$otp."' Order by id_user desc LIMIT 1")->result_array();
		
		if(COUNT($row) > 0){
			$dataUpdate=array( 
				'otp'		=> 0
			);    
			$this->Model_api->UpdateData('tbl_user', $dataUpdate, array('no_telp' => $no_telp));
			$data = array(
				'status'	=> 'true',
				'id_user'	=> $row[0]['id_user'],
				'username'	=> $row[0]['username'],
				'password'	=> $row[0]['password'],
				'level'		=> $row[0]['level'],
				'nama'		=> $row[0]['nama'],
				'no_ktp'	=> $row[0]['no_ktp'],
				'no_telp'	=> $row[0]['no_telp'],
			);
		}else{
			$data = array(
				'status'	=> 'false',
				'id_user'	=> '',
				'username'	=> '',
				'password'	=> '',
				'level'		=> '',
				'nama'		=> '',
				'no_ktp'	=> '',
				'no_telp'	=> '',
			);
		}
		echo json_encode($data);
    }
	
	public function do_reg()
	{
        $username = addslashes($this->input->post('username'));
        $password = addslashes($this->input->post('password'));
        $no_telp = addslashes($this->input->post('no_telp'));
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->Model_api->Get_users(" WHERE username = '".$username."' ")->result_array();
		if(COUNT($cek) == 0){ 
			$dataInsert=array( 
				'username'  => $username,
				'password'  => $password,
				'no_telp'   => $no_telp,
				'level'		=> 'Pelanggan'
			);    
			$this->Model_api->InsertData('tbl_user', $dataInsert);
			
			$getID = $this->Model_api->Get_users(" WHERE username = '".$username."' Order by id_user desc LIMIT 1 ")->result_array();
			$data = array(
				'status'	=> 'true',
				'username'	=> $username,
				'id_user'	=> $getID[0]['id_user'],
			);
			echo json_encode($data);
 
		}else{
			$data = array(
				'status'	=> 'false',
				'username'	=> '',
				'id_user'	=> '',
			);
			echo json_encode($data);
		}
    }
	
	public function do_getProfile()
	{
        $id_user = addslashes($this->input->post('id_user'));
        $row = $this->Model_api->Get_users(" WHERE id_user = '".$id_user."' ")->result_array();
		$data = array(
			'status'	=> 'true',
			'id_user'	=> $row[0]['id_user'],
			'username'	=> $row[0]['username'],
			'password'	=> $row[0]['password'],
			'level'		=> $row[0]['level'],
			'nama'		=> $row[0]['nama'],
			'no_ktp'	=> $row[0]['no_ktp'],
			'no_telp'	=> $row[0]['no_telp'],
		);
		echo json_encode($data);
    }
	
	public function do_updateProfile()
	{
        $username = addslashes($this->input->post('username'));
        $password = addslashes($this->input->post('password'));
        $id_user = addslashes($this->input->post('id_user'));
        $nama = addslashes($this->input->post('nama'));
        $no_telp = addslashes($this->input->post('no_telp'));
		
		$dataUpdate=array( 
			'username'  => $username,
			'password'  => $password,
			'no_telp'   => $no_telp,
			'nama'  	=> $nama,
			'level'		=> 'Pelanggan'
		);    
		$this->Model_api->UpdateData('tbl_user', $dataUpdate, array('id_user' => $id_user));
		
		$data = array(
			'status'	=> 'true',
		);
		echo json_encode($data);
		
    }

}
