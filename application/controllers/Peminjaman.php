<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Peminjaman extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		$this->low = "peminjaman";
        $this->cap = "Pengembalian";
		$this->load->helper("Response_helper");
		$this->load->helper("Input_helper");
		date_default_timezone_set('Asia/Jakarta');
		if($this->uri->segment(2) == "add" && $_SERVER['REQUEST_METHOD'] == "POST"){
		  $this->store();
		}else if($this->uri->segment(2) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
		  $this->update($this->uri->segment(3));
		}
    }
    public function index(){
		$data['title'] = "Data $this->cap";
		$data['content'] = "$this->low/index";
		$where = "";
		if ($_SESSION['userlevel'] != 2) {
			$where.=" WHERE pem.created_by= $_SESSION[userid]";
		}
		$data['data'] = $this->db->query("SELECT p.nama, pem.* FROM $this->low pem JOIN pengguna p ON pem.created_by=p.id $where")->result_array();
        $this->load->view('backend/index',$data);
    }
	
	public function add()
	{
		$data['title'] = "Tambah $this->cap";
		$data['content'] = "$this->low/_form";
        $data['data'] = null;
		$data['type'] = 'Tambah';
		$this->load->view('backend/index',$data);
	}
	public function terlambat(){
		$data['title'] = "Data $this->cap Terlambat";
		$data['content'] = "$this->low/index";
		$where = " WHERE DATE(pem.tanggal_harus_kembali) < DATE(NOW()) AND pem.status=0";
		if ($_SESSION['userlevel'] == 4) {
			$where.=" AND pem.created_by= $_SESSION[userid]";
		}
		$data['data'] = $this->db->query("SELECT p.nama, pem.* FROM $this->low pem JOIN pengguna p ON pem.created_by=p.id $where")->result_array();
        $this->load->view('backend/index',$data);
	}
	public function store(){
		$d = $_POST;
		try{
			$arr =
			[
				'no_rm' => $this->input->post('no_rm'), 
				'nama_pasien' => $this->input->post('nama_pasien'), 
				'tanggal_lahir_pasien' => $this->input->post('tanggal_lahir_pasien'), 
				'ruangan' => $this->input->post('ruangan'), 
				'keperluan' => $this->input->post('keperluan'), 
				'keterangan' => $this->input->post('keterangan'), 
				'tanggal_harus_kembali' => date('Y-m-d', strtotime("+2 days")), 
				'created_by' => $_SESSION['userid'],
			];
            $this->db->insert("$this->low",$arr);
            $this->session->set_flashdata("message", ['success', "Berhasil Tambah $this->cap", ' Berhasil']);
            redirect(base_url("$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Tambah Data $this->cap", ' Gagal']);
			redirect(base_url("$this->low/add"));
			// $this->add();
		}
	}
		
	public function edit($id){
		$data['title'] = "Ubah $this->cap";
		$data['content'] = "$this->low/_form";
		$data['type'] = 'Ubah';
		$data['provinsi'] = $this->db->get("provinsi")->result_array();
		$data['data'] = $this->db->get_where("$this->low", ['id' => $id])->row_array();		
		$this->load->view('backend/index',$data);
	}
	public function checkRm($val){
		$data = $this->db->get_where("pasien", ['no_rm' => $val]);

		if($data->num_rows() < 1){
			echo "No Rm yang anda masukan tidak ada dalam database";
		}
	}
	public function detail($id){
		$data['title'] = "Ubah $this->cap";
		$data['type'] = 'Detail';
		$data['data'] = $this->db->query("SELECT pm.id, pm.no_rm, pm.keperluan, pm.keterangan, pm.tanggal_harus_kembali, pm.created_at, pm.nama_pasien as nama, pm.tanggal_lahir_pasien, pg.nama as peminjam, pg.email FROM `peminjaman` pm JOIN pengguna pg ON pm.created_by=pg.id WHERE pm.id='$id'")->row_array();		
		$this->load->view('backend/content/peminjaman/_detail',$data);
	}
	
	public function update($id){
		$d = $_POST;
		try{
			$arr =
			[
				'nama' => $this->input->post('nama'), 
				'jk' => $this->input->post('jk'), 
				'alamat' => $this->input->post('alamat'), 
				'tempat_lahir' => $this->input->post('tempat_lahir'), 
				'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))), 
				'telp' => $this->input->post('telp'), 
				'id_desa' => $this->input->post('id_desa'),
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $_SESSION['userid']	
			];
			$this->session->set_flashdata("message", ['success', "Ubah $this->cap Berhasil", ' Berhasil']);
			$this->db->update("$this->low",$arr, ['id' => $id]);
			redirect(base_url("$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Edit Data $this->cap", ' Gagal']);
			redirect(base_url("$this->low/edit/".$id));
			// $this->add();
		}
	}
		
	public function delete($id){
		try{
			$this->db->delete("$this->low", ['id' => $id]);
			$this->session->set_flashdata("message", ['success', "Berhasil Hapus Data $this->cap", 'Berhasil']);
			redirect(base_url("$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Hapus Data $this->cap", 'Gagal']);
			redirect(base_url("$this->low/"));
		}
	}
}
