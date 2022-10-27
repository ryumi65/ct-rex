<?php
class model_fakultas extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_fakultas($id_fakultas = null) {
		if ($id_fakultas === null) {
			$query = $this->db->get('fakultas');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('fakultas', ['id_fakultas' => $id_fakultas]);
			return $query->row_array();
		}
	}

	public function set_fakultas() {
		$data = [
			'id_fakultas' => $this->input->post('id_fakultas'),
			'nama' => $this->input->post('nama')
		];

		return $this->db->insert('fakultas', $data);
	}

	public function update_fakultas($id_fakultas) {
		$data = [
			'id_fakultas' => $this->input->post('id_fakultas'),
			'nama' => $this->input->post('nama')
		];

		return $this->db->update('fakultas', $data, ['id_fakultas' => $id_fakultas]);
	}
}
