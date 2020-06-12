<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cekNotLogin();
    $this->load->model(['m_siswa','m_nilai','m_user','m_ppdb','m_master']);
	}
	public function index()
	{
		$this->load->view('module/dashboard/dashboard',[
      "page" => "Dashboard",
      "siswa" => $this->m_siswa->get()->num_rows(),
      "lulus" => $this->m_nilai->getLulus()->num_rows(),
      "tidakLulus" => $this->m_nilai->getTidakLulus()->num_rows(),
      "ppdb" => $this->m_ppdb->get()->num_rows(),
      "akun" => $this->m_user->get()->num_rows(),
      "admin" => $this->m_user->getAdmin()->num_rows(),
      "panitia" => $this->m_user->getPanitia()->num_rows(),
      "user" => $this->m_user->getUser()->num_rows(),
      "guru" => $this->m_master->getGuru()->num_rows()
		]);
  }
  
}
