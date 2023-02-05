    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Dosen</li>
                    </ol>
                </nav>
            </div>

            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Daftar Dosen Prodi <?= $prodi['nama'] ?></h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table align-items-center mb-0 pe-1" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Dosen</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        JK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIDN</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Status</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark text-sm">
                                <?php foreach ($listd as $dosen) : ?>
                                    <tr>
                                        <td></td>
                                        <td class="text-wrap"><?= $dosen['nama'] ?></td>
                                        <td><?= $dosen['nik'] ?></td>
                                        <td><?= $dosen['jenis_kelamin'] ?></td>
                                        <td><?= $dosen['nidn_dosen'] ?></td>
                                        <td><?= $dosen['status_dosen'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('prodi/civitas/data-dosen/' . $dosen['nik'] . '/profil') ?>" class="badge bg-info px-3 py-2" data-bs-toggle="tooltip" title="Data Diri">
                                                <i class="fa-solid fa-user"></i>
                                            </a>
                                            <a href="<?= site_url('prodi/civitas/data-dosen/' . $dosen['nik'] . '/jadwal') ?>" class="badge bg-primary px-3 py-2" data-bs-toggle="tooltip" title="Data Mengajar">
                                                <i class="fa-solid fa-chalkboard-user"></i>
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

    <!-- Alert -->
    <script defer src="<?= base_url(); ?>assets/js/alert.js"></script>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        let table;

        $(document).ready(() => {

            table = $('#table').DataTable({

                responsive: true,
                order: [2, 'asc'],

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