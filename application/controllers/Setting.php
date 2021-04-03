<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
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
		$this->load->view('v_setting.php', $data);
    }

    public function do_action()
	{
        $config=array(
            'upload_path' 	=> 'assets/images/', //lokasi gambar akan di simpan
            'allowed_types' => 'jpg|jpeg|png', //ekstensi gambar yang boleh di uanggah
            'max_size' 		=> '2000', //batas maksimal ukuran gambar
            'max_width' 	=> '2000', //batas maksimal lebar gambar
            'max_height'	=> '2000', //batas maksimal tinggi gambar
			'overwrite'		=> TRUE,
            'file_name' 	=> url_title($this->input->post('gambar')) //nama gambar
        );
		$this->load->library('upload', $config);
        $this->upload->initialize($config);

        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $no_telp 	= $this->input->post('no_telp');
        
        if(!$this->upload->do_upload("gambar")){
            $data=array( 
                'nama'      => $nama,
                'alamat'	=> $alamat,
                'no_telp'   => $no_telp,
            );    
            $this->Model_App->UpdateData('mst', $data, array('id' => 1));
        }else{
            $file 	= $this->upload->file_name;
            $data=array( 
                'nama'      => $nama,
                'alamat'	=> $alamat,
                'no_telp'	=> $no_telp,
                'gambar'    => $file
            );    
            $this->Model_App->UpdateData('mst', $data, array('id' => 1));
        }
        redirect(base_url().'Setting');

    }
}
