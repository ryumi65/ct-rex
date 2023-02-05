    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="mb-0">Daftar Dosen</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Dosen</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Prodi</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        JK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIDN</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Status</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($listd as $dosen) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $dosen['nik'] ?></td>
                                        <td><a href="<?= site_url('fakultas/datadosen/data-dosen' . $dosen['nik']) ?>"><?= $dosen['nama'] ?></a></td>
                                        <td><?= $dosen['id_prodi'] ?></td>
                                        <td><?= ucfirst($dosen['jenis_kelamin']) ?></td>
                                        <td><?= $dosen['nidn_dosen'] ?></td>
                                        <td><?= ucwords($dosen['status_dosen']) ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a href="<?= site_url('prodi/civitas/data-mahasiswa/' . $dosen['nik'] . '/profil') ?>" class="badge bg-info px-3 py-2" data-bs-toggle="tooltip" title="Data Diri">
                                                    <i class="fa-solid fa-user"></i>
                                                </a>
                                                <a href="<?= site_url('prodi/civitas/data-mahasiswa/' . $dosen['nik'] . '/jadwal') ?>" class="badge bg-primary px-3 py-2" data-bs-toggle="tooltip" title="Data Mengajar">
                                                    <i class="fa-solid fa-chalkboard-user"></i>
                                                </a>
                                                <a class="badge bg-danger px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('fakultas/datadsn/delete/' . $dosen['nik']) ?>')">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </div>
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

                deferRender: true,
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