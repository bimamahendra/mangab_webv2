<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mgenerate');
		$this->load->library('ciqrcode');
		$this->load->helper('string');
	}

	public function absenlist(){
		$nip = $this->session->userdata('nip');
		$param['main_content'] = 'generate/moveqr';
		$param['matkul_list'] = $this->Mgenerate->getAllMatkulByNIP($nip);
		$this->load->view('dashboard', $param);
	}

	public function generate($id){
		$sixdigit = $this->sixdigit();
		$matkul = $id;
		$topik = $this->input->post('topik');
		echo $topik;

		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');
		
		$config['cacheable']    	= true; //boolean, the default is true
    $config['cachedir']     = './assets/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/images/qr/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);
 
    $image_name=$sixdigit.'.png'; //buat name dari qr code sesuai dengan nim
 
    $params['data'] 		= $sixdigit; //data yang akan di jadikan QR CODE
    $params['level'] 		= 'H'; //H=High
    $params['size'] 		= 10;
    $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 
    // $input = $this->Mgenerate->saveqr($sixdigit,$matkul,$topik,$now); //simpan ke database
    // if($input){
    // 	echo "Inserted";
    // }else{
    // 	echo "Failed";
    // }
    // redirect('Generate/showqr/'.$sixdigit); 
	}

	public function sixdigit(){
		$randomdigit = random_string('alnum',6);

		// echo $randomdigit;
		$cek = $this->Mgenerate->cekrand($randomdigit);
		if( $cek > 0){
			$this->sixdigit();
		}else{
			return $randomdigit;
		}
	}

	public function showqr($sixdigit){
		$param['main_content'] = 'generate/showqr';
		$param['matkul_list'] = $this->Mgenerate->getAllMatkulByNIP($nip);
		$this->load->view('dashboard', $param);
	}

}