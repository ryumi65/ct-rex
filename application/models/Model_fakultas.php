<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_fakultas extends CI_Model {

    public function set_fakultas() {
        $data = [
            'id_fakultas' => $this->input->post('id_fakultas'),
            'nama' => $this->input->post('nama')
        ];

        return $this->db->insert('ak_fakultas', $data);
    }

    public function update_fakultas($id_fakultas) {
        $data = [
            'id_fakultas' => $this->input->post('id_fakultas'),
            'nama' => $this->input->post('nama')
        ];

        return $this->db->update('ak_fakultas', $data, ['id_fakultas' => $id_fakultas]);
    }

    public function join_dosen() {
        $this->db->from('ak_prodi');
        $this->db->join('ak_dosen', 'ak_prodi.id_prodi = ak_dosen.id_prodi');
        $this->db->where('ak_prodi.id_fakultas', $this->session->id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function join_mhs() {
        // $this->db->from('ak_mahasiswa');
        // $this->db->join('ak_prodi', 'ak_mahasiswa.id_prodi = ak_prodi.id_prodi');
        // $this->db->where('ak_prodi.id_fakultas', $this->session->id);
        $this->db->from('ak_mahasiswa');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_dosen($id_prodi) {
        $this->db->from('ak_dosen');
        $this->db->where('id_prodi', $id_prodi);

        return $this->db->count_all_results();
    }

    public function count_mhs($id_prodi) {
        $this->db->from('ak_mahasiswa');
        $this->db->where('id_prodi', $id_prodi);

        return $this->db->count_all_results();
    }
}