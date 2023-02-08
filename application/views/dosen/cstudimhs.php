<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-6 pt-xl-0">

        <!-- Navigasi -->
        <div class="d-flex d-inline mt-4 mb-3">
            <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-gray-100 my-0 py-0">
                    <li class="breadcrumb-item"><a href="<?= site_url('mahasiswa') ?>"><u>Home</u></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Catatan Studi</li>
                </ol>
            </nav>
        </div>


        <!-- catatan studi -->
        <div class="col-12 my-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between p-3 pb-0">
                    <h5 class="d-flex align-items-center mb-3">
                        Catatan Studi Mahasiswa
                    </h5>
                </div>

                <div class="card-body p-3 pt-0">

                    <!-- Card Semester -->
                    <div class="row g-3">
                        <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                            <div class="card h-100 shadow cursor-pointer" id="card-pop" style="background-image: url('<?= base_url(); ?>assets/img/shapes/s.png'); background-size: cover;">
                                <div class="card-body">
                                    <h5 class="card-title fw-bolder">Semester 1</h5>
                                </div>
                                <div class="card-footer pt-0">
                                    <a class="stretched-link text-body text-sm font-weight-bold icon-move-right" data-bs-toggle="modal" data-bs-target="#semester1">
                                        <p class="mb-0">Lihat Detail<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="semester1" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Catatan Studi Semester 1</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Awal</h4>
                        <table class="table align-items-center w-100" id="table">
                            <thead class="bg-gradient-primary text-white text-center">
                                <th class=" font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                    No</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Hari, Tanggal</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Masalah</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Saran Pembimbing</th>
                                <th class="font-weight-bolder text-uppercase text-xs text-center">
                                    Aksi</th>
                            </thead>
                            <tbody class="bg-gray-100 text-dark text-sm-center">
                                <tr>
                                    <td></td>
                                    <td>Sabtu, 26 Februari 2020</td>
                                    <td>Gapunya Duit</td>
                                    <td>Main Slot</td>
                                    <td class="text-center">
                                        <a href="<?= site_url('dosen/viewcstudi') ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Detail">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h4>Tengah</h4>
                        <table class="table align-items-center w-100" id="table">
                            <thead class="bg-gradient-primary text-white text-center">
                                <th class=" font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                    No</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Hari, Tanggal</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Masalah</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Saran Pembimbing</th>
                                <th class="font-weight-bolder text-uppercase text-xs text-center">
                                    Aksi</th>
                            </thead>
                            <tbody class="bg-gray-100 text-dark text-sm-center">
                                <tr>
                                    <td></td>
                                    <td>Sabtu, 26 Februari 2020</td>
                                    <td>Gapunya Duit</td>
                                    <td>Main Slot</td>
                                    <td class="text-center">
                                        <a href="<?= site_url('dosen/viewcstudi') ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Detail">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h4>Akhir</h4>
                        <table class="table align-items-center w-100" id="table">
                            <thead class="bg-gradient-primary text-white text-center">
                                <th class=" font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                    No</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Hari, Tanggal</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Masalah</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Saran Pembimbing</th>
                                <th class="font-weight-bolder text-uppercase text-xs text-center">
                                    Aksi</th>
                            </thead>
                            <tbody class="bg-gray-100 text-dark text-sm-center">
                                <tr>
                                    <td></td>
                                    <td>Sabtu, 26 Februari 2020</td>
                                    <td>Gapunya Duit</td>
                                    <td>Main Slot</td>
                                    <td class="text-center">
                                        <a href="<?= site_url('dosen/viewcstudi') ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Detail">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-sm mb-0" data-bs-dismiss="modal">Cetak</button>
                        <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Close</button>
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
    for (let i = 1; i <= <?= $mahasiswa['semester'] ?>; i++) {
        let table;

        $(document).ready(() => {

            table = $(`#table${i}`).DataTable({

                dom: "",
                paging: false,
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