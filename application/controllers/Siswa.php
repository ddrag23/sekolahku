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
        cekAdmin();
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
        $this->validasi();
    	 if ($this->form_validation->run() == FALSE)
                {
			    	$this->load->view('template/main', [
			    		'src' => 'module/siswa/addsiswa',
			    		'page' => 'tambah siswa',
			    		"kelas" => $this->m_master->getKelas()->result(),
                        "guru" => $this->m_master->getGuru()->result()
			    	]);
                }
                else
                {
                	$post = $this->input->post(null, TRUE);;
                	$this->m_siswa->add($post);
                	if ($this->db->affected_rows() > 0) {
                		$this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
                        redirect('siswa','refresh');
                	}
                }
    	
    }
    public function edit($id_siswa)
    {
    	$this->validasi();
    	 if ($this->form_validation->run() == FALSE)
                {
                    $query = $this->m_siswa->get($id_siswa);
                    if ($query->num_rows() > 0) {
							$this->load->view('template/main', [
                        	"src" => "module/siswa/editsiswa",
                        	"page" => "Edit Siswa",
                        	"query" => $query->row(),
                            "kelas" => $this->m_master->getKelas()->result(),
                            "guru" => $this->m_master->getGuru()->result()
                        ]);    
                    }else{
                        show_404();
                    }
			    	
                }
                else
                {
                    $post = $this->input->post(null, TRUE);
                    $gambar = $this->m_siswa->get($post['id_siswa'])->row();
                    if ($gambar->foto != null) {
                        $target_file = './uploads/image'.$gambar->foto;
                        unlink($target_file);
                    } else {
                        # code...
                    }
                    
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

    public function delete($id_siswa)
    {
        $this->m_siswa->del($id_siswa);
        $this->session->set_flashdata('hapus','Data berhasil dihapus');
        redirect('siswa','refresh');
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

  public function printpdf($id_siswa) 
  {
  $data['row'] = $this->m_siswa->get($id_siswa)->row();
  $html = $this->load->view('module/dokumen/formreg',$data,true);
  $this->fungsi->pdfPrint($html,'coba','A4','potrait');
  }


    public function validasi()
    {
         // form data diri
        $this->form_validation->set_rules('nis', 'NIS', 'required|min_length[5]');
        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_siswa', 'Alamat', 'required');
        $this->form_validation->set_rules('gender_siswa', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('status', 'Status Siswa', 'required');
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('bb', 'Berat Badan', 'required');
        $this->form_validation->set_rules('tb', 'Tinggi Badan', 'required');
        $this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required');
        $this->form_validation->set_rules('nama_sekolah_asal', 'Nama Asal Sekolah', 'required');
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
        $this->form_validation->set_rules('tempat_tinggal', 'Tempat Tinggal', 'required');
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
