    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Header -->
            <div class="page-header height-200 border-radius-xl mt-3" style="background-image: url('<?= base_url(); ?>assets/img/header-mhs.png'); background-position-y: 80%;"></div>
            <div class="card card-body blur shadow-blur mx-4 p-1 mt-n5 overflow-hidden">
                <div class="d-flex justify-content-between">
                    <div class="row gx-3 ">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="<?= base_url(); ?>assets/img/curved-images/curved10.jpg" alt="profile_image" class="w-75 h-75 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div>
                                <h5 class="mb-0"><?= $fakultas['nama'] ?></h5>
                                <p class="mb-0 font-weight-bold text-sm"><?= $fakultas['id_fakultas'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex d-inline ms-auto">
                        <div>
                            <h6 class="mx-3 my-0"><u>Mahasiswa Aktif</u></h6>
                            <h3 class="text-center my-0">1</h3>
                            <h6 class="font-weight- text-center my-0">Mahasiswa</h6>
                        </div>
                        <div>
                            <h6 class="mx-3 my-0"><u>Dosen Aktif</u></h6>
                            <h3 class="text-center my-0">1</h3>
                            <h6 class="font-weight- text-center my-0">Dosen</h6>
                        </div>
                        <div>
                            <h6 class="mx-3 my-0"><u>Prodi</u></h6>
                            <h3 class="text-center my-0">1</h3>
                            <h6 class="font-weight- text-center my-0">Prodi</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profil -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h5 class="mb-0">Profil Anda</h5>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama Lengkap:</strong>
                                &nbsp; <?= $fakultas['nama'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">ID Fakultas</strong> &nbsp;
                                <?= $fakultas['id_fakultas'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>