<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$now=date('Y-m-d H:i:s');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('tgl_indo');
        $this->load->model('Model_App');

        $session = $this->session->userdata('login');
        if($session['status'] != "login"){
            redirect(base_url().'login','refresh');
        }
    }
    
	
	public function index()
	{
        $mst = $this->Model_App->Get_mst()->result_array();
        $datenow = date('Y-m-d');
        $year = date('Y');
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Dashboard',

            
            'c_mobil_besar' => $this->Model_App->Get_Count_by("Mobil","Besar", $datenow )->result_array()[0]['Jumlah'],
            'c_mobil_kecil' => $this->Model_App->Get_Count_by("Mobil","Kecil", $datenow )->result_array()[0]['Jumlah'],
            'c_motor_besar' => $this->Model_App->Get_Count_by("Motor","Besar", $datenow )->result_array()[0]['Jumlah'],
            'c_motor_kecil' => $this->Model_App->Get_Count_by("Motor","Kecil", $datenow )->result_array()[0]['Jumlah'],
            'Get_Count_bar_chart' => $this->Model_App->Get_Count_bar_chart($year )->result_array()
        );
        // echo json_encode($data['Get_Count_bar_chart']);
		$this->load->view('v_dashboard', $data);
	}
}
