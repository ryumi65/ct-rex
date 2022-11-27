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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Akun
$route['signup'] = 'akun';
$route['logout'] = 'akun/logout';

// Fakultas
$route['fakultas/profil/edit'] = 'fakultas/update';

// Prodi
$route['prodi/akademik/data-matkul'] = 'prodi/datamatkul';
$route['prodi/akademik/data-matkul/edit/(:any)'] = 'prodi/updatematkul/$1';
$route['prodi/akademik/data-matkul/delete/(:any)'] = 'prodi/deletematkul/$1';
$route['prodi/akademik/data-matkul/(:any)'] = 'prodi/detailmatkul/$1';
$route['prodi/akademik/tambah-matkul'] = 'prodi/creatematkul';
$route['prodi/civitas/data-dosen'] = 'prodi/datadsn';
$route['prodi/civitas/data-dosen/(:num)'] = 'prodi/profildsn/$1';
$route['prodi/civitas/data-dosen/edit/(:num)'] = 'prodi/updatedsn/$1';
$route['prodi/civitas/data-dosen/delete/(:num)'] = 'prodi/deletedsn/$1';
$route['prodi/civitas/data-mahasiswa'] = 'prodi/datamhs';
$route['prodi/civitas/data-mahasiswa/(:num)'] = 'prodi/profilmhs/$1';
$route['prodi/civitas/data-mahasiswa/edit/(:num)'] = 'prodi/updatemhs/$1';
$route['prodi/civitas/data-mahasiswa/delete/(:num)'] = 'prodi/deletemhs/$1';
$route['prodi/civitas/data-dosen-wali'] = 'prodi/datadsnwl';
$route['prodi/civitas/data-dosen-wali/(:num)'] = 'prodi/datamhswl/$1';
$route['prodi/civitas/data-dosen-wali/tambah-wali'] = 'prodi/createwali';
$route['prodi/civitas/hapus-mahasiswa-wali/(:num)/(:num)'] = 'prodi/deletemhswl/$1/$2';
$route['prodi/profil/edit'] = 'prodi/update';

// Dosen
$route['dosen/profil/edit/(:num)'] = 'dosen/update/$1';

// Mahasiswa
$route['mahasiswa/profil/edit/(:num)'] = 'mahasiswa/update/$1';
$route['mahasiswa/profil/foto/edit'] = 'mahasiswa/update_foto';