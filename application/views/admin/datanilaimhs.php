    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Form KRS -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between">
                            <h6> Nilai Seluruh Mahasiswa</h6>
                            <div>
                                <a href="<?= site_url('mahasiswa/formkrs') ?>" class="btn btn-primary btn-sm ">CARI</a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="nik" required>
                                <option selected disabled>Pilih Program Studi</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <select class="form-select" name="nik" required>
                                    <option selected disabled>Pilih Tahun Angkatan</option>
                                </select>
                            </div>
                            <div class="card">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar Matkul dari KRS -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between">
                            <h6> Nilai Seluruh Mahasiswa</h6>
                            <div class="dropdown">
                                <button class="btn btn-success btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Cetak
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="javascript:;">Makan</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Minum</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Tidur </a></li>
                                </ul>
                            </div>
                        </div>
                        <table class="table align-items-center w-100" id="table">
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
                            <tbody class="bg-gray-100 text-dark text-sm">
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>