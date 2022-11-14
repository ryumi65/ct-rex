<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matkul extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('model_matkul');
		$this->load->model('model_prodi');
	}

	public function index() {
		$data['list'] = $this->model_matkul->get_db('matkul');

		$this->load->view('matkul/matkul', $data);
	}

	public function create() {
		$data['listp'] = $this->model_prodi->get_db('prodi');

		$this->form_validation->set_rules('id_matkul', 'IDMATKUL', 'required');
		$this->form_validation->set_rules('nama', 'NAMA', 'required');
		$this->form_validation->set_rules('nama_inggris', 'NAMAINGGRIS', 'required');
		$this->form_validation->set_rules('jenis', 'JENIS', 'required');
		$this->form_validation->set_rules('sks', 'SKS', 'required');
		$this->form_validation->set_rules('sks_praktikum', 'SKSPRAK', 'required');
		$this->form_validation->set_rules('nik_dosen', 'NIK', 'required');
		$this->form_validation->set_rules('id_prodi', 'IDPRODI', 'required');

		if (!$this->form_validation->run()) {
			$this->load->view('matkul/create', $data);
		} else {
			$this->model_matkul->set_matkul();
			redirect('matkul');
		}
	}

	public function update($id_matkul) {
		$data['matkul'] = $this->model_matkul->get_db('matkul', 'id_matkul', $id_matkul);
		$data['listp'] = $this->model_prodi->get_db('prodi');

		$this->form_validation->set_rules('id_matkul', 'IDMATKUL', 'required');
		$this->form_validation->set_rules('nama', 'NAMA', 'required');
		$this->form_validation->set_rules('nama_inggris', 'NAMAINGGRIS', 'required');
		$this->form_validation->set_rules('jenis', 'JENIS', 'required');
		$this->form_validation->set_rules('sks', 'SKS', 'required');
		$this->form_validation->set_rules('sks_praktikum', 'SKSPRAK', 'required');
		$this->form_validation->set_rules('nik_dosen', 'NIK', 'required');
		$this->form_validation->set_rules('id_prodi', 'IDPRODI', 'required');

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
