<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_prodi');
        $this->load->model('model_dosen');
        $this->load->model('model_jadwal');
        $this->load->model('model_krs');
        $this->load->model('model_mahasiswa');
        $this->load->model('model_matkul');
        $this->load->model('model_pembayaran');
        $this->load->model('model_pengumuman');

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 2) redirect(strtolower($this->session->access));
    }

    //==================== PRODI ====================//

    public function index() {
        if (uri_string() === 'prodi/index') return redirect('prodi');

        $akun = $this->model_prodi->get_db('ak_akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $this->session->id]),
            'dsnaktif' => $this->model_prodi->get_db_count('ak_dosen', ['id_prodi' => $this->session->id, 'status_dosen' => 'aktif']),
            'mhsaktif' => $this->model_prodi->get_db_count('ak_mahasiswa', ['id_prodi' => $this->session->id, 'status' => 'aktif']),
            'mhslulus' => $this->model_prodi->get_db_count('ak_mahasiswa', ['id_prodi' => $this->session->id, 'status' => 'lulus']),
            'mhscuti' => $this->model_prodi->get_db_count('ak_mahasiswa', ['id_prodi' => $this->session->id, 'status' => 'cuti']),
            'mhskeluar' => $this->model_prodi->get_db_count('ak_mahasiswa', ['id_prodi' => $this->session->id, 'status' => 'keluar']),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil() {
        $akun = $this->model_prodi->get_db('ak_akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $this->session->id]),
            'dsnaktif' => $this->model_prodi->get_db_count('ak_dosen', ['id_prodi' => $this->session->id, 'status_dosen' => 'aktif']),
            'mhsaktif' => $this->model_prodi->get_db_count('ak_mahasiswa', ['id_prodi' => $this->session->id, 'status' => 'aktif']),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profil/profil', $data);
        $this->load->view('_partials/script');
    }

    public function ubahvisimisi() {
        $data = [
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $this->session->id]),
            'listf' => $this->model_prodi->get_db('ak_fakultas'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profil/updatevisimisi', $data);
        $this->load->view('_partials/script');
    }

    public function updatevisimisi() {
        $this->model_prodi->update_visimisi();
        redirect('prodi/profil');
    }

    //==================== DOSEN ====================//

    public function datadsn() {
        $data = [
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $this->session->id]),
            'listd' => $this->model_prodi->get_db('ak_dosen', ['id_prodi' => $this->session->id], 'result'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/datadsn', $data);
        $this->load->view('_partials/script');
    }

    public function profildsn($nik) {
        $dosen = $this->model_prodi->get_db('ak_dosen', ['nik' => $nik]);
        if ($dosen['id_prodi'] !== $this->session->id) redirect(strtolower($this->session->access));

        if (isset($dosen['tanggal_lahir'])) $tanggal_lahir = $this->indonesian_date($dosen['tanggal_lahir']);
        else $tanggal_lahir = $dosen['tanggal_lahir'];

        $data = [
            'dosen' => $dosen,
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $dosen['id_prodi']]),
            'tanggal_lahir' => $tanggal_lahir,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/profildsn', $data);
        $this->load->view('_partials/script');
    }

    public function datamengajar($nik) {
        $data = [
            'dosen' => $this->model_prodi->get_db('ak_dosen', ['nik' => $nik]),
            'listj' => $this->model_jadwal->get_jadwal_dsn($nik),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/datamengajar', $data);
        $this->load->view('_partials/script');
    }

    public function inputdsn() {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('prodi/civitas/createdsn');
            $this->load->view('_partials/script');
        } else {
            $this->model_dosen->set_dosen();
            redirect('prodi/civitas/data-dosen');
        }
    }

    public function updatedsn($nik) {
        $data = [
            'dosen' => $this->model_prodi->get_db('ak_dosen', ['nik' => $nik]),
            'listp' => $this->model_prodi->get_db('ak_prodi'),
        ];

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('dosen/update', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_dosen->update_dosen($nik);
            redirect('prodi/civitas/data-dosen');
        }
    }

    public function deletedsn($nik) {
        $this->model_dosen->delete_dosen($nik);
        redirect('prodi/civitas/data-dosen');
    }

    //==================== MAHASISWA ====================//

    public function datamhs() {
        $data = [
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $this->session->id]),
            'listd' => $this->model_prodi->get_db('ak_dosen', ['id_prodi' => $this->session->id], 'result'),
            'listm' => $this->model_prodi->get_db('ak_mahasiswa', ['id_prodi' => $this->session->id], 'result'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/datamhs', $data);
        $this->load->view('_partials/script');
    }

    public function profilmhs($nim) {
        $mahasiswa = $this->model_prodi->get_db('ak_mahasiswa', ['nim' => $nim]);
        if ($mahasiswa['id_prodi'] !== $this->session->id) redirect(strtolower($this->session->access));

        if (isset($mahasiswa['tanggal_lahir'])) $tanggal_lahir = $this->indonesian_date($mahasiswa['tanggal_lahir']);
        else $tanggal_lahir = $mahasiswa['tanggal_lahir'];

        $data = [
            'dosen' => $this->model_prodi->get_db('ak_dosen', ['nik' => $mahasiswa['dosen_wali']]),
            'mahasiswa' => $mahasiswa,
            'ortu' => $this->model_prodi->get_db('ak_orang_tua', ['nim' => $nim]),
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $mahasiswa['id_prodi']]),
            'tanggal_lahir' => $tanggal_lahir,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/profilmhs', $data);
        $this->load->view('_partials/script');
    }

    public function berkasmhs($nim) {
        $mahasiswa = $this->model_prodi->get_db('ak_mahasiswa', ['nim' => $nim]);
        if ($mahasiswa['id_prodi'] !== $this->session->id) redirect(strtolower($this->session->access));

        $ip = [];
        $krs = [];
        $mk = [];
        $sks_smt = [];

        $count_ipk = 0;
        $ipk = 0;

        for ($i = 1; $i <= 8; $i++) {
            $jumlah_krs = 0;
            $jumlah_ip = 0;
            $jumlah_sks = 0;
            $list_krs = $this->model_krs->get_krs_smt($nim, $i);

            foreach ($list_krs as $value) {
                if (isset($value['nilai'])) {
                    if ($value['nilai'] >= 80 && $value['nilai'] <= 100) $indeks = 4;
                    elseif ($value['nilai'] >= 77 && $value['nilai'] < 80) $indeks = 3.75;
                    elseif ($value['nilai'] >= 74 && $value['nilai'] < 77) $indeks = 3.5;
                    elseif ($value['nilai'] >= 68 && $value['nilai'] < 74) $indeks = 3;
                    elseif ($value['nilai'] >= 65 && $value['nilai'] < 68) $indeks = 2.75;
                    elseif ($value['nilai'] >= 62 && $value['nilai'] < 65) $indeks = 2.5;
                    elseif ($value['nilai'] >= 56 && $value['nilai'] < 62) $indeks = 2;
                    elseif ($value['nilai'] >= 41 && $value['nilai'] < 56) $indeks = 1;
                    elseif ($value['nilai'] < 41) $indeks = 0;

                    $jumlah_krs++;
                    $jumlah_ip += $indeks;
                }
            }

            if ($jumlah_krs > 0) {
                $total_ip = round($jumlah_ip / $jumlah_krs, 2);
                $ipk += $total_ip;
                $count_ipk++;
            } else $total_ip = 0;

            $list_sks = $this->model_krs->get_sks($nim, $i);

            for ($j = 0; $j < count($list_sks); $j++) {
                $sks = intval($list_sks[$j]['sks']);
                $jumlah_sks += $sks;
            }

            array_push($ip, $total_ip);
            array_push($krs, $list_krs);
            array_push($mk, $this->model_krs->get_mk($nim, $i));
            array_push($sks_smt, $jumlah_sks);
        }

        if ($count_ipk > 0) $total_ipk = round($ipk / $count_ipk, 2);
        else $total_ipk = 0;

        $data = [
            'mahasiswa' => $mahasiswa,
            'ipk' => $total_ipk,
            'listip' => $ip,
            'listk' => $krs,
            'listm' => $mk,
            'lists' => $sks_smt,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/berkasmhs', $data);
        $this->load->view('_partials/script');
    }

    //==================== WALI ====================//

    public function datadsnwl() {
        $data = [
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $this->session->id]),
            'listd' => $this->model_prodi->get_db('ak_dosen', ['id_prodi' => $this->session->id], 'result'),
            'mhswl' => $this->jumlah_mhs_wali(),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/datadsnwl', $data);
        $this->load->view('_partials/script');
    }

    public function datamhswl($nik) {
        $data = [
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $this->session->id]),
            'dosen' => $this->model_prodi->get_db('ak_dosen', ['nik' => $nik]),
            'listm' => $this->model_prodi->get_db('ak_mahasiswa', ['dosen_wali' => $nik], 'result'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/datamhswl', $data);
        $this->load->view('_partials/script');
    }

    public function createwali() {
        $data = [
            'listd' => $this->model_prodi->get_db('ak_dosen', ['id_prodi' => $this->session->id], 'result'),
            'listm' => $this->model_prodi->get_db('ak_mahasiswa', ['id_prodi' => $this->session->id, 'dosen_wali' => null], 'result'),
        ];

        $this->form_validation->set_rules('nik', 'NIK', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('prodi/civitas/createdatawali', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_prodi->set_mhs_wali($this->input->post('dosen_wali[]'));
            redirect('prodi/civitas/data-dosen-wali');
        }
    }

    public function deletemhswl($nik, $nim) {
        if ($this->model_prodi->get_db('ak_mahasiswa', ['nim' => $nim, 'dosen_wali' => $nik])) {
            $this->model_prodi->delete_mhs_wali($nim);
            redirect('prodi/civitas/data-dosen-wali/' . $nik);
        }
    }

    private function jumlah_mhs_wali() {
        $listd = $this->model_prodi->get_db('ak_dosen', ['id_prodi' => $this->session->id], 'result');

        foreach ($listd as $dosen) {
            $jumlah = $this->model_prodi->get_count_mhs_wali($dosen['nik']);

            $data[$dosen['nik']] = $jumlah;
        }

        return $data;
    }

    //==================== JADWAL ====================//

    public function jadwalkuliah() {
        $data = [
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $this->session->id]),
            'listj' => $this->model_jadwal->get_jadwal($this->session->id),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/jadwalkuliah', $data);
        $this->load->view('_partials/script');
    }

    public function createjadwal() {
        $data = [
            'listd' => $this->model_prodi->get_db('ak_dosen', ['id_prodi' => $this->session->id], 'result'),
            'listm' => $this->model_prodi->get_db('ak_matkul', ['id_prodi' => $this->session->id], 'result'),
            'listr' => $this->model_prodi->get_db('ak_ruangan'),
            'hari' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/createjadwal', $data);
        $this->load->view('_partials/script');
    }

    public function updatejadwal($id_jadwal) {
        $data = [
            'jadwal' => $this->model_prodi->get_db('ak_jadwal', ['id_jadwal' => $id_jadwal]),
            'listd' => $this->model_prodi->get_db('ak_dosen', ['id_prodi' => $this->session->id], 'result'),
            'listm' => $this->model_prodi->get_db('ak_matkul', ['id_prodi' => $this->session->id], 'result'),
            'listr' => $this->model_prodi->get_db('ak_ruangan'),
            'hari' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/updatejadwal', $data);
        $this->load->view('_partials/script');
    }

    //==================== MATKUL ====================//

    public function datamatkul() {
        $data = [
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $this->session->id]),
            'listm' => $this->model_matkul->get_matkul($this->session->id),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/datamatkul', $data);
        $this->load->view('_partials/script');
    }

    public function detailmatkul($id_matkul) {
        $data = [
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $this->session->id]),
            'matkul' => $this->model_prodi->get_db('ak_matkul', ['id_matkul' => $id_matkul]),
            'listd' => $this->model_prodi->get_db('ak_dosen', ['id_prodi' => $this->session->id], 'result'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/detailmatkul', $data);
        $this->load->view('_partials/script');
    }

    public function creatematkul() {
        $data = [
            'listd' => $this->model_prodi->get_db('ak_dosen', ['id_prodi' => $this->session->id], 'result'),
            'jenis' => ['Wajib Umum', 'Wajib Nasional', 'Wajib Fakultas', 'Wajib Prodi', 'Pilihan', 'Peminatan', 'Tugas Akhir', 'MBKM'],
            'kategori' => ['Teori', 'Praktikum'],
            'semester' => [1, 2, 3, 4, 5, 6, 7, 8],
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('matkul/create', $data);
        $this->load->view('_partials/script');
    }

    public function updatematkul($id_matkul) {
        $data = [
            'matkul' => $this->model_prodi->get_db('ak_matkul', ['id_matkul' => $id_matkul]),
            'listd' => $this->model_prodi->get_db('ak_dosen', ['id_prodi' => $this->session->id], 'result'),
            'jenis' => ['Wajib Umum', 'Wajib Nasional', 'Wajib Fakultas', 'Wajib Prodi', 'Pilihan', 'Peminatan', 'Tugas Akhir', 'MBKM'],
            'kategori' => ['Teori', 'Praktikum'],
            'semester' => [1, 2, 3, 4, 5, 6, 7, 8],
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('matkul/update', $data);
        $this->load->view('_partials/script');
    }

    //==================== PENGUMUMAN ====================//

    public function pengumuman() {
        $data = [
            'listp' => $this->model_prodi->get_db('ak_pengumuman'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/pengumuman/pengumuman', $data);
        $this->load->view('_partials/script');
    }

    public function inputpengumuman() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/pengumuman/createpengumuman');
        $this->load->view('_partials/script');
    }

    public function ubahpengumuman($id_pengumuman) {
        $data = [
            'pengumuman' => $this->model_pengumuman->get_db('ak_pengumuman', ['id_pengumuman' => $id_pengumuman]),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/pengumuman/updatepengumuman', $data);
        $this->load->view('_partials/script');
    }

    public function setpengumuman() {
        $this->model_pengumuman->set_pengumuman();
        redirect('prodi/pengumuman');
    }

    public function updatepengumuman($id_pengumuman) {
        $this->model_pengumuman->update_pengumuman($id_pengumuman);
        redirect('prodi/pengumuman');
    }

    public function deletepengumuman($id_pengumuman) {
        $this->model_pengumuman->delete_pengumuman($id_pengumuman);
        redirect('prodi/pengumuman');
    }

    //==================== PERKULIAHAN ====================//

    public function perkuliahan() {
        $data = [
            'prodi' => $this->model_prodi->get_db('ak_prodi', ['id_prodi' => $this->session->id]),
            'listj' => $this->model_jadwal->get_jadwal($this->session->id, 'jadwal'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/perkuliahan', $data);
        $this->load->view('_partials/script');
    }

    public function presensi($id_matkul) {
        $matkul = $this->model_prodi->get_db('ak_matkul', ['id_matkul' => $id_matkul]);
        if ($matkul['id_prodi'] !== $this->session->id) redirect(strtolower($this->session->access));

        $pertemuan = [];
        $pertemuan_validation = [];

        for ($i = 1; $i <= 16; $i++) {
            $listp = $this->model_dosen->get_presensi($id_matkul, $i);

            foreach ($listp as $presensi) {
                $pertemuan[$presensi['id_krs']][$i - 1] = $presensi['kehadiran'];
            }

            if ($this->model_dosen->get_presensi($id_matkul, $i, 'validation')) array_push($pertemuan_validation, 'true');
            else array_push($pertemuan_validation, 'false');
        }

        $data = [
            'matkul' => $matkul,
            'pertemuan' => $pertemuan_validation,
            'presensi' => $pertemuan,
            'listm' => $this->model_dosen->get_mhs($id_matkul),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/presensi', $data);
        $this->load->view('_partials/script');
    }

    public function bap($id_matkul) {
        $matkul = $this->model_prodi->get_db('ak_matkul', ['id_matkul' => $id_matkul]);
        if ($matkul['id_prodi'] !== $this->session->id) redirect(strtolower($this->session->access));

        $list_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $pertemuan_validation = [];
        $list_presensi = [];

        for ($i = 1; $i <= 16; $i++) {
            $listp = $this->model_dosen->get_presensi($id_matkul, $i);

            if ($this->model_dosen->get_presensi($id_matkul, $i, 'validation')) array_push($pertemuan_validation, 'true');
            else array_push($pertemuan_validation, 'false');

            foreach ($listp as $presensi) {
                if ($presensi['pertemuan'] == $i) {
                    $create = date_create($presensi['tanggal']);
                    $date = date_format($create, 'Y-m-d');
                    $day = date('w', strtotime($date));

                    $list_presensi[$i] = $list_hari[$day] . ', ' . $this->indonesian_date($date) . ' (' . $presensi['pukul'] . ')';
                    break;
                }
            }
        }

        $data = [
            'matkul' => $matkul,
            'pertemuan' => $pertemuan_validation,
            'tanggal' => $list_presensi,
            'listb' => $this->model_dosen->get_bap($id_matkul),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/bap', $data);
        $this->load->view('_partials/script');
    }

    public function nilai($id_matkul) {
        $matkul = $this->model_prodi->get_db('ak_matkul', ['id_matkul' => $id_matkul]);
        if ($matkul['id_prodi'] !== $this->session->id) redirect(strtolower($this->session->access));

        $data = [
            'matkul' => $matkul,
            'listm' => $this->model_dosen->get_mhs($id_matkul),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/nilai', $data);
        $this->load->view('_partials/script');
    }

    public function biayakuliah($nim) {
        $listb = $this->model_pembayaran->get_pembayaran($nim);
        $total_tunggakan = 0;
        $total_terbayar = 0;

        foreach ($listb as $bayar) {
            $total_tunggakan += $bayar['BILLAM'];
            $total_terbayar += $bayar['PAIDAM'];
        }

        $data = [
            'keuangan' => $this->model_pembayaran->get_va($nim),
            'mahasiswa' => $this->model_mahasiswa->get_db('ak_mahasiswa', ['nim' => $nim]),
            'terbayar' => $total_terbayar,
            'tunggakan' => $total_tunggakan,
            'listb' => $listb,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/biaya', $data);
        $this->load->view('_partials/script');
    }

    private function indonesian_date($date) {
        $month = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $exp = explode('-', $date);

        return $exp[2] . ' ' . $month[(int)$exp[1]] . ' ' . $exp[0];
    }
}
