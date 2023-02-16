<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-6 pt-xl-0">


        <!-- Navigasi -->
        <div class="d-flex d-inline mt-4 mb-3">
            <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-gray-100 my-0 py-0">
                    <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                    <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Data Perkuliahan</li>
                </ol>
            </nav>
        </div>

        <!-- Daftar Prodi -->
        <div class="col-12 my-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="mb-0">Daftar Prodi di Fakultas Sains dan Teknologi</h5>
                </div>

                <!-- Card Prodi -->
                <div class="row g-4 mx-1 mt-2 mb-4">
                    <div class="col-4">
                        <div class="card h-100 shadow">
                            <div class="card-body my-2">
                                <h5 class="card-title">Teknik Informatika</h5>
                                <div class="d-flex justify-content-between">
                                    <p class="font-weight-normal mb-0">Jumlah Dosen</p>
                                    <p class="mb-0">111</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="font-weight-normal mb-0">Jumlah Mahasiswa</p>
                                    <p class="mb-0">1</p>
                                </div>
                            </div>
                            <div class="dropdown d-flex justify-content-end">
                                <a class="btn btn-success dropdown-toggle btn-sm mx-3 " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Lihat Detail
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?= site_url('admin/jadwalkuliah/') ?>">Jadwal Kuliah</a></li>
                                    <li><a class="dropdown-item" href="<?= site_url('admin/datamatkul/') ?>">Data Mata Kuliah </a></li>
                                    <li><a class="dropdown-item" href="<?= site_url('admin/perkuliahan/') ?>">Data perkuliahan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('_partials/footer') ?>
</div>