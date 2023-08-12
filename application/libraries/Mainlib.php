<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainlib{
	public function logged_sadmin(){
		$_this =& get_instance();
		$_this->load->helper('url');
		if($_this->session->userdata('login_status') != TRUE){
			redirect(base_url('Auth/login'));
		}else{
			if($_this->session->userdata('role') !='superadmin'){
			redirect(base_url('Auth/login'));
			}else{
				if($_this->session->userdata('status') != 1){
				redirect(base_url('Auth/login'));
				}
			}
		}
		
	}

	public function logged_mahasiswa(){
		$_this =& get_instance();
		$_this->load->helper('url');
		if($_this->session->userdata('login_status') != TRUE){
			redirect(base_url('Auth/login'));
		}else{
			if($_this->session->userdata('role') !='mahasiswa'){
			redirect(base_url('Auth/login'));
			}else{
				if($_this->session->userdata('status') != 1){
				redirect(base_url('Auth/login'));
				}
			}
		}
	}

	public function logged_dospem(){
		$_this =& get_instance();
		$_this->load->helper('url');
		if($_this->session->userdata('login_status') != TRUE){
			redirect(base_url('Auth/login'));
		}else{
			if($_this->session->userdata('role') !='dosen'){
			redirect(base_url('Auth/login'));
			}else{
				if($_this->session->userdata('status') != 1){
				redirect(base_url('Auth/login'));
				}
			}
		}
	}

	public function logged_staff(){
		$_this =& get_instance();
		$_this->load->helper('url');
		if($_this->session->userdata('login_status') != TRUE){
			redirect(base_url('Auth/login'));
		}else{
			if($_this->session->userdata('role')  !='staff'){
			redirect(base_url('Auth/login'));
			}else{
				if($_this->session->userdata('status') != 1){
				redirect(base_url('Auth/login'));
				}
			}
		}
		
	}

	public function logged_kaprodi(){
		$_this =& get_instance();
		$_this->load->helper('url');
		if($_this->session->userdata('login_status') != TRUE){
			redirect(base_url('Auth/login'));
		}else{
			if($_this->session->userdata('role')  !='kaprodi'){
			redirect(base_url('Auth/login'));
			}else{
				if($_this->session->userdata('status') != 1){
				redirect(base_url('Auth/login'));
				}
			}
		}
		
	}

	// public function logged_mahasiswa(){
	// 	$_this =& get_instance();
	// 	$_this->load->helper('url');
	// 	if($_this->session->userdata('login_status') != TRUE){
	// 		redirect(base_url('user/login'));
	// 	}else{
	// 		if($_this->session->userdata('role') != 3){
	// 		redirect(base_url('user/login'));
	// 		}else{
	// 			if($_this->session->userdata('status') != 1){
	// 			redirect(base_url('user/login'));
	// 			}
	// 		}
	// 	}
		
	// }
}