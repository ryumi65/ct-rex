    <?php if (isset($_SESSION['createmksuccess'])) {
        echo "<script>
            alert('Tambah mata kuliah berhasil!');
        </script>";
        unset($_SESSION['createmksuccess']);
    } elseif (isset($_SESSION['updatemksuccess'])) {
        echo "<script>
            alert('Edit mata kuliah berhasil!');
        </script>";
        unset($_SESSION['updatemksuccess']);
    } ?>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Daftar Matkul -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-0"> Daftar Mata Kuliah Prodi <?= $prodi['nama'] ?></h5>
                            </div>
                            <div>
                                <a href="<?= site_url('prodi/akademik/tambah-matkul') ?>" class="btn btn-primary btn-sm mb-0">Tambah Mata Kuliah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                            <thead>
                                <tr>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Kode Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Jenis Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Kategori SKS</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        SKS</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($listm as $matkul) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $matkul['kode_matkul'] ?></td>
                                        <td><a href="<?= site_url('prodi/akademik/data-matkul/' . $matkul['id_matkul']) ?>"><?= $matkul['nama'] ?></a></td>
                                        <td><?= ucwords($matkul['jenis']) ?></td>
                                        <td><?= ucwords($matkul['kategori']) ?></td>
                                        <td><?= $matkul['sks'] ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a href="<?= site_url('prodi/akademik/data-matkul/edit/' . $matkul['id_matkul']) ?>" class="btn btn-warning mx-1 mb-0" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a class="btn btn-danger mx-1 mb-0" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('prodi/akademik/data-matkul/delete/' . $matkul['id_matkul']) ?>')">
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

        <!-- Footer -->
        <footer class="footer pb-3">

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