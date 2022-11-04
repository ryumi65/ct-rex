<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function query_validasi_username($username) {
        return $this->db->get_where('akun', ['username' => $username], 1);
    }

    public function query_validasi_password($username, $password) {
        return $this->db->get_where('akun', ['username' => $username,
            'password' => $password], 1);
    }

    public function get_db($database, $pk, $id_akun) {
        return $this->db->get_where($database, [$pk => $id_akun],
            1)->row_array();
    }
}
