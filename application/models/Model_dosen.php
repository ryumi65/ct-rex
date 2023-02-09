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

    public function get_mhs($id_matkul) {
        $query = $this->db->from('ak_mahasiswa m')->join('ak_krs k', 'm.nim = k.nim')->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')->join('ak_akun a', 'k.nim = a.id_akun')
            ->where(['j.id_tahun' => $this->session->tahun, 'k.status' => 'Y', 'j.id_matkul' => $id_matkul])->order_by('k.nim', 'ASC')->get();

        return $query->result_array();
    }

    public function set_nilai($id_matkul) {
        $query = $this->db->from('ak_matkul m')->join('ak_jadwal j', 'm.id_matkul = j.id_matkul')->join('ak_krs k', 'j.id_jadwal = k.id_jadwal')
            ->where(['j.id_tahun' => $this->session->tahun, 'm.id_matkul' => $id_matkul])->get()->result_array();

        foreach ($query as $krs) {
            $nilai = $this->input->post('nilai-' . $krs['id_krs']);

            if (isset($nilai)) {
                if ($nilai > 100) $nilai = 100;

                $data = [
                    'nilai' => $nilai,
                ];

                $this->db->update('ak_krs', $data, ['id_krs' => $krs['id_krs']]);
            }
        }
    }

    public function get_presensi($id_matkul, $pertemuan = '', $type = '') {
        if ($pertemuan === '') {
            $query = $this->db->select('p.id_krs, p.kehadiran, p.tanggal, p.pertemuan, j.pukul, j.hari')->from('ak_presensi p')->join('ak_krs k', 'p.id_krs = k.id_krs')
                ->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')->join('ak_matkul m', 'j.id_matkul = m.id_matkul')
                ->where(['j.id_tahun' => $this->session->tahun, 'k.status' => 'Y', 'j.id_matkul' => $id_matkul])->get();
        } else {
            $query = $this->db->select('p.id_krs, p.kehadiran, p.tanggal, p.pertemuan, j.pukul, j.hari')->from('ak_presensi p')->join('ak_krs k', 'p.id_krs = k.id_krs')
                ->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')->join('ak_matkul m', 'j.id_matkul = m.id_matkul')
                ->where(['j.id_tahun' => $this->session->tahun, 'k.status' => 'Y', 'j.id_matkul' => $id_matkul, 'p.pertemuan' => $pertemuan])->get();
        }

        if ($type === 'validation') {
            if ($query->num_rows() > 0) return true;

            return false;
        }

        return $query->result_array();
    }

    public function set_presensi($id_matkul) {
        $query = $this->db->from('ak_mahasiswa m')->join('ak_krs k', 'm.nim = k.nim')->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')
            ->where(['j.id_tahun' => $this->session->tahun, 'j.id_matkul' => $id_matkul])->order_by('k.nim', 'ASC')->get()->result_array();

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
            ->where(['j.id_tahun' => $this->session->tahun, 'j.id_matkul' => $id_matkul])->order_by('k.nim', 'ASC')->get()->result_array();

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

    public function jumlah_presensi($id_matkul, $pertemuan) {
        $query = $this->db->from('ak_presensi p')->join('ak_krs k', 'p.id_krs = k.id_krs')
            ->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')->join('ak_matkul m', 'j.id_matkul = m.id_matkul')
            ->where(['j.id_tahun' => $this->session->tahun, 'j.id_matkul' => $id_matkul, 'p.pertemuan' => $pertemuan, 'p.kehadiran' => 'Hadir']);

        return $query->count_all_results();
    }

    public function get_bap($id_matkul) {
        $query = $this->db->from('ak_bap b')->join('ak_jadwal j', 'b.id_jadwal = j.id_jadwal')
            ->join('ak_matkul m', 'j.id_matkul = m.id_matkul')->where(['j.id_tahun' => $this->session->tahun, 'm.id_matkul' => $id_matkul])->get();

        return $query->result_array();
    }

    public function set_bap($id_matkul, $pertemuan) {
        $query = $this->db->from('ak_presensi p')->join('ak_krs k', 'p.id_krs = k.id_krs')
            ->join('ak_jadwal j', 'k.id_jadwal = j.id_jadwal')->join('ak_matkul m', 'j.id_matkul = m.id_matkul')
            ->where(['j.id_tahun' => $this->session->tahun, 'j.id_matkul' => $id_matkul, 'p.pertemuan' => $pertemuan, 'p.kehadiran' => 'Hadir'])->get();

        $jumlah = $this->jumlah_presensi($id_matkul, $pertemuan);

        if ($query->num_rows() > 0) {
            $presensi = $query->result_array();
        } else {
            throw new Exception('Gagal membuat BAP. Tidak ada mahasiswa yang hadir pada presensi.');
        }

        $data = [
            'id_jadwal' => $presensi[0]['id_jadwal'],
            'pertemuan' => $pertemuan,
            'pokok' => $this->input->post('pokok'),
            'metode' => $this->input->post('metode'),
            'evaluasi' => $this->input->post('evaluasi'),
            'jumlah_mhs_hadir' => $jumlah,
        ];

        return $this->db->insert('ak_bap', $data);
    }

    public function update_bap($id_matkul, $pertemuan, $id_bap) {
        $jumlah = $this->jumlah_presensi($id_matkul, $pertemuan);

        $data = [
            'pertemuan' => $pertemuan,
            'pokok' => $this->input->post('pokok'),
            'metode' => $this->input->post('metode'),
            'evaluasi' => $this->input->post('evaluasi'),
            'jumlah_mhs_hadir' => $jumlah,
        ];

        return $this->db->update('ak_bap', $data, ['id_bap' => $id_bap]);
    }

    public function delete_bap($id_bap) {
        return $this->db->delete('ak_bap', ['id_bap' => $id_bap]);
    }

    public function update_capaian($id_matkul) {
        $data = [
            'cpl_prodi' => $this->input->post('cpl_prodi'),
            'cp_mk' => $this->input->post('cp_mk'),
        ];

        return $this->db->update('ak_matkul', $data, ['id_matkul' => $id_matkul]);
    }
}
