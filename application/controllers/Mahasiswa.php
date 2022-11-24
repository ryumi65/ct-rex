<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_mahasiswa');

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 4) redirect(strtolower($this->session->access));
    }

    public function index() {
        if (uri_string() === 'mahasiswa/index') return redirect('mahasiswa');

        $data['mahasiswa'] = $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil() {
        $data['mahasiswa'] = $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]);
        $data['ortu'] = $this->model_mahasiswa->get_db('orang_tua', ['nim' => $this->session->id]);
        $data['listp'] = $this->model_mahasiswa->get_db('prodi');

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/profil', $data);
        $this->load->view('_partials/script');
    }

    public function create() {
        $data['listp'] = $this->model_mahasiswa->get_db('prodi');

        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('id_prodi', 'ID Prodi', 'required');
        $this->form_validation->set_rules('tahun_angkatan', 'Tahun Angkatan', 'required');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('mahasiswa/create', $data);
        } else {
            $this->model_mahasiswa->set_mahasiswa();
            redirect('mahasiswa');
        }
    }

    public function update($nim) {
        $data['mahasiswa'] = $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $nim]);
        $data['ortu'] = $this->model_mahasiswa->get_db('orang_tua', ['nim' => $nim]);
        $data['listp'] = $this->model_mahasiswa->get_db('prodi');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarmhs');
            $this->load->view('_partials/header');
            $this->load->view('mahasiswa/update', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_mahasiswa->update_mahasiswa($nim);
            redirect('mahasiswa/profil');
        }
    }

    public function update_ortu($nim) {
        $this->model_mahasiswa->update_ortu($nim);
        redirect('mahasiswa/profil');
    }

    public function do_upload() {
        $config['upload_path']   = './uploads/profile/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 1000;
        $config['max_height']    = 1000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = ['error' => $this->upload->display_errors()];

            $this->load->view('upload_form', $error);
        } else {
            $data = ['upload_data' => $this->upload->data()];

            $this->load->view('upload_success', $data);
        }
    }
}
