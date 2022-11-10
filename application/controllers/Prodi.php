<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('model_prodi');
        $this->load->model('model_fakultas');
    }

    public function index() {
        if (uri_string() === 'prodi/index') return redirect('prodi');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/dashboard');
        $this->load->view('_partials/script');
    }

    public function profile() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profile');
        $this->load->view('_partials/script');
    }

    public function create() {
        $data['listf'] = $this->model_fakultas->get_fakultas();

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

    public function update($id_prodi) {
        $data['prodi'] = $this->model_prodi->get_prodi($id_prodi);
        $data['listf'] = $this->model_fakultas->get_fakultas();

        $this->form_validation->set_rules('id_prodi', 'id_prodi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'required');


        if (!$this->form_validation->run()) {
            $this->load->view('prodi/update', $data);
        } else {
            $this->model_prodi->update_prodi($id_prodi);
            redirect('prodi/profile');
        }
    }

    public function delete($id_prodi) {
        $this->db->delete('prodi', ['id_prodi' => $id_prodi]);
        redirect('prodi');
    }
}
