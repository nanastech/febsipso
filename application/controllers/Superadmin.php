<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {
	protected $username_temp;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->library('mainlib');
		$this->mainlib->logged_sadmin();
	}
	
	public function index()
	{
		$this->load->view('sadmin/halaman_sadmin',[
			'notification' => $this->session->flashdata('notification')
		]);
	}

	public function judul_skripsi(){
		$outlines=$this->Model->read('outline');
		if ($outlines) {
			foreach ($outlines as $outline) {
				if (!empty($outline['topikfix'])) {
					$data_judul=array(
					'nim'=> $outline['nim'],
					'nama'=> ucwords($outline['nama']),
					'judul'=>$outline['topikfix'],
					'status'=>'proses',
					'pembimbing'=>$outline['dospemfix'],
					'tgl_outline'=>$outline['tgl_daftar']
					);
					if ($this->Model->create('judul_skripsi',$data_judul)) {
					$notification = '<div class="alert alert-success alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                <h4><i class="icon fa fa-check"></i>Berhasil!</h4>
			               </div>';
					}else{
						$notification = '<div class="alert alert-danger alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                <h4><i class="icon fa fa-check"></i>Gagal!</h4>
			              </div>';
					}
				}
			}
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Superadmin'),'refresh');
	}

	public function aktif_mhs(){
		$data=array(
			'status' => '1'
			);
		if ($this->Model->update_data($data,'role','mahasiswa','users')) {
		$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Berhasil!</h4>
               </div>';
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Gagal!</h4>
              </div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Superadmin'),'refresh');
	}


	public function non_aktif_mhs(){
		$data=array(
			'status' => '0'
			);
		if ($this->Model->update_data($data,'role','mahasiswa','users')) {
		$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Berhasil!</h4>
               </div>';
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Gagal!</h4>
              </div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Superadmin'),'refresh');
	}


#### awal MENU BUAT AKUN ####
	public function daftar_akun1($id=NULL)
	{
		$this->load->helper(array('url'));
		$this->load->helper('form');
		$this->load->model('Model');
		$uri3 = $this->uri->segment(3);
		$uri4 = $this->uri->segment(4);
		if ($uri3=="edit") {
		$data = array(
			'akun' => $this->Model->get_user_detail('username',$uri4,'users'));
		$this->load->view('sadmin/halaman_edit_akun',$data);
		}elseif ($uri3=="hapus") {
			$this->Sadmin_model->delete('username',$uri4,'users');
			$this->load->view('sadmin/halaman_akun');
		}else{
			$this->load->view('sadmin/halaman_akun');
		}
		
		
	}

	// ====================Awal Daftar Akun====================
	public function daftar_akun(){
		$this->load->view('sadmin/halaman_daftar_akun',[
			'notification' => $this->session->flashdata('notification')
			]);
	}
	

	public function create_akun()
	{	
		$notification='';

		$this->load->library('form_validation');

		$post = $this->input->post();
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('prodi','Program Studi','required');
		$this->form_validation->set_rules('role','Role','required');
		$this->form_validation->set_rules('status','Status Akun','required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi!');
		$this->form_validation->set_error_delimiters('<p class="text-red"><code><strong>','</strong></code></p>');

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('Sadmin/halaman_daftar_akun');
		}else{
			$this->load->model('Model');
			$this->load->helper('site_helper');
			$encrypt_password = bCrypt($post['password'],12);//banyak encrypt nya 12
			if ($post['role']=='kaprodi') {
				$username=$post['prodi'].$post['username'];
			}else{
				$username=$post['username'];
			}
			
			$data1 = array(
				'username' => $username,
				'password' => $encrypt_password,
				'name' => $post['nama'],
				'role' => $post['role'],
				'prodi' => $post['prodi'],
				'created_at' => date('Y-m-d H:i:s'),
				'status' => $post['status']
				);
			if ($post['role']=='mahasiswa') {
				$data2 = array(
				'nim' => $post['username'],
				'nama' => $post['nama'],
				'jurusan' => $post['prodi']
				);
				$this->Model->create('mahasiswa',$data2);
			}elseif ($post['role']=='dosen') {
				$data2 = array(
				'noreg' => $post['username'],
				'nama' => $post['nama'],
				'prodi' => $post['prodi']
				);
				$this->Model->create('dosen',$data2);
			}elseif ($post['role']=='kaprodi') {
				$data2 = array(
				'noreg' => $post['username'],
				'prodi' => $post['prodi']
				);
				$this->Model->create('kaprodi',$data2);			}

			if ($this->Model->create('users',$data1)) {
				$notification = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Berhasil!</h4>
                Data akun baru berhasil di input.</div>';
			}else{
				$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Input Data Gagal!</h4>
                Data akun gagal di input.</div>';
			}
			
			$this->session->set_flashdata('notification', $notification);
			redirect(base_url('Superadmin/daftar_akun'),'refresh');
		}
	}
	public function update_akun($id=NULL)
	{
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
			$data_update2['noreg']=$post['username'];
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
					$notification = '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Update Data Berhasil!</h4>
	                Data akun berhasil di update.</div>';
				}else{
					$notification = '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Update Data Gagal!</h4>
	                Data akun gagal di update.</div>';
				}
			}elseif ($post['role']=='mahasiswa') {
				$data_update2['jurusan']=$post['prodi'];
				if ($this->Model->update_data($data_update2,'nim',$id,'mahasiswa')) {
					$notification = '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Update Data Berhasil!</h4>
	                Data akun berhasil di update.</div>';
				}
			}else{
					$notification = '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-check"></i> Update Data Berhasil!</h4>
	                Data akun berhasil di update.</div>';
				}
		}else{
			$notification = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Update Data Gagal!</h4>
                Data akun gagal di update.</div>';
		}
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Superadmin/daftar_akun'),'refresh');
		
	}

	public function delete_akun($id=NULL){
		$this->load->model('Model');
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
		$this->session->set_flashdata('notification', $notification);
		redirect(base_url('Superadmin/daftar_akun'),'refresh');
	}
	// ====================Akhir Daftar Akun====================

	
#### akhir MENU BUAT AKUN ####

	
	// ====================Awal Daftar Mahasiswa====================
	public function daftar_mhs(){
		$this->load->view('sadmin/halaman_daftar_mhs');
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
	// 		redirect(base_url('Superadmin'),'refresh');
	// }

	
	// ====================Akhir Daftar Mahasiswa====================

	// ====================Awal Daftar Dosen====================
	public function daftar_dosen(){
		$this->load->view('sadmin/halaman_daftar_dosen');
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
			redirect(base_url('Superadmin/daftar_dosenpa'),'refresh');
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
			redirect(base_url('Superadmin/daftar_dosenpa'),'refresh');
		}
		$this->load->view('sadmin/halaman_daftar_dosenpa',[
			'notification' => $this->session->flashdata('notification')
			]);
	}
	// ====================Akhir Daftar DosenPA====================

	// ====================Awal Daftar DosPem====================
	// public function daftar_dospem(){
	// 	$this->load->view('sadmin/halaman_daftar_dospem');
	// }
	// ====================Akhir Daftar Dospem====================

	// ====================Awal Daftar Kaprodi====================
	public function daftar_kaprodi(){
		$this->load->view('sadmin/halaman_daftar_kaprodi',[
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
			$this->load->view('sadmin/halaman_gantipass');

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
			redirect(base_url('Superadmin'),'refresh');
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
	
}
