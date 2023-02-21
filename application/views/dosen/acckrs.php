    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen/bimbingan/akademik') ?>"><u>Bimbingan Akademik</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">KRS</li>
                    </ol>
                </nav>
            </div>

            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Persetujuan KRS Mahasiswa</h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table table-sm table-striped align-items-center dt-responsive w-100" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Nama Mahasiswa</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        NIM</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
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
                                        <td class="text-wrap"><?= $mahasiswa['nama'] ?></td>
                                        <td><?= $mahasiswa['nim'] ?></td>
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
                                <div class="modal-dialog modal-xl modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div>
                                                <h1 class="modal-title fs-5" id="label-<?= $mahasiswa['nim'] ?>">Kartu Rencana Studi</h1>
                                                <p class="mb-0"><?= $mahasiswa['nama'] ?></p>
                                            </div>
                                            <div class="text-end">
                                                <p class="mb-0"><b>Total sks :</b> <?= $mahasiswa['sks'] ?></p>
                                                <p class="mb-0"><b>IPK :</b> <?= $mahasiswa['ipk'] ?></p>
                                            </div>
                                        </div>
                                        <?= form_open('KRS/acc') ?>
                                        <div class="modal-body">
                                            <table class="table table-sm table-striped align-items-center dt-responsive w-100" id="table-<?= $mahasiswa['nim'] ?>">
                                                <thead>
                                                    <tr class="bg-gradient-primary text-white">
                                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-1" style="width: 5%">
                                                            No.</th>
                                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-1">
                                                            Nama MK</th>
                                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs text-center">
                                                            sks</th>
                                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-1">
                                                            Dosen Pengampu</th>
                                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-1">
                                                            Hari</th>
                                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-1">
                                                            Waktu</th>
                                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs text-center">
                                                            Semester</th>
                                                        <th colspan="2" class="font-weight-bolder text-uppercase text-xs text-center">
                                                            Aksi</th>
                                                    </tr>
                                                    <tr class="bg-gradient-primary text-white">
                                                        <th class="p-1">
                                                            <div class="form-check d-flex justify-content-center">
                                                                <input class="form-check-input" type="checkbox" name="cb-<?= $mahasiswa['nim'] ?>" onchange="cbCheckAll(this, 'cb-<?= $mahasiswa['nim'] ?>', 'table-<?= $mahasiswa['nim'] ?>', 'Y')">
                                                            </div>
                                                        </th>
                                                        <th class="p-1">
                                                            <div class="form-check d-flex justify-content-center">
                                                                <input class="form-check-input" type="checkbox" name="cb-<?= $mahasiswa['nim'] ?>" onchange="cbCheckAll(this, 'cb-<?= $mahasiswa['nim'] ?>', 'table-<?= $mahasiswa['nim'] ?>', 'T')">
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-gray-100 text-dark text-sm">
                                                    <?php foreach ($mahasiswa['listj'] as $krs) :
                                                        if ($krs['status'] === 'N') : ?>
                                                            <tr>
                                                                <td></td>
                                                                <td class="text-wrap"><?= $krs['nama'] ?></td>
                                                                <td class="text-center"><?= $krs['sks'] ?></td>
                                                                <td class="text-wrap"><?= $krs['dosen'] ?></td>
                                                                <td><?= $krs['hari'] ?></td>
                                                                <td><?= $krs['waktu'] ?></td>
                                                                <td class="text-center"><?= $krs['semester'] ?></td>
                                                                <td class="text-center">
                                                                    <input type="radio" class="btn-check" name="<?= $krs['id_krs'] ?>" id="acc-<?= $krs['id_krs'] ?>" value="Y">
                                                                    <label class="btn btn-outline-primary px-2 py-1 m-0" for="acc-<?= $krs['id_krs'] ?>"><i class="fa-solid fa-check"></i></label>
                                                                </td>
                                                                <td class="text-center">
                                                                    <input type="radio" class="btn-check" name="<?= $krs['id_krs'] ?>" id="tolak-<?= $krs['id_krs'] ?>" value="T">
                                                                    <label class="btn btn-outline-danger px-2 py-1 m-0" for="tolak-<?= $krs['id_krs'] ?>"><i class="fa-solid fa-xmark"></i></label>
                                                                </td>
                                                            </tr>
                                                    <?php endif;
                                                    endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-sm mb-0">Simpan</button>
                                            <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Close</button>
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
    <script src="<?= base_url('assets/js/alert.js') ?>"></script>

    <!-- Check All -->
    <script src="<?= base_url('assets/js/check-all.js') ?>"></script>

    <!-- JQuery -->
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script>
        jQuery.fn.dataTable.ext.type.order['krs'] = function(data) {
            if (!data) return 0;

            const krsOrder = {
                "Menunggu Persetujuan": 0,
                "Belum KRS": 1,
                "Sudah KRS": 2,
            };
            const krs = krsOrder[data];

            return krs;
        };

        $(document).ready(() => {
            const table = $('#table').DataTable({
                columnDefs: [{
                        targets: [0, 5],
                        orderable: false,
                        searchable: false,
                    },
                    {
                        targets: 4,
                        type: 'krs',
                    }
                ],
                order: [4, 'desc'],
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
            $(document).ready(() => {
                const table<?= $mahasiswa['nim'] ?> = $('#table-<?= $mahasiswa['nim'] ?>').DataTable({
                    columnDefs: [{
                        targets: [0, 7, 8],
                        orderable: false,
                        searchable: false,
                    }],
                    dom: '',
                    order: [1, 'asc'],
                    paging: false,
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