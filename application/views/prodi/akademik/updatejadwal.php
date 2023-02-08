    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi/akademik/jadwal-kuliah') ?>"><u>Jadwal Kuliah</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Ubah</li>
                    </ol>
                </nav>
            </div>

            <!-- Form Jadwal Kuliah -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Form Ubah Jadwal Kuliah</h5>
                    </div>
                    <?= form_open('jadwal/update/' . $jadwal['id_jadwal']) ?>
                    <div class="card-body px-3 py-0">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label>Hari</label>
                                <div class="mb-3">
                                    <select class="form-select" name="hari" required>
                                        <option selected disabled value="">Pilih Hari</option>
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
                                    <select class="form-select" name="id_matkul" required>
                                        <option selected disabled value="">Pilih Mata Kuliah</option>
                                        <?php foreach ($listm as $matkul) {
                                            foreach ($listd as $dosen) {
                                                if ($matkul['nik_dosen'] === $dosen['nik']) { ?>
                                                    <?php if ($matkul['id_matkul'] === $jadwal['id_matkul']) : ?>
                                                        <option selected value="<?= $matkul['id_matkul'] ?>"><?= $matkul['nama'] . ' - ' . $dosen['nama'] . ' - Semester ' . $matkul['semester'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $matkul['id_matkul'] ?>"><?= $matkul['nama'] . ' - ' . $dosen['nama'] . ' - Semester ' . $matkul['semester'] ?></option>
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
                                    <select class="form-select" name="id_ruangan" required>
                                        <option selected disabled value="">Pilih Ruangan</option>
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
                            <?php $tanggal = explode(' - ', $jadwal['pukul']); ?>
                            <div class="col-md-4 col-sm-6">
                                <label>Jam Awal</label>
                                <div class="mb-3">
                                    <input type="time" name="pukul_awal" class="form-control" value="<?= $tanggal[0] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jam Akhir</label>
                                <div class="mb-3">
                                    <input type="time" name="pukul_akhir" class="form-control" value="<?= $tanggal[1] ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end p-3">
                        <button type="submit" class="btn btn-primary btn-sm mb-0">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>