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
        $this->validasi();	
    	 if ($this->form_validation->run() == FALSE)
                {
			    	$this->load->view('template/main', [
			    		'src' => 'module/ppdb/addppdb',
			    		'page' => 'tambah peserta didik baru',
                        'query' => $this->m_ppdb->get()->row(),
			    		"kelas" => $this->m_master->getKelas()->result(),
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
        cekAdmin();
        $this->validasi();  
    	 if ($this->form_validation->run() == FALSE)
                {
                    $query = $this->m_ppdb->get($id_siswa);
                    if ($query->num_rows() > 0) {
							$this->load->view('template/main', [
                        	"src" => "module/siswa/editsiswa",
                        	"page" => "Edit Siswa",
                        	"query" => $query->row(),
                            "kelas" => $this->m_master->getKelas()->result(),
                            "user" => $this->m_user->get()->result()
                        ]);    
                    }else{
                        show_404();
                    }
			    	
                }
                else
                {
                	$post = $this->input->post(null, TRUE);
                	$this->m_ppdb->edit($post);
                    // echo json_encode($this->m_siswa->edit($post));
                    // die();
                	if ($this->db->affected_rows() > 0) {
                		$this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
                        redirect('ppdb','refresh');
                	}
                	$this->session->set_flashdata('gagal', 'data gagal ditambkan');
                	redirect('ppdb/edit/'.$id_siswa,'refresh');
                }
    }
    public function validasi()
    {
        if ($this->session->userdata('level') == 'admin') {
        $this->form_validation->set_rules('status', 'Status Siswa', 'required');
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'trim|required');
            # code...
        }
        // form data diri
        $this->form_validation->set_rules('nis', 'NIS', 'required|min_length[5]');
        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_siswa', 'Alamat', 'required');
        $this->form_validation->set_rules('gender_siswa', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('bb', 'Berat Badan', 'required');
        $this->form_validation->set_rules('tb', 'Tinggi Badan', 'required');
        $this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required');
        $this->form_validation->set_rules('keadaan_status', 'Keadaan Status', 'required');
        // form ortu
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama_ibu', 'required');
        $this->form_validation->set_rules('pendidikan_ayah', 'Pendidikan Ayah', 'required');
        $this->form_validation->set_rules('pendidikan_ibu', 'Pendidikan Ibu', 'required');
        $this->form_validation->set_rules('job_ayah', 'Pekerjaan Ayah', 'required');
        $this->form_validation->set_rules('job_ibu', 'Pekerjaan Ibu', 'required');
        $this->form_validation->set_rules('gaji', 'Gaji', 'required');
        $this->form_validation->set_rules('ktp_ayah', 'Ktp Ayah', 'required');
        $this->form_validation->set_rules('ktp_ibu', 'Ktp Ibu', 'required');
        // kehidupan
        $this->form_validation->set_rules('cara_kesekolah', 'Cara Ke Sekolah', 'required');
        $this->form_validation->set_rules('jarak_sekolah', 'Jarak Ke sekolah', 'required');
        $this->form_validation->set_rules('tempat_mandi', 'Tempat Mandi', 'required');
        $this->form_validation->set_rules('air_mandi', 'Pengadaan Air Mandi', 'required');
        $this->form_validation->set_rules('air_minum', 'Pengadaan Air Minum', 'required');
        $this->form_validation->set_rules('bangunan', 'Bangunan Rumah', 'required');
        $this->form_validation->set_rules('lantai', 'Lantai Rumah', 'required');
        $this->form_validation->set_rules('penerangan', 'Penerangan Rumah', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu Tempu Ke Sekolah', 'required');
        $this->form_validation->set_rules('jumlah_saudara', 'Jumlah Saudara', 'required');
        // message validation
        $this->form_validation->set_message('numeric', '%s harus menggunakan angka');
        $this->form_validation->set_message('required', '%s field tidak boleh kosong');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_error_delimiters('<small class="text-danger required">','</small>');
    }
}
