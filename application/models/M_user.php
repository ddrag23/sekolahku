<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function login($post){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', htmlspecialchars($post['username']));
        $this->db->where('password', htmlspecialchars(sha1($post['password'])));
        $this->db->where('is_active','1');
        return $this->db->get();
    }
    public function getSeleksi($id){
      $this->db->select('id_ppdb,seleksi');
      $this->db->from('ppdb');
      $this->db->where('user_id', $id);
      return $this->db->get();
    }
    public function register($post)
    {
        $created = date('Y-m-d H:i:s');
        $params = array(
            'username' => $post['username'],
            'password' => sha1($post['password']),
            'level' => 'user',
            'is_active' => '1',
            'date_created' => $created
        );
        $this->db->insert('users', $params);
    }
    public function get($id = null){
        $this->db->from('users');
        if($id != null){
            $this->db->where('id',$id);
        }
        return $this->db->get();
    }
    public function add($post)
    {
        $created_by = $this->session->userdata('id');
        $created = date('Y-m-d H:i:s');
        $params = array(
            'username' => htmlspecialchars($post['username']),
            'password' => sha1($post['password']),
            'level' => $post['level'],
            'is_active' => $post['is_active'],
            'date_created' => $created,
            'created_by' => $created_by
        );
        $this->db->insert('users', $params);
    }
    public function edit($post)
    {
        $modifBy = $this->session->userdata('id');
        $modified = date('Y-m-d H:i:s');
          $params = array(
            'username' => htmlspecialchars($post['username']),
            'password' => empty($post['password']) ? null :  sha1($post['password']),
            'level' => $post['level'],
            'is_active' => $post['is_active'],
            'modified_by' => $modifBy,
            'modified_date' => $modified 
        );
        $this->db->where('id', $post['id']);
        $this->db->update('users', $params);
    }
    public function del($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}
