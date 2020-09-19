<?php
if (!function_exists('cekAlreadyLogin')) {
  function cekAlreadyLogin(){
    $ci =& get_instance();
    $sess = $ci->session->userdata('id');
    if ($sess) {
      redirect('halaman/dashboard');
    }
  }
}
if (!function_exists('cekNotLogin')) {
  function cekNotLogin(){
    $ci =& get_instance();
    $sess = $ci->session->userdata('id');
    if (!$sess) {
      redirect('halaman/login');
    }
  }
}
if (!function_exists('cekAdmin')) {
  function cekAdmin()
  {
    $CI =& get_instance();
    $CI->load->library('fungsi');
    if ($CI->session->level != 'admin' && $CI->session->level != 'guru'){
      $CI->session->userdata('error','Anda tidak memiliki akses utuk halaman ini');
      redirect('halaman/ppdb','refresh');
    }
  }
}

if (!function_exists('cekLeader')) {
  function cekLeader()
  {
    $ci =& get_instance();
    if ($ci->session->level != 'kepala') {
      redirect('halaman/403-access-denied');
    }
  }
}

if (!function_exists('cekAlreadyInput')) {
  function cekAlreadyInput()
  {
    $ci =& get_instance();
    if ($ci->session->userdata('level') == 'user') {
      if (!empty($ci->session->userdata('id_ppdb'))&& !empty($ci->session->userdata('id_siswa'))) {
        redirect('halaman/ppdb','refresh');
      }
    }
  }
}

if (!function_exists('uploader')) {
  function uploader($imageName, $locationImage, $typeImage, $sizeImage, $nameForm)
  {
    $ci =& get_instance();
    $nmFile = $imageName."_".date('Ymd');
    $config['upload_path'] = 'uploads/'.$locationImage;
    $config['allowed_types'] = $typeImage;
    $config['max_size'] = $sizeImage;
    $config['file_name'] = $nmFile;
    $ci->load->library('upload', $config);
    $ci->upload->do_upload($nameForm);
    if ($ci->upload->display_errors()) {
      die($ci->upload->display_errors());
    }else{
      $result1 = $ci->upload->data();
      $result = ['foto' => $result1];
      $dfile = $result['foto']['file_name'];
    }
    return $dfile;
  }
}

if (!function_exists('cekRoutes')) {
  function cekRoutes($urlClass){
    $ci =& get_instance();
    $url = $urlClass;
    if ($ci->uri->segment(1) == $url) {
      show_error('Halaman tidak ditemukan', 500, 'Page Not Found');
    }
    return $url;
  }
}

if (!function_exists('cekLimitPendaftaran')) {
  function cekLimitPendaftaran()
  {
    $ci =& get_instance();
    $ci->load->model(['m_pengumuman', 'm_ppdb']);
    $query = $ci->m_pengumuman->getSettingPendaftaran()->row();
    $pendaftar = $ci->m_ppdb->get()->result();
    $totalPendaftar = count($pendaftar);
    if ($totalPendaftar > $query->jumlah_pendaftar) {
      $ci->db->set('status_pendaftaran','tutup');
      $ci->db->update('setting_pendaftaran',['id' => $query->id]);
      show_404();
    }elseif($query->status_pendaftaran == 'tutup'){
      show_404();
    }
  }
}

?>
