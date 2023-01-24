    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5>Update Presensi <?= $matkul['nama'] ?> Pertemuan <?= $pertemuan ?></h5>
                    </div>
                    <div class="card-body px-3 py-0">
                        <?= form_open('dosen/updatepresensi/' . $matkul['id_matkul'] . '/' . $pertemuan) ?>
                        <div class="row g-3">
                            <?php foreach ($listm as $mahasiswa) : ?>
                                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                                    <div class="card card-profile card-plain cursor-pointer" id="card-pop">
                                        <div class="card-body text-center bg-white shadow border-radius-lg p-3">
                                            <div class="avatar avatar-xl position-relative">
                                                <img src="<?= base_url(); ?>assets/img/uploads/profile/<?= $mahasiswa['foto_profil'] ?>" alt="profile_image" class="w-75 h-75 border-radius-lg shadow-sm">
                                            </div>
                                            <h5 class="text-sm mt-3 mb-0"><?= $mahasiswa['nama'] ?></h5>
                                            <h6 class="text-xs mb-3"><?= $mahasiswa['nim'] ?></h6>
                                            <?php foreach ($listp as $presensi) {
                                                if ($mahasiswa['id_krs'] === $presensi['id_krs']) {
                                                    $hadir_check = '';
                                                    $izin_check = '';
                                                    $sakit_check = '';
                                                    $alfa_check = '';

                                                    switch ($presensi['kehadiran']) {
                                                        case 'Hadir':
                                                            $hadir_check = 'checked';
                                                            break;
                                                        case 'Izin':
                                                            $izin_check = 'checked';
                                                            break;
                                                        case 'Sakit':
                                                            $sakit_check = 'checked';
                                                            break;
                                                        case 'Alfa':
                                                            $alfa_check = 'checked';
                                                            break;
                                                    }
                                                }
                                            } ?>
                                            <div>
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Hadir-<?= $mahasiswa['nim'] ?>" value="Hadir" <?= $hadir_check ?>>
                                                <label class="btn btn-outline-primary rounded-circle px-3" for="Hadir-<?= $mahasiswa['nim'] ?>">H</label>
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Izin-<?= $mahasiswa['nim'] ?>" value="Izin" <?= $izin_check ?>>
                                                <label class="btn btn-outline-info rounded-circle px-3" for="Izin-<?= $mahasiswa['nim'] ?>">I</label>
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Sakit-<?= $mahasiswa['nim'] ?>" value="Sakit" <?= $sakit_check ?>>
                                                <label class="btn btn-outline-dark rounded-circle px-3" for="Sakit-<?= $mahasiswa['nim'] ?>">S</label>
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Alfa-<?= $mahasiswa['nim'] ?>" value="Alfa" <?= $alfa_check ?>>
                                                <label class="btn btn-outline-danger rounded-circle px-3" for="Alfa-<?= $mahasiswa['nim'] ?>">A</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary mt-3 mb-0">Simpan</button>
                        </div>
                        </form>
                    </div>
                    <div class="card-footer p-3">
                        <h6>Keterangan</h6>
                        <div class="d-flex gap-3">
                            <p class="mb-0"><span class="badge bg-primary">H</span> = Hadir</p>
                            <p class="mb-0"><span class="badge bg-info">I</span> = Izin</p>
                            <p class="mb-0"><span class="badge bg-dark">S</span> = Sakit</p>
                            <p class="mb-0"><span class="badge bg-danger">A</span> = Alfa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>