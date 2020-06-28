<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        cekNotLogin();
        cekAdmin();
        $this->load->model('m_nilai');
        $this->load->model('m_ppdb');
    }

    public function index()
    {
        $this->load->view('template/main', [
         'page' => 'List Nilai',
         'src' => 'module/nilai/listNilai',
         'query' => $this->m_nilai->get()->result() 
        ]);
    }
    function get_ajax_nilai() {
        $list = $this->m_nilai->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $nilai) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $nilai->nama_ppdb;
            $row[] = $nilai->jum_nilai;
            $row[] = $nilai->status_ppdb;
            // add html for action
            $row[] = '<a href="'.site_url('nilai/edit/'.$nilai->id_nilai).'" data-toggle="tooltip" data-placement="left" title="Edit Data"  class="btn btn-success btn-xs"><i class="fa fa-edit"></i> </a>
                    <a href="'.site_url('nilai/del/'.$nilai->id_nilai).'" onclick="return confirm(\'Yakin hapus data?\')"  data-toggle="tooltip" data-placement="left" title="Hapus Data"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>';
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
    public function add()
    {
        $params = new StdClass();
        $params->id_nilai = null;
        $params->ppdb_id = null;
        $params->jum_nilai = null;
        $params->status_ppdb = null;
        
        $this->validasi();
        $this->form_validation->set_error_delimiters('','');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/main',[
                'page' => 'Masukkan Nilai',
                'src' => 'module/nilai/formnilai',
                'submit' => 'save',
                'query' => $params,
                'ppdb' => $this->m_ppdb->get()->result()
            ]);    
        } else {
            $this->proses();
        }
    }
    public function edit($id_nilai)
    {
        $this->validasi();
        if ($this->form_validation->run() == FALSE) {
            $query = $this->m_nilai->get($id_nilai);
            if ($query->num_rows() > 0) {
                $this->load->view('template/main', [
                    'src' => 'module/nilai/formnilai',
                    'page' => 'Edit Nilai',
                    'submit' => 'edit',
                    'query' => $query->row(),
                    'ppdb' => $this->m_ppdb->get()->result()
                ]);
            } else {
               show_404(); 
            }
        } else {
            $this->proses($id_nilai);
        }
    }

    public function del($id_nilai)
    {
       $this->m_nilai->delete($id_nilai); 
       $this->session->set_flashdata('sukses', 'Dihapus');
       redirect('nilai', 'refresh');
    }

    public function proses($id_nilai = null)
    {
        $post = $this->input->post(null, true);
        $id = $id_nilai != null ? $id_nilai : null;
        if (isset($post['save'])){
            $this->m_nilai->save($post);
        } elseif(isset($post['edit'])) {
            $this->m_nilai->edit($post);
        }
       if ($this->db->affected_rows() > 0) {
           $this->session->set_flashdata('sukses', ' Dimasukkan');
           redirect('nilai/'.$this->uri->segment(2).'/'.$id, 'refresh');
       }else{
       echo validation_errors();
       }
    } 

    public function validasi()
    {
        $this->form_validation->set_rules('ppdb_id', ' Nama Peserta', 'Required');
        $this->form_validation->set_rules('jum_nilai', 'Jumlah Nilai', 'Required');
        $this->form_validation->set_rules('status_ppdb', 'Hasil Seleksi', 'Required');
        $this->form_validation->set_error_delimiters('','');
    }
}
