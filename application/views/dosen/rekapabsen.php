    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <div class=" d-flex justify-content-between flex-wrap">
                            <h5>Presensi <?= $matkul['nama'] ?></h5>
                            <div class="d-flex justify-content-end">
                                <a href="<?= site_url('dosen/inputabsen/' . $matkul['id_matkul']) ?>" class="mx-2 btn btn-primary btn-sm">edit Absen</a>
                                <a href="<?= site_url('dosen/perkuliahan/presensi/' . $matkul['id_matkul'] . '/input') ?>" class="btn btn-primary btn-sm">input Absen</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
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
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                <?= $i ?>
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
                                            <?php for ($i = 0; $i < 16; $i++) : ?>
                                                <?php if (isset($presensi[$mahasiswa['id_krs']][$i])) : ?>
                                                    <td><?= $presensi[$mahasiswa['id_krs']][$i] ?></td>
                                                <?php else : ?>
                                                    <td>-</td>
                                                <?php endif ?>
                                            <?php endfor ?>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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