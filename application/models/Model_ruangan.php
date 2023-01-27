<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_ruangan extends CI_Model {

    public function set_ruangan() {
        $data = [
            'id_ruangan' => $this->input->post('id_ruangan'),
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'jenis' => $this->input->post('jenis'),
            'kapasitas' => $this->input->post('kapasitas'),
            'lantai' => $this->input->post('lantai'),

        ];

        return $this->db->insert('ak_ruangan', $data);
    }

    public function update_ruangan($id_ruangan) {
        $data = [
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'jenis' => $this->input->post('jenis'),
            'kapasitas' => $this->input->post('kapasitas'),
            'lantai' => $this->input->post('lantai'),

        ];

        return $this->db->update('ak_ruangan', $data, ['id_ruangan' => $id_ruangan]);
    }

    public function delete_ruangan($id_ruangan) {
        return $this->db->delete('ak_ruangan', ['id_ruangan' => $id_ruangan]);
    }
}
