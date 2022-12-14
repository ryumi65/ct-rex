<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_prodi');
        $this->load->model('model_dosen');
        $this->load->model('model_mahasiswa');
        $this->load->model('model_matkul');

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 2) redirect(strtolower($this->session->access));
    }

    public function index() {
        if (uri_string() === 'prodi/index') return redirect('prodi');

        $akun = $this->model_prodi->get_db('akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'prodi' => $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]),
            'dsnaktif' => $this->model_prodi->get_db_count('dosen', ['id_prodi' => $this->session->id, 'status_dosen' => 'aktif']),
            'mhsaktif' => $this->model_prodi->get_db_count('mahasiswa', ['id_prodi' => $this->session->id, 'status' => 'aktif']),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil() {
        $akun = $this->model_prodi->get_db('akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'prodi' => $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]),
            'dsnaktif' => $this->model_prodi->get_db_count('dosen', ['id_prodi' => $this->session->id, 'status_dosen' => 'aktif']),
            'mhsaktif' => $this->model_prodi->get_db_count('mahasiswa', ['id_prodi' => $this->session->id, 'status' => 'aktif']),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profil/profil', $data);
        $this->load->view('_partials/script');
    }

    public function datadsn() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listd'] = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/datadsn', $data);
        $this->load->view('_partials/script');
    }

    public function datamhs() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listm'] = $this->model_prodi->get_db('mahasiswa', ['id_prodi' => $this->session->id], 'result');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/datamhs', $data);
        $this->load->view('_partials/script');
    }

    public function datadsnwl() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listd'] = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');
        $data['mhswl'] = $this->jumlah_mhs_wali();

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/datadsnwl', $data);
        $this->load->view('_partials/script');
    }

    public function datamhswl($nik) {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['dosen'] = $this->model_prodi->get_db('dosen', ['nik' => $nik]);
        $data['listm'] = $this->model_prodi->get_db('mahasiswa', ['dosen_wali' => $nik], 'result');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/datamhswl', $data);
        $this->load->view('_partials/script');
    }

    public function datamatkul() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listm'] = $this->model_prodi->get_db('matkul', ['id_prodi' => $this->session->id], 'result');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/datamatkul', $data);
        $this->load->view('_partials/script');
    }

    public function profilmhs($nim) {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listp'] = $this->model_prodi->get_db('prodi');
        $data['mahasiswa'] = $this->model_prodi->get_db('mahasiswa', ['nim' => $nim]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/profilmhs', $data);
        $this->load->view('_partials/script');
    }

    public function profildsn($nik) {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listp'] = $this->model_prodi->get_db('prodi');
        $data['dosen'] = $this->model_prodi->get_db('dosen', ['nik' => $nik]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/civitas/profildsn', $data);
        $this->load->view('_partials/script');
    }

    public function detailmatkul($id_matkul) {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['matkul'] = $this->model_prodi->get_db('matkul', ['id_matkul' => $id_matkul]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/detailmatkul', $data);
        $this->load->view('_partials/script');
    }

    public function jadwalkuliah() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/jadwalkuliah', $data);
        $this->load->view('_partials/script');
    }

    public function createjdwl() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/akademik/createjdwl', $data);
        $this->load->view('_partials/script');
    }

    public function creatematkul() {
        $data['listd'] = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');
        $data['lists'] = $this->model_prodi->get_db('semester');

        $this->form_validation->set_rules('kode_matkul', 'Kode Matkul', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('matkul/create', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_matkul->set_matkul();
            $this->session->set_userdata('createmksuccess', true);
            redirect('prodi/akademik/data-matkul');
        }
    }

    public function createwali() {
        $data['listd'] = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');
        $data['listm'] = $this->model_prodi->get_db('mahasiswa', ['id_prodi' => $this->session->id, 'dosen_wali' => null], 'result');

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

    public function updatedsn($nik) {
        $data['dosen'] = $this->model_prodi->get_db('dosen', ['nik' => $nik]);
        $data['listp'] = $this->model_prodi->get_db('prodi');

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

    public function updatemhs($nim) {
        $data['mahasiswa'] = $this->model_prodi->get_db('mahasiswa', ['nim' => $nim]);
        $data['listp'] = $this->model_prodi->get_db('prodi');

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('prodi/civitas/updatemhs', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_mahasiswa->update_mahasiswa($nim);
            redirect('prodi/civitas/data-mahasiswa');
        }
    }

    public function updatematkul($id_matkul) {
        $data['matkul'] = $this->model_prodi->get_db('matkul', ['id_matkul' => $id_matkul]);
        $data['listd'] = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');
        $data['lists'] = $this->model_prodi->get_db('semester');
        $data['jenis'] = ['wajib', 'wajib prodi', 'pilihan', 'peminatan', 'tugas akhir'];
        $data['kategori'] = ['teori', 'praktikum'];

        $this->form_validation->set_rules('kode_matkul', 'Kode Matkul', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('matkul/update', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_matkul->update_matkul($id_matkul);
            $this->session->set_userdata('updatemksuccess', true);
            redirect('prodi/akademik/data-matkul');
        }
    }

    public function deletedsn($nik) {
        $this->model_dosen->delete_dosen($nik);
        redirect('prodi/civitas/data-dosen');
    }

    public function deletemhs($nim) {
        $this->model_mahasiswa->delete_mahasiswa($nim);
        redirect('prodi/civitas/data-mahasiswa');
    }

    public function deletematkul($id_matkul) {
        $this->model_matkul->delete_matkul($id_matkul);
        redirect('prodi/akademik/data-matkul');
    }

    public function deletemhswl($nik, $nim) {
        if ($this->model_prodi->get_db('mahasiswa', ['nim' => $nim, 'dosen_wali' => $nik])) {
            $this->model_prodi->delete_mhs_wali($nim);
            redirect('prodi/civitas/data-dosen-wali/' . $nik);
        }
    }

    public function create() {
        $data['listf'] = $this->model_prodi->get_db('fakultas');

        $this->form_validation->set_rules('id_prodi', 'ID Prodi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_fakultas', 'ID Fakultas', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('prodi/create', $data);
        } else {
            $this->model_prodi->set_prodi();
            redirect('prodi');
        }
    }

    public function update() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listf'] = $this->model_prodi->get_db('fakultas');

        $this->form_validation->set_rules('id_prodi', 'ID Prodi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_fakultas', 'ID Fakultas', 'required');


        if (!$this->form_validation->run()) {
            $this->load->view('prodi/update', $data);
        } else {
            $this->model_prodi->update_prodi($this->session->id);
            redirect('prodi/profil');
        }
    }

    private function jumlah_mhs_wali() {
        $listd = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');

        foreach ($listd as $dosen) {
            $jumlah = $this->model_prodi->get_count_mhs_wali($dosen['nik']);

            $data[$dosen['nik']] = $jumlah;
        }

        return $data;
    }
}
