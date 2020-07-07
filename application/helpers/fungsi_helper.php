<?php
function cekAlreadyLogin(){
    $ci =& get_instance();
    $sess = $ci->session->userdata('id');
    if ($sess) {
        redirect('halaman/dashboard');
    }
}
function cekNotLogin(){
    $ci =& get_instance();
    $sess = $ci->session->userdata('id');
    if (!$sess) {
        redirect('halaman/login');
    }
}
function activeMenu($menu){
    $ci =& get_instance();
    $classname = $ci->router->fetch_class();
    return $classname == $menu ? 'active' : null;
}
function activeSubMenu($subMenu)
{
    $CI =& get_instance();
    $methodName = $CI->router->fetch_method();;
    return $methodName == $subMenu ? 'active' : null;
}
function cekAdmin()
{
    $CI =& get_instance();
    $CI->load->library('fungsi');
    if ($CI->fungsi->user_login()->level != 'admin' && $CI->fungsi->user_login()->level != 'guru'){
        $CI->session->userdata('error','Anda tidak memiliki akses utuk halaman ini');
        redirect('halaman/ppdb','refresh');
    }
}

function cekAlreadyInput()
{
    $ci =& get_instance();
    if ($ci->session->userdata('level') == 'user') {
     if (!empty($ci->session->userdata('id_ppdb'))&& !empty($ci->session->userdata('id_siswa'))) {
       redirect('halaman/ppdb','refresh'); 
        }
    }
}

function uploader($imageName, $locationImage, $typeImage, $sizeImage, $nameForm)
{
    $ci =& get_instance();
    $nmFile = $imageName."_".date('Ymd');
    $config['upload_path'] = 'uploads/'.$locationImage;
    $config['allowed_types'] = $typeImage;
    $config['max_size'] = $sizeImage;
    $config['file_name'] = $nmFile;
   // $ci->upload = null;
    $ci->load->library('upload', $config);
    $ci->upload->do_upload($nameForm);
    // die($ci->upload->display_errors());
    $result1 = $ci->upload->data();
    $result = ['foto' => $result1];
    $dfile = $result['foto']['file_name'];
    return $dfile;
}

function cekRoutes($urlClass){
    $ci =& get_instance();
    $url = $urlClass;
       if ($ci->uri->segment(1) == $url) {
           show_error('Halaman tidak ditemukan', 500, 'Page Not Found');
       }
    return $url;
}

?>
