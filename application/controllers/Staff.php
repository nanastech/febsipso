<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
	protected $username_temp;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->library('mainlib');
		$this->mainlib->logged_staff();
	}
	public function index()
	{
		$this->load->view('staff/layout/header', [
			'title' => 'Sistem Informasi Pelaksanaan Skripsi Online | Dashboard'
		]);
		$this->load->view('staff/halaman_staff', [
			'notification' => $this->session->flashdata('notification')
		]);
		// $this->load->view('staff/layout/footer');
	}

	// public function about()
	// {
	// 	$this->load->view('staff/halaman_about', [
	// 		'notification' => $this->session->flashdata('notification')
	// 	]);

	// }
	




///////////////////////////////////Menu Data Akun/////////////////////////////////////////////
	// ====================Awal Daftar Akun====================
	public function daftar_akun(){
		$this->load->library('form_validation');
		$this->load->view('staff/data_akun/halaman_daftar_akun',[
			'notification' => $this->session->flashdata('notification')
			]);
	}
	

	public function create_akun()
	{	
		$notification='';

		$this->load->library('form_validation');

		$post = $this->input->post();
		$this->form_validation->set_rules('username','Username','required|callback_username_check');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('role','Role','required');
		if ($_POST['role']=='staff' || $_POST['role']=='dosen') {
			# code...
		}else{
			$this->form_validation->set_rules('prodi','Program Studi','required');
		}
		$this->form_validation->set_rules('status','Status Akun','required');
		
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi!');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button class="close" data-close="alert"></button><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> ','</div>');

		if ($this->form_validation->run()==FALSE) {
			$notification='<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info-circle"></i> Terjadi Kesalahan!</h4>
            Gagal memproses!</div>';
			$this->session->set_flashdata('notification', $notification);
			$this->load->view('staff/data_akun/halaman_daftar_akun', [
			'notification' => $this->session->flashdata('notification')
			]);
		}else{
			$this->load->model('Model');
			$this->load->helper('site_helper');
			$encrypt_password = bCrypt($post['password'],12);//banyak encrypt nya 12
			if ($post['role']=='kaprodi') {
				$username=$post['prodi'].$post['username'];
			}else{
				$username=$post['username'];
			}
			if ($post['prodi']) {
				$prodi=$post['prodi'];
			}else{
				$prodi='UM';
			}
			
			$data1 = array(
				'username' => $username,
				'password' => $encrypt_password,
				'name' => $post['nama'],
				'role' => $post['role'],
				'prodi' => $prodi,
				'created_at' => date('Y-m-d H:i:s'),
				'status' => $post['status']
				);

			if ($post['role']=='mahasiswa') {
				$data2 = array(
				'nim' => $post['username'],
				'nama' => $post['nama'],
				'jurusan' => $prodi
				);
				$data_tabel=$this->Model->create('mahasiswa',$data2);
			}elseif ($post['role']=='dosen') {
				$data2 = array(
				'noreg' => $post['username'],
				'nama' => $post['nama'],
				'prodi' => $prodi
				);
				$data_tabel=$this->Model->create('dosen',$data2);
			}elseif ($post['role']=='kaprodi') {
				$data2 = array(
				'noreg' => $post['username'],
				'prodi' => $prodi
				);
				$data_tabel=$this->Model->create('kaprodi',$data2);			
			}elseif ($post['role']=='staff') {
				$data_tabel=TRUE;
			}

			if ($data_tabel && $this->Model->create('users',$data1)) {
				$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
                Data akun baru berhasil di input.<br><strong>Username : '.$username.'<br>Password : '.$post['password'].'<br>Name : '.$post['nama'].'<br>Role : '.$post['role'].'</strong></div>';
			}else{
				$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
                Data akun gagal di input.</div>';
			}
			
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Staff/daftar_akun'),'refresh');
		}
	}

	public function username_check($str){
        if ($_POST['role']=='mahasiswa') {
    		if ($this->Model->read_detail('username',$_POST['username'],'users')) {
    			$this->form_validation->set_message('username_check', 'Username <strong>'.$_POST['username'].'</strong> sudah terdaftar.');
            	return false;
    		}else{
    			if ($this->Model->read_detail('nim',$_POST['username'],'mahasiswa')) {
	        		$this->form_validation->set_message('username_check', 'Username <strong>'.$_POST['username'].'</strong> sudah tersedia di daftar mahasiswa, harap segera daftarkan melalui menu <strong><a href="'.base_url().'/Staff/daftar_mhs/">Daftar Mahasiswa</a></strong>');
	                return false;
	        	}else{
    				return TRUE;
				}
    		}
        	
        }elseif ($_POST['role']=='dosen') {
    		if ($this->Model->read_detail('username',$_POST['username'],'users')) {
    			$this->form_validation->set_message('username_check', 'Username <strong>'.$_POST['username'].'</strong> sudah terdaftar.');
            	return false;
    		}else{
    			if ($this->Model->read_detail('noreg',$_POST['username'],'dosen')) {
	        		$this->form_validation->set_message('username_check', 'Username <strong>'.$_POST['username'].'</strong> sudah tersedia di daftar dosen, harap segera daftarkan melalui menu <strong><a href="'.base_url().'/Staff/daftar_dosen/">Daftar Dosen</a></strong>');
	                return false;
	        	}else{
    				return TRUE;
				}
    		}
        	
        }elseif ($_POST['role']=='kaprodi') {
    		$kaprodi=$_POST['prodi'].$_POST['username'];
    		if ($this->Model->read_detail('username',$kaprodi,'users')) {
    			$this->form_validation->set_message('username_check', 'Username <strong>'.$_POST['username'].'</strong> sudah terdaftar.');
            	return false;
    		}else{
    			if ($this->Model->read_detail_dual('prodi',$_POST['prodi'],'noreg',$_POST['username'],'kaprodi')) {
	        		$this->form_validation->set_message('username_check', 'Username <strong>'.$_POST['username'].'</strong> sudah terdaftar menjadi kepala program studi. Dapat dilihat pada menu <strong><a href="'.base_url().'/Staff/daftar_kaprodi/">Daftar Kaprodi</a></strong>');
	                return false;
	        	}else{
    				return TRUE;
				}
    		}
        	
        }elseif ($_POST['role']=='staff') {
        	if ($this->Model->read_detail('username',$_POST['username'],'users')) {
    			$this->form_validation->set_message('username_check', 'Username <strong>'.$_POST['username'].'</strong> sudah terdaftar.');
            	return false;
    		}else{
    			return TRUE;
        	}
        }
    }

	public function update_akun($id=NULL)
	{
		$notification='';
		$post = $this->input->post();
		$this->load->model('Model');
		$data_update1= array(
			'role' => $post['role'],
			'prodi' => $post['prodi'],
			'status' => $post['status']
			);
		$data_update2= array();
		$user=$this->Model->read_detail('username',$id,'users');
		if ($user->username!=$post['username']) {
			$data_update1['username']=$post['username'];
			if ($post['role']=='dosen') {
				$data_update2['noreg']=$post['username'];
			}elseif ($post['role']=='mahasiswa') {
				$data_update2['nim']=$post['username'];
			}
			
		}
		if (!empty($post['password'])) {
			$this->load->helper('site_helper');
			$encrypt_password = bCrypt($post['password'],12);//banyak encrypt nya 12
			$data_update1['password']=$encrypt_password;
		}
		if ($user->name!=$post['nama']) {
			$data_update1['name']=$post['nama'];
			$data_update2['nama']=$post['nama'];
		}
		
		if ($this->Model->update_data($data_update1,'username',$id,'users')) {
			if ($post['role']=='dosen') {
				$data_update2['prodi']=$post['prodi'];
				if ($this->Model->update_data($data_update2,'noreg',$id,'dosen')) {
					$notification = $notification.'<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Update Data Berhasil!</h4>
	                Data akun berhasil di update.</div>';
				}else{
					$notification = $notification.'<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Update Data Gagal!</h4>
	                Data akun gagal di update.</div>';
				}
			}elseif ($post['role']=='mahasiswa') {
				$data_update2['jurusan']=$post['prodi'];
				if ($this->Model->update_data($data_update2,'nim',$id,'mahasiswa')) {
					$notification = $notification.'<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Update Data Berhasil!</h4>
	                Data akun berhasil di update.</div>';
				}else{
					$notification = $notification.'<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Update Data Gagal!</h4>
	                Data akun gagal di update.</div>';
				}
			}else{
				$notification = $notification.'<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Update Data Berhasil!</h4>
	                Data akun berhasil di update.</div>';
			}
		}else{
			$notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Update Data Gagal!</h4>
                Data akun gagal di update.</div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('staff/daftar_akun'),'refresh');
		
	}

	public function delete_akun($id=NULL){
		$this->load->model('Model');
		$user=$this->Model->read_detail('username',$id,'users');
		if ($user->role=='kaprodi') {
			$noreg=substr($id,2);
			$prodi=substr($id,0,2);
			if ($this->Model->delete_dual('prodi',$prodi,'noreg',$noreg,'kaprodi')) {
				if ($this->Model->delete('username',$id,'users')) {
					$notification = '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Delete Data Berhasil!</h4>
	                Data akun berhasil di delete.</div>';
				}else{
					$notification = '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Delete Data Gagal!</h4>
	                Data akun gagal di delete.</div>';
				}
			}else{
				$notification = '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Delete Data Gagal!</h4>
	                Data akun gagal di delete.</div>';
			}
		}else{
			if ($this->Model->delete('username',$id,'users')) {
			$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Delete Data Berhasil!</h4>
                Data akun berhasil di delete.</div>';
			}else{
				$notification = '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Delete Data Gagal!</h4>
	                Data akun gagal di delete.</div>';
			}
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('staff/daftar_akun'),'refresh');
	}
	// ====================Akhir Daftar Akun====================

	
