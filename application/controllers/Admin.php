<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_admin');
        $this->load->model('model_ruangan');
        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 0) redirect(strtolower($this->session->access));
    }

    public function index() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/dashboard');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function nilaimhs() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/datanilaimhs');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function datadsn() {
        $data['admin'] = $this->model_admin->join_dosen('ak_admin', ['id_admin' => $this->session->id]);
        $data['listd'] = $this->model_admin->join_dosen('ak_dosen', ['nik' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/datadsn', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function datamhs() {
        $data['admin'] = $this->model_admin->join_mhs('ak_admin', ['id_admin' => $this->session->id]);
        $data['listm'] = $this->model_admin->join_mhs('ak_mahasiswa', ['nim' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/datamhs', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function profilmhs($nim) {
        $data['admin'] = $this->model_admin->join_mhs('ak_admin', ['id_admin' => $this->session->id]);
        $data['listm'] = $this->model_admin->join_mhs('ak_admin');
        $data['mahasiswa'] = $this->model_admin->join_mhs('ak_mahasiswa', ['nim' => $nim]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/profilmhs', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function profildsn($nik) {
        $data['admin'] = $this->model_admin->join_mhs('ak_admin', ['id_admin' => $this->session->id]);
        $data['listd'] = $this->model_admin->join_mhs('ak_admin');
        $data['dosen'] = $this->model_admin->join_mhs('ak_dosen', ['nik' => $nik]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/profildsn', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function dataruangan() {
        $data = [
            'listr' => $this->model_admin->get_db('ak_ruangan'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/dataruangan', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function inputruangan() {
        $data = [
            'listr' => $this->model_admin->get_db('ak_ruangan'),
        ];
        $this->form_validation->set_rules('nama', 'nama tidak boleh kosong', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebaradmin');
            $this->load->view('_partials/header');
            $this->load->view('admin/createruangan', $data);
            $this->load->view('_partials/loader');
            $this->load->view('_partials/script');
        } else {
            $this->model_ruangan->set_ruangan();
            redirect('admin/akademik/dataruangan');
        }
    }

    public function deleteruangan() {
        $this->model_dosen->delete_ruangan();
        redirect('admin/akademik/dataruangan');
    }

    public function listpengumuman() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/listpengumuman');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function durasikrs() {
        $data = [
            'listt' => $this->model_admin->get_db('ak_tahun'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/durasikrs', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function setdurasi() {
        $this->model_admin->set_durasi();

        redirect('admin');
    }

    public function tahunajaran() {
        $data = [
            'listt' => $this->model_admin->get_db('ak_tahun'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/ubahtahun', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function ubahtahun() {
        $this->model_admin->ubah_tahun();

        redirect('admin');
    }
}
