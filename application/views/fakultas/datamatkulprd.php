<?php
if (isset($_SESSION['createmksuccess'])) {
    echo "<script>
            alert('Tambah mata kuliah berhasil!');
        </script>";
    unset($_SESSION['createmksuccess']);
} elseif (isset($_SESSION['updatemksuccess'])) {
    echo "<script>
            alert('Edit mata kuliah berhasil!');
        </script>";
    unset($_SESSION['updatemksuccess']);
} ?>

<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-6 pt-xl-0">

        <!-- Navigasi -->
        <div class="d-flex d-inline mt-4 mb-3">
            <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-gray-100 my-0 py-0">
                    <li class="breadcrumb-item"><a href="<?= site_url('fakultas') ?>"><u>Home</u></a></li>
                    <li class="breadcrumb-item" aria-current="page">Daftar Prodi</li>
                    <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Data Matkul</li>
                </ol>
            </nav>
        </div>


        <!-- Daftar Matkul -->
        <div class="col-12 my-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0"> Daftar Mata Kuliah</h5>
                        <a href="<?= site_url('fakultas/datamatkul') ?>" class="btn btn-primary btn-sm mb-0">Tambah Mata Kuliah</a>
                    </div>
<<<<<<< Updated upstream:application/views/fakultas/datamatkul.php
                    <div class="card-body">
                        <table class="table align-items-center w-100" id="table">
=======
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped align-items-center mb-0 ps-3" id="table">
>>>>>>> Stashed changes:application/views/fakultas/datamatkulprd.php
                            <thead>
                                <tr>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Kode Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Jenis Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Kategori</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        sks</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Semester</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
<<<<<<< Updated upstream:application/views/fakultas/datamatkul.php
                            <tbody class="bg-gray-100 text-dark text-sm">
=======
                            <tbody class="text-sm">
>>>>>>> Stashed changes:application/views/fakultas/datamatkulprd.php
                                <?php foreach ($listm as $matkul) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $matkul['kode_matkul'] ?></td>
                                        <td><a href="<?= site_url('fakultas/datamatkul/' . $matkul['id_matkul']) ?>"><?= $matkul['nama'] ?></a></td>
                                        <td><?= $matkul['jenis'] ?></td>
                                        <td><?= $matkul['kategori'] ?></td>
                                        <td><?= $matkul['sks'] ?></td>
                                        <td><?= $matkul['semester'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('prodi/akademik/data-matkul/edit/' . $matkul['id_matkul']) ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="badge bg-danger px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('fakultas/datamatkul' . $matkul['id_matkul']) ?>')">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<<<<<<< Updated upstream:application/views/fakultas/datamatkul.php
    <!-- Alert -->
    <script src="<?= base_url('assets/js/alert.js') ?>"></script>

    <!-- JQuery -->
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script>
        let table;

        $(document).ready(() => {
            table = $('#table').DataTable({
                columnDefs: [{
                    targets: [0, 7],
                    orderable: false,
                    searchable: false,
                }],
                deferRender: true,
                order: [2, 'asc'],
                responsive: true,
            });

            table.on('order.dt search.dt', () => {
                let i = 1;
=======
    <?php $this->load->view('_partials/footer') ?>
</div>

<!-- Alert -->
<script defer src="<?= base_url(); ?>assets/js/alert.js"></script>

<!-- JQuery -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
<script>
    let table;

    $(document).ready(() => {

        table = $('#table').DataTable({

            deferRender: true,
            responsive: true,
            order: [2, 'asc'],

            columnDefs: [{
                targets: [0, 7],
                orderable: false,
                searchable: false,
            }],
>>>>>>> Stashed changes:application/views/fakultas/datamatkulprd.php

        });

        table.on('order.dt search.dt', () => {
            let i = 1;

            table.cells(null, 0, {
                order: 'applied',
                search: 'applied',
            }).every(function(cell) {
                this.data(i++);
            });
        }).draw();
    });
</script>