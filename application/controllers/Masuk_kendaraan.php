<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk_kendaraan extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
        $now=date('Y-m-d H:i:s');
        $this->load->helper('tgl_indo');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Model_App');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->load->library('M_pdf');
    }
	
	public function index()
	{
        $mst = $this->Model_App->Get_mst()->result_array();

        $mobil_besar = $this->Model_App->Get_jenis(" WHERE jenis='Mobil' AND Ukuran='Besar' Limit 1 ")->result_array();
        $mobil_kecil = $this->Model_App->Get_jenis(" WHERE jenis='Mobil' AND Ukuran='Kecil' Limit 1 ")->result_array();
        $motor_besar = $this->Model_App->Get_jenis(" WHERE jenis='Motor' AND Ukuran='Besar' Limit 1 ")->result_array();
        $motor_kecil = $this->Model_App->Get_jenis(" WHERE jenis='Motor' AND Ukuran='Kecil' Limit 1 ")->result_array();

        $data = array(
            'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'class_menu'    => 'Masuk Kendaraan',
            'status_data'   => 'Add',
            'c_mobil_besar' => $mobil_besar[0]['harga'],
            'c_mobil_kecil' => $mobil_kecil[0]['harga'],
            'c_motor_besar' => $motor_besar[0]['harga'],
            'c_motor_kecil' => $motor_kecil[0]['harga'],

            'Get_user' => $this->Model_App->Get_user(" WHERE aktif = 1 Order By nama ASC ")->result_array(),
        );
		$this->load->view('v_masuk_kendaraan', $data);
    }

    public function form($id_jenis_kendaraan)
	{
        $data = array(
            'Get_kendaraan' => $this->Model_App->Get_kendaraan(" WHERE tmk.id_mst_jenis_kendaraan = '".$id_jenis_kendaraan."' AND tmk.aktif = 1 Order By nama ASC ")->result_array(),
            'Get_pencuci' => $this->Model_App->Get_pencuci(" WHERE aktif = 1 Order By nama ASC ")->result_array(),
            
        );
		$this->load->view('v_form_tagihan', $data);
    }

    public function ajax_kendaraan()
	{
        $id_mst_kendaraan = $this->input->post('id_mst_kendaraan');
        $Get_kendaraan = $this->Model_App->Get_kendaraan(" WHERE tmk.id_mst_kendaraan = '".$id_mst_kendaraan."' LIMIT 1 ")->result_array();
        $data = array(
            'id_mst_kendaraan'	=> $Get_kendaraan[0]['id_mst_kendaraan'],
            'jenis'	=> $Get_kendaraan[0]['jenis'],
            'ukuran'=> $Get_kendaraan[0]['ukuran'],
            'merk'	=> $Get_kendaraan[0]['merk'],
            'nama'	=> $Get_kendaraan[0]['nama'],
            'harga'	=> $Get_kendaraan[0]['harga'],
            'harga_pencuci'	=> $Get_kendaraan[0]['harga_pencuci'],
        );
        echo json_encode($data);
    }
	
	public function ajax_pelanggan()
	{
		
		if(!empty($this->input->get("user"))){
			$row = $this->Model_App->Get_users(" WHERE level = 'Pelanggan' 
					and ( username like '%".$this->input->get('user')."%' OR nama like  '%".$this->input->get('user')."%') "
					)->result_array();
			$data = array(
				'id_user'	=> $row[0]['id_user'],
				'username'	=> $row[0]['username'],
				'password'	=> $row[0]['password'],
				'level'		=> $row[0]['level'],
				'nama'		=> $row[0]['nama'],
				'no_ktp'	=> $row[0]['no_ktp'],
				'no_telp'	=> $row[0]['no_telp'],
			);
		}else{
			$row = $this->Model_App->Get_users(" WHERE level = 'Pelanggaaan' ")->result_array();
			$data = array(
				'id_user'	=> $row[0]['id_user'],
				'username'	=> $row[0]['username'],
				'password'	=> $row[0]['password'],
				'level'		=> $row[0]['level'],
				'nama'		=> $row[0]['nama'],
				'no_ktp'	=> $row[0]['no_ktp'],
				'no_telp'	=> $row[0]['no_telp'],
			);
		}
       
        echo json_encode($data);
    }
    
	public function do_action()
	{
		$id_mst_kendaraan   = $this->input->post('id_mst_kendaraan');
        $id_pencuci 	    = $this->input->post('id_pencuci');
        $nopol              = $this->input->post('nopol');
        $total_bayar 	    = $this->input->post('total_bayar');
        $harga_pencuci 	    = $this->input->post('harga_pencuci');
        $no_telp 	    	= $this->input->post('no_telp');
        $created_by 	    = "Admin";
        $created_date 	    = date('Y-m-d H:i:s');
			
		$data=array( 
            'id_mst_kendaraan'  => $id_mst_kendaraan,
            'id_pencuci'        => $id_pencuci,
            'nopol'             => $nopol,
            'no_telp'           => $no_telp,
            'total_bayar'       => $total_bayar,
            'harga_pencuci'     => $harga_pencuci,
            'created_by'        => $created_by,
            'created_date'      => $created_date
		);    
        $this->Model_App->InsertData('tbl_transaksi', $data);
        $this->session->set_flashdata('msg', 'success');
        $formData = $this->Model_App->Get_transaksi(" where tt.nopol = '".$nopol."' AND tt.created_date = '".$created_date."' ")->result_array();
        $id = $formData[0]['id_transaksi'];
        redirect(base_url().'Masuk_kendaraan/print_/'.$id);
    }

    public function print_($id) 
	{
		$mst = $this->Model_App->Get_mst()->result_array();
        $formData = $this->Model_App->Get_transaksi(" where tt.id_transaksi = $id")->result_array();
        $pdf_name = $formData[0]['nopol'].'-'.$formData[0]['created_date'];
		$data = array(
            'title'         => $mst[0]['nama'],
            'mst_nama'      => $mst[0]['nama'],
            'mst_alamat'    => $mst[0]['alamat'],
            'mst_no_telp'   => $mst[0]['no_telp'],
            'mst_gambar'    => $mst[0]['gambar'],
            'pdf_name'      => $pdf_name,
            'nopol'	        => $formData[0]['nopol'],
            'jenis'	        => $formData[0]['jenis'],
            'ukuran'        => $formData[0]['ukuran'],
            'merk'	        => $formData[0]['merk'],
            'nama'	        => $formData[0]['nama'],
            'total_bayar'	=> $formData[0]['total_bayar'],
            'pencuci'	    => $formData[0]['pencuci'],
            'created_date'	=> $formData[0]['created_date'],
				);
		$html = $this->load->view('v_print_single', $data, true);
        $this->mpdf = new mPDF('utf-8', array(80,90), 'BOOKOS');
        $this->mpdf->SetFont('BOOKOS');
        // $this->mpdf->SetWatermarkImage(base_url().'assets/images/'.$mst[0]['gambar']);
        // $this->mpdf->showWatermarkImage = true;
        
		$this->mpdf->AddPage('P', // L - landscape, P - portrait
				'', '', '', '',
				1, // margin_left
				1, // margin right
				1, // margin top
				1, // margin bottom
				5, // margin header
				5); // margin footer
		$this->mpdf->WriteHTML($html);
		$this->mpdf->SetHTMLFooter('
			<div style="padding-left: 5px; width:100%; font-size:15px;">
				<table border="0" width="100%">
					<tr>
						<td align="justify"><hr>'.$formData[0]['created_date'].'</td>
					</tr>
					
				</table> 
			</div>');
		$this->mpdf->Output($pdf_name.'.pdf', 'I');
	
    }

    public function do_delete($ID)
	{
        $data=array( 'aktif' => 0);    
        $this->Model_App->UpdateData('tbl_user', $data, array('id_user' => $ID));
        redirect(base_url().'Master_user/get_user');
    }
}
