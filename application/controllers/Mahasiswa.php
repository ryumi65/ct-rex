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

        $akun = $this->model_mahasiswa->get_db('ak_akun', ['id_akun' => $this->session->id]);
        $list_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $list_sks = $this->model_krs->get_sks($this->session->id);
        $jumlah_sks = 0;
        $ip = [];

        foreach ($list_sks as $value) {
            if (isset($value['nilai'])) {
                if ($value['nilai'] >= 56 && $value['nilai'] <= 100) {
                    $sks = intval($value['sks']);
                    $jumlah_sks += $sks;
                }
            }
        }

        for ($i = 1; $i <= 8; $i++) {
            $jumlah_krs = 0;
            $jumlah_ip = 0;

            $list_krs = $this->model_krs->get_krs_smt($this->session->id, $i);

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

            if ($jumlah_krs > 0) $total_ip = round($jumlah_ip / $jumlah_krs, 2);
            else $total_ip = 0;

            array_push($ip, $total_ip);
        }

        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'hari' => $list_hari[date('w')],
            'sks' => $jumlah_sks,
            'mahasiswa' => $this->model_mahasiswa->get_db('ak_mahasiswa', ['nim' => $this->session->id]),
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
        $data['listp'] = $this->model_mahasiswa->get_db('ak_prodi');

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
        $data['mahasiswa'] = $this->model_mahasiswa->get_db('ak_mahasiswa', ['nim' => $nim]);
        $data['ortu'] = $this->model_mahasiswa->get_db('ak_orang_tua', ['nim' => $nim]);
        $data['listp'] = $this->model_mahasiswa->get_db('ak_prodi');

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
        $akun = $this->model_mahasiswa->get_db('ak_akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'mahasiswa' => $this->model_mahasiswa->get_db('ak_mahasiswa', ['nim' => $this->session->id]),
            'ortu' => $this->model_mahasiswa->get_db('ak_orang_tua', ['nim' => $this->session->id]),
            'listp' => $this->model_mahasiswa->get_db('ak_prodi'),
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
        $tahun = $this->model_mahasiswa->get_db('ak_durasi', ['id_tahun' => $this->session->tahun]);

        $create_tanggal_awal = date_create($tahun['tanggal_awal']);
        $create_tanggal_akhir = date_create($tahun['tanggal_akhir']);
        $tanggal_awal = date_format($create_tanggal_awal, 'Y-m-d');
        $tanggal_akhir = date_format($create_tanggal_akhir, 'Y-m-d');

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
            'mahasiswa' => $this->model_mahasiswa->get_db('ak_mahasiswa', ['nim' => $this->session->id]),
            'tanggal' => date('Y-m-d'),
            'tanggal_awal' => $this->indonesian_date($tanggal_awal),
            'tanggal_akhir' => $this->indonesian_date($tanggal_akhir),
            'tahun' => $tahun,
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

    public function formkrs() {
        $mahasiswa = $this->model_mahasiswa->get_db('ak_mahasiswa', ['nim' => $this->session->id]);
        $tahun = $this->model_mahasiswa->get_db('ak_durasi', ['id_tahun' => $this->session->tahun]);
        $tanggal_awal = date_create($tahun['tanggal_awal']);
        $tanggal_akhir = date_create($tahun['tanggal_akhir']);

        if (
            date('Y-m-d') < date_format($tanggal_awal, 'Y-m-d') ||
            date('Y-m-d') > date_format($tanggal_akhir, 'Y-m-d')
        ) redirect('mahasiswa/perkuliahan/data-krs');

        if ($mahasiswa['semester'] % 2 === 0) {
            $krs = [
                2 => $this->model_krs->get_list_krs($mahasiswa['id_prodi'], 2),
                4 => $this->model_krs->get_list_krs($mahasiswa['id_prodi'], 4),
                6 => $this->model_krs->get_list_krs($mahasiswa['id_prodi'], 6),
                8 => $this->model_krs->get_list_krs($mahasiswa['id_prodi'], 8),
            ];
            $semester = 0;
        } elseif ($mahasiswa['semester'] % 2 === 1) {
            $krs = [
                1 => $this->model_krs->get_list_krs($mahasiswa['id_prodi'], 1),
                3 => $this->model_krs->get_list_krs($mahasiswa['id_prodi'], 3),
                5 => $this->model_krs->get_list_krs($mahasiswa['id_prodi'], 5),
                7 => $this->model_krs->get_list_krs($mahasiswa['id_prodi'], 7),
            ];
            $semester = 1;
        }

        $data = [
            'mahasiswa' => $mahasiswa,
            'semester' => $semester,
            'listj' => $krs,
            'listk' => $this->model_mahasiswa->get_db('ak_krs', ['nim' => $this->session->id], 'result'),
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

    //==================== PRESENSI ====================//

    public function jadwalkuliah() {
        $list_hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        foreach ($list_hari as $hari) {
            $listj[$hari] = $this->model_krs->get_krs_mhs($this->session->id, $hari);
        }

        $data = [
            'mahasiswa' => $this->model_mahasiswa->get_db('ak_mahasiswa', ['nim' => $this->session->id]),
            'listh' => $list_hari,
            'listj' => $listj,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/jadwal', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function presensi($id_matkul) {
        $matkul = $this->model_mahasiswa->get_db('ak_matkul', ['id_matkul' => $id_matkul]);
        if (!$this->model_mahasiswa->presensi_validation($this->session->id, $id_matkul)) redirect(strtolower($this->session->access));

        $pertemuan = [];

        for ($i = 1; $i <= 16; $i++) {
            $listp = $this->model_mahasiswa->get_presensi($this->session->id, $id_matkul, $i);

            foreach ($listp as $presensi) {
                $pertemuan[$i - 1] = $presensi['kehadiran'];
            }
        }

        $data = [
            'matkul' => $matkul,
            'presensi' => $pertemuan,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/rekapabsen', $data);
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

        $count_ipk = 0;
        $ipk = 0;

        for ($i = 1; $i <= 8; $i++) {
            $jumlah_krs = 0;
            $jumlah_ip = 0;
            $jumlah_sks = 0;

            $list_krs = $this->model_krs->get_krs_smt($this->session->id, $i);

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

            $list_sks = $this->model_krs->get_sks($this->session->id, $i);

            for ($j = 0; $j < count($list_sks); $j++) {
                $sks = intval($list_sks[$j]['sks']);
                $jumlah_sks += $sks;
            }

            array_push($ip, $total_ip);
            array_push($krs, $list_krs);
            array_push($sks_smt, $jumlah_sks);
        }

        if ($count_ipk > 0) $total_ipk = round($ipk / $count_ipk, 2);
        else $total_ipk = 0;

        $data = [
            'mahasiswa' => $this->model_mahasiswa->get_db('ak_mahasiswa', ['nim' => $this->session->id]),
            'ipk' => $total_ipk,
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

    // CATATAN STUDI
    public function catatanstudi() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/listcstudi');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function tambahperwalian() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/formcstudi');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }
}
