<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        
		$this->load->model('model_dosen');
	}
	public function index()
	{
        $data['list'] = $this->model_dosen->get_dosen();

		$this->load->view('dosen', $data);
    }
    public function create(){
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

    if (!$this->form_validation->run()) {
        $this->load->view('create');
    } else {
            $this->model_dosen->set_dosen();
            redirect('dosen');
        }
    }
    public function update($nik)
	{
		$data['dosen'] = $this->model_dosen->get_dosen($nik);

		$this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if (!$this->form_validation->run()) {
			$this->load->view('update', $data);
		} else {
			$this->model_dosen->update_dosen($nik);
			redirect('dosen');
		}
	}

	public function delete($nik) {
		$this->db->delete('dosen', ['nik' => $nik]);
		redirect('dosen');
	}
}
