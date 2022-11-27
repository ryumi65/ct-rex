<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_prodi');
        $this->load->model('model_dosen');
        $this->load->model('model_mahasiswa');
        $this->load->model('model_matkul');

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 2) redirect(strtolower($this->session->access));
    }

    public function index()
    {
        if (uri_string() === 'prodi/index') return redirect('prodi');

        $akun = $this->model_prodi->get_db('akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'prodi' => $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]),
            'dsnaktif' => $this->model_prodi->get_db_count('dosen', ['id_prodi' => $this->session->id, 'status_dosen' => 'aktif']),
            'mhsaktif' => $this->model_prodi->get_db_count('mahasiswa', ['id_prodi' => $this->session->id, 'status' => 'aktif']),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function profil() {
        $akun = $this->model_prodi->get_db('akun', ['id_akun' => $this->session->id]);
        $data = [
            'profil' => $akun['foto_profil'],
            'header' => $akun['foto_header'],
            'prodi' => $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]),
            'dsnaktif' => $this->model_prodi->get_db_count('dosen', ['id_prodi' => $this->session->id, 'status_dosen' => 'aktif']),
            'mhsaktif' => $this->model_prodi->get_db_count('mahasiswa', ['id_prodi' => $this->session->id, 'status' => 'aktif']),
        ];

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('_partials/script');
    }

    public function datadsn()
    {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datadsn', $data);
        $this->load->view('_partials/script');
    }

    public function datamhs()
    {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datamhs', $data);
        $this->load->view('_partials/script');
    }

    public function datadsnwl()
    {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datadsnwl', $data);
        $this->load->view('_partials/script');
    }

    public function datamhswl($nik)
    {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['dosen'] = $this->model_prodi->get_db('dosen', ['nik' => $nik]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datamhswl', $data);
        $this->load->view('_partials/script');
    }

    public function datamatkul()
    {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/datamatkul', $data);
        $this->load->view('_partials/script');
    }

    public function profilmhs($nim)
    {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listp'] = $this->model_prodi->get_db('prodi');
        $data['mahasiswa'] = $this->model_prodi->get_db('mahasiswa', ['nim' => $nim]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profilmhs', $data);
        $this->load->view('_partials/script');
    }

    public function profildsn($nik)
    {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listp'] = $this->model_prodi->get_db('prodi');
        $data['dosen'] = $this->model_prodi->get_db('dosen', ['nik' => $nik]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/profildsn', $data);
        $this->load->view('_partials/script');
    }

    public function detailmatkul($id_matkul)
    {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['matkul'] = $this->model_prodi->get_db('matkul', ['id_matkul' => $id_matkul]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/detailmatkul', $data);
        $this->load->view('_partials/script');
    }

    public function jadwalkuliah()
    {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);

        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebarprd');
        $this->load->view('_partials/header');
        $this->load->view('prodi/jadwalkuliah', $data);
        $this->load->view('_partials/script');
    }

    public function creatematkul()
    {
        $data['listd'] = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');
        $data['lists'] = $this->model_prodi->get_db('semester');

        $this->form_validation->set_rules('id_matkul', 'ID Matkul', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nama_inggris', 'Nama Inggris', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('sks', 'SKS Teori', 'required');
        $this->form_validation->set_rules('sks_praktikum', 'SKS Praktikum', 'required');
        $this->form_validation->set_rules('nik_dosen', 'NIK', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('matkul/create', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_matkul->set_matkul();
            redirect('prodi/akademik/data-matkul');
        }
    }

    public function createwali()
    {
        $data['listd'] = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');
        $data['listm'] = $this->model_prodi->get_db('mahasiswa', ['id_prodi' => $this->session->id, 'dosen_wali' => null], 'result');

        $this->form_validation->set_rules('nik', 'NIK', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('prodi/createdatawali', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_prodi->set_mhs_wali($this->input->post('dosen_wali[]'));
            redirect('prodi/civitas/data-dosen-wali');
        }
    }

    public function updatedsn($nik)
    {
        $data['dosen'] = $this->model_prodi->get_db('dosen', ['nik' => $nik]);
        $data['listp'] = $this->model_prodi->get_db('prodi');

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
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('dosen/update', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_dosen->update_dosen($nik);
            redirect('prodi/civitas/data-dosen');
        }
    }

    public function updatemhs($nim)
    {
        $data['mahasiswa'] = $this->model_prodi->get_db('mahasiswa', ['nim' => $nim]);
        $data['listp'] = $this->model_prodi->get_db('prodi');

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
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('prodi/updatemhs', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_mahasiswa->update_mahasiswa($nim);
            redirect('prodi/civitas/data-mahasiswa');
        }
    }

    public function updatematkul($id_matkul)
    {
        $data['matkul'] = $this->model_prodi->get_db('matkul', ['id_matkul' => $id_matkul]);
        $data['listd'] = $this->model_prodi->get_db('dosen', ['id_prodi' => $this->session->id], 'result');
        $data['lists'] = $this->model_prodi->get_db('semester');
        $data['jenis'] = ['wajib', 'wajib prodi', 'pilihan', 'peminatan', 'tugas akhir'];

        $this->form_validation->set_rules('id_matkul', 'ID Matkul', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nama_inggris', 'Nama Inggris', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('sks', 'SKS Teori', 'required');
        $this->form_validation->set_rules('sks_praktikum', 'SKS Praktikum', 'required');
        $this->form_validation->set_rules('nik_dosen', 'NIK', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('_partials/head');
            $this->load->view('_partials/sidebarprd');
            $this->load->view('_partials/header');
            $this->load->view('matkul/update', $data);
            $this->load->view('_partials/script');
        } else {
            $this->model_matkul->update_matkul($id_matkul);
            redirect('prodi/akademik/data-matkul');
        }
    }

    public function deletedsn($nik)
    {
        $this->model_dosen->delete_dosen($nik);
        redirect('prodi/civitas/data-dosen');
    }

    public function deletemhs($nim)
    {
        $this->model_mahasiswa->delete_mahasiswa($nim);
        redirect('prodi/civitas/data-mahasiswa');
    }

    public function deletematkul($id_matkul)
    {
        $this->model_matkul->delete_matkul($id_matkul);
        redirect('prodi/akademik/data-matkul');
    }

    public function deletemhswl($nik, $nim)
    {
        if ($this->model_prodi->get_db('mahasiswa', ['nim' => $nim, 'dosen_wali' => $nik])) {
            $this->model_prodi->delete_mhs_wali($nim);
            redirect('prodi/civitas/data-dosen-wali/' . $nik);
        }
    }

    public function create()
    {
        $data['listf'] = $this->model_prodi->get_db('fakultas');

        $this->form_validation->set_rules('id_prodi', 'ID Prodi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_fakultas', 'ID Fakultas', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('prodi/create', $data);
        } else {
            $this->model_prodi->set_prodi();
            redirect('prodi');
        }
    }

    public function update()
    {
        $data['prodi'] = $this->model_prodi->get_db('prodi', ['id_prodi' => $this->session->id]);
        $data['listf'] = $this->model_prodi->get_db('fakultas');

        $this->form_validation->set_rules('id_prodi', 'ID Prodi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_fakultas', 'ID Fakultas', 'required');


        if (!$this->form_validation->run()) {
            $this->load->view('prodi/update', $data);
        } else {
            $this->model_prodi->update_prodi($this->session->id);
            redirect('prodi/profil');
        }
    }

    public function ajax_list($table, $wali = null, $nik = null)
    {
        $list = $this->model_prodi->get_datatables($table, $wali, $nik);
        $data = [];
        $no = $_POST['start'];

        if ($table === 'dosen') {
            if ($wali === 'dsnwl') {
                foreach ($list as $dosen) {
                    if ($dosen->jenis_kelamin === 'l') $jk = 'Laki-laki';
                    elseif ($dosen->jenis_kelamin === 'p') $jk = 'Perempuan';
                    else $jk = '-';

                    $no++;
                    $row = [];
                    $row[] = $no;
                    $row[] = $dosen->nik;
                    $row[] = $dosen->nama;
                    $row[] = $jk;
                    $row[] = $dosen->nidn_dosen;
                    $row[] = $this->model_prodi->get_db_count('mahasiswa', ['dosen_wali' => $dosen->nik]);

                    $data[] = $row;
                }
            } else {
                foreach ($list as $dosen) {
                    if ($dosen->jenis_kelamin === 'l') $jk = 'Laki-laki';
                    elseif ($dosen->jenis_kelamin === 'p') $jk = 'Perempuan';
                    else $jk = '-';

                    $no++;
                    $row = [];
                    $row[] = $no;
                    $row[] = $dosen->nik;
                    $row[] = $dosen->nama;
                    $row[] = $jk;
                    $row[] = $dosen->nidn_dosen;
                    $row[] = ucfirst($dosen->status_dosen);

                    $data[] = $row;
                }
            }
        } elseif ($table === 'mahasiswa') {
            foreach ($list as $mahasiswa) {
                if ($mahasiswa->jenis_kelamin === 'l') $jk = 'Laki-laki';
                elseif ($mahasiswa->jenis_kelamin === 'p') $jk = 'Perempuan';
                else $jk = '-';

                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $mahasiswa->nim;
                $row[] = $mahasiswa->nama;
                $row[] = $jk;
                $row[] = $mahasiswa->tahun_angkatan;
                $row[] = ucfirst($mahasiswa->status);

                $data[] = $row;
            }
        } elseif ($table === 'matkul') {
            foreach ($list as $matkul) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $matkul->id_matkul;
                $row[] = $matkul->nama;
                $row[] = $matkul->sks + $matkul->sks_praktikum;
                $row[] = ucwords($matkul->jenis);

                $data[] = $row;
            }
        } else return false;

        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_prodi->count_all($table),
            "recordsFiltered" => $this->model_prodi->count_filtered($table, $wali, $nik),
            "data" => $data,
        ];

        echo json_encode($output);
    }
}
