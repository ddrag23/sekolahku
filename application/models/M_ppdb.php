<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_ppdb extends CI_Model
{
        // start datatables
    var $column_order = array(null, 'nama_ppdb', 'alamat_rumah_ppdb', 'no_hp_ppdb', 'gender_ppdb', 'sesi_gelombang','status_pembayaran'); //set column field database for datatable orderable
    var $column_search = array('nama_ppdb', 'nama_panggilan', 'nama_ortu_ppdb', 'no_hp_ppdb', 'gender_ppdb', 'status_pembayaran', 'sesi_gelombang'); //set column field database for datatable searchable
    var $order = array('id_ppdb' => 'asc'); // default order
 
    private function _get_datatables_query() {
        $this->db->select('id_ppdb, nama_ppdb, nama_panggilan, alamat_rumah_ppdb, no_hp_ppdb, gender_ppdb, sesi_gelombang, status_pembayaran');
        $this->db->from('ppdb');
        $this->db->join('users', 'users.id = ppdb.user_id', 'left');
        $i = 0;
        foreach ($this->column_search as $ppdb) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($ppdb, $_POST['search']['value']);
                } else {
                    $this->db->or_like($ppdb, $_POST['search']['value']);
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
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('ppdb');
        return $this->db->count_all_results();
    }
    // end datatables
	public function get($id_ppdb = null){
        $this->db->select('*');
        $this->db->from('ppdb');
        $this->db->join('users', 'users.id = ppdb.user_id', 'left');
        if($id_ppdb != null){
            $this->db->where('id_ppdb',$id_ppdb);
        }
        return $this->db->get();
    }
  public function get_where($id)
  {
    return $this->db->get_where('ppdb', ['id_ppdb' => $id]);
  }
   public function add($post)
    {
        $created_by = $this->session->userdata('id');
        $created    = date('Y-m-d H:i:s');
        if ($this->session->userdata('level') == 'admin') {
            $data = array(
            'username'  => htmlspecialchars($post['username']),
            'notelp'  => htmlspecialchars($post['no_hp_ppdb']),
            'email'  => htmlspecialchars($post['email']),
            'password'  => htmlspecialchars(sha1($post['username'])),
            'level'     => 'user',
            'is_active' => '1',
         );
        $this->db->insert('users', $data);
        }
        $usersId = $this->db->insert_id();
        $params                    = array(
            'user_id'             => !empty($post['user_id']) ? $post['user_id'] : $usersId,
            'nama_ppdb'           => $post['nama_ppdb'],
            'nama_panggilan'      => $post['nama_panggilan'],
            'gender_ppdb'         => $post['gender_ppdb'],
            'tempat_lahir_ppdb'   => $post['tempat_lahir_ppdb'],
            'tanggal_lahir_ppdb'  => $post['tanggal_lahir_ppdb'],
            'asal_sekolah_ppdb'   => $post['asal_sekolah_ppdb'],
            'alamat_sekolah_ppdb' => $post['alamat_sekolah_ppdb'],
            'alamat_rumah_ppdb'   => $post['alamat_rumah_ppdb'],
            'no_hp_ppdb'          => $post['no_hp_ppdb'],
            'nama_ortu_ppdb'      => $post['nama_ortu_ppdb'],
            'sesi_gelombang'      => $post['gelombang'],
            'status_pembayaran'   => !empty($post['status_pembayaran']) ? $post['status_pembayaran'] : null,
            'date_created'        => $created,
            'created_by'          => $created_by
        );
        $this->db->insert('ppdb', $params);
        if ($this->session->userdata('level') == 'user') {
        $id = $this->db->insert_id();
        $this->session->set_userdata('id_ppdb',$id );
        }

    }
    public function edit($post)
    {
        $modifBy = $this->session->userdata('id');
        $modified = date('Y-m-d H:i:s');
          $params = array(
            'user_id'             => !empty($post['user_id']) ? $post['user_id'] : $post['id'],
            'nama_ppdb'           => $post['nama_ppdb'],
            'nama_panggilan'      => $post['nama_panggilan'],
            'gender_ppdb'         => $post['gender_ppdb'],
            'tempat_lahir_ppdb'   => $post['tempat_lahir_ppdb'],
            'tanggal_lahir_ppdb'  => $post['tanggal_lahir_ppdb'],
            'asal_sekolah_ppdb'   => $post['asal_sekolah_ppdb'],
            'alamat_sekolah_ppdb' => $post['alamat_sekolah_ppdb'],
            'alamat_rumah_ppdb'   => $post['alamat_rumah_ppdb'],
            'no_hp_ppdb'          => $post['no_hp_ppdb'],
            'nama_ortu_ppdb'      => $post['nama_ortu_ppdb'],
            'status_pembayaran'   => $post['status_pembayaran'],
            'modified_by'         => $modifBy,
            'date_modified'       => $modified
          );
           /* echo json_encode($params); */
        /* die; */
        $this->db->where('id_ppdb', $post['id_ppdb']);
        $this->db->update('ppdb', $params);
    }

    
    public function delete($id_ppdb)
    {
      $this->db->trans_start();
      $this->db->delete('ppdb',['id_ppdb' => $id_ppdb]);
      $this->db->delete('users',['id' => 'user_id']);
      $this->db->trans_complete();
    }
    
}
