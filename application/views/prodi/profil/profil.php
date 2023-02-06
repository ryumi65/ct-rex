    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>

            <!-- Header -->
            <div class="page-header height-200 border-radius-xl mt-3" style="background-image: url('<?= base_url(); ?>assets/img/uploads/header/<?= $header ?>')"></div>
            <div class="card card-body blur shadow-blur mx-4 p-1 mt-n5 overflow-hidden">
                <div class="d-flex align-content-center justify-content-between">
                    <div class="row gx-3">
                        <div class="col-auto my-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="<?= base_url(); ?>assets/img/uploads/profile/<?= $profil ?>" alt="profile_image" class="w-75 h-75 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div>
                                <h5 class="mb-2"><?= $prodi['nama'] ?></h5>
                                <p class="mb-0 font-weight-bold text-sm"><?= $prodi['id_prodi'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profil -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between p-3 pb-0">
                        <h5 class="mb-0">Profil Program Studi</h5>
                        <a href="<?= site_url('prodi/ubahvisimisi') ?>" class="btn btn-primary btn-sm mb-0">Ubah Visi Misi</a>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nama Program Studi:</strong> &nbsp;
                                <?= $prodi['nama'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Fakultas:</strong> &nbsp;
                                <?= $prodi['id_fakultas'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Visi:</strong> &nbsp;
                                <?= $prodi['visi'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Misi:</strong> &nbsp;
                                <?= $prodi['misi'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>