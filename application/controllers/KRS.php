<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KRS extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_krs');
    }

    public function create() {
        $this->model_krs->set_krs($this->input->post('id_jadwal[]'));
        $this->session->set_userdata('createkrssuccess', true);
        redirect('mahasiswa/perkuliahan/data-krs');
    }

    public function acc() {
        $this->model_krs->acc_krs($this->input->post('id_krs[]'));
        // $this->session->set_userdata('acckrssuccess', true);
        redirect('dosen/bimbingan/akademik/krs');
    }
}
