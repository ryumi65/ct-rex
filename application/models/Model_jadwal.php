<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Model_jadwal extends CI_Model {

    public function get_jadwal($id_prodi, $type = '') {
        if ($type === 'jadwal') {
            $query = $this->db->select('j.id_jadwal as id, m.id_matkul, m.kode_matkul as kode, m.nama, m.sks, m.semester, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan')
                ->from('ak_dosen d')->join('ak_matkul m', 'd.nik = m.nik_dosen')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')
                ->where(['j.id_tahun' => $this->session->tahun, 'm.id_prodi' => $id_prodi])->get();
        } else {
            $query = $this->db->select('j.id_jadwal as id, m.id_matkul, m.kode_matkul as kode, m.nama, m.sks, m.semester, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan')
                ->from('ak_dosen d')->join('ak_matkul m', 'd.nik = m.nik_dosen')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->where('m.id_prodi', $id_prodi)->get();
        }

        return $query->result_array();
    }

    public function get_jadwal_fks($id_fakultas, $type = '') {
        if ($type === 'jadwal') {
            $query = $this->db->select('j.id_jadwal as id, m.id_matkul, m.kode_matkul as kode, m.nama, m.sks, m.semester, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan')
                ->from('ak_dosen d')->join('ak_matkul m', 'd.nik = m.nik_dosen')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->join('ak_prodi p', 'p.id_prodi = m.id_prodi')
                ->where(['j.id_tahun' => $this->session->tahun, 'p.id_fakultas' => $id_fakultas])->get();
        } else {
            $query = $this->db->select('j.id_jadwal as id, m.id_matkul, m.kode_matkul as kode, m.nama, m.sks, m.semester, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan')
                ->from('ak_dosen d')->join('ak_matkul m', 'd.nik = m.nik_dosen')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->join('ak_prodi p', 'p.id_prodi = m.id_prodi')
                ->where('p.id_fakultas', $id_fakultas)->get();
        }

        return $query->result_array();
    }

    public function get_jadwal_dsn($nik, $hari = '') {
        if ($hari === '') {
            $query = $this->db->select('m.id_matkul, m.kode_matkul as kode, m.nama, j.pukul as waktu, j.id_ruangan as ruangan, j.hari')
                ->from('ak_dosen d')->join('ak_matkul m', 'd.nik = m.nik_dosen')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')
                ->where(['j.id_tahun' => $this->session->tahun, 'm.nik_dosen' => $nik])->get();
        } else {
            if ($hari === 'jadwal') {
                $list_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                $hari = $list_hari[date('w')];
            }

            $query = $this->db->select('m.id_matkul, m.kode_matkul as kode, m.nama, j.pukul as waktu, j.id_ruangan as ruangan, j.hari')
                ->from('ak_dosen d')->join('ak_matkul m', 'd.nik = m.nik_dosen')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')
                ->where(['j.id_tahun' => $this->session->tahun, 'm.nik_dosen' => $nik, 'j.hari' => $hari])->get();
        }

        return $query->result_array();
    }

    public function set_jadwal() {
        $pukul_awal = $this->input->post('pukul_awal');
        $pukul_akhir = $this->input->post('pukul_akhir');

        $data = [
            'hari' => $this->input->post('hari'),
            'pukul' => "$pukul_awal - $pukul_akhir",
            'id_matkul' => $this->input->post('id_matkul'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'id_tahun' => $this->session->tahun,
        ];

        return $this->db->insert('ak_jadwal', $data);
    }

    public function update_jadwal($id_jadwal) {
        $pukul_awal = $this->input->post('pukul_awal');
        $pukul_akhir = $this->input->post('pukul_akhir');

        $data = [
            'hari' => $this->input->post('hari'),
            'pukul' => "$pukul_awal - $pukul_akhir",
            'id_matkul' => $this->input->post('id_matkul'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'id_tahun' => $this->session->tahun,
        ];

        return $this->db->update('ak_jadwal', $data, ['id_jadwal' => $id_jadwal]);
    }

    public function delete_jadwal($id_jadwal) {
        return $this->db->delete('ak_jadwal', ['id_jadwal' => $id_jadwal]);
    }
}
