<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model
{
        // start datatables
    var $column_order = array(null, 'foto', 'nis', 'nama_siswa', 'alamat_siswa', 'nama_kelas', 'status', 'tahun_ajaran'); //set column field database for datatable orderable
    var $column_search = array('nis', 'npsn', 'nama_siswa','nama_kelas','alamat_siswa','status','tahun_ajaran'); //set column field database for datatable searchable
    var $order = array('id_siswa' => 'asc'); // default order
    //db get siswa aktif
    private function _get_datatables_query_aktif() {
        $this->db->select('id_siswa,nis, foto, npsn, nama_siswa, nama_kelas, alamat_siswa, status, tahun_ajaran, gender_siswa, no_hp');
        $this->db->from('siswa');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        $this->db->where('status', 'aktif');
        $i = 0;
        foreach ($this->column_search as $aktif) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($aktif, $_POST['search']['value']);
                } else {
                    $this->db->or_like($aktif, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_aktif() {
        $this->_get_datatables_query_aktif();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query_aktif();
        $query = $this->db->get();
        return $query->num_rows();
    }
    // end db get siswa aktif
        //db get siswa mutasi
    private function _get_datatables_query_mutasi() {
        $this->db->select('id_siswa,nis, foto, npsn, nama_siswa, nama_kelas, alamat_siswa, status, tahun_ajaran, gender_siswa, no_hp');
        $this->db->from('siswa');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        $this->db->where('status', 'mutasi');
        $i = 0;
        foreach ($this->column_search as $mutasi) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($mutasi, $_POST['search']['value']);
                } else {
                    $this->db->or_like($mutasi, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_mutasi() {
        $this->_get_datatables_query_mutasi();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_mutasi() {
        $this->_get_datatables_query_mutasi();
        $query = $this->db->get();
        return $query->num_rows();
    }
    // end db get siswa mutasi
        //db get siswa alumni
    private function _get_datatables_query_alumni() {
        $this->db->select('id_siswa,nis, foto, npsn, nama_siswa, nama_kelas, alamat_siswa, status, tahun_ajaran, gender_siswa, no_hp');
        $this->db->from('siswa');
        $this->db->join('users', 'users.id = siswa.users_id', 'left');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas_id', 'left');
        $this->db->where('status', 'alumni');
        $i = 0;
        foreach ($this->column_search as $alumni) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($alumni, $_POST['search']['value']);
                } else {
                    $this->db->or_like($alumni, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_alumni() {
        $this->_get_datatables_query_alumni();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_alumni() {
        $this->_get_datatables_query_alumni();
        $query = $this->db->get();
        return $query->num_rows();
    }
    // end db get siswa alumni
    function count_all() {
        $this->db->from('siswa');
        return $this->db->count_all_results();
    }
    // end datatables
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
            $params              = array(
            'users_id'          => !empty($post['users_id']) ? $post['users_id'] : null,
            'foto'              => $post['foto'],
            'npsn'              => $post['npsn'],
            'nik_siswa'         => $post['nik_siswa'],
            'nama_siswa'        => $post['nama_siswa'],
            'alamat_siswa'      => $post['alamat_siswa'],
            'dusun'             => $post['dusun'],
            'rt'                => $post['rt'],
            'rw'                => $post['rw'],
            'nis'               => !empty($post['nis']) ? $post['nis'] : null,
            'kelas_id'          => !empty($post['kelas_id']) ? $post['kelas_id'] : null,
            'status'            => !empty($post['status']) ? $post['status'] : 'aktif',
            'desa'              => $post['desa'],
            'kodepos'           => $post['kodepos'],
            'kecamatan'         => $post['kecamatan'],
            'kabupaten'         => $post['kabupaten'],
            'provinsi'          => $post['provinsi'],
            'tempat_lahir'      => $post['tempat_lahir'],
            'tanggal_lahir'     => $post['tanggal_lahir'],
            'agama'             => $post['agama'],
            'hobi'              => $post['hobi'],
            'cita'              => $post['cita'],
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
            'gaji_ibu'          => $post['gaji_ibu'],
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
            'gaji_wali'         => $post['gaji_wali'],
            'tahun_ajaran'      => $post['tahun_ajaran'],
            'date_created'      => $created,
            'created_by'        => $created_by
        );
        /* echo json_encode($params); */
        /* die(); */
        $this->db->insert('siswa', $params);
        if ($this->session->userdata('level') == 'user') {
        $id = $this->db->insert_id();
        $this->session->set_userdata('id_siswa',$id);
        }
    }
    public function edit($post)
    {
        $modifBy  = $this->session->userdata('id');
        $modified = date('Y-m-d H:i:s');
          $params = array(
            'users_id'          => !empty($post['id']) ? $post['id'] : null,
            'kelas_id'          => $post['kelas_id'],
            'nis'               => $post['nis'],
            'npsn'              => $post['npsn'],
            'nik_siswa'         => $post['nik_siswa'],
            'nama_siswa'        => $post['nama_siswa'],
            'alamat_siswa'      => $post['alamat_siswa'],
            'dusun'             => $post['dusun'],
            'rt'                => $post['rt'],
            'rw'                => $post['rw'],
            'desa'              => $post['desa'],
            'kodepos'           => $post['kodepos'],
            'kecamatan'         => $post['kecamatan'],
            'kabupaten'         => $post['kabupaten'],
            'provinsi'          => $post['provinsi'],
            'tempat_lahir'      => $post['tempat_lahir'],
            'tanggal_lahir'     => $post['tanggal_lahir'],
            'status'            => $post['status'],
            'hobi'              => $post['hobi'],
            'cita'              => $post['cita'],
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
            'gaji_ibu'          => $post['gaji_ibu'],
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
            'gaji_wali'         => $post['gaji_wali'],
            'modified_by'       => $modifBy,
            'modified_date'     => $modified
        );
        if ($post['foto'] != null) {
          $params['foto'] = $post['foto']; 
        }
        /* echo json_encode($params); */
        /* die; */
        $this->db->where('id_siswa', $post['id_siswa']);
        $this->db->update('siswa', $params);
    }
    public function update($id, $params)
    {
        $this->db->where('id', $id);
        $this->db->update('siswa',$params);
    }
    public function del($id_siswa)
    {
        $this->db->where('id_siswa', $id_siswa);
        $this->db->delete('siswa');
    }
   
}
