    <?php
    if (isset($_SESSION['createjdwlsuccess'])) {
        echo "<script>
            alert('Tambah jadwal kuliah berhasil!');
        </script>";
        unset($_SESSION['createjdwlsuccess']);
    } elseif (isset($_SESSION['updatejdwlsuccess'])) {
        echo "<script>
            alert('Edit jadwal kuliah berhasil!');
        </script>";
        unset($_SESSION['updatejdwlsuccess']);
    } ?>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Form Jadwal Kuliah -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-0">Jadwal <?= $prodi['nama'] ?></h5>
                            </div>
                            <div>
                                <a href="<?= site_url('prodi/akademik/tambah-jadwal') ?>" class="btn btn-primary btn-sm mb-0">Atur Penjadwalan</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                <thead>
                                    <tr class="bg-gradient-primary text-white">
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama MK</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Kode MK</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            SKS</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Dosen Pengampu</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Hari</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Waktu</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Ruangan</th>
                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                    <?php foreach ($listj as $jadwal) : ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $jadwal['nama'] ?></td>
                                            <td><?= $jadwal['kode'] ?></td>
                                            <td><?= $jadwal['sks'] ?></td>
                                            <td>
                                                <?php if (isset($jadwal['dosen'])) echo $jadwal['dosen'];
                                                else echo '-'; ?>
                                            </td>
                                            <td><?= $jadwal['hari'] ?></td>
                                            <td><?= $jadwal['waktu'] ?></td>
                                            <td><?= $jadwal['ruangan'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= site_url('prodi/akademik/jadwal-kuliah/edit/' . $jadwal['id']) ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a class="badge bg-danger px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('prodi/akademik/jadwal-kuliah/delete/' . $jadwal['id']) ?>')">
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

        <!-- Footer -->
        <footer class="footer py-3">

            <!-- Logo Medsos -->
            <div class="container mx-auto text-center my-2">
                <a href="https://www.youtube.com/channel/UCdo5vics8bEFAd9h6aghLYQ" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-youtube"></i>
                </a>
                <a href="https://id-id.facebook.com/universitasmuhammadiyahbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.twitter.com/umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-twitter"></i>
                </a>
                <a href="https://www.tiktok.com/@umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-tiktok"></i>
                </a>
            </div>

            <!-- Copyright -->
            <div class="container mx-auto text-center">
                <p class="mb-0 text-secondary text-xs">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
                </p>
            </div>
        </footer>
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
                order: [1, 'asc'],

                columnDefs: [{
                    targets: [0, 8],
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