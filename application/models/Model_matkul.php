<?php
class model_matkul extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_matkul($id_matkul = null) {
		if ($id_matkul === null) {
			$query = $this->db->get('matkul');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('matkul', ['id_matkul' => $id_matkul]);
			return $query->row_array();
		}
	}

	public function set_matkul() {
		$data = [
			'id_matkul' => $this->input->post('id_matkul'),
			'nama_matkul' => $this->input->post('nama_matkul'),
			'nama_matkul_inggris' => $this->input->post('nama_matkul_inggris'),
			'jenis_matkul' => $this->input->post('jenis_matkul'),
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
			'nama_matkul' => $this->input->post('nama_matkul'),
			'nama_matkul_inggris' => $this->input->post('nama_matkul_inggris'),
			'jenis_matkul' => $this->input->post('jenis_matkul'),
			'sks' => $this->input->post('sks'),
			'sks_praktikum' => $this->input->post('sks_praktikum'),
			'nik_dosen' => $this->input->post('nik_dosen'),
			'id_prodi' => $this->input->post('id_prodi'),
		];

		return $this->db->update('matkul', $data, ['id_matkul' => $id_matkul]);
	}
}
