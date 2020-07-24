<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['halaman/dashboard'] = 'dashboard';
$route['halaman/dashboard-kepala-sekolah'] = 'dashboard/dashboardLeader';;
$route['halaman/403-access-denied'] = 'dashboard/errors';;


$route['halaman/login'] = 'auth';
$route['halaman/login/proses'] = 'auth/proses';
$route['halaman/login/daftar'] = 'auth/register';
$route['halaman/login/keluar'] = 'auth/logout';

$route['halaman/siswa'] = 'siswa';
$route['halaman/siswa/mutasi'] = 'siswa/siswamutasi';
$route['halaman/siswa/alumni'] = 'siswa/alumni';
$route['halaman/siswa/data-aktif'] = 'siswa/get_ajax_aktif';
$route['halaman/siswa/data-mutasi'] = 'siswa/get_ajax_mutasi';
$route['halaman/siswa/data-alumni'] = 'siswa/get_ajax_alumni';
$route['halaman/siswa/tambah'] = 'siswa/add';
$route['halaman/siswa/rincian/(:num)'] = 'siswa/detail/$1';
$route['halaman/siswa/ubah/(:num)'] = 'siswa/edit/$1';
$route['halaman/siswa/hapus/(:num)'] = 'siswa/delete/$1';
$route['halaman/siswa/import'] = 'siswa/import';
$route['halaman/siswa/export'] = 'siswa/export';
$route['halaman/siswa/print/(:num)'] = 'siswa/printpdf/$1';
$route['halaman/siswa/ganti-kelas'] = 'siswa/editClass';
$route['halaman/siswa/validate'] = 'siswa/validasi';

$route['halaman/ppdb'] = 'ppdb';
$route['halaman/ppdb/daftar-ppdb'] = 'ppdb/listPpdb';
$route['halaman/ppdb/tambah'] = 'ppdb/add';
$route['halaman/ppdb/ubah/(:num)'] = 'ppdb/edit/$1';
$route['halaman/ppdb/hapus/(:num)'] = 'ppdb/delete/$1';
$route['halaman/ppdb/proc'] = 'ppdb/proses';
$route['halaman/ppdb/validate'] = 'ppdb/validasi';
$route['halaman/ppdb/print-form-ppdb/(:num)'] = 'ppdb/printPdf/$1';
$route['halaman/ppdb/print-form-daftar_ulang/(:num)'] = 'ppdb/printPdfSiswa/$1';
$route['halaman/ppdb/data-ppdb'] = 'ppdb/get_ajax_ppdb';
$route['halaman/ppdb/pengumuman'] = 'pengumuman';
$route['halaman/ppdb/pengumuman/tambah'] = 'pengumuman/add';
$route['halaman/ppdb/pengumuman/hapus/(:num)'] = 'pengumuman/delete/$1';
$route['halaman/ppdb/gelombang'] = 'gelombang';
$route['halaman/ppdb/gelombang/tambah'] = 'gelombang/add';
$route['halaman/ppdb/gelombang/hapus/(:num)'] = 'gelombang/delete/$1';
$route['halaman/ppdb/nilai'] = 'nilai';
$route['halaman/ppdb/nilai/masukkan-nilai'] = 'nilai/add';
$route['halaman/ppdb/nilai/ubah/(:num)'] = 'nilai/edit/$1';
$route['halaman/ppdb/nilai/hapus/(:num)'] = 'nilai/del/$1';
$route['halaman/ppdb/nilai/proses'] = 'nilai/proses';
$route['halaman/ppdb/nilai/print'] = 'nilai/printPengumumanNilai';
$route['halaman/ppdb/nilai/data-nilai'] = 'nilai/get_ajax_nilai';

$route['halaman/kelas'] = 'master';
$route['halaman/kelas/tambah'] ='master/addKelas';
$route['halaman/kelas/ubah/(:num)'] = 'master/edit/$1';
$route['halaman/kelas/hapus/(:num)'] = 'master/delete/$1';
$route['halaman/guru'] = 'master/guru';
$route['halaman/guru/tambah'] = 'master/addGuru';
$route['halaman/guru/ubah/(:num)'] = 'master/editGuru/$1';
$route['halaman/guru/hapus/(:num)'] = 'master/delGuru/$1';
$route['halaman/master/proses'] = 'master/proses';

$route['halaman/pengguna/admin'] = 'user';
$route['halaman/pengguna/panitia'] = 'user/listPanitia';
$route['halaman/pengguna/siswa'] = 'user/listUser';
$route['halaman/pengguna/data-user'] = 'user/get_ajax_user';
$route['halaman/pengguna/tambah'] = 'user/add';
$route['halaman/pengguna/ubah/(:num)'] = 'user/edit/$1';
$route['halaman/pengguna/hapus/(:num)'] = 'user/delete/$1';
$route['halaman/pengguna/proses-user'] = 'user/proses';
