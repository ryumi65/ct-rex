<?php
class Model_prodi extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_prodi($id_prodi = null) {
		if ($id_prodi === null) {
			$query = $this->db->get('prodi');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('prodi', ['id_prodi' => $id_prodi]);
			return $query->row_array();
		}
	}

	public function set_prodi() {
		$data = [
			'id_prodi' => $this->input->post('id_prodi'),
			'nama' => $this->input->post('nama'),
			'id_fakultas' => $this->input->post('id_fakultas'),
		];

		return $this->db->insert('prodi', $data);
	}

	public function update_prodi($id_prodi) {
		$data = [
			'id_prodi' => $this->input->post('id_prodi'),
			'nama' => $this->input->post('nama'),
			'id_fakultas' => $this->input->post('id_fakultas'),
		];

		return $this->db->update('prodi', $data, ['id_prodi' => $id_prodi]);
	}
}
