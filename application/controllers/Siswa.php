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
		$this->load->model(['m_siswa','m_master','m_user']);
	}
	public function index()
	{
      cekAdmin();
      $try = $this->m_siswa->get()->result();
        foreach ($try as $key) {
           $query = $this->m_siswa->get($key->id_siswa)->row(); 
        }
        $this->load->view('template/main', [
          "src" => "module/siswa/listsiswa",
          "page" => "Data siswa",
         "try" => $this->m_siswa->getAktif()->result(),
          "kelas" => $this->m_master->getKelas()->result(),
          "query" => $query
        ]);
	}
    public function SiswaMutasi()
    {
        cekAdmin();
        $this->load->view('template/main', [
            "src" => "module/siswa/listSiswaMutasi",
            "page" => "Data siswa mutasi",
            "query" => $this->m_siswa->getMutasi()->result(),
            ]);
    }
    public function Alumni()
    {
        cekAdmin();
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
        cekAdmin();
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
        if ($this->session->level == 'user') {
        cekAlreadyInput();
        }
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
            $post = $this->input->post(null, TRUE);
            $post['foto'] = uploader('item','image/', 'png|jpg|jpeg', '2048', 'foto');   
            $this->m_siswa->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sukses', 'ditambah');
            }
            redirect('siswa','refresh');
        }	
    }
    public function edit($id_siswa)
    {
        cekAdmin();
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
                  // jika input image ada isinya
                  if (@$_FILES['foto']['name'] != null) {
                    if ($this->upload->do_upload('foto')) {
                      $post['foto'] = $this->upload->data('file_name');
                      $image = $this->m_siswa->get($id_siswa)->row_array();
                      // replace gambar sebelumnya dengan gambar yang baru
                      if ($image != null) {
                        $target = 'uploads/image/'.$image['foto'];
                        unlink($target);
                      }
                      $this->m_siswa->edit($post);
                      if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('sukses', 'diubah');
                      }
                        redirect('siswa', 'refresh');
                    }else{
                      $error = $this->upload->display_errors();
                      $this->session->set_flashdata('gagal', $error);
                      redirect('siswa/edit/'.$id_siswa, 'refresh');
                    }
                  } else { // jika input image tidak ada isinya
                    $post['foto'] = null;
                    $this->m_siswa->edit($post);
                    if ($this->db->affected_rows() > 0) {
                      $this->session->set_flashdata('sukses', 'diubah');
                    }
                    redirect('siswa', 'refresh');
                  }
                	$this->session->set_flashdata('gagal', 'data gagal ditambkan');
                	redirect('siswa/edit/'.$id_siswa,'refresh');
                }
    }

    public function updateInList()
    {
        $post = $this->input->post(null, true);
        if (isset($post['editKelas'])) {
            $this->m_siswa->edit($post);
        }
    }

    public function delete($id_siswa)
    {
        cekAdmin();
        $this->m_siswa->del($id_siswa);
        $this->session->set_flashdata('sukses','dihapus');
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
      cekAdmin();
      $data['row'] = $this->m_siswa->get($id_siswa)->row();
      $html = $this->load->view('module/dokumen/formreg',$data,true);
      $this->fungsi->pdfPrint($html,'coba',array(0,0,609.4488,935.433),'potrait');
  }
  
    public function export(){
        cekAdmin();
    $siswa = $this->m_siswa->get()->result();
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'NO');
    $sheet->setCellValue('B1', 'FOTO');
    $sheet->setCellValue('C1', 'NAMA SISWA');
    $sheet->setCellValue('D1', 'ALAMAT SISWA');
    $sheet->setCellValue('E1', 'TEMPAT LAHIR');
    $sheet->setCellValue('F1', 'TANGGAL LAHIR');
    $sheet->setCellValue('G1', 'AGAMA');
    $sheet->setCellValue('H1', 'UMUR');
    $sheet->setCellValue('I1', 'BERAT BADAN');
    $sheet->setCellValue('J1', 'TINGGI BADAN');
    $sheet->setCellValue('K1', 'GOLONGAN DARAH');
    $sheet->setCellValue('L1', 'PENYAKIT');
    $sheet->setCellValue('M1', 'JENIS KELAMIN');
    $sheet->setCellValue('N1', 'JUMLAH SAUDARA');
    $sheet->setCellValue('O1', 'ASAL SEKOLAH');
    $sheet->setCellValue('P1', 'STATUS SISWA');
    $sheet->setCellValue('Q1', 'NAMA AYAH');
    $sheet->setCellValue('R1', 'PEKERJAAN AYAH');
    $sheet->setCellValue('S1', 'KTP AYAH');
    $sheet->setCellValue('T1', 'PENDIDIKAN AYAH');
    $sheet->setCellValue('U1', 'GAJI');
    $sheet->setCellValue('V1', 'TEMPAT TINGGAL');
    $sheet->setCellValue('W1', 'JARAK KE SEKOLAH');
    $sheet->setCellValue('X1', 'KELAS');
    $sheet->setCellValue('Y1', 'KELAS');
    $sheet->setCellValue('Z1', 'KELAS');
    
    $no=0;
    $baris=2;
    foreach ($siswa as $key) {
      $sheet->setCellValue('A'.$baris,$no++);
      $sheet->setCellValue('B'.$baris,$key->foto);
      $sheet->setCellValue('C'.$baris,$key->nama_siswa);
      $sheet->setCellValue('D'.$baris,$key->alamat_siswa);
      $sheet->setCellValue('E'.$baris,$key->tempat_tinggal);
      $sheet->setCellValue('F'.$baris,$key->tanggal_lahir);
      $sheet->setCellValue('G'.$baris,$key->agama);
      $sheet->setCellValue('H'.$baris,$key->umur);
      $sheet->setCellValue('I'.$baris,$key->bb);
      $sheet->setCellValue('J'.$baris,$key->tb);
      $sheet->setCellValue('K'.$baris,$key->gol_darah);
      $sheet->setCellValue('L'.$baris,$key->penyakit);
      $sheet->setCellValue('M'.$baris,$key->gender_siswa);
      $sheet->setCellValue('N'.$baris,$key->jumlah_saudara);
      $sheet->setCellValue('O'.$baris,$key->asal_sekolah);
      $sheet->setCellValue('P'.$baris,$key->keadaan_status);
      $sheet->setCellValue('Q'.$baris,$key->nama_ayah);
      $sheet->setCellValue('R'.$baris,$key->job_ayah);
      $sheet->setCellValue('S'.$baris,$key->pendidikan_ayah);
      $sheet->setCellValue('T'.$baris,$key->gaji);
      $sheet->setCellValue('U'.$baris,$key->tempat_tinggal);
      $sheet->setCellValue('V'.$baris,$key->jarak_sekolah);
      $sheet->setCellValue('W'.$baris,$key->jarak_sekolah);
      $sheet->setCellValue('X'.$baris,$key->nama_kelas);
      $sheet->setCellValue('Y'.$baris,$key->nama_kelas);
      $sheet->setCellValue('Z'.$baris,$key->nama_kelas);
      $baris++;
    }
    $sheet->setTitle('Data Siswa');
    $writer = new Xlsx($spreadsheet);
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,'Xlsx');
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="data_siswa.xlsx"');
    $writer->save("php://output");
    }
    public function import()
    {
        cekAdmin();
        $fileName = $_FILES['import']['name'];
        $config['upload_path'] = 'uploads/dokumen'; 
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';

        $this->load->library('upload');
        $this->upload->initialize($config); 
        if (!$this->upload->do_upload('import')) {
            echo $this->upload->display_errors();
            exit();
        }
        $inputFileName = 'uploads/dokumen/'.$fileName;
       try {
           $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
           $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
           $loadExcel = $reader->load($inputFileName);
       } catch (Exception $e) {
           die('Error Loading File "'.pathinfo($inputFileName, PATHINFO_BASENAME).'" : '.$e->getMessage());
       }
        $sheet = $loadExcel->getSheet(0);
        $hightRow = $sheet->getHighestRow();
        $hightColumn = $sheet->getHighestColumn();
        for ($i = 2; $i <= $hightRow; $i++) {
            $rowData = $sheet->rangeToArray('A'. $i . ':'. $hightColumn.$i,null,true,false);
            $data =  [
                'nama_siswa' => $rowData[0][0],
                'alamat_siswa' => $rowData[0][1],
                'nis' => $rowData[0][2],
                'nik_siswa' => $rowData[0][3],
                'status' => $rowData[0][18],
            ];
            /* echo json_encode($data);die(); */
            $this->db->insert('siswa',$data);
        }
        unlink($inputFileName);
        $this->session->set_flashdata('sukses', ' Diimport');
        redirect('siswa', 'refresh');
    }

    public function validasi()
    {
         // form data diri
        if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'guru') {
        $this->form_validation->set_rules('nis', 'NIS', 'required|min_length[5]');
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
        $this->form_validation->set_rules('status', 'Status Siswa', 'required');
        }
        if ($this->router->fetch_method() != 'edit') {
         if (empty($_FILES['foto']['name'])) {
           $this->form_validation->set_rules('foto','Foto', 'required'); 
        }
        }
        $this->form_validation->set_rules('npsn', 'NPSN TK', 'required');
        $this->form_validation->set_rules('nik_siswa', 'NIK Siswa', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_siswa', 'Alamat', 'required');
        $this->form_validation->set_rules('dusun', 'Dusun', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('desa', 'Desa', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('gender_siswa', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
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
        $this->form_validation->set_rules('gaji', 'Gaji Ayah', 'required');
        $this->form_validation->set_rules('gaji_ibu', 'Gaji Ibu', 'required');
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
        $this->form_validation->set_error_delimiters('', '');
    }
}
