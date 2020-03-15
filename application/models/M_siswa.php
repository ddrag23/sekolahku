<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model
{

    public function get($id_siswa = null){
        $this->db->from('siswa');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        $this->db->join('status', 'status.id_status = siswa.status_id', 'left');
        $this->db->where('status_id', '1');
        if($id_siswa != null){
            $this->db->where('id_siswa',$id_siswa);
        }
        return $this->db->get();
    }
      public function getAktif()
    {
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->join('status', 'status.id_status = siswa.status_id', 'left');
        $this->db->where('status_id', '1');
        return $this->db->get('siswa');
    }
    public function getMutasi()
    {
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->join('status', 'status.id_status = siswa.status_id', 'left');
        $this->db->where('status_id', '2');
        return $this->db->get('siswa');
    }
    public function getAlumni()
    {
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->join('status', 'status.id_status = siswa.status_id', 'left');
        $this->db->where('status_id', '3');
        return $this->db->get('siswa');
    }
  
    public function add($post)
    {
        $created_by = $this->session->userdata('id');
        $created = date('Y-m-d H:i:s');
        $params = array(
            'nama_siswa' => $post['nama'],
            'nis' => $post['nis'],
            'alamat_siswa' => $post['alamat'],
            'no_hp' => $post['nomor'],
            'kelas_id' => $post['kelas'],
            'status_id' => 1,
            'date_created' => $created,
            'created_by' => $created_by
        );
        $this->db->insert('siswa', $params);
    }
    public function edit($post)
    {
        $modifBy = $this->session->userdata('id');
        $modified = date('Y-m-d H:i:s');
          $params = array(
            'nama_siswa' => $post['nama'],
            'nis' => $post['nis'],
            'alamat_siswa' => $post['alamat'] != "" ? $post['alamat'] : null,
            'no_hp' => $post['nomor'],
            'status_id' => $post['status'],
            'kelas_id' => $post['kelas'],
            'modified_by' => $modifBy,
            'modified_created' => $modified 
        );

        $this->db->where('id_siswa', $post['id']);
        $this->db->update('siswa', $params);
    }
    public function del($id)
    {
        $this->db->where('id_siswa', $id);
        $this->db->delete('users');
    }
   
}
