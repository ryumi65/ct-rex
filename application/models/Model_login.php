<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model {

    public function validation($username, $password) {
        $pw = password_verify($password, PASSWORD_BCRYPT);

        return $this->db->get_where('akun', ['username' => $username, 'password' => $pw]);
    }

    public function set_remember_me($id_akun, $selector, $validator) {
        $data = [
            'selector' => $selector,
            'hashedValidator' => hash('sha256', $validator),
            'id_akun' => $id_akun,
            'expires' => date('Y-m-d H:i:s', time() + 2588400),
        ];

        return $this->db->insert('remember_me', $data);
    }
}
