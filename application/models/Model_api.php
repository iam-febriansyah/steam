<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_api extends CI_Model {
	
	public function __construct() {
        parent::__construct();
	}

	function Get_list_chat($where){
		return $this->db->query(" SELECT c.*, uFrom.username as us_from, uTo.username as us_to, uFrom.image as image_from, uTo.image as image_to FROM `tbl_chat` as c
									INNER JOIN tbl_user as uFrom ON uFrom.id_user = c.from_id
									INNER JOIN tbl_user as uTo ON uTo.id_user = c.to_id
									$where   ");
	}

	// function Get_list_chat($where){
	// 	$this->db->query('DROP TABLE IF EXISTS tmp_tbl');
	// 	$this->db->query("CREATE TEMPORARY TABLE tmp_tbl
	// 						SELECT c.*, uFrom.username as us_from, uTo.username as us_to, uFrom.image as image_from, uTo.image as image_to FROM `tbl_chat` as c
	// 						INNER JOIN tbl_user as uFrom ON uFrom.id_user = c.from_id
	// 						INNER JOIN tbl_user as uTo ON uTo.id_user = c.to_id
	// 								$where   ");
	// }

	function Get_list_chat_person($fromId, $toId){
		$this->db->query('DROP TABLE IF EXISTS tmp_tbl');
		$this->db->query("CREATE TEMPORARY TABLE tmp_tbl
							SELECT * FROM tbl_chat
									WHERE to_id = '".$toId."'");

		return $this->db->query(" SELECT c.*, 
									uFrom.username as us_from, 
									uTo.username as us_to, 
									uFrom.image as image_from, 
									uTo.image as image_to 
									FROM tmp_tbl as c
									INNER JOIN tbl_user as uFrom ON uFrom.id_user = c.from_id
									INNER JOIN tbl_user as uTo ON uTo.id_user = c.to_id 
									WHERE c.from_id = '".$fromId."' Order by c.date_create ASC
									");
	}
	
	function Get_users($where = ''){
		return $this->db->query(" SELECT * FROM `tbl_user` $where ");
	}

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	
	function Get_aktivitas($where = ''){
		return $this->db->query(" SELECT tt.id_transaksi,
										 tmk.id_mst_kendaraan,
										 tjk.id_jenis_kendaraan, 
										 tjk.jenis, 
										 tjk.ukuran, 
										 tmk.merk, 
										 tmk.nama,
										 tt.id_transaksi,
										 tp.nama as pencuci, 
										 tt.nopol,
										 tt.total_bayar,
										 tt.harga_pencuci,
										 tt.created_date,
										 tt.date_process,
										 tt.date_finish,
										 u.username,
										 u.no_telp,
										 u.nama as namapelanggan
									FROM tbl_transaksi as tt
									INNER JOIN tbl_user as u ON tt.no_telp = u.no_telp
									INNER JOIN tbl_pencuci as tp ON tt.id_pencuci = tp.id_pencuci
									INNER JOIN tbl_mst_kendaraan as tmk ON tt.id_mst_kendaraan = tmk.id_mst_kendaraan
									INNER JOIN tbl_jenis_kendaraan as tjk ON tjk.id_jenis_kendaraan = tmk.id_mst_jenis_kendaraan $where");
	}
	
	
	
	function Get_jumlah_mobil(){
		return $this->db->query(" SELECT COUNT(tt.id_transaksi) Jumlah
		FROM tbl_transaksi as tt
		INNER JOIN tbl_mst_kendaraan as tmk ON tt.id_mst_kendaraan = tmk.id_mst_kendaraan
		INNER JOIN tbl_jenis_kendaraan as tjk ON tjk.id_jenis_kendaraan = tmk.id_mst_jenis_kendaraan
		WHERE (tjk.id_jenis_kendaraan = '1' OR tjk.id_jenis_kendaraan = '2') AND tt.date_finish is null ");
	}

	function Get_jumlah_motor(){
		return $this->db->query(" SELECT COUNT(tt.id_transaksi) Jumlah
		FROM tbl_transaksi as tt
		INNER JOIN tbl_mst_kendaraan as tmk ON tt.id_mst_kendaraan = tmk.id_mst_kendaraan
		INNER JOIN tbl_jenis_kendaraan as tjk ON tjk.id_jenis_kendaraan = tmk.id_mst_jenis_kendaraan
		WHERE (tjk.id_jenis_kendaraan = '3' OR tjk.id_jenis_kendaraan = '4') AND tt.date_finish is null ");
	}
	
	function Get_kendaraan($where = ''){
		return $this->db->query(" SELECT tmk.id_mst_kendaraan, 
										 tmk.id_mst_jenis_kendaraan,
										 tjk.jenis, 
										 tjk.ukuran, 
										 tmk.merk, 
										 tmk.nama, 
										 tjk.harga,
										 tjk.harga_pencuci 
									FROM tbl_mst_kendaraan as tmk
									INNER JOIN tbl_jenis_kendaraan as tjk ON tjk.id_jenis_kendaraan = tmk.id_mst_jenis_kendaraan $where");
	}

	function Get_jenis($where = ''){
		return $this->db->query(" SELECT * FROM `tbl_jenis_kendaraan` $where");
	}

	function Get_accesoris($where = ''){
		return $this->db->query("SELECT * FROM `tbl_accesoris`  $where");
	}

	function Get_pencuci($Where = ''){
		return $this->db->query("SELECT * FROM `tbl_pencuci` $Where ");
	}

	function Get_user($Where = ''){
		return $this->db->query("SELECT * FROM `tbl_user` $Where ");
	}

	function Get_transaksi($where = ''){
		return $this->db->query(" SELECT tt.id_transaksi,
										 tmk.id_mst_kendaraan,
										 tjk.id_jenis_kendaraan, 
										 tjk.jenis, 
										 tjk.ukuran, 
										 tmk.merk, 
										 tmk.nama,
										 tt.id_transaksi,
										 tp.nama as pencuci, 
										 tt.nopol,
										 tt.total_bayar,
										 tt.harga_pencuci,
										 tt.created_date 
									FROM tbl_transaksi as tt
									INNER JOIN tbl_pencuci as tp ON tt.id_pencuci = tp.id_pencuci
									INNER JOIN tbl_mst_kendaraan as tmk ON tt.id_mst_kendaraan = tmk.id_mst_kendaraan
									INNER JOIN tbl_jenis_kendaraan as tjk ON tjk.id_jenis_kendaraan = tmk.id_mst_jenis_kendaraan $where");
	}

	function Get_transaksi_gaji($date){
		return $this->db->query(" SELECT nama,
										SUM(CASE WHEN jeniskendaraan = '1' THEN 1 ELSE 0 END) AS mobilbesar,
										SUM(CASE WHEN jeniskendaraan = '2' THEN 1 ELSE 0 END) AS mobilkecil,
										SUM(CASE WHEN jeniskendaraan = '3' THEN 1 ELSE 0 END) AS motorbesar,
										SUM(CASE WHEN jeniskendaraan = '4' THEN 1 ELSE 0 END) AS motorkecil,
										SUM(harga_pencuci) as harga_pencuci
									FROM (

									SELECT tp.nama as nama, tjk.id_jenis_kendaraan as jeniskendaraan, tt.harga_pencuci
									FROM tbl_transaksi as tt
									INNER JOIN tbl_pencuci as tp ON tp.id_pencuci = tt.id_pencuci
									INNER JOIN tbl_mst_kendaraan as tmk ON tt.id_mst_kendaraan = tmk.id_mst_kendaraan
									INNER JOIN tbl_jenis_kendaraan as tjk ON tjk.id_jenis_kendaraan = tmk.id_mst_jenis_kendaraan
									WHERE DATE(tt.created_date) = '".$date."'
									) as trs
								GROUP BY nama 
								ORDER BY nama ASC");
	}

	function Get_sum_all_transaksi_gaji($where = ''){
		return $this->db->query(" SELECT SUM(tt.harga_pencuci) as gaji
									FROM tbl_transaksi as tt
									INNER JOIN tbl_pencuci as tp ON tt.id_pencuci = tp.id_pencuci $where ORDER BY tp.nama ASC");
	}

	function Get_sum_harga($where = ''){
		return $this->db->query(" SELECT SUM(tt.total_bayar) as SUM_harga
									FROM tbl_transaksi as tt
									INNER JOIN tbl_pencuci as tp ON tt.id_pencuci = tp.id_pencuci
									INNER JOIN tbl_mst_kendaraan as tmk ON tt.id_mst_kendaraan = tmk.id_mst_kendaraan
									INNER JOIN tbl_jenis_kendaraan as tjk ON tjk.id_jenis_kendaraan = tmk.id_mst_jenis_kendaraan $where");
	}

	function Get_sum_harga_pencuci($where = ''){
		return $this->db->query(" SELECT SUM(tt.harga_pencuci) as SUM_harga_pencuci
									FROM tbl_transaksi as tt
									INNER JOIN tbl_pencuci as tp ON tt.id_pencuci = tp.id_pencuci
									INNER JOIN tbl_mst_kendaraan as tmk ON tt.id_mst_kendaraan = tmk.id_mst_kendaraan
									INNER JOIN tbl_jenis_kendaraan as tjk ON tjk.id_jenis_kendaraan = tmk.id_mst_jenis_kendaraan $where");
	}
	
	function Get_Count_by($jenis,$ukuran,$date){
		return $this->db->query(" SELECT COUNT(tmk.id_mst_kendaraan) as Jumlah FROM tbl_transaksi as tt
									INNER JOIN tbl_pencuci as tp ON tt.id_pencuci = tp.id_pencuci
									INNER JOIN tbl_mst_kendaraan as tmk ON tt.id_mst_kendaraan = tmk.id_mst_kendaraan
									INNER JOIN tbl_jenis_kendaraan as tjk ON tjk.id_jenis_kendaraan = tmk.id_mst_jenis_kendaraan
									WHERE 	tjk.jenis = '".$jenis."' 
										and	tjk.ukuran = '".$ukuran."'
										and DATE(tt.created_date) = '".$date."' ");
	}

	function Get_Count_year($year,$month,$id_jenis_kendaraan){
		return $this->db->query(" SELECT COUNT(tt.id_transaksi) as Jumlah FROM tbl_transaksi as tt
									INNER JOIN tbl_mst_kendaraan as tmk ON tt.id_mst_kendaraan = tmk.id_mst_kendaraan
									INNER JOIN tbl_jenis_kendaraan as tjk ON tjk.id_jenis_kendaraan = tmk.id_mst_jenis_kendaraan
									WHERE 	YEAR(tt.created_date) = '".$year."' 
										AND MONTH(tt.created_date) = '".$month."'
										AND tjk.id_jenis_kendaraan = '".$id_jenis_kendaraan."' ");
	}

	function Get_Count_bar_chart($year){
		return $this->db->query(" SELECT 
										CASE 
											WHEN bulan = 1 THEN 'Januari'
											WHEN bulan = 2 THEN 'Februari'
											WHEN bulan = 3 THEN 'Maret'
											WHEN bulan = 4 THEN 'April'
											WHEN bulan = 5 THEN 'Mei'
											WHEN bulan = 6 THEN 'Juni'
											WHEN bulan = 7 THEN 'Juli'
											WHEN bulan = 8 THEN 'Agustus'
											WHEN bulan = 9 THEN 'September'
											WHEN bulan = 10 THEN 'Oktober'
											WHEN bulan = 11 THEN 'November'
											WHEN bulan = 12 THEN 'Desemver'
										END as y,
										SUM(CASE WHEN jeniskendaraan = 'mobilbesar' THEN 1 ELSE 0 END) AS mobilbesar,
										SUM(CASE WHEN jeniskendaraan = 'mobilkecil' THEN 1 ELSE 0 END) AS mobilkecil,
										SUM(CASE WHEN jeniskendaraan = 'motorbesar' THEN 1 ELSE 0 END) AS motorbesar,
										SUM(CASE WHEN jeniskendaraan = 'motorkecil' THEN 1 ELSE 0 END) AS motorkecil
									FROM (

									SELECT MONTH(tt.created_date) as bulan, 
									CASE 
										WHEN (tjk.id_jenis_kendaraan = 1) THEN 'mobilbesar'
										WHEN (tjk.id_jenis_kendaraan = 2) THEN 'mobilkecil'
										WHEN (tjk.id_jenis_kendaraan = 3) THEN 'motorbesar'
										WHEN (tjk.id_jenis_kendaraan = 4) THEN 'motorkecil'
									END as jeniskendaraan
									FROM tbl_transaksi as tt
									INNER JOIN tbl_mst_kendaraan as tmk ON tt.id_mst_kendaraan = tmk.id_mst_kendaraan
									INNER JOIN tbl_jenis_kendaraan as tjk ON tjk.id_jenis_kendaraan = tmk.id_mst_jenis_kendaraan
									WHERE 	YEAR(tt.created_date) = '".$year."'
									) as trs
								GROUP BY bulan 
								ORDER BY bulan ASC ");
	}

	public function InsertData($table_name,$data){
		return $this->db->insert($table_name, $data);
	}
	
	public function UpdateData($table, $data, $where){
		return $this->db->update($table, $data, $where);
	}
	
	public function DeleteData($table,$where){
		return $this->db->delete($table,$where);
	}
}
?>