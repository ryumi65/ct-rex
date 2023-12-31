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
            'cpl_prodi' => $this->input->post('cpl_prodi'),
            'cp_mk' => $this->input->post('cp_mk'),
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
            'cpl_prodi' => $this->input->post('cpl_prodi'),
            'cp_mk' => $this->input->post('cp_mk'),
        ];

        return $this->db->update('ak_matkul', $data, ['id_matkul' => $id_matkul]);
    }

    public function delete_matkul($id_matkul) {
        return $this->db->delete('ak_matkul', ['id_matkul' => $id_matkul]);
    }

    public function get_matkul($id_prodi) {
        $query = $this->db->select('m.id_matkul, m.nama, m.kode_matkul, d.nama as nama_dosen, m.jenis, m.kategori, m.sks, m.semester')->from('ak_matkul m')->join('ak_dosen d', 'm.nik_dosen = d.nik')
            ->where('m.id_prodi', $id_prodi)->get();

        return $query->result_array();
    }

    public function get_matkul_fks($id_fakultas) {
        $query = $this->db->select('m.id_matkul, m.nama, m.kode_matkul, d.nama as nama_dosen, m.jenis, m.kategori, m.sks, m.semester, p.nama as nama_prodi')->from('ak_matkul m')->join('ak_dosen d', 'm.nik_dosen = d.nik')
            ->join('ak_prodi p', 'm.id_prodi = p.id_prodi')->where('p.id_fakultas', $id_fakultas)->get();

        return $query->result_array();
    }
}
