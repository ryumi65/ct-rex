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