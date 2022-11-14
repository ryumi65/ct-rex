<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_prodi extends CI_Model {

    public function set_prodi() {
        $data = [
            'id_prodi' => $this->input->post('id_prodi'),
            'nama' => $this->input->post('nama'),
            'id_fakultas' => $this->input->post('id_fakultas'),
        ];

        return $this->db->insert('prodi', $data);
    }

    public function update_prodi($id_prodi) {
        $data = [
            'id_prodi' => $this->input->post('id_prodi'),
            'nama' => $this->input->post('nama'),
            'id_fakultas' => $this->input->post('id_fakultas'),
        ];

        return $this->db->update('prodi', $data, ['id_prodi' => $id_prodi]);
    }
}
