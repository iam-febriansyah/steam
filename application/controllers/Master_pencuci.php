<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pencuci extends CI_Controller {
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
	
	public function get_pencuci()
	{
        $mst = $this->Model_App->Get_mst()->result_array();
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Master Pencuci',
            'Get_pencuci' => $this->Model_App->Get_pencuci(" WHERE aktif = 1 Order By nama ASC ")->result_array(),
        );
		$this->load->view('master/pencuci/v_data', $data);
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
            'class_menu'    => 'Master Pencuci',

            'status_data'           => 'Add',
        );
		$this->load->view('master/pencuci/v_form', $data);
    }
    
	public function form_edit($ID = '')
	{
        $edit = $this->Model_App->Get_pencuci("where id_pencuci = '$ID' ")->result_array();
        $mst  = $this->Model_App->Get_mst()->result_array();
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Master Pencuci',
            
            'status_data'   => 'Edit',
            'id_pencuci'    => $edit[0]['id_pencuci'],
            'nama'          => $edit[0]['nama'],
            'no_ktp'        => $edit[0]['no_ktp']
				
			);
		$this->load->view('master/pencuci/v_form', $data);
    }
	
	public function do_action()
	{
		$status_data = $this->input->post('status_data');
        $id_pencuci  = $this->input->post('id_pencuci');
        $no_ktp 	 = $this->input->post('no_ktp');
        $nama 	     = $this->input->post('nama');
			
			if($status_data == 'Add'){
				$data=array( 
                    'no_ktp'    => $no_ktp,
                    'nama'      => $nama,
                    'aktif'     => 1 
				);    
                $this->Model_App->InsertData('tbl_pencuci', $data);

			}else{
				$data=array( 
                    'no_ktp'    => $no_ktp,
                    'nama'      => $nama,
                );    
                $this->Model_App->UpdateData('tbl_pencuci', $data, array('id_pencuci' => $id_pencuci));
            } 
            redirect(base_url().'Master_pencuci/get_pencuci');
    }

    public function do_delete($ID)
	{
			
        $data=array( 'aktif' => 0);    
        $this->Model_App->UpdateData('tbl_pencuci', $data, array('id_pencuci' => $ID));
        redirect(base_url().'Master_pencuci/get_pencuci');
    }
}
