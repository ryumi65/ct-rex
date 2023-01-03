<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_jadwal');
    }

    public function create() {
        $this->model_jadwal->set_jadwal();
        $this->session->set_userdata('createjdwlsuccess', true);
        redirect('prodi/akademik/jadwal-kuliah');
    }

    public function update($id_jadwal) {
        $this->model_jadwal->update_jadwal($id_jadwal);
        $this->session->set_userdata('updatejdwlsuccess', true);
        redirect('prodi/akademik/jadwal-kuliah');
    }

    public function delete($id_jadwal) {
        $this->model_jadwal->delete_jadwal($id_jadwal);
        redirect('prodi/akademik/jadwal-kuliah');
    }
}
