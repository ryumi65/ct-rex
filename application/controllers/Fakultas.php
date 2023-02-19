<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_fakultas');
        $this->load->model('model_jadwal');
        $this->load->model('model_krs');
        $this->load->model('model_matkul');
        $this->load->model('model_pengumuman');

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 1) redirect(strtolower($this->session->access));
    }

    public function index() {
        if (uri_string() === 'fakultas/index') return redirect('fakultas');

        $akun = $this->model_fakultas->get_db('ak_akun', ['id_akun' => $this->session->id]);
        $listp = $this->model_fakultas->get_db('ak_prodi', ['id_fakultas' => $this->session->id], 'result');
        $jdosen = 0;
        $jmhs = 0;

        foreach ($listp as $prodi) {
            $jumlah_dosen = $this->model_fakultas->get_db_count('ak_dosen', ['id_prodi' => $prodi['id_prodi'], 'status_dosen' => 'Aktif']);
            $jumlah_mhs = $this->model_fakultas->get_db_count('ak_mahasiswa', ['id_prodi' => $prodi['id_prodi'], 'status' => 'Aktif']);

            $jdosen += $jumlah_dosen;
            $jmhs += $jumlah_mhs;
        }

        $data = [
            'header' => $akun['foto_header'],
            'profil' => $akun['foto_profil'],
            'fakultas' => $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]),
            'jdosen' => $jdosen,
            'jmhs' => $jmhs,
            'jprodi' => $this->model_fakultas->get_db_count('ak_prodi', ['id_fakultas' => $this->session->id]),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil() {
        $data = [
            'fakultas' => $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/profil/profil', $data);
        $this->load->view('_partials/script');
    }

    //==================== AKADEMIK ====================//

    public function datamatkul() {
        $data = [
            'fakultas' => $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]),
            'listm' => $this->model_matkul->get_matkul_fks($this->session->id),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/akademik/datamatkul', $data);
        $this->load->view('_partials/script');
    }

    //==================== PRODI ====================//

    public function dataprd() {
        $listp = $this->model_fakultas->get_db('ak_prodi', ['id_fakultas' => $this->session->id], 'result');
        $jumlah = [];

        foreach ($listp as $prodi) {
            $jumlah_dosen = $this->model_fakultas->get_db_count('ak_dosen', ['id_prodi' => $prodi['id_prodi'], 'status_dosen' => 'Aktif']);
            $jumlah_mhs = $this->model_fakultas->get_db_count('ak_mahasiswa', ['id_prodi' => $prodi['id_prodi'], 'status' => 'Aktif']);

            $count = [
                'nama' => $prodi['nama'],
                'jdosen' => $jumlah_dosen,
                'jmhs' => $jumlah_mhs
            ];

            $jumlah[] = $count;
        }

        $data = [
            'fakultas' => $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]),
            'listp' => $jumlah,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/civitas/dataprodi', $data);
        $this->load->view('_partials/script');
    }

    public function datamatkulprd() {
        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/civitas/datamatkulprd', $data);
        $this->load->view('_partials/script');
    }

    public function jadwalkuliah($id_prodi) {
        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/civitas/jadwalkuliah', $data);
        $this->load->view('_partials/script');
    }

    public function perkuliahan() {
        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/civitas/perkuliahan', $data);
        $this->load->view('_partials/script');
    }

    //==================== DOSEN ====================//

    public function datadsn() {
        $data = [
            'fakultas' => $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]),
            'listd' => $this->model_fakultas->get_dosen(),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/civitas/datadosen', $data);
        $this->load->view('_partials/script');
    }

    public function profildsn($nik) {
        $dosen = $this->model_fakultas->get_dosen($nik);
        if ($dosen['id_fakultas'] !== $this->session->id) redirect(strtolower($this->session->access));

        if (isset($dosen['tanggal_lahir'])) $tanggal_lahir = $this->indonesian_date($dosen['tanggal_lahir']);
        else $tanggal_lahir = $dosen['tanggal_lahir'];

        $data = [
            'dosen' => $this->model_fakultas->get_db('ak_dosen', ['nik' => $nik]),
            'prodi' => $this->model_fakultas->get_db('ak_prodi', ['id_prodi' => $dosen['id_prodi']]),
            'tanggal_lahir' => $tanggal_lahir,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/civitas/profildsn', $data);
        $this->load->view('_partials/script');
    }

    public function datamengajar($nik) {
        $data = [
            'dosen' => $this->model_fakultas->get_db('ak_dosen', ['nik' => $nik]),
            'listj' => $this->model_jadwal->get_jadwal_dsn($nik),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/civitas/datamengajar', $data);
        $this->load->view('_partials/script');
    }

    //==================== MAHASISWA ====================//

    public function datamhs() {
        $data = [
            'fakultas' => $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]),
            'listm' => $this->model_fakultas->get_mhs(),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/civitas/datamhs', $data);
        $this->load->view('_partials/script');
    }

    public function profilmhs($nim) {
        $mahasiswa = $this->model_fakultas->get_mhs($nim);
        if ($mahasiswa['id_fakultas'] !== $this->session->id) redirect(strtolower($this->session->access));

        if (isset($mahasiswa['tanggal_lahir'])) $tanggal_lahir = $this->indonesian_date($mahasiswa['tanggal_lahir']);
        else $tanggal_lahir = $mahasiswa['tanggal_lahir'];

        $data = [
            'dosen' => $this->model_fakultas->get_db('ak_dosen', ['nik' => $mahasiswa['dosen_wali']]),
            'mahasiswa' => $this->model_fakultas->get_db('ak_mahasiswa', ['nim' => $nim]),
            'ortu' => $this->model_fakultas->get_db('ak_orang_tua', ['nim' => $nim]),
            'prodi' => $this->model_fakultas->get_db('ak_prodi', ['id_prodi' => $mahasiswa['id_prodi']]),
            'tanggal_lahir' => $tanggal_lahir,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/civitas/profilmhs', $data);
        $this->load->view('_partials/script');
    }

    public function berkasmhs($nim) {
        $mahasiswa = $this->model_fakultas->get_mhs($nim);
        if ($mahasiswa['id_fakultas'] !== $this->session->id) redirect(strtolower($this->session->access));

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
            'mahasiswa' => $this->model_fakultas->get_db('ak_mahasiswa', ['nim' => $nim]),
            'ipk' => $total_ipk,
            'listip' => $ip,
            'listk' => $krs,
            'listm' => $mk,
            'lists' => $sks_smt,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/civitas/berkasmhs', $data);
        $this->load->view('_partials/script');
    }

    //==================== PENGUMUMAN ====================//

    public function pengumuman() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/pengumuman/pengumuman');
        $this->load->view('_partials/script');
    }

    public function tambahpengumuman() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/pengumuman/createpengumuman');
        $this->load->view('_partials/script');
    }

    public function updatepengumuman() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/pengumuman/updatepengumuman');
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
