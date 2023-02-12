    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('mahasiswa') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">KHS</li>
                    </ol>
                </nav>
            </div>

            <!-- Daftar Matkul dari KRS -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header d-inline d-flex justify-content-between p-3">
                        <h5 class="mb-0">Kartu Hasil Studi</h5>
                        <div>
                            <h6 class="d-inline mx-5 mb-0">IPK Saat Ini</h6>
                            <p class="d-inline mb-0"><?= $ipk ?></p>
                        </div>
                    </div>

                    <!-- Card Semester -->
                    <div class="card-body px-3 py-0">
                        <div class="row g-3">
                            <?php for ($i = 1; $i <= $mahasiswa['semester']; $i++) : ?>
                                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                                    <div class="card h-100 shadow cursor-pointer" id="card-pop" style="background-image: url('<?= base_url('assets/img/shapes/s' . $i . '.png') ?>'); background-size: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bolder">Semester <?= $i ?></h5>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-normal mb-0">Total sks</p>
                                                <p class="text-white fw-bold mb-0"><?= $lists[$i - 1] ?></p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-normal mb-0">IP</p>
                                                <p class="text-white fw-bold mb-0"><?= $listip[$i - 1] ?></p>
                                            </div>
                                            <span class="badge bg-gradient-danger text-xs mt-1">Ada Yang Belum Lulus</span>
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
                    <div class="card-footer d-flex justify-content-end p-3">
                        <button type="button" class="btn btn-primary btn-sm mb-0" data-bs-dismiss="modal">Cetak Transkrip</button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <?php for ($i = 1; $i <= $mahasiswa['semester']; $i++) : ?>
                <div class="modal fade" id="semester-<?= $i ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Kartu Hasil Studi Semester <?= $i ?></h1>
                            </div>
                            <div class="modal-body">
                                <table class="table align-items-center w-100" id="table<?= $i ?>">
                                    <thead>
                                        <tr class="bg-gradient-primary text-white">
                                            <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                No.</th>
                                            <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Kode MK</th>
                                            <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Nama MK</th>
                                            <th colspan="4" class="font-weight-bolder text-uppercase text-xs text-center">
                                                Nilai Akhir</th>
                                        </tr>
                                        <tr class="bg-gradient-primary text-white">
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Angka</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Indeks</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Huruf</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-100 text-dark text-sm">
                                        <?php foreach ($listk[$i - 1] as $krs) : ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $krs['kode'] ?></td>
                                                <td class="text-wrap w-25"><?= $krs['nama'] ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if (isset($krs['nilai'])) echo $krs['nilai'];
                                                    else echo '-';
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if (isset($krs['nilai'])) {
                                                        if ($krs['nilai'] >= 80 && $krs['nilai'] <= 100) echo '4';
                                                        elseif ($krs['nilai'] >= 77 && $krs['nilai'] < 80) echo '3.75';
                                                        elseif ($krs['nilai'] >= 74 && $krs['nilai'] < 77) echo '3.5';
                                                        elseif ($krs['nilai'] >= 68 && $krs['nilai'] < 74) echo '3';
                                                        elseif ($krs['nilai'] >= 65 && $krs['nilai'] < 68) echo '2.75';
                                                        elseif ($krs['nilai'] >= 62 && $krs['nilai'] < 65) echo '2.5';
                                                        elseif ($krs['nilai'] >= 56 && $krs['nilai'] < 62) echo '2';
                                                        elseif ($krs['nilai'] >= 41 && $krs['nilai'] < 56) echo '1';
                                                        elseif ($krs['nilai'] < 41) echo '0';
                                                    } else echo '-';
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if (isset($krs['nilai'])) {
                                                        if ($krs['nilai'] >= 80 && $krs['nilai'] <= 100) echo 'A';
                                                        elseif ($krs['nilai'] >= 77 && $krs['nilai'] < 80) echo 'A-';
                                                        elseif ($krs['nilai'] >= 74 && $krs['nilai'] < 77) echo 'B+';
                                                        elseif ($krs['nilai'] >= 68 && $krs['nilai'] < 74) echo 'B';
                                                        elseif ($krs['nilai'] >= 65 && $krs['nilai'] < 68) echo 'B-';
                                                        elseif ($krs['nilai'] >= 62 && $krs['nilai'] < 65) echo 'C+';
                                                        elseif ($krs['nilai'] >= 56 && $krs['nilai'] < 62) echo 'C';
                                                        elseif ($krs['nilai'] >= 41 && $krs['nilai'] < 56) echo 'D';
                                                        elseif ($krs['nilai'] < 41) echo 'E';
                                                    } else echo '-';
                                                    ?>
                                                </td>
                                                <?php
                                                if (isset($krs['nilai'])) {
                                                    if ($krs['nilai'] >= 56 && $krs['nilai'] <= 100) $status = '<span class="badge bg-gradient-success">Lulus</span>';
                                                    elseif ($krs['nilai'] >= 0 && $krs['nilai'] < 56) $status = '<span class="badge bg-gradient-danger">Tidak Lulus</span>';
                                                } else $status = '<span class="badge bg-gradient-warning">Belum Diisi</span>';
                                                ?>
                                                <td class="text-center"><?= $status ?></td>
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

    <!-- JQuery -->
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script>
        for (let i = 1; i <= <?= $mahasiswa['semester'] ?>; i++) {
            let table;

            $(document).ready(() => {
                table = $(`#table${i}`).DataTable({
                    columnDefs: [{
                        targets: [0],
                        orderable: false,
                        searchable: false,
                    }],
                    dom: "",
                    paging: false,
                    order: [1, 'asc'],
                    responsive: true,
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