<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kaprodi extends CI_Controller {

	protected $username_temp;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->library('mainlib');
		$this->mainlib->logged_kaprodi();
	}
	public function index()
	{
		$this->load->view('kaprodi/layout/header',[
			'title' => 'Sistem Informasi Pelaksanaan Skripsi Online | Dashboard'
		]);
		
		$this->load->view('kaprodi/halaman_kaprodi', [
			'notification' => $this->session->flashdata('notification')
		]);

	}

	public function about()
	{
		$this->load->view('kaprodi/halaman_about', [
			'notification' => $this->session->flashdata('notification')
		]);

	}

//////////////////////////////////////////Menu Outline /////////////////////////////////////

	public function status_outline(){
		$this->load->view('kaprodi/layout/header',[
			'title' => 'Sistem Informasi Pelaksanaan Skripsi Online | Status Outline'
		]);
		$this->load->view('kaprodi/proposal_outline/halaman_status');
	}
	
	public function edit_status($id=0){
		$valid=base64_decode($id);

		if(preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $valid)){
			$data= array(
				'record' => $this->Model->read_detail('nim',$valid,'outline')
				);

			$this->load->view('kaprodi/proposal_outline/edit_status',$data, [
			'notification' => $this->session->flashdata('notification')
			]);
		}else
		{
			redirect(base_url('kaprodi/status_outline'));
		}
	}

	public function approved($data=null)
	{	
		$outline=$this->Model->read_detail('nim',$data,'outline');
		if ($_POST['status']=='Diterima') {
			$info='Selamat Outline Anda <strong>DITERIMA</strong>.';
			$topikfix='';
			$profix='';
			if ($_POST['topikfix']=='1') {
				$topikfix=$outline->topik1;
				$profix=$outline->upro1;
			}elseif ($_POST['topikfix']=='2') {
				$topikfix=$outline->topik2;
				$profix=$outline->upro2;
			}
			$data_update = array(
			'acckaprodi' => 'Approved',
			'status_outline' => $_POST['status'],
			'dospemfix' =>  $_POST['dospemfix'],
			'topikfix' => $topikfix,
			'outline_fix' => $profix,
			'komentar' => $_POST['komentar'],
			'tglacckaprodi' => date('Y-m-d H:i:s')
			);

			

			if (!empty($_POST['revisi'])) {
				$data_update ['revisi']=$_POST['revisi'];
				$data_update ['catatan']=$_POST['catatan'];
				$info='Outline Anda <strong>DITERIMA</strong> Dengan <strong>Catatan/Revisi</strong>.';
			}

			$data_info = array(
			'username' => $data,
			'dari' => 'Kaprodi',
			'info' =>  $info,
			'link' => 'Mahasiswa/status_outline/',
			'tanggal' => date('Y-m-d H:i:s')
			);

			$data_dospem = array(
				'nim' => $data,
				'noreg' => $_POST['dospemfix']
				);

			$data_skripsi = array(
				'nim' => $data,
				'nama' => $outline->nama,
				'judul' => $topikfix,
				'status' => 'proses',
				'tgl_outline' => $outline->tgl_daftar,
				'pembimbing'=>$_POST['dospemfix']
				);

			if ($this->Model->update_data($data_update,'nim',$data,'outline') && $this->Model->create('info',$data_info) && $this->Model->duplicate('nim',$data,'outline','log_outline') && $this->Model->create('dospem',$data_dospem) && $this->Model->create('judul_skripsi',$data_skripsi)) {
					redirect(base_url('Kaprodi/status_outline/'));	
				}else{
					echo "GAGAL";
				}
		}elseif ($_POST['status']=='Ditolak') {
			$info='Maaf Outline Anda <strong>DITOLAK</strong>.';
			$data_info = array(
			'username' => $data,
			'dari' => 'Kaprodi',
			'info' =>  $info,
			'link' => 'Mahasiswa/daftar_outline/',
			'tanggal' => date('Y-m-d H:i:s')
			);

			$data_update = array(
			'acckaprodi' => 'Approved',
			'status_outline' => $_POST['status'],
			'tglacckaprodi' => date('Y-m-d H:i:s')
			);

			if ($this->Model->update_data($data_update,'nim',$data,'outline') && $this->Model->create('info',$data_info) && $this->Model->duplicate('nim',$data,'outline','log_outline') && $this->Model->delete('nim',$data,'outline')) {
					$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                	Data berhasil disimpan!
                </div>';
				$this->session->set_flashdata('notification', $notification);
				redirect(base_url('Kaprodi/status_outline/'));	
				}else{
					$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Gagal!</h4>
                	Data gagal disimpan!
                </div>';
				$this->session->set_flashdata('notification', $notification);
				redirect(base_url('Kaprodi/status_outline/'));
				}
		}
	}

	public function update_status($data=null)
	{	
		$outline=$this->Model->read_detail('nim',$data,'outline');
			$info='Ada informasi tambahan cek di menu <strong>status outline</strong>.';
			$topikfix='';
			$profix='';
			if ($_POST['topikfix']=='1') {
				$topikfix=$outline->topik1;
				$profix=$outline->upro1;
			}elseif ($_POST['topikfix']=='2') {
				$topikfix=$outline->topik2;
				$profix=$outline->upro2;
			}else{
				$topikfix=$outline->topikfix;
				$profix=$outline->outline_fix;
			}
			$data_update = array(
			'topikfix' => $topikfix,
			'outline_fix' => $profix,
			'dospemfix' =>  $_POST['dospemfix'],
			'komentar' => $_POST['komentar'],
			'catatan' => $_POST['catatan'],
			'tglacckaprodi' => date('Y-m-d H:i:s')
			);

			if (!empty($_POST['revisi'])) {
				$data_update ['revisi']=$_POST['revisi'];
				$data_update ['catatan']=$_POST['catatan'];
				$info='Outline Anda terdapat <strong>Catatan/Revisi</strong>, mohon melakukan revisi kemali.';
			}


			$data_info = array(
			'username' => $data,
			'dari' => 'Kaprodi',
			'info' =>  $info,
			'link' => 'Mahasiswa/status_outline/',
			'tanggal' => date('Y-m-d H:i:s')
			);

			$data_dospem = array(
				'noreg' => $_POST['dospemfix']
				);

			$data_skripsi = array(
				'judul'=>$topikfix,
				'pembimbing'=>$_POST['dospemfix']
				);

			if ($this->Model->update_data($data_update,'nim',$data,'outline') && $this->Model->create('info',$data_info) && $this->Model->update_data($data_dospem,'nim',$data,'dospem') && $this->Model->update_data($data_skripsi,'nim',$data,'judul_skripsi')) {
				$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                	Data berhasil disimpan!
                </div>';
				$this->session->set_flashdata('notification', $notification);
					redirect(base_url('Kaprodi/edit_status/'.base64_encode($data)),'refresh');	
				}else{
					$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Gagal!</h4>
                	Data gagal disimpan!
                </div>';
				$this->session->set_flashdata('notification', $notification);
				redirect(base_url('Kaprodi/edit_status/'.base64_encode($data)),'refresh');
				}
	}

	public function revisi_outline($data=null){
		$info='Selamat Revisi Outline Anda <strong>DITERIMA</strong>.';
		$outline=$this->Model->read_detail('nim',$data,'outline');
		$data_info = array(
		'username' => $data,
		'dari' => 'Kaprodi',
		'info' =>  $info,
		'link' => 'Mahasiswa/status_outline/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
		'revisi' => NULL,
		'outline_fix' => $outline->outline_revisi,
		'topikfix' => $outline->judul_revisi,
		'tglacckaprodi' => date('Y-m-d H:i:s')
		);
		
		$data_skripsi = array(
			'judul' => $outline->judul_revisi
			);

		if ($this->Model->update_data($data_update,'nim',$data,'outline') && $this->Model->create('info',$data_info) && $this->Model->duplicate('nim',$data,'outline','log_outline')&& $this->Model->update_data($data_skripsi,'nim',$data,'judul_skripsi')) {
			$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                	Approve revisi outline berhasil!
                </div>';
				$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Kaprodi/edit_status/'.base64_encode($data)));	
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Gagal!</h4>
                	Approve revisi outline gagal!
                </div>';
				$this->session->set_flashdata('notification', $notification);
				redirect(base_url('Kaprodi/edit_status/'.base64_encode($data)));
		}
	}

