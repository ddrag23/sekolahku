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
            $row[] = $siswa->nis.'<br>'.$siswa->nama_siswa.'<br>'.$siswa->gender_siswa.'<br>'.$siswa->alamat_siswa;
            $row[] = $siswa->no_hp;
            $row[] = $siswa->nama_kelas;
            $row[] = $siswa->status;
            $row[] = $siswa->tahun_ajaran;
            
            // add html for action
            $row[] = '<a href="'.site_url('siswa/printpdf/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Print Pdf"  class="btn btn-warning btn-xs"><i class="fa fa-print"></i></a>
            <a href="'.site_url('siswa/detail/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Edit Data Siswa" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> </a>
              <a href="'.site_url('siswa/edit/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Lihat Detail Siswa" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </a>
                   <a href="'.site_url('siswa/delete/'.$siswa->id_siswa).'" onclick="return confirm(\'Yakin hapus data?\')" data-toggle="tooltip"  data-placement="left" title="Hapus" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> </a>'
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
            $row[] = $siswa->nis.'<br>'.$siswa->nama_siswa.'<br>'.$siswa->gender_siswa.'<br>'.$siswa->alamat_siswa;
            $row[] = $siswa->no_hp;
            $row[] = $siswa->nama_kelas;
            $row[] = $siswa->status;
            $row[] = $siswa->tahun_ajaran;
            
            // add html for action
            $row[] = '<a href="'.site_url('siswa/printpdf/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Print Pdf"  class="btn btn-warning btn-xs"><i class="fa fa-print"></i></a>
            <a href="'.site_url('siswa/detail/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Edit Data Siswa" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> </a>
              <a href="'.site_url('siswa/edit/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Lihat Detail Siswa" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </a>
                   <a href="'.site_url('siswa/delete/'.$siswa->id_siswa).'" onclick="return confirm(\'Yakin hapus data?\')" data-toggle="tooltip"  data-placement="left" title="Hapus" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> </a>'
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
            $row[] = $siswa->nis.'<br>'.$siswa->nama_siswa.'<br>'.$siswa->gender_siswa.'<br>'.$siswa->alamat_siswa;
            $row[] = $siswa->no_hp;
            $row[] = $siswa->nama_kelas;
            $row[] = $siswa->status;
            $row[] = $siswa->tahun_ajaran;
            
            // add html for action
            $row[] = '<a href="'.site_url('siswa/printpdf/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Print Pdf"  class="btn btn-warning btn-xs"><i class="fa fa-print"></i></a>
            <a href="'.site_url('siswa/detail/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Edit Data Siswa" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> </a>
              <a href="'.site_url('siswa/edit/'.$siswa->id_siswa).'" data-toggle="tooltip" data-placement="left" title="Lihat Detail Siswa" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </a>
                   <a href="'.site_url('siswa/delete/'.$siswa->id_siswa).'" onclick="return confirm(\'Yakin hapus data?\')" data-toggle="tooltip"  data-placement="left" title="Hapus" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> </a>'
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

    public function delete($id_siswa)
    {
        cekAdmin();
        $this->m_siswa->del($id_siswa);
        $this->session->set_flashdata('sukses','dihapus');
        redirect('siswa','refresh');
    }

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
    $sheet->setCellValue('C1', 'NIS');
    $sheet->setCellValue('D1', 'NPSN TK');
    $sheet->setCellValue('E1', 'NIK');
    $sheet->setCellValue('F1', 'NAMA SISWA');
    $sheet->setCellValue('G1', 'KELAS');
    $sheet->setCellValue('H1', 'STATUS SISWA');
    $sheet->setCellValue('I1', 'ALAMAT SISWA');
    $sheet->setCellValue('J1', 'DUSUN');
    $sheet->setCellValue('K1', 'RT');
    $sheet->setCellValue('L1', 'RW');
    $sheet->setCellValue('M1', 'DESA');
    $sheet->setCellValue('N1', 'KECAMATAN');
    $sheet->setCellValue('O1', 'KABUPATEN');
    $sheet->setCellValue('P1', 'PROVINSI');
    $sheet->setCellValue('Q1', 'KODEPOS');
    $sheet->setCellValue('R1', 'TEMPAT LAHIR');
    $sheet->setCellValue('S1', 'TANGGAL LAHIR');
    $sheet->setCellValue('T1', 'AGAMA');
    $sheet->setCellValue('U1', 'UMUR');
    $sheet->setCellValue('V1', 'BERAT BADAN');
    $sheet->setCellValue('W1', 'TINGGI BADAN');
    $sheet->setCellValue('X1', 'GOLONGAN DARAH');
    $sheet->setCellValue('Y1', 'PENYAKIT');
    $sheet->setCellValue('Z1', 'JENIS KELAMIN');
    $sheet->setCellValue('AA1', 'JUMLAH SAUDARA');
    $sheet->setCellValue('AB1', 'HOBI');
    $sheet->setCellValue('AC1', 'CITA-CITA');
    $sheet->setCellValue('AD1', 'ASAL SEKOLAH');
    $sheet->setCellValue('AE1', 'NAMA ASAL SEKOLAH');
    $sheet->setCellValue('AF1', 'KEADAAN STATUS');
    $sheet->setCellValue('AG1', 'NAMA AYAH');
    $sheet->setCellValue('AH1', 'KTP AYAH');
    $sheet->setCellValue('AI1', 'PEKERJAAN AYAH');
    $sheet->setCellValue('AJ1', 'PENDIDIKAN AYAH');
    $sheet->setCellValue('AK1', 'GAJI AYAH');
    $sheet->setCellValue('AL1', 'NAMA IBU');
    $sheet->setCellValue('AM1', 'KTP IBU');
    $sheet->setCellValue('AN1', 'PENDIDIKAN IBU');
    $sheet->setCellValue('AO1', 'PEKERJAAN IBU');
    $sheet->setCellValue('AP1', 'GAJI IBU');
    $sheet->setCellValue('AQ1', 'NO TELEPON');
    $sheet->setCellValue('AR1', 'TEMPAT TINGGAL');
    $sheet->setCellValue('AS1', 'WAKTU KE SEKOLAH');
    $sheet->setCellValue('AT1', 'JARAK KE SEKOLAH');
    $sheet->setCellValue('AU1', 'TEMPAT MANDI');
    $sheet->setCellValue('AV1', 'AIR MANDI');
    $sheet->setCellValue('AW1', 'AIR MINUM');
    $sheet->setCellValue('AX1', 'BANGUNAN RUMAH');
    $sheet->setCellValue('AY1', 'PENERANGAN RUMAH');
    $sheet->setCellValue('AZ1', 'NAMA WALI');
    $sheet->setCellValue('BA1', 'PENDIDIKAN WALI');
    $sheet->setCellValue('BB1', 'PEKERJAAN WALI');
    $sheet->setCellValue('BC1', 'GAJI WALI');
    
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
      $sheet->setCellValue('D'.$baris,$key->npsn);
      $sheet->setCellValue('E'.$baris,$key->nik_siswa);
      $sheet->setCellValue('F'.$baris,$key->nama_siswa);
      $sheet->setCellValue('G'.$baris,$key->nama_kelas);
      $sheet->setCellValue('H'.$baris,$key->status);
      $sheet->setCellValue('I'.$baris,$key->alamat_siswa);
      $sheet->setCellValue('J'.$baris,$key->dusun);
      $sheet->setCellValue('K'.$baris,$key->rt);
      $sheet->setCellValue('L'.$baris,$key->rw);
      $sheet->setCellValue('M'.$baris,$key->desa);
      $sheet->setCellValue('N'.$baris,$key->kecamatan);
      $sheet->setCellValue('O'.$baris,$key->kabupaten);
      $sheet->setCellValue('P'.$baris,$key->provinsi);
      $sheet->setCellValue('Q'.$baris,$key->kodepos);
      $sheet->setCellValue('R'.$baris,$key->tempat_lahir);
      $sheet->setCellValue('S'.$baris,$key->tanggal_lahir);
      $sheet->setCellValue('T'.$baris,$key->agama);
      $sheet->setCellValue('U'.$baris,$key->umur);
      $sheet->setCellValue('V'.$baris,$key->bb);
      $sheet->setCellValue('W'.$baris,$key->tb);
      $sheet->setCellValue('X'.$baris,$key->gol_darah);
      $sheet->setCellValue('Y'.$baris,$key->penyakit);
      $sheet->setCellValue('Z'.$baris,$key->gender_siswa);
      $sheet->setCellValue('AA'.$baris,$key->jumlah_saudara);
      $sheet->setCellValue('AB'.$baris,$key->hobi);
      $sheet->setCellValue('AC'.$baris,$key->cita);
      $sheet->setCellValue('AD'.$baris,$key->asal_sekolah);
      $sheet->setCellValue('AE'.$baris,$key->nama_sekolah_asal);
      $sheet->setCellValue('AF'.$baris,$key->keadaan_status);
      $sheet->setCellValue('AG'.$baris,$key->nama_ayah);
      $sheet->setCellValue('AH'.$baris,$key->ktp_ayah);
      $sheet->setCellValue('AI'.$baris,$key->job_ayah);
      $sheet->setCellValue('AJ'.$baris,$key->pendidikan_ayah);
      $sheet->setCellValue('AK'.$baris,$key->gaji);
      $sheet->setCellValue('AL'.$baris,$key->nama_ibu);
      $sheet->setCellValue('AM'.$baris,$key->ktp_ibu);
      $sheet->setCellValue('AN'.$baris,$key->pendidikan_ibu);
      $sheet->setCellValue('AO'.$baris,$key->job_ibu);
      $sheet->setCellValue('AP'.$baris,$key->gaji_ibu);
      $sheet->setCellValue('AQ'.$baris,$key->no_hp);
      $sheet->setCellValue('AR'.$baris,$key->tempat_tinggal);
      $sheet->setCellValue('AS'.$baris,$key->waktu);
      $sheet->setCellValue('AT'.$baris,$key->jarak_sekolah);
      $sheet->setCellValue('AU'.$baris,$key->tempat_mandi);
      $sheet->setCellValue('AV'.$baris,$key->air_mandi);
      $sheet->setCellValue('AW'.$baris,$key->air_minum);
      $sheet->setCellValue('AX'.$baris,$key->bangunan);
      $sheet->setCellValue('AY'.$baris,$key->penerangan);
      $sheet->setCellValue('AZ'.$baris,$key->nama_wali);
      $sheet->setCellValue('BA'.$baris,$key->pendidikan_wali);
      $sheet->setCellValue('BB'.$baris,$key->job_wali);
      $sheet->setCellValue('BC'.$baris,$key->gaji_wali);
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
        $config['allowed_types'] = 'xls|xlsx|csv|ods';

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
        $sheetData = $loadExcel->getActiveSheet()->toArray(null,true,true,false);
        for ($i = 1; $i < count($sheetData); $i++) {
        if (!empty($sheetData[$i][0])) {
            $kelas = $this->m_master->getKelas()->result();
                foreach ($kelas as $key) {
                  if ($key->nama_kelas == $sheetData[$i][4]) {
                      $id = $key->id_kelas;
                    }
                }
            $data = [
                'nis' => $sheetData[$i][0],
                'npsn' => $sheetData[$i][1],
                'nik_siswa' => $sheetData[$i][2],
                'nama_siswa' => $sheetData[$i][3],
                'kelas_id' => $id,
                'alamat_siswa' => $sheetData[$i][5], 
                'dusun' => $sheetData[$i][6],
                'rt' => $sheetData[$i][7],
                'rw' => $sheetData[$i][8],
                'desa' => $sheetData[$i][9],
                'kecamatan' => $sheetData[$i][10],
                'kabupaten' => $sheetData[$i][11],
                'provinsi' => $sheetData[$i][12],
                'kodepos' => $sheetData[$i][13],
                'tempat_lahir' => $sheetData[$i][14],
                'tanggal_lahir' => $sheetData[$i][15],
                'agama' => $sheetData[$i][16],
                'status' => $sheetData[$i][17],
                'umur' => $sheetData[$i][18],
                'bb' => $sheetData[$i][19],
                'tb' => $sheetData[$i][20],
                'gol_darah' => $sheetData[$i][21],
                'penyakit' => $sheetData[$i][22],
                'gender_siswa' => $sheetData[$i][23],
                'jumlah_saudara' => $sheetData[$i][24],
                'hobi' => $sheetData[$i][25],
                'cita' => $sheetData[$i][26],
                'asal_sekolah' => $sheetData[$i][27],
                'nama_sekolah_asal' => $sheetData[$i][28],
                'cara_kesekolah' => $sheetData[$i][29],
                'keadaan_status' => $sheetData[$i][30],
                'nama_ayah' => $sheetData[$i][31],
                'nama_ibu' => $sheetData[$i][32],
                'ktp_ayah' => $sheetData[$i][33],
                'ktp_ibu' => $sheetData[$i][34],
                'pendidikan_ayah' => $sheetData[$i][35],
                'pendidikan_ibu' => $sheetData[$i][36],
                'job_ayah' => $sheetData[$i][37],
                'job_ibu' => $sheetData[$i][38],
                'gaji' => $sheetData[$i][39],
                'gaji_ibu' => $sheetData[$i][40],
                'no_hp' => $sheetData[$i][41],
                'tempat_tinggal' => $sheetData[$i][42],
                'waktu' => $sheetData[$i][43],
                'jarak_sekolah' => $sheetData[$i][44],
                'tempat_mandi' => $sheetData[$i][45],
                'air_mandi' => $sheetData[$i][46],
                'air_minum' => $sheetData[$i][47],
                'lantai' => $sheetData[$i][48],
                'bangunan' => $sheetData[$i][49],
                'penerangan' => $sheetData[$i][50],
                'nama_wali' => $sheetData[$i][51],
                'pendidikan_wali' => $sheetData[$i][52],
                'job_wali' => $sheetData[$i][53],
                'gaji_wali' => $sheetData[$i][54],
                'tahun_ajaran' => $sheetData[$i][55]
            ]; 
            /* echo json_encode($data);die(); */ 
            /* var_dump($data);die(); */  
            $this->db->insert('siswa',$data);
        }
         

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
