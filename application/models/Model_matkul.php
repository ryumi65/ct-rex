<?php

class model_matkul extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_matkul($id_matkul=null)
    {
        if ($id_matkul === null) {
			$query = $this->db->get('matkul');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('matkul', ['id_matkul' => $id_matkul]);
			return $query->row_array();
        }
    }
    public function set_matkul()
    {
        $data = [
            'id_matkul'=>$this->input->post('id_matkul'),
            'nama'=>$this->input->post('nama'),
            'sks'=>$this->input->post('sks'),
            'status_matkul'=>$this->input->post('status_matkul'),
			'level_matkul'=>$this->input->post('level_matkul'),
            'nik_dosen'=>$this->input->post('nik_dosen'),
        ];
        return $this->db->insert('matkul',$data);
    }
    public function update_matkul($id_matkul) {
		$data = [
            'id_matkul'=>$this->input->post('id_matkul'),
            'nama'=>$this->input->post('nama'),
            'sks'=>$this->input->post('sks'),
            'status_matkul'=>$this->input->post('status_matkul'),
			'level_matkul'=>$this->input->post('level_matkul'),
            'nik_dosen'=>$this->input->post('nik_dosen'),
		];

		return $this->db->update('matkul', $data, ['id_matkul' => $id_matkul]);
	} 
}


?>
