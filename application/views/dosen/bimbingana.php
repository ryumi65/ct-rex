<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-5 pt-xl-0">

        <!-- Beban Mengajar -->
        <div class="col-12 my-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0">Daftar Mahasiswa Bimbingan <?= $dosen['nama'] ?></h5>
                        <div class="mx-0 col-4 my-1">
                            <select class="form-select" name="nik_dosen" required>
                                <option selected disabled>Pilih Tahun Ajaran</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class>
                        <div class="table-responsive">
                            <table class="table  align-items-center mb-0 ps-3" id="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%" scope="col">
                                            No.</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" scope="col">
                                            NIM</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" scope="col">
                                            Nama Mahasiswa</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" scope="col">
                                            JK</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" scope="col">
                                            Angkatan</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" scope="col">
                                            Status</th>
                                        <th class="font-weight-bolder text-uppercase text-xs text-center" scope="col">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-bs-toggle="collapse" data-bs-target="#r1">
                                        <th scope="row">1 <i class="bi bi-chevron-down"></i></th>
                                        <td>200102011</td>
                                        <td>Renal Sukma Widiarsa</td>
                                        <td>L</td>
                                        <td>2020</td>
                                        <td>Aktif</td>
                                        <td><button type="button" class="btn btn-warning">Warning</button></td>
                                    </tr>
                                    <tr class="collapse accordion-collapse" id="r1" data-bs-parent=".table">
                                        <td colspan="100">
                                            <table class="table table-sm align-items-center" id="table">
                                                <thead>
                                                    <tr>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                            No.</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            ID Matkul</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Nama Matkul</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Total SKS</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Kategori</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                            Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-sm">
                                                    <tr align="center">
                                                        <td style="width: 5%">1</td>
                                                        <td>IF2020</td>
                                                        <td>Intelegensia Buatan</td>
                                                        <td>2</td>
                                                        <td>Wajib</td>
                                                        <td><button type="button" class="btn btn-danger btn-sm">Danger</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr data-bs-toggle="collapse" data-bs-target="#r2">
                                        <th scope="row">2 <i class="bi bi-chevron-down"></i></th>
                                        <td>200102011</td>
                                        <td>Renal Sukma Widiarsa</td>
                                        <td>L</td>
                                        <td>2020</td>
                                        <td>Aktif</td>
                                        <td><button type="button" class="btn btn-warning">Warning</button></td>
                                    </tr>
                                    <tr class="collapse accordion-collapse" id="r2" data-bs-parent=".table">
                                        <td colspan="100">
                                            <table class="table table-sm align-items-center" id="table">
                                                <thead>
                                                    <tr>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                            No.</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            ID Matkul</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Nama Matkul</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Total SKS</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Kategori</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                            Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-sm">
                                                    <tr align="center">
                                                        <td style="width: 5%">1</td>
                                                        <td>IF2020</td>
                                                        <td>Intelegensia Buatan</td>
                                                        <td>2</td>
                                                        <td>Wajib</td>
                                                        <td><button type="button" class="btn btn-danger btn-sm">Danger</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr data-bs-toggle="collapse" data-bs-target="#r3">
                                        <th scope="row">3<i class="bi bi-chevron-down"></i></th>
                                        <td>200102011</td>
                                        <td>Renal Sukma Widiarsa</td>
                                        <td>L</td>
                                        <td>2020</td>
                                        <td>Aktif</td>
                                        <td><button type="button" class="btn btn-warning">Warning</button></td>
                                    </tr>
                                    <tr class="collapse accordion-collapse" id="r3" data-bs-parent=".table">
                                        <td colspan="100">
                                            <table class="table table-sm align-items-center" id="table">
                                                <thead>
                                                    <tr align="center">
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                            No.</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            ID Matkul</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Nama Matkul</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Total SKS</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Kategori</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                            Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-sm">
                                                    <tr align="center">
                                                        <td style="width: 5%">1</td>
                                                        <td>IF2020</td>
                                                        <td>Intelegensia Buatan</td>
                                                        <td>2</td>
                                                        <td>Wajib</td>
                                                        <td><button type="button" class="btn btn-danger btn-sm">Danger</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                    </tr>
                                </tbody>
                            </table>
                            </td>
                        </div>
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