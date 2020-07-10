<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		$this->low = "laporan";
        $this->cap = "Laporan";
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
		$data['data'] = $this->db->query("SELECT * FROM pengambilan p JOIN pengembalian pem ON p.id=pem.id_pengambilan")->result_array();
        $this->load->view('backend/index',$data);
    }
	
}
