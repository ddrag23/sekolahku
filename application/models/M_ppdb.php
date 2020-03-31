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
        $this->db->where('status', 'praaktif');
        if($id_siswa != null){
            $this->db->where('id_siswa',$id_siswa);
        }
        return $this->db->get();
    }
    public function add($post)
    {
        $created_by = $this->session->userdata('id');
        $created = date('Y-m-d H:i:s');
        $params = array(
            'users_id' => $post['users_id'],
            'nis' => $post['nis'],
            'nama_siswa' => $post['nama_siswa'],
            'alamat_siswa' => $post['alamat_siswa'],
            'tempat_lahir' => $post['tempat_lahir'],
            'tanggal_lahir' => $post['tanggal_lahir'],
            'status' => $post['status'],
            'umur' => $post['umur'],
            'bb' => $post['bb'],
            'tb' => $post['tb'],
            'gol_darah' => $post['gol_darah'],
            'gender_siswa' => $post['gender_siswa'],
            'jumlah_saudara' => $post['jumlah_saudara'],
            'asal_sekolah' => $post['asal_sekolah'],
            'keadaan_status' => $post['keadaan_status'],
            'nama_ayah' => $post['nama_ayah'],
            'nama_ibu' => $post['nama_ibu'],
            'ktp_ayah' => $post['ktp_ayah'],
            'ktp_ibu' => $post['ktp_ibu'],
            'pendidikan_ayah' => $post['pendidikan_ayah'],
            'pendidikan_ibu' => $post['pendidikan_ibu'],
            'job_ayah' => $post['job_ayah'],
            'job_ibu' => $post['job_ibu'],
            'gaji' => $post['gaji'],
            'no_hp' => $post['no_hp'],
            'waktu' => $post['waktu'],
            'jarak_sekolah' => $post['jarak_sekolah'],
            'tempat_mandi' => $post['tempat_mandi'],
            'air_mandi' => $post['air_mandi'],
            'air_minum' => $post['air_minum'],
            'bangunan' => $post['bangunan'],
            'lantai' => $post['lantai'],
            'penerangan' => $post['penerangan'],
            'nama_wali' => $post['nama_wali'],
            'job_wali' => $post['job_wali'],
            'date_created' => $created,
            'created_by' => $created_by
        );
        $this->db->insert('siswa', $params);
    }
}