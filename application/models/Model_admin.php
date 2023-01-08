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
}
