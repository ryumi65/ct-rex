    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Jadwal Kuliah -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <div class="d-flex justify-content-between mb-4">
                            <div>
                                <h5>Presensi Perkuliahan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                <thead>
                                    <tr class="bg-gradient-primary text-white">
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama MK</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Dosen Pengampu</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Hari</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Waktu</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Ruangan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                    <tr>
                                        <td>1</td>
                                        <td>08:00-09:00</td>
                                        <td><a href="rekappresensi">Integelensi Buatan<a></td>
                                        <td>Rinanda Febriani</td>
                                        <td>L4:R20</td>
                                        <td>Farmasi 21</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        let table;

        $(document).ready(() => {

            table = $('#table').DataTable({

                dom: "",
                responsive: true,
                order: [4, 'asc'],

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