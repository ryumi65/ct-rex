    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Bimbingan Akademik</li>
                    </ol>
                </nav>
            </div>

            <!-- Jadwal Kuliah -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-2">
                        <h5>Bimbingan Akademik <?= $dosen['nama'] ?></h5>
                    </div>
                    <div class="card-body p-2 pb-3 mx-2">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-5">
                                <div class="card h-100 shadow cursor-pointer" id="card-pop">
                                    <div class="card-header">
                                        <i class="mb-4 fa-solid fa-book-open-reader d-flex justify-content-center" style="font-size: 75px"></i>
                                        <h4 class="card-title d-flex justify-content-center">Catatan Studi</h4>
                                    </div>
                                    <div class="card-footer bg-primary">
                                        <a class="stretched-link text-body text-sm font-weight-bold icon-move-right mb-0 text-white" href="#">
                                            <p class="text-white mb-0">Lihat Detail<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="card h-100 shadow cursor-pointer" id="card-pop">
                                    <div class="card-header">
                                        <i class="mb-4 fa-solid fa-rectangle-list d-flex justify-content-center" style="font-size: 75px"></i>
                                        <h4 class="card-title d-flex justify-content-center">Persetujuan KRS</h4>
                                    </div>
                                    <div class="card-footer bg-warning ">
                                        <a class="stretched-link text-body text-sm font-weight-bold icon-move-right mb-0 text-white" href="<?= site_url('dosen/bimbingan/akademik/krs') ?>">
                                            <p class="text-white mb-0">Lihat Detail<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>