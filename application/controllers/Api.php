<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function kabupaten($id){
        $q = $this->db->get_where("kabupaten", ['provinsi_id' => $id])->result_array();
        echo json_encode($q);
    }
    public function kategori(){
        $lists = $this->db->get("kategori")->result_array();
        echo json_encode($lists);
    }
    public function kabupaten_all(){
        $q = $this->db->get("kabupaten")->result_array();
        echo json_encode($q);
    }
    public function kecamatan($id){
        $q = $this->db->get_where("kecamatan", ['kabupaten_id' => $id])->result_array();
        echo json_encode($q);
    }
    public function kecamatan_all(){
        $q = $this->kecamatan->select("*")[1];
        echo json_encode($q);
    }
    public function desa($id){
        $q = $this->db->get_where("desa", ['kecamatan_id' => $id])->result_array();
        echo json_encode($q);
    }
    public function desa_all(){
        $q = $this->desa->select("*")[1];
        echo json_encode($q);
    }
    public function edit_desa($id){
        $data = $this->db->get_where("desa", ["id" => $id])->row_array();
        $q = $this->db->get_where("desa", ['kecamatan_id' => $data['kecamatan_id']])->result_array();
        echo json_encode($q);
    }
    public function edit_kecamatan($id){
        $data = $this->db->get_where("kecamatan", ["id" => $id])->row_array();
        $q = $this->db->get_where("kecamatan", ['kabupaten_id' => $data['kabupaten_id']])->result_array();

        echo json_encode($q);
    }
    public function edit_kabupaten($id){
        $data = $this->db->get_where("kabupaten", ["id" => $id])->row_array();
        $q = $this->db->get_where("kabupaten", ['provinsi_id' => $data['provinsi_id']])->result_array();

        echo json_encode($q);
    }
    public function edit_provinsi($id){
        $q = $this->db->get("provinsi")->result_array();
        echo json_encode($q);
    }
}