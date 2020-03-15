<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_ppdb extends CI_Model
{
	public function get($id_siswa = null){
        $this->db->from('siswa');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        $this->db->join('status', 'status.id_status = siswa.status_id', 'left');
        if($id_siswa != null){
            $this->db->where('id_siswa',$id_siswa);
        }
        return $this->db->get();
    }
    public function add($post)
    {
	$created_by = $this->session->userdata('id');
    	$created_by = $this->session->userdata('id');
        $created = date('Y-m-d H:i:s');
        $params = array(
        	'users_id' => $post['id'],
            'nama_siswa' => $post['nama'],
            'nis' => $post['nis'],
            'alamat_siswa' => $post['alamat'],
            'no_hp' => $post['nomor'],
            'kelas_id' => $post['kelas'],
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
     public function reg($post)
    {
        $pendaftar = $this->session->userdata('id');
    $created_by = $this->session->userdata('id');
        $created_by = $this->session->userdata('id');
        $created = date('Y-m-d H:i:s');
        $params = array(
            'users_id' => $pendaftar,
            'nama_siswa' => $post['nama'],
            'nis' => $post['nis'],
            'alamat_siswa' => $post['alamat'],
            'no_hp' => $post['nomor'],
            'kelas_id' => $post['kelas'],
            'date_created' => $created,
            'created_by' => $created_by
        );
        $this->db->insert('siswa', $params);
    }
}