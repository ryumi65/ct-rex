<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jadwal extends CI_Model {

    public function get_jadwal($id_prodi) {
        $query = $this->db->select('j.id_jadwal as id, m.kode_matkul as kode, m.nama, m.sks, d.nama as dosen, j.hari, j.pukul as waktu, j.id_ruangan as ruangan')
            ->from('dosen d')->join('matkul m', 'd.nik = m.nik_dosen')->join('jadwal j', 'm.id_matkul = j.id_matkul')
            ->where('m.id_prodi', $id_prodi)->get();

        return $query->result_array();
    }

    public function set_jadwal() {
        $data = [
            'hari' => $this->input->post('hari'),
            'pukul' => $this->input->post('pukul_awal') . ' - ' . $this->input->post('pukul_akhir'),
            'id_matkul' => $this->input->post('id_matkul'),
            'id_ruangan' => $this->input->post('id_ruangan'),
        ];

        return $this->db->insert('jadwal', $data);
    }

    public function update_jadwal($id_jadwal) {
        $data = [
            'hari' => $this->input->post('hari'),
            'pukul' => $this->input->post('pukul_awal') . ' - ' . $this->input->post('pukul_akhir'),
            'id_matkul' => $this->input->post('id_matkul'),
            'id_ruangan' => $this->input->post('id_ruangan'),
        ];

        return $this->db->update('jadwal', $data, ['id_jadwal' => $id_jadwal]);
    }

    public function delete_jadwal($id_jadwal) {
        return $this->db->delete('jadwal', ['id_jadwal' => $id_jadwal]);
    }
}
