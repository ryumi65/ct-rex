    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0 d-inline d-flex justify-content-between">
                        <h5 class="mb-0">Daftar Dosen Prodi <?= $prodi['nama'] ?></h5>
                        <a href="<?= site_url('prodi/inputdsn') ?>" class="btn btn-primary btn-sm mb-0">Tambah Data Dosen</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped align-items-center mb-0 ps-3" id="table">
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
                            <tbody class="text-sm">
                                <?php foreach ($listd as $dosen) : ?>
                                    <tr>
                                        <td></td>
                                        <td><a href="<?= site_url('prodi/civitas/data-dosen/' . $dosen['nik'] . '/profil') ?>"><?= $dosen['nama'] ?></a></td>
                                        <td><?= $dosen['nik'] ?></td>
                                        <td><?= $dosen['jenis_kelamin'] ?></td>
                                        <td><?= $dosen['nidn_dosen'] ?></td>
                                        <td><?= $dosen['status_dosen'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('prodi/civitas/data-dosen/edit/' . $dosen['nik']) ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="badge bg-danger px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('prodi/civitas/data-dosen/delete/' . $dosen['nik']) ?>')">
                                                <i class="fa-solid fa-trash-can"></i>
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