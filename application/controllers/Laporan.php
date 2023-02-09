<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function index() {
        $pdf = new TCPDF();

        $pdf->AddPage('L', 'mm', 'A4');
        $pdf->SetFont('', 'B', 14);
        $pdf->Cell(277, 10, "DAFTAR PEGAWAI AYONGODING.COM", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(20, 8, "No", 1, 0, 'C');
        $pdf->Cell(100, 8, "Nama Mahasiswa", 1, 0, 'C');
        $pdf->Cell(120, 8, "Alamat", 1, 0, 'C');
        $pdf->Cell(37, 8, "Tahun Angkatan", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        $listm = $this->db->get_where('ak_mahasiswa', ['nim' => 200102083])->result_array();
        $no = 0;
        foreach ($listm as $mahasiswa) {
            $no++;
            $pdf->Cell(20, 8, $no, 1, 0, 'C');
            $pdf->Cell(100, 8, $mahasiswa['nama'], 1, 0);
            $pdf->Cell(120, 8, $mahasiswa['alamat'], 1, 0);
            $pdf->Cell(37, 8, $mahasiswa['tahun_angkatan'], 1, 1);
        }
        $pdf->SetFont('', 'B', 10);
        $pdf->Cell(277, 10, "Laporan Pdf Menggunakan Tcpdf, Instalasi Tcpdf Via Composer", 0, 1, 'L');
        $pdf->Output('Laporan-Tcpdf-CodeIgniter.pdf');
    }
}
