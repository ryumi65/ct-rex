<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('model_login');
    }

    public function index() {
        if (!$this->session->userdata('logged')) {
            $this->load->view('_partials/head');
            $this->load->view('login/login');
            $this->load->view('_partials/script');
        } else {
            redirect(strtolower($this->session->userdata('access')));
        }
    }

    public function auth() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $validation = $this->model_login->validation($username, $password);

        if ($validation->num_rows() > 0) {
            $akun = $validation->row_array();

            if ($akun['status'] === 'y') {
                $this->session->set_userdata(['logged' => true, 'id' => $akun['id_akun']]);

                switch ($akun['level']) {
                    case 0:
                        $this->session->set_userdata(['access' => 'Admin', 'level' => $akun['level']]);

                        return redirect('admin');

                    case 1:
                        $this->session->set_userdata(['access' => 'Fakultas', 'level' => $akun['level']]);

                        return redirect('fakultas');

                    case 2:
                        $this->session->set_userdata(['access' => 'Prodi', 'level' => $akun['level']]);

                        return redirect('prodi');

                    case 3:
                        $this->session->set_userdata(['access' => 'Dosen', 'level' => $akun['level']]);

                        return redirect('dosen');

                    case 4:
                        $this->session->set_userdata(['access' => 'Mahasiswa', 'level' => $akun['level']]);

                        return redirect('mahasiswa');

                    default:
                        return redirect('login');
                }
            } else {
                $data['error'] = true;

                $this->load->view('_partials/head');
                $this->load->view('login/login', $data);
                $this->load->view('_partials/script');
            }
        } else {
            $data['error'] = true;

            $this->load->view('_partials/head');
            $this->load->view('login/login', $data);
            $this->load->view('_partials/script');
        }
    }
}
