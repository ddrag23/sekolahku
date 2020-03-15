<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
		cekNotLogin();
		$this->load->model('m_user');
    }

    public function index(){
    	$data['query'] = $this->m_user->get()->result();
        $data['page'] = 'Users';
        $data['src'] = 'module/users/listUser';
        $this->load->view('template/main', $data);
    }
    public function add()
    {
    	$this->form_validation->set_rules('nama', 'Nama', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
    	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
    	$this->form_validation->set_rules('nmr_induk', 'Nomor Induk', 'required|min_length[1]|is_unique[users.nmr_induk]');
    	$this->form_validation->set_rules('nomor', 'Nomor Telepon', 'required');
    	$this->form_validation->set_rules('level', 'Level', 'required');
    	$this->form_validation->set_message('required', '%s field tidak boleh kosong');
    	$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
    	$this->form_validation->set_message('is_unique', '{field} sudah terpakai');
    	$this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');
    	 if ($this->form_validation->run() == FALSE)
                {
			    	$data['page'] = 'Tambah User';
			    	$data['src'] = 'module/users/addUser';
			    	$this->load->view('template/main', $data);
                }
                else
                {
                	$post = $this->input->post(null, TRUE);
                	$this->m_user->add($post);
                	if ($this->db->affected_rows() > 0) {
                		$this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
                	}
                	$this->session->set_flashdata('gagal', 'data gagal ditambkan');
                	redirect('user/add','refresh');
                }
    	
    }
    public function edit($id)
    {
    	$this->form_validation->set_rules('nama', 'Nama', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        // validasi pass jika terisi
        if ($this->input->post('password')) {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
       
        }
        if ($this->input->post('passconf')) {
        $this->form_validation->set_rules('passconf', 'Konfirmasi password', 'min_length[5]|matches[password]', array('matches' => '%s tidak sesuai dengan password' ));
        }
    	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
    	$this->form_validation->set_rules('nomor', 'Nomor Telepon', 'required|numeric');
    	$this->form_validation->set_rules('level', 'Level', 'required');
        // set message opsi validation
    	$this->form_validation->set_message('required', '%s field tidak boleh kosong');
        $this->form_validation->set_message('numeric', '%s harus menggunakan angka');
    	$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
    	$this->form_validation->set_message('is_unique', '{field} sudah terpakai');
    	$this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');

    	 if ($this->form_validation->run() == FALSE)
                {
                    $query = $this->m_user->get($id);
                    if ($query->num_rows() > 0) {
                        $data['query'] = $query->row();
                        $data['page'] = 'Edit User';
                        $data['src'] = 'module/users/editUser';
                        $this->load->view('template/main', $data);    
                    }else{
                        show_404();
                    }
			    	
                }else{
                	$post = $this->input->post(null, TRUE);
                	$this->m_user->edit($post);
                    // echo json_encode($post);
                    // die();
                	if ($this->db->affected_rows() > 0) {
                		$this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
                	}
                	$this->session->set_flashdata('gagal', 'data gagal ditambkan');
                	redirect('user/edit/'.$id,'refresh');
                }
    }

    public function delete($id)
    {
        $this->m_user->del($id);
        $this->session->set_flashdata('hapus','Data berhasil dihapus');
        redirect('user','refresh');
    }
    public function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM users WHERE username = '$post[username]' AND id != '$post[id]' ");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} sudah terpakai');
            return FALSE;
        }else{
            return TRUE;
        }
    }
}