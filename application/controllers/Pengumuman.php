<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        cekNotLogin();
        cekAdmin();
        cekRoutes('pengumuman');
        $this->load->model(['m_gelombang', 'm_pengumuman']);
    }

    public function index()
    {
        $this->load->view('template/main', [
         'page' => 'Pengumuman',
         'src' => 'module/pengumuman/index',
         'gelombang' => $this->m_gelombang->get()->result(),
         'pengumuman' => $this->m_pengumuman->get()->result()
        ]);
    }

    public function add()
    {
        $config['upload_path'] = "uploads/dokumen/pdf/";
        $config['allowed_types'] = "pdf";
        $config['max_sizes'] = 4096;
        $config['file_name'] = "seleksi".date('Ymd');
        $post = $this->input->post(null, true);
        if(empty(@$_FILES['file_pengumuman']['name'])){
            $this->form_validation->set_rules('file_pengumuman', 'File', 'required');
        }
        $this->form_validation->set_rules('status_pengumuman', 'Status Pengumuman', 'trim|required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_error_delimiters('','');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/main', [
                'src' => 'module/pengumuman/formPengumuman',
                'page' => 'Tambah file pengumuman'
            ]);
        } else {
            $this->load->library('upload',$config);
            if ($this->upload->do_upload('file_pengumuman')) {
                $post['file_pengumuman'] = $this->upload->data('file_name');
                $this->m_pengumuman->insert($post);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('sukses', ' dimasukkan');
                }
                redirect('halaman/ppdb/pengumuman','refresh');
            }else{
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('halaman/ppdb/pengumuman/tambah');
            }
        }
    }

    public function delete($id_pengumuman)
    {
        $this->m_pengumuman->delete($id_pengumuman);
        $this->session->set_flashdata('sukses', ' dihapus');
        redirect('halaman/ppdb/pengumuman','refresh');
    }
}
