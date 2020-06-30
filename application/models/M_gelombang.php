<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gelombang extends CI_Model
{
    public function get()
    {
        return $this->db->get('gelombang');
    }
    
    public function insert($post)
    {
        $created_by = $this->session->userdata('id');
        $created = date('Y-m-d H:i:s') ;
        
        $params = [
            'sesi_gelombang' => $post['sesi_gelombang'],
            'awal' => $post['awal'],
            'akhir' => $post['akhir'],
            'biaya' => $post['biaya'],
            'tahun_ajaran' => $post['tahun_ajaran'],
            'created_by' => $created_by,
            'date_created' => $created
        ];
        $this->db->insert('gelombang', $params);
    }
    public function delete($id_gelombang)
    {
        $this->db->delete('gelombang', ['id_gelombang' => $id_gelombang]);
    }
}
