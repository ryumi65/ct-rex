<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_mahasiswa extends CI_Model {

    public function set_mahasiswa() {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'agama' => $this->input->post('agama'),
            'no_hp' => $this->input->post('no_hp'),
            'email' => $this->input->post('email'),
            'id_prodi' => $this->input->post('id_prodi'),
            'tahun_angkatan' => $this->input->post('tahun_angkatan'),
            'kewarganegaraan' => $this->input->post('kewarganegaraan'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'kelurahan' => $this->input->post('kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'kode_pos' => $this->input->post('kode_pos'),
        ];

        return $this->db->insert('mahasiswa', $data);
    }

    public function update_mahasiswa($nim) {
        $data = [
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'agama' => $this->input->post('agama'),
            'no_hp' => $this->input->post('no_hp'),
            'email' => $this->input->post('email'),
            'kewarganegaraan' => $this->input->post('kewarganegaraan'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'kelurahan' => $this->input->post('kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'kode_pos' => $this->input->post('kode_pos'),
        ];

        return $this->db->update('mahasiswa', $data, ['nim' => $nim]);
    }

    public function update_ortu($nim) {
        $data = [
            'nik_ayah' => $this->input->post('nik_ayah'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'tanggal_lahir_ayah' => $this->input->post('tanggal_lahir_ayah'),
            'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
            'penghasilan_ayah' => $this->input->post('penghasilan_ayah'),
            'nik_ibu' => $this->input->post('nik_ibu'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'tanggal_lahir_ibu' => $this->input->post('tanggal_lahir_ibu'),
            'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'penghasilan_ibu' => $this->input->post('penghasilan_ibu'),
            'nik_wali' => $this->input->post('nik_wali'),
            'nama_wali' => $this->input->post('nama_wali'),
            'tanggal_lahir_wali' => $this->input->post('tanggal_lahir_wali'),
            'pendidikan_wali' => $this->input->post('pendidikan_wali'),
            'pekerjaan_wali' => $this->input->post('pekerjaan_wali'),
            'penghasilan_wali' => $this->input->post('penghasilan_wali'),
        ];

        return $this->db->update('orang_tua', $data, ['nim' => $nim]);
    }

    public function delete_mahasiswa($nim) {
        return $this->db->delete('mahasiswa', ['nim' => $nim]);
    }
}
