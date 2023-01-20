    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-body pb-0">
                        <?= validation_errors() ?>
                        <?= form_open('prodi/createwali') ?>
                        <div class="mb-3">
                            <select class="form-select" name="nik" required>
                                <option selected disabled>Pilih Dosen</option>
                                <?php foreach ($listd as $dosen) : ?>
                                    <option value="<?= $dosen['nik'] ?>">
                                        <?= $dosen['nik'] . ' - ' . $dosen['nama'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <h6> Daftar Mahasiswa Tanpa Dosen Wali</h6>
                            </div>
                            <?php foreach ($listm as $mahasiswa) : ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="dosen_wali[]" value="<?= $mahasiswa['nim'] ?>">
                                        <label class="form-check-label"><?= $mahasiswa['nim'] . ' - ' . $mahasiswa['nama'] ?></label>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>

                        <div class="d-flex justify-content-end text-center">
                            <button type="submit" class="btn btn-primary my-4">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>