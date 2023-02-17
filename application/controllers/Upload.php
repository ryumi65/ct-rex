<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_akun');
    }

    public function upload_header() {
        $config['upload_path']   = './assets/img/uploads/header/';
        $config['file_name']     = $this->session->id;
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']      = 2048;
        // $config['max_width']     = 1000;
        // $config['max_height']    = 300;
        $config['overwrite']     = true;

        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $this->model_akun->update_db_foto($this->upload->data('file_name'), 'header');
        $this->session->set_userdata('uploadsuccess', true);

        redirect(strtolower($this->session->access));
    }

    public function upload_profil() {
        $config['upload_path']   = './assets/img/uploads/profile/';
        $config['file_name']     = $this->session->id;
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']      = 2048;
        // $config['max_width']     = 500;
        // $config['max_height']    = 500;
        $config['overwrite']     = true;

        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $this->model_akun->update_db_foto($this->upload->data('file_name'), 'profil');
        $this->session->set_userdata('uploadsuccess', true);

        redirect(strtolower($this->session->access));
    }

    public function delete_header() {
        $this->model_akun->delete_foto('header');
        $this->session->set_userdata('deletesuccess', true);

        redirect(strtolower($this->session->access));
    }

    public function delete_profil() {
        $this->model_akun->delete_foto('profil');
        $this->session->set_userdata('deletesuccess', true);

        redirect(strtolower($this->session->access));
    }
}
