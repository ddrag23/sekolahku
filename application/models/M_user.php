<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{
     // start datatables
    var $column_order = array(null, 'username', 'email', 'notelp', 'level', 'is_active'); //set column field database for datatable orderable
    var $column_search = array('username', 'email', 'notelp', 'level', 'is_active'); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order
    // db datatable level user
    private function _get_datatables_query_user() {
        $this->db->select('id, username, email, notelp, level, is_active');
        $this->db->from('users');
        $this->db->where('level', 'user');
        $i = 0;
        foreach ($this->column_search as $user) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($user, $_POST['search']['value']);
                } else {
                    $this->db->or_like($user, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_user() {
        $this->_get_datatables_query_user();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_user() {
        $this->_get_datatables_query_user();
        $query = $this->db->get();
        return $query->num_rows();
    }
    // db datatable level user
    function count_all() {
        $this->db->from('users');
        return $this->db->count_all_results();
    }
    // end datatables
    public function login($post){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', htmlspecialchars($post['username']));
        $this->db->where('password', htmlspecialchars(sha1($post['password'])));
        $this->db->where('is_active','1');
        return $this->db->get();
    }
    public function getSeleksi($id){
      $this->db->select('id_ppdb');
      $this->db->from('ppdb');
      $this->db->where('user_id', $id);
      return $this->db->get();
    }
    public function getNilai($id){
        $this->db->join('ppdb', 'ppdb.id_ppdb = nilai.ppdb_id ');
        $this->db->where('ppdb_id',$id);
        return $this->db->get('nilai');
    }
    public function getSessIdSiswa($id){
        $this->db->select('id_siswa');
        $this->db->from('siswa');
        $this->db->where('users_id', $id);
        return $this->db->get();
    }
    public function register($post)
    {
        $created = date('Y-m-d H:i:s');
        $params = array(
            'username' => $post['username'],
            'password' => sha1($post['password']),
            'email' => $post['email'],
            'notelp' => $post['notelp'],
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

    public function getAdmin()
    {
        $this->db->where('level', 'admin');
        return $this->db->get('users');
    }

    public function getPanitia()
    {
       return $this->db->where('level', 'guru')->get('users'); 
    }
    public function getUser()
    {
        return $this->db->where('level', 'user')->get('users');
    }
    public function add($post)
    {
        $created_by = $this->session->userdata('id');
        $created = date('Y-m-d H:i:s');
        $params = array(
            'username' => htmlspecialchars($post['username']),
            'password' => sha1($post['password']),
            'email' => $post['email'],
            'notelp' => $post['notelp'],
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
            'email' => $post['email'],
            'notelp' => $post['notelp'],
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
