<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid py-3">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('<?= base_url(); ?>assets/img/gedungdash.jpg'); background-position-y: 100%;">
            <span class="mask bg-gradient-info opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="d-flex justify-content-between">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="<?= base_url(); ?>assets/img/mahalini.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1"><?= $_SESSION['nama'] ?></h5>
                            <p class="mb-0 font-weight-bold text-sm"><?= $_SESSION['access'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="ms-auto">
                    <a href="<?= site_url('akun/logout'); ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Profil Anda</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                            </a>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama Lengkap:</strong>
                                    &nbsp; Luthfi</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nomor Telepon:</strong> &nbsp;
                                    0000 0000 0000</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp;
                                    alexturner@gmail.com</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong>
                                    &nbsp; Indonesia</li>
                                <li class="list-group-item border-0 ps-0 pb-0">
                                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                    <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-facebook fa-lg"></i>
                                    </a>
                                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-twitter fa-lg"></i>
                                    </a>
                                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-instagram fa-lg"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright -->
            <div class="col-8 mx-auto my-5 text-center">
                <p class="mb-0 text-secondary">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>