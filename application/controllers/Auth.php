<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_user', 'users');
    }

    public function index(){
        // cekAlreadyLogin();
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->session->flashdata('');
            $this->load->view('module/auth/login');
        }else {
            $this->proses();
        }
        
    }
    
    private function proses(){
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            
            $query = $this->users->login($post);
            //   cek user
            if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->is_active == 1) {
                 $params = array(
                'id' => $row->id,
                'level' => $row->level
            );
            // echo json_encode($row);die();
            $this->session->set_userdata($params);
            }
            // cek jika sudah login
            if($this->session->userdata('logged_in')) redirect(base_url('dashboard'));
            // login dengan role siswa
            if ($this->session->userdata('level') == 'siswa') {
                redirect('ppdb','refresh');
            }
            // login dengan role admin atau petugas
            $this->session->set_flashdata('sukses', 'Selamat data di pengelolahan data siswa');
            redirect('dashboard');
          }else {
            $this->session->set_flashdata('gagal', 'username / pass tidak valid atau sudah tidak aktif silahkan hubungi admin');
              redirect('auth');   
          }
      }
    }

       public function register(){
        $this->form_validation->set_rules('nama' , 'Nama', 'required');
        $this->form_validation->set_rules('username' , 'Username', 'required');
        $this->form_validation->set_rules('password' , 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->session->flashdata('gagal','harus di isi');
        $this->load->view('module/auth/register');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->users->register($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sukses', 'registrasi berhasil silahkan login');
                redirect('auth','refresh');
            }
        }
        
    }

    public function logout(){
        $params = array('id','level');
        $this->session->unset_userdata($params);
        redirect('auth');
    }
}