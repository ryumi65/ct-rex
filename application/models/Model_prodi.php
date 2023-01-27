<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_prodi extends CI_Model {

    public function set_prodi() {
        $data = [
            'id_prodi' => $this->input->post('id_prodi'),
            'nama' => $this->input->post('nama'),
            'id_fakultas' => $this->input->post('id_fakultas'),
        ];

        return $this->db->insert('ak_prodi', $data);
    }

    public function update_prodi($id_prodi) {
        $data = [
            'id_prodi' => $this->input->post('id_prodi'),
            'nama' => $this->input->post('nama'),
            'id_fakultas' => $this->input->post('id_fakultas'),
        ];

        return $this->db->update('ak_prodi', $data, ['id_prodi' => $id_prodi]);
    }

    public function get_count_mhs_wali($nik) {
        $this->db->from('ak_mahasiswa')
            ->where('dosen_wali', $nik);

        return $this->db->count_all_results();
    }

    public function set_mhs_wali($input) {
        $nik['dosen_wali'] = $this->input->post('nik');

        for ($i = 0; $i < count($input); $i++) {
            $this->db->update('ak_mahasiswa', $nik, ['nim' => $input[$i]]);
        }
    }

    public function delete_mhs_wali($nim) {
        $data['dosen_wali'] = null;

        return $this->db->update('ak_mahasiswa', $data, ['nim' => $nim]);
    }

}
