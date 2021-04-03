<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$now=date('Y-m-d H:i:s');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('tgl_indo');
        $this->load->model('Model_App');
    }
	
	public function index()
	{
        $mst = $this->Model_App->Get_mst()->result_array();
        $datenow = date('Y-m-d');
        $month = date('m');
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Transaksi & Laporan',

            'Get_transaksi' => $this->Model_App->Get_transaksi(" WHERE MONTH(tt.created_date) = '".$month."' ORDER BY tt.created_date ASC")->result_array(),
            'Get_sum_harga' => $this->Model_App->Get_sum_harga(" WHERE MONTH(tt.created_date) = '".$month."' ")->result_array()[0]['SUM_harga'],
            'Get_sum_harga_pencuci' => $this->Model_App->Get_sum_harga_pencuci(" WHERE MONTH(tt.created_date) = '".$month."' ")->result_array()[0]['SUM_harga_pencuci'],
        );
        // echo json_encode($data['Get_transaksi']);
		$this->load->view('v_transaksi', $data);
    }
    
    public function search_data()
	{
        $before = date('Y-m-d', strtotime($this->input->get('before')) );
        $after = date('Y-m-d', strtotime($this->input->get('after')) );
        
        $data = array(
            'Get_transaksi' => $this->Model_App->Get_transaksi(" WHERE DATE(tt.created_date) BETWEEN  '".$before."' AND '".$after."' ORDER BY tt.created_date ASC ")->result_array(),
            'Get_sum_harga' => $this->Model_App->Get_sum_harga(" WHERE DATE(tt.created_date) BETWEEN  '".$before."' AND '".$after."' ")->result_array()[0]['SUM_harga'],
            'Get_sum_harga_pencuci' => $this->Model_App->Get_sum_harga_pencuci(" WHERE DATE(tt.created_date) BETWEEN  '".$before."' AND '".$after."' ")->result_array()[0]['SUM_harga_pencuci'],
        );
        // echo $before;
        // echo json_encode($data['Get_transaksi']);
		$this->load->view('v_transaksi_param', $data);
    }
    
    public function gaji()
	{
        $mst = $this->Model_App->Get_mst()->result_array();
        $date = date('Y-m-d');
        $month = date('m');
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Gaji Petugas',

            'Get_transaksi_gaji' => $this->Model_App->Get_transaksi_gaji($date)->result_array(),
            'Get_sum_all_transaksi_gaji' => $this->Model_App->Get_sum_all_transaksi_gaji(" WHERE DATE(tt.created_date) = '".$date."' ")->result_array()[0]['gaji'],
        );
        // echo json_encode($data['Get_transaksi']);
		$this->load->view('v_gaji', $data);
    }

    public function search_gaji()
	{
        $date = date('Y-m-d', strtotime($this->input->get('date')) );

        $data = array(
            'Get_transaksi_gaji' => $this->Model_App->Get_transaksi_gaji($date)->result_array(),
            'Get_sum_all_transaksi_gaji' => $this->Model_App->Get_sum_all_transaksi_gaji(" WHERE DATE(tt.created_date) = '".$date."' ")->result_array()[0]['gaji'],
        );
        // echo json_encode($data['Get_transaksi']);
		$this->load->view('v_gaji_param', $data);
    }
	
	public function batal($ID)
	{
        $data=array( 'aktif' => 0);    
        $this->Model_App->DeleteData('tbl_transaksi', array('id_transaksi' => $ID));
        redirect(base_url().'Transaksi');
    }
	
	public function proses($ID)
	{
        $data=array( 'date_process' => date('Y-m-d H:i:s') );    
        $this->Model_App->UpdateData('tbl_transaksi', $data, array('id_transaksi' => $ID));
        redirect(base_url().'Transaksi');
    }
	
	public function selesai($ID)
	{
        $data=array( 'date_finish' => date('Y-m-d H:i:s'));    
        $this->Model_App->UpdateData('tbl_transaksi', $data, array('id_transaksi' => $ID));
        redirect(base_url().'Transaksi');
    }
}
