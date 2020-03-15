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
?>