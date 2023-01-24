    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5>Berkas Mahasiswa</h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <!-- Button KRS-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="krs-tab" data-bs-toggle="tab" data-bs-target="#krs-tab-pane" type="button" role="tab" aria-controls="krs-tab-pane" aria-selected="true">KRS</button>
                            </li>

                            <!-- Button KHS -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="khs-tab" data-bs-toggle="tab" data-bs-target="#khs-tab-pane" type="button" role="tab" aria-controls="khs-tab-pane" aria-selected="false">KHS</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">

                            <!-- KRS -->
                            <div class="tab-pane fade show active" id="krs-tab-pane" role="tabpanel" aria-labelledby="krs-tab" tabindex="0">
                                <div class="row g-3 pt-3">
                                    <?php for ($i = 1; $i <= 8; $i++) : ?>
                                        <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                                            <div class="card h-100 shadow cursor-pointer" id="card-pop">
                                                <div class="card-body">
                                                    <h5 class="card-title">Semester <?= $i ?></h5>
                                                    <div class="d-flex justify-content-between">
                                                        <p class="font-weight-normal mb-0">Jumlah Mata Kuliah</p>
                                                        <p class="mb-0"><?= $listm[$i - 1] ?></p>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <p class="font-weight-normal mb-0">Jumlah sks</p>
                                                        <p class="mb-0"><?= $lists[$i - 1] ?></p>
                                                    </div>
                                                </div>
                                                <div class="card-footer pt-0">
                                                    <a class="stretched-link text-body text-sm font-weight-bold icon-move-right mb-0" data-bs-toggle="modal" data-bs-target="#semester-<?= $i ?>">
                                                        Lihat Detail
                                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor ?>
                                </div>
                            </div>

                            <!-- KHS -->
                            <div class="tab-pane fade" id="khs-tab-pane" role="tabpanel" aria-labelledby="khs-tab" tabindex="0">
                                <div class="row g-3 pt-3">
                                    <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                                        <div class="card h-100 shadow cursor-pointer" id="card-pop">
                                            <div class="card-body">
                                                <h5 class="card-title">Semester 1</h5>
                                                <div class="d-flex justify-content-between">
                                                    <p class="font-weight-normal mb-0">Jumlah Mata Kuliah</p>
                                                    <p class="mb-0">0</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="font-weight-normal mb-0">Jumlah sks</p>
                                                    <p class="mb-0">0</p>
                                                </div>
                                            </div>
                                            <div class="card-footer pt-0">
                                                <a class="stretched-link text-body text-sm font-weight-bold icon-move-right mb-0" data-bs-toggle="modal" data-bs-target="#semester-<?= $i ?>">
                                                    Lihat Detail
                                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal KRS -->
            <?php for ($i = 1; $i <= 8; $i++) : ?>
                <div class="modal fade" id="semester-<?= $i ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Kartu Rencana Studi Semester <?= $i ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-striped align-items-center" id="table<?= $i ?>">
                                        <thead>
                                            <tr class="bg-gradient-primary text-white">
                                                <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                    No.</th>
                                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                    Kode MK</th>
                                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                    Nama MK</th>
                                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                    Total SKS</th>
                                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                    Dosen Pengampu</th>
                                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                    Hari</th>
                                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                    Waktu</th>
                                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                    Ruangan</th>
                                                <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                    Status</th>
                                                <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                    Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-sm">
                                            <?php foreach ($listk[$i - 1] as $krs) : ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $krs['kode'] ?></td>
                                                    <td><?= $krs['nama'] ?></td>
                                                    <td><?= $krs['sks'] ?></td>
                                                    <td><?= $krs['dosen'] ?></td>
                                                    <td><?= $krs['hari'] ?></td>
                                                    <td><?= $krs['waktu'] ?></td>
                                                    <td><?= $krs['ruangan'] ?></td>
                                                    <td class="text-center">
                                                        <?php if ($krs['status'] === 'Y') : ?>
                                                            <span class="badge bg-gradient-success">Aktif</span>
                                                        <?php elseif ($krs['status'] === 'N') : ?>
                                                            <span class="badge bg-gradient-warning">Menunggu Persetujuan</span>
                                                        <?php elseif ($krs['status'] === 'T') : ?>
                                                            <span class="badge bg-gradient-danger">Ditolak</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($krs['status'] === 'Y') : ?>
                                                            <span class="badge bg-secondary px-3 py-2">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </span>
                                                        <?php else : ?>
                                                            <a class="badge bg-danger cursor-pointer px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('mahasiswa/deletekrs/' . $this->session->id . '/' . $krs['id']) ?>')">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </a>
                                                        <?php endif ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor ?>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        for (let i = 1; i <= 8; i++) {
            let table;

            $(document).ready(() => {

                table = $(`#table${i}`).DataTable({

                    dom: "",
                    order: [1, 'asc'],

                    columnDefs: [{
                        targets: [0, 9],
                        orderable: false,
                        searchable: false,
                    }],

                });

                table.on('order.dt search.dt', () => {
                    let j = 1;

                    table.cells(null, 0, {
                        order: 'applied',
                        search: 'applied',
                    }).every(function(cell) {
                        this.data(j++);
                    });
                }).draw();
            });
        }
    </script>