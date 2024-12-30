<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home\Login::index_login');


$routes->get('login', 'Home\Login::index_login');
$routes->post('login-data', 'Home\Login::data_login');

$routes->get('register', 'Home\Register::index_register');
$routes->post('register-data', 'Home\Register::data_register');

$routes->get('logout', 'Home\Logout::index_logout');


$routes->get('user-home', 'User\Home::index');

$routes->get('user-guru', 'User\Guru::index');

$routes->get('user-penilaian', 'User\Penilaian::index');

$routes->get('user-laporan', 'User\Laporan::index');
$routes->get('user-laporan-download/(:any)', 'User\Laporan::download/$1');

$routes->get('user-about', 'User\About::index');

$routes->get('user-kontak', 'User\Kontak::index');

$routes->get('user-profile/(:any)', 'User\Profile::index_ubah/$1');
$routes->post('user-ubah-profile/(:any)', 'User\Profile::ubah/$1');


$routes->get('admin-home', 'Admin\Home::index');

$routes->get('admin-guru', 'Admin\Guru::index');
$routes->get('admin-guru-tambah', 'Admin\Guru::index_tambah');
$routes->post('admin-guru-tambah-data', 'Admin\Guru::tambah');
$routes->get('admin-guru-ubah/(:any)', 'Admin\Guru::index_ubah/$1');
$routes->post('admin-guru-ubah-data/(:any)', 'Admin\Guru::ubah/$1');
$routes->get('admin-guru-hapus/(:any)', 'Admin\Guru::hapus/$1');

$routes->get('admin-kriteria', 'Admin\Kriteria::index');
$routes->get('admin-kriteria-tambah', 'Admin\Kriteria::index_tambah');
$routes->post('admin-kriteria-tambah-data', 'Admin\Kriteria::tambah');
$routes->get('admin-kriteria-ubah/(:any)', 'Admin\Kriteria::index_ubah/$1');
$routes->post('admin-kriteria-ubah-data/(:any)', 'Admin\Kriteria::ubah/$1');
$routes->get('admin-kriteria-hapus/(:any)', 'Admin\Kriteria::hapus/$1');

$routes->get('admin-alternatif', 'Admin\Alternatif::index');
$routes->get('admin-alternatif-tambah', 'Admin\Alternatif::index_tambah');
$routes->post('admin-alternatif-tambah-data', 'Admin\Alternatif::tambah');
$routes->get('admin-alternatif-ubah/(:any)', 'Admin\Alternatif::index_ubah/$1');
$routes->post('admin-alternatif-ubah-data/(:any)', 'Admin\Alternatif::ubah/$1');
$routes->get('admin-alternatif-hapus/(:any)', 'Admin\Alternatif::hapus/$1');

$routes->get('admin-penilaian', 'Admin\Penilaian::index');
$routes->get('admin-penilaian-perhitungan', 'Admin\Penilaian::index_perhitungan');
$routes->get('admin-penilaian-print', 'Admin\Penilaian::index_print_penilaian');
$routes->get('admin-perhitungan-print', 'Admin\Penilaian::index_print_perhitungan');

$routes->get('admin-laporan', 'Admin\Laporan::index');
$routes->get('admin-laporan-tambah', 'Admin\Laporan::index_tambah');
$routes->post('admin-laporan-tambah-data', 'Admin\Laporan::tambah');
$routes->get('admin-laporan-ubah/(:any)', 'Admin\Laporan::index_ubah/$1');
$routes->post('admin-laporan-ubah-data/(:any)', 'Admin\Laporan::ubah/$1');
$routes->get('admin-laporan-hapus/(:any)', 'Admin\Laporan::hapus/$1');
$routes->get('admin-laporan-download/(:any)', 'Admin\Laporan::download/$1');

$routes->get('admin-akun', 'Admin\Akun::index');
$routes->get('admin-akun-tambah', 'Admin\Akun::index_tambah');
$routes->post('admin-akun-tambah-data', 'Admin\Akun::tambah');
$routes->get('admin-akun-ubah/(:any)', 'Admin\Akun::index_ubah/$1');
$routes->post('admin-akun-ubah-data/(:any)', 'Admin\Akun::ubah/$1');
$routes->get('admin-akun-hapus/(:any)', 'Admin\Akun::hapus/$1');

$routes->get('admin-about', 'Admin\About::index');

$routes->get('admin-kontak', 'Admin\Kontak::index');

$routes->get('admin-profile/(:any)', 'Admin\Profile::index_ubah/$1');
$routes->post('admin-ubah-profile/(:any)', 'Admin\Profile::ubah/$1');
