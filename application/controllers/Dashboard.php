<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cekNotLogin();
    cekAdmin();
    cekRoutes('dashboard');
    $this->load->model(['m_siswa','m_nilai','m_user','m_ppdb','m_master']);
	}
	public function index()
	{
    if ($this->session->level == 'guru') {
        redirect('halaman/ppdb', 'refresh');
    }
    $dataPerhari = $this->m_ppdb->getByDate()->result();
    sort($dataPerhari);
    $rekap_tanggal = [];
    $data = [];
    foreach ($dataPerhari as $value) {
    $rekap_tanggal[] = $value->tanggal;
    $data[] = $value->jumlah_data; 
    } 

    //rekap daftar ulang {{
    $siswa = $this->m_siswa->getByUsersId()->result();
    $daftarUlang = [];
    $total = [];
    foreach ($siswa as $value) {
           $daftarUlang[] = $value->tanggal;
           $total[] = $value->jumlah_data;
    }
    //}}

		$this->load->view('module/dashboard/dashboard',[
      "page" => "Dashboard",
      'gelombang1' => $this->m_ppdb->getByGelombang1()->num_rows(),
      'gelombang2' => $this->m_ppdb->getByGelombang2()->num_rows(),
      'lunas' => $this->m_ppdb->getByLunas()->num_rows(),
      'belumLunas' => $this->m_ppdb->getByBelumLunas()->num_rows(),
      'rekap_tanggal' => json_encode($rekap_tanggal),
      'dataPerhari' => json_encode($data),
      'rekapDaftarUlang' => json_encode($daftarUlang),
      'dataDaftarUlang' => json_encode($total),
      "aktif" => $this->m_siswa->getAktif()->num_rows(),
      "mutasi" => $this->m_siswa->getMutasi()->num_rows(),
      "alumni" => $this->m_siswa->getAlumni()->num_rows(),
      "lulus" => $this->m_nilai->getLulus()->num_rows(),
      "tidakLulus" => $this->m_nilai->getTidakLulus()->num_rows(),
      "ppdb" => $this->m_ppdb->get()->num_rows(),
      "akun" => $this->m_user->get()->num_rows(),
      "admin" => $this->m_user->getAdmin()->num_rows(),
      "panitia" => $this->m_user->getPanitia()->num_rows(),
      "user" => $this->m_user->getUser()->num_rows(),
      "guru" => $this->m_master->getGuru()->num_rows()
		]);
  }
  
}
