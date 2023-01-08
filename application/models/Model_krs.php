<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_krs extends CI_Model {

    public function get_list_krs($id_prodi, $semester) {
        $query = $this->db->select('j.id_jadwal as id, m.kode_matkul as kode, m.nama, m.sks, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan')
            ->from('jadwal j')->join('matkul m', 'j.id_matkul = m.id_matkul')->join('dosen d', 'm.nik_dosen = d.nik')
            ->where(['m.id_prodi' => $id_prodi, 'm.semester' => $semester])->get();

        return $query->result_array();
    }

    public function get_krs($nim) {
        $query = $this->db->select('j.id_jadwal as id, k.id_krs, m.kode_matkul as kode, m.nama, m.sks, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan, k.status')
            ->from('dosen d')->join('matkul m', 'd.nik = m.nik_dosen')->join('jadwal j', 'm.id_matkul = j.id_matkul')->join('krs k', 'j.id_jadwal = k.id_jadwal')
            ->where('k.nim', $nim)->get();

        return $query->result_array();
    }

    public function get_krs_smt($nim, $semester) {
        $query = $this->db->select('j.id_jadwal as id, m.kode_matkul as kode, m.nama, m.sks, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan, k.status')
            ->from('dosen d')->join('matkul m', 'd.nik = m.nik_dosen')->join('jadwal j', 'm.id_matkul = j.id_matkul')->join('krs k', 'j.id_jadwal = k.id_jadwal')
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

    public function acc_krs($input) {
        $data['status'] = 'Y';

        for ($i = 0; $i < count($input); $i++) {
            $where['id_krs'] = $input[$i];
            $this->db->update('krs', $data, $where);
        }
    }

    public function delete_krs($nim, $id_jadwal) {
        return $this->db->delete('krs', ['nim' => $nim, 'id_jadwal' => $id_jadwal]);
    }
}