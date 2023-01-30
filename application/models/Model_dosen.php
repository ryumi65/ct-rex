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

        return $this->db->insert('ak_dosen', $data);
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

        return $this->db->update('ak_dosen', $data, ['nik' => $nik]);
    }

    public function delete_dosen($nik) {
        return $this->db->delete('ak_dosen', ['nik' => $nik]);
    }

    public function get_mhs($id_matkul, $nik = '') {
        if ($nik === '') {
            $query = $this->db->from('ak_mahasiswa m')->join('ak_krs k', 'm.nim = k.nim')->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')->join('ak_akun a', 'k.nim = a.id_akun')
                ->where('j.id_matkul', $id_matkul)->order_by('k.nim', 'ASC')->get();
        } else {
            $query = $this->db->from('ak_mahasiswa m')->join('ak_krs k', 'm.nim = k.nim')->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')->join('ak_akun a', 'k.nim = a.id_akun')
                ->where(['m.dosen_wali' => $nik, 'j.id_matkul' => $id_matkul])->order_by('k.nim', 'ASC')->get();
        }

        return $query->result_array();
    }

    public function set_nilai($id_matkul) {
        $query = $this->db->from('ak_matkul m')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->join('ak_krs k', 'j.id_jadwal = k.id_jadwal')
            ->where('m.id_matkul', $id_matkul)->get()->result_array();

        foreach ($query as $krs) {
            $presensi = $this->input->post('nilai-presensi-' . $krs['id_krs']);
            $tugas = $this->input->post('nilai-tugas-' . $krs['id_krs']);
            $uts = $this->input->post('nilai-uts-' . $krs['id_krs']);
            $uas = $this->input->post('nilai-uas-' . $krs['id_krs']);

            if (isset($presensi) && isset($tugas) && isset($uts) && isset($uas)) {
                if ($presensi > 100) $presensi = 100;
                if ($tugas > 100) $tugas = 100;
                if ($uts > 100) $uts = 100;
                if ($uas > 100) $uas = 100;

                $data = [
                    'nilai_presensi' => $presensi,
                    'nilai_tugas' => $tugas,
                    'nilai_uts' => $uts,
                    'nilai_uas' => $uas,
                ];

                $this->db->update('ak_krs', $data, ['id_krs' => $krs['id_krs']]);
            }
        }
    }

    public function get_presensi($id_matkul, $pertemuan, $type = '') {
        $query = $this->db->select('p.id_krs, p.kehadiran, p.tanggal')->from('ak_presensi p')->join('ak_krs k', 'p.id_krs = k.id_krs')
            ->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')->join('ak_matkul m', 'j.id_matkul = m.id_matkul')
            ->where(['j.id_matkul' => $id_matkul, 'p.pertemuan' => $pertemuan])->get();

        if ($type === 'validation') {
            if ($query->num_rows() > 0) return true;

            return false;
        }

        return $query->result_array();
    }

    public function set_presensi($id_matkul) {
        $query = $this->db->from('ak_mahasiswa m')->join('ak_krs k', 'm.nim = k.nim')->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')
            ->where('j.id_matkul', $id_matkul)->order_by('k.nim', 'ASC')->get()->result_array();

        foreach ($query as $mahasiswa) {
            $presensi = $this->input->post('presensi-' . $mahasiswa['nim'] . '-' . $mahasiswa['id_krs']);

            if (isset($presensi)) {
                $kehadiran = $this->input->post('presensi-' . $mahasiswa['nim'] . '-' . $mahasiswa['id_krs']);

                $data = [
                    'id_krs' => $mahasiswa['id_krs'],
                    'kehadiran' => $kehadiran,
                    'pertemuan' => $this->input->post('pertemuan'),
                    'tanggal' => $this->input->post('tanggal'),
                ];

                $this->db->insert('ak_presensi', $data);
            }
        }
    }

    public function update_presensi($id_matkul, $pertemuan) {
        $query = $this->db->from('ak_mahasiswa m')->join('ak_krs k', 'm.nim = k.nim')->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')
            ->where('j.id_matkul', $id_matkul)->order_by('k.nim', 'ASC')->get()->result_array();

        foreach ($query as $mahasiswa) {
            $presensi = $this->input->post('presensi-' . $mahasiswa['nim'] . '-' . $mahasiswa['id_krs']);

            if (isset($presensi)) {
                $kehadiran = $this->input->post('presensi-' . $mahasiswa['nim'] . '-' . $mahasiswa['id_krs']);
                $id_krs = $mahasiswa['id_krs'];

                $data = [
                    'id_krs' => $id_krs,
                    'kehadiran' => $kehadiran,
                    'pertemuan' => $pertemuan,
                    'tanggal' => $this->input->post('tanggal'),
                ];

                $this->db->update('ak_presensi', $data, ['id_krs' => $mahasiswa['id_krs'], 'pertemuan' => $pertemuan]);
            }
        }
    }
}
