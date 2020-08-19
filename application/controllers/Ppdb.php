<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ppdb extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cekNotLogin();
    cekRoutes('ppdb');
		$this->load->model(['m_ppdb','m_master','m_user','m_siswa','m_nilai', 'm_gelombang']);
	}
	public function index()
  {

    // rekap by tanggal {{
    $dataPerhari = $this->m_ppdb->getByDate()->result();
    sort($dataPerhari);
    $rekap_tanggal = [];
    $data = [];
    foreach ($dataPerhari as $value) {
    $rekap_tanggal[] = $value->tanggal;
    $data[] = $value->jumlah_data;
    }
    // }}
    //rekap daftar ulang {{
    $siswa = $this->m_siswa->getByUsersId()->result();
    $daftarUlang = [];
    $total = [];
    foreach ($siswa as $value) {
           $daftarUlang[] = $value->tanggal;
           $total[] = $value->jumlah_data;
    }
    //}}
    /* echo json_encode($total);die(); */
		if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'guru') {
		$this->load->view('module/ppdb/index',[
        "query" => $this->m_ppdb->get()->result(),
        "pendaftar" => $this->m_ppdb->get()->num_rows(),
        'gelombang1' => $this->m_ppdb->getByGelombang1()->num_rows(),
        'gelombang2' => $this->m_ppdb->getByGelombang2()->num_rows(),
        'lulus' => $this->m_nilai->getLulus()->num_rows(),
        'tidakLulus' => $this->m_nilai->getTidakLulus()->num_rows(),
        'lunas' => $this->m_ppdb->getByLunas()->num_rows(),
        'belumLunas' => $this->m_ppdb->getByBelumLunas()->num_rows(),
        'rekap_tanggal' => json_encode($rekap_tanggal),
        'dataPerhari' => json_encode($data),
        'rekapDaftarUlang' => json_encode($daftarUlang),
        'dataDaftarUlang' => json_encode($total)
    ]);
		}elseif ($this->session->userdata('level') == 'user') {
        $id = $this->session->userdata('id_ppdb');
        $id_siswa = $this->session->userdata('id_siswa');
  			$this->load->view('module/ppdb/homepage',[
			"src" => "module/ppdb/homepage",
			"page" => "PPDB",
      "query" => $this->m_ppdb->get_where($id)->row_array(),
      "siswa" => $this->db->get_where('siswa',['id_siswa' => $id_siswa])->row_array(),
      "nilai" => $this->m_nilai->get($id)->row_array()
		]);
		}
	}

  public function listPpdb()
  {
    cekAdmin();
    $this->load->view('template/main', [
        "src" => "module/ppdb/listPpdb",
        "page" => "Data Peserta Didik Baru",
        "query" => $this->m_ppdb->get()->result()
    ]);
  }
  function get_ajax_ppdb() {
        $list = $this->m_ppdb->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $ppdb) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $ppdb->nama_ppdb.'<br>'.$ppdb->nama_panggilan.'<br>'.$ppdb->gender_ppdb;
            $row[] = $ppdb->alamat_rumah_ppdb;
            $row[] = $ppdb->sesi_gelombang;
            $row[] = $ppdb->status_pembayaran;
            // add html for action
            $row[] = '<a href="'.site_url('halaman/ppdb/print-form-ppdb/'.$ppdb->id_ppdb).'" data-toggle="tooltip" data-placement="left" title="Print Pdf" class="btn btn-warning btn-xs" target="_blank"><i class="fa fa-print"></i></a>
                   <a href="'.site_url('halaman/ppdb/ubah/'.$ppdb->id_ppdb).'" data-toggle="tooltip" data-placement="left" title="Edit Data"  class="btn btn-success btn-xs"><i class="fa fa-edit"></i> </a>
                    <a href="'.site_url('halaman/ppdb/hapus/'.$ppdb->id_ppdb).'" onclick="return confirm(\'Yakin hapus data?\')"  data-toggle="tooltip" data-placement="left" title="Hapus Data"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->m_ppdb->count_all(),
                    "recordsFiltered" => $this->m_ppdb->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function add(){
    cekAlreadyInput();
    $params = new StdClass();
    $params->id_ppdb = null;
    $params->id = null;
    $params->username = null;
    $params->email = null;
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
    $params->status_pembayaran = null;

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

  public function delete($id_ppdb)
  {
    $this->m_ppdb->delete($id_ppdb);
    $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
    redirect('halaman/ppdb', 'refresh');
  }

  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($post['save'])) {
        $gelombang = $this->m_gelombang->get()->result();
        foreach ($gelombang as $value) {
            if ($value->sesi_gelombang == 'gelombang 1') {
            $start = date('Y-m-d', strtotime($value->awal));
            $end = date('Y-m-d', strtotime($value->akhir));
            }
        }
        $currentDate = date('Y-m-d');
        $date = date('Y-m-d', strtotime($currentDate));
        if ($date > $start && $date < $end) {
            $post['gelombang'] = 'gelombang 1';
        }else{
            $post['gelombang'] = 'gelombang 2';
        }
        $this->m_ppdb->add($post);
    }elseif(isset($post['edit'])){
      $this->m_ppdb->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('sukses', 'Data berhasil dimasukkan');
    }
    redirect('halaman/ppdb/daftar-ppdb', 'refresh');

  }

  public function printPdf($id_ppdb)
  {
      $data['row'] = $this->m_ppdb->get($id_ppdb)->row();
      $html = $this->load->view('module/dokumen/formRegPpdb',$data,true);
      $this->fungsi->pdfPrint($html,'Form Ppdb','A4','potrait');
  }
  public function printPdfSiswa($id_siswa){
      $data['row'] = $this->m_siswa->get($id_siswa)->row();
      $html = $this->load->view('module/dokumen/formreg',$data,true);
      $this->fungsi->pdfPrint($html,'Form daftar ulang',array(0,0,609.4488,935.433),'potrait');
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
        $this->form_validation->set_error_delimiters('','');
    }
}
