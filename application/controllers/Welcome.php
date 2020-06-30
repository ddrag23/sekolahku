<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model(['m_gelombang', 'm_pengumuman']);
		$query = $this->m_pengumuman->get()->result();
		foreach ($query as $key ) {
			if($key->status_pengumuman == 'publis'){
				$pdf = $key->file_pengumuman;
			}
		}
		
		$this->load->view('module/landingPage/landing',[
			'query' => !empty($pdf) ? $pdf : '#',
			'gelombang' => $this->m_gelombang->get()->result()

		]);
	}

}
