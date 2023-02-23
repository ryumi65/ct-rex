<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller']                               = 'login';
$route['404_override']                                     = '';
$route['translate_uri_dashes']                             = FALSE;

//==================== AKUN ====================//

$route['signup']                                           = 'akun';
$route['logout']                                           = 'akun/logout';

//==================== FAKULTAS ====================//

$route['fakultas/akademik/data-matkul']                    = 'fakultas/datamatkul';
$route['fakultas/akademik/data-matkul/(:num)']             = 'fakultas/detailmatkul/$1';
$route['fakultas/akademik/jadwal-kuliah']                  = 'fakultas/jadwalkuliah';
$route['fakultas/akademik/perkuliahan']                    = 'fakultas/perkuliahan';
$route['fakultas/akademik/perkuliahan/(:num)/presensi']    = 'fakultas/presensi/$1';
$route['fakultas/akademik/perkuliahan/(:num)/bap']         = 'fakultas/bap/$1';
$route['fakultas/akademik/perkuliahan/(:num)/nilai']       = 'fakultas/nilai/$1';
$route['fakultas/civitas/data-prodi']                      = 'fakultas/dataprd';
$route['fakultas/civitas/data-dosen']                      = 'fakultas/datadsn';
$route['fakultas/civitas/data-dosen/(:num)/profil']        = 'fakultas/profildsn/$1';
$route['fakultas/civitas/data-dosen/(:num)/jadwal']        = 'fakultas/datamengajar/$1';
$route['fakultas/civitas/data-mahasiswa']                  = 'fakultas/datamhs';
$route['fakultas/civitas/data-mahasiswa/(:num)/profil']    = 'fakultas/profilmhs/$1';
$route['fakultas/civitas/data-mahasiswa/(:num)/akademik']  = 'fakultas/berkasmhs/$1';
$route['fakultas/profil/edit']                             = 'fakultas/update';

//==================== PRODI ====================//

$route['prodi/akademik/data-matkul']                       = 'prodi/datamatkul';
$route['prodi/akademik/data-matkul/edit/(:any)']           = 'prodi/updatematkul/$1';
$route['prodi/akademik/data-matkul/delete/(:any)']         = 'matkul/delete/$1';
$route['prodi/akademik/data-matkul/(:any)']                = 'prodi/detailmatkul/$1';
$route['prodi/akademik/tambah-matkul']                     = 'prodi/creatematkul';
$route['prodi/akademik/jadwal-kuliah']                     = 'prodi/jadwalkuliah';
$route['prodi/akademik/jadwal-kuliah/edit/(:any)']         = 'prodi/updatejadwal/$1';
$route['prodi/akademik/jadwal-kuliah/delete/(:any)']       = 'jadwal/delete/$1';
$route['prodi/akademik/tambah-jadwal']                     = 'prodi/createjadwal';
$route['prodi/akademik/perkuliahan']                       = 'prodi/perkuliahan';
$route['prodi/akademik/perkuliahan/(:num)/presensi']       = 'prodi/presensi/$1';
$route['prodi/akademik/perkuliahan/(:num)/bap']            = 'prodi/bap/$1';
$route['prodi/akademik/perkuliahan/(:num)/nilai']          = 'prodi/nilai/$1';
$route['prodi/civitas/data-dosen']                         = 'prodi/datadsn';
$route['prodi/civitas/data-dosen/(:num)/profil']           = 'prodi/profildsn/$1';
$route['prodi/civitas/data-dosen/(:num)/jadwal']           = 'prodi/datamengajar/$1';
$route['prodi/civitas/data-dosen/edit/(:num)']             = 'prodi/updatedsn/$1';
$route['prodi/civitas/data-dosen/delete/(:num)']           = 'prodi/deletedsn/$1';
$route['prodi/civitas/tambah-dosen']                       = 'prodi/inputdsn';
$route['prodi/civitas/data-mahasiswa']                     = 'prodi/datamhs';
$route['prodi/civitas/data-mahasiswa/(:num)/profil']       = 'prodi/profilmhs/$1';
$route['prodi/civitas/data-mahasiswa/(:num)/akademik']     = 'prodi/berkasmhs/$1';
$route['prodi/civitas/data-mahasiswa/(:num)/biaya']        = 'prodi/biayakuliah/$1';
$route['prodi/civitas/data-dosen-wali']                    = 'prodi/datadsnwl';
$route['prodi/civitas/data-dosen-wali/(:num)']             = 'prodi/datamhswl/$1';
$route['prodi/civitas/data-dosen-wali/tambah-wali']        = 'prodi/createwali';
$route['prodi/civitas/hapus-mahasiswa-wali/(:num)/(:num)'] = 'prodi/deletemhswl/$1/$2';
$route['prodi/pengumuman/tambah']                          = 'prodi/inputpengumuman';
$route['prodi/pengumuman/(:num)/edit']                     = 'prodi/ubahpengumuman/$1';
$route['prodi/pengumuman/(:num)/delete']                   = 'prodi/deletepengumuman/$1';
$route['prodi/profil/edit']                                = 'prodi/update';

//==================== DOSEN ====================//

$route['dosen/perkuliahan/mata-kuliah']                    = 'dosen/jadwalkuliah';
$route['dosen/perkuliahan/presensi/(:num)']                = 'dosen/rekapabsen/$1';
$route['dosen/perkuliahan/presensi/(:num)/input']          = 'dosen/inputabsen/$1';
$route['dosen/perkuliahan/presensi/(:num)/update/(:num)']  = 'dosen/updateabsen/$1/$2';
$route['dosen/perkuliahan/bap/(:num)']                     = 'dosen/bap/$1';
$route['dosen/perkuliahan/bap/(:num)/tambah/(:num)']       = 'dosen/formbap/$1/$2';
$route['dosen/perkuliahan/nilai/(:num)']                   = 'dosen/nilai/$1';
$route['dosen/perkuliahan/nilai/(:num)/input']             = 'dosen/inputnilai/$1';
$route['dosen/bimbingan/mahasiswa-wali']                   = 'dosen/daftarmhswali';
$route['dosen/bimbingan/mahasiswa-wali/(:num)']            = 'dosen/berkasmhs/$1';
$route['dosen/bimbingan/mahasiswa-wali/(:num)/profil']     = 'dosen/profilmahasiswa/$1';
$route['dosen/bimbingan/mahasiswa-wali/(:num)/biaya']      = 'dosen/biayakuliah/$1';
$route['dosen/bimbingan/akademik']                         = 'dosen/bimbinganakademik';
$route['dosen/bimbingan/akademik/krs']                     = 'dosen/acckrs';
$route['dosen/profil/edit/foto']                           = 'dosen/update_foto';
$route['dosen/profil/edit/(:num)']                         = 'dosen/update/$1';

//==================== MAHASISWA ====================//

$route['mahasiswa/perkuliahan/data-krs']                   = 'mahasiswa/datakrs';
$route['mahasiswa/perkuliahan/data-krs/tambah']            = 'mahasiswa/formkrs';
$route['mahasiswa/perkuliahan/data-khs']                   = 'mahasiswa/datakhs';
$route['mahasiswa/perkuliahan/jadwal-kuliah']              = 'mahasiswa/jadwalkuliah';
$route['mahasiswa/perkuliahan/presensi/(:num)']            = 'mahasiswa/presensi/$1';
$route['mahasiswa/biaya-kuliah']                           = 'mahasiswa/biayakuliah';
$route['mahasiswa/profil/edit/foto']                       = 'mahasiswa/update_foto';
$route['mahasiswa/profil/edit/(:num)']                     = 'mahasiswa/update/$1';
