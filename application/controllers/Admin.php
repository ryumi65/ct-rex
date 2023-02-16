<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_admin');
        $this->load->model('model_ruangan');
        $this->load->model('model_pengumuman');


        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 0) redirect(strtolower($this->session->access));
    }

    public function index() {
        if (uri_string() === 'admin/index') return redirect('admin');

        $data = [
            'tahun' => $this->model_admin->get_db('ak_tahun', ['id_tahun' => $this->session->tahun]),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('_partials/script');
    }


    public function datafks() {

        $this->load->model('model_admin');
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/datafakultas',);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }


    public function dataprd() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/dataprodi');
        $this->load->view('_partials/script');
    }

    public function jadwalkuliah() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/jadwalkuliah');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function datamatkul() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/datamatkul');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function perkuliahan() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/perkuliahan');
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function nilaimhs() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/datanilaimhs');
        $this->load->view('_partials/script');
    }

    public function datadsn() {
        $data['admin'] = $this->model_admin->join_dosen('ak_admin', ['id_admin' => $this->session->id]);
        $data['listd'] = $this->model_admin->join_dosen('ak_dosen', ['nik' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/datadsn', $data);
        $this->load->view('_partials/script');
    }

    public function datamhs() {
        $data['admin'] = $this->model_admin->join_mhs('ak_admin', ['id_admin' => $this->session->id]);
        $data['listm'] = $this->model_admin->join_mhs('ak_mahasiswa', ['nim' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/datamhs', $data);
        $this->load->view('_partials/script');
    }

    public function profilmhs($nim) {
        $data['admin'] = $this->model_admin->join_mhs('ak_admin', ['id_admin' => $this->session->id]);
        $data['listm'] = $this->model_admin->join_mhs('ak_admin');
        $data['mahasiswa'] = $this->model_admin->join_mhs('ak_mahasiswa', ['nim' => $nim]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/profilmhs', $data);
        $this->load->view('_partials/script');
    }

    public function profildsn($nik) {
        $data['admin'] = $this->model_admin->join_mhs('ak_admin', ['id_admin' => $this->session->id]);
        $data['listd'] = $this->model_admin->join_mhs('ak_admin');
        $data['dosen'] = $this->model_admin->join_mhs('ak_dosen', ['nik' => $nik]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/profildsn', $data);
        $this->load->view('_partials/script');
    }

    public function dataruangan() {
        $data = [
            'listr' => $this->model_admin->get_db('ak_ruangan'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/dataruangan', $data);
        $this->load->view('_partials/script');
    }

    public function inputruangan() {
        $data = [
            'listr' => $this->model_admin->get_db('ak_ruangan'),
        ];
        $this->form_validation->set_rules('nama', 'nama tidak boleh kosong', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebaradmin');
            $this->load->view('_partials/header');
            $this->load->view('admin/createruangan', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_ruangan->set_ruangan();
            redirect('admin/akademik/dataruangan');
        }
    }

    public function deleteruangan() {
        $this->model_dosen->delete_ruangan();
        redirect('admin/akademik/dataruangan');
    }

    public function listpengumuman() {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/listpengumuman');
        $this->load->view('_partials/script');
    }

    public function listakunmhs() {
        $data = [
            'lista' => $this->model_admin->get_akun_mhs(),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/listakun', $data);
        $this->load->view('_partials/script');
    }

    public function durasikrs() {
        $data = [
            'listt' => $this->model_admin->get_db('ak_tahun'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/durasikrs', $data);
        $this->load->view('_partials/script');
    }

    public function setdurasi() {
        $this->model_admin->set_durasi();

        redirect('admin');
    }

    public function tahunajaran() {
        $data = [
            'listt' => $this->model_admin->get_db('ak_tahun'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/ubahtahun', $data);
        $this->load->view('_partials/script');
    }

    public function ubahtahun() {
        $this->model_admin->ubah_tahun();

        redirect('admin');
    }

        //==================== PENGUMUMAN ====================//

        public function pengumuman() {
            $data = [
                'listp' => $this->model_admin->get_db('ak_pengumuman'),
            ];
    
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('admin/pengumuman/pengumuman', $data);
            $this->load->view('_partials/script');
        }
    
        public function inputpengumuman() {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('admin/pengumuman/createpengumuman');
            $this->load->view('_partials/script');
        }
    
        public function ubahpengumuman($id_pengumuman) {
            $data = [
                'pengumuman' => $this->model_pengumuman->get_db('ak_pengumuman', ['id_pengumuman' => $id_pengumuman]),
            ];
    
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('admin/pengumuman/updatepengumuman', $data);
            $this->load->view('_partials/script');
        }
    
        public function setpengumuman() {
            $this->model_pengumuman->set_pengumuman();
            redirect('admin/pengumuman');
        }
    
        public function updatepengumuman($id_pengumuman) {
            $this->model_pengumuman->update_pengumuman($id_pengumuman);
            redirect('admin/pengumuman');
        }
    
        public function deletepengumuman($id_pengumuman) {
            $this->model_pengumuman->delete_pengumuman($id_pengumuman);
            redirect('admin/pengumuman');
        }
}
