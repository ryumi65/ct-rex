    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Daftar Matkul -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0 mb-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-0"> Daftar Transkrip Nilai</h5>
                            </div>
                            <a href="#" class="btn btn-primary btn-sm mb-0">Cetak</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped align-items-center ps-3" id="table">
                            <thead>
                                <tr>
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
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- Alert -->
    <script defer src="<?= base_url(); ?>assets/js/alert.js"></script>