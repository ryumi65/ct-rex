    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Daftar Prodi -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="mb-0">Daftar Prodi <?= $fakultas['nama'] ?></h5>
                    </div>

                    <!-- Card Prodi -->
                    <div class="row g-4 mx-1 mt-2 mb-4">
                        <?php foreach ($listp as $prodi) : ?>
                            <div class="col-4">
                                <div class="card h-100 shadow">
                                    <div class="card-body my-2">
                                        <h5 class="card-title"><?= $prodi['nama'] ?></h5>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-normal mb-0">Jumlah Dosen</p>
                                            <p class="mb-0"><?= $prodi['jdosen'] ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-normal mb-0">Jumlah Mahasiswa</p>
                                            <p class="mb-0"><?= $prodi['jmhs'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>