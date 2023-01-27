<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_matkul extends CI_Model {

    public function set_matkul() {
        $data = [
            'kode_matkul' => $this->input->post('kode_matkul'),
            'nama' => $this->input->post('nama'),
            'nama_inggris' => $this->input->post('nama_inggris'),
            'jenis' => $this->input->post('jenis'),
            'kategori' => $this->input->post('kategori'),
            'sks' => $this->input->post('sks'),
            'nik_dosen' => $this->input->post('nik_dosen'),
            'id_prodi' => $this->session->id,
            'semester' => $this->input->post('semester'),
        ];

        return $this->db->insert('ak_matkul', $data);
    }

    public function update_matkul($id_matkul) {
        $data = [
            'kode_matkul' => $this->input->post('kode_matkul'),
            'nama' => $this->input->post('nama'),
            'nama_inggris' => $this->input->post('nama_inggris'),
            'jenis' => $this->input->post('jenis'),
            'kategori' => $this->input->post('kategori'),
            'sks' => $this->input->post('sks'),
            'nik_dosen' => $this->input->post('nik_dosen'),
            'id_prodi' => $this->session->id,
            'semester' => $this->input->post('semester'),
        ];

        return $this->db->update('ak_matkul', $data, ['id_matkul' => $id_matkul]);
    }

    public function delete_matkul($id_matkul) {
        return $this->db->delete('ak_matkul', ['id_matkul' => $id_matkul]);
    }
}
