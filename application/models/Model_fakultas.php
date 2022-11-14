<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_fakultas extends CI_Model {

    public function set_fakultas() {
        $data = [
            'id_fakultas' => $this->input->post('id_fakultas'),
            'nama' => $this->input->post('nama')
        ];

        return $this->db->insert('fakultas', $data);
    }

    public function update_fakultas($id_fakultas) {
        $data = [
            'id_fakultas' => $this->input->post('id_fakultas'),
            'nama' => $this->input->post('nama')
        ];

        return $this->db->update('fakultas', $data, ['id_fakultas' => $id_fakultas]);
    }
}
