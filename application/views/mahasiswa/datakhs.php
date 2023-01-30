    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Daftar Matkul dari KRS -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 d-inline d-flex justify-content-between">
                        <h5 class="mb-0">Kartu Hasil Studi</h5>
                        <div>
                            <h6 class="d-inline mx-5 mb-0">IPK Saat Ini</h6>
                            <p class="d-inline mb-0"><?= $ipk ?></p>
                        </div>
                    </div>

                    <!-- Card Semester -->
                    <div class="card-body p-3 pt-0">
                        <div class="row g-3">
                            <?php for ($i = 1; $i <= $mahasiswa['semester']; $i++) : ?>
                                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                                    <div class="card h-100 shadow cursor-pointer" id="card-pop" style="background-image: url('<?= base_url(); ?>assets/img/shapes/s<?= $i ?>.png'); background-size: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bolder">Semester <?= $i ?></h5>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-normal mb-0">Total sks</p>
                                                <p class="text-white mb-0"><?= $lists[$i - 1] ?></p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-normal mb-0">IP</p>
                                                <p class="text-white mb-0"><?= $listip[$i - 1] ?></p>
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
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary btn-sm mb-0" data-bs-dismiss="modal">Cetak Transkrip</button>
                            </div>
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
                                <h1 class="modal-title fs-5">Kartu Hasil Studi Semester <?= $i ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped align-items-center w-100" id="table<?= $i ?>">
                                    <thead>
                                        <tr class="bg-gradient-primary text-white">
                                            <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                No.</th>
                                            <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Kode MK</th>
                                            <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Nama MK</th>
                                            <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Hadir<p class="mb-0"><span class="text-sm">15%</span></p>
                                            </th>
                                            <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Tugas<p class="mb-0"><span class="text-sm">15%</span></p>
                                            </th>
                                            <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                                UTS<p class="mb-0"><span class="text-sm">30%</span></p>
                                            </th>
                                            <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                                UAS<p class="mb-0"><span class="text-sm">40%</span></p>
                                            </th>
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
                                    <tbody class="text-sm">
                                        <?php foreach ($listk[$i - 1] as $krs) : ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $krs['kode'] ?></td>
                                                <td><?= $krs['nama'] ?></td>
                                                <td><?= $krs['nilai_presensi'] ?></td>
                                                <td><?= $krs['nilai_tugas'] ?></td>
                                                <td><?= $krs['nilai_uts'] ?></td>
                                                <td><?= $krs['nilai_uas'] ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($krs['nilai_presensi'] !== null && $krs['nilai_presensi'] !== null && $krs['nilai_presensi'] !== null && $krs['nilai_presensi'] !== null) {
                                                        $presensi = round(($krs['nilai_presensi'] * 15) / 100, 2);
                                                        $tugas = round(($krs['nilai_tugas'] * 15) / 100, 2);
                                                        $uts = round(($krs['nilai_uts'] * 30) / 100, 2);
                                                        $uas = round(($krs['nilai_uas'] * 40) / 100, 2);

                                                        echo $akhir = $presensi + $tugas + $uts + $uas;
                                                    } else {
                                                        echo $akhir = '-';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($akhir === '-') echo '-';
                                                    else {
                                                        if ($akhir >= 80 && $akhir <= 100) echo '4';
                                                        elseif ($akhir >= 77 && $akhir < 80) echo '3.75';
                                                        elseif ($akhir >= 74 && $akhir < 77) echo '3.5';
                                                        elseif ($akhir >= 68 && $akhir < 74) echo '3';
                                                        elseif ($akhir >= 65 && $akhir < 68) echo '2.75';
                                                        elseif ($akhir >= 62 && $akhir < 65) echo '2.5';
                                                        elseif ($akhir >= 56 && $akhir < 62) echo '2';
                                                        elseif ($akhir >= 41 && $akhir < 56) echo '1';
                                                        elseif ($akhir < 41) echo '0';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($akhir === '-') echo '-';
                                                    else {
                                                        if ($akhir >= 80 && $akhir <= 100) echo 'A';
                                                        elseif ($akhir >= 77 && $akhir < 80) echo 'A-';
                                                        elseif ($akhir >= 74 && $akhir < 77) echo 'B+';
                                                        elseif ($akhir >= 68 && $akhir < 74) echo 'B';
                                                        elseif ($akhir >= 65 && $akhir < 68) echo 'B-';
                                                        elseif ($akhir >= 62 && $akhir < 65) echo 'C+';
                                                        elseif ($akhir >= 56 && $akhir < 62) echo 'C';
                                                        elseif ($akhir >= 41 && $akhir < 56) echo 'D';
                                                        elseif ($akhir < 41) echo 'E';
                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                                if ($akhir === '-') $status = '<span class="badge bg-gradient-warning">Belum Diisi</span>';
                                                else {
                                                    if ($akhir >= 56 && $akhir <= 100) $status = '<span class="badge bg-gradient-success">Lulus</span>';
                                                    elseif ($akhir >= 0 && $akhir < 56) $status = '<span class="badge bg-gradient-danger">Tidak Lulus</span>';
                                                }
                                                ?>
                                                <td class="text-center"><?= $status ?></td>
                                            </tr>
                                        <?php endforeach ?>
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
            <?php endfor ?>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        for (let i = 1; i <= <?= $mahasiswa['semester'] ?>; i++) {
            let table;

            $(document).ready(() => {

                table = $(`#table${i}`).DataTable({

                    dom: "",
                    order: [1, 'asc'],

                    columnDefs: [{
                        targets: [0, 10],
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