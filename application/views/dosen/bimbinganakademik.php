<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-5 pt-xl-0">

        <!-- Jadwal Kuliah -->
        <div class="col-12 my-3">
            <div class="card">
                <div class="card-header p-3 pb-2">
                    <h5>Bimbingan Akademik <?= $dosen['nama'] ?></h5>
                </div>
                <div class="card-body p-2 pb-3 mx-2">
                    <div class="row">
                        <div class="col-6">
                            <div class="card h-100 shadow cursor-pointer" id="card-pop">
                                <div class="card-header">
                                    <i class="mb-4 fa-solid fa-book-open-reader d-flex justify-content-center" style="font-size: 75px"></i>
                                    <h5 class="card-title d-flex justify-content-center">Catatan Studi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-start">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </div>
                                </div>
                                <div class="card-footer bg-primary">
                                    <a class="stretched-link text-body text-sm font-weight-bold icon-move-right mb-0" data-bs-toggle="modal" data-bs-target="#semester">
                                        <p class="text-white mb-0">Lihat Detail<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card h-100 shadow cursor-pointer" id="card-pop">
                                <div class="card-header">
                                    <i class="mb-4 fa-solid fa-rectangle-list d-flex justify-content-center" style="font-size: 75px"></i>
                                    <h5 class="card-title d-flex justify-content-center">Persetujuan KRS</h5>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-warning ">
                                    <a class="stretched-link text-body text-sm font-weight-bold icon-move-right mb-0 text-white" href="<?= site_url('dosen/acckrs') ?>">
                                        <p class="text-white mb-0">Lihat Detail<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('_partials/footer') ?>
</div>

<!-- JQuery -->