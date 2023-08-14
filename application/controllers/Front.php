<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {	
    //   //$this->load->view('layout/header');
    //   //$this->load->view('pages/index'); 
	// 	// $this->load->view('halaman_home', [
	// 	// 		'notification' => $this->session->flashdata('notification')
	// 	// 	]);
    //   //$this->load->view('layout/bot'); 
    //   //$this->load->view('layout/footer');
	// }
    public function index()
	{
		$this->load->view('pages/layout/header',[
			'title' => 'Sistem Informasi Pelaksanaan Skripsi Online | Dashboard'
		]);
		$this->load->view('pages/index',[
			'notification' => $this->session->flashdata('notification')
			]);
        $this->load->view('pages/layout/footer');		
	}
    
	public function daftar_mahasiswa()
	{
		$this->load->view('halaman_daftar_mahasiswa', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}
	public function jadwal_sidang_skripsi()
	{
		$this->load->view('halaman_jadwal_ujian_skripsi', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}
	public function tentang_kami()
	{
		$this->load->view('halaman_tentang_kami', [
				'notification' => $this->session->flashdata('notification')
			]);		
	}
}
