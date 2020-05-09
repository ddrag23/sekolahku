<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cekNotLogin();
		$this->load->model('m_ppdb');
		$this->load->model('m_master');
		$this->load->model('m_user');
    $this->load->model('m_siswa');
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
    $params = new StdClass();
    $params->id_ppdb = null;
    $params->username = null;
    $params->nama_ppdb = null;
    $params->alamat_rumah_ppdb = null;
    $params->gender_ppdb = null;
    $params->tempat_lahir_ppdb = null;
    $params->tanggal_lahir_ppdb= null;
    $params->nama_ortu_ppdb = null;
    $params->nama_panggilan =null;
    $params->no_hp_ppdb = null;
    $params->asal_sekolah_ppdb = null;
    $params->alamat_sekolah_ppdb = null;

        $this->validasi();	
    	 if ($this->form_validation->run() == FALSE)
                {
			    	$this->load->view('template/main', [
			    		'src' => 'module/ppdb/formppdb',
			    		'page' => 'tambah peserta didik baru',
              'submit' => 'save',
              'query' => $params, 
			    		"user" => $this->m_user->get()->result()
			    	]);
                }
                else
                {
                  $this->proses();
                }
	}
	public function edit($id_ppdb)
    {
        cekAdmin();
        $this->validasi();  
    	 if ($this->form_validation->run() == FALSE)
                {
                    $query = $this->m_ppdb->get($id_ppdb);
                    if ($query->num_rows() > 0) {
                          $this->load->view('template/main', [
                            "src" => "module/ppdb/formppdb",
                            "page" => "Edit Siswa",
                            "submit" => "edit",
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
                  $this->proses();
                }
   }
  /**
   * undocumented function
   *
   * @return void
   */
  public function delete($id_ppdb)
  {
    $this->m_ppdb->delete($id_ppdb);
    $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
    redirect('ppdb', 'refresh');
  }
  
  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($post['save'])) {
      $this->m_ppdb->add($post);
    }elseif(isset($post['edit'])){
    $this->m_ppdb->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('sukses', 'Data berhasil dimasukkan');
    }
    redirect('ppdb', 'refresh');

  }
  
    public function validasi()
    {
        // form data diri
        $this->form_validation->set_rules('nama_ppdb', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_rumah_ppdb', 'Alamat', 'required');
        $this->form_validation->set_rules('gender_ppdb', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp_ppdb', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('tempat_lahir_ppdb', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('asal_sekolah_ppdb', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat_sekolah_ppdb', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('nama_ortu_ppdb', 'Tanggal Lahir', 'required');
        $this->form_validation->set_error_delimiters('<small class="text-danger required">','</small>');
    }
}
