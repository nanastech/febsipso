<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dospem extends CI_Controller {

	protected $username_temp;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->library('mainlib');
		$this->mainlib->logged_dospem();
	}
	public function index()
	{
		$this->load->view('dospem/halaman_dospem', [
			'notification' => $this->session->flashdata('notification')
		]);

	}
	public function about()
	{
		$this->load->view('dospem/halaman_about', [
			'notification' => $this->session->flashdata('notification')
		]);

	}

///////////////////////////////////Menu Outline//////////////////////////////////////////////////
	public function status_outline(){
		$this->load->view('dospem/proposal_outline/halaman_status', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function approved($data=null)
	{	
		$info='Outline Anda <strong>DIAPPROVE</strong>.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Dosen PA',
		'info' =>  $info,
		'link' => 'Mahasiswa/status_outline/',
		'tanggal' => date('Y-m-d H:i:s')
		);
		$data_update = array(
			'accdsnpa' => 'Approved',
			'tglaccdsnpa' => date('Y-m-d H:i:s')
			);
		if ($this->Model->update_data($data_update,'nim',$data,'outline') && $this->Model->create('info',$data_info)) {
			redirect(base_url('dospem/status_outline/'));	
		}else{
			echo "GAGAL";
		}
		
	}
///////////////////////////////////////////////MEnu Log Book///////////////////////////////////////
	public function log_book(){
		$this->load->view('dospem/log_book/halaman_list_bimbingan', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function detail_logbook($id=NULL){
		$this->load->view('dospem/log_book/halaman_log_book', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function validasi_logbook($id=NULL){
		$log_book=$this->Model->read_detail('id',$id,'log_book');
		$dospem=$this->Model->read_detail('id',$log_book->id_dospem,'dospem');
		$data_update = array(
			'accdospem' => 'Validated',
			'tglaccdospem' => date('Y-m-d H:i:s')
			);
		if ($this->Model->update_data($data_update,'id',$id,'log_book')) {
			redirect(base_url('Dospem/detail_logbook/'.base64_encode($dospem->nim)));	
		}else{
			echo "GAGAL";
		}
	}

	public function update_bimbingan($id=null){
		$log_book=$this->Model->read_detail('id',$id,'log_book');
		$dospem=$this->Model->read_detail('id',$log_book->id_dospem,'dospem');
		$data_update = array(
			'catatan' => $_POST['catatan'],
			'lu_catatan' => date('Y-m-d H:i:s'),
			'accdospem' => NULL,
			'tglaccdospem' => NULL
			);
		if ($this->Model->update_data($data_update,'id',$id,'log_book')) {
			$notification = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Input Log Book Berhasil!</h4>
            Data log book tanggal '.date('l, d-m-Y H:i:s',strtotime($log_book->tanggal)).' berhasil di update.</div>';
		} else {
			$notification = '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Input Log Book Gagal!</h4>
            Data log book tanggal '.date('l, d-m-Y H:i:s',strtotime($log_book->tanggal)).' gagal di update. Mohon input data kembali, jika gagal mohon hubungi administrator.</div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Dospem/detail_logbook/'.base64_encode($dospem->nim)),'refresh');
	}

	public function cetak_logbook($id=NULL){
		$this->load->view('dospem/log_book/cetak_logbook');
	}
////////////////////////////////////////////Menu Sidang Skripsi//////////////////////////////////////
	public function status_sidang()
	{	
			$this->load->view('dospem/sidang_skripsi/halaman_status', [
				'notification' => $this->session->flashdata('notification')
			]);	
		
	}

	public function approve_sidang($data=null)
	{	
		$info='Pendaftaran Sidang Skripsi Anda <strong>DIAPPROVE</strong>.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Dosen Pembimbing',
		'info' =>  $info,
		'link' => 'Mahasiswa/status_sidang/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
			'accdospem' => 'Validated',
			'tglaccdospem' => date('Y-m-d H:i:s')
			);
		if ($this->Model->update_data($data_update,'nim',$data,'daftar_sidang') && $this->Model->create('info',$data_info)) {
			redirect(base_url('Dospem/status_sidang/'));	
		}else{
			echo "GAGAL";
		}
		
	}

////////////////////////////////////////////////////////////Penilaian/////////////////////////
	public function mahasiswa_sidang(){
		$this->load->view('dospem/sidang_skripsi/halaman_mahasiswa_sidang', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function penilaian_sidang($id=NULL){
		$valid=base64_decode($id);
		//cek valid base64
		if(preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $valid)){
			$this->load->view('dospem/sidang_skripsi/halaman_penilaian_sidang', [
			'notification' => $this->session->flashdata('notification')
			]);
		}else{
			redirect(base_url('Dospem/mahasiswa_sidang/'));	
		}
	}

	public function mahasiswa_revisi(){
		$this->load->view('dospem/sidang_skripsi/halaman_mahasiswa_revisi', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function update_catatan_revisi($data=null)
	{	
		$notification='';
		$info='Ada Pembaruan Catatan Revisi Sidang.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Dosen Penguji ['.$this->session->userdata('username').']',
		'info' =>  $info,
		'link' => 'Mahasiswa/list_revisi/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
			'catatan' => $_POST['catatan_revisi']
			);

		if ($this->Model->update_data_dual($data_update,'nim',$data,'penguji',$this->session->userdata('username'),'penilaian') && $this->Model->create('info',$data_info)) {
			$notification = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Pembaruan Catatan Revisi Berhasil!</h4>
            Catatan revisi mahasiswa <strong>'.$data.'</strong> berhasil di update.</div>';
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-exclamation-triangle"></i> Pembaruan Catatan Revisi Gagal!</h4>
            Catatan revisi mahasiswa <strong>'.$data.'</strong> gagal di update.</div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Dospem/mahasiswa_revisi/'),'refresh');	
	}

	public function approve_list_revisi($data=null)
	{	
		$list_revisi=$this->Model->read_detail('id',$data,'revisi_skripsi');
		if ($list_revisi->accpenguji) {
			$info='Ada Revisi Sidang <strong>DIPERBARUI</strong>.';
			$data_update = array(
			'accpenguji' => NULL,
			'tglaccpenguji' => date('Y-m-d H:i:s')
			);
		}else{
			$info='Ada Revisi Sidang <strong>DIAPPROVE</strong>.';
			$data_update = array(
			'accpenguji' => 'Approved',
			'tglaccpenguji' => date('Y-m-d H:i:s')
			);
		}
		
		$data_info = array(
		'username' => $list_revisi->nim,
		'dari' => 'Dosen Penguji ['.$this->session->userdata('username').']',
		'info' =>  $info,
		'link' => 'Mahasiswa/list_revisi/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$this->Model->create('info',$data_info);
		$this->Model->update_data($data_update,'id',$data,'revisi_skripsi');

		
	}

	public function approve_revisi_sidang($data=null)
	{	
		$info='Seluruh Revisi Sidang <strong>DIAPPROVE</strong>.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Dosen Penguji ['.$this->session->userdata('username').']',
		'info' =>  $info,
		'link' => 'Mahasiswa/list_revisi/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
			'accpenguji' => 'Approved',
			'tglaccpenguji' => date('Y-m-d H:i:s')
			);



		if ($this->Model->update_data_dual($data_update,'nim',$data,'penguji',$this->session->userdata('username'),'penilaian') && $this->Model->create('info',$data_info)) {
			if ($this->Model->read_where_dual('nim',$data,'accpenguji IS NULL',NULL,'penilaian')) {
				echo "-";
			}else{
				$data_revisi=$this->Model->read_detail_dual('nim',$data,'penguji',$this->session->userdata('username'),'penilaian');
				$data_skripsi=array(
					'judul' => $data_revisi->judul_revisi,
					'file_skripsi' => $data_revisi->file_revisi
					);
				if ($this->Model->update_data($data_skripsi,'nim',$data,'judul_skripsi')) {
					echo "<script>console.log('berhasil');</script>";
				}else{
					echo "<script>console.log('gagal');</script>";
				}
			}
			redirect(base_url('Dospem/mahasiswa_revisi/'));	
		}else{
			echo "GAGAL";
		}
		
	}

	// public function tgl_revisi($id=null){
	// 	$jadwal=$this->Model->read_detail('nim',$nim,'jadwal_sidang');
	// 	$data=array(
	// 		'id_jadwal' => $jadwal->id,
	// 		'nim' => $id,
	// 		'penguji' => $this->session->userdata('username'),
	// 		'batas_revisi' => $_POST['tgl_revisi'],
	// 		'tgl_penilaian' => date('Y-m-d H:i:s')
	// 		);
	// 	$cekdata=$this->Model->read_detail_dual('nim',$id,'penguji',$this->session->userdata('username'),'penilaian');
	// 	if ($cekdata) {
	// 		$this->Model->update_data($data,'id',$cekdata->id,'penilaian');
	// 	}else{
	// 		$this->Model->create('penilaian',$data);
	// 	}
	// }

	public function nilai_sidang($id=NULL){
		$nim=base64_decode($id);
		//cek valid base64
		if(preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $nim)){
			$jadwal=$this->Model->read_detail('nim',$nim,'jadwal_sidang');
	    	$mahasiswa=$this->Model->read_detail('nim',$nim,'daftar_sidang');
	    	$tanggal=$this->Model->read_detail('id',$jadwal->tanggal_id,'tanggal_sidang');
	    	$bataswaktu=strtotime($jadwal->waktu)+(60*90);

			$data_nilai = array(
			'id_jadwal' => $jadwal->id,
			'nim' => $nim,
			'penguji' => $this->session->userdata('username'),
			'penyajian1' => $_POST['A1'],
			'penyajian2' => $_POST['A2'],
			'penyajian3' => $_POST['A3'],
			'penulisan1' => $_POST['B1'],
			'penulisan2' => $_POST['B2'],
			'penulisan3' => $_POST['B3'],
			'penulisan4' => $_POST['B4'],
			'umum1' => $_POST['C1'],
			'umum2' => $_POST['C2'],
			'nilai_akhir' => $_POST['total'],
			'catatan' => $_POST['catatan'],
			'tgl_penilaian' => date('Y-m-d H:i:s')
			);
			$cekdata=$this->Model->read_detail_dual('nim',$nim,'penguji',$this->session->userdata('username'),'penilaian');
			if ($cekdata) {
				if ($this->Model->update_data($data_nilai,'id',$cekdata->id,'penilaian')) {
					$notification = '<div class="alert alert-success alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h4><i class="icon fa fa-check"></i> Nilai Berhasil Diperbarui!</h4>
		            </div>';
				}else{
					$notification = '<div class="alert alert-danger alert-dismissible">
	            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            	<h4><i class="icon fa fa-check"></i> Nilai Gagal Diperbarui!</h4>
	            	Silahkan isi kembali, jika gagal lagi mohon hubungi Subag LAA</div>';
				}
			}else{
				if ($this->Model->create('penilaian',$data_nilai)) {
					$notification = '<div class="alert alert-success alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h4><i class="icon fa fa-check"></i> Nilai Berhasil Disimpan!</h4>
		            </div>';
				}else{
					$notification = '<div class="alert alert-danger alert-dismissible">
	            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            	<h4><i class="icon fa fa-check"></i> Nilai Gagal Disimpan!</h4>
	            	Silahkan isi kembali, jika gagal lagi mohon hubungi Subag LAA</div>';
				}
			}
			
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Dospem/penilaian_sidang/'.base64_encode($nim)));	



			
		}else{
			redirect(base_url('Dospem/mahasiswa_sidang/'));	
		}
	}
	public function tambah_revisi($nim=null){
		$jadwal=$this->Model->read_detail('nim',$nim,'jadwal_sidang');
    	$mahasiswa=$this->Model->read_detail('nim',$nim,'daftar_sidang');
    	$tanggal=$this->Model->read_detail('id',$jadwal->tanggal_id,'tanggal_sidang');
    	$bataswaktu=strtotime($jadwal->waktu)+(60*90);
    	$notification='';
		$data_revisi = array(
			'id_jadwal' => $jadwal->id,
			'nim' => $nim,
			'penguji' => $this->session->userdata('username'),
			'uraian' => $_POST['uraian'],
			'halaman' => $_POST['halaman'],
			'tgl_attempt' => date('Y-m-d H:i:s'),
		);
		$data = array(
			'id_jadwal' => $jadwal->id,
			'nim' => $nim,
			'penguji' => $this->session->userdata('username'),
			'batas_revisi' => $_POST['tanggal_revisi']
			);

		$cekdata=$this->Model->read_detail_dual('nim',$nim,'penguji',$this->session->userdata('username'),'penilaian');
		//cek
		if ($cekdata) {
			//kalo ada create revisi && update
			if ($_POST['uraian'] && $this->Model->create('revisi_skripsi',$data_revisi) && $this->Model->update_data($data,'id',$cekdata->id,'penilaian')) {
					$notification = $notification.'<div class="alert alert-success alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h4><i class="icon fa fa-check"></i> Data Revisi Berhasil Disimpan, Data Tanggal Revisi Berhasil Diperbarui!</h4>
		            </div>';
				}else{
					$notification = $notification.'<div class="alert alert-danger alert-dismissible">
	            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            	<h4><i class="icon fa fa-check"></i> Data Revisi, Data Tanggal Revisi Gagal Diperbarui!</h4>
	            	Silahkan isi kembali, jika gagal lagi mohon hubungi Subag LAA</div>';
				}
		}else{
			//create revisi && create penilaian
			if ($_POST['uraian'] && $this->Model->create('revisi_skripsi',$data_revisi) && $this->Model->create('penilaian',$data)) {
				$notification = $notification.'<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Data Revisi, Data Tanggal Revisi Berhasil Disimpan!</h4>
	           	</div>';
			}else{
				$notification = $notification.'<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Data Revisi, Data Tanggal Gagal Disimpan!</h4>
	            Silahkan isi kembali, jika gagal lagi mohon hubungi Subag LAA</div>';
			}
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Dospem/penilaian_sidang/'.base64_encode($nim)));		
	}

///////////////////////////////////////////////////////////////GANTI JUDUL/////////////////////////////////////////////////////

	public function ganti_judul()
	{	
		$this->load->view('dospem/ganti_judul/halaman_ganti_judul', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function validasi_ganti_judul($data=null)
	{	
		$id=$this->uri->segment(4);
		$info='Permohonan Ganti Judul Skripsi Anda <strong>DIAPPROVE</strong>.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Dosen Pembimbing',
		'info' =>  $info,
		'link' => 'Mahasiswa/ganti_judul/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
			'accdospem' => 'Validated',
			'tglaccdospem' => date('Y-m-d H:i:s')
			);
		if ($this->Model->update_data($data_update,'id',$id,'ganti_judul') && $this->Model->create('info',$data_info)) {
			redirect(base_url('Dospem/ganti_judul/'));	
		}else{
			echo "GAGAL";
		}
		
	}

///////////////////////////////////////////////////////////////HELP_DESK/////////////////////////////////////////////////////

	public function help_desk()
	{	
		$this->load->view('dospem/help_desk/halaman_help_desk', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function proses_help_desk($id=null){
		$data = array(
			'username' => $id,
			'masukan' => $_POST['keterangan'],
			'tgl_masukan' => date('Y-m-d H:i:s'),
			'role' => $this->session->userdata('role')
		);
		if ($this->Model->create('help_desk',$data)) {
			$notification = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Masukan/Pertanyaan Berhasil Dikirim!</h4>
            Mohon ditunggu respon dari masukan/petanyaan yang dikirim.</div>';
			
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Masukan/Pertanyaan Gagal Dikirim!</h4>
            Silahkan isi kembali, jika gagal lagi mohon hubungi Subag LAA</div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Dospem/help_desk/'));	
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	public function validated($data=null)
	{	
		$data_update = array(
			'accdospem' => 'Validated',
			'tglaccdospem' => date('Y-m-d H:i:s')
			);
		if ($this->Model->update_data($data_update,'nim',$data,'daftar_sidang')) {
			redirect(base_url('Dospem/validasi/'),'refresh');	
		}else{
			echo "GAGAL";
		}
		
	}


	public function ganti_password()
	{
		$this->load->library('form_validation');
		$this->load->model('Model');
		$input = $this->input->post(NULL,TRUE);//css filter
		$this->username_temp = @$input['username'];
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('passlama', 'Password Lama', 'required|callback_password_check');
		$this->form_validation->set_rules('passbaru', 'Password Baru', 'required');
		$this->form_validation->set_error_delimiters('<p class="text-red"><code><strong>','</strong></code></p>');

		if($this->form_validation->run() == FALSE){
			$this->load->view('dospem/halaman_gantipass');

		}
		else{
			$this->load->helper('site_helper');
			$encrypt_password = bCrypt($input['passbaru'],12);//banyak encrypt nya 12
			$data_update = array(
				'password' => $encrypt_password,
				);
			if ($this->Model->update_data($data_update,'username',$input['username'],'users')) {
				$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Update Password Berhasil!</h4>
                Password berhasil di ganti. Harap diingat atau dicatat password baru.</div>';
			} else {
				$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Update Password Gagal!</h4>
                Password gagal di ganti. Harap input lagi.</div>';
			}

			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Dospem'),'refresh');
		}
	}

	public function password_check($str){
		$this->load->model('Model');
		$user_detail = $this->Model->read_detail('username',$this->username_temp,'users');//$str itu password yang diketikan dari post
		if (!empty($user_detail)) {
			if($user_detail->password == crypt($str,$user_detail->password)){
			return TRUE;
			}
			else{
				$this->form_validation->set_message('password_check','Maaf, password lama tidak valid');
				return FALSE;
			}
		}else{
			$this->form_validation->set_message('password_check','Maaf, username dan password tidak ditemukan. Mohon konfirmasi ke Admin');
				return FALSE;
		}
		
	}

	// TEST HALAMAN NILIAAAAAAI=================================================

	public function nilai(){
		$this->load->view('dospem/halaman_nilai');
	}

	// TEST TAMPILIN GAMBAR=======================================================
	public function test()
	{
		$this->load->view('mahasiswa/test');
	}

	// TEST TAMPILIN GAMBAR=======================================================
	public function gambar_slipdut($id)
	{
		$this->load->model('Model');

		$data = $this->Model->read_detail('nim',$id,'daftar_sidang');
		header('Content-type : image');
		// echo 'PNG ='.$data->slipdut;
		 echo $data->slipdut;
		// echo 'JPG ='.$data->slipus;
		// echo 'PNG ='.$data->slipps;
	}

	public function gambar_slipbs($id)
	{
		$this->load->model('Model');

		$data = $this->Model->read_detail('nim',$id,'daftar_sidang');
		header('Content-type : image');
		// echo 'PNG ='.$data->slipdut;
		 echo $data->slipbs;
		// echo 'JPG ='.$data->slipus;
		// echo 'PNG ='.$data->slipps;
	}

	public function gambar_slipus($id)
	{
		$this->load->model('Model');

		$data = $this->Model->read_detail('nim',$id,'daftar_sidang');
		header('Content-type : image');
		// echo 'PNG ='.$data->slipdut;
		 echo $data->slipus;
		// echo 'JPG ='.$data->slipus;
		// echo 'PNG ='.$data->slipps;
	}
	public function gambar_slipps($id)
	{
		$this->load->model('Model');

		$data = $this->Model->read_detail('nim',$id,'daftar_sidang');
		header('Content-type : image');
		// echo 'PNG ='.$data->slipdut;
		 echo $data->slipps;
		// echo 'JPG ='.$data->slipus;
		// echo 'PNG ='.$data->slipps;
	}
}
