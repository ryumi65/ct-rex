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
        if ($this->input->post('nilai_presensi') > 100) $np = 100;
        else $np = $this->input->post('nilai_presensi');

        if ($this->input->post('nilai_tugas') > 100) $nt = 100;
        else $nt = $this->input->post('nilai_tugas');

        if ($this->input->post('nilai_uts') > 100) $nuts = 100;
        else $nuts = $this->input->post('nilai_uts');

        if ($this->input->post('nilai_uas') > 100) $nuas = 100;
        else $nuas = $this->input->post('nilai_uas');

        $data = [
            'nilai_presensi' => $np,
            'nilai_tugas' => $nt,
            'nilai_uts' => $nuts,
            'nilai_uas' => $nuas,
        ];

        return $this->db->update('krs', $data, ['id_krs' => $id_krs]);
    }

    public function get_presensi($id_matkul, $pertemuan) {
        $query = $this->db->select('p.id_krs, p.kehadiran')->from('presensi p')->join('krs k', 'p.id_krs = k.id_krs')
            ->join('jadwal j', 'k.id_jadwal = j.id_jadwal')->join('matkul m', 'j.id_matkul = m.id_matkul')
            ->where(['j.id_matkul' => $id_matkul, 'p.pertemuan' => $pertemuan])->get();

        return $query->result_array();
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
