<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pengumuman extends CI_Model {

    public function set_pengumuman() {
        $data = [
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tenggang_waktu' => $this->input->post('tenggang_waktu'),
            'tema' => $this->input->post('tema'),
            'isi_pengumuman' => $this->input->post('isi_pengumuman'),

        ];

        return $this->db->insert('ak_pengumuman', $data);
    }

    public function update_pengumuman($id_pengumuman) {
        $data = [
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tenggang_waktu' => $this->input->post('tenggang_waktu'),
            'tema' => $this->input->post('tema'),
            'isi_pengumuman' => $this->input->post('isi_pengumuman'),

        ];

        return $this->db->update('ak_pengumuman', $data, ['id_pengumuman' => $id_pengumuman]);
    }

    public function delete_pengumuman($id_pengumuman) {
        return $this->db->delete('ak_pengumuman', ['id_pengumuman' => $id_pengumuman]);
    }
}
