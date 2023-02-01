    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Form Mata Kuliah -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h5 class="mb-0">Form Pengisian Mata Kuliah</h5>
                    </div>
                    <div class="card-body p-3">
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
                            <div class="col-12 col-sm-6">
                                <div class="form-floating">
                                    <textarea name="cpl_prodi" class="form-control" placeholder="CPL Prodi" id="floatingTextCPL" style="height: 200px" required><?= $matkul['cpl_prodi'] ?></textarea>
                                    <label for="floatingTextCPL">Isi CPL Prodi</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-floating">
                                    <textarea name="cp_mk" class="form-control" placeholder="CP Mata Kuliah" id="floatingTextCP" style="height: 200px" required><?= $matkul['cp_mk'] ?></textarea>
                                    <label for="floatingTextCP">Isi CP Mata Kuliah</label>
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