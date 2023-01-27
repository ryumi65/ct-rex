<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dosen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_dosen');
        $this->load->model('model_jadwal');
        $this->load->model('model_krs');

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 3) redirect(strtolower($this->session->access));
    }

    public function index() {
        if (uri_string() === 'dosen/index') return redirect('dosen');

        $akun = $this->model_dosen->get_db('ak_akun', ['id_akun' => $this->session->id]);
        $list_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'hari' => $list_hari[date('w')],
            'dosen' => $this->model_dosen->get_db('ak_dosen', ['nik' => $this->session->id]),
            'mhswali' => $this->model_dosen->get_db_count('ak_mahasiswa', ['dosen_wali' => $this->session->id]),
            'listj' => $this->model_jadwal->get_jadwal_dsn($this->session->id),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/dashboard', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function profil() {
        $akun = $this->model_dosen->get_db('ak_akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'dosen' => $this->model_dosen->get_db('ak_dosen', ['nik' => $this->session->id]),
            'mhswali' => $this->model_dosen->get_db_count('ak_mahasiswa', ['dosen_wali' => $this->session->id]),
            'listp' => $this->model_dosen->get_db('ak_prodi'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/profil', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function jadwalkuliah() {
        $data = [
            'dosen' => $this->model_dosen->get_db('ak_dosen', ['nik' => $this->session->id]),
            'listj' => $this->model_jadwal->get_jadwal_dsn($this->session->id, 'all'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/jadwal', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function update_foto() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('akun/foto');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function create() {
        $data['listp'] = $this->model_dosen->get_db('ak_prodi');

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('id_prodi', 'ID Prodi', 'required');
        $this->form_validation->set_rules('nidn_dosen', 'NIDN Dosen', 'required');
        $this->form_validation->set_rules('status_dosen', 'Status Dosen', 'required');
        $this->form_validation->set_rules('status_kerja', 'Status Kerja', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('dosen/create', $data);
        } else {
            $this->model_dosen->set_dosen();
            redirect('dosen');
        }
    }

    public function update($nik) {
        $data = [
            'dosen' => $this->model_dosen->get_db('ak_dosen', ['nik' => $nik]),
            'listp' => $this->model_dosen->get_db('ak_prodi'),
            'status_dosen' => ['Aktif', 'Cuti', 'Keluar', 'Almarhum', 'Pensiun', 'Studi Lanjut', 'Tugas di Instansi Lain'],
            'status_kerja' => ['Dosen Tetap', 'Dosen PNS di Pekerjaan', 'Dosen Honorer PTN', 'Dosen Honorer no PTN', 'Dosen Kontrak']
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/update', $data);
            $this->load->view('_partials/loader');
            $this->load->view('_partials/script');
        } else {
            $this->model_dosen->update_dosen($nik);
            $this->session->set_userdata('updatesuccess', true);
            redirect('dosen/profil');
        }
    }

    //==================== ABSEN ====================//

    public function absen() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/absen');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function rekapabsen($id_matkul) {
        $matkul = $this->model_dosen->get_db('ak_matkul', ['id_matkul' => $id_matkul]);
        if ($matkul['nik_dosen'] !== $this->session->id) redirect(strtolower($this->session->access));

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
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/rekapabsen', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function inputabsen($id_matkul) {
        $matkul = $this->model_dosen->get_db('ak_matkul', ['id_matkul' => $id_matkul]);
        if ($matkul['nik_dosen'] !== $this->session->id) redirect(strtolower($this->session->access));

        $data = [
            'matkul' => $matkul,
            'listm' => $this->model_dosen->get_mhs($id_matkul),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/inputabsen', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function updateabsen($id_matkul, $pertemuan) {
        $matkul = $this->model_dosen->get_db('ak_matkul', ['id_matkul' => $id_matkul]);
        if ($matkul['nik_dosen'] !== $this->session->id) redirect(strtolower($this->session->access));

        $data = [
            'matkul' => $matkul,
            'pertemuan' => $pertemuan,
            'listm' => $this->model_dosen->get_mhs($id_matkul),
            'listp' => $this->model_dosen->get_presensi($id_matkul, $pertemuan),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/updateabsen', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function inputpresensi($id_matkul) {
        $this->model_dosen->set_presensi($id_matkul);
        redirect('dosen/perkuliahan/presensi/' . $id_matkul);
    }

    public function updatepresensi($id_matkul, $pertemuan) {
        $this->model_dosen->update_presensi($id_matkul, $pertemuan);
        redirect('dosen/perkuliahan/presensi/' . $id_matkul);
    }

    //==================== NILAI ====================//

    public function nilai($id_matkul) {
        $matkul = $this->model_dosen->get_db('ak_matkul', ['id_matkul' => $id_matkul]);
        if ($matkul['nik_dosen'] !== $this->session->id) redirect(strtolower($this->session->access));

        $data = [
            'matkul' => $matkul,
            'listm' => $this->model_dosen->get_mhs($id_matkul, $this->session->id),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/nilai', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function inputnilai($id_matkul) {
        $matkul = $this->model_dosen->get_db('ak_matkul', ['id_matkul' => $id_matkul]);
        if ($matkul['nik_dosen'] !== $this->session->id) redirect(strtolower($this->session->access));

        $data = [
            'matkul' => $matkul,
            'listm' => $this->model_dosen->get_mhs($id_matkul, $this->session->id),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/inputnilai', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function setnilai($id_matkul) {
        $this->model_dosen->set_nilai($id_matkul);

        redirect('dosen/perkuliahan/nilai/' . $id_matkul);
    }

    public function transkripmatkul() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/listmatkuldiampu');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    //==================== BIMBINGAN ====================//

    public function bimbinganakademik() {
        $lists = [];
        $listm = $this->model_dosen->get_db('ak_mahasiswa', ['dosen_wali' => $this->session->id], 'result');

        foreach ($listm as $mhs) {
            $lists[] = [
                'nim' => $mhs['nim'],
                'nama' => $mhs['nama'],
                'jenis_kelamin' => $mhs['jenis_kelamin'],
                'tahun_angkatan' => $mhs['tahun_angkatan'],
                'status' => $mhs['status'],
                'listj' => $this->model_krs->get_krs($mhs['nim']),
            ];
        }

        $data = [
            'dosen' => $this->model_dosen->get_db('ak_dosen', ['nik' => $this->session->id]),
            'lists' => $lists,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('dosen/bimbinganakademik', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }


    public function acckrs() {
        $lists = [];
        $listm = $this->model_dosen->get_db('ak_mahasiswa', ['dosen_wali' => $this->session->id], 'result');

        foreach ($listm as $mhs) {
            $listj = $this->model_krs->get_krs($mhs['nim'], 'object');

            if ($listj->num_rows() > 0) {
                $result = $listj->result_array();

                foreach ($result as $value) {
                    if ($value['status'] === 'N') {
                        $krs = 'Menunggu Persetujuan';

                        break;
                    }

                    $krs = 'Sudah KRS';
                }
            } else $krs = 'Belum KRS';

            $lists[] = [
                'nim' => $mhs['nim'],
                'nama' => $mhs['nama'],
                'jenis_kelamin' => $mhs['jenis_kelamin'],
                'krs' => $krs,
                'tahun_angkatan' => $mhs['tahun_angkatan'],
                'status' => $mhs['status'],
                'listj' => $this->model_krs->get_krs($mhs['nim']),
            ];
        }

        $data = [
            'dosen' => $this->model_dosen->get_db('ak_dosen', ['nik' => $this->session->id]),
            'lists' => $lists,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('dosen/acckrs', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function daftarmhswali() {
        $data = [
            'dosen' => $this->model_dosen->get_db('ak_dosen', ['nik' => $this->session->id]),
            'listm' => $this->model_dosen->get_db('ak_mahasiswa', ['dosen_wali' => $this->session->id], 'result'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/daftarmhswali', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    // BERKAS MAHASISWA BIMBINGAN
    public function berkasmhs($nim) {
        $mahasiswa = $this->model_dosen->get_db('ak_mahasiswa', ['nim' => $nim]);
        if ($mahasiswa['dosen_wali'] !== $this->session->id) redirect(strtolower($this->session->access));

        $krs = [];
        $mk = [];
        $sks_smt = [];

        for ($i = 1; $i <= 8; $i++) {
            $jumlah_sks = 0;
            $list_sks = $this->model_krs->get_sks($nim, $i);

            for ($j = 0; $j < count($list_sks); $j++) {
                $sks = intval($list_sks[$j]['sks']);
                $jumlah_sks += $sks;
            }

            array_push($krs, $this->model_krs->get_krs_smt($nim, $i));
            array_push($mk, $this->model_krs->get_mk($nim, $i));
            array_push($sks_smt, $jumlah_sks);
        }

        $data = [
            'mahasiswa' => $mahasiswa,
            'listk' => $krs,
            'listm' => $mk,
            'lists' => $sks_smt,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/berkasmhs', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    // BAP
    public function listmatkulbap() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/listmatkulbap');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function listbap() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/listbap');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function formbap() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/formbap');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }
}
