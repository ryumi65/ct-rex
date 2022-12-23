<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jadwal extends CI_Model {

    public function get_jadwal() {
        $this->db->select('*')
            ->from('matkul m')
            ->join('dosen d', 'm.nik_dosen = d.nik')
            ->join('jadwal j', 'm.id_matkul = j.id_matkul')
            ->where('m.id_prodi', $this->session->id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function set_jadwal() {
        $data = [
            'id_prodi' => $this->input->post('id_prodi'),
            'nama' => $this->input->post('nama'),
            'id_fakultas' => $this->input->post('id_fakultas'),
        ];

        return $this->db->insert('prodi', $data);
    }
}
