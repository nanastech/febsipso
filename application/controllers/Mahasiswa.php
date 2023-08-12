<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	protected $username_temp;

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->library('mainlib');
		$this->mainlib->logged_mahasiswa();
	}
	public function index()
	{
		$this->load->view('mahasiswa/halaman_mahasiswa', [
			'notification' => $this->session->flashdata('notification')
		]);

	}
	public function log_outline()
	{
		$this->load->view('mahasiswa/proposal_outline/halaman_log', [
			'notification' => $this->session->flashdata('notification')
		]);

	}
	public function about()
	{
		$this->load->view('mahasiswa/halaman_about', [
			'notification' => $this->session->flashdata('notification')
		]);

	}

	public function daftar_dosenpa()
	{
		$post = $this->input->post();
		$data= array(
			'nim' => $this->session->userdata('username'),
			'noreg' => $post['dosenpa']
			);
		if ($this->Model->create('dosenpa',$data)) {
			$notification = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
            Data Dosen PA baru berhasil di input.</div>';
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
            Data Dosen PA gagal di input.</div>';
		}
		
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Mahasiswa/daftar_outline'),'refresh');
	}

///////////////////////////////////////Menu Proposal Outline//////////////////////////////////

	public function daftar_outline(){
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$notification='';
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('nim','NIM','required');
		$this->form_validation->set_rules('projurus','Program Jurusan','required');
		$this->form_validation->set_rules('tempat','Tempat Lahir','required');
		$this->form_validation->set_rules('tanggallahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
	
		$this->form_validation->set_rules('nohp','Nomor Handphone','required');
		$this->form_validation->set_rules('email','E-mail','required');
		$this->form_validation->set_rules('nmp','Nilai Metode Penelitian','required');
		$this->form_validation->set_rules('topik1','Topik 1','required');
		$this->form_validation->set_rules('topik2','Topik 2','required');
		$this->form_validation->set_rules('dospem','Nama Dosen Pembimbing','required');
		$this->form_validation->set_rules('yajukan','Yang Mengajukan','required');
		$this->form_validation->set_rules('konsen','Konsentrasi','required');
		$this->form_validation->set_rules('lmedpel','Lulus Metode Penelitian','required');
		$this->form_validation->set_rules('lkkp','Lulus KKP','required');
		$this->form_validation->set_rules('l128','Lulus 128 SKS','required');

		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi!');

		$this->form_validation->set_error_delimiters('<p class="text-red"><code><strong>','</strong></code></p>');

		//load uploading file library
		$config=array();
		$config['upload_path']          = './uploads/';
    	$config['allowed_types']        = 'gif|png|jpg|Jpeg';
    	$config['max_size']             = '2048'; //2MB, 1024kilobytes = 1MB
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$ufmhs='';
		$usbs='';
		$uspu='';
		$ukst='';
		$utn='';
		$ukhs='';
		$upro1='';
		$upro2='';
	

		if (!empty($_FILES['ufmhs']['tmp_name']) && !empty($_FILES['usbs']['tmp_name']) && !empty($_FILES['uspu']['tmp_name']) && !empty($_FILES['ukst']['tmp_name']) && !empty($_FILES['utn']['tmp_name']) && !empty($_FILES['ukhs']['tmp_name']) && !empty($_FILES['upro1']['tmp_name']) && !empty($_FILES['upro2']['tmp_name'])) {

				//cek config
	    		$config['file_name'] = $_POST['nim'].'_foto-mahasiswa_'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('ufmhs')) {
	               $notification =$notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Foto Mahasiswa Gagal!</h4>
                Foto Mahasiswa gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$ufmhs = $gambar['file_name'];
	    		}

	    		//cek config
	    		$config['file_name'] = $_POST['nim'].'_slipbs'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('usbs')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Slip Bimbingan Skripsi Gagal!</h4>
                Slip Bimbingan Skripsi gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$usbs = $gambar['file_name'];
	    		}

	    		//cek config
	    		$config['file_name'] = $_POST['nim'].'_slippu'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('uspu')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Slip Pendaftaran Ulang Gagal!</h4>
                Slip Pendaftaran Ulang gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$uspu = $gambar['file_name'];
	    		}

	    		//cek config
	    		$config['file_name'] = $_POST['nim'].'_kst'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('ukst')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>  Upload Kartu Studi Tetap (KST) Gagal!</h4>
                Kartu Studi Tetap (KST) gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$ukst = $gambar['file_name'];
	    		}

	    		//cek config
	    		$config['file_name'] = $_POST['nim'].'_transkrip-nilai'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('utn')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Transkrip Nilai Gagal!</h4>
                Transkrip Nilai gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$utn = $gambar['file_name'];
	    		}

	    		//cek config
	    		$config['file_name'] = $_POST['nim'].'_KHS'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('ukhs')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload KHS Semester Gagal!</h4>
                KHS Semester gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$ukhs = $gambar['file_name'];
	    		}

	    		//cek config
	    		$config['file_name'] = $_POST['nim'].'_outline1_'.time();
	    		$config['allowed_types']        = 'pdf';
		    	$config['max_size']             = '5120'; //5MB, 1024kilobytes = 1MB
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('upro1')) {
	            	$notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Proposal Topik 1 Gagal!</h4>
                Proposal Topik 1 gagal di upload. Mohon cek kembali format dan size file sebelum melakukan upload!</div>'; 
	    		}else{
	    			$file = $this->upload->data();
                	$upro1 = $file['file_name'];
	    		}

		    	//cek config
	    		$config['file_name'] = $_POST['nim'].'_outline2_'.time();
	    		$config['allowed_types']        = 'pdf';
		    	$config['max_size']             = '5120'; //5MB, 1024kilobytes = 1MB
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('upro2')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Proposal Topik 2 Gagal!</h4>
                Proposal Topik 2 gagal di upload. Mohon cek kembali format dan size file sebelum melakukan upload!</div>'; 
	    		}else{
	    			$file = $this->upload->data();
                	$upro2 = $file['file_name'];
	    		}
		}else{
			$this->form_validation->set_rules('upload_gambar','Form Upload','required');
		}

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('mahasiswa/proposal_outline/halaman_formulir', [
			'notification' => $this->session->flashdata('notification')
			]);
		}else{
			

			$this->load->model('Model');
			$data = array(
				'nama' => $_POST['nama'], 			
				'nim' => $_POST['nim'], 
				'jurusan' => $_POST['projurus'], 
				'tempat' => $_POST['tempat'], 
				'tgllahir' => date('Y-m-d',strtotime($_POST['tanggallahir'])),
				'alamat' => $_POST['alamat'], 
				'tlpr' => $_POST['tlpr'], 
				'nohp' => $_POST['nohp'], 
				'email' => $_POST['email'],
				'nmp' => $_POST['nmp'], 
				'ns' => $_POST['ns'], 
				'topik1' => $_POST['topik1'], 
				'topik2' => $_POST['topik2'], 
				'dospem' => $_POST['dospem'], 
				'yajukan' => $_POST['yajukan'], 
				'konsen' => $_POST['konsen'], 
				'lmedpel' => $_POST['lmedpel'], 
				'lstatis' => $_POST['lstatis'], 
				'lkkp' => $_POST['lkkp'], 
				'l128' => $_POST['l128'],
				'ufmhs' => $ufmhs,
				'usbs' => $usbs,
				'uspu' => $uspu,
				'ukst'=> $ukst,
				'utn' => $utn,
				'ukhs' => $ukhs,
				'upro1' => $upro1,
				'upro2' => $upro2,
				'tgl_daftar' => date('Y-m-d H:i:s')
				);
			
			if ($this->Model->create('outline',$data))
			{
				$notification = $notification.'<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
                Data pendaftaran berhasil di input. Anda bisa edit kembali data pendaftaran sebelum divalidasi oleh SUBAG LAA. Cek selalu status formulir pendaftaran pada menu <a href="Mahasiswa/status_outline/">status outline</a>.</div>';
			} else {
				$notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
                Data pendaftaran gagal di input. Mohon input data pendaftaran kembali, jika gagal mohon hubungi administrator.</div>';
			}
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Mahasiswa'),'refresh');

			
		}
	}

	public function update_outline(){
		$this->load->model('Model');
			$outline=$this->Model->read_detail('nim',$_POST['nim'],'outline');
			$notification='';
			//load uploading file library
			$config=array();
			$config['upload_path']          = './uploads/';
	    	$config['allowed_types']        = 'gif|png|jpg|jpeg|JPG';
	    	$config['max_size']             = '2048'; //2MB, 1024kilobytes = 1MB
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$ufmhs=$outline->ufmhs;
			$usbs=$outline->usbs;
			$uspu=$outline->uspu;
			$ukst=$outline->ukst;
			$utn=$outline->utn;
			$ukhs=$outline->ukhs;
			$upro1=$outline->upro1;
			$upro2=$outline->upro2;
			if (!empty($_FILES['ufmhs']['tmp_name'])) {
				//cek config
	    		$config['file_name'] = $_POST['nim'].'_foto-mahasiswa_'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('ufmhs')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Foto Mahasiswa Gagal!</h4>
                Foto Mahasiswa gagal di upload line 323. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$ufmhs = $gambar['file_name'];
                	if (!empty($outline->ufmhs)) {
                		unlink("uploads/".$outline->ufmhs);
                	}
	    			
	    		}
			}

			if (!empty($_FILES['usbs']['tmp_name'])) {
				//cek config
	    		$config['file_name'] = $_POST['nim'].'_slipbs'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('usbs')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Slip Bimbingan Skripsi Gagal!</h4>
                Slip Bimbingan Skripsi gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$usbs = $gambar['file_name'];
                	if (!empty($outline->usbs)) {
                		unlink("uploads/".$outline->usbs);
                	}
	    			
	    		}
			}

			if (!empty($_FILES['uspu']['tmp_name'])) {
				//cek config
	    		$config['file_name'] = $_POST['nim'].'_slippu'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('uspu')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Slip Pendaftaran Ulang Gagal!</h4>
                Slip Pendaftaran Ulang gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$uspu = $gambar['file_name'];
                	if (!empty($outline->uspu)) {
                		unlink("uploads/".$outline->uspu);
                	}
	    			
	    		}
			}

			if (!empty($_FILES['ukst']['tmp_name'])) {
				//cek config
	    		$config['file_name'] = $_POST['nim'].'_kst'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('ukst')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>  Upload Kartu Studi Tetap (KST) Gagal!</h4>
                Kartu Studi Tetap (KST) gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$ukst = $gambar['file_name'];
                	if (!empty($outline->ukst)) {
                		unlink("uploads/".$outline->ukst);
                	}
	    			
	    		}
			}

			if (!empty($_FILES['utn']['tmp_name'])) {
				//cek config
	    		$config['file_name'] = $_POST['nim'].'_transkrip-nilai'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('utn')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Transkrip Nilai Gagal!</h4>
                Transkrip Nilai gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$utn = $gambar['file_name'];
                	if ($outline->utn) {
                		unlink("uploads/".$outline->utn);
                	}
	    			
	    		}
			}

			if (!empty($_FILES['ukhs']['tmp_name'])) {
				//cek config
	    		$config['file_name'] = $_POST['nim'].'_KHS'.time();
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('ukhs')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload KHS Semester Gagal!</h4>
                KHS Semester gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
                	$ukhs = $gambar['file_name'];
                	if (!empty($outline->ukhs)) {
                		unlink("uploads/".$outline->ukhs);
                	}
	    			
	    		}
			}

			if (!empty($_FILES['upro1']['tmp_name'])) {
				//cek config
	    		$config['file_name'] = $_POST['nim'].'_outline1_'.time();
	    		$config['allowed_types']        = 'pdf';
		    	$config['max_size']             = '5120'; //5MB, 1024kilobytes = 1MB
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('upro1')) {
	            	$notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Proposal Topik 1 Gagal!</h4>
                Proposal Topik 1 gagal di upload. Mohon cek kembali format dan size file sebelum melakukan upload!</div>'; 
	    		}else{
	    			$file = $this->upload->data();
                	$upro1 = $file['file_name'];
                	if (!empty($outline->upro1)) {
                		unlink("uploads/".$outline->upro1);
                	}
	    			
	    		}
			}

			if (!empty($_FILES['upro2']['tmp_name'])) {
				//cek config
	    		$config['file_name'] = $_POST['nim'].'_outline2_'.time();
	    		$config['allowed_types']        = 'pdf';
		    	$config['max_size']             = '5120'; //5MB, 1024kilobytes = 1MB
    			$this->load->library('upload', $config);
    			$this->upload->initialize($config);
    			//cek bisa upload
	    		if (!$this->upload->do_upload('upro2')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Upload Proposal Topik 2 Gagal!</h4>
                Proposal Topik 2 gagal di upload. Mohon cek kembali format dan size file sebelum melakukan upload!</div>'; 
	    		}else{
	    			$file = $this->upload->data();
                	$upro2 = $file['file_name'];
                	if (!empty($outline->upro2)) {
                		unlink("uploads/".$outline->upro2);
                	}
	    			
	    		}
			}

			$data_update = array(
				'tempat' => $_POST['tempat'], 
				'tgllahir' => date('Y-m-d',strtotime($_POST['tanggallahir'])),
				'alamat' => $_POST['alamat'], 
				'tlpr' => $_POST['tlpr'], 
				'nohp' => $_POST['nohp'], 
				'email' => $_POST['email'], 
				'nmp' => $_POST['nmp'], 
				'ns' => $_POST['ns'], 
				'topik1' => $_POST['topik1'], 
				'topik2' => $_POST['topik2'], 
				'dospem' => $_POST['dospem'], 
				'yajukan' => $_POST['yajukan'], 
				'konsen' => $_POST['konsen'], 
				'lmedpel' => $_POST['lmedpel'], 
				'lstatis' => $_POST['lstatis'], 
				'lkkp' => $_POST['lkkp'], 
				'l128' => $_POST['l128'],
				'ufmhs' => $ufmhs,
				'usbs' => $usbs,
				'uspu' => $uspu,
				'ukst'=> $ukst,
				'utn' => $utn,
				'ukhs' => $ukhs,
				'upro1' => $upro1,
				'upro2' => $upro2,
				'tgl_daftar' => date('Y-m-d H:i:s')
				);
			
			if ($this->Model->update_data($data_update,'nim',$_POST['nim'],'outline'))
			{
				$notification = $notification.'<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Update Data Berhasil!</h4>
                Data pendaftaran berhasil di update. Anda bisa edit kembali data pendaftaran sebelum divalidasi oleh SUBAG LAA. Cek selalu status formulir pendaftaran pada menu <a href="Mahasiswa/status_outline/">status outline</a>.</div>';
			} else {
				$notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
                Data pendaftaran gagal di input. Mohon input data pendaftaran kembali, jika gagal mohon hubungi administrator.</div>';
			}
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Mahasiswa'),'refresh');

	}

	public function revisi_outline($id=NULL){
		$this->load->model('Model');
		//load uploading file library
		$config=array();
		$notification='';
		$config['upload_path']          = './uploads/';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		if (!empty($_FILES['prorevisi']['tmp_name'])) {
			//cek config
    		$config['file_name'] = $id.'_outlinerevisi_'.time();
    		$config['allowed_types']        = 'pdf';
	    	$config['max_size']             = '5120'; //5MB, 1024kilobytes = 1MB
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('prorevisi')) {
            	$notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Proposal Revisi Gagal!</h4>
            Proposal Revisi gagal di upload. Mohon cek kembali format dan size file sebelum melakukan upload!</div>'; 
            	$prorevisi = '';
    		}else{
    			$file = $this->upload->data();
            	$prorevisi = $file['file_name'];

            	$data_update = array(
				'outline_revisi' => $prorevisi,
				'judul_revisi' => $_POST['judulrevisi']
				);
			
			if ($this->Model->update_data($data_update,'nim',$id,'outline'))
			{
				$notification = $notification.'<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
               	Data Revisi Proposal berhasil diinput. Cek selalu status formulir pendaftaran pada menu <a href="status_outline/">status outline</a>.</div>';
			} else {
				$notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
                Data Revisi Proposal gagal diinput. Mohon input data revisi kembali, jika gagal mohon hubungi administrator.</div>';
			}
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Mahasiswa'),'refresh');
    		}
		}
	}

	public function status_outline(){
		$this->load->view('mahasiswa/proposal_outline/halaman_status', [
			'notification' => $this->session->flashdata('notification')
			]);
	}


