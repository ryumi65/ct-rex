    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mahasiswa Wali</li>
                    </ol>
                </nav>
            </div>

            <!-- Beban Mengajar -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Daftar Mahasiswa Wali <?= $dosen['nama'] ?></h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table align-items-center w-100" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Mahasiswa</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIM</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        JK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Tahun Angkatan</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Status Mahasiswa</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100 text-dark text-sm">
                                <?php foreach ($listm as $mahasiswa) : ?>
                                    <tr>
                                        <td><?= $mahasiswa['nim'] ?></td>
                                        <td class="text-wrap"><?= $mahasiswa['nama'] ?></td>
                                        <td><?= $mahasiswa['jenis_kelamin'] ?></td>
                                        <td class="text-center"><?= $mahasiswa['tahun_angkatan'] ?></td>
                                        <td><?= $mahasiswa['status'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('/dosen/profilmahasiswa/' . $mahasiswa['nim'] . '/profil') ?>" class="badge bg-info px-3 py-2" data-bs-toggle="tooltip" title="Data Diri">
                                                <i class="fa-solid fa-user"></i>
                                            </a>
                                            <a href="<?= site_url('dosen/bimbingan/mahasiswa-wali/' . $mahasiswa['nim']) ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Data Akademik">
                                                <i class="fa-solid fa-book-bookmark"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Mahasiswa</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIM</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        JK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Tahun Angkatan</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Status Mahasiswa</th>
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

    <!-- Alert -->
    <script defer src="<?= base_url(); ?>assets/js/alert.js"></script>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        $(document).ready(() => {
            $('#table').DataTable({
                initComplete: function() {
                    this.api()
                        .columns(3)
                        .every(function() {
                            var column = this;
                            var select = $('<select class="form-select form-select-sm"><option value="">Seluruh Angkatan</option></select>')
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
                responsive: true,
                order: [1, 'asc'],

                columnDefs: [{
                    targets: [5],
                    orderable: false,
                    searchable: false,
                }],
            });
        });
    </script>