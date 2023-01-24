    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Form Jadwal Kuliah -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h5 class="mb-0">Form Pengisian Jadwal Kuliah</h5>
                    </div>
                    <div class="card-body p-3">
                        <?= validation_errors() ?>
                        <?= form_open('jadwal/update/' . $jadwal['id_jadwal']) ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label>Hari</label>
                                <div class="mb-3">
                                    <select class="form-select" name="hari">
                                        <option selected disabled>Pilih Hari</option>
                                        <?php for ($i = 0; $i < count($hari); $i++) : ?>
                                            <?php if ($hari[$i] === $jadwal['hari']) : ?>
                                                <option selected value="<?= $hari[$i] ?>"><?= $hari[$i] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $hari[$i] ?>"><?= $hari[$i] ?></option>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Mata Kuliah</label>
                                <div class="mb-3">
                                    <select class="form-select" name="id_matkul">
                                        <option selected disabled>Pilih Mata Kuliah</option>
                                        <?php foreach ($listm as $matkul) {
                                            foreach ($listd as $dosen) {
                                                if ($matkul['nik_dosen'] === $dosen['nik']) { ?>
                                                    <?php if ($matkul['id_matkul'] === $jadwal['id_matkul']) : ?>
                                                        <option selected value="<?= $matkul['id_matkul'] ?>"><?= $matkul['nama'] . ' - ' . $dosen['nama'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $matkul['id_matkul'] ?>"><?= $matkul['nama'] . ' - ' . $dosen['nama'] ?></option>
                                                    <?php endif ?>
                                        <?php }
                                            }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Ruangan</label>
                                <div class="mb-3">
                                    <select class="form-select" name="id_ruangan">
                                        <option selected disabled>Pilih Ruangan</option>
                                        <?php foreach ($listr as $ruangan) : ?>
                                            <?php if ($ruangan['id_ruangan'] === $jadwal['id_ruangan']) : ?>
                                                <option selected value="<?= $ruangan['id_ruangan'] ?>"><?= $ruangan['id_ruangan'] . ' - ' . $ruangan['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $ruangan['id_ruangan'] ?>"><?= $ruangan['id_ruangan'] . ' - ' . $ruangan['nama'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jam Awal</label>
                                <div class="mb-3">
                                    <input type="time" name="pukul_awal" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jam Akhir</label>
                                <div class="mb-3">
                                    <input type="time" name="pukul_akhir" class="form-control">
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