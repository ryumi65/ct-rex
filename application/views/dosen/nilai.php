    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen/perkuliahan/mata-kuliah') ?>"><u>Perkuliahan</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Nilai</li>
                    </ol>
                </nav>
            </div>

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-wrap p-3 pb-0">
                        <h5>Daftar Nilai <?= $matkul['nama'] ?></h5>
                        <a href="<?= site_url('dosen/perkuliahan/nilai/' . $matkul['id_matkul'] . '/input') ?>" class="btn btn-primary btn-sm">Input Nilai</a>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table align-items-center w-100" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIM</th>
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Mahasiswa</th>
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
                            <tbody class="bg-gray-100 text-dark text-sm">
                                <?php foreach ($listm as $mahasiswa) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $mahasiswa['nim'] ?></td>
                                        <td><?= $mahasiswa['nama'] ?></td>
                                        <td><?= $mahasiswa['nilai_presensi'] ?></td>
                                        <td><?= $mahasiswa['nilai_tugas'] ?></td>
                                        <td><?= $mahasiswa['nilai_uts'] ?></td>
                                        <td><?= $mahasiswa['nilai_uas'] ?></td>
                                        <td class="text-center">
                                            <?php
                                            $presensi = round(($mahasiswa['nilai_presensi'] * 15) / 100, 2);
                                            $tugas = round(($mahasiswa['nilai_tugas'] * 15) / 100, 2);
                                            $uts = round(($mahasiswa['nilai_uts'] * 30) / 100, 2);
                                            $uas = round(($mahasiswa['nilai_uas'] * 40) / 100, 2);

                                            echo $akhir = $presensi + $tugas + $uts + $uas;
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($akhir >= 80 && $akhir <= 100) echo '4';
                                            elseif ($akhir >= 77 && $akhir < 80) echo '3.75';
                                            elseif ($akhir >= 74 && $akhir < 77) echo '3.5';
                                            elseif ($akhir >= 68 && $akhir < 74) echo '3';
                                            elseif ($akhir >= 65 && $akhir < 68) echo '2.75';
                                            elseif ($akhir >= 62 && $akhir < 65) echo '2.5';
                                            elseif ($akhir >= 56 && $akhir < 62) echo '2';
                                            elseif ($akhir >= 41 && $akhir < 56) echo '1';
                                            elseif ($akhir < 41) echo '0';
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($akhir >= 80 && $akhir <= 100) echo 'A';
                                            elseif ($akhir >= 77 && $akhir < 80) echo 'A-';
                                            elseif ($akhir >= 74 && $akhir < 77) echo 'B+';
                                            elseif ($akhir >= 68 && $akhir < 74) echo 'B';
                                            elseif ($akhir >= 65 && $akhir < 68) echo 'B-';
                                            elseif ($akhir >= 62 && $akhir < 65) echo 'C+';
                                            elseif ($akhir >= 56 && $akhir < 62) echo 'C';
                                            elseif ($akhir >= 41 && $akhir < 56) echo 'D';
                                            elseif ($akhir < 41) echo 'E';
                                            ?>
                                        </td>
                                        <?php
                                        if ($akhir >= 56 && $akhir <= 100) $status = '<span class="badge bg-gradient-success">Lulus</span>';
                                        elseif ($akhir >= 0 && $akhir < 56) $status = '<span class="badge bg-gradient-danger">Tidak Lulus</span>';
                                        ?>
                                        <td class="text-center"><?= $status ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end p-3 pt-0">
                        <a href="#" class="btn btn-success btn-sm mb-0">Cetak</a>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        let table;

        $(document).ready(() => {

            table = $('#table').DataTable({

                responsive: true,
                order: [1, 'asc'],

                columnDefs: [{
                    targets: [0, 10],
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