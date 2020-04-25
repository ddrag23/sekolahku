<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model
{

    public function get($id_siswa = null){
        $this->db->from('siswa');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        if($id_siswa != null){
            $this->db->where('id_siswa',$id_siswa);
        }
        return $this->db->get();
    }
      public function getAktif()
    {
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->where('status', 'aktif');
        return $this->db->get('siswa');
    }
    public function getMutasi()
    {
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->where('status', 'mutasi');
        return $this->db->get('siswa');
    }
    public function getAlumni()
    {
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->where('status', 'alumni');
        return $this->db->get('siswa');
    }
  
    public function add($post)
    {
        $created_by = $this->session->userdata('id');
        $created    = date('Y-m-d H:i:s');
        $data       = array(
            'username'  => htmlspecialchars($post['nis']),
            'password'  => htmlspecialchars(sha1($post['nis'])),
            'level'     => 'user',
            'is_active' => '1',
         );
        $this->db->insert('users', $data);
        $usersId = $this->db->insert_id();
        $params  = array(
            'users_id'          => !empty($post['users_id']) ? $post['users_id'] : $usersId,
            'foto'              => uploader('item','image/', 'png|jpg|jpeg', '2048', 'foto'),
            'nis'               => $post['nis'],
            'kelas_id'          => $post['kelas_id'],
            'guru_id'           => $post['guru_id'],
            'nama_siswa'        => $post['nama_siswa'],
            'alamat_siswa'      => $post['alamat_siswa'],
            'tempat_lahir'      => $post['tempat_lahir'],
            'tanggal_lahir'     => $post['tanggal_lahir'],
            'status'            => $post['status'],
            'agama'             => $post['agama'],
            'umur'              => $post['umur'],
            'bb'                => $post['bb'],
            'tb'                => $post['tb'],
            'gol_darah'         => $post['gol_darah'],
            'penyakit'          => $post['penyakit'],
            'gender_siswa'      => $post['gender_siswa'],
            'jumlah_saudara'    => $post['jumlah_saudara'],
            'asal_sekolah'      => $post['asal_sekolah'],
            'nama_sekolah_asal' => $post['nama_sekolah_asal'],
            'keadaan_status'    => $post['keadaan_status'],
            'nama_ayah'         => $post['nama_ayah'],
            'nama_ibu'          => $post['nama_ibu'],
            'ktp_ayah'          => $post['ktp_ayah'],
            'ktp_ibu'           => $post['ktp_ibu'],
            'pendidikan_ayah'   => $post['pendidikan_ayah'],
            'pendidikan_ibu'    => $post['pendidikan_ibu'],
            'job_ayah'          => $post['job_ayah'],
            'job_ibu'           => $post['job_ibu'],
            'gaji'              => $post['gaji'],
            'no_hp'             => $post['no_hp'],
            'waktu'             => $post['waktu'],
            'jarak_sekolah'     => $post['jarak_sekolah'],
            'cara_kesekolah'    => $post['cara_kesekolah'],
            'tempat_tinggal'    => $post['tempat_tinggal'],
            'tempat_mandi'      => $post['tempat_mandi'],
            'air_mandi'         => $post['air_mandi'],
            'air_minum'         => $post['air_minum'],
            'bangunan'          => $post['bangunan'],
            'lantai'            => $post['lantai'],
            'penerangan'        => $post['penerangan'],
            'nama_wali'         => $post['nama_wali'],
            'pendidikan_wali'   => $post['pendidikan_wali'],
            'job_wali'          => $post['job_wali'],
            'date_created'      => $created,
            'created_by'        => $created_by
        );
        
        $this->db->insert('siswa', $params);
    }
    public function edit($post)
    {
        return uploader('item','image/', 'png|jpg|jpeg', '2048', 'foto');
        $modifBy  = $this->session->userdata('id');
        $modified = date('Y-m-d H:i:s');
          $params = array(
            'users_id'          => !empty($post['users_id']) ? $post['users_id'] : null,
            'foto'              => uploader('item','image/', 'png|jpg|jpeg', '2048', 'foto'),
            'kelas_id'          => $post['kelas_id'],
            'guru_id'           => $post['guru_id'],
            'nis'               => $post['nis'],
            'nama_siswa'        => $post['nama_siswa'],
            'alamat_siswa'      => $post['alamat_siswa'],
            'tempat_lahir'      => $post['tempat_lahir'],
            'tanggal_lahir'     => $post['tanggal_lahir'],
            'status'            => $post['status'],
            'agama'             => $post['agama'],
            'umur'              => $post['umur'],
            'bb'                => $post['bb'],
            'tb'                => $post['tb'],
            'gol_darah'         => $post['gol_darah'],
            'penyakit'          => $post['penyakit'],
            'gender_siswa'      => $post['gender_siswa'],
            'jumlah_saudara'    => $post['jumlah_saudara'],
            'asal_sekolah'      => $post['asal_sekolah'],
            'nama_sekolah_asal' => $post['nama_sekolah_asal'],
            'keadaan_status'    => $post['keadaan_status'],
            'nama_ayah'         => $post['nama_ayah'],
            'nama_ibu'          => $post['nama_ibu'],
            'ktp_ayah'          => $post['ktp_ayah'],
            'ktp_ibu'           => $post['ktp_ibu'],
            'pendidikan_ayah'   => $post['pendidikan_ayah'],
            'pendidikan_ibu'    => $post['pendidikan_ibu'],
            'job_ayah'          => $post['job_ayah'],
            'job_ibu'           => $post['job_ibu'],
            'gaji'              => $post['gaji'],
            'no_hp'             => $post['no_hp'],
            'waktu'             => $post['waktu'],
            'jarak_sekolah'     => $post['jarak_sekolah'],
            'cara_kesekolah'    => $post['cara_kesekolah'],
            'tempat_tinggal'    => $post['tempat_tinggal'],
            'tempat_mandi'      => $post['tempat_mandi'],
            'air_mandi'         => $post['air_mandi'],
            'air_minum'         => $post['air_minum'],
            'bangunan'          => $post['bangunan'],
            'lantai'            => $post['lantai'],
            'penerangan'        => $post['penerangan'],
            'nama_wali'         => $post['nama_wali'],
            'pendidikan_wali'   => $post['pendidikan_wali'],
            'job_wali'          => $post['job_wali'],
            'modified_by'       => $modifBy,
            'modified_created'  => $modified
        );
        $this->db->where('id_siswa', $post['id_siswa']);
        $this->db->update('siswa', $post);
    }
    public function del($id_siswa)
    {
        $this->db->where('id_siswa', $id_siswa);
        $this->db->delete('siswa');
    }
   
}
