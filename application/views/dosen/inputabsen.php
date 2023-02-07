    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen/perkuliahan/mata-kuliah') ?>"><u>Perkuliahan</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen/perkuliahan/presensi/' . $matkul['id_matkul']) ?>"><u>Presensi</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Input</li>
                    </ol>
                </nav>
            </div>

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5>Input Presensi <?= $matkul['nama'] ?></h5>
                    </div>
                    <div class="card-body px-3 py-0">
                        <?= form_open('dosen/inputpresensi/' . $matkul['id_matkul']) ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Pertemuan</label>
                                <div class="mb-3">
                                    <select class="form-select" name="pertemuan" required>
                                        <option selected disabled value="">Pilih Pertemuan</option>
                                        <?php for ($i = 1; $i <= 16; $i++) : ?>
                                            <?php if ($pertemuan[$i - 1] === 'false') : ?>
                                                <li>
                                                    <option value="<?= $i ?>">Pertemuan
                                                        <?php if ($i === 8) echo 'UTS';
                                                        elseif ($i === 16) echo 'UAS';
                                                        else echo $i; ?>
                                                    </option>
                                                </li>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Tanggal Pertemuan</label>
                                <div class="mb-3">
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>
                            </div>
                            <?php foreach ($listm as $mahasiswa) : ?>
                                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                                    <div class="card card-profile card-plain cursor-pointer" id="card-pop">
                                        <div class="card-body text-center bg-white shadow border-radius-lg p-3">
                                            <div class="avatar avatar-xl position-relative">
                                                <img src="<?= base_url(); ?>assets/img/uploads/profile/<?= $mahasiswa['foto_profil'] ?>" alt="profile_image" class="w-75 h-75 border-radius-lg shadow-sm">
                                            </div>
                                            <h5 class="text-sm mt-3 mb-0"><?= $mahasiswa['nama'] ?></h5>
                                            <h6 class="text-xs mb-3"><?= $mahasiswa['nim'] ?></h6>
                                            <div>
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Hadir-<?= $mahasiswa['nim'] ?>" value="Hadir" required checked>
                                                <label class="btn btn-outline-primary rounded-circle px-3" for="Hadir-<?= $mahasiswa['nim'] ?>">H</label>
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Izin-<?= $mahasiswa['nim'] ?>" value="Izin" required>
                                                <label class="btn btn-outline-info rounded-circle px-3" for="Izin-<?= $mahasiswa['nim'] ?>">I</label>
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Sakit-<?= $mahasiswa['nim'] ?>" value="Sakit" required>
                                                <label class="btn btn-outline-dark rounded-circle px-3" for="Sakit-<?= $mahasiswa['nim'] ?>">S</label>
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Alfa-<?= $mahasiswa['nim'] ?>" value="Alfa" required>
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