<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('model_fakultas');
    }

    public function index() {
        if (uri_string() === 'fakultas/index') return redirect('fakultas');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/dashboard');
        $this->load->view('_partials/script');
    }

    public function profile() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/profile');
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

    public function update($id_fakultas) {
        $data['fakultas'] = $this->model_fakultas->get_fakultas($id_fakultas);

        $this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('fakultas/update', $data);
        } else {
            $this->model_fakultas->update_fakultas($id_fakultas);
            redirect('fakultas/profile');
        }
    }

    public function delete($id_fakultas) {
        $this->db->delete('fakultas', ['id_fakultas' => $id_fakultas]);
        redirect('fakultas');
    }
}
