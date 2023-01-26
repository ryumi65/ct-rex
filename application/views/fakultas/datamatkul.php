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
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Daftar Matkul -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-0"> Daftar Mata Kuliah</h5>
                            </div>
                            <div>
                                <a href="<?= site_url('fakultas/datamatkul') ?>" class="btn btn-primary btn-sm mb-0">Tambah Mata Kuliah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
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
                                <tbody class="text-sm">
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