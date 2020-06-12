<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model
{

    public function get($id_nilai = null)
    {
        $this->db->join('ppdb', 'ppdb.id_ppdb = nilai.ppdb_id');
        if ($id_nilai != null) {
            $this->db->where('id_nilai', $id_nilai);
        }
        $this->db->order_by('jum_nilai','DESC');
        return  $this->db->get('nilai');
    }

    public function getLulus()
    {
        $this->db->where('status_ppdb', 'lulus');
        return $this->db->get('nilai');
    }

    public function getTidakLulus()
    {
        $this->db->where('status_ppdb', 'tidak lulus');
        return $this->db->get('nilai');
    }

    public function save($post)
    {
        $created_by = $this->session->userdata('id');
        $created = date('Y:m:d H:i:s');
        $params = [
            'ppdb_id' => $post['ppdb_id'],
            'jum_nilai' => $post['jum_nilai'],
            'status_ppdb' => $post['status_ppdb'],
            'created_by' => $created_by,
            'date_created' => $created
        ];
        echo json_encode($params);
        die();
       $this->db->insert('nilai', $params); 
    }

    public function edit($post)
    {
        $modified_by = $this->session->userdata('id');
        $modified_created = date('Y:m:d H:i:s');
        $params = [
            'ppdb_id' => $post['ppdb_id'],
            'jum_nilai' => $post['jum_nilai'],
            'status_ppdb' => $post['status_ppdb'],
            'modified_by' => $modified_by,
            'modified_date' => $modified_created
        ];
        $this->db->where('id_nilai', $post['id_nilai']);
        $this->db->update('nilai',$params);
    }

    public function delete($id_nilai)
    {
        $this->db->where('id_nilai',$id_nilai);
        $this->db->delete('nilai');
    }

}
