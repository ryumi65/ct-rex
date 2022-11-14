<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_prodi');
        $this->load->model('model_fakultas');
        $this->load->model('model_dosen');
    }

    public function index()
    {
        if (uri_string() === 'prodi/index') return redirect('prodi');

        $data['prodi'] = $this->model_prodi->get_prodi($this->session->id);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profile()
    {
        $data['prodi'] = $this->model_prodi->get_prodi($this->session->id);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profile', $data);
        $this->load->view('_partials/script');
    }

    public function datadsn()
    {
        $data['prodi'] = $this->model_prodi->get_prodi($this->session->id);
        $data['listd'] = $this->model_dosen->get_dosen_prodi($this->session->id);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datadsn', $data);
        $this->load->view('_partials/script');
    }

    public function datamhs()
    {
        $data['prodi'] = $this->model_prodi->get_prodi($this->session->id);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datamhs', $data);
        $this->load->view('_partials/script');
    }

    public function profilmhs()
    {
        $data['prodi'] = $this->model_prodi->get_prodi($this->session->id);


        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profilmhs', $data);
        $this->load->view('_partials/script');
    }

    public function profildsn($nik)
    {
        $data['prodi'] = $this->model_prodi->get_prodi($this->session->id);
        $data['listp'] = $this->model_prodi->get_prodi();
        $data['dosen'] = $this->model_dosen->get_dosen($nik);


        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profildsn', $data);
        $this->load->view('_partials/script');
    }

    public function profildsnwl()
    {
        $data['prodi'] = $this->model_prodi->get_prodi($this->session->id);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datadsnwl', $data);
        $this->load->view('_partials/script');
    }

    public function create()
    {
        $data['listf'] = $this->model_fakultas->get_fakultas();

        $this->form_validation->set_rules('id_prodi', 'id_prodi harus diisi', 'required');
        $this->form_validation->set_rules('nama', 'nama harus diisi', 'required');
        $this->form_validation->set_rules('id_fakultas', 'id_fakultas harus diisi', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('prodi/create', $data);
        } else {
            $this->model_prodi->set_prodi();
            redirect('prodi');
        }
    }

    public function update()
    {
        $data['prodi'] = $this->model_prodi->get_prodi($this->session->id);
        $data['listf'] = $this->model_fakultas->get_fakultas();

        $this->form_validation->set_rules('id_prodi', 'id_prodi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'required');


        if (!$this->form_validation->run()) {
            $this->load->view('prodi/update', $data);
        } else {
            $this->model_prodi->update_prodi($this->session->id);
            redirect('prodi/profile');
        }
    }
}
