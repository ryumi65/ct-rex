<?php
class Model_mahasiswa extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_mahasiswa($nim = null) {
		if ($nim === null) {
			$query = $this->db->get('mahasiswa');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('mahasiswa', ['nim' => $nim]);
			return $query->row_array();
		}
	}

	public function set_mahasiswa() {
		$data = [
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'tahun_angkatan' => $this->input->post('tahun_angkatan'),
			'id_prodi' => $this->input->post('id_prodi'),
		];

		return $this->db->insert('mahasiswa', $data);
	}

	public function update_mahasiswa($nim) {
		$data = [
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'tahun_angkatan' => $this->input->post('tahun_angkatan'),
			'id_prodi' => $this->input->post('id_prodi'),
		];

		return $this->db->update('mahasiswa', $data, ['nim' => $nim]);
	}
}
