<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        
		$this->load->model('model_matkul');
	}
	public function index()
	{
        $data['list'] = $this->model_matkul->get_matkul();

		$this->load->view('matkul/matkul', $data);
	}
    public function create() {
        $this->form_validation->set_rules('id_matkul','IDMATKUL','required');
        $this->form_validation->set_rules('nama','NAMA','required');
        $this->form_validation->set_rules('sks','SKS','required');
        $this->form_validation->set_rules('status_matkul','STATUS','required');
		$this->form_validation->set_rules('level_matkul','LEVEL','required');
        $this->form_validation->set_rules('nik_dosen','NIK','required');

        if (!$this->form_validation->run()){
            $this->load->view('matkul/create');
        } else{
            $this->model_matkul->set_matkul();
            redirect('matkul');
        }
    }
    public function update($id_matkul)
	{
		$data['matkul'] = $this->model_matkul->get_matkul($id_matkul);

        $this->form_validation->set_rules('id_matkul','IDMATKUL','required');
        $this->form_validation->set_rules('nama','NAMA','required');
        $this->form_validation->set_rules('sks','SKS','required');
        $this->form_validation->set_rules('status_matkul','STATUS','required');
		$this->form_validation->set_rules('level_matkul','LEVEL','required');
        $this->form_validation->set_rules('nik_dosen','NIK','required');

		if (!$this->form_validation->run()) {
			$this->load->view('matkul/update', $data);
		} else {
			$this->model_matkul->update_matkul($id_matkul);
			redirect('matkul');
		}
	}

	public function delete($id_matkul) {
		$this->db->delete('matkul', ['id_matkul' => $id_matkul]);
		redirect('matkul');
	}
    
}
