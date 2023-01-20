    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <div class="d-flex justify-content-between">
                            <h5>Daftar Nilai Mata Kuliah Intelegensia Buatan Informatika 20B</h5>
                            <a href="#" class="btn btn-primary btn-sm"> Input Nilai</a>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0" id="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                            NIM</th>
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama Mahasiswa</th>
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Hadir<p><span class="text-sm">15%</span></p>
                                        </th>
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Tugas<p><span class="text-sm">15%</span></p>
                                        </th>
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                            UTS<p><span class="text-sm text-middle">30%</span></p>
                                        </th>
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                            UAS<p><span class="text-sm">40%</span></p>
                                        </th>
                                        <th colspan="2" class="text-center">Nilai Akhir</th>
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs text-center">
                                            Aksi</th>
                                    </tr>
                                    <tr>
                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                            Angka</th>
                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                            Huruf</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                    <tr class="text-center">
                                        <td>1</td>
                                        <td>200102011</td>
                                        <td>Renal Sukma Widiarsa</td>
                                        <td>16</td>
                                        <td>100</td>
                                        <td>75</td>
                                        <td>90</td>
                                        <td>80</td>
                                        <td>A</td>
                                        <td class="text-center">
                                            <a class="badge bg-warning px-3 py-2" data-bs-toggle="">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="badge bg-danger px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url() ?>')">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
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