///////////////////////////////////////////////MEnu Log Book///////////////////////////////////////
	public function log_book(){
		$this->load->view('kaprodi/log_book/halaman_list_bimbingan', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function detail_logbook($id=NULL){
		$this->load->view('kaprodi/log_book/halaman_log_book', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function cetak_logbook($id=NULL){
		$this->load->view('dospem/log_book/cetak_logbook');
	}
/////////////////////////////////Menu Daftar Sidang/////////////////////////////////////////////
	public function status_sidang()
	{	
			$this->load->view('kaprodi/sidang_skripsi/halaman_status', [
				'notification' => $this->session->flashdata('notification')
			]);	
		
	}


	public function approve_sidang($data=null)
	{	
		$info='Pendaftaran Sidang Skripsi Anda <strong>DIAPPROVE</strong>.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Kaprodi',
		'info' =>  $info,
		'link' => 'Mahasiswa/status_sidang/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
			'acckaprodi' => 'Validated',
			'tglacckaprodi' => date('Y-m-d H:i:s')
			);
		if ($this->Model->update_data($data_update,'nim',$data,'daftar_sidang') && $this->Model->create('info',$data_info)) {
			redirect(base_url('Kaprodi/status_sidang/'));	
		}else{
			echo "GAGAL";
		}
		
	}

	public function jadwal_sidang()
	{	
		$this->load->view('kaprodi/sidang_skripsi/halaman_jadwal', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function upload_sidang($prodi=null)
	{	
		//load uploading file library
		$config=array();
		$config['upload_path']          = './uploads/jadwal_sidang/';
    	$config['max_size']             = '0'; //2MB, 1024kilobytes = 1MB
    	$config['allowed_types']        = '*';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$sidang='';
		$notification='';
		
		//cek config
		$config['file_name'] = $prodi.'-Kaprodi_Jadwal_Sidang_'.time();
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		//cek bisa upload
		if (!$this->upload->do_upload('filesidang')) {
           $notification = $notification.'<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Upload File Gagal!</h4>
        Mohon upload file kembali!</div>';
		}else{
			$gambar = $this->upload->data();
        	$sidang = $gambar['file_name'];
		}

		$data = array(
		'tgl_upload' => date('Y-m-d H:i:s'),
		'file' => $sidang,
		'dari' => 'Kaprodi '.$prodi,
		'prodi' => $prodi
		);
		if ($this->Model->create('file_sidang',$data)) {
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Kaprodi/jadwal_sidang/'),'refresh');	
		}else{
			echo "GAGAL";
		}
	}

	public function hapus_file_sidang($prodi=null)
	{	
		$id=$this->uri->segment(4);
		$cekfile=$this->Model->read_detail('id',$id,'file_sidang');
		if ($cekfile->file) {
			unlink("uploads/jadwal_sidang/".$cekfile->file);
		}
		if ($this->Model->delete('id',$id,'file_sidang')) {
				redirect(base_url('Kaprodi/jadwal_sidang/'));	
		}else{
			echo "GAGAL";
		}
	}

///////////////////////////////////////////////////GantiJUDUL//////////////////////////////////////////////////////
public function ganti_judul()
	{	
		$this->load->view('kaprodi/ganti_judul/halaman_ganti_judul', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function validasi_ganti_judul($data=null)
	{	
		$id=$this->uri->segment(4);
		$info='Permohonan Ganti Judul Skripsi Anda <strong>DIAPPROVE</strong>.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Kaprodi',
		'info' =>  $info,
		'link' => 'Mahasiswa/ganti_judul/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
			'acckaprodi' => 'Validated',
			'tglacckaprodi' => date('Y-m-d H:i:s')
			);
		if ($this->Model->update_data($data_update,'id',$id,'ganti_judul') && $this->Model->create('info',$data_info)) {
			redirect(base_url('Kaprodi/ganti_judul/'));	
		}else{
			echo "GAGAL";
		}		
	}
////////////////////////////////////////////////GANTI PEMBIMBING/////////////////////////////////////////////////
	public function ganti_pembimbing()
	{	
		$this->load->view('kaprodi/ganti_pembimbing/halaman_ganti_pembimbing', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function validasi_ganti_pembimbing($data=null)
	{	
		$id=$this->uri->segment(4);
		
		$info='Permohonan Ganti Pembimbing Anda <strong>DIAPPROVE</strong>.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Kaprodi',
		'info' =>  $info,
		'link' => 'Mahasiswa/ganti_pembimbing/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
			'acckaprodi' => 'Validated',
			'tglacckaprodi' => date('Y-m-d H:i:s')
			);
		if ($this->Model->update_data($data_update,'id',$id,'ganti_dospem') && $this->Model->create('info',$data_info)) {
			redirect(base_url('Kaprodi/ganti_pembimbing/'));	
		}else{
			echo "GAGAL";
		}
		

		
	}
////////////////////////////////////////////////Help Desk/////////////////////////////////////////////////
	public function help_desk()
	{	
		$this->load->view('kaprodi/help_desk/halaman_help_desk', [
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
		redirect(base_url('Kaprodi/help_desk/'));	
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////




	public function jadwal()
	{	
		$this->load->view('kaprodi/halaman_jadwal', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function inputjadwal($id=null)
	{	
		$nim=base64_decode($id);

		$this->load->view('kaprodi/halaman_inputjadwal', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function createjadwal($id=null)
	{	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('tgl','Tanggal','required');
		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('ruang','Ruang','required');
		$this->form_validation->set_rules('penguji1','Dosen Penguji I','required');
		$this->form_validation->set_rules('penguji2','Dosen Penguji II','required');
		$this->form_validation->set_rules('pembimbing','Dosen Pembimbing','required');
		// $this->form_validation->set_rules('slipdut','Slip Daftar Ulang Terakhir','required');
		// $this->form_validation->set_rules('slipbs','Slip Bimbingan Skripsi','required');
		// $this->form_validation->set_rules('slipus','Slip Ujian Skripsi','required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi!');

		$this->form_validation->set_error_delimiters('<p class="text-red"><code><strong>','</strong></code></p>');

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('Kaprodi/halaman_inputjadwal');
		}else{	
			$this->load->model('Model');
			$dosen=$this->Model->read_detail('Nama',$_POST['pembimbing'],'dosen_pembimbing');
			$data = array(
				'nim' => $id,
				'tanggal' => date('Y-m-d',strtotime($_POST['tgl'])),
				'waktu' =>  $_POST['waktu'],
				'ruang' =>  $_POST['ruang'],
				'penguji1' =>  $_POST['penguji1'],
				'penguji2' =>  $_POST['penguji2'],
				'pembimbing' =>  $dosen->Noreg,
				'created_at' => date('Y-m-d H:i:s')
				);
			$cekdata=$this->Model->read_detail('nim',$id,'jadwal_sidang');
			if (empty($cekdata)) {
				if ($this->Model->create('jadwal_sidang',$data))
				{
					$notification = '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
	                Data pendaftaran berhasil di input. Cek selalu status formulir pendaftaran pada menu status formulir.</div>';
				} else {
					$notification = '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
	                Data pendaftaran gagal di input. Mohon input data pendaftaran kembali, jika gagal mohon hubungi administrator.</div>';
				}
				$this->session->set_flashdata('notification', $notification);
			}else{
				if ($this->Model->update_data($data,'nim',$id,'jadwal_sidang')) {
					$notification = '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Update Data Berhasil!</h4>
	                Data jadwal pendaftaran sidang berhasil di update.</div>';
				} else {
					$notification = '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Update Data Gagal!</h4>
	                Data jadwal pendaftaran sidang gagal di update.</div>';
				}
				$this->session->set_flashdata('notification', $notification);
				
				
			}
			redirect(base_url('Kaprodi'),'refresh');
			
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
			$this->load->view('kaprodi/layout/header',[
				'title' => 'Sistem Informasi Pelaksanaan Skripsi Online | Ganti Password'
			]);
			$this->load->view('kaprodi/halaman_gantipass');

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
			redirect(base_url('Kaprodi'),'refresh');
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
