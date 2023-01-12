    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Tabel Dosen Wali -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0">Daftar Dosen Wali Prodi <?= $prodi['nama'] ?></h5>
                            <a href="<?= site_url('prodi/civitas/data-dosen-wali/tambah-wali') ?>" class="btn btn-primary btn-sm mb-0">Tambah Data Wali</a>
                        </div>
                        <div class="card-body px-0">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            NIK</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama Dosen</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            JK</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            NIDN</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            Mahasiswa Wali</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                    <?php foreach ($listd as $dosen) : ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $dosen['nik'] ?></td>
                                            <td><a href="<?= site_url('prodi/civitas/data-dosen-wali/' . $dosen['nik']) ?>"><?= $dosen['nama'] ?></a></td>
                                            <td><?= ucfirst($dosen['jenis_kelamin']) ?></td>
                                            <td><?= $dosen['nidn_dosen'] ?></td>
                                            <td><?= $mhswl[$dosen['nik']] ?></td>
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

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/datatables.min.js"></script>
    <script>
        let table;

        $(document).ready(() => {

            table = $('#table').DataTable({

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