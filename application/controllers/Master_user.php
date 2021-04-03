<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_user extends CI_Controller {
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
	
	public function get_user()
	{
        $mst = $this->Model_App->Get_mst()->result_array();
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Manajemen User',
            'Get_user' => $this->Model_App->Get_user(" WHERE aktif = 1 Order By nama ASC ")->result_array(),
        );
		$this->load->view('master/user/v_data', $data);
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
            'class_menu'    => 'Manajemen User',

            'status_data'           => 'Add',
            'level'                 => '',
        );
		$this->load->view('master/user/v_form', $data);
    }
    
	public function form_edit($ID = '')
	{
        $edit = $this->Model_App->Get_user("where id_user = '$ID' ")->result_array();
        $mst  = $this->Model_App->Get_mst()->result_array();
        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Manajemen User',
            
            'status_data'   => 'Edit',
            'id_user'       => $edit[0]['id_user'],
            'nama'          => $edit[0]['nama'],
            'no_ktp'        => $edit[0]['no_ktp'],
            'no_telp'       => $edit[0]['no_telp'],
            'username'      => $edit[0]['username'],
            'password'      => $edit[0]['password'],
            'level'         => $edit[0]['level']
				
			);
		$this->load->view('master/user/v_form', $data);
    }
	
	public function do_action()
	{
		$status_data = $this->input->post('status_data');
        $id_user     = $this->input->post('id_user');
        $no_ktp 	 = $this->input->post('no_ktp');
        $no_telp 	 = $this->input->post('no_telp');
        $nama 	     = $this->input->post('nama');
        $username 	 = $this->input->post('username');
        $password 	 = $this->input->post('password');
        $level 	     = $this->input->post('level');
			
			if($status_data == 'Add'){
				$data=array( 
                    'nama'          => $nama,
                    'no_ktp'        => $no_ktp,
                    'no_telp'       => $no_telp,
                    'username'      => $username,
                    'password'      => $password,
                    'level'         => $level,
                    'aktif'            => 1 
				);    
                $this->Model_App->InsertData('tbl_user', $data);

			}else{
                $data=array( 
                    'nama'          => $nama,
                    'no_ktp'        => $no_ktp,
                    'no_telp'       => $no_telp,
                    'username'      => $username,
                    'password'      => $password,
                    'level'         => $level,
                );    
                $this->Model_App->UpdateData('tbl_user', $data, array('id_user' => $id_user));
            } 
            redirect(base_url().'Master_user/get_user');
    }

    public function do_delete($ID)
	{
			
        $data=array( 'aktif' => 0);    
        $this->Model_App->UpdateData('tbl_user', $data, array('id_user' => $ID));
        redirect(base_url().'Master_user/get_user');
    }
}
