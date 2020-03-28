<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pasien extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		$this->low = "pasien";
        $this->cap = "Pasien";
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
		$data['data'] = $this->db->get("pasien")->result_array();
        $this->load->view('backend/index',$data);
    }
	
	public function add()
	{
		$data['title'] = "Tambah $this->cap";
		$data['content'] = "$this->low/_form";
        $data['data'] = null;
        $data['provinsi'] = $this->db->get("provinsi")->result_array();
		$data['type'] = 'Tambah';
		$this->load->view('backend/index',$data);
	}

	public function store(){
		$d = $_POST;
		try{
			$arr =
			[
				'no_rm' => $this->input->post('no_rm'), 
				'nama' => $this->input->post('nama'), 
				'jk' => $this->input->post('jk'), 
				'alamat' => $this->input->post('alamat'), 
				'tempat_lahir' => $this->input->post('tempat_lahir'), 
				'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))), 
				'telp' => $this->input->post('telp'), 
				'id_desa' => $this->input->post('id_desa'), 
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
	public function detail($id){
		$data['title'] = "Detail $this->cap";
		$data['content'] = "$this->low/_detail";
		$data['type'] = 'Ubah';
		$data['data'] = $this->db->query("SELECT p.*, d.name as desa, k.name as kecamatan, kab.name as kabupaten, prov.name as provinsi, a.nama as agama, pen.nama as pendidikan, pek.nama as pekerjaan FROM $this->low p 
		join desa d ON p.id_desa=d.id JOIN kecamatan k ON d.kecamatan_id=k.id 
		JOIN kabupaten kab ON k.kabupaten_id=kab.id JOIN provinsi prov ON kab.provinsi_id=prov.id
		JOIN agama a ON p.id_agama=a.id JOIN pendidikan pen ON p.id_pendidikan=pen.id JOIN pekerjaan pek ON p.id_pekerjaan = pek.id")->row_array();		
		$this->load->view('backend/index',$data);
	}
	
	public function update($id){
		$d = $_POST;
		try{
			$arr =
			[
				'no_rm' => $this->input->post('no_rm'), 
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
