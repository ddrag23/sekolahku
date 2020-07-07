<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengumuman extends CI_Model
{
    public function get()
    {
        return $this->db->get('pengumuman');
    }
    
    public function insert($post)
    {
        $created_by = $this->session->userdata('id');
        $created = date('Y-m-d H:i:s') ;
        
        $params = [
            'file_pengumuman' => $post['file_pengumuman'],
            'status_pengumuman' => $post['status_pengumuman'],
            'created_by' => $created_by,
            'date_created' => $created
        ];
        $this->db->insert('pengumuman', $params);
    }

    public function edit($post)
    {
        $modified_by = $this->session->userdata('id');
        $modified = date('Y-m-d H:i:s');
        $params = [
            'file_pengumuman' => $post['file_pengumuman'],
            'status_pengumuman' => $post['status_pengumuman'],
            'modified_by' => $modified_by,
            'modified_created' => $modified
        ];
        $this->db->update('pengumuman', $params);
    }
    public function delete($id_pengumuman)
    {
        $this->db->delete('pengumuman',['id_pengumuman' => $id_pengumuman]);
    }
}
