<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matkul extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_matkul');
        $this->load->model('model_prodi');
    }

    public function create() {
        $this->model_matkul->set_matkul();
        $this->session->set_userdata('createmksuccess', true);
        redirect('prodi/akademik/data-matkul');
    }

    public function update($id_matkul) {
        $this->model_matkul->update_matkul($id_matkul);
        $this->session->set_userdata('updatemksuccess', true);
        redirect('prodi/akademik/data-matkul');
    }

    public function delete($id_matkul) {
        $this->model_matkul->delete_matkul($id_matkul);
        redirect('prodi/akademik/data-matkul');
    }
}
