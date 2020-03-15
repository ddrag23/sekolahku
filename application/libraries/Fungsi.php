<?php
class Fungsi 
{
    protected $ci;
    public function __construct(){
        $this->ci =& get_instance();
    }

    public function user_login(){
        $this->ci->load->model('m_user');
        $userId = $this->ci->session->userdata('id');
        $userData = $this->ci->m_user->get($userId)->row();
        return $userData;
    }
}
