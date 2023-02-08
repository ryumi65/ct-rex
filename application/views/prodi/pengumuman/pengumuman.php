    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Pengumuman</li>
                    </ol>
                </nav>
            </div>

            <!-- Pengumuman -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between p-3">
                        <h5 class="mb-0">Pengumuman Prodi Informatika</h5>
                        <a href="<?= site_url('prodi/pengumuman/tambah') ?>" class="btn btn-primary btn-sm mb-0">Buat Pengumuman</a>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table align-items-center w-100" id="table">
                            <thead class="bg-gradient-primary text-white text-center">
                                <th class=" font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                    No</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Judul</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Isi Pengumuman</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Tanggal Mulai</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Tenggang Waktu</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Target</th>
                                <th class="font-weight-bolder text-uppercase text-xs text-center">
                                    Aksi</th>
                            </thead>
                            <tbody class="bg-gray-100 text-dark text-sm">
                                <?php foreach ($listp as $pengumuman) : ?>
                                    <tr>
                                        <td></td>
                                        <td class="text-wrap"><?= $pengumuman['tema'] ?></td>
                                        <td class="text-wrap"><?= $pengumuman['isi_pengumuman'] ?></td>
                                        <td><?= $pengumuman['tanggal_mulai'] ?></td>
                                        <td><?= $pengumuman['tenggang_waktu'] ?></td>
                                        <td><?= $pengumuman['target'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('prodi/pengumuman/' . $pengumuman['id_pengumuman'] . '/edit') ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="badge bg-danger cursor-pointer px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('prodi/pengumuman/' . $pengumuman['id_pengumuman'] . '/delete') ?>')">
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
                order: [3, 'asc'],

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