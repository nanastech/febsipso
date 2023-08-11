<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');

	}
	protected $username_temp;

		public function login(){
		$this->load->library('form_validation');
		
		$input = $this->input->post(NULL,TRUE);//css filter
		$this->username_temp = @$input['username'];

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_password_check');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><span class="bi bi-info-circle" aria-hidden="true"></span> ','</div>');

		if($this->form_validation->run() == FALSE){
			if (!empty($this->session->userdata('role'))) {
				switch ($this->session->userdata('role'))
	         	{
	            case "superadmin"://sadmin
	              	redirect(base_url('Superadmin/'));
	              	break;
	            case "mahasiswa"://Mahasiswa
	           
	              	redirect(base_url('Mahasiswa/'));
	              	break;
	            case "dosen"://Mahasiswa
	           
	              	redirect(base_url('dospem/'));
	              	break;
	            case "kaprodi"://Mahasiswa
	           
	              	redirect(base_url('kaprodi/'));
	              	break;
	            case "staff"://Mahasiswa
	           
	              	redirect(base_url('Staff/'));
	              	break;
	              	
	            default:
	              break;
				}
			}
          	$this->load->view('pages/layout/header_login',[
			'notification' => $this->session->flashdata('notification'),
			'title' => 'Sistem Informasi Pelaksanaan Skripsi Online | Log In'
			]);
			$this->load->view('pages/login',[
			'notification' => $this->session->flashdata('notification')
			]);
          	$this->load->view('pages/layout/footer_login',[
			'notification' => $this->session->flashdata('notification')
			]);
		}
		else{
			$user_detail = $this->Model->read_detail('username',$this->username_temp,'users');
			$this->load->library('session');
			$login_data = array(
					'username' => $input['username'],
					'name' => $user_detail->name,
					'role' => $user_detail->role,
					'status'=> $user_detail->status,
					'prodi' => $user_detail->prodi,
					'login_status' => TRUE
				);

			$this->session->set_userdata($login_data);
		
			switch ($user_detail->role)
         	{
            case "superadmin"://sadmin
              	redirect(base_url('Superadmin/'));
              	break;
            case "mahasiswa"://Mahasiswa
           
              	redirect(base_url('Mahasiswa/'));
              	break;
            case "dosen"://Mahasiswa
           
              	redirect(base_url('dospem/'));
              	break;
            case "kaprodi"://Mahasiswa
           
              	redirect(base_url('kaprodi/'));
              	break;
            case "staff"://Mahasiswa
           
              	redirect(base_url('Staff/'));
              	break;
                
            default:
              break;
			}
			
		}
		
	}

	public function password_check($str){
		$this->load->model('Model');
		$user_detail = $this->Model->read_detail('username',$this->username_temp,'users');//$str itu password yang diketikan dari post
		if (!empty($user_detail)) {
			if($user_detail->password == crypt($str,$user_detail->password)){
				if ($user_detail->status=='1') {
					return TRUE;
				}else{
					$this->form_validation->set_message('password_check','Maaf, akun anda telah di-suspend. Mohon konfirmasi ke Admin');
					return FALSE;
				}
			}else{
				$this->form_validation->set_message('password_check','Maaf, username dan password tidak valid');
				return FALSE;
			}
		}else{
			$this->form_validation->set_message('password_check','Maaf, username dan password tidak ditemukan. Mohon konfirmasi ke Admin');
				return FALSE;
		}
		
	}
  
	public function logout(){
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect(base_url('Auth/login'));
	}

}
