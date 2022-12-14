<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->logged) redirect('login');
        if ($this->session->level != 0) redirect(strtolower($this->session->access));
    }

    public function index()
    {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/dashboard');
        $this->load->view('_partials/script');
    }

    public function nilaimhs()
    {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/datanilaimhs');
        $this->load->view('_partials/script');
    }

    public function dataruangan()
    {
        $this->load->view('_partials/head');
        $this->load->view('_partials/sidebaradmin');
        $this->load->view('_partials/header');
        $this->load->view('admin/dataruangan');
        $this->load->view('_partials/script');
    }
}
