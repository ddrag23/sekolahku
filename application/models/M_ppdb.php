<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_ppdb extends CI_Model
{
	public function get($id_ppdb = null){
        $this->db->from('ppdb');
        $this->db->join('users', 'users.id = ppdb.user_id', 'left');
        if($id_ppdb != null){
            $this->db->where('id_ppdb',$id_ppdb);
        }
        return $this->db->get();
    }
   public function add($post)
    {
        $this->db->trans_start();
        $created_by = $this->session->userdata('id');
        $created    = date('Y-m-d H:i:s');
        if ($this->session->userdata('level') == 'admin') {
            $data = array(
            'username'  => htmlspecialchars($post['username']),
            'password'  => htmlspecialchars(sha1($post['username'])),
            'level'     => 'user',
            'is_active' => '1',
         );
        $this->db->insert('users', $data);
        $usersId = $this->db->insert_id();
        }
        $params                    = array(
            'user_id'            => !empty($post['users_id']) ? $post['users_id'] : $usersId,
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
            'date_created'        => $created,
            'created_by'          => $created_by
        );

        $this->db->insert('ppdb', $params);
        $this->db->trans_complete();
    }
    public function edit($post)
    {
        $modifBy = $this->session->userdata('id');
        $modified = date('Y-m-d H:i:s');
          $params = array(
            'user_id'            => !empty($post['users_id']) ? $post['users_id'] : null,
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
            'modified_by'         => $modifBy,
            'date_modified'       => $$modified
          );
          // echo json_encode($params);
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
