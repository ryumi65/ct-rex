<?php

class Model_dosen extends CI_Model {
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
        ];

        return $this->db->insert('dosen',$data);
    }
    public function update_dosen($nik) {
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
        ];

		return $this->db->update('dosen', $data, ['nik' => $nik]);
	}
}

?>