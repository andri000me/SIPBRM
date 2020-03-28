<?php 

/**
 * 
 */
class mUmum extends CI_Model
{
	
	public function getDataBuku($table, $select, $orderName, $orderValue, $limit, $where = null)
	{
		$this->db->select("buku.*, p.nama as nama_pengarang, pn.nama as nama_penerbit");
        $this->db->from($table);
		$this->db->join('pengarang p', 'buku.id_pengarang=p.id');
		$this->db->join('penerbit pn', 'buku.id_penerbit=pn.id');
		$this->db->order_by($orderName, $orderValue);
		if($where != null){
			$this->db->where($where);
		}
		$this->db->limit($limit);
        // $this->db->where(['a.status' => 1]);
        return $this->db->get();
	}
	public function getLower($table, $lower, $where){
		$this->db->select("LOWER($table.$lower) as $lower, id");
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();

	}
	public function filterView($type){
		if($type == 'hari'){
			$q = "SELECT b.judul, v.view, v.tanggal as tanggal FROM `buku` b JOIN view v ON b.id=v.id_buku where date(v.tanggal) = DATE(NOW()) LIMIT 10";
		}else if($type == 'bulan'){
			$bulan = '2019-05';
			$q = "SELECT b.judul, sum(v.view) as view, v.tanggal FROM `buku` b JOIN view v ON b.id=v.id_buku WHERE v.tanggal like '%$bulan%' GROUP BY v.id_buku LIMIT 10";
		}else if($type == 'tahun'){
			$tahun = '2019';
			$q = "SELECT b.judul, sum(v.view) as view, v.tanggal FROM `buku` b JOIN view v ON b.id=v.id_buku WHERE YEAR(v.tanggal) = '$tahun' GROUP BY v.id_buku LIMIT 10";
		}else if($type == 'tanggal'){
			$tanggal = '2019-05-20';
			$q = "SELECT b.judul, sum(v.view) as view, v.tanggal FROM `buku` b JOIN view v ON b.id=v.id_buku WHERE v.tanggal = '$tanggal' GROUP BY v.id_buku LIMIT 10";
		}else if($type == 'jangka'){
			$tanggal_mulai = '';
			$tanggal_selesai = '';
			$q = "SELECT b.judul, sum(v.view) as view, v.tanggal FROM `buku` b JOIN view v ON b.id=v.id_buku WHERE v.tanggal BETWEEN '$tanggal_mulai' and '$tanggal_selesai' GROUP BY v.id_buku LIMIT 10";
		}
		return $this->db->query($q);
	}
	public function statistik($type){
		if($type == 'hari'){
			$q = "SELECT COUNT(ip_address) as jumlah, date(timestamp) as tanggal FROM `visitor` where DATE(timestamp) = DATE(NOW())";
		}else if($type == 'bulan'){
			$bulan = '2019-05';
			$q = "SELECT COUNT(ip_address) as jumlah,  DATE(timestamp) as tanggal FROM `visitor` where `timestamp` like '%$bulan%' GROUP BY date(timestamp)";
		}else if($type == 'tahun'){
			$tahun = '2019';
			$q = "SELECT COUNT(ip_address) as jumlah, YEAR(timestamp) as tanggal FROM `visitor` where YEAR(timestamp) = '$tahun'";
		}else if($type == 'tanggal'){
			$tanggal = '2019-05-20';
			$q = "SELECT COUNT(ip_address) as jumlah, DATE(timestamp) as tanggal FROM `visitor` where timestamp = '$tanggal'";
		}else if($type == 'jangka'){
			$tanggal_mulai = '';
			$tanggal_selesai = '';
			$q = "SELECT COUNT(ip_address) as jumlah FROM `visitor` where timestamp BETWEEN '$tanggal_mulai' and '$tanggal_selesai'";
		}
		return $this->db->query($q);
	}
	public function getBukuFilter($viewOrDate = null, $viewOrDateValue=null, $where = null, $limit = null, $start = null, $name = null){
		if($viewOrDate == 'view'){
			$order = " buku.view";
		}else if($viewOrDate == 'download'){
			$order = " buku.download";
		}else if($viewOrDate == "create_at"){
			$order = " buku.create_at";
		}
		$this->db->select("buku.*, p.nama as nama_pengarang, pn.nama as nama_penerbit");
        $this->db->from("buku");
		$this->db->join('pengarang p', 'buku.id_pengarang=p.id');
		$this->db->join('penerbit pn', 'buku.id_penerbit=pn.id');
		$this->db->join('kategori k', 'buku.id_kategori=k.id');
		$this->db->order_by($order, $viewOrDateValue);
		if($limit !=null && $start !== null){
			$this->db->limit($limit, $start);
		}
		if($where != null){
			$this->db->where($where);
		}
		if($name !=null){
			$this->db->or_where("buku.judul LIKE '%$name%'");
		}
        // $this->db->where(['a.status' => 1]);
        return $this->db->get();
	}	
}
 ?>