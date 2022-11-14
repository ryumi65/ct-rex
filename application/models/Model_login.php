<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model {

    public function validation($username, $password) {
        $pw = password_verify($password, PASSWORD_BCRYPT);

        return $this->db->get_where('akun', ['username' => $username, 'password' => $pw]);
    }
}
