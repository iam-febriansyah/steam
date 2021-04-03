<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {
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
	
	public function getData($id_user)
	{
        //$id_user = $this->input->get('id_user');
        $rows = $this->Model_api->Get_aktivitas(" where u.id_user = '".$id_user."'  Order by tt.created_date DESC")->result_array();
		if(COUNT($rows) > 0){
			foreach($rows as $row){
				$data[] = array(
					'status'		=> 'true',
					'nopol'			=> $row['nopol'],
					'username'		=> $row['username'],
					'nama'			=> $row['namapelanggan'],
					'created_date'	=> $row['created_date'],
					'date_process'	=> $row['date_process'],
					'date_finish'	=> $row['date_finish'],
					'total_bayar'	=> $row['total_bayar'],
				);
			}
		}else{
			$data[] = array(
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

}
