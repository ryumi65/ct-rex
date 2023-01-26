    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Daftar Mahasiswa Bimbingan <?= $dosen['nama'] ?></h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table table-striped align-items-center mb-0 pe-1" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIM</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Mahasiswa</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Angkatan</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Status KRS</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($lists as $mahasiswa) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $mahasiswa['nim'] ?></td>
                                        <td><?= $mahasiswa['nama'] ?></td>
                                        <td><?= $mahasiswa['tahun_angkatan'] ?></td>
                                        <td class="text-center">
                                            <?php if ($mahasiswa['krs'] === 'Sudah KRS') : ?>
                                                <span class="badge bg-gradient-success"><?= $mahasiswa['krs'] ?></span>
                                            <?php elseif ($mahasiswa['krs'] === 'Menunggu Persetujuan') : ?>
                                                <span class="badge bg-gradient-warning"><?= $mahasiswa['krs'] ?></span>
                                            <?php elseif ($mahasiswa['krs'] === 'Belum KRS') : ?>
                                                <span class="badge bg-gradient-danger"><?= $mahasiswa['krs'] ?></span>
                                            <?php endif ?>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <div class="mx-1" data-bs-toggle="modal" data-bs-target="#id-<?= $mahasiswa['nim'] ?>" style="cursor: pointer; max-width: fit-content;">
                                                <a class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="KRS">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                        <!-- Modal -->
                        <?php foreach ($lists as $mahasiswa) : ?>
                            <div class="modal fade" id="id-<?= $mahasiswa['nim'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="label-<?= $mahasiswa['nim'] ?>">Kartu Rencana Studi <?= $mahasiswa['nama'] ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <?= form_open('krs/acc') ?>
                                        <div class="modal-body">
                                            <table class="table table-striped align-items-center" id="table-<?= $mahasiswa['nim'] ?>">
                                                <thead>
                                                    <tr class="bg-gradient-primary text-white">
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                            No.</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Nama MK</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            sks</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Dosen Pengampu</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Hari</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Waktu</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                            Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-sm">
                                                    <?php foreach ($mahasiswa['listj'] as $krs) :
                                                        if ($krs['status'] === 'N') : ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?= $krs['nama'] ?></td>
                                                                <td><?= $krs['sks'] ?></td>
                                                                <td><?= $krs['dosen'] ?></td>
                                                                <td><?= $krs['hari'] ?></td>
                                                                <td><?= $krs['waktu'] ?></td>
                                                                <td class="text-center">
                                                                    <input type="radio" class="btn-check" name="<?= $krs['id_krs'] ?>" id="acc-<?= $krs['id_krs'] ?>" value="Y">
                                                                    <label class="btn btn-outline-primary px-3 py-2 mb-0" for="acc-<?= $krs['id_krs'] ?>"><i class="fa-solid fa-check"></i></label>
                                                                    <input type="radio" class="btn-check" name="<?= $krs['id_krs'] ?>" id="tolak-<?= $krs['id_krs'] ?>" value="T">
                                                                    <label class="btn btn-outline-danger px-3 py-2 mb-0" for="tolak-<?= $krs['id_krs'] ?>"><i class="fa-solid fa-xmark"></i></label>
                                                                </td>
                                                            </tr>
                                                    <?php endif;
                                                    endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary mb-0">Simpan</button>
                                            <button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
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

                responsive: true,
                order: [1, 'asc'],

                columnDefs: [{
                    targets: [0, 5],
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

        <?php foreach ($lists as $mahasiswa) : ?>
            let table<?= $mahasiswa['nim'] ?>;

            $(document).ready(() => {

                table<?= $mahasiswa['nim'] ?> = $('#table-<?= $mahasiswa['nim'] ?>').DataTable({

                    dom: "",
                    order: [1, 'asc'],

                    columnDefs: [{
                        targets: [0, 6],
                        orderable: false,
                        searchable: false,
                    }],
                });

                table<?= $mahasiswa['nim'] ?>.on('order.dt search.dt', () => {
                    let i = 1;

                    table<?= $mahasiswa['nim'] ?>.cells(null, 0, {
                        order: 'applied',
                        search: 'applied',
                    }).every(function(cell) {
                        this.data(i++);
                    });
                }).draw();
            });
        <?php endforeach ?>
    </script>