///////////////////////////////////////Menu Sidang Skripsi////////////////////////////////////

	public function testdah($id=null){
		$this->Model->liatnotif($id);
		redirect(base_url('Mahasiswa'));
	}

	public function forms_daftar()
	{
		$this->load->helper('form');
		$this->load->view('mahasiswa/daftar_sidang/halaman_formulir', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function daftar(){
		echo "<script>document.getElementById('myloading1').style = 'visibility: visible';</script>";
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('nim','NIM','required');
		$this->form_validation->set_rules('jp','Jenjang Pendidikan','required');
		$this->form_validation->set_rules('ps','Program Studi','required');
		$this->form_validation->set_rules('tempat','Tempat Lahir','required');
		$this->form_validation->set_rules('tl','Tanggal Lahir','required');
		$this->form_validation->set_rules('ortu','Nama Orang Tua','required');
		$this->form_validation->set_rules('alamatrmh','Alamat Rumah','required');
      
		$this->form_validation->set_rules('hp','Nomor Handphone','required');
		$this->form_validation->set_rules('email','E-mail','required');
		$this->form_validation->set_rules('js','Judul Skripsi','required');
		$this->form_validation->set_rules('dospem','Nama Dosen Pembimbing','required');
		$this->form_validation->set_rules('tglpo','Tanggal Persetujuan Outline','required');
		$this->form_validation->set_rules('jtmb','Jumlah Tatap Muka Bimbingan','required');
		$this->form_validation->set_rules('ipk','Indeks Prestasi Komulatif','required');
		$this->form_validation->set_rules('slipdu','Slip Daftar Ulang Terakhir','callback_slipdu_check');
		$this->form_validation->set_rules('slipbs','Slip Bimbingan Skripsi','callback_slipbs_check');
		$this->form_validation->set_rules('slipus','Slip Ujian Skripsi','callback_slipus_check');
		$this->form_validation->set_rules('ktp','Fotokopi KTP','callback_ktp_check');
		$this->form_validation->set_rules('kk','Fotokopi KK','callback_kk_check');

		if (!empty($_FILES['slipps']['tmp_name'])) {
			$this->form_validation->set_rules('slipps','Slip Perpanjangan Skripsi','callback_slipps_check');
		}
		
		// $this->form_validation->set_rules('slipbs','Slip Bimbingan Skripsi','required');
		// $this->form_validation->set_rules('slipus','Slip Ujian Skripsi','required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi!');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button class="close" data-close="alert"></button><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> ','</div>');

		if ($this->form_validation->run()==FALSE) {
			$notification='<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info-circle"></i> Terjadi Kesalahan!</h4>
            Formulir Pendaftaran gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
            $this->session->set_flashdata('notification', $notification);
			$this->load->view('mahasiswa/daftar_sidang/halaman_formulir', [
			'notification' => $this->session->flashdata('notification')
			]);
		}else{
			//load uploading file library
			$config=array();
			$config['upload_path']          = './uploads/sidang_skripsi/';
	    	$config['allowed_types']        = 'gif|png|jpg';
	    	$config['max_size']             = '2048'; //2MB, 1024kilobytes = 1MB
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$slipdu='';
			$slipbs='';
			$slipus='';
			$slipps='';
			$ktp='';
			$kk='';
			$notification='';
			
			//cek config
    		$config['file_name'] = $_POST['nim'].'_slip-daftar-ulang_'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('slipdu')) {
               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Slip Daftar Ulang Gagal!</h4>
            Slip Daftar Ulang gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
    		}else{
    			$gambar = $this->upload->data();
            	$slipdu = $gambar['file_name'];
    		}

    		//cek config
    		$config['file_name'] = $_POST['nim'].'_slip-bimbingan-skripsi'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('slipbs')) {
               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Slip Bimbingan Skripsi Gagal!</h4>
            Slip Bimbingan Skripsi gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
    		}else{
    			$gambar = $this->upload->data();
            	$slipbs = $gambar['file_name'];
    		}

    		//cek config
    		$config['file_name'] = $_POST['nim'].'_slip-ujian-skripsi_'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('slipus')) {
               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Slip Ujian Skripsi Gagal!</h4>
            Slip Ujian Skripsi gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
    		}else{
    			$gambar = $this->upload->data();
            	$slipus = $gambar['file_name'];
    		}

    		if (!empty($_FILES['slipps']['tmp_name'])) {
				//cek config
	    		$config['file_name'] = $_POST['nim'].'_slip-perpanjangan-skripsi'.time();
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				//cek bisa upload
	    		if (!$this->upload->do_upload('slipps')) {
	               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Upload Slip Perpanjangan Skripsi Gagal!</h4>
	            Slip Perpanjangan Skripsi gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
	    		}else{
	    			$gambar = $this->upload->data();
	            	$slipps = $gambar['file_name'];
	    		}
			}

			//cek config
    		$config['file_name'] = $_POST['nim'].'_KTP'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('ktp')) {
               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Kartu Tanda Penduduk Gagal!</h4>
            Kartu Tanda Penduduk gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
    		}else{
    			$gambar = $this->upload->data();
            	$ktp = $gambar['file_name'];
    		}

    		//cek config
    		$config['file_name'] = $_POST['nim'].'_KK'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('kk')) {
               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Kartu Keluarga Gagal!</h4>
            Kartu Keluarga gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
    		}else{
    			$gambar = $this->upload->data();
            	$kk = $gambar['file_name'];
    		}

    		$this->load->model('Model');
			$data = array(
				'nama' => $_POST['nama'], 			
				'nim' => $_POST['nim'], 
				'jenjang_pendidikan' => $_POST['jp'], 
				'program_studi' => $_POST['ps'], 
				'tempat' => $_POST['tempat'], 
				'tanggal_lahir' => date('Y-m-d',strtotime($_POST['tl'])),
				'ortu' => $_POST['ortu'], 
				'alamatrmh' => $_POST['alamatrmh'], 
				'teleponrmh' => $_POST['tr'], 
				'hp' => $_POST['hp'], 
				'kantor' => $_POST['namaktr'], 
				'jabatan' => $_POST['jt'], 
				'email' => $_POST['email'], 
				'alamatktr' => $_POST['alamatktr'], 
				'teleponktr' => $_POST['tk'], 
				 
				'judul_skripsi' => $_POST['js'], 
				'dospem' => $_POST['dospem'], 
				'tglpo' => date('Y-m-d',strtotime($_POST['tglpo'])),
				'bimbingan' => $_POST['jtmb'], 
				'pers' => $_POST['pers'], 
				'ipk' => $_POST['ipk'], 

				'slipdut' => $slipdu,
				'lu_slipdut' => date('Y-m-d H:i:s'),
				'slipbs' => $slipbs,
				'lu_slipbs'=>date('Y-m-d H:i:s'),
				'slipus' => $slipus,
				'lu_slipus'=>date('Y-m-d H:i:s'),
				
				'ktp' => $ktp,
				'lu_ktp'=>date('Y-m-d H:i:s'),
				'kk' => $kk,
				'lu_kk'=>date('Y-m-d H:i:s'),
				'tgl_daftar' => date('Y-m-d H:i:s')
				);

			if (!empty($_FILES['slipps']['tmp_name'])) {
				$data['slipps']=$slipps;
				$data['lu_slipps']=date('Y-m-d H:i:s');
			}
			
			if ($this->Model->create('daftar_sidang',$data))
			{
				$notification = $notification.'<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
                Data pendaftaran berhasil di input. Anda bisa edit kembali data pendaftaran sebelum divalidasi oleh SUBAG LAA. Cek selalu status formulir pendaftaran pada menu <a href="Mahasiswa/status_sidang/">status outline</a>.</div>';
			} else {
				$notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
                Data pendaftaran gagal di input. Mohon input data pendaftaran kembali, jika gagal mohon hubungi administrator.</div>';
			}
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Mahasiswa'),'refresh');
		}
	}

	public function update_daftar()
	{
		echo "<script>document.getElementById('myloading2').style = 'visibility: visible';</script>";
		$this->load->model('Model');
		$formulir=$this->Model->read_detail('nim',$_POST['nim'],'daftar_sidang');
		$notification='';
		//load uploading file library
		$config=array();
		$data_update=array();
		$config['upload_path']          = './uploads/sidang_skripsi/';
    	$config['allowed_types']        = 'gif|png|jpg';
    	$config['max_size']             = '2048'; //2MB, 1024kilobytes = 1MB
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$ktp=$formulir->ktp;
		$kk=$formulir->kk;
		$slipdu=$formulir->slipdut;
		$slipbs=$formulir->slipbs;
		$slipus=$formulir->slipus;
		$slipps=$formulir->slipps;
		
		
		if (!empty($_FILES['ktp']['tmp_name'])) {
			//cek config
    		$config['file_name'] = $_POST['nim'].'_KTP'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('ktp')) {
               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Kartu Tanda Penduduk Gagal!</h4>
            Kartu Tanda Penduduk gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
    		}else{
    			$gambar = $this->upload->data();
            	$ktp = $gambar['file_name'];
          		$data_update['lu_ktp']=date('Y-m-d H:i:s');
            	if (!empty($formulir->ktp)) {
            		unlink("uploads/sidang_skripsi/".$formulir->ktp);
            	}
    		}
		}

		if (!empty($_FILES['kk']['tmp_name'])) {
			//cek config
    		$config['file_name'] = $_POST['nim'].'_KK'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('kk')) {
               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Kartu Keluarga Gagal!</h4>
            Kartu Keluarga gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
    		}else{
    			$gambar = $this->upload->data();
            	$kk = $gambar['file_name'];
            	if (!empty($formulir->kk)) {
            		unlink("uploads/sidang_skripsi/".$formulir->kk);
            	}
    			$data_update['lu_kk']=date('Y-m-d H:i:s');
    		}
		}

		if (!empty($_FILES['slipdu']['tmp_name'])) {
			//cek config
    		$config['file_name'] = $_POST['nim'].'_slip-daftar-ulang_'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('slipdu')) {
               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Slip Daftar Ulang Gagal!</h4>
            Slip Daftar Ulang gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
    		}else{
    			$gambar = $this->upload->data();
            	$slipdu = $gambar['file_name'];
            	if (!empty($formulir->slipdut)) {
            		unlink("uploads/sidang_skripsi/".$formulir->slipdut);
            	}
    			$data_update['lu_slipdut'] = date('Y-m-d H:i:s');
    		}
		}

		if (!empty($_FILES['slipbs']['tmp_name'])) {
			//cek config
    		$config['file_name'] = $_POST['nim'].'_slip-bimbingan-skripsi'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('slipbs')) {
               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Slip Bimbingan Skripsi Gagal!</h4>
            Slip Bimbingan Skripsi gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
    		}else{
    			$gambar = $this->upload->data();
            	$slipbs = $gambar['file_name'];
            	if (!empty($formulir->slipbs)) {
            		unlink("uploads/sidang_skripsi/".$formulir->slipbs);
            	}
    			$data_update['lu_slipbs']=date('Y-m-d H:i:s');
    		}
		}

		if (!empty($_FILES['slipus']['tmp_name'])) {
			//cek config
    		$config['file_name'] = $_POST['nim'].'_slip-ujian-skripsi_'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('slipus')) {
               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Slip Ujian Skripsi Gagal!</h4>
            Slip Ujian Skripsi gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
    		}else{
    			$gambar = $this->upload->data();
            	$slipus = $gambar['file_name'];
            	if (!empty($formulir->slipus)) {
            		unlink("uploads/sidang_skripsi/".$formulir->slipus);
            	}
    			$data_update['lu_slipus']=date('Y-m-d H:i:s');
    		}
		}

		if (!empty($_FILES['slipps']['tmp_name'])) {
			//cek config
    		$config['file_name'] = $_POST['nim'].'_slip-perpanjangan-skripsi'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
    		if (!$this->upload->do_upload('slipps')) {
               $notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Upload Slip Perpanjangan Skripsi Gagal!</h4>
            Slip Perpanjangan Skripsi gagal di upload. Mohon cek kembali format dan size gambar sebelum melakukan upload!</div>';
    		}else{
    			$gambar = $this->upload->data();
            	$slipps = $gambar['file_name'];
            	if (!empty($formulir->slipps)) {
            		unlink("uploads/sidang_skripsi/".$formulir->slipps);
            	}
    			$data_update['lu_slipps']=date('Y-m-d H:i:s');
    		}
		}

		$data_update = array_merge($data_update, array(
			'jenjang_pendidikan' => $_POST['jp'], 
			'tempat' => $_POST['tempat'], 
			'tanggal_lahir' => date('Y-m-d',strtotime($_POST['tl'])),
			'ortu' => $_POST['ortu'], 
			'alamatrmh' => $_POST['alamatrmh'], 
			'teleponrmh' => $_POST['tr'], 
			'hp' => $_POST['hp'], 
			'kantor' => $_POST['namaktr'], 
			'jabatan' => $_POST['jt'], 
			'email' => $_POST['email'], 
			'alamatktr' => $_POST['alamatktr'], 
			'teleponktr' => $_POST['tk'], 
			 
			'judul_skripsi' => $_POST['js'], 
			'dospem' => $_POST['dospem'], 
			'tglpo' => date('Y-m-d',strtotime($_POST['tglpo'])),
			'bimbingan' => $_POST['jtmb'], 
			'pers' => $_POST['pers'], 
			'ipk' => $_POST['ipk'], 

			'slipdut' => $slipdu,
			'slipbs' => $slipbs,
			'slipus' => $slipus,
			'slipps' => $slipps,
			
			'ktp' => $ktp,
			'kk' => $kk,
			'tgl_daftar' => date('Y-m-d H:i:s')
			));
		
		
		if ($this->Model->update_data($data_update,'nim',$_POST['nim'],'daftar_sidang'))
		{
			$notification = $notification.'<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Update Data Berhasil!</h4>
            Data pendaftaran berhasil di update. Anda bisa edit kembali data pendaftaran sebelum diverifikasi oleh SUBAG LAA. Cek selalu status formulir pendaftaran pada menu <a href="Mahasiswa/status_sidang/">status pendaftaran</a>.</div>';
		} else {
			$notification = $notification.'<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
            Data pendaftaran gagal di input. Mohon input data pendaftaran kembali, jika gagal mohon hubungi administrator.</div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Mahasiswa'),'refresh');

		// Salah awal 
		// $data['nim']='asasasa';

		// add array 
		// $data=array(
		// 	'nama' => 'asasa',
		// 	'tempat' => 'dsadada'
		// 	);
	}

	public function status_sidang()
	{
		$this->load->helper('form');
		$this->load->view('mahasiswa/daftar_sidang/halaman_status', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function list_revisi()
	{
		$this->load->library('form_validation');
		$this->load->view('mahasiswa/daftar_sidang/halaman_list_revisi', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function revisi_sidang($id=NULL){
		$notification='';
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul_revisi','Judul Revisi','required');
		$this->form_validation->set_rules('file_revisi','File Revisi','callback_revisi_check');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi!');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button class="close" data-close="alert"></button><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> ','</div>');

		if ($this->form_validation->run()==FALSE) {
			$notification = $notification.'<div class="alert alert-danger alert-dismissible">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <h4><i class="icon fa fa-warning"></i> Gagal Diproses!</h4>
		    Mohon mengisi kembali.</div>';
			$this->session->set_flashdata('notification', $notification);
			$this->load->view('mahasiswa/daftar_sidang/halaman_list_revisi', [
				'notification' => $this->session->flashdata('notification')
			]);		
		}else{
			$cek_file=$this->Model->read_detail('nim',$this->session->userdata('username'),'penilaian');
			//load uploading file library
			$config=array();
			$config['upload_path']          = './uploads/revisi_sidang/';
	    	$config['max_size']             = '0'; //2MB, 1024kilobytes = 1MB
	    	$config['allowed_types']        = '*';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$sidang='';
			//cek config
			$config['file_name'] = $this->session->userdata('username').'-Revisi_Sidang'.time();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			//cek bisa upload
			if (!$this->upload->do_upload('file_revisi')) {
	           $notification = $notification.'<div class="alert alert-danger alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        <h4><i class="icon fa fa-check"></i> Upload File Gagal!</h4>
	        Mohon upload file kembali!</div>';
			}else{
				$file_upload = $this->upload->data();
	        	$sidang = $file_upload['file_name'];
            	if (!empty($cek_file->file_revisi)) {
            		unlink("uploads/revisi_sidang/".$cek_file->file_revisi);
            	}
			}

			$data = array(
			'tgl_upload' => date('Y-m-d H:i:s'),
			'file_revisi' => $sidang,
			'judul_revisi' => $_POST['judul_revisi']
			);

			if ($this->Model->update_data($data,'nim',$this->session->userdata('username'),'penilaian')) {
				$notification = $notification.'<div class="alert alert-success alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        <h4><i class="icon fa fa-check"></i> Upload File Berhasil!</h4>
	        </div>';
			}else{
				$notification = $notification.'<div class="alert alert-danger alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        <h4><i class="icon fa fa-exclamation-triangle"></i> Upload Revisi Gagal!</h4>
	        Mohon upload revisi kembali!</div>';
			}

			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('mahasiswa/list_revisi/'),'refresh');	

		}
	}

	public function revisi_check($str){
        $allowed_mime_type_arr = array('application/pdf');
        $mime = $_FILES['file_revisi']['type'];
        if(isset($_FILES['file_revisi']['name']) && $_FILES['file_revisi']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('revisi_check', 'Format File Revisi Harus : <strong>.pdf</strong>');
                return false;
            }
        }else{
            $this->form_validation->set_message('revisi_check', 'File revisi masih kosong, silahkan pilih file revisi terlebih dahulu.');
            return false;
        }
    }


	public function slipdu_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = $_FILES['slipdu']['type'];
        $size = $_FILES['slipdu']['size'];
        if(isset($_FILES['slipdu']['name']) && $_FILES['slipdu']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                if ($size<=2097152) {
                	return true;
                } else {
                	$this->form_validation->set_message('slipdu_check', 'File too large. File must be less than 2 megabytes.');
                	return false;
                }
            }else{
                $this->form_validation->set_message('slipdu_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('slipdu_check', 'Please choose a file to upload.');
            return false;
        }
    }

    public function slipbs_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = $_FILES['slipbs']['type'];
        $size = $_FILES['slipbs']['size'];
        if(isset($_FILES['slipbs']['name']) && $_FILES['slipbs']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                if ($size<=2097152) {
                	return true;
                } else {
                	$this->form_validation->set_message('slipbs_check', 'File too large. File must be less than 2 megabytes.');
                	return false;
                }
            }else{
                $this->form_validation->set_message('slipbs_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('slipbs_check', 'Please choose a file to upload.');
            return false;
        }
    }

    public function slipus_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = $_FILES['slipus']['type'];
        $size = $_FILES['slipus']['size'];
        if(isset($_FILES['slipus']['name']) && $_FILES['slipus']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                if ($size<=2097152) {
                	return true;
                } else {
                	$this->form_validation->set_message('slipus_check', 'File too large. File must be less than 2 megabytes.');
                	return false;
                }
            }else{
                $this->form_validation->set_message('slipus_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('slipus_check', 'Please choose a file to upload.');
            return false;
        }
    }

    public function slipps_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = $_FILES['slipps']['type'];
        $size = $_FILES['slipps']['size'];
        if(isset($_FILES['slipps']['name']) && $_FILES['slipps']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                if ($size<=2097152) {
                	return true;
                } else {
                	$this->form_validation->set_message('slipps_check', 'File too large. File must be less than 2 megabytes.');
                	return false;
                }
            }else{
                $this->form_validation->set_message('slipps_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('slipps_check', 'Please choose a file to upload.');
            return false;
        }
    }

    public function ktp_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = $_FILES['ktp']['type'];
        $size = $_FILES['ktp']['size'];
        if(isset($_FILES['ktp']['name']) && $_FILES['ktp']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                if ($size<=2097152) {
                	return true;
                } else {
                	$this->form_validation->set_message('ktp_check', 'File too large. File must be less than 2 megabytes.');
                	return false;
                }
            }else{
                $this->form_validation->set_message('ktp_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('ktp_check', 'Please choose a file to upload.');
            return false;
        }
    }

    public function kk_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = $_FILES['kk']['type'];
        $size = $_FILES['kk']['size'];
        if(isset($_FILES['kk']['name']) && $_FILES['kk']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                if ($size<=2097152) {
                	return true;
                } else {
                	$this->form_validation->set_message('kk_check', 'File too large. File must be less than 2 megabytes.');
                	return false;
                }
            }else{
                $this->form_validation->set_message('kk_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('kk_check', 'Please choose a file to upload.');
            return false;
        }
    }

///////////////////////////////////////Menu LOG BOOK//////////////////////////////////

	public function log_book(){
		$this->load->view('mahasiswa/log_book/halaman_log_book', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function tambah_bimbingan(){
		$data_log = array(
			'tanggal' => date('Y-m-d H:i:s'),
			'topik' => $_POST['topik'],
			'id_dospem' => $_POST['iddospem']
			);
		$cek=$this->Model->read_where('id_dospem',$_POST['iddospem'],'log_book');

		//cek status tervalidasi
		if (!empty($cek)) {
			if ($this->Model->cek_belum_tervalidasi($_POST['iddospem'])>0) {
                $notification = '<div class="alert alert-danger alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h4><i class="icon fa fa-check"></i> Input Log Book Gagal!</h4>
		            Data log book gagal di input. Mohon input data kembali, jika gagal mohon hubungi administrator.</div>';
            }else{
                if ($this->Model->create('log_book',$data_log))
				{
					$notification = '<div class="alert alert-success alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h4><i class="icon fa fa-check"></i> Input Log Book Berhasil!</h4>
		            Data log book berhasil di input. Cek selalu status validasi dosen pembimbing log book .</div>';
				} else {
					$notification = '<div class="alert alert-danger alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h4><i class="icon fa fa-check"></i> Input Log Book Gagal!</h4>
		            Data log book gagal di input. Mohon input data kembali, jika gagal mohon hubungi administrator.</div>';
				}
         	}
        }else{ 
            if ($this->Model->create('log_book',$data_log))
			{
				$notification = '<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Input Log Book Berhasil!</h4>
	            Data log book berhasil di input. Cek selalu status validasi dosen pembimbing log book .</div>';
			} else {
				$notification = '<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Input Log Book Gagal!</h4>
	            Data log book gagal di input. Mohon input data kembali, jika gagal mohon hubungi administrator.</div>';
			}
        }                         
		
		
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Mahasiswa/log_book'),'refresh');
	}

	public function update_bimbingan($id=null){
		$log_book=$this->Model->read_detail('id',$id,'log_book');
		$data_update = array(
			'topik' => $_POST['topik'],
			'lu_topik' => date('Y-m-d H:i:s'),
			'accdospem' => NULL,
			'tglaccdospem' => NULL
			);
		if ($this->Model->update_data($data_update,'id',$id,'log_book')) {
			$notification = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Input Log Book Berhasil!</h4>
            Data log book tanggal '.date('l, d-m-Y H:i:s',strtotime($log_book->tanggal)).' berhasil di update. Cek selalu status validasi dosen pembimbing log book .</div>';
		} else {
			$notification = '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Input Log Book Gagal!</h4>
            Data log book tanggal '.date('l, d-m-Y H:i:s',strtotime($log_book->tanggal)).' gagal di update. Mohon input data kembali, jika gagal mohon hubungi administrator.</div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Mahasiswa/log_book'),'refresh');
	}

	public function cetak_logbook(){
		$this->load->view('mahasiswa/log_book/cetak_logbook');
	}


///////////////////////////////////////////////GANTI JUDUL////////////////////////////////////////////////////////////////////

	public function ganti_judul(){
		$this->load->view('mahasiswa/ganti_judul/halaman_ganti_judul', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function proses_ganti_judul($id=null){
		$data = array(
			'nim' => $id,
			'judul_sebelum' => $_POST['judul_sebelum'],
			'judul_baru' => $_POST['judul_baru'],
			'keterangan' => $_POST['keterangan'],
			'tgl_mengajukan' => date('Y-m-d H:i:s')
		);
		if ($this->Model->create('ganti_judul',$data)) {
			$notification = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Permohonan Ganti Judul Skripsi Berhasil!</h4>
            Judul skripsi akan diproses setelah disetujui Kaprodi.</div>';
			
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Permohonan Ganti Judul Skripsi Gagal!</h4>
            Silahkan isi kembali, jika gagal lagi mohon hubungi Subag LAA</div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Mahasiswa/ganti_judul/'));	
	}

	public function hapus_permohonan_ganti_judul($id=null)
	{
		if ($this->Model->delete('id',$id,'ganti_judul')) {
			$notification = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Berhasil Dihapus!</h4>
            Permohonan Ganti Judul Skripsi Berhasil Dihapus!</div>';
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Gagal!</h4>
            Jika gagal lagi mohon hubungi Subag LAA</div>';
		}
		$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Mahasiswa/ganti_judul/'));	
	}

///////////////////////////////////////////////GANTI pembimbing////////////////////////////////////////////////////////////////////


	public function ganti_pembimbing(){
			$this->load->view('mahasiswa/ganti_pembimbing/halaman_ganti_pembimbing', [
				'notification' => $this->session->flashdata('notification')
				]);
		}

	public function proses_ganti_pembimbing($id=null){
		$data = array(
			'nim' => $id,
			'pembimbing_lama' => $_POST['pembimbing_lama'],
			'pembimbing_baru' => $_POST['pembimbing_baru'],
			'keterangan' => $_POST['keterangan'],
			'tgl_mengajukan' => date('Y-m-d H:i:s')
		);
		if ($this->Model->create('ganti_dospem',$data)) {
			$notification = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Permohonan Ganti Pembimbing Berhasil!</h4>
            Pergantian dosen pembimbing baru akan diproses setelah disetujui Kaprodi.</div>';
			
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Permohonan Ganti Pembimbing Gagal!</h4>
            Silahkan isi kembali, jika gagal lagi mohon hubungi Subag LAA</div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Mahasiswa/ganti_pembimbing/'));	
	}

	public function hapus_permohonan_ganti_pembimbing($id=null)
	{
		if ($this->Model->delete('id',$id,'ganti_dospem')) {
			$notification = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Berhasil Dihapus!</h4>
            Permohonan Ganti Pembimbing Berhasil Dihapus!</div>';
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Gagal!</h4>
            Jika gagal lagi mohon hubungi Subag LAA</div>';
		}
		$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Mahasiswa/ganti_pembimbing/'));	
	}
///////////////////////////////////////////////HELP DESK////////////////////////////////////////////////////////////////////


	public function help_desk(){
			$this->load->view('mahasiswa/help_desk/halaman_help_desk', [
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
		redirect(base_url('Mahasiswa/help_desk/'));	
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
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi!');
		$this->form_validation->set_error_delimiters('<p class="text-red"><code><strong>','</strong></code></p>');


		if($this->form_validation->run() == FALSE){
			$this->load->view('mahasiswa/halaman_gantipass');

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
			redirect(base_url('Mahasiswa'),'refresh');
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

	public function status(){
		$this->load->view('mahasiswa/halaman_status');
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
