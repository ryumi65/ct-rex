<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_dosen');

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 3) redirect(strtolower($this->session->access));
    }

    public function index() {
        if (uri_string() === 'dosen/index') return redirect('dosen');

        $akun = $this->model_dosen->get_db('akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'dosen' => $this->model_dosen->get_db('dosen', ['nik' => $this->session->id]),
            'mhswali' => $this->model_dosen->get_db_count('mahasiswa', ['dosen_wali' => $this->session->id]),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil() {
        $akun = $this->model_dosen->get_db('akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'dosen' => $this->model_dosen->get_db('dosen', ['nik' => $this->session->id]),
            'mhswali' => $this->model_dosen->get_db_count('mahasiswa', ['dosen_wali' => $this->session->id]),
            'listp' => $this->model_dosen->get_db('prodi'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/profil', $data);
        $this->load->view('_partials/script');
    }

    public function create() {
        $data['listp'] = $this->model_dosen->get_db('prodi');

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
        $this->form_validation->set_rules('id_prodi', 'ID Prodi', 'required');
        $this->form_validation->set_rules('nidn_dosen', 'NIDN Dosen', 'required');
        $this->form_validation->set_rules('status_dosen', 'Status Dosen', 'required');
        $this->form_validation->set_rules('status_kerja', 'Status Kerja', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('dosen/create', $data);
        } else {
            $this->model_dosen->set_dosen();
            redirect('dosen');
        }
    }

    public function update($nik) {
        $data['dosen'] = $this->model_dosen->get_db('dosen', ['nik' => $nik]);
        $data['listp'] = $this->model_dosen->get_db('prodi');

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
        $this->form_validation->set_rules('id_prodi', 'ID Prodi', 'required');
        $this->form_validation->set_rules('nidn_dosen', 'NIDN Dosen', 'required');
        $this->form_validation->set_rules('status_dosen', 'Status Dosen', 'required');
        $this->form_validation->set_rules('status_kerja', 'Status Kerja', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/update', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_dosen->update_dosen($nik);
            redirect('dosen/profil');
        }
    }
}
