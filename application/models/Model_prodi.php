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

    public function get_mhs($id_matkul) {
        $query = $this->db->from('ak_mahasiswa m')->join('ak_krs k', 'm.nim = k.nim')->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')->join('ak_akun a', 'k.nim = a.id_akun')
            ->where('j.id_matkul', $id_matkul)->order_by('k.nim', 'ASC')->get();

        return $query->result_array();
    }

    public function get_presensi($id_matkul, $pertemuan = '', $type = '') {
        if ($pertemuan === '') {
            $query = $this->db->select('p.id_krs, p.kehadiran, p.tanggal, p.pertemuan, j.pukul, j.hari')->from('ak_presensi p')->join('ak_krs k', 'p.id_krs = k.id_krs')
                ->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')->join('ak_matkul m', 'j.id_matkul = m.id_matkul')
                ->where('j.id_matkul', $id_matkul)->get();
        } else {
            $query = $this->db->select('p.id_krs, p.kehadiran, p.tanggal, p.pertemuan, j.pukul, j.hari')->from('ak_presensi p')->join('ak_krs k', 'p.id_krs = k.id_krs')
                ->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')->join('ak_matkul m', 'j.id_matkul = m.id_matkul')
                ->where(['j.id_matkul' => $id_matkul, 'p.pertemuan' => $pertemuan])->get();
        }

        if ($type === 'validation') {
            if ($query->num_rows() > 0) return true;

            return false;
        }

        return $query->result_array();
    }

    public function get_bap($id_matkul) {
        $query = $this->db->from('ak_bap b')->join('ak_jadwal j', 'b.id_jadwal = j.id_jadwal')
            ->join('ak_matkul m', 'j.id_matkul = m.id_matkul')->where('m.id_matkul', $id_matkul)->get();

        return $query->result_array();
    }
}
