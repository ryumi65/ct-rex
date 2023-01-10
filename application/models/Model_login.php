<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model {

    public function password_validation($username, $password) {
        $query = $this->db->get_where('akun', ['username' => $username]);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $valid = password_verify($password, $result['password']);

            return $valid;
        } else return false;
    }

    public function cookie_validation($id_akun, $selector) {
        $query = $this->db->get_where('remember_me', ['id_akun' => $id_akun]);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $result['selector'] === $selector ? $valid = true : $valid = false;

            return $valid;
        } else return false;
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
