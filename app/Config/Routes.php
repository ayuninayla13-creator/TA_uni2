
<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Auth::login');
$routes->get('login', 'Auth::login');
$routes->post('login/proses', 'Auth::prosesLogin');
$routes->get('daftar', 'Auth::register');
$routes->post('daftar/simpan', 'Auth::simpanDaftar');

$routes->get('dashboard', 'Auth::dashboard');
$routes->get('logout', 'Auth::logout');

$routes->get('admin', 'admin::index');
$routes->get('admin/create', 'admin::create');
$routes->post('admin/save', 'admin::save');
$routes->get('admin/delete', 'admin::delete');
$routes->get('admin/edit', 'admin::edit');

$routes->get('lembaga', 'Lembaga::index');
$routes->get('lembaga/tambah', 'Lembaga::tambah');
$routes->post('lembaga/simpan', 'Lembaga::simpan');
$routes->get('lembaga/edit/(:num)', 'Lembaga::edit/$1');
$routes->post('lembaga/update/(:num)', 'Lembaga::update/$1');
$routes->post('lembaga/hapus/(:num)', 'Lembaga::hapus/$1');

// Routes Kategori Aset
$routes->get('kategori-aset', 'KategoriAset::index');
$routes->get('kategori-aset/tambah', 'KategoriAset::tambah');
$routes->post('kategori-aset/simpan', 'KategoriAset::simpan');
$routes->get('kategori-aset/edit/(:num)', 'KategoriAset::edit/$1');
$routes->post('kategori-aset/update/(:num)', 'KategoriAset::update/$1');
$routes->post('kategori-aset/hapus/(:num)', 'KategoriAset::hapus/$1');

// Routes Aset
$routes->get('aset', 'Aset::index');
$routes->get('aset/tambah', 'Aset::tambah');
$routes->post('aset/simpan', 'Aset::simpan');
$routes->get('aset/edit/(:num)', 'Aset::edit/$1');
$routes->post('aset/update/(:num)', 'Aset::update/$1');
$routes->post('aset/hapus/(:num)', 'Aset::hapus/$1');

$routes->get('/laporan', 'Laporan::index');

$routes->get('/riwayat', 'Riwayat::index');
