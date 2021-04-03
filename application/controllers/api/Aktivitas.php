<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivitas extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();

        date_default_timezone_set('Asia/Jakarta');
        $now=date('Y-m-d H:i:s');
        $this->load->helper('tgl_indo');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Model_api');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }
	
	public function do_CurrentAktivitas()
	{
        $id_user = addslashes($this->input->post('id_user'));
        $row = $this->Model_api->Get_aktivitas(" WHERE u.id_user = '".$id_user."' AND date_finish is null ")->result_array();
		if(COUNT($row) > 0){
			$data = array(
				'status'		=> 'true',
				'nopol'			=> $row[0]['nopol'],
				'username'		=> $row[0]['username'],
				'nama'			=> $row[0]['namapelanggan'],
				'created_date'	=> $row[0]['created_date'],
				'date_process'	=> $row[0]['date_process'],
				'date_finish'	=> $row[0]['date_finish'],
				'total_bayar'	=> $row[0]['total_bayar'],
			);
		}else{
			$data = array(
				'status'		=> 'false',
				'nopol'			=> '',
				'username'		=> '',
				'nama'			=> '',
				'created_date'	=> '',
				'date_process'	=> '',
				'date_finish'	=> '',
				'total_bayar'	=> '',
			);
		}	
		echo json_encode($data);
	}
	
	public function getAntre()
	{
        $rowMobil = $this->Model_api->Get_jumlah_mobil(" ")->result_array()[0]['Jumlah'];
        $rowMotor = $this->Model_api->Get_jumlah_motor(" ")->result_array()[0]['Jumlah'];
		// if(COUNT($row) > 0){
		$data = array(
			'status'	=> 'true',
			'motor'		=> $rowMobil,
			'mobil'		=> $rowMotor,
		);
		echo json_encode($data);
    }

}
