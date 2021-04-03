<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kendaraan extends CI_Controller {
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
	
	public function get_kendaraan()
	{
        $mst = $this->Model_App->Get_mst()->result_array();
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Master Kendaraan',
            'Get_kendaraan' => $this->Model_App->Get_kendaraan(" WHERE tmk.aktif = 1 Order By tmk.merk ASC ")->result_array(),
        );
		$this->load->view('master/kendaraan/v_data', $data);
    }

    public function form_insert()
	{
        $mst = $this->Model_App->Get_mst()->result_array();
        $Get_jenis = $this->Model_App->Get_jenis(" WHERE aktif = 1 Order By jenis ASC ")->result_array();
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Master Kendaraan',

            'status_data'           => 'Add',
            'id_mst_jenis_kendaraan'=> '',
            'Get_jenis'             => $Get_jenis,
        );
		$this->load->view('master/kendaraan/v_form', $data);
    }
    
	public function form_edit($ID = '')
	{
        $edit = $this->Model_App->Get_kendaraan("where id_mst_kendaraan = '$ID' ")->result_array();
        $mst  = $this->Model_App->Get_mst()->result_array();
        $Get_jenis = $this->Model_App->Get_jenis(" WHERE aktif = 1 Order By jenis ASC ")->result_array();
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Master Kendaraan',
            
            'status_data'           => 'Edit',
            'id_mst_kendaraan'      => $edit[0]['id_mst_kendaraan'],
            'id_mst_jenis_kendaraan'=> $edit[0]['id_mst_jenis_kendaraan'],
            'Get_jenis'             => $Get_jenis,
            'merk'                  => $edit[0]['merk'],
            'nama'			        => $edit[0]['nama'],
				
			);
		$this->load->view('master/kendaraan/v_form', $data);
    }
	
	public function do_action()
	{
		$status_data 		    = $this->input->post('status_data');
        $id_mst_kendaraan       = $this->input->post('id_mst_kendaraan');
        $merk 	                = $this->input->post('merk');
        $id_mst_jenis_kendaraan = $this->input->post('id_mst_jenis_kendaraan');
        $nama 	                = $this->input->post('nama');
			
			if($status_data == 'Add'){
				$data=array( 
					'id_mst_jenis_kendaraan'=> $id_mst_jenis_kendaraan,
                    'merk'	                => $merk,
                    'nama'		            => $nama,
                    'aktif'                 => 1 
				);    
                $this->Model_App->InsertData('tbl_mst_kendaraan', $data);

			}else{
				$data=array( 
					'id_mst_jenis_kendaraan'=> $id_mst_jenis_kendaraan,
                    'merk'	                => $merk,
                    'nama'		            => $nama,
                );    
                $this->Model_App->UpdateData('tbl_mst_kendaraan', $data, array('id_mst_kendaraan' => $id_mst_kendaraan));
            } 
            redirect(base_url().'Master_kendaraan/get_kendaraan');
    }

    public function do_delete($ID)
	{
			
        $data=array( 'aktif' => 0);    
        $this->Model_App->UpdateData('tbl_mst_kendaraan', $data, array('id_mst_kendaraan' => $ID));
        redirect(base_url().'Master_kendaraan/get_kendaraan');
    }
}
