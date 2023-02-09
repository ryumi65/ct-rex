    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('mahasiswa') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">KRS</li>
                    </ol>
                </nav>
            </div>

            <!-- Daftar Matkul dari KRS -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between p-3 pb-0">
                        <h5 class="d-flex align-items-center mb-0">
                            Kartu Rencana Studi
                            <?php if ($tanggal >= $tahun['tanggal_awal'] && $tanggal <= $tahun['tanggal_akhir']) : ?>
                                <span class="badge bg-gradient-success text-xs mx-2">Dibuka</span>
                            <?php else : ?>
                                <span class="badge bg-gradient-danger text-xs mx-2">Ditutup</span>
                            <?php endif ?>
                        </h5>
                        <?php if ($tanggal >= $tahun['tanggal_awal'] && $tanggal <= $tahun['tanggal_akhir']) : ?>
                            <a class="btn btn-primary btn-sm mb-0" href="<?= site_url('mahasiswa/perkuliahan/data-krs/tambah') ?>">Tambah KRS</a>
                        <?php endif ?>
                    </div>

                    <div class="card-body p-3 pt-0">

                        <!-- Durasi -->
                        <p class="mt-2">Durasi pengisian KRS: <b><?= $tanggal_awal ?> - <?= $tanggal_akhir ?></b></p>

                        <!-- Card Semester -->
                        <div class="row g-3">
                            <?php for ($i = 1; $i <= $mahasiswa['semester']; $i++) : ?>
                                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                                    <div class="card h-100 shadow cursor-pointer" id="card-pop" style="background-image: url('<?= base_url(); ?>assets/img/shapes/s<?= $i ?>.png'); background-size: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bolder">Semester <?= $i ?></h5>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-normal mb-0">Total Mata Kuliah</p>
                                                <p class="text-white fw-bold mb-0"><?= $listm[$i - 1] ?></p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-normal mb-0">Total sks</p>
                                                <p class="text-white fw-bold mb-0"><?= $lists[$i - 1] ?></p>
                                            </div>
                                        </div>
                                        <div class="card-footer pt-0">
                                            <a class="stretched-link text-body text-sm font-weight-bold icon-move-right" data-bs-toggle="modal" data-bs-target="#semester-<?= $i ?>">
                                                <p class="mb-0">Lihat Detail<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <?php for ($i = 1; $i <= $mahasiswa['semester']; $i++) : ?>
                <div class="modal fade" id="semester-<?= $i ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Kartu Rencana Studi Semester <?= $i ?></h1>
                            </div>
                            <div class="modal-body">
                                <table class="table align-items-center w-100" id="table<?= $i ?>">
                                    <thead>
                                        <tr class="bg-gradient-primary text-white">
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                No.</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Kode MK</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Nama MK</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                SKS</th>
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
                                    <tbody class="bg-gray-100 text-dark text-sm">
                                        <?php foreach ($listk[$i - 1] as $krs) : ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $krs['kode'] ?></td>
                                                <td class="text-wrap w-25"><?= $krs['nama'] ?></td>
                                                <td><?= $krs['sks'] ?></td>
                                                <td class="text-wrap w-25"><?= $krs['dosen'] ?></td>
                                                <td><?= $krs['hari'] ?></td>
                                                <td><?= $krs['waktu'] ?></td>
                                                <td><?= $krs['ruangan'] ?></td>
                                                <td class="text-center">
                                                    <?php if ($krs['nilai'] === null) : ?>
                                                        <?php if ($krs['status'] === 'Y') : ?>
                                                            <span class="badge bg-gradient-success">Aktif</span>
                                                        <?php elseif ($krs['status'] === 'N') : ?>
                                                            <span class="badge bg-gradient-warning">Menunggu Persetujuan</span>
                                                        <?php elseif ($krs['status'] === 'T') : ?>
                                                            <span class="badge bg-gradient-danger">Ditolak</span>
                                                        <?php endif ?>
                                                    <?php else :
                                                        if ($krs['nilai'] >= 56 && $krs['nilai'] <= 100) echo '<span class="badge bg-gradient-success">Lulus</span>';
                                                        elseif ($krs['nilai'] >= 0 && $krs['nilai'] < 56) echo '<span class="badge bg-gradient-danger">Tidak Lulus</span>';
                                                    endif; ?>
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
                            <div class="modal-footer d-flex justify-content-end">
                                <button type="button" class="btn btn-primary btn-sm mb-0">Cetak</button>
                                <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor ?>
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