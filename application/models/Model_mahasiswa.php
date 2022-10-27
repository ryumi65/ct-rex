<?php

class Model_mahasiswa extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_mahasiswa()
	{
		$query = $this->db->get('mahasiswa');

		return $query->result_array();
	}

	public function set_mahasiswa()
	{
		$data = [
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'tahun_angkatan' => $this->input->post('tahun_angkatan'),
		];

		return $this->db->insert('mahasiswa', $data);
	}
	
}
