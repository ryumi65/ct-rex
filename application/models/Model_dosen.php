<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dosen extends CI_Model {

    public function set_dosen() {
        $data = [
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'kewarganegaraan' => $this->input->post('kewarganegaraan'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'id_prodi' => $this->input->post('id_prodi'),
            'nidn_dosen' => $this->input->post('nidn_dosen'),
            'status_dosen' => $this->input->post('status_dosen'),
            'status_kerja' => $this->input->post('status_kerja'),

        ];

        return $this->db->insert('dosen', $data);
    }

    public function update_dosen($nik) {
        $data = [
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'kewarganegaraan' => $this->input->post('kewarganegaraan'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'nidn_dosen' => $this->input->post('nidn_dosen'),
            'status_dosen' => $this->input->post('status_dosen'),
            'status_kerja' => $this->input->post('status_kerja'),
        ];

        return $this->db->update('dosen', $data, ['nik' => $nik]);
    }

    public function delete_dosen($nik) {
        return $this->db->delete('dosen', ['nik' => $nik]);
    }

    public function get_mhs($id_matkul, $nik = '') {
        if ($nik === '') {
            $query = $this->db->from('mahasiswa m')->join('krs k', 'm.nim = k.nim')->join('jadwal j', 'k.id_jadwal = j.id_jadwal')
                ->where('j.id_matkul', $id_matkul)->order_by('k.nim', 'ASC')->get();
        } else {
            $query = $this->db->from('mahasiswa m')->join('krs k', 'm.nim = k.nim')->join('jadwal j', 'k.id_jadwal = j.id_jadwal')
                ->where(['m.dosen_wali' => $nik, 'j.id_matkul' => $id_matkul])->order_by('k.nim', 'ASC')->get();
        }

        return $query->result_array();
    }

    public function set_nilai($id_krs) {
        $data = [
            'nilai_presensi' => $this->input->post('nilai_presensi'),
            'nilai_tugas' => $this->input->post('nilai_tugas'),
            'nilai_uts' => $this->input->post('nilai_uts'),
            'nilai_uas' => $this->input->post('nilai_uas'),
        ];

        return $this->db->update('krs', $data, ['id_krs' => $id_krs]);
    }

    public function set_presensi($id_matkul) {
        $query = $this->db->from('mahasiswa m')->join('krs k', 'm.nim = k.nim')->join('jadwal j', 'k.id_jadwal = j.id_jadwal')
            ->where('j.id_matkul', $id_matkul)->order_by('k.nim', 'ASC')->get()->result_array();

        foreach ($query as $mahasiswa) {
            $presensi = $this->input->post('presensi-' . $mahasiswa['nim'] . '-' . $mahasiswa['id_krs']);

            if (isset($presensi)) {
                $kehadiran = $this->input->post('presensi-' . $mahasiswa['nim'] . '-' . $mahasiswa['id_krs']);
                $id_krs = $mahasiswa['id_krs'];

                $data = [
                    'kehadiran' => $kehadiran,
                    'tanggal' => $this->input->post('tanggal'),
                    'pertemuan' => $this->input->post('pertemuan'),
                    'id_krs' => $id_krs,
                ];

                $this->db->insert('presensi', $data);
            }
        }
    }
}
