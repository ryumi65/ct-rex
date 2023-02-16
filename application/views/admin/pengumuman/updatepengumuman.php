<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/pengumuman') ?>"><u>Pengumuman</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Ubah</li>
                    </ol>
                </nav>
            </div>

            <!-- Form Pengumuman -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Form Edit Pengumuman</h5>
                    </div>
                    <div class="card-body px-3 py-0">
                        <?= form_open('admin/updatepengumuman/' . $pengumuman['id_pengumuman']) ?>
                        <div class="row g-3">
                            <div class="col-sm-6 col-md-4">
                                <label>Judul</label>
                                <input type="text" name="tema" class="form-control" placeholder="Judul" value="<?= $pengumuman['tema'] ?>" required>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label>Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" value="<?= $pengumuman['tanggal_mulai'] ?>" required>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label>Tenggang Waktu</label>
                                <input type="date" name="tenggang_waktu" class="form-control" value="<?= $pengumuman['tenggang_waktu'] ?>" required>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="isi_pengumuman" placeholder="Pengumuman" id="floatingTextPengumuman" style="height: 200px" required><?= $pengumuman['isi_pengumuman'] ?></textarea>
                                    <label for="floatingTextPengumuman">Isi Pengumuman</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Target Pengumuman</label>
                                <div class="mb-3">
                                    <select class="form-select" name="target" required>
                                        <option selected disabled value="">Pilih Target</option>
                                        <?php if ($pengumuman['target'] === 'Dosen') : ?>
                                            <option selected value="Dosen">Dosen</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option value="Keduanya">Keduanya</option>
                                        <?php elseif ($pengumuman['target'] === 'Mahasiswa') : ?>
                                            <option value="Dosen">Dosen</option>
                                            <option selected value="Mahasiswa">Mahasiswa</option>
                                            <option value="Keduanya">Keduanya</option>
                                        <?php elseif ($pengumuman['target'] === 'Keduanya') : ?>
                                            <option value="Dosen">Dosen</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option selected value="Keduanya">Keduanya</option>
                                        <?php else : ?>
                                            <option value="Dosen">Dosen</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option value="Keduanya">Keduanya</option>
                                        <?php endif ?>
                                    </select>
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