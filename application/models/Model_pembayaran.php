<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_pembayaran extends CI_Model {

    public function get_pembayaran() {
        $keuangan = $this->load->database('keuangan', TRUE);
        $query = $keuangan->from('tb_tagihan')->where('NOCUST', $this->session->id)->get();

        return $query->result_array();
    }

    public function get_va() {
        $keuangan = $this->load->database('keuangan', TRUE);
        $query = $keuangan->from('tb_mahasiswa')->where('NOCUST', $this->session->id)->get();

        return $query->row_array();
    }
}
