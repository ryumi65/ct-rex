<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dosen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_dosen');
        $this->load->model('model_jadwal');
        $this->load->model('model_krs');

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 3) redirect(strtolower($this->session->access));
    }

    public function index()
    {
        if (uri_string() === 'dosen/index') return redirect('dosen');

        $akun = $this->model_dosen->get_db('akun', ['id_akun' => $this->session->id]);
        $list_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'hari' => $list_hari[date('w')],
            'dosen' => $this->model_dosen->get_db('dosen', ['nik' => $this->session->id]),
            'mhswali' => $this->model_dosen->get_db_count('mahasiswa', ['dosen_wali' => $this->session->id]),
            'listj' => $this->model_jadwal->get_jadwal_dsn($this->session->id),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil()
    {
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

    public function jadwalkuliah()
    {
        $data = [
            'dosen' => $this->model_dosen->get_db('dosen', ['nik' => $this->session->id]),
            'listj' => $this->model_jadwal->get_jadwal_dsn($this->session->id, 'all'),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('dosen/jadwal', $data);
        $this->load->view('_partials/script');
    }

    public function update_foto()
    {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('_partials/header');
        $this->load->view('akun/foto');
        $this->load->view('_partials/script');
    }

    public function create()
    {
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

    public function update($nik)
    {
        $data = [
            'dosen' => $this->model_dosen->get_db('dosen', ['nik' => $nik]),
            'listp' => $this->model_dosen->get_db('prodi'),
            'status_dosen' => ['Aktif', 'Cuti', 'Keluar', 'Almarhum', 'Pensiun', 'Studi Lanjut', 'Tugas di Instansi Lain'],
            'status_kerja' => ['Dosen Tetap', 'Dosen PNS di Pekerjaan', 'Dosen Honorer PTN', 'Dosen Honorer no PTN', 'Dosen Kontrak']
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/update', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_dosen->update_dosen($nik);
            $this->session->set_userdata('updatesuccess', true);
            redirect('dosen/profil');
        }
    }

    public function bimbinganakademik()
    {
        $lists = [];
        $listm = $this->model_dosen->get_db('mahasiswa', ['dosen_wali' => $this->session->id], 'result');

        foreach ($listm as $mhs) {
            $lists[] = [
                'nim' => $mhs['nim'],
                'nama' => $mhs['nama'],
                'jenis_kelamin' => $mhs['jenis_kelamin'],
                'tahun_angkatan' => $mhs['tahun_angkatan'],
                'status' => $mhs['status'],
                'listj' => $this->model_krs->get_krs($mhs['nim']),
            ];
        }



        $data = [
            'dosen' => $this->model_dosen->get_db('dosen', ['nik' => $this->session->id]),
            'lists' => $lists,
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebardsn');
        $this->load->view('dosen/bimbinganakademik', $data);
        $this->load->view('_partials/script');
    }

    public function absen()
    { {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/absen');
            $this->load->view('_partials/script');
        }
    }

    public function rekapabsen()
    { {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/rekapabsen');
            $this->load->view('_partials/script');
        }
    }

    public function inputabsen()
    { {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/inputabsen');
            $this->load->view('_partials/script');
        }
    }

    public function nilaiakhir()
    { {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/nilaiakhir');
            $this->load->view('_partials/script');
        }
    }

    public function formnilai()
    { {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/formnilai');
            $this->load->view('_partials/script');
        }
    }

    public function transkripmatkul()
    { {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/listmatkuldiampu');
            $this->load->view('_partials/script');
        }
    }


    // BIMBINGAN
    public function daftarmhswali()
    { {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/daftarmhswali');
            $this->load->view('_partials/script');
        }
    }

    // BERKAS MAHASISWA BIMBINGAN
    public function berkasmhs()
    { {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/berkasmhs');
            $this->load->view('_partials/script');
        }
    }

    //     BAP
    public function listmatkulbap()
    { {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/listmatkulbap');
            $this->load->view('_partials/script');
        }
    }

    public function listbap()
    { {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/listbap');
            $this->load->view('_partials/script');
        }
    }

    public function formbap()
    { {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebardsn');
            $this->load->view('_partials/header');
            $this->load->view('dosen/formbap');
            $this->load->view('_partials/script');
        }
    }
}
