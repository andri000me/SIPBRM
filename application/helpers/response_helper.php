<?php
/**
*
*/
class Response_helper
{

	public static function part($file)
	{
		include str_replace("system", "application/views/", BASEPATH) . "part/$file.php";
	}
	
	public static function getData(){
		$CI =& get_instance();
		$token = "1048537149:AAEjn0E8xMhUGna-q48mtk0-M3GfDxcT-_I";
		$now = date("Y-m-d H:i:s");
		// echo "SELECT p.*, pg.chat_id, p.nama_pasien FROM peminjaman p 
		// JOIN pengguna pg ON p.created_by=pg.id 
		// where tanggal_harus_kembali <= '$now'";
		$list = $CI->db->query("SELECT p.*, pg.chat_id, p.nama_pasien FROM peminjaman p 
		JOIN pengguna pg ON p.created_by=pg.id 
		where tanggal_harus_kembali <= '$now'")->result_array();
		foreach ($list as $d) {
			// echo $d['no_rm']."<br>";
			// echo $d['nama']."<br>";
			$pesan = "Notifikasi Aplikasi \n no rekam medis *$d[no_rm] & nama pasien $d[nama_pasien]*  hrs segera dikembalikan";
			// $CI->db->update("peminjaman", ['status_notif' => 1], ['id' => $d['id']]);
			$cek = $CI->db->get_where("peminjaman", ['status_notif' => 0, 'id' => $d['id']])->num_rows();
			// echo $cek;
			if($cek > 0){
				$CI->db->query("UPDATE peminjaman set status_notif=1 where id=$d[id] and status_notif=0");
				Response_Helper::notification($d['chat_id'], $pesan, $token);
			}
		}
	}
	public static function notification($telegram_id, $message_text, $secret_token){
		$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
		$url = $url . "&text=" . urlencode($message_text);
		$ch = curl_init();
		$optArray = array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
		curl_close($ch);
	}
	public static function price($n, $precision = 2)
	{
		$re = "Rp ".number_format($n, 0,',','.');
		
		return $re;
	}
	
	public static function duit($n)
	{
		$re = number_format($n, 0,',','.');
		return $re;
	}

	public static function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return trim($temp);
	}
 
	// function terbilang($nilai) {
	// 	if($nilai<0) {
	// 		$hasil = "minus ". trim(penyebut($nilai));
	// 	} else {
	// 		$hasil = trim(penyebut($nilai));
	// 	}     		
	// 	return $hasil;
	// }

	public static function tanggal($tgl)
	{
		$qq='';
		$k = explode("-",$tgl);
		$bln = array('', 'Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember' );
		$qq = $k[2].' '.$bln[(int)$k[1]].' '.$k[0];
		return $qq;
	}
	public static function tanggalbulan($tgl)
	{
		$qq='';
		$k = explode("-",$tgl);
		$bln = array('', 'Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember' );
		$qq = $bln[(int)$k[0]].' '.$k[1];
		return $qq;
	}
	public static function bulantahun($tgl)
	{
		$qq='';
		$k = explode("-",$tgl);
		$bln = array('', 'Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember' );
		$qq = $bln[(int)$k[1]].' '.$k[0];
		return $qq;
	}
	public static function tanggalrange($tgl)
	{
		$qq='';
		$k = explode("/",$tgl);
		$bln = array('', 'Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember' );
		$qq = $k[1].' '.$bln[(int)$k[0]].' '.$k[2];
		return $qq;
	}
	public static function waktu($tgl)
	{
		$qq='';
		$k = explode(" ",$tgl);
		$kk = explode("-",$k[0]);
		$bln = array('', 'Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember' );
		
		$qq = $kk[2].' '.$bln[(int)$kk[1]].' '.$kk[0].' '.$k[1];
		return $qq;
	}
	public static function waktupersen($tgl)
	{
		$qq='';
		$k = explode("%",$tgl);
		$kk = explode("-",$k[0]);
		$bln = array('', 'Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember' );
		
		$qq = $kk[2].' '.$bln[(int)$kk[1]].' '.$kk[0].' '.$k[1];
		return $qq;
	}
	public static function render($file, $var = []){
		extract($var);
		include str_replace("system", "application/views", BASEPATH)."/".$file.".php";
	}
	public static function test(){
		return "berhasil";
	}
	public static function get_nama_karyawan($kode_rab)
	{
		$ci = get_instance();
		$cekData = $ci->db->get_where("karyawan", ['kode_karyawan' => $kode_rab])->row_array();
		return $cekData['nama_karyawan'];
	}

	public static function hari_ini(){
		$hari = date ("D");
	
		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
	
			case 'Mon':			
				$hari_ini = "Senin";
			break;
	
			case 'Tue':
				$hari_ini = "Selasa";
			break;
	
			case 'Wed':
				$hari_ini = "Rabu";
			break;
	
			case 'Thu':
				$hari_ini = "Kamis";
			break;
	
			case 'Fri':
				$hari_ini = "Jumat";
			break;
	
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			
			default:
				$hari_ini = "Tidak di ketahui";		
			break;
		}
	
		return $hari_ini;
	
	}
	public static function cetak($kata){
		return htmlentities($kata, ENT_QUOTES, 'UTF-8');

	}

	public static function rentangwaktu($mulai, $akhir, $tipe = 1){
		$lama = '';
		$date1 = new DateTime($mulai);
		$date2 = new DateTime($akhir);
		$interval = $date2->diff($date1);
		if($tipe == 1){	
			$lama = $interval->format('%Y Tahun, %m Bulan, %d Hari');
		}else if($tipe == 2){	
			$lama = $interval->format('%m Bulan, %d Hari');
		}else if($tipe == 3){	
			$lama = $interval->format('%d Hari');
		}else if($tipe == 4){	
			$lama = $interval->format('%d Hari %h Jam');
		}

		return $lama;
	}

	
	public static function getformatfile($file){
		$lama = '';
		
		$fr = explode(".", $file);
		$lama = $fr[1];

		return $lama;
	}
}
