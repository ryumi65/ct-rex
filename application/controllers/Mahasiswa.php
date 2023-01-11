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

        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'hari' => $list_hari[date('w')],
            'mahasiswa' => $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]),
            'listj' => $this->model_krs->get_krs_mhs($this->session->id),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/dashboard', $data);
        $this->load->view('_partials/script');
    }

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
        $this->load->view('_partials/script');
    }

    public function jadwalkuliah() {
        $data = [
            'mahasiswa' => $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]),
            'listj' => $this->model_krs->get_krs_mhs($this->session->id, 'all'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/jadwalkuliah', $data);
        $this->load->view('_partials/script');
    }

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
        $this->load->view('mahasiswa/datakrs1', $data);
        $this->load->view('_partials/script');
    }

    public function formkrs() {
        $mahasiswa = $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]);

        $krs = [];
        for ($i = 1; $i <= 8; $i++) {
            array_push($krs, $this->model_krs->get_list_krs($mahasiswa['id_prodi'], $i));
        }

        $data = [
            'mahasiswa' => $mahasiswa,
            'listj' => $krs,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/formkrs', $data);
        $this->load->view('_partials/script');
    }

    public function deletekrs($nim, $id_jadwal) {
        $this->model_krs->delete_krs($nim, $id_jadwal);

        redirect('mahasiswa/perkuliahan/data-krs');
    }

    public function update_foto() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('akun/foto');
        $this->load->view('_partials/script');
    }

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
}
