<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
/**
 * undocumented function
 *
 * @return void
 */
public function detail($id_siswa)
{
  $query = $this->m_siswa->get($id_siswa);
  if ($query->num_rows() > 0) {
     $this->load->view('template/main', [
    'src' => 'module/siswa/detailsiswa',
    'page' => 'detail siswa',
    'query' => $query->row_array()
  ]);

  }
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
      $config['upload_path'] = 'uploads/image/';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max_sizes'] = 2048;
      $config['file_name'] = 'item-'.date('Ymd');
      $this->load->library('upload',$config);
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
                  $post = $this->input->post(null, true);
                  if (@$_FILES['foto']['name'] != null) {
                    if ($this->upload->do_upload('foto')) {
                      $post['foto'] = $this->upload->data('file_name');
                      $image = $this->m_siswa->get($id_siswa)->row_array();
                      if ($image != null) {
                        $target = 'uploads/image/'.$image['foto'];
                        unlink($target);
                      }
                      $this->m_siswa->edit($post);
                      if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
                      }
                        redirect('siswa', 'refresh');
                    }else{
                      $error = $this->upload->display_errors();
                      $this->session->set_flashdata('gagal', $error);
                      redirect('siswa/edit/'.$id_siswa, 'refresh');
                    }
                  } else {
                    $post['foto'] = null;
                    $this->m_siswa->edit($post);
                    if ($this->db->affected_rows() > 0) {
                      $this->session->set_flashdata('sukses', 'Data berhasil ditambah');
                    }
                    redirect('siswa', 'refresh');
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
  
    public function export(){
    $siswa = $this->m_siswa->get()->result();
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'NO');
    $sheet->setCellValue('B1', 'NAMA SISWA');
    $sheet->setCellValue('C1', 'ALAMAT SISWA');
    $sheet->setCellValue('D1', 'TEMPAT LAHIR');
    $sheet->setCellValue('E1', 'TANGGAL LAHIR');
    $sheet->setCellValue('F1', 'AGAMA');
    $sheet->setCellValue('G1', 'UMUR');
    $sheet->setCellValue('H1', 'BERAT BADAN');
    $sheet->setCellValue('I1', 'TINGGI BADAN');
    $sheet->setCellValue('J1', 'GOLONGAN DARAH');
    $sheet->setCellValue('K1', 'PENYAKIT');
    $sheet->setCellValue('L1', 'JENIS KELAMIN');
    $sheet->setCellValue('M1', 'JUMLAH SAUDARA');
    $sheet->setCellValue('N1', 'ASAL SEKOLAH');
    $sheet->setCellValue('O1', 'STATUS SISWA');
    $sheet->setCellValue('P1', 'NAMA AYAH');
    $sheet->setCellValue('Q1', 'PEKERJAAN AYAH');
    $sheet->setCellValue('R1', 'KTP AYAH');
    $sheet->setCellValue('S1', 'PENDIDIKAN AYAH');
    $sheet->setCellValue('T1', 'GAJI');
    $sheet->setCellValue('U1', 'TEMPAT TINGGAL');
    $sheet->setCellValue('V1', 'JARAK KE SEKOLAH');
    
    $no=0;
    $baris=2;
    foreach ($siswa as $key) {
      $sheet->setCellValue('A'.$baris,$no++);
      $sheet->setCellValue('B'.$baris,$key->nama_siswa);
      $sheet->setCellValue('C'.$baris,$key->alamat_siswa);
      $sheet->setCellValue('D'.$baris,$key->tempat_tinggal);
      $sheet->setCellValue('E'.$baris,$key->tanggal_lahir);
      $sheet->setCellValue('F'.$baris,$key->agama);
      $sheet->setCellValue('G'.$baris,$key->umur);
      $sheet->setCellValue('H'.$baris,$key->bb);
      $sheet->setCellValue('I'.$baris,$key->tb);
      $sheet->setCellValue('J'.$baris,$key->gol_darah);
      $sheet->setCellValue('K'.$baris,$key->penyakit);
      $sheet->setCellValue('L'.$baris,$key->gender_siswa);
      $sheet->setCellValue('M'.$baris,$key->jumlah_saudara);
      $sheet->setCellValue('N'.$baris,$key->asal_sekolah);
      $sheet->setCellValue('O'.$baris,$key->keadaan_status);
      $sheet->setCellValue('P'.$baris,$key->nama_ayah);
      $sheet->setCellValue('Q'.$baris,$key->job_ayah);
      $sheet->setCellValue('R'.$baris,$key->pendidikan_ayah);
      $sheet->setCellValue('S'.$baris,$key->gaji);
      $sheet->setCellValue('T'.$baris,$key->tempat_tinggal);
      $sheet->setCellValue('U'.$baris,$key->jarak_sekolah);
      $baris++;
    }
    $sheet->setTitle('Data Siswa');
    $writer = new Xlsx($spreadsheet);
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,'Xlsx');
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="data_siswa.xlsx"');
    $writer->save("php://output");
    }
    public function import(){
      $file_mimes = array(
        'application/octet-stream',
        'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv',
        'text/csv', 'application/csv', 'application/excel',
        'application/vnd.msexcel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      );
    if(isset($_FILES['berkas_excel']['name']) &&
      in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
      $arr_file = explode('.', $_FILES['berkas_excel']['name']);
      $extension = end($arr_file);     
       if('csv' == $extension) {
         $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
       }
       else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
       }
      $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
      $sheetData = $spreadsheet->getActiveSheet()->toArray();
    }
     
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
