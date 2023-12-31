    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('fakultas') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Data Mahasiswa</li>
                    </ol>
                </nav>
            </div>

            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Daftar Mahasiswa <?= $fakultas['nama'] ?></h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table table-sm table-striped align-items-center dt-responsive w-100" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Nama Mahasiswa</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        NIM</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        JK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Program Studi</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Angkatan</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Status</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($listm as $mahasiswa) : ?>
                                    <tr>
                                        <td></td>
                                        <td class="text-wrap"><?= $mahasiswa['nama'] ?></td>
                                        <td><?= $mahasiswa['nim'] ?></td>
                                        <td><?= $mahasiswa['jenis_kelamin'] ?></td>
                                        <td><?= $mahasiswa['nama_prodi'] ?></td>
                                        <td class="text-center"><?= $mahasiswa['tahun_angkatan'] ?></td>
                                        <td><?= $mahasiswa['status'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('fakultas/civitas/data-mahasiswa/' . $mahasiswa['nim'] . '/profil') ?>" class="badge bg-info px-3 py-2" data-bs-toggle="tooltip" title="Data Diri">
                                                <i class="fa-solid fa-user"></i>
                                            </a>
                                            <a href="<?= site_url('fakultas/civitas/data-mahasiswa/' . $mahasiswa['nim'] . '/akademik') ?>" class="badge bg-primary px-3 py-2" data-bs-toggle="tooltip" title="Data Akademik">
                                                <i class="fa-solid fa-chalkboard-user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Nama Mahasiswa</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        NIM</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        JK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Program Studi</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Angkatan</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Status</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </tfoot>
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
        $(document).ready(() => {
            const table = $('#table').DataTable({
                initComplete: function() {
                    this.api()
                        .columns(4)
                        .every(function() {
                            var column = this;
                            var select = $('<select class="form-select form-select-sm"><option value="">Program Studi</option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append('<option value="' + d + '">' + d + '</option>');
                                });
                        });

                    this.api()
                        .columns(5)
                        .every(function() {
                            var column = this;
                            var select = $('<select class="form-select form-select-sm"><option value="">Angkatan</option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append('<option value="' + d + '">' + d + '</option>');
                                });
                        });
                },
                columnDefs: [{
                    targets: [0, 7],
                    orderable: false,
                    searchable: false,
                }],
                order: [2, 'asc'],
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