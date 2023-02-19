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

    public function get_dosen($nik = '') {
        if ($nik === '') {
            $query = $this->db->select('p.nama as nama_prodi, d.nama, d.nik, d.nidn_dosen, d.status_dosen, d.id_prodi, d.tanggal_lahir, p.id_fakultas')->from('ak_prodi p')
                ->join('ak_dosen d', 'p.id_prodi = d.id_prodi')->where('p.id_fakultas', $this->session->id)->get();

            return $query->result_array();
        } else {
            $query = $this->db->select('p.nama as nama_prodi, d.nama, d.nik, d.nidn_dosen, d.status_dosen, d.id_prodi, d.tanggal_lahir, p.id_fakultas')->from('ak_prodi p')
                ->join('ak_dosen d', 'p.id_prodi = d.id_prodi')->where(['p.id_fakultas' => $this->session->id, 'd.nik' => $nik])->get();

            return $query->row_array();
        }
    }

    public function get_mhs($nim = '') {
        if ($nim === '') {
            $query = $this->db->select('p.nama as nama_prodi, m.nama, m.nim, m.jenis_kelamin, m.tahun_angkatan, m.status, m.id_prodi, m.tanggal_lahir, p.id_fakultas')->from('ak_mahasiswa m')
                ->join('ak_prodi p', 'm.id_prodi = p.id_prodi')->where('p.id_fakultas', $this->session->id)->get();

            return $query->result_array();
        } else {
            $query = $this->db->select('p.nama as nama_prodi, m.nama, m.nim, m.jenis_kelamin, m.tahun_angkatan, m.status, m.id_prodi, m.tanggal_lahir, m.dosen_wali, p.id_fakultas')->from('ak_mahasiswa m')
                ->join('ak_prodi p', 'm.id_prodi = p.id_prodi')->where(['p.id_fakultas' => $this->session->id, 'm.nim' => $nim])->get();

            return $query->row_array();
        }
    }
}
