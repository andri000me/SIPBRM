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
		if($this->uri->segment(2) == "kembalikan" && $_SERVER['REQUEST_METHOD'] == "POST"){
			$this->update($this->uri->segment(3));
		}
	}
	
    public function index(){
		$data['title'] = "Data $this->cap";
		$data['content'] = "$this->low/index";
		$where = "";
		if ($_SESSION['userlevel'] == 3) {
			$where.=" WHERE pem.created_by= $_SESSION[userid]";
		}
		$data['data'] = $this->db->query("SELECT p.id, pg.nama, p.keterangan, p.created_at FROM $this->low p 
		JOIN pengguna pg ON p.created_by=pg.id JOIN peminjaman pem ON p.id_peminjaman=pem.id $where")->result_array();
        $this->load->view('backend/index',$data);
    }
	
	public function detail($id){
		$data['title'] = "Ubah $this->cap";
		$data['type'] = 'Detail';
		$data['data'] = $this->db->query("SELECT pm.id as id_peminjaman, pgm.id as id_pengembalian, pgm.keterangan, pgm.created_at as tanggal_kembali, pm.no_rm, pm.keperluan, pm.keterangan, pm.tanggal_harus_kembali, pm.created_at, p.nama, p.alamat, 
		pg.nama as peminjam, pg.email FROM `peminjaman` pm join pasien p ON pm.no_rm=p.no_rm JOIN pengguna pg ON pm.created_by=pg.id join pengembalian pgm ON pm.id=pgm.id_peminjaman WHERE pm.id='$id'")->row_array();		
		$this->load->view('backend/content/pengembalian/_detail',$data);
		// print_r($data);
	}
	public function kembalikan($id){
		$data['title'] = " $this->cap Berkas";
		$data['content'] = "$this->low/_form";
		$data['type'] = 'Ubah';
		$data['provinsi'] = $this->db->get("provinsi")->result_array();
		$data['data'] = $this->db->get_where("peminjaman", ['id' => $id])->row_array();		
		$this->load->view('backend/index',$data);
	}
	public function update($id){
		$d = $_POST;
		try{
			$arr =
			[
				'id_peminjaman' => $id, 
				'keterangan' => $this->input->post('keterangan'), 
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['userid']	
			];
			$this->session->set_flashdata("message", ['success', "$this->cap Berhasil", ' Berhasil']);
			$this->db->update("peminjaman",['status' => 1], ['id' => $id]);
			$this->db->insert("$this->low",$arr);
			redirect(base_url("$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Edit Data $this->cap", ' Gagal']);
			redirect(base_url("$this->low/edit/".$id));
			// $this->add();
		}
	}
		
	
}
