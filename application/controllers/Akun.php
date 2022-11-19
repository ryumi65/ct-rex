<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_akun');
    }

    public function index() {
        $this->load->view('_partials/head');
        $this->load->view('akun/register');
        $this->load->view('_partials/script');
    }

    public function register() {
        $id = $this->input->post('id_akun');
        $username = $this->input->post('username');
        $idValidation = $this->model_akun->get_akun('akun', 'id_akun', $id);
        $usernameValidation = $this->model_akun->get_akun('akun', 'username', $username);

        if (!$idValidation->num_rows() > 0) {
            if (!$usernameValidation->num_rows() > 0) {
                $this->model_akun->set_akun();
                $this->message('success');
            } else $this->message('usernameError');
        } else $this->message('idError');
    }

    public function message($msg) {
        $data[$msg] = true;

        $this->load->view('_partials/head');
        $this->load->view('akun/register', $data);
        $this->load->view('_partials/script');
    }

    public function logout() {
        $this->session->sess_destroy();
        delete_cookie('id_akun');
        delete_cookie('token');

        redirect('login');
    }
}
