<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'desa';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['penduduk'] = 'penduduk';
$route['pendatang'] = 'pendatang';
$route['domisili'] = 'pengaduan/home_domisili';
$route['domisili'] = 'domisili/index';
$route['domisili/pendatang'] = 'domisili/pendatang';
$route['domisili/konfirmasi_pendatang'] = 'domisili/konfirmasi_pendatang';
$route['domisili/pindahan'] = 'domisili/pindahan';
$route['domisili/(:any)'] = 'domisili/$1';


// admin 
$route['admin/kelahiran'] = 'admin/kelahiran';
$route['admin/kelahiran/(:any)'] = 'admin/kelahiran/($1)';

// warga 
$route['warga/kelahiran'] = 'warga/kelahiran'; 
$route['warga/kelahiran/simpan_akta'] = 'warga/kelahiran/simpan_akta'; 
$route['warga/kelahiran/(:any)'] = 'warga/kelahiran/($1)'; 