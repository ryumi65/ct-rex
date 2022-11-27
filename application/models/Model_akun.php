<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_akun extends CI_Model {

    public function get_akun($database, $data = null, $data2 = null) {
        if ($data === null || $data2 === null) {
            return $this->db->get($database);
        } else return $this->db->get_where($database, [$data => $data2]);
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

    public function update_db_foto($file, $type) {
        $akun = $this->db->get_where('akun', ['id_akun' => $this->session->id])->row_array();

        if ($type == 'header') {
            if ($file === $akun['foto_header']) {
                $file_name = explode('.', $akun['foto_header']);

                $this->db->update('akun', ['foto_header' => null], ['id_akun' => $this->session->id]);
                array_map('unlink', glob(base_url() . "/assets/img/uploads/header/$file_name[0]*"));
                $data['foto_header'] = $file;

                return $this->db->update('akun', $data, ['id_akun' => $this->session->id]);
            }
        } elseif ($type == 'profil') {
            if ($file === $akun['foto_profil']) {
                $file_name = explode('.', $akun['foto_profil']);

                $this->db->update('akun', ['foto_profil' => null], ['id_akun' => $this->session->id]);
                array_map('unlink', glob(base_url() . "/assets/img/uploads/profil/$file_name[0]*"));
                $data['foto_profil'] = $file;

                return $this->db->update('akun', $data, ['id_akun' => $this->session->id]);
            }
        }
    }
}
