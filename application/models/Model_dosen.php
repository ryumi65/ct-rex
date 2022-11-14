<?php
class Model_dosen extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_dosen($nik = null)
	{
		if ($nik === null) {
			$query = $this->db->get('dosen');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('dosen', ['nik' => $nik]);
			return $query->row_array();
		}
	}

	public function get_dosen_prodi($id_prodi)
	{
		return $this->db->get_where('dosen', ['id_prodi' => $id_prodi])->result_array();
	}

	public function set_dosen()
	{
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
			'kode_dosen' => $this->input->post('kode_dosen'),
			'password_dosen' => $this->input->post('password_dosen'),
			'nidn_dosen' => $this->input->post('nidn_dosen'),
			'status_dosen' => $this->input->post('status_dosen'),
			'status_kerja' => $this->input->post('status_kerja'),

		];

		return $this->db->insert('dosen', $data);
	}

	public function update_dosen($nik)
	{
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
			'kode_dosen' => $this->input->post('kode_dosen'),
			'password_dosen' => $this->input->post('password_dosen'),
			'nidn_dosen' => $this->input->post('nidn_dosen'),
			'status_dosen' => $this->input->post('status_dosen'),
			'status_kerja' => $this->input->post('status_kerja'),
		];

		return $this->db->update('dosen', $data, ['nik' => $nik]);
	}
}
