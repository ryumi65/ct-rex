    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi/akademik/data-matkul') ?>"><u>Mata Kuliah</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi/akademik/data-matkul/' . $matkul['id_matkul']) ?>"><u><?= $matkul['nama'] ?></u></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
                    </ol>
                </nav>
            </div>

            <!-- Form Mata Kuliah -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Form Pengisian Mata Kuliah</h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <?= validation_errors() ?>
                        <?= form_open('matkul/update/' . $matkul['id_matkul']) ?>
                        <div class="row g-3">
                            <div class="col-md-4 col-sm-6">
                                <label>Kode Mata Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="kode_matkul" class="form-control" placeholder="Kode Matkul" value="<?= $matkul['kode_matkul'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama Mata Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Matkul" value="<?= $matkul['nama'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama Mata Kuliah (Inggris)</label>
                                <div class="mb-3">
                                    <input type="text" name="nama_inggris" class="form-control" placeholder="Nama Matkul Inggris" value="<?= $matkul['nama_inggris'] ?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jenis Mata Kuliah</label>
                                <div class="mb-3">
                                    <select class="form-select" name="jenis" required>
                                        <option selected disabled value="">Pilih Jenis Mata Kuliah</option>
                                        <?php for ($i = 0; $i < count($jenis); $i++) : ?>
                                            <?php if ($matkul['jenis'] === $jenis[$i]) : ?>
                                                <option selected value="<?= $jenis[$i] ?>"><?= $jenis[$i] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $jenis[$i] ?>"><?= $jenis[$i] ?></option>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kategori Mata Kuliah</label>
                                <div class="mb-3">
                                    <select class="form-select" name="kategori" required>
                                        <option selected disabled value="">Pilih Kategori Mata Kuliah</option>
                                        <?php for ($i = 0; $i < count($kategori); $i++) : ?>
                                            <?php if ($matkul['kategori'] === $kategori[$i]) : ?>
                                                <option selected value="<?= $kategori[$i] ?>"><?= $kategori[$i] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $kategori[$i] ?>"><?= $kategori[$i] ?></option>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jumlah sks</label>
                                <div class="mb-3">
                                    <input type="number" name="sks" class="form-control" placeholder="Jumlah SKS" value="<?= $matkul['sks'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Dosen Pengampu</label>
                                <div class="mb-3">
                                    <select class="form-select" name="nik_dosen" required>
                                        <option selected disabled value="">Pilih Dosen Pengampu</option>
                                        <?php foreach ($listd as $dosen) : ?>
                                            <?php if ($matkul['nik_dosen'] === $dosen['nik']) : ?>
                                                <option selected value="<?= $dosen['nik'] ?>"><?= $dosen['nik'] . ' - ' . $dosen['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $dosen['nik'] ?>"><?= $dosen['nik'] . ' - ' . $dosen['nama'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Semester</label>
                                <div class="mb-3">
                                    <select class="form-select" name="semester" required>
                                        <option selected disabled value="">Pilih Semester</option>
                                        <?php for ($i = 0; $i < count($semester); $i++) : ?>
                                            <?php if ($matkul['semester'] == $semester[$i]) : ?>
                                                <option selected value="<?= $semester[$i] ?>"><?= $semester[$i] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $semester[$i] ?>"><?= $semester[$i] ?></option>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end text-center">
                                <button type="submit" class="btn btn-primary mt-2 mb-0">Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>