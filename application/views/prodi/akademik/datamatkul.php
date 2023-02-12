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
    } elseif (isset($_SESSION['deletemkfailed'])) {
        echo "<script>
            alert('Hapus mata kuliah gagal! Mohon kosongkan jadwal yang terkait pada mata kuliah.');
        </script>";
        unset($_SESSION['deletemkfailed']);
    } ?>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Mata Kuliah</li>
                    </ol>
                </nav>
            </div>

            <!-- Daftar Matkul -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0">Daftar Mata Kuliah Prodi <?= $prodi['nama'] ?></h5>
                            <a href="<?= site_url('prodi/akademik/tambah-matkul') ?>" class="btn btn-primary btn-sm mb-0">Tambah Mata Kuliah</a>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table align-items-center w-100" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Kode Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Dosen Pengampu</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Jenis Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        sks</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Semester</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100 text-dark text-sm">
                                <?php foreach ($listm as $matkul) : ?>
                                    <tr>
                                        <td></td>
                                        <td class="text-wrap"><?= $matkul['nama'] ?></td>
                                        <td><?= $matkul['kode_matkul'] ?></td>
                                        <td class="text-wrap"><?= $matkul['nama_dosen'] ?></td>
                                        <td><?= $matkul['jenis'] ?></td>
                                        <td class="text-center"><?= $matkul['sks'] ?></td>
                                        <td class="text-center"><?= $matkul['semester'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('prodi/akademik/data-matkul/' . $matkul['id_matkul']) ?>" class="badge bg-info px-3 py-2" data-bs-toggle="tooltip" title="Detail">
                                                <i class="fa-solid fa-book-open"></i>
                                            </a>
                                            <a href="<?= site_url('prodi/akademik/data-matkul/edit/' . $matkul['id_matkul']) ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="badge bg-danger cursor-pointer px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('prodi/akademik/data-matkul/delete/' . $matkul['id_matkul']) ?>')">
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

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- Alert -->
    <script src="<?= base_url('assets/js/alert.js') ?>"></script>

    <!-- JQuery -->
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script>
        let table;

        $(document).ready(() => {

            table = $('#table').DataTable({

                order: [2, 'asc'],

                columnDefs: [{
                    targets: [0, 7],
                    orderable: false,
                    searchable: false,
                }],

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