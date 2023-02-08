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
                    <div class="card-header d-flex justify-content-between p-3">
                        <h5 class="mb-0">Daftar Nilai <?= $matkul['nama'] ?></h5>
                        <a href="<?= site_url('dosen/perkuliahan/nilai/' . $matkul['id_matkul'] . '/input') ?>" class="btn btn-primary btn-sm mb-0">Input Nilai</a>
                    </div>
                    <div class="card-body px-3 py-0">
                        <table class="table align-items-center w-100" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIM</th>
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Mahasiswa</th>
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
                                        <td class="text-wrap"><?= $mahasiswa['nama'] ?></td>
                                        <td class="text-center"><?= $mahasiswa['nilai'] ?></td>
                                        <td class="text-center">
                                            <?php
                                            if (isset($mahasiswa['nilai'])) {
                                                if ($mahasiswa['nilai'] >= 80 && $mahasiswa['nilai'] <= 100) echo '4';
                                                elseif ($mahasiswa['nilai'] >= 77 && $mahasiswa['nilai'] < 80) echo '3.75';
                                                elseif ($mahasiswa['nilai'] >= 74 && $mahasiswa['nilai'] < 77) echo '3.5';
                                                elseif ($mahasiswa['nilai'] >= 68 && $mahasiswa['nilai'] < 74) echo '3';
                                                elseif ($mahasiswa['nilai'] >= 65 && $mahasiswa['nilai'] < 68) echo '2.75';
                                                elseif ($mahasiswa['nilai'] >= 62 && $mahasiswa['nilai'] < 65) echo '2.5';
                                                elseif ($mahasiswa['nilai'] >= 56 && $mahasiswa['nilai'] < 62) echo '2';
                                                elseif ($mahasiswa['nilai'] >= 41 && $mahasiswa['nilai'] < 56) echo '1';
                                                elseif ($mahasiswa['nilai'] < 41) echo '0';
                                            } else echo '-';
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if (isset($mahasiswa['nilai'])) {
                                                if ($mahasiswa['nilai'] >= 80 && $mahasiswa['nilai'] <= 100) echo 'A';
                                                elseif ($mahasiswa['nilai'] >= 77 && $mahasiswa['nilai'] < 80) echo 'A-';
                                                elseif ($mahasiswa['nilai'] >= 74 && $mahasiswa['nilai'] < 77) echo 'B+';
                                                elseif ($mahasiswa['nilai'] >= 68 && $mahasiswa['nilai'] < 74) echo 'B';
                                                elseif ($mahasiswa['nilai'] >= 65 && $mahasiswa['nilai'] < 68) echo 'B-';
                                                elseif ($mahasiswa['nilai'] >= 62 && $mahasiswa['nilai'] < 65) echo 'C+';
                                                elseif ($mahasiswa['nilai'] >= 56 && $mahasiswa['nilai'] < 62) echo 'C';
                                                elseif ($mahasiswa['nilai'] >= 41 && $mahasiswa['nilai'] < 56) echo 'D';
                                                elseif ($mahasiswa['nilai'] < 41) echo 'E';
                                            } else echo '-';
                                            ?>
                                        </td>
                                        <?php
                                        if (isset($mahasiswa['nilai'])) {
                                            if ($mahasiswa['nilai'] >= 56 && $mahasiswa['nilai'] <= 100) $status = '<span class="badge bg-gradient-success">Lulus</span>';
                                            elseif ($mahasiswa['nilai'] >= 0 && $mahasiswa['nilai'] < 56) $status = '<span class="badge bg-gradient-danger">Tidak Lulus</span>';
                                        } else $status = '<span class="badge bg-gradient-warning">Belum Diisi</span>';
                                        ?>
                                        <td class="text-center"><?= $status ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end p-3">
                        <a href="#" class="btn btn-primary btn-sm mb-0">Cetak</a>
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
                    targets: [0],
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