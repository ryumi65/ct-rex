<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Mahasiswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_mahasiswa');
        $this->load->model('model_jadwal');
        $this->load->model('model_krs');

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 4) redirect(strtolower($this->session->access));
    }

    public function index() {
        if (uri_string() === 'mahasiswa/index') return redirect('mahasiswa');

        $akun = $this->model_mahasiswa->get_db('akun', ['id_akun' => $this->session->id]);
        $list_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $list_sks = $this->model_krs->get_sks($this->session->id);
        $jumlah_sks = 0;
        $ip = [];

        for ($i = 0; $i < count($list_sks); $i++) {
            $sks = intval($list_sks[$i]['sks']);
            $jumlah_sks += $sks;
        }

        for ($i = 1; $i <= 8; $i++) {
            $jumlah_ip = 0;

            $list_krs = $this->model_krs->get_krs_smt($this->session->id, $i);

            foreach ($list_krs as $value) {
                $presensi = round(($value['nilai_presensi'] * 15) / 100, 2);
                $tugas = round(($value['nilai_tugas'] * 15) / 100, 2);
                $uts = round(($value['nilai_uts'] * 30) / 100, 2);
                $uas = round(($value['nilai_uas'] * 40) / 100, 2);

                $akhir = $presensi + $tugas + $uts + $uas;

                if ($akhir >= 80 && $akhir <= 100) $indeks = 4;
                elseif ($akhir >= 77 && $akhir < 80) $indeks = 3.75;
                elseif ($akhir >= 74 && $akhir < 77) $indeks = 3.5;
                elseif ($akhir >= 68 && $akhir < 74) $indeks = 3;
                elseif ($akhir >= 65 && $akhir < 68) $indeks = 2.75;
                elseif ($akhir >= 62 && $akhir < 65) $indeks = 2.5;
                elseif ($akhir >= 56 && $akhir < 62) $indeks = 2;
                elseif ($akhir >= 41 && $akhir < 56) $indeks = 1;
                elseif ($akhir < 41) $indeks = 0;

                $jumlah_ip += $indeks;
            }

            if (count($list_krs) > 0) $total_ip = round($jumlah_ip / count($list_krs), 2);
            else $total_ip = 0;

            array_push($ip, $total_ip);
        }

        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'hari' => $list_hari[date('w')],
            'sks' => $jumlah_sks,
            'mahasiswa' => $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]),
            'listip' => $ip,
            'listj' => $this->model_krs->get_krs_mhs($this->session->id),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/dashboard', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    //==================== CRUD ====================//

    public function create() {
        $data['listp'] = $this->model_mahasiswa->get_db('prodi');

        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('mahasiswa/create', $data);
        } else {
            $this->model_mahasiswa->set_mahasiswa();
            redirect('mahasiswa');
        }
    }

    public function update($nim) {
        $data['mahasiswa'] = $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $nim]);
        $data['ortu'] = $this->model_mahasiswa->get_db('orang_tua', ['nim' => $nim]);
        $data['listp'] = $this->model_mahasiswa->get_db('prodi');

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarmhs');
            $this->load->view('_partials/header');
            $this->load->view('mahasiswa/update', $data);
            $this->load->view('_partials/loader');
            $this->load->view('_partials/script');
        } else {
            $this->model_mahasiswa->update_mahasiswa($nim);
            $this->session->set_userdata('mhssuccess', true);
            redirect('mahasiswa/profil');
        }
    }

    public function update_ortu($nim) {
        $this->model_mahasiswa->update_ortu($nim);
        $this->session->set_userdata('ortusuccess', true);
        redirect('mahasiswa/profil');
    }

    //==================== PROFIL ====================//

    public function profil() {
        $akun = $this->model_mahasiswa->get_db('akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'mahasiswa' => $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]),
            'ortu' => $this->model_mahasiswa->get_db('orang_tua', ['nim' => $this->session->id]),
            'listp' => $this->model_mahasiswa->get_db('prodi'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/profil', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function update_foto() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('akun/foto');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    //==================== KRS ====================//

    public function datakrs() {
        $krs = [];
        $mk = [];
        $sks_smt = [];

        for ($i = 1; $i <= 8; $i++) {
            $jumlah_sks = 0;
            $list_sks = $this->model_krs->get_sks($this->session->id, $i);

            for ($j = 0; $j < count($list_sks); $j++) {
                $sks = intval($list_sks[$j]['sks']);
                $jumlah_sks += $sks;
            }

            array_push($krs, $this->model_krs->get_krs_smt($this->session->id, $i));
            array_push($mk, $this->model_krs->get_mk($this->session->id, $i));
            array_push($sks_smt, $jumlah_sks);
        }

        $data = [
            'listk' => $krs,
            'listm' => $mk,
            'lists' => $sks_smt,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/datakrs', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function formkrs($semester) {
        $mahasiswa = $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]);

        $data = [
            'mahasiswa' => $mahasiswa,
            'semester' => $semester,
            'listk' => $this->model_krs->get_list_krs($mahasiswa['id_prodi'], $semester),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/formkrs', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function deletekrs($nim, $id_jadwal) {
        $this->model_krs->delete_krs($nim, $id_jadwal);

        redirect('mahasiswa/perkuliahan/data-krs');
    }

    //==================== PRESENSI ====================//

    public function jadwalkuliah() {
        $data = [
            'mahasiswa' => $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]),
            'listj' => $this->model_krs->get_krs_mhs($this->session->id, 'all'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/jadwal', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function presensi($id_matkul) {
        $matkul = $this->model_mahasiswa->get_db('matkul', ['id_matkul' => $id_matkul]);
        if (!$this->model_mahasiswa->presensi_validation($this->session->id, $id_matkul)) redirect(strtolower($this->session->access));

        $pertemuan = [];

        for ($i = 1; $i <= 16; $i++) {
            $listp = $this->model_mahasiswa->get_presensi($this->session->id, $id_matkul, $i);

            foreach ($listp as $presensi) {
                $pertemuan[] = $presensi['kehadiran'];
            }
        }

        $data = [
            'matkul' => $matkul,
            'presensi' => $pertemuan,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/presensi', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function rekappresensi() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/rekapabsen');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    //==================== NILAI ====================//

    public function datakhs() {
        $ip = [];
        $krs = [];
        $sks_smt = [];

        for ($i = 1; $i <= 8; $i++) {
            $jumlah_ip = 0;
            $jumlah_sks = 0;

            $list_krs = $this->model_krs->get_krs_smt($this->session->id, $i);

            foreach ($list_krs as $value) {
                $presensi = round(($value['nilai_presensi'] * 15) / 100, 2);
                $tugas = round(($value['nilai_tugas'] * 15) / 100, 2);
                $uts = round(($value['nilai_uts'] * 30) / 100, 2);
                $uas = round(($value['nilai_uas'] * 40) / 100, 2);

                $akhir = $presensi + $tugas + $uts + $uas;

                if ($akhir >= 80 && $akhir <= 100) $indeks = 4;
                elseif ($akhir >= 77 && $akhir < 80) $indeks = 3.75;
                elseif ($akhir >= 74 && $akhir < 77) $indeks = 3.5;
                elseif ($akhir >= 68 && $akhir < 74) $indeks = 3;
                elseif ($akhir >= 65 && $akhir < 68) $indeks = 2.75;
                elseif ($akhir >= 62 && $akhir < 65) $indeks = 2.5;
                elseif ($akhir >= 56 && $akhir < 62) $indeks = 2;
                elseif ($akhir >= 41 && $akhir < 56) $indeks = 1;
                elseif ($akhir < 41) $indeks = 0;

                $jumlah_ip += $indeks;
            }

            if (count($list_krs) > 0) $total_ip = round($jumlah_ip / count($list_krs), 2);
            else $total_ip = 0;

            $list_sks = $this->model_krs->get_sks($this->session->id, $i);

            for ($j = 0; $j < count($list_sks); $j++) {
                $sks = intval($list_sks[$j]['sks']);
                $jumlah_sks += $sks;
            }

            array_push($ip, $total_ip);
            array_push($krs, $list_krs);
            array_push($sks_smt, $jumlah_sks);
        }

        $data = [
            'listip' => $ip,
            'listk' => $krs,
            'lists' => $sks_smt,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/datakhs', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function transkrip() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/transkrip');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }
}
