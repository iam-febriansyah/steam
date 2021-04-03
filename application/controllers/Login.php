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
        $this->load->model('Model_App');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

        // if($this->session->userdata('status') != "login"){
        

    }
	
	public function index()
	{
        $mst = $this->Model_App->Get_mst()->result_array();
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Aplikasi',
        );
		$this->load->view('v_login', $data);
    }

    function cek_session(){

        $session = $this->session->userdata('login');
		if($session['status'] != "login"){
			redirect(base_url().'login','refresh');
			exit(0);
		}else{
			redirect(base_url().'Dashboard');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		session_start();
		session_destroy();
		redirect(base_url().'login');
	}

    public function do_action()
	{
        $username	= addslashes($this->input->post('username'));
        $password = addslashes($this->input->post('password'));
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->Model_App->cek_login("tbl_user",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata('login', $data_session);
 
			redirect(base_url("Dashboard"));
 
		}else{
			echo "Username dan password salah !";
		}

    }

    public function check_login() {
        if (!$this->session->has_userdata('logged_in') || $this->session->logged_in !== true) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            // redirect('/login/do_action');
            redirect(base_url().'login/do_action');
        }
    }
}
