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

        $akun = $this->model_mahasiswa->get_db('akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'mahasiswa' => $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil() {
        $akun = $this->model_mahasiswa->get_db('akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'mahasiswa' => $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]),
            'ortu' => $this->model_mahasiswa->get_db('orang_tua', ['nim' => $this->session->id]),
            'listp' => $this->model_mahasiswa->get_db('prodi'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/profil', $data);
        $this->load->view('_partials/script');
    }


    public function jadwalkuliah() {
        $data['prodi'] = $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/jadwalkuliah', $data);
        $this->load->view('_partials/script');
    }


    public function datakrs() {
        $data['prodi'] = $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/datakrs', $data);
        $this->load->view('_partials/script');
    }

    public function formkrs() {
        $data['prodi'] = $this->model_mahasiswa->get_db('mahasiswa', ['nim' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('mahasiswa/formkrs', $data);
        $this->load->view('_partials/script');
    }

    public function update_foto() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarmhs');
        $this->load->view('_partials/header');
        $this->load->view('akun/foto');
        $this->load->view('_partials/script');
    }

    public function create() {
        $data['listp'] = $this->model_mahasiswa->get_db('prodi');

        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

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

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarmhs');
            $this->load->view('_partials/header');
            $this->load->view('mahasiswa/update', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_mahasiswa->update_mahasiswa($nim);
            $this->session->set_userdata('mhssuccess', true);
            redirect('mahasiswa/profil');
        }
    }

    public function update_ortu($nim) {
        $this->model_mahasiswa->update_ortu($nim);
        $this->session->set_userdata('ortusuccess', true);
        redirect('mahasiswa/profil');
    }

    public function upload_header() {
        $config['upload_path']   = './assets/img/uploads/header/';
        $config['file_name']     = $this->session->id;
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 1000;
        $config['max_height']    = 300;
        $config['overwrite']     = true;

        $this->load->library('upload', $config);
        $this->model_akun->update_db_foto($this->upload->data('orig_name'), 'header');
        $this->upload->do_upload();

        redirect('mahasiswa/profil/foto/edit');
    }

    public function upload_profil() {
        $config['upload_path']   = './assets/img/uploads/profile/';
        $config['file_name']     = $this->session->id;
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']      = 2048;
        $config['max_width']     = 1000;
        $config['max_height']    = 1000;
        $config['overwrite']     = true;

        $this->load->library('upload', $config);
        $this->model_akun->update_db_foto($this->upload->data('orig_name'), 'profil');
        $this->upload->do_upload();

        redirect('mahasiswa/profil/foto/edit');
    }
}
