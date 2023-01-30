    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Daftar Mahasiswa Tanpa Dosen Wali</h5>
                    </div>
                    <div class="card-body p-3 pt-0">
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
                            <?php foreach ($listm as $mahasiswa) : ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="dosen_wali[]" value="<?= $mahasiswa['nim'] ?>">
                                        <label class="form-check-label"><?= $mahasiswa['nim'] . ' - ' . $mahasiswa['nama'] ?></label>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm mt-2 mb-0">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>