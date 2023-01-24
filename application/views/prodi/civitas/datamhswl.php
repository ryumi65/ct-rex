    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Tabel Mhs Wali -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5 class="mb-0">Daftar Mahasiswa Wali <?= $dosen['nama'] ?></h5>
                    </div>
                    <div class="card-body p-0 pb-3">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                <thead>
                                    <tr class="bg-gradient-primary text-white">
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            NIM</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama Mahasiswa</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            JK</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Tahun Angkatan</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Status Mahasiswa</th>
                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                    <?php foreach ($listm as $mahasiswa) : ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $mahasiswa['nim'] ?></td>
                                            <td><a href="<?= site_url('prodi/civitas/data-mahasiswa/' . $mahasiswa['nim']) ?>"><?= $mahasiswa['nama'] ?></a></td>
                                            <td><?= $mahasiswa['jenis_kelamin'] ?></td>
                                            <td><?= $mahasiswa['tahun_angkatan'] ?></td>
                                            <td><?= $mahasiswa['status'] ?></td>
                                            <td class="text-center">
                                                <a class="badge bg-danger px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('prodi/civitas/hapus-mahasiswa-wali/' . $dosen['nik'] . '/' . $mahasiswa['nim']) ?>')">
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
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- Alert -->
    <script defer src="<?= base_url(); ?>assets/js/alert.js"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/datatables.min.js"></script>
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