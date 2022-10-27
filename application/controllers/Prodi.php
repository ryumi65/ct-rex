<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_prodi');
    }
	public function index()
	{
        $data['list'] = $this->model_prodi->get_prodi();
		$this->load->view('prodi/prodi',$data);
	}
    public function create()
    {
        $this->form_validation->set_rules('id_prodi','id_prodi harus diisi','required');
        $this->form_validation->set_rules('Nama','nama harus diisi','required');
        $this->form_validation->set_rules('id_fakultas','id_fakultas harus diisi','required');

        if (!$this->form_validation->run()){
            $this->load->view('prodi/create');
        } else{
            $this->model_prodi->set_prodi();
            redirect('prodi');
        }
    }
	public function update($id_prodi)
	{
		$data['prodi'] = $this->model_prodi->get_prodi($id_prodi);

		$this->form_validation->set_rules('id_prodi', 'id_prodi', 'required');
		$this->form_validation->set_rules('Nama', 'Nama', 'required');
		$this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'required');
		

		if (!$this->form_validation->run()) {
			$this->load->view('prodi/update', $data);
		} else {
			$this->model_prodi->update_prodi($id_prodi);
			redirect('prodi');
		}
	}

	public function delete($id_prodi) {
		$this->db->delete('prodi', ['id_prodi' => $id_prodi]);
		redirect('prodi');
	}
}
