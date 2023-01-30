<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_admin extends CI_Model {

    public function join_dosen() {
        $query = $this->db->from('prodi')->join('dosen', 'prodi.id_prodi = dosen.id_prodi')->get();

        return $query->result_array();
    }

    public function join_mhs() {
        $query = $this->db->from('prodi')->join('mahasiswa', 'prodi.id_prodi = mahasiswa.id_prodi')->get();

        return $query->result_array();
    }

    public function ubah_tahun() {
        $id_tahun = $this->input->post('id_tahun');

        $this->db->update('tahun', ['status' => 'N']);
        $this->db->update('tahun', ['status' => 'Y'], ['id_tahun' => $id_tahun]);
    }

    public function set_durasi() {
        $listd = $this->model_admin->get_db('durasi');
        $id_tahun = $this->input->post('id_tahun');

        foreach ($listd as $durasi) {
            if ($durasi['id_tahun'] === $id_tahun) {
                $data = [
                    'tanggal_awal' => $this->input->post('tanggal_awal'),
                    'tanggal_akhir' => $this->input->post('tanggal_akhir'),
                ];

                $this->db->update('durasi', $data, ['id_tahun' => $id_tahun]);
            } else {
                $data = [
                    'id_tahun' => $id_tahun,
                    'tanggal_awal' => $this->input->post('tanggal_awal'),
                    'tanggal_akhir' => $this->input->post('tanggal_akhir'),
                ];

                $this->db->insert('durasi', $data);
            }
        }
    }
}
