<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_fakultas');
        $this->load->model('model_pengumuman');


        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 1) redirect(strtolower($this->session->access));
    }

    public function index() {
        if (uri_string() === 'fakultas/index') return redirect('fakultas');

        $akun = $this->model_fakultas->get_db('ak_akun', ['id_akun' => $this->session->id]);

        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'fakultas' => $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil() {
        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/profil', $data);
        $this->load->view('_partials/script');
    }

    public function create() {
        $this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('fakultas/create');
        } else {
            $this->model_fakultas->set_fakultas();
            redirect('fakultas');
        }
    }

    public function update() {
        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);

        $this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('fakultas/update', $data);
        } else {
            $this->model_fakultas->update_fakultas($this->session->id);
            redirect('fakultas/profil');
        }
    }

    public function dataprd() {
        $listp = $this->model_fakultas->get_db('ak_prodi', ['id_fakultas' => $this->session->id], 'result');

        foreach ($listp as $prodi) {
            $jumlah_dosen = $this->model_fakultas->count_dosen($prodi['id_prodi']);
            $jumlah_mhs = $this->model_fakultas->count_mhs($prodi['id_prodi']);

            $count = [
                'nama' => $prodi['nama'],
                'jdosen' => $jumlah_dosen,
                'jmhs' => $jumlah_mhs
            ];

            $jumlah[] = $count;
        }

        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);
        $data['listp'] = $jumlah;

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/dataprodi', $data);
        $this->load->view('_partials/script');
    }


    public function datamatkul() {


        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/datamatkulprd');
        $this->load->view('_partials/script');
    }





    public function jadwalkuliah() {

        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);


        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/jadwalkuliah', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function datamatkul1() {

        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);


        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/datamatkulprd', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }

    public function perkuliahan() {

        $data['fakultas'] = $this->model_fakultas->get_db('ak_fakultas', ['id_fakultas' => $this->session->id]);


        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/perkuliahan', $data);
        $this->load->view('_partials/loader');
        $this->load->view('_partials/script');
    }



    public function datadsn() {
        $data['fakultas'] = $this->model_fakultas->join_dosen('ak_fakultas', ['id_fakultas' => $this->session->id]);
        $data['listd'] = $this->model_fakultas->join_dosen('ak_dosen', ['nik' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/datadosen', $data);
        $this->load->view('_partials/script');
    }

    public function datamhs() {
        $data['fakultas'] = $this->model_fakultas->join_mhs('ak_fakultas', ['id_fakultas' => $this->session->id]);
        $data['listm'] = $this->model_fakultas->join_mhs('ak_mahasiswa', ['nim' => $this->session->id]);
        $data['listd'] = $this->model_fakultas->join_mhs('ak_dosen', ['id_fakultas' => $this->session->id]);
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/datamhs', $data);
        $this->load->view('_partials/script');
    }

    public function profilmhs($nim) {
        $data = [
            'fakultas' => $this->model_fakultas->join_mhs('ak_fakultas', ['id_fakultas' => $this->session->id]),
            'listp' => $this->model_fakultas->join_mhs('ak_prodi'),
            'mahasiswa' => $this->model_fakultas->join_mhs('ak_mahasiswa', ['nim' => $nim]),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/profilmhs', $data);
        $this->load->view('_partials/script');
    }

    public function akademiksmhs($nim) {
        $mahasiswa = $this->model_fakultas->join_mhs('ak_mahasiswa', ['nim' => $nim]);
        if ($mahasiswa['id_prodi'] !== $this->session->id) redirect(strtolower($this->session->access));

        $ip = [];
        $krs = [];
        $mk = [];
        $sks_smt = [];

        $count_ipk = 0;
        $ipk = 0;

        for ($i = 1; $i <= 8; $i++) {
            $jumlah_krs = 0;
            $jumlah_ip = 0;
            $jumlah_sks = 0;
            $list_krs = $this->model_krs->get_krs_smt($nim, $i);

            foreach ($list_krs as $value) {
                if (isset($value['nilai'])) {
                    if ($value['nilai'] >= 80 && $value['nilai'] <= 100) $indeks = 4;
                    elseif ($value['nilai'] >= 77 && $value['nilai'] < 80) $indeks = 3.75;
                    elseif ($value['nilai'] >= 74 && $value['nilai'] < 77) $indeks = 3.5;
                    elseif ($value['nilai'] >= 68 && $value['nilai'] < 74) $indeks = 3;
                    elseif ($value['nilai'] >= 65 && $value['nilai'] < 68) $indeks = 2.75;
                    elseif ($value['nilai'] >= 62 && $value['nilai'] < 65) $indeks = 2.5;
                    elseif ($value['nilai'] >= 56 && $value['nilai'] < 62) $indeks = 2;
                    elseif ($value['nilai'] >= 41 && $value['nilai'] < 56) $indeks = 1;
                    elseif ($value['nilai'] < 41) $indeks = 0;

                    $jumlah_krs++;
                    $jumlah_ip += $indeks;
                }
            }

            if ($jumlah_krs > 0) {
                $total_ip = round($jumlah_ip / $jumlah_krs, 2);
                $ipk += $total_ip;
                $count_ipk++;
            } else $total_ip = 0;

            $list_sks = $this->model_krs->get_sks($nim, $i);

            for ($j = 0; $j < count($list_sks); $j++) {
                $sks = intval($list_sks[$j]['sks']);
                $jumlah_sks += $sks;
            }

            array_push($ip, $total_ip);
            array_push($krs, $list_krs);
            array_push($mk, $this->model_krs->get_mk($nim, $i));
            array_push($sks_smt, $jumlah_sks);
        }

        if ($count_ipk > 0) $total_ipk = round($ipk / $count_ipk, 2);
        else $total_ipk = 0;

        $data = [
            'mahasiswa' => $mahasiswa,
            'ipk' => $total_ipk,
            'listip' => $ip,
            'listk' => $krs,
            'listm' => $mk,
            'lists' => $sks_smt,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/datamhs/akademikmhs/nim', $data);
        $this->load->view('_partials/script');
    }


    // public function profilmhs($nim) {
    //     $data['fakultas'] = $this->model_fakultas->join_mhs('ak_fakultas', ['id_fakultas' => $this->session->id]);
    //     $data['listm'] = $this->model_fakultas->join_mhs('ak_fakultas');
    //     $data['mahasiswa'] = $this->model_fakultas->join_mhs('ak_mahasiswa', ['nim' => $nim]);

    //     $this->load->view('_partials/head');
    //     $this->load->view('_partials/sidebarprd');
    //     $this->load->view('_partials/header');
    //     $this->load->view('fakultas/profilmhs', $data);
    //     $this->load->view('_partials/script');
    // }

    public function berkasmhs($nim) {
        $data['fakultas'] = $this->model_fakultas->join_mhs('ak_fakultas', ['id_fakultas' => $this->session->id]);
        $data['listm'] = $this->model_fakultas->join_mhs('ak_fakultas');
        $data['mahasiswa'] = $this->model_fakultas->join_mhs('ak_mahasiswa', ['nim' => $nim]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/berkasmhs', $data);
        $this->load->view('_partials/script');
    }


    public function profildsn($nik) {
        $data['fakultas'] = $this->model_fakultas->join_dsn('ak_fakultas', ['id_fakultas' => $this->session->id]);
        $data['listd'] = $this->model_fakultas->join_dsn('ak_fakultas');
        $data['dosen'] = $this->model_fakultas->join_dsn('ak_dosen', ['nik' => $nik]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/profildsn', $data);
        $this->load->view('_partials/script');
    }
    public function pengumuman() {

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/pengumuman/pengumuman');
        $this->load->view('_partials/script');
    }

    public function tambah() {

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/pengumuman/createpengumuman');
        $this->load->view('_partials/script');
    }
    public function updatepengumuman() {

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarfks');
        $this->load->view('_partials/header');
        $this->load->view('fakultas/pengumuman/updatepengumuman');
        $this->load->view('_partials/script');
    }
}
