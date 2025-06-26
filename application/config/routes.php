<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'desa';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['penduduk'] = 'penduduk';
$route['domisili'] = 'pengaduan/home_domisili';
$route['domisili'] = 'domisili/index';
$route['domisili/pendatang'] = 'domisili/pendatang';
$route['domisili/simpan_pendatang'] = 'domisili/simpan_pendatang';
$route['domisili/pindahan'] = 'domisili/pindahan';
$route['domisili/(:any)'] = 'domisili/$1';