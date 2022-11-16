<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_prodi');

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 2) redirect(strtolower($this->session->access));
    }

    public function index() {
        if (uri_string() === 'prodi/index') return redirect('prodi');

        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profil', $data);
        $this->load->view('_partials/script');
    }

    public function datadsn() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listd'] = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datadsn', $data);
        $this->load->view('_partials/script');
    }

    public function datamhs() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listm'] = $this->model_prodi->get_db('mahasiswa', ['id_prodi' => $this->session->id], 'result');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datamhs', $data);
        $this->load->view('_partials/script');
    }

    public function datadsnwl() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listd'] = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datadsnwl', $data);
        $this->load->view('_partials/script');
    }

    public function datamhswl($nik) {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['dosen'] = $this->model_prodi->get_db('dosen', ['nik' => $nik]);
        $data['listm'] = $this->model_prodi->get_db('mahasiswa', ['id_prodi' => $this->session->id, 'dosen_wali' => $nik], 'result');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datamhswl', $data);
        $this->load->view('_partials/script');
    }

    public function daftarmatkul() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listmk'] = $this->model_prodi->get_db('matkul');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datamatkul', $data);
        $this->load->view('_partials/script');
    }

    public function profilmhs($nim) {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listp'] = $this->model_prodi->get_db('prodi');
        $data['mahasiswa'] = $this->model_prodi->get_db('mahasiswa', ['nim' => $nim]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profilmhs', $data);
        $this->load->view('_partials/script');
    }

    public function profildsn($nik) {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listp'] = $this->model_prodi->get_db('prodi');
        $data['dosen'] = $this->model_prodi->get_db('dosen', ['nik' => $nik]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profildsn', $data);
        $this->load->view('_partials/script');
    }

    public function createwali() {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listd'] = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');
        $data['listm'] = $this->model_prodi->get_db('mahasiswa', ['id_prodi' => $this->session->id, 'dosen_wali' => null], 'result');

        $this->form_validation->set_rules('nik', 'NIK', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('prodi/createdatawali', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_prodi->set_mhs_wali($this->input->post('dosen_wali[]'));
            redirect('prodi/datadsnwl');
        }
    }

    public function detailmatkul($id_matkul) {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['matkul'] = $this->model_prodi->get_db('matkul', ['id_matkul' => $id_matkul]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/detailmatkul', $data);
        $this->load->view('_partials/script');
    }

    public function create() {
        $data['listf'] = $this->model_prodi->get_db('fakultas');

        $this->form_validation->set_rules('id_prodi', 'id_prodi harus diisi', 'required');
        $this->form_validation->set_rules('nama', 'nama harus diisi', 'required');
        $this->form_validation->set_rules('id_fakultas', 'id_fakultas harus diisi', 'required');

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

        $this->form_validation->set_rules('id_prodi', 'id_prodi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'required');


        if (!$this->form_validation->run()) {
            $this->load->view('prodi/update', $data);
        } else {
            $this->model_prodi->update_prodi($this->session->id);
            redirect('prodi/profile');
        }
    }
}
