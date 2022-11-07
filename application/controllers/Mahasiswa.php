<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('model_mahasiswa');
		$this->load->model('model_prodi');
	}

	public function index() {
		$data['list'] = $this->model_mahasiswa->get_mahasiswa();

        $this->load->view('mahasiswa/mahasiswa', $data);
	}

    public function profile() {
        $this->load->view('template/header');
        $this->load->view('mahasiswa/profile');
    }

	public function create() {
		$data['listp'] = $this->model_prodi->get_prodi();

		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('tahun_angkatan', 'Tahun Angkatan', 'required');
		$this->form_validation->set_rules('id_prodi', 'ID Prodi', 'required');

		if (!$this->form_validation->run()) {
			$this->load->view('mahasiswa/create', $data);
		} else {
			$this->model_mahasiswa->set_mahasiswa();
			redirect('mahasiswa');
		}
	}

	public function update($nim) {
		$data['mahasiswa'] = $this->model_mahasiswa->get_mahasiswa($nim);
		$data['listp'] = $this->model_prodi->get_prodi();

		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('tahun_angkatan', 'Tahun Angkatan', 'required');
		$this->form_validation->set_rules('id_prodi', 'ID Prodi', 'required');

		if (!$this->form_validation->run()) {
			$this->load->view('mahasiswa/update', $data);
		} else {
			$this->model_mahasiswa->update_mahasiswa($nim);
			redirect('mahasiswa');
		}
	}

	public function delete($nim) {
		$this->db->delete('mahasiswa', ['nim' => $nim]);
		redirect('mahasiswa');
	}
}
