<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function create($table,$data){
	 return	$this->db->insert($table,$data);
	}

	public function read($table){
		$this->db->from($table);
		$query=$this->db->get();
		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function read_where($where,$id,$table){
		$this->db->where($where, $id);
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}
	
		public function read_where_dual($where1,$id1,$where2,$id2,$table){
		$array = array($where1 => $id1, $where2 => $id2);

		$this->db->where($array); 
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function read_where_tri($where1,$id1,$where2,$id2,$where3,$id3,$table){
		$array = array($where1 => $id1, $where2 => $id2, $where3 => $id3);

		$this->db->where($array); 
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function read_detail($where,$id,$table){
		$this->db->where($where, $id);
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			$data = $query->row();
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function read_detail_dual($where1,$id1,$where2,$id2,$table){
		$array = array($where1 => $id1, $where2 => $id2);

		$this->db->where($array); 
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			$data = $query->row();
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function read_detail_tri($where1,$id1,$where2,$id2,$where3,$id3,$table){
		$array = array($where1 => $id1, $where2 => $id2, $where3 => $id3);

		$this->db->where($array); 
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			$data = $query->row();
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function update_data($data,$where,$id,$table){
		$this->db->where($where,$id);
		return $this->db->update($table,$data);
	}

	public function update_data_dual($data,$where1,$id1,$where2,$id2,$table){
		$where = array($where1 => $id1, $where2 => $id2);
		$this->db->where($where);
		return $this->db->update($table, $data); 
	}

	public function delete($where,$id,$table){
		//Query DELETE ... WHERE id=...
		return $this->db->where($where, $id)
				 ->delete($table);
	}	

	public function delete_dual($where1,$id1,$where2,$id2,$table){
		//Query DELETE ... WHERE id=...
		$array = array($where1 => $id1, $where2 => $id2);
		return $this->db->where($array)
				 ->delete($table);
	}		

/////////////////////////////////////Model SIPSO/////////////////////////////////////////////	
	public function list_dosenpa(){
		$query = $this->db->query(
	        "SELECT mahasiswa.*, mahasiswa.nama as nama_mhs,dosen.*,dosenpa.id as id_dosenpa
	        FROM dosenpa 
	        JOIN mahasiswa 
	        ON dosenpa.nim = mahasiswa.nim
	        JOIN dosen 
	        ON dosenpa.noreg = dosen.noreg
	        ");


		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function dosenpa_where($where,$id){
		$query = $this->db->query(
	        "SELECT mahasiswa.*, mahasiswa.nama as nama_mhs,dosen.*,dosenpa.id as id_dosenpa, outline.*
	        FROM dosenpa 
	        INNER JOIN mahasiswa 
	        ON dosenpa.nim = mahasiswa.nim
			INNER JOIN outline 
	        ON dosenpa.nim = outline.nim
	        INNER JOIN dosen 
	        ON dosenpa.noreg = dosen.noreg
	        WHERE dosenpa.$where = '$id'
	        ");


		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function list_mahasiswa_sidang_dospem($where,$id){
		$query = $this->db->query(
	        "SELECT mahasiswa.*, mahasiswa.nama as nama_mhs,dosen.*,dospem.id as id_dospem, daftar_sidang.*
	        FROM dospem 
	        INNER JOIN mahasiswa 
	        ON dospem.nim = mahasiswa.nim
			INNER JOIN daftar_sidang 
	        ON dospem.nim = daftar_sidang.nim
	        INNER JOIN dosen 
	        ON dospem.noreg = dosen.noreg
	        WHERE dospem.$where = '$id' AND daftar_sidang.accstaff IS NOT NULL
	        ");
		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function dosenpa_where_detail($where,$id){
		$query = $this->db->query(
	        "SELECT mahasiswa.*, mahasiswa.nama as nama_mhs,dosen.*,dosenpa.id as id_dosenpa, dosen.nama AS nama_dsn
	        FROM dosenpa 
	        INNER JOIN mahasiswa 
	        ON dosenpa.nim = mahasiswa.nim
	        INNER JOIN dosen 
	        ON dosenpa.noreg = dosen.noreg
	        WHERE dosenpa.$where = '$id'
	        ");


		if($query->num_rows() >0){
			$data = $query->row();
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	

	public function dospem_where_detail($where,$id){
		$query = $this->db->query(
	        "SELECT mahasiswa.*, mahasiswa.nama as nama_mhs,dosen.*,dospem.id as id_dospem, dosen.nama AS nama_dsn, outline.*
	        FROM dospem 
	        INNER JOIN mahasiswa 
	        ON dospem.nim = mahasiswa.nim
			INNER JOIN outline 
	        ON dospem.nim = outline.nim
	        INNER JOIN dosen 
	        ON dospem.noreg = dosen.noreg
	        WHERE dospem.$where = '$id'
	        ");


		if($query->num_rows() >0){
			$data = $query->row();
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function duplicate($where,$id,$asal,$tujuan){
		return $this->db->query(
	        "INSERT INTO $tujuan ($tujuan.nim,$tujuan.nama,$tujuan.jurusan,$tujuan.tempat,$tujuan.tgllahir,$tujuan.alamat,$tujuan.tlpr,$tujuan.nohp,$tujuan.nmp,$tujuan.ns,$tujuan.topik1,$tujuan.topik2,$tujuan.dospem,$tujuan.yajukan,$tujuan.konsen,$tujuan.lmedpel,$tujuan.lstatis,$tujuan.lkkp,$tujuan.l128,$tujuan.ufmhs,$tujuan.usbs,$tujuan.uspu,$tujuan.ukst,$tujuan.utn,$tujuan.ukhs,$tujuan.upro1,$tujuan.upro2,$tujuan.tgl_daftar,$tujuan.accstaff,$tujuan.tglaccstaff,$tujuan.accdsnpa,$tujuan.tglaccdsnpa,$tujuan.acckaprodi,$tujuan.status_outline,$tujuan.dospemfix,$tujuan.topikfix,$tujuan.outline_fix,$tujuan.komentar,$tujuan.revisi,$tujuan.catatan,$tujuan.judul_revisi,$tujuan.outline_revisi,$tujuan.tglacckaprodi)
			SELECT $asal.nim,$asal.nama,$asal.jurusan,$asal.tempat,$asal.tgllahir,$asal.alamat,$asal.tlpr,$asal.nohp,$asal.nmp,$asal.ns,$asal.topik1,$asal.topik2,$asal.dospem,$asal.yajukan,$asal.konsen,$asal.lmedpel,$asal.lstatis,$asal.lkkp,$asal.l128,$asal.ufmhs,$asal.usbs,$asal.uspu,$asal.ukst,$asal.utn,$asal.ukhs,$asal.upro1,$asal.upro2,$asal.tgl_daftar,$asal.accstaff,$asal.tglaccstaff,$asal.accdsnpa,$asal.tglaccdsnpa,$asal.acckaprodi,$asal.status_outline,$asal.dospemfix,$asal.topikfix,$asal.outline_fix,$asal.komentar,$asal.revisi,$asal.catatan,$asal.judul_revisi,$asal.outline_revisi,$asal.tglacckaprodi FROM $asal
			WHERE $asal.$where = '$id'
	        ");
	}
	public function notif($id){
		$notif = $this->db->query(
	        "SELECT * from info
	        WHERE username = '$id' AND lihat is NULL
	        ");
		return $notif->num_rows();
	}

	public function liatnotif($id){
		$notif = $this->db->query(
	        "UPDATE info
			SET lihat = 'read'
			WHERE username = '$id' AND lihat is NULL
	        ");
	}

	public function bimbingan($id){
		$data = $this->db->query(
	        "SELECT * from log_book
	        WHERE id_dospem = '$id'
	        ");
		return $data->num_rows();
	}

	public function cek_belum_tervalidasi($id){
		$data = $this->db->query(
	        "SELECT * from log_book
	        WHERE id_dospem = '$id' AND accdospem IS NULL
	        ");
		return $data->num_rows();
	}
	public function cek_sudah_tervalidasi($id){
		$data = $this->db->query(
	        "SELECT * from log_book
	        WHERE id_dospem = '$id' AND accdospem IS NOT NULL
	        ");
		return $data->num_rows();
	}

	public function cek_validasi_logbook($id){
		$query = $this->db->query(
	        "SELECT * from log_book
	        WHERE id_dospem = '$id'
	        ORDER BY tanggal DESC
	        LIMIT 1
	        ");

		if($query->num_rows() >0){
			$data = $query->row();
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function cek_ganti_judul($id){
		$query = $this->db->query(
	        "SELECT * from ganti_judul
	        WHERE nim = '$id'
	        ORDER BY tgl_mengajukan DESC
	        LIMIT 1
	        ");

		if($query->num_rows() >0){
			$data = $query->row();
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function cek_ganti_pembimbing($id){
		$query = $this->db->query(
	        "SELECT * from ganti_dospem
	        WHERE nim = '$id'
	        ORDER BY tgl_mengajukan DESC
	        LIMIT 1
	        ");

		if($query->num_rows() >0){
			$data = $query->row();
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}
/////////////////////////////////////////////////////////WIDGET DOsen////////////////////////////
	public function widget_kaprodi_approve($id){
		$query = $this->db->query(
	        "SELECT *
	        FROM outline 
	        WHERE jurusan = '$id' AND acckaprodi IS NULL
	        ");

		return $query->num_rows();
	}

	public function widget_kaprodi_mhs($id){
		$query = $this->db->query(
	        "SELECT *
	        FROM mahasiswa 
	        WHERE jurusan = '$id'
	        ");

		return $query->num_rows();
	}

	public function widget_dosenpa_validasi($id){
		$query = $this->db->query(
	        "SELECT mahasiswa.*, mahasiswa.nama as nama_mhs,dosen.*,dosenpa.id as id_dosenpa, dosen.nama AS nama_dsn, outline.*
	        FROM dosenpa 
	        INNER JOIN mahasiswa 
	        ON dosenpa.nim = mahasiswa.nim
			INNER JOIN outline 
	        ON dosenpa.nim = outline.nim
	        INNER JOIN dosen 
	        ON dosenpa.noreg = dosen.noreg
	        WHERE dosenpa.noreg = '$id' AND outline.accdsnpa IS NULL
	        ");

		return $query->num_rows();
	}

	public function widget_dosenpa_mahasiswa($id){
		$query = $this->db->query(
	        "SELECT mahasiswa.*, mahasiswa.nama as nama_mhs,dosen.*,dosenpa.id as id_dosenpa, dosen.nama AS nama_dsn
	        FROM dosenpa 
	        INNER JOIN mahasiswa 
	        ON dosenpa.nim = mahasiswa.nim
	        INNER JOIN dosen 
	        ON dosenpa.noreg = dosen.noreg
	        WHERE dosenpa.noreg = '$id'
	        ");

		return $query->num_rows();
	}

	public function widget_dospem_mahasiswa($id){
		$query = $this->db->query(
	        "SELECT mahasiswa.*, mahasiswa.nama as nama_mhs,dosen.*,dospem.id as id_dospem, dosen.nama AS nama_dsn
	        FROM dospem 
	        INNER JOIN mahasiswa 
	        ON dospem.nim = mahasiswa.nim
	        INNER JOIN dosen 
	        ON dospem.noreg = dosen.noreg
	        INNER JOIN judul_skripsi 
			ON dospem.nim = judul_skripsi.nim
	        WHERE dospem.noreg = '$id' AND judul_skripsi.status='proses'
	        ");

		return $query->num_rows();
	}

	public function list_mahasiswapa($id){
		$query = $this->db->query(
	        "SELECT mahasiswa.*, mahasiswa.nama as nama_mhs,dosen.*,dosenpa.id as id_dosenpa,dosen.nama AS nama_dsn
	        FROM dosenpa 
	        INNER JOIN mahasiswa 
	        ON dosenpa.nim = mahasiswa.nim
	        INNER JOIN dosen 
	        ON dosenpa.noreg = dosen.noreg
	        WHERE dosenpa.noreg = '$id'
	        ");


		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function list_mahasiswaskripsi($id){
		$query = $this->db->query(
	        "SELECT mahasiswa.*, mahasiswa.nama as nama_mhs,dosen.*,dospem.id as id_dospem,dosen.nama AS nama_dsn
	        FROM dospem 
	        INNER JOIN mahasiswa 
	        ON dospem.nim = mahasiswa.nim
	        INNER JOIN dosen 
	        ON dospem.noreg = dosen.noreg
	        WHERE dospem.noreg = '$id'
	        ");


		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function read_orderby1($table,$order,$type){
		$this->db->order_by($order, $type);
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function read_orderby($where,$id,$table,$order,$type){
		$this->db->where($where, $id);
		$this->db->order_by($order, $type);
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function read_orderby_dual($where1,$id1,$where2,$id2,$table,$order,$type){
		$array = array($where1 => $id1, $where2 => $id2);
		$this->db->where($array); 
		$this->db->order_by($order, $type);
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function dospem_verify_daftarsidang($noreg){
		$query = $this->db->query(
	        "SELECT *
	        FROM daftar_sidang 
	        INNER JOIN judul_skripsi 
			ON daftar_sidang.nim = judul_skripsi.nim
	        WHERE daftar_sidang.dospem = '$noreg' AND daftar_sidang.accdospem is NULL AND daftar_sidang.accstaff is NOT NULL AND judul_skripsi.status='proses'
	        ");

		return $query->num_rows();

	}

	public function dosenpa_verify_outline($noreg){
		$query = $this->db->query(
	        "SELECT *
	        FROM dosenpa 
	        INNER JOIN outline 
	        ON dosenpa.nim = outline.nim
	        WHERE dosenpa.noreg = '$noreg' AND outline.accdsnpa is NULL AND outline.accstaff is NOT NULL
	        ");

		return $query->num_rows();

	}
	//////////////////////////////////////KAPRODI///////////////////

	public function kaprodi_verify_daftarsidang($prodi){
		$query = $this->db->query(
	        "SELECT *
	        FROM daftar_sidang 
	        WHERE program_studi = '$prodi' AND acckaprodi is NULL AND accstaff is NOT NULL
	        ");

		return $query->num_rows();

	}
	public function kaprodi_verify_outline($prodi){
		$query = $this->db->query(
	        "SELECT *
	        FROM outline 
	        WHERE jurusan = '$prodi' AND acckaprodi is NULL AND accstaff is NOT NULL
	        ");

		return $query->num_rows();

	}
	///////////////staff////////////////////
	public function hitung_surat(){
		$query = $this->db->query(
	        "SELECT *
	        FROM outline 
	        WHERE no_surat != ''
	        ");

		return $query->num_rows();

	}

	public function staff_verify_daftarsidang(){
		$query = $this->db->query(
	        "SELECT *
	        FROM daftar_sidang 
	        WHERE accstaff is NULL
	        ");

		return $query->num_rows();

	}

	public function staff_verify_outline(){
		$query = $this->db->query(
	        "SELECT *
	        FROM outline 
	        WHERE accstaff is NULL
	        ");

		return $query->num_rows();

	}

	public function lap_draft_outline($daritgl,$sampaitgl,$prodi,$order,$type){
		$query = $this->db->query(
	        "SELECT outline.*, dosen.nama as nama_dosen
	        FROM outline 
	        INNER JOIN dosen 
	        ON outline.dospem = dosen.noreg
	        WHERE tgl_daftar BETWEEN date('$daritgl') AND date('$sampaitgl') AND jurusan='$prodi' ORDER BY $order $type
	        ");


		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function lap_hasil_outline_diterima($daritgl,$sampaitgl,$prodi,$order,$type){
		$query = $this->db->query(
	        "SELECT outline.*, dosen.nama as nama_dosen
	        FROM outline 
	        INNER JOIN dosen 
	        ON outline.dospem = dosen.noreg
	        WHERE tgl_daftar BETWEEN date('$daritgl') AND date('$sampaitgl') AND jurusan='$prodi' AND status_outline='Diterima' ORDER BY $order $type
	        ");


		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function lap_hasil_outline_ditolak($daritgl,$sampaitgl,$prodi,$order,$type){
		$query = $this->db->query(
	        "SELECT log_outline.*, dosen.nama as nama_dosen
	        FROM log_outline 
	        INNER JOIN dosen 
	        ON log_outline.dospem = dosen.noreg
	        WHERE tgl_daftar BETWEEN date('$daritgl') AND date('$sampaitgl') AND jurusan='$prodi' AND status_outline='Ditolak' ORDER BY $order $type
	        ");


		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function lap_pendaftaran_sidang($daritgl,$sampaitgl,$prodi,$order,$type){
		$query = $this->db->query(
	        "SELECT daftar_sidang.*, dosen.nama as nama_dosen
	        FROM daftar_sidang 
	        INNER JOIN dosen 
	        ON daftar_sidang.dospem = dosen.noreg
	        WHERE tgl_daftar BETWEEN date('$daritgl') AND date('$sampaitgl') AND program_studi='$prodi' ORDER BY $order $type
	        ");


		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function lap_jadwal_sidang($idtanggal,$prodi){
		$query = $this->db->query(
	        "
	        SELECT *
	        FROM jadwal_sidang 
	        INNER JOIN daftar_sidang 
	        ON jadwal_sidang.nim = daftar_sidang.nim
	        WHERE daftar_sidang.program_studi = '$prodi' AND jadwal_sidang.tanggal_id = '$idtanggal' ORDER BY daftar_sidang.dospem ASC
	        ");


		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function list_tanggal_sidang($table,$order,$type){
		$this->db->order_by($order, $type);
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function jumlah_tanggal_sidang(){
		$query = $this->db->query(
	        "SELECT *
	        FROM tanggal_sidang 
	        ");

		return $query->num_rows();

	}

	public function total_revisi($nim,$noreg){
		$query = $this->db->query(
	        "SELECT *
	        FROM revisi_skripsi 
	        WHERE nim = '$nim' AND penguji = '$noreg'
	        ");

		return $query->num_rows();
	}

	public function jumlah_revisi_diterima($nim,$noreg){
		$query = $this->db->query(
	        "SELECT *
	        FROM revisi_skripsi 
	        WHERE nim = '$nim' AND penguji = '$noreg' AND ISNULL(accpenguji)
	        ");

		return $query->num_rows();
	}


	public function list_mahasiswasidang_staff($where,$id,$table,$order, $type){
		$this->db->where($where, $id);
		$this->db->order_by($order, $type);
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function belum_ada_dijadwal(){
		$query = $this->db->query(
	        "SELECT * 
			FROM daftar_sidang 
			LEFT JOIN jadwal_sidang ON daftar_sidang.nim = jadwal_sidang.nim
			WHERE ISNULL(jadwal_sidang.nim) AND daftar_sidang.acckaprodi IS NOT NULL
	        ");

		return $query->num_rows();
	}

	public function notif_help_desk(){
		$query = $this->db->query(
	        "SELECT * 
			FROM help_desk
			WHERE ISNULL(respon)
	        ");

		return $query->num_rows();
	}

	public function notif_logbook_pembimbing($noreg){

		$query = $this->db->query(
	        "SELECT * 
			FROM log_book
			INNER JOIN dospem 
			ON log_book.id_dospem = dospem.id
			INNER JOIN judul_skripsi 
			ON dospem.nim = judul_skripsi.nim
			WHERE dospem.noreg ='$noreg' AND ISNULL(log_book.accdospem) AND judul_skripsi.status = 'proses'
	        ");

		return $query->num_rows();
	}

	public function notif_ganti_pembimbing(){
		$query = $this->db->query(
	        "SELECT * 
			FROM ganti_dospem
			WHERE ISNULL(accstaff)
	        ");

		return $query->num_rows();
	}

	public function notif_ganti_judul(){
		$query = $this->db->query(
	        "SELECT * 
			FROM ganti_judul 
			WHERE ISNULL(accstaff)
	        ");

		return $query->num_rows();
	}
	public function notif_ganti_judul_dospem($id){
		$query = $this->db->query(
	        "SELECT *
			FROM dospem 
			INNER JOIN ganti_judul 
			ON dospem.nim = ganti_judul.nim
			INNER JOIN mahasiswa 
			ON dospem.nim = mahasiswa.nim
			WHERE dospem.noreg = '$id' AND ISNULL(ganti_judul.accdospem)
	        ");

		return $query->num_rows();
	}

	public function notif_ganti_judul_kaprodi($id){
		$query = $this->db->query(
	        "SELECT *
			FROM mahasiswa 
			INNER JOIN ganti_judul 
			ON mahasiswa.nim = ganti_judul.nim
			WHERE mahasiswa.jurusan = '$id' AND ganti_judul.accdospem IS NOT NULL AND ISNULL(ganti_judul.acckaprodi)
	        ");

		return $query->num_rows();
	}

	public function notif_ganti_pembimbing_kaprodi($id){
		$query = $this->db->query(
	        "SELECT *
			FROM mahasiswa 
			INNER JOIN ganti_dospem 
			ON mahasiswa.nim = ganti_dospem.nim
			WHERE mahasiswa.jurusan = '$id' AND ISNULL(ganti_dospem.acckaprodi)
	        ");

		return $query->num_rows();
	}

	public function jumlah_revisi($nim,$penguji){
		$query = $this->db->query(
	        "SELECT * 
			FROM revisi_skripsi
			WHERE nim='$nim' AND penguji='$penguji'
	        ");

		return $query->num_rows();
	}

	public function status_ganti_judul_dospem($id){
		$query = $this->db->query(
	        "SELECT *, ganti_judul.id as id_ganti
			FROM dospem 
			INNER JOIN ganti_judul 
			ON dospem.nim = ganti_judul.nim
			INNER JOIN mahasiswa 
			ON dospem.nim = mahasiswa.nim
			WHERE dospem.noreg = '$id' 
	        ");

		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function status_ganti_judul_kaprodi($id){
		$query = $this->db->query(
	        "SELECT *,ganti_judul.id as id_ganti
			FROM mahasiswa 
			INNER JOIN ganti_judul 
			ON mahasiswa.nim = ganti_judul.nim
			WHERE mahasiswa.jurusan = '$id' AND ganti_judul.accdospem IS NOT NULL
	        ");

		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function status_ganti_pembimbing_kaprodi($id){
		$query = $this->db->query(
	        "SELECT *
			FROM mahasiswa 
			INNER JOIN ganti_dospem 
			ON mahasiswa.nim = ganti_dospem.nim
			WHERE mahasiswa.jurusan = '$id'
	        ");

		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}


/////////////////////////////////////Akhir SIPSO/////////////////////////////////////////////

	public function list_dosen_buat_akun(){
		$this->db->where('akun', '0');
		$query = $this->db->get('dosen');

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function list_dosen_buat_ngajar(){
		$query = $this->db->get('dosen');

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function list_distinct($id,$table){
		$query =  $this->db->query(
	        "SELECT DISTINCT $id FROM $table");

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function list_matkul_buat_ngajar(){
		$query = $this->db->get('matakuliah');

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}



	public function list_data($where,$id,$table){
		$this->db->where($where, $id);
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}
#si dosen buat data absensi terlebih dahulu 
#bingung data status sama validasi apa saja
#####################################################	
	public function absensi($idmengajar){
		date_default_timezone_set('Asia/Jakarta');
		###date('Y-m-d') kalo mau hari ini;
		$date=date_create(date('Y-m-d'));
		$mengajar=$this->get_user_detail('id_mengajar',$idmengajar,'mengajar');
		$data_absen=array(
			'id_mengajar' => $mengajar->id_mengajar,
			'tanggal' =>  date_format($date,'Y-m-d')
			);
		$this->create('presensi',$data_absen);
		
	}
/*	
	public function bulan($bulan,$tahun){
		
		$query = $this->db->query(
	        "SELECT *
	        FROM presensi 
	        WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function laporan($id,$bulan,$tahun){
		$query = $this->db->query(
	        "SELECT presensi.*,mengajar.*
	        FROM presensi 
	        INNER JOIN mengajar 
	        ON presensi.id_mengajar = mengajar.id_mengajar
	        WHERE MONTH(presensi.tanggal) = '$bulan' AND YEAR(presensi.tanggal) = '$tahun' AND mengajar.id_dosen = '$id'
	        GROUP BY mengajar.id_mengajar");


		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}
*/
	public function rekapdosen($id){
		$query = $this->db->query(
	        "SELECT presensi.*,mengajar.*,matakuliah.nama as nama_matkul, matakuliah.sks ,dosen.nama as nama_dosen
	        FROM presensi 
	        INNER JOIN mengajar 
	        ON presensi.id_mengajar = mengajar.id_mengajar
	        INNER JOIN dosen 
	        ON mengajar.id_dosen = dosen.id_dosen
	        INNER JOIN matakuliah 
	        ON mengajar.id_matkul = matakuliah.id_matkul
	        WHERE mengajar.id_dosen='$id' ORDER BY mengajar.id_matkul,presensi.tanggal ASC");


		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function carilaporan($awal,$akhir){
		$query = $this->db->query(
	        "SELECT presensi.*,mengajar.*,matakuliah.nama as nama_matkul, matakuliah.sks ,dosen.nama as nama_dosen
	        FROM presensi 
	        INNER JOIN mengajar 
	        ON presensi.id_mengajar = mengajar.id_mengajar
	        INNER JOIN dosen 
	        ON mengajar.id_dosen = dosen.id_dosen
	        INNER JOIN matakuliah 
	        ON mengajar.id_matkul = matakuliah.id_matkul
	        WHERE presensi.tanggal BETWEEN date('$awal') AND date('$akhir') GROUP BY mengajar.id_mengajar ORDER BY mengajar.id_dosen ASC");


		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function carijhadir($id,$awal,$akhir){
			$jumlahhadir=$this->db->query(
	        "SELECT *
	        FROM presensi 
	        WHERE tanggal BETWEEN date('$awal') AND date('$akhir') AND id_mengajar = '$id' AND status = 'Hadir' AND validasi_status = 'Validated'");
	       
		return $jumlahhadir->num_rows();
	}
/*
	public function jumlahhadir($id,$bulan,$tahun){
			$jumlahhadir=$this->db->query(
	        "SELECT *
	        FROM presensi 
	        WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' AND id_mengajar = '$id' AND status = 'Hadir' AND validasi_status = 'Validated'");
	       
		return $jumlahhadir->num_rows();
	}
*/
}
