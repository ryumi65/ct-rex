<?php
class Model_prodi extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_prodi($id_prodi = null)
	{
		if ($id_prodi === null) {
			$query = $this->db->get('prodi');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('prodi', ['id_prodi' => $id_prodi]);
			return $query->row_array();
		}
	}

	public function set_prodi()
	{
		$data = [
			'id_prodi' => $this->input->post('id_prodi'),
			'nama' => $this->input->post('nama'),
			'id_fakultas' => $this->input->post('id_fakultas'),
		];

		return $this->db->insert('prodi', $data);
	}

	public function profil_mahasiswa()
	{
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

		return $this->db->insert('prodi', $data);
	}

	public function update_prodi($id_prodi)
	{
		$data = [
			'id_prodi' => $this->input->post('id_prodi'),
			'nama' => $this->input->post('nama'),
			'id_fakultas' => $this->input->post('id_fakultas'),
		];

		return $this->db->update('prodi', $data, ['id_prodi' => $id_prodi]);
	}
}
