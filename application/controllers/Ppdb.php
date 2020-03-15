<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cekNotLogin();
		$this->load->model('m_ppdb');
		$this->load->model('m_master');
		$this->load->model('m_user');
	}
	public function index()
	{
		if ($this->session->userdata('level') == 'admin' || $this->session->userdata('guru') == 'guru') {
		$this->load->view('template/main',[
			"src" => "module/ppdb/index",
			"page" => "PPDB",
			"query" => $this->m_ppdb->get()->result()
		]);
		}elseif ($this->session->userdata('level') == 'siswa') {
			$this->load->view('template/main',[
			"src" => "module/ppdb/homepage",
			"page" => "PPDB",
			"query" => $this->m_ppdb->get()->result()
		]);
		}
		
	}
	public function add(){
		$this->form_validation->set_rules('nis', 'nis', 'required|min_length[5]|is_unique[siswa.nis]');
    	$this->form_validation->set_rules('nama', 'Nama', 'required');
    	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
    	$this->form_validation->set_rules('nomor', 'Nomor Telepon', 'required');
    	$this->form_validation->set_rules('kelas', 'Kelas', 'required');
    	$this->form_validation->set_rules('gender', 'Gender', 'required');
    	// message validation
        $this->form_validation->set_message('numeric', '%s harus menggunakan angka');
    	$this->form_validation->set_message('required', '%s field tidak boleh kosong');
    	$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
    	$this->form_validation->set_message('is_unique', '{field} sudah terpakai');
    	$this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');
    	 if ($this->form_validation->run() == FALSE)
                {
			    	$this->load->view('template/main', [
			    		'src' => 'module/ppdb/addppdb',
			    		'page' => 'tambah peserta didik baru',
			    		"join" => $this->m_master->getKelas()->result(),
			    		"user" => $this->m_user->get()->result()
			    	]);
                }
                else
                {
                	$post = $this->input->post(null, TRUE);
                	$this->m_ppdb->add($post);
                	if ($this->db->affected_rows() > 0) {
                		$this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
                	}
                	$this->session->set_flashdata('gagal', 'data gagal ditambkan');
                	redirect('ppdb/add','refresh');
                }
	}
	public function edit($id_siswa)
    {
    	$this->form_validation->set_rules('nama', 'Nama', 'required');
    	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
    	$this->form_validation->set_rules('nis', 'Nis', 'required|min_length[1]|numeric');
    	$this->form_validation->set_rules('nomor', 'Nomor Telepon', 'required|numeric');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        // set message opsi validation
    	$this->form_validation->set_message('required', '%s field tidak boleh kosong');
        $this->form_validation->set_message('numeric', '%s harus menggunakan angka');
    	$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
    	$this->form_validation->set_message('is_unique', '{field} sudah terpakai');
    	$this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');

    	 if ($this->form_validation->run() == FALSE)
                {
                    $query = $this->m_ppdb->get($id_siswa);
                    if ($query->num_rows() > 0) {
							$this->load->view('template/main', [
                        	"src" => "module/ppdb/editppdb",
                        	"page" => "Edit Siswa",
                        	"query" => $query->row()
                        ]);    
                    }else{
                        show_404();
                    }
			    	
                }
                else
                {
                	$post = $this->input->post(null, TRUE);
                	$this->m_siswa->edit($post);
                    // echo json_encode($this->m_siswa->edit($post));
                    // die();
                	if ($this->db->affected_rows() > 0) {
                		$this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
                	}
                	$this->session->set_flashdata('gagal', 'data gagal ditambkan');
                	redirect('siswa/edit/'.$id_siswa,'refresh');
                }
    }

    public function regisPpdb()
    {
    	$this->form_validation->set_rules('nama', 'Nama', 'required');
    	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
    	$this->form_validation->set_rules('nis', 'Nis', 'required|min_length[1]|numeric');
    	$this->form_validation->set_rules('nomor', 'Nomor Telepon', 'required|numeric');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        // set message opsi validation
    	$this->form_validation->set_message('required', '%s field tidak boleh kosong');
        $this->form_validation->set_message('numeric', '%s harus menggunakan angka');
    	$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
    	$this->form_validation->set_message('is_unique', '{field} sudah terpakai');
    	$this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');
    	if ($this->form_validation->run() == FALSE) {
    		$this->load->view('template/main', [
			    		'src' => 'module/ppdb/addppdb',
			    		'page' => 'tambah peserta didik baru',
			    		"join" => $this->m_master->getKelas()->result()
			    	]);
    	} else {
    				$post = $this->input->post(null, TRUE);
                	$this->m_siswa->add($post);
                	if ($this->db->affected_rows() > 0) {
                		$this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
                	}
                	$this->session->set_flashdata('gagal', 'data gagal ditambkan');
                	redirect('siswa/add','refresh');
    	}
    }
}
