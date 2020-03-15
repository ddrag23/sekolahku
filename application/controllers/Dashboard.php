<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cekNotLogin();

	}
	public function index()
	{
		
		$this->load->view('template/main',[
			"src" => "module/dashboard/dashboard",
			"page" => "Dashboard"
		]);
	}
}
