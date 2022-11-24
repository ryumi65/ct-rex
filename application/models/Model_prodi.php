<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_prodi extends CI_Model {

    var $column_order_dosen = [null, 'nik', 'nama', 'jenis_kelamin', 'nidn_dosen', 'status_dosen'];
    var $column_search_dosen = ['nik', 'nama', 'jenis_kelamin', 'nidn_dosen', 'status_dosen'];

    var $column_order_mahasiswa = [null, 'nim', 'nama', 'jenis_kelamin', 'tahun_angkatan', 'status'];
    var $column_search_mahasiswa = ['nim', 'nama', 'jenis_kelamin', 'tahun_angkatan', 'status'];

    var $column_order_matkul = [null, 'id_matkul', 'nama', 'sks', 'jenis'];
    var $column_search_matkul = ['id_matkul', 'nama', 'sks', 'jenis'];

    var $order = ['nama' => 'asc'];

    private function _get_datatables_query($table, $wali = null, $nik = null) {

        if ($table === 'dosen') {
            $column_order = $this->column_order_dosen;
            $column_search = $this->column_search_dosen;
        } elseif ($table === 'mahasiswa') {
            $column_order = $this->column_order_mahasiswa;
            $column_search = $this->column_search_mahasiswa;
        } elseif ($table === 'matkul') {
            $column_order = $this->column_order_matkul;
            $column_search = $this->column_search_matkul;
        } else return false;

        $this->db->from($table);
        if ($wali === 'mhswl') $this->db->where('dosen_wali', $nik);

        $i = 0;

        foreach ($column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($table, $wali = null, $nik = null) {
        $this->_get_datatables_query($table, $wali, $nik);
        if ($_POST['length'] != -1) $this->db->limit($_POST['length'], $_POST['start']);
        $this->db->where('id_prodi', $this->session->id);
        $query = $this->db->get();

        return $query->result();
    }

    function count_filtered($table, $wali = null, $nik = null) {
        $this->_get_datatables_query($table, $wali, $nik);
        $this->db->where('id_prodi', $this->session->id);
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function count_all($table, $wali = null, $nik = null) {
        $this->db->from($table, $wali, $nik);

        return $this->db->count_all_results();
    }

    public function set_prodi() {
        $data = [
            'id_prodi' => $this->input->post('id_prodi'),
            'nama' => $this->input->post('nama'),
            'id_fakultas' => $this->input->post('id_fakultas'),
        ];

        return $this->db->insert('prodi', $data);
    }

    public function update_prodi($id_prodi) {
        $data = [
            'id_prodi' => $this->input->post('id_prodi'),
            'nama' => $this->input->post('nama'),
            'id_fakultas' => $this->input->post('id_fakultas'),
        ];

        return $this->db->update('prodi', $data, ['id_prodi' => $id_prodi]);
    }

    public function get_mhs_wali($nik) {
        $this->db->from('mahasiswa');
        $this->db->where('dosen_wali', $nik);

        return $this->db->count_all_results();
    }

    public function set_mhs_wali($input) {
        for ($i = 0; $i < count($input); $i++) {
            $nik['dosen_wali'] = $this->input->post('nik');
            $this->db->update('mahasiswa', $nik, ['nim' => $input[$i]]);
        }
    }

    public function delete_mhs_wali($nim) {
        $data['dosen_wali'] = null;

        return $this->db->update('mahasiswa', $data, ['nim' => $nim]);
    }
}
