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
        if ($type == 'header') {
            $data['foto_header'] = $file;

            return $this->db->update('akun', $data, ['id_akun' => $this->session->id]);
        } elseif ($type == 'profil') {
            $data['foto_profil'] = $file;

            return $this->db->update('akun', $data, ['id_akun' => $this->session->id]);
        }
    }

    public function delete_foto($type) {
        $akun = $this->get_db('akun', ['id_akun' => $this->session->id]);

        if ($type == 'header') {
            $file_name = explode('.', $akun['foto_header']);
            array_map('unlink', glob("./assets/img/uploads/header/" . $file_name[0] . "*"));

            return $this->db->update('akun', ['foto_header' => 'gedungdash.jpg'], ['id_akun' => $this->session->id]);
        } elseif ($type == 'profil') {
            $file_name = explode('.', $akun['foto_profil']);
            array_map('unlink', glob("./assets/img/uploads/profile/" . $file_name[0] . "*"));
            
            return $this->db->update('akun', ['foto_profil' => 'curved.jpg'], ['id_akun' => $this->session->id]);
        }
    }
}
