<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller { //

	public function __construct() //digunakan biar ga usah diulang penulisan model fakultas di public function
    {
        parent::__construct();
        $this->load->model('model_fakultas');
    }
    public function index() //fungsi utama
	{
		$data ['list'] = $this -> model_fakultas -> get_fakultas (); //untuk menginisiasi (mengakses) model (list = inisiasi)
        $this->load->view('fakultas/fakultas',$data); //memanggil halaman fakultas
	}
    public function create(){
        $this->form_validation->set_rules('id_fakultas','id_fakultas', 'required');
        $this->form_validation->set_rules('nama','nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('fakultas/create');
        }else {
            $this->model_fakultas->set_fakultas();
            redirect ('fakultas');
        }
	}
    
    public function update($id_fakultas)
	{
		$data['fakultas'] = $this->model_fakultas->get_fakultas($id_fakultas);

		$this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
		if (!$this->form_validation->run()) {
			$this->load->view('fakultas/update', $data);
		} else {
			$this->model_fakultas->update_fakultas($id_fakultas);
			redirect('fakultas');
		}
	}

	public function delete($id_fakultas) {
		$this->db->delete('fakultas', ['id_fakultas' => $id_fakultas]);
		redirect('fakultas');
	}

}
