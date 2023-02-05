    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi/akademik/data-matkul') ?>"><u>Mata Kuliah</u></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $matkul['nama'] ?></li>
                    </ol>
                </nav>
            </div>

            <!-- Profil -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Detail Mata Kuliah</h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label>Kode Mata Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="kode_matkul" class="form-control" placeholder="-" value="<?= $matkul['kode_matkul'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama Mata Kuliah (Indonesia)</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="-" value="<?= $matkul['nama'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama Mata Kuliah (Inggris)</label>
                                <div class="mb-3">
                                    <input type="text" name="nama_inggris" class="form-control" placeholder="-" value="<?= $matkul['nama_inggris'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Dosen Pengampu</label>
                                <div class="mb-3">
                                    <?php foreach ($listd as $dosen) {
                                        if ($dosen['nik'] === $matkul['nik_dosen']) $nama = $dosen['nama'];
                                        else $nama = '-';
                                    } ?>
                                    <input type="text" name="id_prodi" class="form-control" placeholder="-" value="<?= $nama ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Program Studi</label>
                                <div class="mb-3">
                                    <input type="text" name="id_prodi" class="form-control" placeholder="-" value="<?= $matkul['id_prodi'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jenis Mata Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="jenis" class="form-control" placeholder="-" value="<?= $matkul['jenis'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kategori SKS</label>
                                <div class="mb-3">
                                    <input type="text" name="kategori" class="form-control" placeholder="-" value="<?= $matkul['kategori'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jumlah SKS</label>
                                <div class="mb-3">
                                    <input type="text" name="sks" class="form-control" placeholder="-" value="<?= $matkul['sks'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Semester</label>
                                <div class="mb-3">
                                    <input type="text" name="semester" class="form-control" placeholder="-" value="<?= $matkul['semester'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>