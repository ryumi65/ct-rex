    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Profil -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h5 class="mb-0">Detail Mata Kuliah</h5>
                    </div>
                    <div class="card-body p-3">
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