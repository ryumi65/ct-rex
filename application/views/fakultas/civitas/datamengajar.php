    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('fakultas') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('fakultas/civfakultasdata-dosen') ?>"><u>Data Dosen</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Data Mengajar</li>
                    </ol>
                </nav>
            </div>

            <!-- Jadwal Kuliah -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Jadwal Mengajar <?= $dosen['nama'] ?></h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table table-sm table-striped align-items-center dt-responsive w-100" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Nama MK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Kode MK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Hari</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Waktu</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-1">
                                        Ruangan</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($listj as $jadwal) : ?>
                                    <tr>
                                        <td></td>
                                        <td class="text-wrap w-50"><?= $jadwal['nama'] ?></td>
                                        <td><?= $jadwal['kode'] ?></td>
                                        <td><?= $jadwal['hari'] ?></td>
                                        <td><?= $jadwal['waktu'] ?></td>
                                        <td><?= $jadwal['ruangan'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('fakultas/akademik/perkuliahan/' . $jadwal['id_matkul'] . '/presensi') ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Presensi">
                                                <i class="fa-solid fa-book-bookmark"></i>
                                            </a>
                                            <a href="<?= site_url('fakultas/akademik/perkuliahan/' . $jadwal['id_matkul'] . '/bap') ?>" class="badge bg-primary px-3 py-2" data-bs-toggle="tooltip" title="Berita Acara Perkuliahan">
                                                <i class="fa-solid fa-receipt"></i>
                                            </a>
                                            <a href="<?= site_url('fakultas/akademik/perkuliahan/' . $jadwal['id_matkul'] . '/nilai') ?>" class="badge bg-info px-3 py-2" data-bs-toggle="tooltip" title="Nilai">
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
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script>
        $(document).ready(() => {
            const table = $('#table').DataTable({
                columnDefs: [{
                    targets: [0, 6],
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