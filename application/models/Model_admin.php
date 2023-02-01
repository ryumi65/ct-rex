<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_admin extends CI_Model
{

    public function join_dosen()
    {
        $query = $this->db->from('ak_prodi p')->join('ak_dosen d', 'p.id_prodi = d.id_prodi')->get();

        return $query->result_array();
    }

    public function join_mhs()
    {
        $query = $this->db->from('ak_prodi p')->join('ak_mahasiswa m', 'p.id_prodi = m.id_prodi')->get();

        return $query->result_array();
    }

    public function ubah_tahun()
    {
        $id_tahun = $this->input->post('id_tahun');

        $this->db->update('ak_tahun', ['status' => 'N']);
        $this->db->update('ak_tahun', ['status' => 'Y'], ['id_tahun' => $id_tahun]);
    }

    public function set_fakultas()
    {
        $data = [
            'id_fakultas' => $this->input->post('id_fakultas'),
            'nama' => $this->input->post('nama')
        ];

        return $this->db->insert('ak_fakultas', $data);
    }

    public function update_fakultas($id_fakultas)
    {
        $data = [
            'id_fakultas' => $this->input->post('id_fakultas'),
            'nama' => $this->input->post('nama')
        ];

        return $this->db->update('ak_fakultas', $data, ['id_fakultas' => $id_fakultas]);
    }

    public function count_dosen($id_prodi)
    {
        $this->db->from('ak_dosen');
        $this->db->where('id_prodi', $id_prodi);

        return $this->db->count_all_results();
    }

    public function count_mhs($id_prodi)
    {
        $this->db->from('ak_mahasiswa');
        $this->db->where('id_prodi', $id_prodi);

        return $this->db->count_all_results();
    }

    public function set_durasi()
    {
        $listd = $this->model_admin->get_db('ak_durasi');
        $id_tahun = $this->input->post('id_tahun');


        foreach ($listd as $durasi) {
            if ($durasi['id_tahun'] == $id_tahun) {
                $data = [
                    'tanggal_awal' => $this->input->post('tanggal_awal'),
                    'tanggal_akhir' => $this->input->post('tanggal_akhir'),
                ];

                return $this->db->update('ak_durasi', $data, ['id_tahun' => $id_tahun]);
            }
        }

        $data = [
            'id_tahun' => $id_tahun,
            'tanggal_awal' => $this->input->post('tanggal_awal'),
            'tanggal_akhir' => $this->input->post('tanggal_akhir'),
        ];

        return $this->db->insert('ak_durasi', $data);
    }
}
