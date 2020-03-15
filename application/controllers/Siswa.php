<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Siswa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		cekNotLogin();
		$this->load->model('m_siswa');
        $this->load->model('m_master');
	}
	public function index()
	{
		$this->load->view('template/main', [
			"src" => "module/siswa/listsiswa",
			"page" => "Data siswa",
            "try" => $this->m_siswa->getAktif()->result(),
			]);
	}
    public function SiswaMutasi()
    {
        $this->load->view('template/main', [
            "src" => "module/siswa/listSiswaMutasi",
            "page" => "Data siswa mutasi",
            "query" => $this->m_siswa->getMutasi()->result(),
            ]);
    }
    public function Alumni()
    {
        $this->load->view('template/main', [
            "src" => "module/siswa/listAlumni",
            "page" => "Data alumni siswa",
            "query" => $this->m_siswa->getAlumni()->result(),
            ]);
    }


public function add()
    {
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
			    		'src' => 'module/siswa/addsiswa',
			    		'page' => 'tambah siswa',
			    		"join" => $this->m_master->getKelas()->result()
			    	]);
                }
                else
                {
                	$post = $this->input->post(null, TRUE);
                	$this->m_siswa->add($post);
                	if ($this->db->affected_rows() > 0) {
                		$this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
                	}
                	$this->session->set_flashdata('gagal', 'data gagal ditambkan');
                	redirect('siswa/add','refresh');
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
                    $query = $this->m_siswa->get($id_siswa);
                    if ($query->num_rows() > 0) {
							$this->load->view('template/main', [
                        	"src" => "module/siswa/editsiswa",
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

    public function delete($id)
    {
        $this->m_siswa->del($id);
        $this->session->set_flashdata('hapus','Data berhasil dihapus');
        redirect('user','refresh');
    }
    // public function username_check()
    // {
    //     $post = $this->input->post(null, TRUE);
    //     $query = $this->db->query("SELECT * FROM siswa WHERE nis = '$post[nis]' AND id_siswa != '$post[id]' ");
    //     if ($query->num_rows() > 0) {
    //         $this->form_validation->set_message('username_check', '{field} sudah terpakai');
    //         return FALSE;
    //     }else{
    //         return TRUE;
    //     }
    // }
}