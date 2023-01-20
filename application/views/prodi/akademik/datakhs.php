    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Daftar Matkul dari KRS -->
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header pb-0 d-inline d-flex justify-content-between">
                        <h4 class="mb-0">Daftar Kartu Hasil Studi</h4>
                        <p> IPK Saat Ini</p>
                        <p>4.00</p>
                    </div>

                    <!-- card semester -->
                    <div class="row g-4 mx-1 mt-2 mb-4">
                        <div class="col-12 col-md-4">
                            <div class="card h-100 shadow">
                                <div class="card-body my-2">
                                    <h5 class="card-title">Semester 1 </h5>
                                    <div class="d-flex justify-content-between">
                                        <p class="font-weight-normal mb-0">Jumlah Mata Kuliah</p>
                                        <p class="mb-0"></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="font-weight-normal mb-0">Jumlah SKS </p>
                                        <p class="mb-0"></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="font-weight-normal mb-0">IPS</p>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                                <div class="mb-3 mx-4">
                                    <a class=" text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Lihat Detail
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Kartu Hasil Studi Semester 1</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped align-items-center ps-3" id="table">
                                    <thead>
                                        <tr class="bg-gradient-primary text-white">
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                No.</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Kode MK</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Nama MK</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Total SKS</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Dosen Pengampu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Semester</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Huruf</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Angka</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Indeks</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm mx-2" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Cetak</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
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
        for (let i = 1; i <= 8; i++) {
            let table;

            $(document).ready(() => {

                table = $(`#table${i}`).DataTable({

                    order: [1, 'asc'],

                    columnDefs: [{
                        targets: [0],
                        orderable: false,
                        searchable: false,
                    }],

                });

                table.on('order.dt search.dt', () => {
                    let j = 1;

                    table.cells(null, 0, {
                        order: 'applied',
                        search: 'applied',
                    }).every(function(cell) {
                        this.data(j++);
                    });
                }).draw();
            });
        }
    </script>