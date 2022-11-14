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
}
