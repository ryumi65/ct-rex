<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('model_login');
    }

    public function index() {
        if (!$this->session->userdata('logged')) {
            $this->load->view('template/header');
            $this->load->view('login/login2');
        } else {
            redirect(strtolower($this->session->userdata('access')));
        }
    }

    public function auth() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $validasi_username = $this->model_login->query_validasi_username($username);
        $validasi_password = $this->model_login->query_validasi_password($username, $password);

        if ($validasi_username->num_rows() > 0 && $validasi_password->num_rows() > 0) {
            $pw = $validasi_password->row_array();

            if ($pw['status'] === 'y') {
                $this->session->set_userdata(['logged' => true, 'user' => $username]);

                switch ($pw['level']) {
                    case 0:
                        $this->session->set_userdata('access', 'Administrator');
                        $this->session->set_userdata('level', $pw['level']);
                        $this->session->set_userdata($this->model_login->get_db(

                        ));

                        return redirect('admin');

                    case 1:
                        $this->session->set_userdata('access', 'Fakultas');
                        $this->session->set_userdata('level', $pw['level']);
                        $this->session->set_userdata($this->model_login->get_db(
                            'fakultas', 'id_fakultas', $pw['id_akun']
                        ));

                        return redirect('fakultas');

                    case 2:
                        $this->session->set_userdata('access', 'Prodi');
                        $this->session->set_userdata('level', $pw['level']);
                        $this->session->set_userdata($this->model_login->get_db(
                            'prodi', 'id_prodi', $pw['id_akun']
                        ));

                        return redirect('prodi');

                    case 3:
                        $this->session->set_userdata('access', 'Dosen');
                        $this->session->set_userdata('level', $pw['level']);
                        $this->session->set_userdata($this->model_login->get_db(
                            'dosen', 'nik', $pw['id_akun']
                        ));

                        return redirect('dosen');

                    case 4:
                        $this->session->set_userdata('access', 'Mahasiswa');
                        $this->session->set_userdata('level', $pw['level']);
                        $this->session->set_userdata($this->model_login->get_db(
                            'mahasiswa', 'nim', $pw['id_akun']
                        ));

                        return redirect('mahasiswa');

                    default:
                        return false;
                }
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }
}
