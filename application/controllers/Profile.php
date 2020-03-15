<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Profile extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		cekNotLogin();
	}
	public function index()
	{
		$this->load->view('template/main', [
		"src" => "module/profile/index",
		"page" => "Profile"
		]);
	}
}