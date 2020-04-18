<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_master extends CI_Model
{
	public function getKelas($id_kelas = null)
	{
		$this->db->join('guru', 'guru.id_guru = kelas.guru_id', 'left');
		 if($id_kelas != null){
            $this->db->where('id_kelas',$id_kelas);
        }
		return $this->db->get('kelas');
	}
	public function save($post)
	{
		$created_by = $this->session->userdata('id');
		$created = date('Y-m-d H:i:s');
		$params= array(
			'nama_kelas' => $post['nama_kelas'],
			'guru_id' => !empty($post['guru_id']) ? $post['guru_id'] : null,
			'created_by' => $created_by,
			'date_created' => $created
		);
		$this->db->insert('kelas', $params);
	}
	public function edit($post)
	{
		$modifBy = $this->session->userdata('id');
        $modified = date('Y-m-d H:i:s');
        $params = [
        	'nama_kelas' => $post['nama_kelas'],
        	'guru_id' => !empty($post['guru_id']) ? $post['guru_id'] : null
        ];
        $this->db->where('id_kelas', $post['id_kelas']);
        $this->db->update('kelas', $params);
	}
	 public function del($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        $this->db->delete('kelas');
    }
    // end kelas
   // start guru
    public function getGuru($id_guru = null)
	{
		if ($id_guru != null) {
			$this->db->where('id_guru', $id_guru);
		}
		return $this->db->get('guru');
	}
	public function addGuru($post)
	{
		$created_by = $this->session->userdata('id');
		$created = date('Y-m-d H:i:s');
		$params = [
			'nip' => $post['nip'],
			'nama_guru' => $post['nama_guru'],
			'alamat_guru' => $post['alamat_guru'],
			'gender_guru' => $post['gender_guru'],
			'no_hp_guru' => $post['no_hp_guru'],
			'created_by' => $created_by,
			'date_created' => $created
		];
		$this->db->insert('guru', $params);
	}
	public function editGuru($post)
	{
		$modifBy = $this->session->userdata('id');
        $modified = date('Y-m-d H:i:s');
        $params = [
        	'nip' => $post['nip'],
			'nama_guru' => $post['nama_guru'],
			'alamat_guru' => $post['alamat_guru'],
			'gender_guru' => $post['gender_guru'],
			'no_hp_guru' => $post['no_hp_guru'],
			'modified_by' => $modifBy,
			'modified_date' => $modified
        ];
        $this->db->where('id_guru', $post['id_guru']);
        $this->db->update('guru', $params);
	}
	 public function delGuru($id_guru)
    {
        $this->db->where('id_guru', $id_guru);
        $this->db->delete('guru');
    }
}