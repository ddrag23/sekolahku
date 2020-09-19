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

    public function delete($id_pengumuman)
    {
        $this->db->delete('pengumuman',['id_pengumuman' => $id_pengumuman]);
    }

    public function getSettingPendaftaran($id = NULL)
    {
      if (empty($id)) {
        return $this->db->get('setting_pendaftaran');
      }else{
        return $this->db->get_where('setting_pendaftaran',['id' => $id]);
      }

    }

    public function updatedSettingPendaftaran($post)
    {
      $modified_by = $this->session->id;
      $modified = date('Y-m-d H:i:s');
      $params = [
        'jumlah_pendaftar' => $post['jumlah_pendaftar'],
        'status_pendaftaran' => $post['status_pendaftaran'],
        'modified_by' => $modified_by,
        'modified_date' => $modified
      ];
      $this->db->update('setting_pendaftaran',$params,['id' => $post['id']]);
    }
}
