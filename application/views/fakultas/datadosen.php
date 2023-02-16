    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('fakultas') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold"><a href="<?= site_url('fakultasi/data-dosen') ?>"><u>Data Dosen</u></a></li>
                    </ol>
                </nav>
            </div>

            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="mb-0">Daftar Dosen</h5>
                    </div>
                    <div class="card-body">
                        <table class="table align-items-center w-100" id="table">
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
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100 text-dark text-sm">
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
                                                <a href="<?= site_url('fakultas/profildsn/' . $dosen['nik'] . '/profil') ?>" class="badge bg-info px-3 py-2" data-bs-toggle="tooltip" title="Data Diri">
                                                    <i class="fa-solid fa-user"></i>
                                                </a>
                                                <a href="<?= site_url('fakultas/datamengajar/' . $dosen['nik'] . '/jadwal') ?>" class="badge bg-primary px-3 py-2" data-bs-toggle="tooltip" title="Data Mengajar">
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
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script>
        let table;

        $(document).ready(() => {
            table = $('#table').DataTable({
                columnDefs: [{
                    targets: [0],
                    orderable: false,
                    searchable: false,
                }],
                deferRender: true,
                order: [2, 'asc'],
                responsive: true,
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