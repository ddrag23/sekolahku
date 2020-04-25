<?php
function cekAlreadyLogin(){
    $ci =& get_instance();
    $sess = $ci->session->userdata('id');
    if ($sess) {
        redirect('dashbaord');
    }
}
function cekNotLogin(){
    $ci =& get_instance();
    $sess = $ci->session->userdata('id');
    if (!$sess) {
        redirect('auth');
    }
}
function activeMenu($menu){
    $ci =& get_instance();
    $classname = $ci->router->fetch_class();
    return $classname == $menu ? 'active' : null;
}
function activeSubMenu($subMenu){
    $CI =& get_instance();
    $methodName = $CI->router->fetch_method();;
    return $methodName == $subMenu ? 'active' : null;
}
function cekAdmin()
{
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 'admin') {
        redirect('dashboard','refresh');
    }
}
function uploader($imageName, $locationImage, $typeImage, $sizeImage, $nameForm)
{
    $ci =& get_instance();
    $nmFile = $imageName."_".date('Ymd-His');
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

?>
