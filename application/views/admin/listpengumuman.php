    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <div>
                            <div class="d-inline d-flex justify-content-between">
                                <h5>Pengumuman Universitas</h5>
                                <a class="btn btn-primary mx-2" href="formbap"> Buat Pengumuman</a>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div>
                                <table class="table align-items-center" id="table">
                                    <thead class="bg-gradient-primary text-white text-center">
                                        <th class=" font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Hari/Tanggal/Jam</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Tema</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Evaluasi</th>
                                        </th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Tenggang Waktu</th>
                                        </th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Aksi</th>
                                        </th>
                                    </thead>
                                    <tbody class="text-sm">
                                        <tr class="text-center">
                                            <td>1</td>
                                            <td>Kamis,25 Januari 2002</td>
                                            <td>UAS</td>
                                            <td>Telat</td>
                                            <td>25-27 Januari 2000</td>
                                            <td class="text-center">
                                                <a class="badge bg-warning px-3 py-2" href="editpengumuman">
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
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>