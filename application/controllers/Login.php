<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_login');
    }

    public function index() {
        if ($this->session->userdata('logged')) redirect(strtolower($this->session->access));

        $this->cookie_check();

        $this->load->view('_partials/head');
        $this->load->view('akun/login');
        $this->load->view('_partials/script');
    }

    function auth() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (!$this->model_login->password_validation($username, $password)) return $this->message('error');
        $akun = $this->model_login->get_db('ak_akun', ['username' => $username]);

        if ($akun['status'] !== 'Y') return $this->message('blokir');

        if ($this->input->post('remember_me')) $this->cookie_set($akun['id_akun']);
        $this->sess_user($akun['id_akun'], $akun['level']);
    }

    private function cookie_check() {
        if (get_cookie('id_akun') == null) return false;

        $idCookie = convert_uudecode(get_cookie('id_akun'));
        $explodedTokenCookie = explode(':', get_cookie('token'));

        if (!$this->model_login->cookie_validation($idCookie, $explodedTokenCookie[0])) return false;
        $cookie = $this->model_login->get_db('ak_remember_me', ['id_akun' => $idCookie]);

        if (!hash_equals(hash('sha256', $explodedTokenCookie[1]), $cookie['hashedValidator'])) return false;
        $akun = $this->model_login->get_db('ak_akun', ['id_akun' => $idCookie]);

        if ($akun['status'] !== 'Y') return $this->message('blokir');
        $this->sess_user($akun['id_akun'], $akun['level']);
    }

    private function cookie_set($id) {
        $token = implode(':', [base64_encode(random_bytes(12)), base64_encode(random_bytes(64))]);
        $idCookie = [
            'name' => 'id_akun',
            'value' => convert_uuencode($id),
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
        $this->model_login->set_remember_me($id, $explodedToken[0], $explodedToken[1]);
    }

    private function sess_user($id, $level) {
        $tahun = $this->model_login->get_db('ak_tahun', ['status' => 'Y']);

        $this->session->set_userdata(['logged' => true, 'id' => $id]);

        switch ($level) {
            case 0:
                $this->session->set_userdata(['access' => 'Admin', 'level' => $level, 'tahun' => $tahun['id_tahun']]);

                return redirect('admin');

            case 1:
                $this->session->set_userdata(['access' => 'Fakultas', 'level' => $level, 'tahun' => $tahun['id_tahun']]);

                return redirect('fakultas');

            case 2:
                $this->session->set_userdata(['access' => 'Prodi', 'level' => $level, 'tahun' => $tahun['id_tahun']]);

                return redirect('prodi');

            case 3:
                $this->session->set_userdata(['access' => 'Dosen', 'level' => $level, 'tahun' => $tahun['id_tahun']]);

                return redirect('dosen');

            case 4:
                $this->session->set_userdata(['access' => 'Mahasiswa', 'level' => $level, 'tahun' => $tahun['id_tahun']]);

                return redirect('mahasiswa');

            default:
                return redirect('login');
        }
    }

    private function message($msg) {
        $data[$msg] = true;

        $this->load->view('_partials/head');
        $this->load->view('akun/login', $data);
        $this->load->view('_partials/script');
    }
}
