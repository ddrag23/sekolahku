<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cekNotLogin();
		cekAdmin();
		$this->load->model('m_master');

	}
	public function index()
	{
		$this->load->view('template/main', [
			"src" => "module/master/listkelas",
			"page" => "Data Kelas",
			"query" => $this->m_master->getKelas()->result()
		]);
	}
	public function guru()
	{
		$this->load->view('template/main',[
			"src" => "module/guru/listguru",
			"page" => "Data guru",
			"query" => $this->m_master->getGuru()->result()
		]);
	}
	public function addKelas()
	{
		$params = new StdClass();
		$params->nama_kelas = null;
		$params->guru_id = null;
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'trim|required');
		$this->form_validation->set_rules('guru_id', 'Nama Guru', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/main', [
				"src" => "module/master/formkelas",
				"page" => "Tambah Kelas",
				"submit" => "save",
				"query" => $params,
				"guru" => $this->m_master->getGuru()->result()
			]);
		} else {
			$this->proses();
		}
	}
	public function edit($id_kelas)
	{
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'trim|required');
		$this->form_validation->set_rules('guru_id', 'Nama Guru', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$query = $this->m_master->getKelas($id_kelas);
			if ($query->num_rows() > 0) {
				$this->load->view('template/main', [
					"src" => "module/master/formkelas",
					"page" => ucfirst("edit data kelas"),
					"query" => $query->row(),
					"submit" => "edit",
					"guru" => $this->m_master->getGuru()->result()
				]);
			}			
			} else {
				$this->proses();
			}
	
	}
	public function delete($id_kelas)
	{
		$this->m_master->del($id_kelas);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect('master','refresh');
	}
	// end fungsi kelas
	// start fungsi guru
	public function addGuru()
	{
		$params = new StdClass();
		$params->nip = null;
		$params->alamat_guru = null;
		$params->nama_guru = null;
		$params->no_hp_guru = null;
		$params->gender_guru = null;
		$this->validasi();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/main', [
				"src" => "module/guru/formguru",
				"page" => ucfirst("tambah data guru"),
				"submit" => "saveguru",
				"query" => $params
			]);
		} else {
			$this->proses();
		}
	}
	public function editGuru($id_guru)
	{
		$this->validasi();
		if ($this->form_validation->run() == FALSE) {
			$query = $this->m_master->getGuru($id_guru);
			if ($query->num_rows() > 0) {
				$this->load->view('template/main', [
					"src" => "module/guru/formguru",
					"page" => ucfirst("edit data Guru"),
					"query" => $query->row(),
					"submit" => "editguru"
				]);
			}			
			} else {
				$this->proses();
			}
	}

  public function import(){
    $config['upload_path'] = 'uploads/dokumen/';
    $config['allowed_types'] = 'xlsx|xls|csv';
    $config['remove_spaces'] = true; 
    $this->load->library('upload', $config);
    $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
    if ($this->form_validation->run() == false) {
      $this->index();
    }else{

      if ($this->upload->do_upload('fileURL')) {
        $upload_data = $this->upload->data();
        /* $fileName = $upload_data['file_name']; //nama file */
        $fileType = $upload_data['file_ext'];
        $inputFileName = $upload_data['full_path'];

        //membaca ekstensi
        if ($fileType == 'csv') {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } elseif ($fileType== 'xlsx') {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }else{
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }
        
        //load excel file
        $spreadsheet = $reader->load($inputFileName);
        $sheetdata = $spreadsheet->getActiveSheet()->toArray();
        
        //menghitung baris jumlah yang ada
        $arrCount = count($sheetdata);
        $flag = 0;

        $createArr = ['Nip', 'Nama','Jenis Kelamin','Alamat Guru','No Hp'];
        $makeArr = ['Nip'=> 'Nip', 'Nama' => 'Nama', 'Jenis Kelamin' => 'Jenis Kelamin', 'Alamat Guru'=>'Alamat Guru', 'No Hp'=>'No Hp'];
        $sheetDataKey = [];
        foreach ($sheetdata as $dataInSheet) {
          foreach ($dataInSheet as $key => $value) {
            if (in_array(trim($value), $createArr)) {
              $value = preg_replace('/\s+/', '', $value);
              $SheetDataKey[trim($value)] = $key;
            }
          }
        }

        $dataDiff = array_diff_key($makeArr, $sheetDataKey);
        if (empty($dataDiff)) {
          $flag = 1;
        }
        // match excel sheet column
        if($flag == 1){
           for ($i = 1; $i < $arrCount; $i++) {
            $nip = $sheetDataKey['Nip'];
            $nama = $sheetDataKey['Nama'];
            $gender = $sheetDataKey['Jenis Kelamin'];
            $alamat = $sheetDataKey['Alamat Guru'];
            $nohp = $sheetDataKey['No Hp'];

            $nip = filter_var(trim($sheetdata[$i][$nip]), FILTER_SANITIZE_STRING);
            $nama = filter_var(trim($sheetdata[$i][$nama]), FILTER_SANITIZE_STRING);
            $gender = filter_var(trim($sheetdata[$i][$gender]), FILTER_SANITIZE_STRING);
            $alamat = filter_var(trim($sheetdata[$i][$alamat]), FILTER_SANITIZE_STRING);
            $nohp = filter_var(trim($sheetdata[$i][$nohp]), FILTER_SANITIZE_STRING);

            $fetcdata[] = array(
             'nip' => $nip,
             'nama_guru' => $nama,
             'alamat_guru' => $alamat,
             'gender_guru' => $gender,
             'no_hp_guru' => $nohp
            );
           }
           $data['dataInfo'] = $fetcdata;
           $this->m_master->setBatchImport($fetcdata);
           $this->m_master->importData();
        }
      }else{
      
      }
    }
  }
	public function proses()
	{
		$post = $this->input->post(null, true);
		if (isset($_POST['save'])) {
			$this->m_master->save($post);
		}elseif (isset($post['edit'])) {
			$this->m_master->edit($post);
		}elseif (isset($post['saveguru'])) {
			$this->m_master->addGuru($post);
		}elseif (isset($post['editguru'])) {
			$this->m_master->editGuru($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'data berhasil disimpan');
		}
		redirect('master','refresh');
	}
	private function validasi()
	{
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
			$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'trim|required');
			$this->form_validation->set_rules('alamat_guru', 'Alamat Guru', 'trim|required');
			$this->form_validation->set_rules('gender_guru', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('no_hp_guru', 'No Telepon', 'trim|required');
	}
	    // checkFileValidation
    public function checkFileValidation($string) {
      $file_mimes = array('text/x-comma-separated-values', 
        'text/comma-separated-values', 
        'application/octet-stream', 
        'application/vnd.ms-excel', 
        'application/x-csv', 
        'text/x-csv', 
        'text/csv', 
        'application/csv', 
        'application/excel', 
        'application/vnd.msexcel', 
        'text/plain', 
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      );
      if(isset($_FILES['fileURL']['name'])) {
            $arr_file = explode('.', $_FILES['fileURL']['name']);
            $extension = end($arr_file);
            if(($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)){
                return true;
            }else{
                $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }
    }
}
