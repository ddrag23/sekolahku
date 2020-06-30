<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gelombang extends CI_Controller
{   
    public function __construct(){
        parent::__construct();
        cekNotLogin();
        cekAdmin();
        $this->load->model(['m_gelombang', 'm_pengumuman']);
    }

    public function index()
    {
        redirect('pengumuman','refresh');
    }

    public function add()
    {
        $this->form_validation->set_rules('sesi_gelombang', 'Sesi Gelombang', 'required');
        $this->form_validation->set_rules('awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('akhir', 'Tanggal Akhir', 'required');
        $this->form_validation->set_rules('biaya', 'biaya', 'required');
        $this->form_validation->set_message('required', '{field} harus tidak boleh kosong');
        $this->form_validation->set_error_delimiters('','');
        if ($this->form_validation->run() ==  FALSE) {

            $this->load->view('template/main', [
                'src' => 'module/pengumuman/formGelombang',
                'page' => 'Tambah data'
            ]);
        } else {
            $post = $this->input->post(null,true);
            $this->m_gelombang->insert($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', ' ditambah');
            }
            redirect('pengumuman','refresh');
        }

    }

    public function delete($id_gelombang)
    {
        $this->m_gelombang->delete($id_gelombang);
        $this->session->set_flashdata('sukses', ' dihapus');
        redirect('pengumuman','refresh');
    }
}
