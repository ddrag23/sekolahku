<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        cekRoutes('auth');
        $this->load->model('m_user', 'users');
    }

    public function index(){
        cekAlreadyLogin();
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
        if ($this->session->logged_in) {
           redirect('halaman/dashboard');
        }
        if (isset($post['login'])) {
            $query = $this->users->login($post);
            //   cek user
            if ($query->num_rows() > 0) {
            $row = $query->row();
            $sessIdPpdb = $this->users->getSeleksi($row->id)->row();
            $sessIdSiswa = $this->users->getSessIdSiswa($row->id)->row();
            $nilai = $this->users->getNilai($sessIdPpdb->id_ppdb)->row();
            if ($row->is_active == 1) {
                 $params = array(
                'id' => $row->id,
                'id_ppdb' => $sessIdPpdb->id_ppdb,
                'id_siswa' => $sessIdSiswa->id_siswa,
                'level' => $row->level,
                'seleksi' => $nilai->status_ppdb,
                'logged_in' => 'logged_in'
            );
             /* echo json_encode($params);die(); */
            $this->session->set_userdata($params);
                if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'guru') {
                 $this->session->set_flashdata('sukses', 'Selamat Datang di Pengelolahan Data Siswa');
                 redirect('halaman/dashboard');
                } else if($this->session->level == 'kepala') {
                 $this->session->set_flashdata('sukses', 'Selamat datang Pendaftaran Peserta Didik Baru');
                 redirect('halaman/dashboard-kepala-sekolah');
                }else{
                  $this->session->set_flashdata('sukses', 'Selamat datang Pendaftaran Peserta Didik Baru');
                  redirect('halaman/ppdb');
                }
            }else{
                $this->session->set_flashdata('gagal', 'Akun anda sudah nonaktif, silahkan hubungi admin');
                redirect('halaman/login','refresh');
            }
            // cek jika sudah login
            // login dengan role admin atau petugas
          }else {
            $this->session->set_flashdata('gagal', 'username,  password anda tidak valid atau Akun anda sudah nonaktif, silahkan hubungi admin');
              redirect('halaman/login','refresh');
          }
      }
    }

       public function register(){
        cekAlreadyLogin();
        $this->form_validation->set_rules('username' , 'NPSN TK', 'required');
        $this->form_validation->set_rules('notelp' , 'Notelp', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|min_length[5]|matches[password]', array('matches' => '%s tidak sesuai dengan password '));

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->session->flashdata('gagal','harus di isi');
        $this->load->view('module/auth/register');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->users->register($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sukses', ' ditambahkan silahkan login');
                redirect('halaman/login','refresh');
            }
        }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('halaman/login','refresh');
    }
}
