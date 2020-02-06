<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mabsen');
		$this->load->model('Mgenerate');
	}

	public function index()
	{
		if ($this->session->userdata('isLogin')){
			$param['main_content'] = 'stats';
			$param['page_title'] = 'Dashboard';
			$param['dataout'] = $this->Mabsen->stat();
			$this->load->view('dashboard',$param);
		} else if ($this->session->userdata('isDosen')){
			$nip = $this->session->userdata('nip');
			$param['main_content'] = 'generate/stats';
			$param['page_title'] = 'Selamat Mengajar,';
			$param['dataout'] = $this->Mgenerate->stats($nip);
			$this->load->view('dashboard',$param);
		}else {
			$this->load->view('login');
		}
	}
}
