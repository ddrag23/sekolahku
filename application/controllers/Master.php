<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cekNotLogin();
		cekAdmin();
		$this->load->model('m_master');

	}
	public function index()
	{
		$this->load->view('template/main', [
			"src" => "module/master/listkelas",
			"page" => "Data Kelas",
			"query" => $this->m_master->getKelas()->result()
		]);
	}
	public function guru()
	{
		$this->load->view('template/main',[
			"src" => "module/guru/listguru",
			"page" => "Data guru",
			"query" => $this->m_master->getGuru()->result()
		]);
	}
	public function addKelas()
	{
		$params = new StdClass();
		$params->nama_kelas = null;
		$params->guru_id = null;
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'trim|required');
		$this->form_validation->set_rules('guru_id', 'Nama Guru', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/main', [
				"src" => "module/master/formkelas",
				"page" => "Tambah Kelas",
				"submit" => "save",
				"query" => $params,
				"guru" => $this->m_master->getGuru()->result()
			]);
		} else {
			$this->proses();
		}
	}
	public function edit($id_kelas)
	{
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'trim|required');
		$this->form_validation->set_rules('guru_id', 'Nama Guru', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$query = $this->m_master->getKelas($id_kelas);
			if ($query->num_rows() > 0) {
				$this->load->view('template/main', [
					"src" => "module/master/formkelas",
					"page" => ucfirst("edit data kelas"),
					"query" => $query->row(),
					"submit" => "edit",
					"guru" => $this->m_master->getGuru()->result()
				]);
			}			
			} else {
				$this->proses();
			}
	
	}
	public function delete($id_kelas)
	{
		$this->m_master->del($id_kelas);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect('master','refresh');
	}
	// end fungsi kelas
	// start fungsi guru
	public function addGuru()
	{
		$params = new StdClass();
		$params->nip = null;
		$params->alamat_guru = null;
		$params->nama_guru = null;
		$params->no_hp = null;
		$params->gender = null;
		$this->validasi();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/main', [
				"src" => "module/guru/formguru",
				"page" => ucfirst("tambah data guru"),
				"btn" => "saveguru",
				"query" => $params
			]);
		} else {
			$this->proses();
		}
	}
	public function editGuru($id_guru)
	{
		$query = $this->m_master->getGuru($id_guru);
	}


	public function proses()
	{
		$post = $this->input->post(null, true);
		if (isset($_POST['save'])) {
			$this->m_master->save($post);
		}elseif (isset($post['edit'])) {
			$this->m_master->edit($post);
		}elseif (isset($post['saveguru'])) {
			$this->m_master->addGuru($post);
		}elseif (isset($post['editguru'])) {
			$this->m_master->editGuru($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'data berhasil disimpan');
		}
		redirect('master','refresh');
	}
	private function validasi()
	{
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
			$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'trim|required');
			$this->form_validation->set_rules('alamat_guru', 'Alamat Guru', 'trim|required');
			$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('no_hp', 'No Telepon', 'trim|required');
	}
}
