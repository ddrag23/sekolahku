<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['m_gelombang', 'm_pengumuman','m_siswa']);
		$this->load->library('pagination');
    cekAlreadyLogin();
	}
	public function index()
	{
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
	public function alumni()
	{
		 // search {{
    $keyword = $this->input->get('keyword');
      // }}
    $jumlah = $this->m_siswa->getAlumni()->num_rows();
    $config['base_url'] = base_url().'welcome/dataSiswa';
    $config['total_rows'] = $jumlah;
    $config['per_page'] = 10;

    // Membuat Style pagination untuk BootStrap v4
  	$config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';
    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $query = empty($keyword) ? $this->db->get_where('siswa', ['status' => 'alumni'], $config['per_page'], $from)->result() : $this->m_siswa->searchAlumni($keyword); 
		$pengumuman = $this->m_pengumuman->get()->result();
		// echo json_encode($this->m_siswa->searchAlumni($keyword));die();
		foreach ($pengumuman as $key ) {
			if($key->status_pengumuman == 'publis'){
				$pdf = $key->file_pengumuman;
			}
		}
		$this->load->view('module/landingPage/alumni',[
			'query' => $query,
			'pengumuman' => $pdf
		]);
	}
	public function dataSiswa()
  {
      // search {{
    $keyword = $this->input->get('keyword');
      // }}
    $jumlah = $this->m_siswa->getAktif()->num_rows();
    $config['base_url'] = base_url().'welcome/dataSiswa';
    $config['total_rows'] = $jumlah;
    $config['per_page'] = 10;

    // Membuat Style pagination untuk BootStrap v4
  	$config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';
    $from = $this->uri->segment(3);
    $this->pagination->initialize($config);
    $query = empty($keyword) ? $this->db->where('status','aktif')->get('siswa', $config['per_page'], $from)->result() : $this->m_siswa->searchAktif($keyword); 
    
    /* echo json_encode($query);die(); */
		$pengumuman = $this->m_pengumuman->get()->result();
		foreach ($pengumuman as $key ) {
			if($key->status_pengumuman == 'publis'){
				$pdf = $key->file_pengumuman;
			}
		}
		$this->load->view('module/landingPage/data_siswa', [
			'query' => $query,
			'pengumuman' => $pdf,
		]);
	}


}
