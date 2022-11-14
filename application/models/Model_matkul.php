<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_matkul extends CI_Model {

	public function set_matkul() {
		$data = [
			'id_matkul' => $this->input->post('id_matkul'),
			'nama' => $this->input->post('nama'),
			'nama_inggris' => $this->input->post('nama_inggris'),
			'jenis' => $this->input->post('jenis'),
			'sks' => $this->input->post('sks'),
			'sks_praktikum' => $this->input->post('sks_praktikum'),
			'nik_dosen' => $this->input->post('nik_dosen'),
			'id_prodi' => $this->input->post('id_prodi'),
		];
		return $this->db->insert('matkul', $data);
	}

	public function update_matkul($id_matkul) {
		$data = [
			'id_matkul' => $this->input->post('id_matkul'),
			'nama' => $this->input->post('nama'),
			'nama_inggris' => $this->input->post('nama_inggris'),
			'jenis' => $this->input->post('jenis'),
			'sks' => $this->input->post('sks'),
			'sks_praktikum' => $this->input->post('sks_praktikum'),
			'nik_dosen' => $this->input->post('nik_dosen'),
			'id_prodi' => $this->input->post('id_prodi'),
		];

		return $this->db->update('matkul', $data, ['id_matkul' => $id_matkul]);
	}
}
