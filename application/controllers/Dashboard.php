<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
   function __construct()
  	{
      parent::__construct();
      $this->load->helper("Response_helper");
      $this->load->helper("Input_helper");
      $this->load->helper("Phpexcel_helper");
		$this->load->model("mUmum");
  	}
	public function index()
	{
		$data['title'] = "Berkas - Dashboard Berkas";
		$data['content'] = "dashboard/index";
		$data['buku'] = [];
		$data['pinjam'] = $this->db->get("peminjaman")->result_array();
		$data['telat'] = [];
		$data['pengguna'] = $this->db->get("pengguna")->result_array();
		$data['pasien'] = [];
		redirect(base_url().'pengguna');
		$this->load->view('backend/index',$data);
	}
}
