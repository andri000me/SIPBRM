<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengembalian extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		$this->low = "pengembalian";
        $this->cap = "Pengembalian";
		$this->load->helper("Response_helper");
		$this->load->helper("Input_helper");
		date_default_timezone_set('Asia/Jakarta');
		if($this->uri->segment(2) == "add" && $_SERVER['REQUEST_METHOD'] == "POST"){
			$this->simpan();
		}
	}
	
    public function index(){
		$data['title'] = "Data $this->cap";
		$data['content'] = "$this->low/index";
		$where = "";
		// if ($_SESSION['userlevel'] == 3) {
		// 	$where.=" WHERE pem.created_by= $_SESSION[userid]";
		// }
		$data['data'] = $this->db->query("SELECT p.id, pg.nama, p.created_at, pem.* FROM $this->low p 
		JOIN pengguna pg ON p.created_by=pg.id JOIN pengambilan pem ON p.id_pengambilan=pem.id $where")->result_array();
        $this->load->view('backend/index',$data);
    }
	public function add(){
		$data['title'] = " $this->cap Berkas";
		$data['content'] = "$this->low/_form";
		$data['type'] = 'Ubah';
		$data['pengambilan'] = $this->db->query("SELECT DISTINCT(no_rm) FROM pengambilan")->result_array();
		$data['data'] = null;		
		$this->load->view('backend/index',$data);
	}
	
	public function detail($id){
		$data['title'] = "Ubah $this->cap";
		$data['type'] = 'Detail';
		$data['data'] = $this->db->query("SELECT pm.id as id_pengembalian, pgm.id as id_pengembalian, pgm.keterangan, pgm.created_at as tanggal_kembali, pm.no_rm, pm.keperluan, pm.keterangan, pm.tanggal_harus_kembali, pm.created_at, pm.nama_pasien as nama, pm.tanggal_lahir_pasien, 
		pg.nama as peminjam, pg.email FROM `pengembalian` pm JOIN pengguna pg ON pm.created_by=pg.id join pengembalian pgm ON pm.id=pgm.id_pengembalian WHERE pm.id='$id'")->row_array();		
		$this->load->view('backend/content/pengembalian/_detail',$data);
		// print_r($data);
	}
	public function kembalikan($id){
		$data['title'] = " $this->cap Berkas";
		$data['content'] = "$this->low/_form";
		$data['type'] = 'Ubah';
		// $data['provinsi'] = $this->db->get("provinsi")->result_array();
		$data['data'] = $this->db->get_where("pengembalian", ['id' => $id])->row_array();		
		$this->load->view('backend/index',$data);
	}
	public function simpan(){
		$d = $_POST;
		try{
			$arr =
			[
				'id_pengambilan' => $this->input->post("id_pengambilan"), 
				'status' => 0, 
				'tanggal_pulang' => $this->input->post('tanggal_pulang'), 
				'bayar' => $this->input->post('bayar'), 
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['userid']	
			];
			$this->session->set_flashdata("message", ['success', "$this->cap Berhasil", ' Berhasil']);
			$this->db->insert("$this->low",$arr);
			redirect(base_url("$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Edit Data $this->cap", ' Gagal']);
			redirect(base_url("$this->low/edit/".$id));
			// $this->add();
		}
	}
		
	
}
