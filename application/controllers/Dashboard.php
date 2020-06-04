<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cekNotLogin();
    $this->load->model('m_siswa');
    $this->load->model('m_user');
    $this->load->model('m_master');

	}
	public function index()
	{
		
		$this->load->view('template/main',[
			"src" => "module/dashboard/dashboard",
			"page" => "Dashboard"
		]);
  }
  public function printpdf($id) 
  {
          $data['row'] = $this->m_siswa->get($id)->row();
          $html = $this->load->view('module/dokumen/formreg',$data,true);
          $this->fungsi->pdfPrint($html,'coba',array(0,0,609.4488,935.433),'potrait');
  }
  
}
