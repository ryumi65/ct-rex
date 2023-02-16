<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-6 pt-xl-0">

        <div class="d-flex d-inline mt-4 mb-3">
            <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-gray-100 my-0 py-0">
                    <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>"><u>Home</u></a></li>
                    <li class="breadcrumb-item active text-primary fw-bold" aria-current="page"><a href="<?= site_url('admin/datafks') ?>"><u>Data Fakultas</u></a></li>
                </ol>
            </nav>
        </div>


        <!-- Daftar Prodi -->
        <div class="col-12 my-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="mb-0">Daftar Fakultas</h5>
                </div>

                <!-- Card Fakultas -->
                <div class="row g-4 mx-1 mt-2 mb-4">
                    <div class="col-4">
                        <div class="card h-100 shadow">
                            <div class="card-body my-2">
                                <h5 class="card-title">Sains Dan Teknologi</h5>
                                <div class="d-flex justify-content-between">
                                    <p class="font-weight-normal mb-0">Jumlah Dosen</p>
                                    <p class="mb-0">30</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="font-weight-normal mb-0">Jumlah Mahasiswa</p>
                                    <p class="mb-0">50</p>
                                </div>
                            </div>
                            <div class="card-footer pt-0">
                                <a class="stretched-link text-body text-sm font-weight-bold icon-move-right" href="<?= site_url('admin/dataprd') ?>">
                                    <p class="mb-0">Lihat Detail<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('_partials/footer') ?>
</div>