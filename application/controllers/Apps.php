<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps extends CI_Controller {

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
		parent::__Construct();
		$this->load->helper("Response_helper");
		$this->load->helper("Input_helper");
		$this->load->library('pagination');
		header('Access-Control-Allow-Origin: *');  
		// if($_SERVER['REQUEST_METHOD'] == "POST"){
		// $this->login();
		// }
		
		$this->load->model("mUmum");  
	}
	public function email(){
		$data['name'] = "Mochamad Ludfi Rahman";
        $data['email'] = "ludfyr@gmail.com";
        $data['mobile_number'] = "085232924594";
        $this->load->library('email');
 
        $this->email->from('primaitech17@gmail.com', 'Tutsmake')
            ->to($data['email'])
            ->subject('Welcome')
            ->message($this->load->view('email_template', $data, true));
 
        $this->email->send(); 
      
        $arr = array('msg' => 'Something went wrong try again lator', 'success' =>false);
 
        if($this->email->send()){
         $arr = array('msg' => 'Mail has been sent successfully', 'success' =>true);
        }
        echo json_encode($arr);
        
	}
	public function setting(){
		$data = $this->db->get("setting")->row_array();
		// $this->load->vars($data);
		return $data;
	}
	public function index()
	{
		$this->login();
	}
	public function login()
	{
		// echo md5("test");
		$app = null;
		Response_helper::render("frontend/index", ['title' => "Login", 'app' => $app, 'content' => 'home/login', 'url' => $this->uri->segment(2)]);
	}
	public function doLogin(){
		$d = $_POST;
        if(!$d){
            redirect(base_url(""));
        }
        try {
            if($d){
                $a = $this->db->get_where("pengguna", ['email' => $d['email']])->result_array();
                // print_r($a);
                // echo count($a);
                // $a = $this->akun->Select('*', "WHERE email = '$d[email]'")[1];

                if(count($a) < 1) {
                    $this->session->set_flashdata("message", ['danger', 'Login gagal, silahkan cek email anda kembali', ' Gagal']);
                    return $this->index();
                }

                $a = $a[0];
                if($a['status'] == 0) {
                    $this->session->set_flashdata("message", ['danger', 'Login gagal, Akun anda sedang dinonaktifkan', ' Gagal']);
                    return $this->index();
                }
                if(!password_verify($d['password'], $a['password'])) {
                    $this->session->set_flashdata("message", ['danger', 'Login gagal, Password anda salah', ' Gagal']);
                    return $this->index();
                }

                $_SESSION['userid'] = $a['id'];
                $_SESSION['userlevel'] = $a['level'];
                redirect(base_url("dashboard"));
            }
        }
        catch(Exception $e) {
            // $this->login();
            echo "gagal";
        }
		// $_SESSION['id'] = $cekData['id'];
		// $_SESSION['email'] = $cekData['email'];
		// $_SESSION['nama'] = $cekData['nama'];
		// $_SESSION['level'] = $cekData['level'];
	}
	public function doRegister(){
		$d = $_POST;
		$dateCreate = date('Y-m-d H:i:s');
		try{
		$password = $d['password'];
		$nik = $d['nik'];
		$password_konfirmasi = $d['password_konfirmasi'];
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$jumlahNik = $this->db->get_where("akun", ['nik' => $d['nik']])->num_rows();
		$jumlahEmail = $this->db->get_where("akun", ['email' => $d['email']])->num_rows();
		$rand = Input_helper::randomString(8);
		$app = $this->setting();
		if(strlen($nik) < 16 || strlen($nik) > 16){
			$this->session->set_flashdata("message", ['danger', 'Nik Harus Memiliki 16 digit']);
			Response_helper::render("frontend/index", ['title' => "Ebeca - Halaman Register", 'app' => $app, 'content' => 'home/register', 'url' => $this->uri->segment(2), 'captcha' => $rand]);
		}else if($jumlahNik > 0){
			$this->session->set_flashdata("message", ['danger', 'Nik Anda Sudah Terpakai']);
			Response_helper::render("frontend/index", ['title' => "Ebeca - Halaman Register", 'app' => $app, 'content' => 'home/register', 'url' => $this->uri->segment(2), 'captcha' => $rand]);
		}else if($jumlahEmail > 0){
			$this->session->set_flashdata("message", ['danger', 'Email Anda Sudah Terpakai']);
			Response_helper::render("frontend/index", ['title' => "Ebeca - Halaman Register", 'app' => $app, 'content' => 'home/register', 'url' => $this->uri->segment(2), 'captcha' => $rand]);
		}else if(!$uppercase || !$lowercase || !$number || strlen($password)<=6){
			$this->session->set_flashdata("message", ['danger', 'password harus lebih dari 6 karakter, mengandung huruf BESAR, huruf kecil dan angka']);
			Response_helper::render("frontend/index", ['title' => "Ebeca - Halaman Register", 'app' => $app, 'content' => 'home/register', 'url' => $this->uri->segment(2), 'captcha' => $rand]);
		}else if($password != $password_konfirmasi){
			$this->session->set_flashdata("message", ['danger', 'Password tidak sama dengan password konfirmasi ']);
			Response_helper::render("frontend/index", ['title' => "Ebeca - Halaman Register", 'app' => $app, 'content' => 'home/register', 'url' => $this->uri->segment(2), 'captcha' => $rand]);
		}else if($d['captcha'] != $d['cHidden']){
			$this->session->set_flashdata("message", ['danger', 'Captcha anda tidak valid']);
			Response_helper::render("frontend/index", ['title' => "Ebeca - Halaman Register", 'app' => $app, 'content' => 'home/register', 'url' => $this->uri->segment(2), 'captcha' => $rand]);
		}else{
			$arr = [
			  'nik' => $d['nik'], 
			  'nama' => $d['nama'],
			  'email' => $d['email'], 
			  'no_hp' => $d['no_hp'], 
			  'alamat' => $d['alamat'],
			  'level' => 3,
			  'password' => md5($d['password']),
			  'create_at' => $dateCreate];
			  $this->db->insert("akun", $arr);
			  $this->session->set_flashdata("message", ['success', 'Berhasil Register tunggu konfirmasi dari admin']);
			  redirect(base_url('apps/login'));
		  }
		}catch(Exception $e){
		  $this->session->set_flashdata("message", ['success', 'Gagal Tambah '.$this->uri->segment(1)]);
		  $this->add();
		}
	}
	public function logout(){
		session_destroy();
		redirect(base_url());
	}
	public function download($id, $url){
		$d = $this->db->get_where("buku", ['id' => $id])->row_array();
		$this->db->update("buku", ['download'=>$d['download']+1], ['id' => $id]);
		header("Content-type:application/pdf");
		echo file_get_contents(str_replace('system', 'assets', BASEPATH)."upload/file/$d[file]");
	}

	public function view($id, $url){
		$data['data'] = ['id' => $id,  'url' => $url];
		$this->load->view("report/view", $data);
	}
	public function filter($filterName = "view", $filterValue="desc"){
		$data['app'] = $this->setting();
		$filterArray = null;
		$config['base_url'] = base_url()."apps/filter/$filterName/$filterValue";
		$config['per_page'] = 20;
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$from = ($this->uri->segment(5) == "" ? 0 : $this->uri->segment(5));
		$data['jumlah_data'] = $this->mUmum->getBukuFilter($filterName, $filterValue, $filterArray)->num_rows();
		$config['total_rows'] = $data['jumlah_data'];
		
		$this->pagination->initialize($config);
		$name = null;
		$data['pagination'] = $this->pagination->create_links();	
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$d = $_POST;
			$filterArray = [];
			if($d['kategori']){
				$filterArray['k.id'] = $d['kategori'];
			}
			if($d['pengarang']){
				$filterArray['p.id'] = $d['pengarang'];
			}
			if($d['penerbit']){
				$filterArray['pn.id'] = $d['penerbit'];
			}
			if($d['order_by']){
				$filterName = $d['order_by'];
			}
			if($d['order_by_value']){
				$filterValue = $d['order_by_value'];
			}

			if($d['search']){
				$name = $d['search'];
			}
			// print_r($filterArray);
		}
		$data['buku'] = $this->mUmum->getBukuFilter($filterName, $filterValue, $filterArray, $config['per_page'], $from, $name)->result_array();
		$data['kategori'] = $this->db->get("kategori")->result_array();
		$data['pengarang'] = $this->db->get("pengarang")->result_array();
		$data['penerbit'] = $this->db->get("penerbit")->result_array();
		$data['title'] = "Ebeca - Halaman Filter";
		$data['content'] = "home/filter";
		$data['action'] = 'Filter';
		$data['url'] = $this->uri->segment(2);
		// echo "<pre>";
		// print_r($data);
		$this->load->view('frontend/index',$data);
		
	}
	public function pass(){
		$input = "SmackFactory";

		$encrypted = $this->encryptIt( $input );
		$decrypted = $this->decryptIt( $encrypted );

		echo $encrypted . '<br />' . $decrypted;
	}

	function encryptIt( $q ) {
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
		$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
		return( $qEncoded );
	}

	function decryptIt( $q ) {
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
		$qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
		return( $qDecoded );
	}
	public function pengaturan(){
		$data['app'] = $this->setting();
		$data['title'] = "Pengaturan Aplikasi";
		$data['data'] = $this->db->get("setting")->row_array();
		$data['content'] = "pengaturan/settings";
		$data['action'] = "Ubah data";
		$this->load->view('backend/index',$data);
	}
}
