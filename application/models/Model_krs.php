<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Model_krs extends CI_Model {

    public function acc_krs() {
        $listk = $this->get_krs();

        foreach ($listk as $krs) {
            $data['status'] = $this->input->post($krs['id_krs']);

            if (isset($data['status'])) {
                $this->db->update('ak_krs', $data, ['id_krs' => $krs['id_krs']]);
            }
        }
    }

    public function get_list_krs($id_prodi, $semester) {
        $query = $this->db->select('j.id_jadwal as id, m.kode_matkul as kode, m.nama, m.sks, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan')
            ->from('ak_jadwal j')->join('ak_matkul m', 'j.id_matkul = m.id_matkul')->join('ak_dosen d', 'm.nik_dosen = d.nik')
            ->where(['j.id_tahun' => $this->session->tahun, 'm.id_prodi' => $id_prodi, 'm.semester' => $semester])->get();

        return $query->result_array();
    }

    public function get_mk($nim, $semester) {
        $this->db->from('ak_matkul m')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->join('ak_krs k', 'j.id_jadwal = k.id_jadwal')
            ->where(['k.nim' => $nim, 'm.semester' => $semester]);

        return $this->db->count_all_results();
    }

    public function get_krs($nim = '', $type = '') {
        if ($nim === '') {
            $query = $this->db->select('j.id_jadwal as id, k.id_krs, m.kode_matkul as kode, m.nama, m.sks, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan, k.status, m.semester')
                ->from('ak_dosen d')->join('ak_matkul m', 'd.nik = m.nik_dosen')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->join('ak_krs k', 'j.id_jadwal = k.id_jadwal')
                ->where('j.id_tahun', $this->session->tahun)->get();
        } else {
            $query = $this->db->select('j.id_jadwal as id, k.id_krs, m.kode_matkul as kode, m.nama, m.sks, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan, k.status, m.semester')
                ->from('ak_dosen d')->join('ak_matkul m', 'd.nik = m.nik_dosen')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->join('ak_krs k', 'j.id_jadwal = k.id_jadwal')
                ->where(['j.id_tahun' => $this->session->tahun, 'k.nim' => $nim])->get();
        }

        if ($type === 'object') return $query;

        return $query->result_array();
    }

    public function get_krs_mhs($nim, $hari = '') {
        if ($hari === '') {
            $list_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            $hari = $list_hari[date('w')];
        }

        $query = $this->db->select('m.id_matkul, m.nama, d.nama as dosen, j.pukul as waktu, j.id_ruangan as ruangan, j.hari')
            ->from('ak_dosen d')->join('ak_matkul m', 'd.nik = m.nik_dosen')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->join('ak_krs k', 'j.id_jadwal = k.id_jadwal')
            ->where(['j.id_tahun' => $this->session->tahun, 'k.status' => 'Y', 'k.nim' => $nim, 'j.hari' => $hari])->get();

        return $query->result_array();
    }

    public function get_krs_smt($nim, $semester, $status = '') {
        if ($status === '') {
            $query = $this->db->select('j.id_jadwal as id, m.kode_matkul as kode, m.nama, m.sks, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan, k.status, k.nilai')
                ->from('ak_dosen d')->join('ak_matkul m', 'd.nik = m.nik_dosen')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->join('ak_krs k', 'j.id_jadwal = k.id_jadwal')
                ->where(['k.nim' => $nim, 'm.semester' => $semester])->get();
        } else {
            $query = $this->db->select('j.id_jadwal as id, m.kode_matkul as kode, m.nama, m.sks, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan, k.status, k.nilai')
                ->from('ak_dosen d')->join('ak_matkul m', 'd.nik = m.nik_dosen')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->join('ak_krs k', 'j.id_jadwal = k.id_jadwal')
                ->where(['k.status' => $status, 'k.nim' => $nim, 'm.semester' => $semester])->get();
        }

        return $query->result_array();
    }

    public function get_sks($nim, $semester = '') {
        if ($semester === '') {
            $query = $this->db->select('m.sks, k.nilai')->from('ak_matkul m')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')
                ->join('ak_krs k', 'j.id_jadwal = k.id_jadwal')->where(['k.status' => 'Y', 'k.nim' => $nim])->get();
        } else {
            $query = $this->db->select('m.sks, k.nilai')->from('ak_matkul m')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->join('ak_krs k', 'j.id_jadwal = k.id_jadwal')
                ->where(['k.status' => 'Y', 'k.nim' => $nim, 'm.semester' => $semester])->get();
        }

        return $query->result_array();
    }

    public function get_sks_dosen($nik) {
        $query = $this->db->select('sks')->from('ak_matkul')->where('nik_dosen', $nik)->get();

        return $query->result_array();
    }

    public function set_krs($input) {
        $data['nim'] = $this->session->id;

        for ($i = 0; $i < count($input); $i++) {
            $data['id_jadwal'] = $input[$i];
            $this->db->insert('ak_krs', $data);
        }
    }

    public function delete_krs($nim, $id_jadwal) {
        return $this->db->delete('ak_krs', ['nim' => $nim, 'id_jadwal' => $id_jadwal]);
    }
}
