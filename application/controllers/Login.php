<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_login');
    }

    public function index() {
        if (!$this->session->userdata('logged')) {
            $this->cookieCheck();

            $this->load->view('_partials/head');
            $this->load->view('akun/login');
            $this->load->view('_partials/script');
        } else redirect(strtolower($this->session->access));
    }

    public function auth() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->model_login->passwordValidation($username, $password)) {
            $akun = $this->model_login->get_db('akun', ['username' => $username]);

            if ($akun['status'] === 'y') {

                if ($this->input->post('remember_me')) {
                    $token = implode(':', [base64_encode(random_bytes(12)), base64_encode(random_bytes(64))]);
                    $idCookie = [
                        'name' => 'id_akun',
                        'value' => convert_uuencode($akun['id_akun']),
                        'expire' => 2592000,
                        'httponly' => true,
                    ];
                    $tokenCookie = [
                        'name' => 'token',
                        'value' => $token,
                        'expire' => 2592000,
                        'httponly' => true,
                    ];

                    set_cookie($idCookie);
                    set_cookie($tokenCookie);

                    $explodedToken = explode(':', $token);
                    $this->model_login->set_remember_me($akun['id_akun'], $explodedToken[0], $explodedToken[1]);
                }

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
            } else $this->message('blokir');
        } else $this->message('error');
    }

    public function message($msg) {
        $data[$msg] = true;

        $this->load->view('_partials/head');
        $this->load->view('akun/login', $data);
        $this->load->view('_partials/script');
    }

    public function cookieCheck() {
        if (get_cookie('id_akun') != null) {
            $idCookie = convert_uudecode(get_cookie('id_akun'));
            $explodedTokenCookie = explode(':', get_cookie('token'));

            if ($this->model_login->cookieValidation($idCookie, $explodedTokenCookie[0])) {
                $cookie = $this->model_login->get_db('remember_me', ['id_akun' => $idCookie]);

                if (hash_equals(hash('sha256', $explodedTokenCookie[1]), $cookie['hashedValidator'])) {
                    $akun = $this->model_login->get_db('akun', ['id_akun' => $idCookie]);

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
                    }
                }
            }
        }
    }
}
