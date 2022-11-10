<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('model_akun');
    }

    public function register() {
        $this->form_validation->set_rules('id_akun', 'ID Akun', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('register/register');
            $this->load->view('_partials/script');
        } else {
            $this->model_akun->set_akun();
            redirect('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();

        redirect('login');
    }
}
