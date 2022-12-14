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

        $data['fakultas'] = $this->model_fakultas->get_db('fakultas', ['id_fakultas' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil() {
        $data['fakultas'] = $this->model_fakultas->get_db('fakultas', ['id_fakultas' => $this->session->id]);

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
        $data['fakultas'] = $this->model_fakultas->get_db('fakultas', ['id_fakultas' => $this->session->id]);

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
        $data['fakultas'] = $this->model_fakultas->get_db('fakultas', ['id_fakultas' => $this->session->id]);
        $data['listd'] = $this->model_fakultas->get_db('prodi', ['id_fakultas' => $this->session->id], 'result');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/dataprodi', $data);
        $this->load->view('_partials/script');
    }

    public function datadsn() {
        $data['fakultas'] = $this->model_fakultas->get_db('fakultas', ['id_fakultas' => $this->session->id]);
        $data['listd'] = $this->model_fakultas->get_db('prodi', ['id_fakultas' => $this->session->id], 'result');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/datadosen', $data);
        $this->load->view('_partials/script');
    }

    public function datamhs() {
        $data['fakultas'] = $this->model_fakultas->get_db('fakultas', ['id_fakultas' => $this->session->id]);
        $data['listd'] = $this->model_fakultas->get_db('prodi', ['id_fakultas' => $this->session->id], 'result');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/datamhs', $data);
        $this->load->view('_partials/script');
    }
}
