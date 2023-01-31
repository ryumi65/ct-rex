    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Jadwal Kuliah -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5>Jadwal Mengajar <?= $dosen['nama'] ?></h5>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary btn-sm mb-0">Cetak</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table table-striped align-items-center mb-0 pe-1" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama MK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Kode MK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Hari</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Waktu</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Ruangan</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($listj as $jadwal) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $jadwal['nama'] ?></td>
                                        <td><?= $jadwal['kode'] ?></td>
                                        <td><?= $jadwal['hari'] ?></td>
                                        <td><?= $jadwal['waktu'] ?></td>
                                        <td><?= $jadwal['ruangan'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('dosen/perkuliahan/presensi/' . $jadwal['id_matkul']) ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Presensi">
                                                <i class="fa-solid fa-book-bookmark"></i>
                                            </a>
                                            <a href="<?= site_url('dosen/perkuliahan/bap/' . $jadwal['id_matkul']) ?>" class="badge bg-primary px-3 py-2" data-bs-toggle="tooltip" title="Berita Acara Perkuliahan">
                                                <i class="fa-solid fa-receipt"></i>
                                            </a>
                                            <a href="<?= site_url('dosen/perkuliahan/nilai/' . $jadwal['id_matkul']) ?>" class="badge bg-info px-3 py-2" data-bs-toggle="tooltip" title="Nilai">
                                                <i class="fa-solid fa-clipboard-user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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

                dom: "",
                responsive: true,
                order: [4, 'asc'],

                columnDefs: [{
                    targets: [0, 6],
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