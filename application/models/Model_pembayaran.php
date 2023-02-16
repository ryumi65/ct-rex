<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_pembayaran extends CI_Model {

    public function get_pembayaran($nim) {
        $keuangan = $this->load->database('keuangan', TRUE);
        $query = $keuangan->from('tb_tagihan')->where(['NOCUST' => $nim, 'ENABLED' => 1])->get();

        return $query->result_array();
    }

    public function get_va($nim) {
        $keuangan = $this->load->database('keuangan', TRUE);
        $query = $keuangan->from('tb_mahasiswa')->where('NOCUST', $nim)->get();

        return $query->row_array();
    }
}
