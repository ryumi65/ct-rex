<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_fakultas');

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 1) redirect(strtolower($this->session->access));
    }

    public function index() {
        if (uri_string() === 'fakultas/index') return redirect('fakultas');

        $akun = $this->model_fakultas->get_db('ak_akun', ['id_akun' => $this->session->id]);

        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'fakultas' => $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil() {
        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/profil', $data);
        $this->load->view('_partials/script');
    }

    public function create() {
        $this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('fakultas/create');
        } else {
            $this->model_fakultas->set_fakultas();
            redirect('fakultas');
        }
    }

    public function update() {
        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);

        $this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('fakultas/update', $data);
        } else {
            $this->model_fakultas->update_fakultas($this->session->id);
            redirect('fakultas/profil');
        }
    }

    public function dataprd() {
        $listp = $this->model_fakultas->get_db('ak_prodi', ['id_fakultas' => $this->session->id], 'result');

        foreach ($listp as $prodi) {
            $jumlah_dosen = $this->model_fakultas->count_dosen($prodi['id_prodi']);
            $jumlah_mhs = $this->model_fakultas->count_mhs($prodi['id_prodi']);

            $count = [
                'nama' => $prodi['nama'],
                'jdosen' => $jumlah_dosen,
                'jmhs' => $jumlah_mhs
            ];

            $jumlah[] = $count;
        }

        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);
        $data['listp'] = $jumlah;

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/dataprodi', $data);
        $this->load->view('_partials/script');
    }

    public function jadwalkuliah() {


        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/jadwalkuliah');
        $this->load->view('_partials/script');
    }

    public function datamatkul() {


        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/datamatkulprd');
        $this->load->view('_partials/script');
    }

    public function perkuliahan() {


        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/perkuliahan');
        $this->load->view('_partials/script');
    }



    public function datadsn() {
        $data['fakultas'] = $this->model_fakultas->join_dosen('ak_fakultas', ['id_fakultas' => $this->session->id]);
        $data['listd'] = $this->model_fakultas->join_dosen('ak_dosen', ['nik' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/datadosen', $data);
        $this->load->view('_partials/script');
    }

    public function datamhs() {
        $data['fakultas'] = $this->model_fakultas->join_mhs('ak_fakultas', ['id_fakultas' => $this->session->id]);
        $data['listd'] = $this->model_fakultas->join_mhs('ak_mahasiswa', ['nim' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/datamhs', $data);
        $this->load->view('_partials/script');
    }

    public function profilmhs($nim) {
        $data['fakultas'] = $this->model_fakultas->join_mhs('ak_fakultas', ['id_fakultas' => $this->session->id]);
        $data['listm'] = $this->model_fakultas->join_mhs('ak_fakultas');
        $data['mahasiswa'] = $this->model_fakultas->join_mhs('ak_mahasiswa', ['nim' => $nim]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/profilmhs', $data);
        $this->load->view('_partials/script');
    }

    public function profildsn($nik) {
        $data['fakultas'] = $this->model_fakultas->join_mhs('ak_fakultas', ['id_fakultas' => $this->session->id]);
        $data['listd'] = $this->model_fakultas->join_mhs('ak_fakultas');
        $data['dosen'] = $this->model_fakultas->join_mhs('ak_dosen', ['nik' => $nik]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/profildsn', $data);
        $this->load->view('_partials/script');
    }
}
