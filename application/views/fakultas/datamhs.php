    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="mb-0">Daftar Mahasiswa</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                            <thead>
                                <tr>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIM</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Mahasiswa</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Prodi</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        JK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Angkatan</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Status</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($listd as $mahasiswa) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $mahasiswa['nim'] ?></td>
                                        <td><a href="<?= site_url('fakultas/datamhs' . $mahasiswa['nim']) ?>"><?= $mahasiswa['nama'] ?></a></td>
                                        <td><?= $mahasiswa['id_prodi'] ?></td>
                                        <td><?= ucfirst($mahasiswa['jenis_kelamin']) ?></td>
                                        <td><?= $mahasiswa['tahun_angkatan'] ?></td>
                                        <td><?= ucwords($mahasiswa['status']) ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a href="<?= site_url('fakultas/datamhs/edit/' . $mahasiswa['nim']) ?>" class="btn btn-warning mx-1 mb-0" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a class="btn btn-danger mx-1 mb-0" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('fakultas/datamhs/delete/' . $mahasiswa['nim']) ?>')">
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