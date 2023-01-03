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

    public function join_dosen() {
        $this->db->from('prodi');
        $this->db->join('dosen', 'prodi.id_prodi = dosen.id_prodi');
        $this->db->where('prodi.id_fakultas', $this->session->id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function join_mhs() {
        $this->db->from('prodi');
        $this->db->join('mahasiswa', 'prodi.id_prodi = mahasiswa.id_prodi');
        $this->db->where('prodi.id_fakultas', $this->session->id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_dosen($id_prodi) {
        $this->db->from('dosen');
        $this->db->where('id_prodi', $id_prodi);

        return $this->db->count_all_results();
    }

    public function count_mhs($id_prodi) {
        $this->db->from('mahasiswa');
        $this->db->where('id_prodi', $id_prodi);

        return $this->db->count_all_results();
    }
}