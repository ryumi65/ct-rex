<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-5 pt-xl-0">

        <!-- Beban Mengajar -->
        <div class="col-12 my-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0">Daftar KRS Mahasiswa Prodi </h5>
                        <div class="mx-0 col-4 my-1">
                            <select class="form-select" name="nik_dosen" required>
                                <option selected disabled>Pilih Tahun Ajaran</option>
                            </select>
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
                                    NIM</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Nama Mahasiswa</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    JK</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Angkatan</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Semester</th>
                                <th class="font-weight-bolder text-uppercase text-xs text-center">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr>
                                <td></td>
                                <td>200102011</td>
                                <td><a href="datakrs">Renal Sukma</a></td>
                                <td>L</td>
                                <td>2020</td>
                                <td>1</td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>200102011</td>
                                <td><a href="datakrs">Renal Sukma</a></td>
                                <td>L</td>
                                <td>2020</td>
                                <td>1</td>
                                <td class="text-center">
                                </td>
                            </tr>
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