<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
		cekNotLogin();
        cekAdmin();
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
        $params = new StdClass();
        $params->id = null;
        $params->username = null;
        $params->password = null;
        $params->level = null;
        $params->is_active = null;
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|min_length[5]|matches[password]', array('matches' => '%s tidak sesuai dengan password '));
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_message('required', '%s field tidak boleh kosong');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
        $this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');

    	 if ($this->form_validation->run() == FALSE)
                {
			    	
			    	$this->load->view('template/main', [
                        "src" => "module/users/formUser",
                        "page" => "Tambah Data User",
                        "submit" => "add",
                        "query" => $params
                    ]);
                }
                else
                {
                	$this->proses();
                }
    	
    }
    public function edit($id)
    {
    	$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        // validasi pass jika terisi
        if ($this->input->post('password')) {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
       
        }
        if ($this->input->post('passconf')) {
        $this->form_validation->set_rules('passconf', 'Konfirmasi password', 'required|min_length[5]|matches[password]', array('matches' => '%s tidak sesuai dengan password' ));
        }
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
                        $this->load->view('template/main', [
                            "src" => "module/users/formUser",
                            "page" => "Edit Users",
                            "submit" => "edit",
                            "query" => $query->row()
                        ]);    
                    }else{
                        show_404();
                    }
			    	
                }else{
                	$this->proses();
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
    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->m_user->add($post);
        } else if(isset($_POST['edit'])) {
            $this->m_user->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
        } 
        redirect('user','refresh');
    }
}