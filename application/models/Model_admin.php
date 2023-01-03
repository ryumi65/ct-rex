<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_admin extends CI_Model {

    

    public function join_mhs(){
        $this->db->select('');
        $this->db->from('prodi');
        $this->db->join('mahasiswa', 'prodi.id_prodi = mahasiswa.id_prodi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function join_dosen(){
        $this->db->select('');
        $this->db->from('prodi');
        $this->db->join('dosen', 'prodi.id_prodi = dosen.id_prodi');
        $query = $this->db->get();
        return $query->result_array();
    }

}
