<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_jenis_kendaraan extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
        $now=date('Y-m-d H:i:s');
        $this->load->helper('tgl_indo');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Model_App');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }
	
	public function get_jenis_kendaraan()
	{
        $mst = $this->Model_App->Get_mst()->result_array();
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Jenis Kendaran',
            'Get_jenis'     => $this->Model_App->Get_jenis(" WHERE aktif = 1 Order By jenis ASC ")->result_array(),
        );
		$this->load->view('master/jenis_kendaraan/v_data', $data);
    }

    public function form_insert()
	{
        $mst = $this->Model_App->Get_mst()->result_array();
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Jenis Kendaran',

            'status_data'           => 'Add',
            'jenis'			        => '',
            'ukuran'	            => '',
        );
		$this->load->view('master/jenis_kendaraan/v_form', $data);
    }
    
	public function form_edit($ID = '')
	{
        $edit = $this->Model_App->Get_jenis("where id_jenis_kendaraan = '$ID' ")->result_array();
        $mst  = $this->Model_App->Get_mst()->result_array();
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Jenis Kendaran',
            
            'status_data'           => 'Edit',
            'id_jenis_kendaraan'    => $edit[0]['id_jenis_kendaraan'],
            'jenis'			        => $edit[0]['jenis'],
			'ukuran'	            => $edit[0]['ukuran'],
			'harga'		            => $edit[0]['harga'],
			'harga_pencuci'		    => $edit[0]['harga_pencuci'],
				
			);
		$this->load->view('master/jenis_kendaraan/v_form', $data);
    }
	
	public function do_action()
	{
		$status_data 		= $this->input->post('status_data');
        $id_jenis_kendaraan = $this->input->post('id_jenis_kendaraan');
        // $jenis 	            = $this->input->post('jenis');
        // $ukuran             = $this->input->post('ukuran');
        $harga 	            = $this->input->post('harga');
        $harga_pencuci 	    = $this->input->post('harga_pencuci');
			
			if($status_data == 'Add'){
				$data=array( 
					// 'jenis'             => $jenis,
                    // 'ukuran'	        => $ukuran,
                    'harga'		        => $harga,
                    'harga_pencuci'		=> $harga_pencuci,
                    'aktif'             => 1 
				);    
                $this->Model_App->InsertData('tbl_jenis_kendaraan', $data);

			}else{
				$data=array( 
					// 'jenis'             => $jenis,
                    // 'ukuran'	        => $ukuran,
                    'harga'		        => $harga,
                    'harga_pencuci'		=> $harga_pencuci,
                );    
                $this->Model_App->UpdateData('tbl_jenis_kendaraan', $data, array('id_jenis_kendaraan' => $id_jenis_kendaraan));
            } 
            redirect(base_url().'Master_jenis_kendaraan/get_jenis_kendaraan');
    }

    public function do_delete($ID)
	{
			
        $data=array( 'aktif' => 0);    
        $this->Model_App->UpdateData('tbl_jenis_kendaraan', $data, array('id_jenis_kendaraan' => $ID));
        redirect(base_url().'Master_jenis_kendaraan/get_jenis_kendaraan');
    }
}
