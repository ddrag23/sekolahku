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
    cekRoutes('siswa');
		$this->load->model(['m_siswa','m_master','m_user']);
	}
	public function index()
	{
      cekAdmin();
        $this->load->view('template/main', [
          "src" => "module/siswa/listsiswa",
          "page" => "Data siswa",
         "try" => $this->m_siswa->getAktif()->result(),
          "kelas" => $this->m_master->getKelas()->result()
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
 function get_ajax_aktif() {
        $list = $this->m_siswa->get_datatables_aktif();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $siswa) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $siswa->foto != null ? '<img src="'.base_url('uploads/image/'.$siswa->foto).'" class="img" style="width:100px">' : null;
            $row[] = $siswa->nisn.'<br>'.$siswa->nama_siswa.'<br>'.$siswa->gender_siswa.'<br>'.$siswa->alamat_siswa;
            $row[] = $siswa->no_hp;
            $row[] = $siswa->nama_kelas;
            $row[] = $siswa->status;
            $row[] = $siswa->tahun_ajaran;
            
            // add html for action
            $row[] = '<a href="'.site_url('halaman/siswa/print/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Print Pdf"  class="btn btn-warning btn-xs" target="_blank"><i class="fa fa-print"></i></a>
            <a href="'.site_url('halaman/siswa/rincian/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Lihat Rincian Siswa" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> </a>
              <a href="'.site_url('halaman/siswa/ubah/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Ubah Data Siswa" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> </a>
                   <a href="'.site_url('halaman/siswa/hapus/'.$siswa->id_siswa).'" onclick="return confirm(\'Yakin hapus data?\')" data-toggle="tooltip"  data-placement="left" title="Hapus" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> </a>'
                    ;
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->m_siswa->count_all(),
                    "recordsFiltered" => $this->m_siswa->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
function get_ajax_mutasi() {
        $list = $this->m_siswa->get_datatables_mutasi();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $siswa) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $siswa->foto != null ? '<img src="'.base_url('uploads/image/'.$siswa->foto).'" class="img" style="width:100px">' : null;
            $row[] = $siswa->nisn.'<br>'.$siswa->nama_siswa.'<br>'.$siswa->gender_siswa.'<br>'.$siswa->alamat_siswa;
            $row[] = $siswa->no_hp;
            $row[] = $siswa->nama_kelas;
            $row[] = $siswa->status;
            $row[] = $siswa->link_doc_mutasi;
            $row[] = $siswa->tahun_ajaran;
            
            // add html for action
            $row[] = '<a href="'.site_url('halaman/siswa/print/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Print Pdf"  class="btn btn-warning btn-xs" target="_blank"><i class="fa fa-print"></i></a>
            <a href="'.site_url('halaman/siswa/rincian/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Lihat Rincian Siswa" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> </a>
              <a href="'.site_url('halaman/siswa/ubah/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Ubah Data Siswa" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> </a>
                   <a href="'.site_url('halaman/siswa/hapus/'.$siswa->id_siswa).'" onclick="return confirm(\'Yakin hapus data?\')" data-toggle="tooltip"  data-placement="left" title="Hapus" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> </a>'
                    ;
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->m_siswa->count_all(),
                    "recordsFiltered" => $this->m_siswa->count_filtered_mutasi(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
function get_ajax_alumni() {
        $list = $this->m_siswa->get_datatables_alumni();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $siswa) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $siswa->foto != null ? '<img src="'.base_url('uploads/image/'.$siswa->foto).'" class="img" style="width:100px">' : null;
            $row[] = $siswa->nisn.'<br>'.$siswa->nama_siswa.'<br>'.$siswa->gender_siswa.'<br>'.$siswa->alamat_siswa.'<br>'.$siswa->no_hp.'<br>'.$siswa->nama_kelas;
            $row[] = $siswa->status;
            $row[] = $siswa->tahun_ajaran;
            $row[] = $siswa->status_ijazah;
            $row[] = $siswa->date_get_ijazah;
            
            // add html for action
            $row[] = '<a href="'.site_url('halaman/siswa/print/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Print Pdf"  class="btn btn-warning btn-xs" target="_blank"><i class="fa fa-print"></i></a>
            <a href="'.site_url('halaman/siswa/rincian/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Lihat Rincian Siswa" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> </a>
              <a href="'.site_url('halaman/siswa/ubah/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Ubah Data Siswa" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> </a>
                   <a href="'.site_url('halaman/siswa/hapus/'.$siswa->id_siswa).'" onclick="return confirm(\'Yakin hapus data?\')" data-toggle="tooltip"  data-placement="left" title="Hapus" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> </a>'
                    ;
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->m_siswa->count_all(),
                    "recordsFiltered" => $this->m_siswa->count_filtered_alumni(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
public function add()
    {
        if ($this->session->level == 'user') {
        cekAlreadyInput();
        }
        $this->validasi();
        $this->form_validation->set_rules('npsn', 'NPSN TK', 'required|numeric|is_unique[siswa.npsn]');
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
            redirect('halaman/siswa/','refresh');
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
                        redirect('halaman/siswa', 'refresh');
                    }else{
                      $error = $this->upload->display_errors();
                      $this->session->set_flashdata('gagal', $error);
                      redirect('halaman/siswa/ubah/'.$id_siswa, 'refresh');
                    }
                  } else { // jika input image tidak ada isinya
                    $post['foto'] = null;
                    $this->m_siswa->edit($post);
                    if ($this->db->affected_rows() > 0) {
                      $this->session->set_flashdata('sukses', 'diubah');
                    }
                    redirect('halaman/siswa', 'refresh');
                  }
                	$this->session->set_flashdata('gagal', 'data gagal ditambkan');
                	redirect('halaman/siswa/ubah/'.$id_siswa,'refresh');
                }
    }

    public function editClass()
    {
      $post = $this->input->post(null, true);
      $this->form_validation->set_rules('id_siswa', 'Nama Siswa', 'required');
      $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
      $this->form_validation->set_error_delimiters('','');
      $this->form_validation->set_message('required','{field} Harus di isi');
      if ($this->form_validation->run() == false) {
        $this->load->view('template/main',[
            'src' => 'module/siswa/changeKelas',
            'page' => 'Edit Kelas',
            'kelas' => $this->m_master->getKelas()->result(),
            'siswa' => $this->m_siswa->getAktif()->result()
        ]);    
      }else{
        $modifiedBy = $this->session->userdata('id');
        $modified_data = date('Y-m-d H:i:s');
        $params = [
            'kelas_id' => $post['kelas_id'],
            'modified_by' => $modifiedBy,
            'modified_date' => $modified_data
        ];
        $this->db->where('id_siswa', $post['id_siswa'])->update('siswa', $params);
        $this->session->set_flashdata('sukses', ' diubah');
        redirect('halaman/siswa/ganti-kelas', 'refresh');
      }
    }
    public function delete($id_siswa)
    {
        cekAdmin();
        $this->m_siswa->del($id_siswa);
        $this->session->set_flashdata('sukses','dihapus');
        redirect('halaman/siswa','refresh');
    }

  public function printpdf($id_siswa) 
  {
      cekAdmin();
      $data['row'] = $this->m_siswa->get($id_siswa)->row();
      $html = $this->load->view('module/dokumen/formreg',$data,true);
      $this->fungsi->pdfPrint($html,'Form daftar ulang',array(0,0,609.4488,935.433),'potrait');
  }
  
    public function export(){
    cekAdmin();
    $siswa = $this->m_siswa->get()->result();
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'NO');
    $sheet->setCellValue('B1', 'FOTO');
    $sheet->setCellValue('C1', 'NIS');
    $sheet->setCellValue('D1', 'NISN');
    $sheet->setCellValue('E1', 'NPSN TK');
    $sheet->setCellValue('F1', 'NIK');
    $sheet->setCellValue('G1', 'NAMA SISWA');
    $sheet->setCellValue('H1', 'KELAS');
    $sheet->setCellValue('I1', 'STATUS SISWA');
    $sheet->setCellValue('J1', 'ALAMAT SISWA');
    $sheet->setCellValue('K1', 'DUSUN');
    $sheet->setCellValue('L1', 'RT');
    $sheet->setCellValue('M1', 'RW');
    $sheet->setCellValue('N1', 'DESA');
    $sheet->setCellValue('O1', 'KECAMATAN');
    $sheet->setCellValue('P1', 'KABUPATEN');
    $sheet->setCellValue('Q1', 'PROVINSI');
    $sheet->setCellValue('R1', 'KODEPOS');
    $sheet->setCellValue('S1', 'TEMPAT LAHIR');
    $sheet->setCellValue('T1', 'TANGGAL LAHIR');
    $sheet->setCellValue('U1', 'AGAMA');
    $sheet->setCellValue('V1', 'UMUR');
    $sheet->setCellValue('W1', 'BERAT BADAN');
    $sheet->setCellValue('X1', 'TINGGI BADAN');
    $sheet->setCellValue('Y1', 'GOLONGAN DARAH');
    $sheet->setCellValue('Z1', 'PENYAKIT');
    $sheet->setCellValue('AA1', 'JENIS KELAMIN');
    $sheet->setCellValue('AB1', 'JUMLAH SAUDARA');
    $sheet->setCellValue('AC1', 'HOBI');
    $sheet->setCellValue('AD1', 'CITA-CITA');
    $sheet->setCellValue('AE1', 'ASAL SEKOLAH');
    $sheet->setCellValue('AF1', 'NAMA ASAL SEKOLAH');
    $sheet->setCellValue('AG1', 'KEADAAN STATUS');
    $sheet->setCellValue('AH1', 'NAMA AYAH');
    $sheet->setCellValue('AI1', 'KTP AYAH');
    $sheet->setCellValue('AJ1', 'PEKERJAAN AYAH');
    $sheet->setCellValue('AK1', 'PENDIDIKAN AYAH');
    $sheet->setCellValue('AL1', 'GAJI AYAH');
    $sheet->setCellValue('AM1', 'NAMA IBU');
    $sheet->setCellValue('AN1', 'KTP IBU');
    $sheet->setCellValue('AO1', 'PENDIDIKAN IBU');
    $sheet->setCellValue('AP1', 'PEKERJAAN IBU');
    $sheet->setCellValue('AQ1', 'GAJI IBU');
    $sheet->setCellValue('AR1', 'NO TELEPON');
    $sheet->setCellValue('AS1', 'TEMPAT TINGGAL');
    $sheet->setCellValue('AT1', 'WAKTU KE SEKOLAH');
    $sheet->setCellValue('AU1', 'JARAK KE SEKOLAH');
    $sheet->setCellValue('AV1', 'TEMPAT MANDI');
    $sheet->setCellValue('AW1', 'AIR MANDI');
    $sheet->setCellValue('AX1', 'AIR MINUM');
    $sheet->setCellValue('AY1', 'BANGUNAN RUMAH');
    $sheet->setCellValue('AZ1', 'PENERANGAN RUMAH');
    $sheet->setCellValue('BA1', 'NAMA WALI');
    $sheet->setCellValue('BB1', 'PENDIDIKAN WALI');
    $sheet->setCellValue('BC1', 'PEKERJAAN WALI');
    $sheet->setCellValue('BD1', 'GAJI WALI');
    $sheet->setCellValue('BE1', 'NO TELEPON WALI');
    
    $no=0;
    $baris=2;
    foreach ($siswa as $key) {
      $sheet->setCellValue('A'.$baris,$no++);
      if (file_exists('uploads/image/'.$key->foto)) {
          $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
          $drawing->setName('foto');
          $drawing->setPath('uploads/image/'.$key->foto);
          $drawing->setCoordinates('B'.$baris);
         $drawing->setHeight('30'); 
         $drawing->setWorksheet($sheet);
         $sheet->getRowDimension($baris)->setRowHeight(40);
      }
      /* $sheet->setCellValue('B'.$baris,$key->foto); */
      $sheet->setCellValue('C'.$baris,$key->nis);
      $sheet->setCellValue('D'.$baris,$key->nisn);
      $sheet->setCellValue('E'.$baris,$key->npsn);
      $sheet->setCellValue('F'.$baris,$key->nik_siswa);
      $sheet->setCellValue('G'.$baris,$key->nama_siswa);
      $sheet->setCellValue('H'.$baris,$key->nama_kelas);
      $sheet->setCellValue('I'.$baris,$key->status);
      $sheet->setCellValue('J'.$baris,$key->alamat_siswa);
      $sheet->setCellValue('K'.$baris,$key->dusun);
      $sheet->setCellValue('L'.$baris,$key->rt);
      $sheet->setCellValue('M'.$baris,$key->rw);
      $sheet->setCellValue('N'.$baris,$key->desa);
      $sheet->setCellValue('O'.$baris,$key->kecamatan);
      $sheet->setCellValue('P'.$baris,$key->kabupaten);
      $sheet->setCellValue('Q'.$baris,$key->provinsi);
      $sheet->setCellValue('R'.$baris,$key->kodepos);
      $sheet->setCellValue('S'.$baris,$key->tempat_lahir);
      $sheet->setCellValue('T'.$baris,$key->tanggal_lahir);
      $sheet->setCellValue('U'.$baris,$key->agama);
      $sheet->setCellValue('V'.$baris,$key->umur);
      $sheet->setCellValue('W'.$baris,$key->bb);
      $sheet->setCellValue('X'.$baris,$key->tb);
      $sheet->setCellValue('Y'.$baris,$key->gol_darah);
      $sheet->setCellValue('Z'.$baris,$key->penyakit);
      $sheet->setCellValue('AA'.$baris,$key->gender_siswa);
      $sheet->setCellValue('AB'.$baris,$key->jumlah_saudara);
      $sheet->setCellValue('AC'.$baris,$key->hobi);
      $sheet->setCellValue('AD'.$baris,$key->cita);
      $sheet->setCellValue('AE'.$baris,$key->asal_sekolah);
      $sheet->setCellValue('AF'.$baris,$key->nama_sekolah_asal);
      $sheet->setCellValue('AG'.$baris,$key->keadaan_status);
      $sheet->setCellValue('AH'.$baris,$key->nama_ayah);
      $sheet->setCellValue('AI'.$baris,$key->ktp_ayah);
      $sheet->setCellValue('AJ'.$baris,$key->job_ayah);
      $sheet->setCellValue('AK'.$baris,$key->pendidikan_ayah);
      $sheet->setCellValue('AL'.$baris,$key->gaji);
      $sheet->setCellValue('AM'.$baris,$key->nama_ibu);
      $sheet->setCellValue('AN'.$baris,$key->ktp_ibu);
      $sheet->setCellValue('AO'.$baris,$key->pendidikan_ibu);
      $sheet->setCellValue('AP'.$baris,$key->job_ibu);
      $sheet->setCellValue('AQ'.$baris,$key->gaji_ibu);
      $sheet->setCellValue('AR'.$baris,$key->no_hp);
      $sheet->setCellValue('AS'.$baris,$key->tempat_tinggal);
      $sheet->setCellValue('AT'.$baris,$key->waktu);
      $sheet->setCellValue('AU'.$baris,$key->jarak_sekolah);
      $sheet->setCellValue('AV'.$baris,$key->tempat_mandi);
      $sheet->setCellValue('AW'.$baris,$key->air_mandi);
      $sheet->setCellValue('AX'.$baris,$key->air_minum);
      $sheet->setCellValue('AY'.$baris,$key->bangunan);
      $sheet->setCellValue('AZ'.$baris,$key->penerangan);
      $sheet->setCellValue('BA'.$baris,$key->nama_wali);
      $sheet->setCellValue('BB'.$baris,$key->pendidikan_wali);
      $sheet->setCellValue('BC'.$baris,$key->job_wali);
      $sheet->setCellValue('BD'.$baris,$key->gaji_wali);
      $sheet->setCellValue('BD'.$baris,$key->no_hp_wali);
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
        $fileName = 'import_'.date('Ymdi-His');
        $config['upload_path'] = 'uploads/dokumen/excel/'; 
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config); 
        if (!$this->upload->do_upload('import')) {
            echo $this->upload->display_errors();
            exit();
        }
        $upload = $this->upload->data();
        $fullPath = $upload['full_path'];
        $inputFileName = $fullPath;
       try {
           $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
           $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
           $loadExcel = $reader->load($inputFileName);
       } catch (Exception $e) {
           die('Error Loading File "'.pathinfo($inputFileName, PATHINFO_BASENAME).'" : '.$e->getMessage());
       }
        $sheetData = $loadExcel->getActiveSheet()->toArray();
        for ($i = 1; $i < count($sheetData); $i++) {
        if (!empty($sheetData[$i][0])) {
            $kelas = $this->m_master->getKelas()->result();
                foreach ($kelas as $key) {
                  if ($key->nama_kelas == $sheetData[$i][5]) {
                      $id = $key->id_kelas;
                    }
                }
            $data = [
                'nis' => $sheetData[$i][0],
                'nisn' => $sheetData[$i][1],
                'npsn' => $sheetData[$i][2],
                'nik_siswa' => $sheetData[$i][3],
                'nama_siswa' => $sheetData[$i][4],
                'kelas_id' => $id,
                'alamat_siswa' => $sheetData[$i][6], 
                'dusun' => $sheetData[$i][7],
                'rt' => $sheetData[$i][8],
                'rw' => $sheetData[$i][9],
                'desa' => $sheetData[$i][10],
                'kecamatan' => $sheetData[$i][11],
                'kabupaten' => $sheetData[$i][12],
                'provinsi' => $sheetData[$i][13],
                'kodepos' => $sheetData[$i][14],
                'tempat_lahir' => $sheetData[$i][15],
                'tanggal_lahir' => $sheetData[$i][16],
                'agama' => $sheetData[$i][17],
                'status' => $sheetData[$i][18],
                'umur' => $sheetData[$i][19],
                'bb' => $sheetData[$i][20],
                'tb' => $sheetData[$i][21],
                'gol_darah' => $sheetData[$i][22],
                'penyakit' => !empty($sheetData[$i][23]) ? $sheetData[$i][23] : null,
                'gender_siswa' => $sheetData[$i][24],
                'jumlah_saudara' => $sheetData[$i][25],
                'hobi' => $sheetData[$i][26],
                'cita' => $sheetData[$i][27],
                'asal_sekolah' => $sheetData[$i][28],
                'nama_sekolah_asal' => $sheetData[$i][29],
                'cara_kesekolah' => $sheetData[$i][30],
                'keadaan_status' => $sheetData[$i][31],
                'nama_ayah' => $sheetData[$i][32],
                'nama_ibu' => $sheetData[$i][33],
                'ktp_ayah' => $sheetData[$i][34],
                'ktp_ibu' => $sheetData[$i][35],
                'pendidikan_ayah' => $sheetData[$i][36],
                'pendidikan_ibu' => $sheetData[$i][37],
                'job_ayah' => $sheetData[$i][38],
                'job_ibu' => $sheetData[$i][39],
                'gaji' => $sheetData[$i][40],
                'gaji_ibu' => $sheetData[$i][41],
                'no_hp' => $sheetData[$i][42],
                'tempat_tinggal' => $sheetData[$i][43],
                'waktu' => $sheetData[$i][44],
                'jarak_sekolah' => $sheetData[$i][45],
                'tempat_mandi' => $sheetData[$i][46],
                'air_mandi' => $sheetData[$i][47],
                'air_minum' => $sheetData[$i][48],
                'lantai' => $sheetData[$i][49],
                'bangunan' => $sheetData[$i][50],
                'penerangan' => $sheetData[$i][51],
                'nama_wali' => $sheetData[$i][52],
                'pendidikan_wali' => !empty($sheetData[$i][53]) ? $sheetData[$i][53] : null,
                'job_wali' => !empty($sheetData[$i][54]) ? $sheetData[$i][54] : null,
                'gaji_wali' => !empty($sheetData[$i][55]) ? $sheetData[$i][55] : null,
                'tahun_ajaran' => !empty($sheetData[$i][56]) ? $sheetData[$i][56] : null
            ]; 
            /* echo json_encode($data);die(); */ 
            $this->db->insert('siswa',$data);
            }
        }
        unlink($inputFileName);
        $this->session->set_flashdata('sukses', ' Diimport');
        redirect('halaman/siswa', 'refresh');
    }

    public function validasi()
    {
         // form data diri
        if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'guru') {
        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric|is_unique[siswa.nis]');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|numeric|is_unique[siswa.nisn]');
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
        $this->form_validation->set_rules('status', 'Status Siswa', 'required');
        }
        if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'guru' && $this->router->fetch_method() == 'edit' ) {
        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
        $this->form_validation->set_rules('status', 'Status Siswa', 'required');
        }
        if ($this->router->fetch_method() != 'edit') {
         if (empty($_FILES['foto']['name'])) {
           $this->form_validation->set_rules('foto','Foto', 'required'); 
            }
        }
        if ($this->router->fetch_method() == 'edit') {
            $this->form_validation->set_rules('npsn', 'NPSN TK', 'required|numeric');
        }
        $this->form_validation->set_rules('nik_siswa', 'NIK Siswa', 'required|numeric');
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
        $this->form_validation->set_rules('ktp_ayah', 'Ktp Ayah', 'required|numeric');
        $this->form_validation->set_rules('ktp_ibu', 'Ktp Ibu', 'required|numeric');
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
