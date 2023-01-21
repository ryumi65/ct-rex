    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5>Daftar Nilai <?= $matkul['nama'] ?></h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
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
                                        <th colspan="3" class="font-weight-bolder text-uppercase text-xs text-center">
                                            Nilai Akhir</th>
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs text-center">
                                            Aksi</th>
                                    </tr>
                                    <tr class="bg-gradient-primary text-white">
                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                            Angka</th>
                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                            Huruf</th>
                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                            Warna</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
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
                                            if ($akhir >= 56 && $akhir <= 100) $color = '#34a853';
                                            elseif ($akhir >= 0 && $akhir < 56) $color = '#ea4335';
                                            ?>
                                            <td style="background-color: <?= $color ?>"></td>
                                            <td class="d-flex justify-content-center">
                                                <div class="mx-1" data-bs-toggle="modal" data-bs-target="#id-<?= $mahasiswa['nim'] ?>" style="cursor: pointer; max-width: fit-content;">
                                                    <a class="badge bg-info px-3 py-2" data-bs-toggle="tooltip" title="Input Nilai">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                            <!-- Modal -->
                            <?php foreach ($listm as $mahasiswa) : ?>
                                <div class="modal fade" id="id-<?= $mahasiswa['nim'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="label-<?= $mahasiswa['nim'] ?>">Nilai <?= $mahasiswa['nama'] ?></h1>
                                            </div>
                                            <?= form_open('dosen/setnilai/' . $matkul['id_matkul'] . '/' . $mahasiswa['id_krs']) ?>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Nilai Kehadiran</label>
                                                        <div class="mb-3">
                                                            <input type="text" name="nilai_presensi" class="form-control" placeholder="Nilai Kehadiran">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label>Nilai Tugas</label>
                                                        <div class="mb-3">
                                                            <input type="text" name="nilai_tugas" class="form-control" placeholder="Nilai Tugas">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label>Nilai UTS</label>
                                                        <div class="mb-3">
                                                            <input type="text" name="nilai_uts" class="form-control" placeholder="Nilai UTS">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label>Nilai UAS</label>
                                                        <div class="mb-3">
                                                            <input type="text" name="nilai_uas" class="form-control" placeholder="Nilai UAS">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary mb-0">Simpan</button>
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
                    targets: [0, 9, 10],
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