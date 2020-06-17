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
    // public function getPengguna(){
    //     if($_SERVER['REQUEST_METHOD'] == "POST"){
    //         $email = $_POST['email'];
    //         $q = $this->db->get_where("pengguna", ['email' => $email])->row_array();
    //         echo json_encode($q);
    //     }
    // }
    public function loginTelegram($data){
        // if($_SERVER['REQUEST_METHOD'] == "POST"){
            // $email = $_POST['email'];
        $data = explode("_", $data);
        $email = $data[0];
        $password = $data[1];
        
        try {
                $a = $this->db->get_where("pengguna", ['email' => $email])->result_array();
                // print_r($a);
                // echo count($a);
                // $a = $this->akun->Select('*', "WHERE email = '$d[email]'")[1];
                if(count($a) < 1) {
                    $response = ["message" => 'Login gagal, silahkan cek email anda kembali'];
                }else{
                    $a = $a[0];
                    if($a['status'] == 0) {
                        $response = ["message" => 'Login gagal, Akun anda sedang dinonaktifkan'];
                    }else{
                        if(!password_verify($password, $a['password'])) {
                            $response = ["message" => 'Login gagal, Password anda salah'];
                        }else{
                            $chat_id = $data[2];
                            $this->db->update("pengguna", ['chat_id' => $chat_id], ['email' => $email]);
                            $response = ["message" => 'Login Berhasil', 'data' => $a];
                        }
                       
                    }
                    
                }
                
        }
        catch(Exception $e) {
            // $this->login();
            $response = ["message" => 'Login gagal'];
        }
        echo json_encode($response);
        // }
    }
}