    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <div class=" d-flex justify-content-between flex-wrap">
                            <h5>Presensi <?= $matkul['nama'] ?></h5>
                            <div class="d-flex justify-content-end">
                                <div class="dropdown">
                                    <a class="btn btn-primary btn-sm dropdown-toggle mx-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Ubah Presensi
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php for ($i = 1; $i <= 16; $i++) : ?>
                                            <?php if ($pertemuan[$i - 1] === 'true') : ?>
                                                <li>
                                                    <a class="dropdown-item" href="<?= site_url('dosen/perkuliahan/presensi/' . $matkul['id_matkul'] . '/update/' . $i) ?>">Pertemuan
                                                        <?php if ($i === 8) echo 'UTS';
                                                        elseif ($i === 16) echo 'UAS';
                                                        else echo $i; ?>
                                                    </a>
                                                </li>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </ul>
                                </div>
                                <a href="<?= site_url('dosen/perkuliahan/presensi/' . $matkul['id_matkul'] . '/input') ?>" class="btn btn-primary btn-sm">Input Presensi</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table table-striped align-items-center mb-0 pe-2" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Mahasiswa</th>
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIM</th>
                                    <th colspan="16" class="font-weight-bolder text-uppercase text-xs text-center">
                                        Pertemuan</th>
                                </tr>
                                <tr class="bg-gradient-primary text-white">
                                    <?php for ($i = 1; $i <= 16; $i++) : ?>
                                        <th class="font-weight-bolder text-uppercase text-xs px-3 text-center">
                                            <?php if ($i === 8) echo 'UTS';
                                            elseif ($i === 16) echo 'UAS';
                                            else echo $i; ?>
                                        </th>
                                    <?php endfor ?>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($listm as $mahasiswa) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $mahasiswa['nama'] ?></td>
                                        <td><?= $mahasiswa['nim'] ?></td>
                                        <?php for ($i = 0; $i < 16; $i++) {
                                            if (isset($presensi[$mahasiswa['id_krs']][$i])) {
                                                switch ($presensi[$mahasiswa['id_krs']][$i]) {
                                                    case 'Hadir':
                                                        echo '<td class="text-center"><span class="badge bg-primary">H</span></td>';
                                                        break;
                                                    case 'Izin':
                                                        echo '<td class="text-center"><span class="badge bg-info">I</span></td>';
                                                        break;
                                                    case 'Sakit':
                                                        echo '<td class="text-center"><span class="badge bg-dark">S</span></td>';
                                                        break;
                                                    case 'Alfa':
                                                        echo '<td class="text-center"><span class="badge bg-danger">A</span></td>';
                                                        break;
                                                }
                                            } else echo '<td class="text-center">-</td>';
                                        } ?>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between card-footer p-3 mx-2">
                        <div class="d-flex inline">
                            <h6>Keterangan</h6>
                            <div class="d-flex gap-3">
                                <p class="mb-0"><span class="badge bg-primary">H</span> = Hadir</p>
                                <p class="mb-0"><span class="badge bg-info">I</span> = Izin</p>
                                <p class="mb-0"><span class="badge bg-dark">S</span> = Sakit</p>
                                <p class="mb-0"><span class="badge bg-danger">A</span> = Alfa</p>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary btn-sm">Cetak Presensi</a>
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
                order: [2, 'asc'],

                columnDefs: [{
                    targets: [0, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
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