#### akhir MENU BUAT AKUN ####

	
	// ====================Awal Daftar Mahasiswa====================
	public function daftar_mhs(){
		$this->load->view('staff/data_akun/halaman_daftar_mhs',[
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function daftarkan_mhs($nim=NULL){
		$this->load->helper('site_helper');
		$encrypt_password = bCrypt($nim,12);//banyak encrypt nya 12
		$mahasiswa=$this->Model->read_detail('nim',$nim,'mahasiswa');
		$data1 = array(
		'username' => $nim,
		'password' => $encrypt_password,
		'name' => $mahasiswa->nama,
		'role' => 'mahasiswa',
		'prodi' => $mahasiswa->jurusan,
		'created_at' => date('Y-m-d H:i:s'),
		'status' => '1'
		);

		if ($this->Model->create('users',$data1)) {
				$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
                Data akun baru berhasil di input.<br><strong>Username : '.$nim.'<br>Password : '.$nim.'<br>Name : '.$mahasiswa->nama.'<br>Role : mahasiswa</strong></div>';
			}else{
				$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
                Data akun gagal di input.</div>';
			}
			
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('staff/daftar_mhs'),'refresh');
	}

	// public function daftarkan($nim){
	// 	$this->load->model('Model');
	// 	$akun= $this->Model->read_detail('nim',$nim,'account');
	// 	$this->load->helper('site_helper');
	// 	$encrypt_password = bCrypt($akun->password,12);//banyak encrypt nya 12
	// 	$data = array(
	// 		'username' => $akun->nim,
	// 		'name' =>  $akun->namalengkap,
	// 		'email' =>  $akun->email,
	// 		'password' =>  $encrypt_password,
	// 		'pwd' => $akun->password,
	// 		'role' =>  'mahasiswa',
	// 		'created_at' =>  date('Y-m-d H:i:s'),
	// 		'status' =>  1
	// 		);
	// 	if ($this->Model->create('users',$data))
	// 		{
	// 			$notification = '<div class="alert alert-success alert-dismissible">
 //                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 //                <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
 //                Data pendaftaran akun mahasiswa berhasil!.</div>';
	// 		} else {
	// 			$notification = '<div class="alert alert-danger alert-dismissible">
 //                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 //                <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
 //                Data pendaftaran akun mahasiswa gagal!.</div>';
	// 		}

	// 		$this->session->set_flashdata('notification', $notification);
	// 		redirect(base_url('Staff'),'refresh');
	// }

	
	// ====================Akhir Daftar Mahasiswa====================

	// ====================Awal Daftar Dosen====================
	public function daftar_dosen(){
		$this->load->view('staff/data_akun/halaman_daftar_dosen');
	}

	public function daftarkan_dsn($id=NULL){
		$this->load->helper('site_helper');
		$encrypt_password = bCrypt($id,12);//banyak encrypt nya 12
		$dosen=$this->Model->read_detail('noreg',$id,'dosen');
		$data1 = array(
		'username' => $id,
		'password' => $encrypt_password,
		'name' => $dosen->nama,
		'role' => 'dosen',
		'prodi' => $dosen->prodi,
		'created_at' => date('Y-m-d H:i:s'),
		'status' => '1'
		);

		if ($this->Model->create('users',$data1)) {
				$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
                Data akun baru berhasil di input.<br><strong>Username : '.$id.'<br>Password : '.$id.'<br>Name : '.$dosen->nama.'<br>Role : dosen</strong></div>';
			}else{
				$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
                Data akun gagal di input.</div>';
			}
			
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Staff/daftar_akun'),'refresh');
	}
	// ====================Akhir Daftar Dosen====================

	// ====================Awal Daftar DosenPA====================
	public function daftar_dosenpa($ket=NULL){
		if ($ket=='daftar') {
			$post = $this->input->post();
			$data= array(
				'nim' => $post['mahasiswa'],
				'noreg' => $post['dosenpa']
				);
			$this->load->model('Model');
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
			redirect(base_url('Staff/daftar_dosenpa'),'refresh');
		}elseif ($ket=='update') {
			$post = $this->input->post();
			$data_update= array(
				'nim' => $post['mahasiswa'],
				'noreg' => $post['dosenpa']
				);
			$this->load->model('Model');
			if ($this->Model->update_data($data_update,'id',$post['id_dosenpa'],'dosenpa')) {
				$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Update Data Berhasil!</h4>
                Data Dosen PA baru berhasil di update.</div>';
			}else{
				$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Update Data Gagal!</h4>
                Data Dosen PA gagal di update.</div>';
			}
			
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Staff/daftar_dosenpa'),'refresh');
		}
		$this->load->view('staff/data_akun/halaman_daftar_dosenpa',[
			'notification' => $this->session->flashdata('notification')
			]);
	}
	// ====================Akhir Daftar DosenPA====================

	// ====================Awal Daftar DosPem====================
	// public function daftar_dospem(){
	// 	$this->load->view('staff/data_akun/halaman_daftar_dospem');
	// }
	// ====================Akhir Daftar Dospem====================

	// ====================Awal Daftar Kaprodi====================
	public function daftar_kaprodi(){
		$this->load->view('staff/data_akun/halaman_daftar_kaprodi',[
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function daftar_skripsi(){
		$this->load->view('staff/data_akun/halaman_daftar_skripsi',[
			'notification' => $this->session->flashdata('notification')
			]);
	}
	// public function daftarkapro(){
	// 	$this->load->helper('site_helper');
	// 	$encrypt_password = bCrypt($_POST['password'],12);//banyak encrypt nya 12
	// 	$data = array(
	// 		'username' => $_POST['username'],
	// 		'name' =>  $_POST['nama'],
	// 		'email' =>  '',
	// 		'password' =>  $encrypt_password,
	// 		'role' =>  'kaprodi',
	// 		'created_at' =>  date('Y-m-d H:i:s'),
	// 		'status' =>  1
	// 		);
	// 	if ($this->Model->create('users',$data)){
	// 		echo "BERHASIL";
	// 	}else{
	// 		echo "GAGAL";
	// 	}
	// }
	// ====================Akhir Daftar Kaprodi====================
///////////////////////////////////Menu Outline//////////////////////////////////////////////////
	public function status_outline(){
		$this->load->view('staff/layout/header', [
			'title' => 'Sistem Informasi Pelaksanaan Skripsi Online | Status Outline'
		]);
		$this->load->view('staff/proposal_outline/halaman_status', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function validated($data=null)
	{	
		$info='Outline Anda <strong>DIVALIDASI</strong>.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Subag LAA',
		'info' =>  $info,
		'link' => 'Mahasiswa/status_outline/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
			'accstaff' => 'Validated',
			'tglaccstaff' => date('Y-m-d H:i:s')
			);
		if ($this->Model->update_data($data_update,'nim',$data,'outline') && $this->Model->create('info',$data_info)) {
			redirect(base_url('staff/status_outline/'));	
		}else{
			echo "GAGAL";
		}
	}

	public function excel_draft_outline()
	{
		$this->load->view('staff/proposal_outline/excel_draft_outline', [
				'daritgl' => $_POST['awal'],
				'sampaitgl' => $_POST['akhir'],
				'prodi' => $_POST['prodi']
			]);
	}

	public function excel_report_outline()
	{
		$this->load->view('staff/proposal_outline/excel_report_outline', [
				'daritgl' => $_POST['awal'],
				'sampaitgl' => $_POST['akhir'],
				'prodi' => $_POST['prodi'],
				'status' => $_POST['status']
			]);
	}
	
	public function report_outline()
	{
		$this->load->view('staff/proposal_outline/halaman_report', [
			'notification' => $this->session->flashdata('notification')
			]);
	}
	

	public function surat_outline()
	{
		$this->load->view('staff/proposal_outline/halaman_surat', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function update_nosurat($id=null)
	{
		$data_update = array(
			'no_surat' => $_POST['no_surat']
			);
		$outline=$this->Model->read_detail('no_surat',$_POST['no_surat'],'outline');
		if ($outline) {
			$notification = '<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Duplicate No. Surat!</h4>
	            Data nomor surat '.$_POST['no_surat'].' sudah tersedia. Mohon input data kembali, jika gagal mohon hubungi administrator.</div>';
		}else{
			if ($this->Model->update_data($data_update,'nim',$id,'outline')) {
				$notification = '<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
	            Data nomor surat '.$id.' berhasil di update.</div>';
			} else {
				$notification = '<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
	            Data nomor surat '.$id.' gagal di update. Mohon input data kembali, jika gagal mohon hubungi administrator.</div>';
			}
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Staff/surat_outline'),'refresh');
	}

	public function cetak_surat($id=null)
	{
		$valid=base64_decode($id);

		if(!empty($valid)){
			$data= array(
				'record' => $this->Model->read_detail('nim',$valid,'outline')
				);

			$this->load->view('staff/proposal_outline/cetak_suratv2',$data, [
			'notification' => $this->session->flashdata('notification')
			]);
		}else
		{
			redirect(base_url('staff/surat_outline'));
		}
	}



	///////////////////////////////////////////////MEnu Log Book///////////////////////////////////////
	public function log_book(){
		$this->load->view('staff/log_book/halaman_list_bimbingan', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function detail_logbook($id=NULL){
		$this->load->view('staff/log_book/halaman_log_book', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function cetak_logbook($id=NULL){
		$this->load->view('dospem/log_book/cetak_logbook');
	}

///////////////////////////////////Menu Jadwal////////////////////////////////////////////////

	public function status_sidang()
	{
		$this->load->view('staff/sidang_skripsi/halaman_status', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function verify_sidang($data=null)
	{	
		$info='Pendaftaran Sidang Skripsi Anda <strong>DIVALIDASI</strong>.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Subag LAA',
		'info' =>  $info,
		'link' => 'Mahasiswa/status_sidang/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
			'accstaff' => 'Validated',
			'tglaccstaff' => date('Y-m-d H:i:s')
			);
		if ($this->Model->update_data($data_update,'nim',$data,'daftar_sidang') && $this->Model->create('info',$data_info)) {
			redirect(base_url('Staff/status_sidang/'));	
		}else{
			echo "GAGAL";
		}
		
	}

	public function excel_data_pendaftaran()
	{
		$this->load->view('staff/sidang_skripsi/excel_data_pendaftaran', [
				'daritgl' => $_POST['awal'],
				'sampaitgl' => $_POST['akhir'],
				'prodi' => $_POST['prodi']
			]);
	}



	public function jadwal()
	{	
		$this->load->view('staff/halaman_jadwal', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function jadwal_sidang()
	{	
		$this->load->view('staff/sidang_skripsi/halaman_jadwal', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function tambah_tanggal()
	{	
		$data = array(
		'tgl_sidang' => date('Y-m-d',strtotime($_POST['tanggal']))
		);
		if ($this->Model->create('tanggal_sidang',$data)) {
			redirect(base_url('Staff/jadwal_sidang/'));	
		}else{
			echo "GAGAL";
		}
	}

	public function update_tanggal($id=null)
	{	
		$data = array(
		'tgl_sidang' => date('Y-m-d',strtotime($_POST['tanggalbaru']))
		);
		if ($this->Model->update_data($data,'id',$id,'tanggal_sidang')) {
			redirect(base_url('Staff/jadwal_sidang/'));	
		}else{
			echo "GAGAL";
		}
	}

	public function hapus_tanggal($id=null)
	{	
		if ($this->Model->delete('tanggal_id',$id,'jadwal_sidang')) {
			if ($this->Model->delete('id',$id,'tanggal_sidang')) {
				redirect(base_url('Staff/jadwal_sidang/'));	
			}else{
				echo "GAGAL";
			}
		}else{
			echo "GAGAL";
		}
	}

	public function excel_daftar_sidang($prodi=null)
	{
		$id=$this->uri->segment(4);
		$this->load->view('staff/sidang_skripsi/excel_jadwal_sidang_staff', [
				'idtanggal' => $id,
				'prodi' => $prodi
			]);
	}

	public function tambah_mahasiswa_jadwal($id=null)
	{	
		$cek=FALSE;
		$notification='';
		$mahasiswas=$this->Model->read_where_dual('tanggal_id',$id,'ruang',$_POST['ruang'],'jadwal_sidang');
		if ($mahasiswas) {
			// kalo ada butuh dicek bentrok
			foreach ($mahasiswas as $mahasiswa) {
				$Abegin = new DateTime($mahasiswa['waktu']);
				$Aend = new DateTime(date("H:i:s", strtotime($mahasiswa['waktu'])+(60*90)));
				$Bbegin = new DateTime($_POST['waktu']);
				$Bend = new DateTime(date("H:i:s", strtotime($_POST['waktu'])+(60*90)));
				if (($Abegin <= $Bend) && ($Aend > $Bbegin)) {
  				$notification = $notification.'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-close"></i> Data Jadwal Gagal Input!</h4>
                Jadwal sidang skripsi sudah diisi oleh <strong>'.$mahasiswa['nim'].'</strong>, mohon input kembali dengan jadwal atau ruang berbeda!.</div>';
  				$cek=FALSE;
  				break;   
  				}else{
  				$cek=TRUE;
  				}      
			}
			# code...
		}else{
			// tidak ada langsung true
			$cek=TRUE;
		}
		$data_daftarsidang=$this->Model->read_detail('nim',$_POST['mahasiswa'],'daftar_sidang');
		$data = array(
			'nim' => $_POST['mahasiswa'],
			'tanggal_id' => $id,
			'waktu' => $_POST['waktu'],
			'ruang' => $_POST['ruang'],
			'penguji1'=>$_POST['penguji1'],
			'penguji2'=>$_POST['penguji2'],
			'pembimbing'=> $data_daftarsidang->dospem,
			'staff_attempt' => date('Y-m-d H:i:s')
		);
		$cektanggal=$this->Model->read_detail('id',$id,'tanggal_sidang');
		$data_judul=array(
			'tgl_sidang'=> $cektanggal->tgl_sidang
			);
		if ($cek==TRUE && $this->Model->create('jadwal_sidang',$data) && $this->Model->update_data($data_judul,'nim',$_POST['mahasiswa'],'judul_skripsi')) {
			redirect(base_url('Staff/jadwal_sidang/'));	
		}else{
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('staff/jadwal_sidang/'),'refresh');
		}
	}

	public function update_jadwal_mhs($id=null)
	{	
		$cek=TRUE;
		$notification='';
		$mahasiswas=$this->Model->read_where_dual('tanggal_id',$_POST['tanggal_sidang'],'ruang',$_POST['ruang'],'jadwal_sidang');
		if ($mahasiswas) {
			// kalo ada butuh dicek bentrok
			foreach ($mahasiswas as $mahasiswa) {
				if ($mahasiswa['nim']!=$id) {
				     	$Abegin = new DateTime($mahasiswa['waktu']);
						$Aend = new DateTime(date("H:i:s", strtotime($mahasiswa['waktu'])+(60*90)));
						$Bbegin = new DateTime($_POST['waktu']);
						$Bend = new DateTime(date("H:i:s", strtotime($_POST['waktu'])+(60*90)));
						if (($Abegin <= $Bend) && ($Aend > $Bbegin)) {
		  				$notification = $notification.'<div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <h4><i class="icon fa fa-close"></i> Data Jadwal Gagal Input!</h4>
		                Jadwal sidang skripsi sudah diisi oleh <strong>'.$mahasiswa['nim'].'</strong>, mohon input kembali dengan jadwal atau ruang berbeda!.</div>';
		  				$cek=FALSE;
		  				break;   
		  				}else{
		  				$cek=TRUE;
		  				} 
				    }    
			}
			# code...
		}else{
			// tidak ada langsung true
			$cek=TRUE;
		}
		$data = array(
		'tanggal_id' => $_POST['tanggal_sidang'],
		'waktu' => $_POST['waktu'],
		'ruang'=>$_POST['ruang'],
		'penguji1'=>$_POST['penguji1'],
		'penguji2'=>$_POST['penguji2'],
		'staff_attempt' => date('Y-m-d H:i:s')
		);
		$cektanggal=$this->Model->read_detail('id',$_POST['tanggal_sidang'],'tanggal_sidang');
		$data_judul=array(
			'tgl_sidang'=> $cektanggal->tgl_sidang
			);
		if ($cek==TRUE && $this->Model->update_data($data,'nim',$id,'jadwal_sidang') && $this->Model->update_data($data_judul,'nim',$id,'judul_skripsi')) {
			redirect(base_url('staff/jadwal_sidang/'));	
		}else{
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('staff/jadwal_sidang/'),'refresh');
		}
	}

	public function hapus_jadwal_mhs($id=null)
	{	
		$cektanggal=$this->Model->read_detail('id',$id,'tanggal_sidang');
		$data_judul=array(
			'tgl_sidang'=> NULL
			);
		if ($this->Model->delete('nim',$id,'jadwal_sidang') && $this->Model->update_data($data_judul,'tgl_sidang',$cektanggal->tgl_sidang,'judul_skripsi')) {
				redirect(base_url('staff/jadwal_sidang/'));	
		}else{
			echo "GAGAL";
		}
	}

	public function penguji_sidang($prodi=null)
	{	
		if ($prodi!='TI' && $prodi!='SI' && $prodi!='SK'
			&& $prodi!='ADB' && $prodi!='MAKSI' && $prodi!='MM'
			&& $prodi!='PPAK' && $prodi!='DA' && $prodi!='DKP'
			&& $prodi!='AK' && $prodi!='M' && $prodi!='ES'	
		) {
			redirect(base_url('staff/'));	
		}
		$this->load->view('staff/sidang_skripsi/halaman_list_penguji', [

				'notification' => $this->session->flashdata('notification'),
				'prodi' => $prodi
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
		$config['file_name'] = $prodi.'-SubagLAA_Jadwal_Sidang_'.time();
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
		'dari' => 'Subag LAA',
		'prodi' => $prodi
		);
		if ($this->Model->create('file_sidang',$data)) {
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('staff/penguji_sidang/'.$prodi),'refresh');	
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
				redirect(base_url('staff/penguji_sidang/'.$prodi));	
		}else{
			echo "GAGAL";
		}
	}

	public function update_penguji($prodi=null)
	{
		$id=$this->uri->segment(4);
		$data = array(
		'penguji1' => $_POST['penguji1'],
		'penguji2' => $_POST['penguji2'],
		);
		if ($this->Model->update_data($data,'nim',$id,'jadwal_sidang')) {
			redirect(base_url('staff/penguji_sidang/'.$prodi));	
		}else{
			echo "GAGAL";
		}
	}



	public function inputjadwal($id=null)
	{	
		$nim=base64_decode($id);

		$this->load->view('Staff/halaman_inputjadwal', [
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
			$this->load->view('Staff/halaman_inputjadwal');
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
			redirect(base_url('Staff'),'refresh');
			
		}	
	}

//////////////////////////////////Surat Berita Acara Sidang/////////////////////////////////////////////
	public function surat_sidang()
	{
		$this->load->view('staff/sidang_skripsi/halaman_berita_acara', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function update_nosurat_sidang($id=null)
	{
		$data_update = array(
			'no_surat' => $_POST['no_surat'],
			'staff_attempt' => date('Y-m-d H:i:s')
			);
		$jadwal=$this->Model->read_detail('no_surat',$_POST['no_surat'],'jadwal_sidang');
		if ($jadwal) {
			$notification = '<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Duplicate No. Surat!</h4>
	            Data nomor surat '.$_POST['no_surat'].' sudah tersedia. Mohon input data kembali, jika gagal mohon hubungi administrator.</div>';
		}else{
			if ($this->Model->update_data($data_update,'nim',$id,'jadwal_sidang')) {
				$notification = '<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
	            Data nomor surat '.$id.' berhasil di update.</div>';
			} else {
				$notification = '<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
	            Data nomor surat '.$id.' gagal di update. Mohon input data kembali, jika gagal mohon hubungi administrator.</div>';
			}
		}
		
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Staff/surat_sidang'),'refresh');
	}

	public function cetak_surat_sidang($id=null)
	{
	
		$valid=base64_decode($id);
		//cek valid base64
		if(preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $valid)){
			
			$data= array(
				'record' => $this->Model->read_detail('nim',$valid,'daftar_sidang')
				);

			$this->load->view('Staff/sidang_skripsi/surat_berita_acara1',$data, [
			'notification' => $this->session->flashdata('notification')
			]);
		}else
		{
			redirect(base_url('Staff/surat_sidang'));
		}
	}

	public function cetak_surat_hasil_sidang($id=null)
	{
	
		$valid=base64_decode($id);
		//cek valid base64
		if(preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $valid)){
			
			$data= array(
				'record' => $this->Model->read_detail('nim',$valid,'daftar_sidang')
				);

			$this->load->view('Staff/sidang_skripsi/surat_berita_acara2',$data, [
			'notification' => $this->session->flashdata('notification')
			]);
		}else
		{
			redirect(base_url('Staff/surat_sidang'));
		}
	}
////////////////////////////////////////////////////////////////////////////////////////////////
	public function surat_keterangan_lulus()
	{
		$this->load->view('staff/sidang_skripsi/halaman_skl', [
			'notification' => $this->session->flashdata('notification')
			]);
	}

	public function update_noskl($id=null)
	{
		$data_update = array(
			'no_skl' => $_POST['no_surat'],
			'staff_attempt' => date('Y-m-d H:i:s')
			);
		$jadwal=$this->Model->read_detail('no_skl',$_POST['no_surat'],'jadwal_sidang');
		if ($jadwal) {
			$notification = '<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Duplicate No. Surat!</h4>
	            Data nomor surat '.$_POST['no_surat'].' sudah tersedia. Mohon input data kembali, jika gagal mohon hubungi administrator.</div>';
		}else{
			if ($this->Model->update_data($data_update,'nim',$id,'jadwal_sidang')) {
				$notification = '<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
	            Data nomor surat '.$id.' berhasil di update.</div>';
			} else {
				$notification = '<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
	            Data nomor surat '.$id.' gagal di update. Mohon input data kembali, jika gagal mohon hubungi administrator.</div>';
			}
		}
		
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Staff/surat_keterangan_lulus'),'refresh');
	}

	public function cetak_surat_keterangan_lulus($id=null)
	{
	
		$valid=base64_decode($id);
		//cek valid base64
		if(preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $valid)){
			
			$data= array(
				'record' => $this->Model->read_detail('nim',$valid,'daftar_sidang')
				);

			$this->load->view('Staff/sidang_skripsi/surat_keterangan_lulus',$data, [
			'notification' => $this->session->flashdata('notification')
			]);
		}else
		{
			redirect(base_url('Staff/surat_sidang'));
		}
	}

////////////////////////////////////////////GANTI JUDUL/////////////////////////////////////
	public function ganti_judul()
	{	
		$this->load->view('staff/ganti_judul/halaman_ganti_judul', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function validasi_ganti_judul($data=null)
	{	
		$id=$this->uri->segment(4);
		$ganti_judul=$this->Model->read_detail('id',$id,'ganti_judul');
		$info='Permohonan Ganti Judul Skripsi Anda <strong>DIVALIDASI</strong>.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Subag LAA',
		'info' =>  $info,
		'link' => 'Mahasiswa/ganti_judul/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
			'accstaff' => 'Validated',
			'tglaccstaff' => date('Y-m-d H:i:s')
			);

		$data_outline=array(
			'topikfix' => $ganti_judul->judul_baru
			);

		$data_judul=array(
			'judul' => $ganti_judul->judul_baru
			);

		if ($this->Model->update_data($data_update,'id',$id,'ganti_judul') && $this->Model->update_data($data_outline,'nim',$data,'outline') && $this->Model->update_data($data_judul,'nim',$data,'judul_skripsi') && $this->Model->create('info',$data_info)) {
			redirect(base_url('Staff/ganti_judul/'));	
		}else{
			echo "GAGAL";
		}
	}

/////////////////////////////////////////////////////////GANTI PEMBIMBING//////////////////////////////////////////
	public function ganti_pembimbing()
	{	
		$this->load->view('staff/ganti_pembimbing/halaman_ganti_pembimbing', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function validasi_ganti_pembimbing($data=null)
	{	
		$id=$this->uri->segment(4);
		$ganti_dospem=$this->Model->read_detail('id',$id,'ganti_dospem');
		$info='Permohonan Ganti Pembimbing Anda <strong>DIVALIDASI</strong>.';
		$data_info = array(
		'username' => $data,
		'dari' => 'Subag LAA',
		'info' =>  $info,
		'link' => 'Mahasiswa/ganti_pembimbing/',
		'tanggal' => date('Y-m-d H:i:s')
		);

		$data_update = array(
			'accstaff' => 'Validated',
			'tglaccstaff' => date('Y-m-d H:i:s')
			);

		$data_outline=array(
			'dospemfix' => $ganti_dospem->pembimbing_baru
			);

		$data_dospem=array(
			'noreg' => $ganti_dospem->pembimbing_baru
			);

		$data_judul=array(
			'pembimbing' => $ganti_dospem->pembimbing_baru
			);

		if ($this->Model->update_data($data_update,'id',$id,'ganti_dospem') && $this->Model->update_data($data_outline,'nim',$data,'outline') && $this->Model->update_data($data_judul,'nim',$data,'judul_skripsi') && $this->Model->create('info',$data_info) && $this->Model->update_data($data_dospem,'nim',$data,'dospem')) {
			redirect(base_url('Staff/ganti_pembimbing/'));	
		}else{
			echo "GAGAL";
		}
		
	}
/////////////////////////////////////////////////////////GANTI PEMBIMBING//////////////////////////////////////////
	public function help_desk()
	{	
		$this->load->view('staff/help_desk/halaman_help_desk', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}

	public function respon_help_desk($data=null)
	{	
		$data_update = array(
			'respon' => $_POST['respon'],
			'tgl_respon' => date('Y-m-d H:i:s')
			);
		if ($this->Model->update_data($data_update,'id',$data,'help_desk')) {
			redirect(base_url('staff/help_desk/'));	
		}else{
			echo "GAGAL";
		}
		
	}

//////////////////////////////////////////PENGUMUMAN///////////////////////////////////////////////////////////////
	public function pengumuman()
	{	
		$this->load->helper('form');
		$this->load->view('staff/pengumuman/halaman_pengumuman', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}


	public function proses_pengumuman()
	{	
		$notification='';
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('isi','Isi Pengumuman','required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi!');

		$this->form_validation->set_error_delimiters('<p class="text-red"><code><strong>','</strong></code></p>');

		if ($this->form_validation->run()==FALSE) {
			$notification = $notification.'<div class="alert alert-danger alert-dismissible">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <h4><i class="icon fa fa-warning"></i> Pengumuman Gagal Dipublikasi!</h4>
		    Mohon mengisi kembali.</div>';
			$this->session->set_flashdata('notification', $notification);
			$this->load->view('staff/pengumuman/halaman_pengumuman', [
				'notification' => $this->session->flashdata('notification')
			]);		
		}else{	
			$attachment='';
			$image='';
			$tampil=NULL;
			$cek=TRUE;
				$config=array();
				$config['upload_path']          = './uploads/pengumuman/';
		    	$config['max_size']             = '0'; //2MB, 1024kilobytes = 1MB
		    	$config['allowed_types']        = '*';
				$config['max_width']  = '0';
				$config['max_height']  = '0';
				
			if (!empty($_FILES['attachment']['tmp_name'])) {
				//load uploading file library
				if (isset($_POST['tampilkan'])) {
					$tampil=$_POST['tampilkan'];
				}else{
					$tampil=NULL;
				}
				
				//cek config
				$config['file_name'] = date('d-M-Y').$_POST['judul'].time();
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				//cek bisa upload
				if (!$this->upload->do_upload('attachment')) {
		           $notification = $notification.'<div class="alert alert-danger alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <h4><i class="icon fa fa-warning "></i> Upload File Gagal!</h4>
		        Mohon upload file kembali!</div>';
		        	$cek=FALSE;
				}else{
					$gambar = $this->upload->data();
		        	$attachment = $gambar['file_name'];
				}
			}

			if (!empty($_FILES['gambar']['tmp_name'])) {
				//cek config
				$config['file_name'] = date('d-M-Y').'gambar-'.$_POST['judul'].time();
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				//cek bisa upload
				if (!$this->upload->do_upload('gambar')) {
		           $notification = $notification.'<div class="alert alert-danger alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <h4><i class="icon fa fa-warning "></i> Upload File Gagal!</h4>
		        Mohon upload file kembali!</div>';
		        	$cek=FALSE;
				}else{
					$gambarpengum = $this->upload->data();
		        	$image = $gambarpengum['file_name'];
				}
			}

			$data = array(
				'judul' => strtoupper($_POST['judul']),
				'nosurat' => strtoupper($_POST['nosurat']),
				'attachment' => $attachment,
				'tampil' => $tampil,
				'gambar' => $image,
				'isi' => $_POST['isi'],
				'tgl_post' => date('Y-m-d H:i:s')
				);
			if ($cek==TRUE && $this->Model->create('pengumuman',$data)) {
				$notification = $notification.'<div class="alert alert-success alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <h4><i class="icon fa fa-check"></i> Pengumuman Berhasil Dipublikasi!</h4>
		        </div>';
			}else{
				$notification = $notification.'<div class="alert alert-danger alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <h4><i class="icon fa fa-warning"></i> Pengumuman Gagal Dipublikasi!</h4>
		        Mohon mengisi kembali.</div>';
			}
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('staff/pengumuman/'),'refresh');
		}
	}

	public function hapus_pengumuman($id=null)
	{	
		$pengumuman=$this->Model->read_detail('id',$id,'pengumuman');
		
		if ($this->Model->delete('id',$id,'pengumuman')) {
			if ($pengumuman->gambar) {
			unlink("uploads/pengumuman/".$pengumuman->gambar);
			}
			if ($pengumuman->attachment) {
				unlink("uploads/pengumuman/".$pengumuman->attachment);
			}
			$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Delete Data Berhasil!</h4>
                Data pengumuman berhasil di delete.</div>';
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Delete Data Gagal!</h4>
                Data akun gagal di delete.</div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Staff/pengumuman'),'refresh');	
	}

/////////////////////////////////////////////GANTI PASSWORD////////////////////////////////
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
			$this->load->view('staff/layout/header', [
				'title' => 'Sistem Informasi Pelaksanaan Skripsi Online | Ganti Password'
			]);
			$this->load->view('staff/halaman_gantipass');

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
			redirect(base_url('Staff'),'refresh');
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
	

	// TEST CETAK SI=======================================================
	public function excelsi()
	{
		$this->load->view('staff/halaman_cetakexcelsi');
	}
	public function pdfsi()
	{
		$this->load->view('staff/halaman_cetakpdfsi');
	}
	// TEST CETAK TI=======================================================
	public function excelti()
	{
		$this->load->view('staff/halaman_cetakexcelti');
	}
	public function pdfti()
	{
		$this->load->view('staff/halaman_cetakpdfti');
	}
	// TEST CETAK SK=======================================================
	public function excelsk()
	{
		$this->load->view('staff/halaman_cetakexcelsk');
	}
	public function pdfsk()
	{
		$this->load->view('staff/halaman_cetakpdfsk');
	}

	// TEST TAMPILIN GAMBAR=======================================================
	public function gambar($id)
	{
		$this->load->model('Model');

		$data = $this->Model->read_detail('nim',$id,'daftar_sidang');
		header('Content-type : image');
		// echo 'PNG ='.$data->slipdut;
		 echo $data->slipus;
		// echo 'JPG ='.$data->slipus;
		// echo 'PNG ='.$data->slipps;
	}
}
