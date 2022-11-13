<?php
class Model_akun extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_db($database, $data, $data2) {
        return $this->db->get_where($database, [$data => $data2]);
    }

    public function set_akun() {
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

        $data = [
            'id_akun' => $this->input->post('id_akun'),
            'username' => $this->input->post('username'),
            'password' => $password,
            'status' => $this->input->post('status'),
            'level' => $this->input->post('level'),
        ];

        return $this->db->insert('akun', $data);
    }
}
