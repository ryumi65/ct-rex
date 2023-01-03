<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_krs extends CI_Model {

    public function get_list_krs($nim, $id_prodi) {
        $query = $this->db->select('j.id_jadwal as id, m.kode_matkul as kode, m.nama, m.sks, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan')
            ->from('dosen d')->join('matkul m', 'd.nik = m.nik_dosen')->join('jadwal j', 'm.id_matkul = j.id_matkul')->join('krs k', 'j.id_jadwal = k.id_jadwal')
            ->where('m.id_prodi', $id_prodi)->where_not_in('k.nim', $nim)->get();

        return $query->result_array();
    }

    public function get_krs($nim, $semester) {
        $query = $this->db->select('j.id_jadwal as id, m.kode_matkul as kode, m.nama, m.sks, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan, k.status')
            ->from('dosen d')->join('matkul m', ' d.nik = m.nik_dosen')->join('jadwal j', 'm.id_matkul = j.id_matkul')->join('krs k', 'j.id_jadwal = k.id_jadwal')
            ->where(['k.nim' => $nim, 'm.semester' => $semester])->get();

        return $query->result_array();
    }

    public function set_krs($input) {
        $data['nim'] = $this->session->id;

        for ($i = 0; $i < count($input); $i++) {
            $data['id_jadwal'] = $input[$i];
            $this->db->insert('krs', $data);
        }
    }

    public function set_mhs_wali($input) {
        for ($i = 0; $i < count($input); $i++) {
            $nik['dosen_wali'] = $this->input->post('nik');
            $this->db->update('mahasiswa', $nik, ['nim' => $input[$i]]);
        }
    }
}
