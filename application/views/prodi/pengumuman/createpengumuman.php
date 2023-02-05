    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi/pengumuman') ?>"><u>Pengumuman</u></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>

            <!-- Form Pengumuman -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Form Pengisian Pengumuman</h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <?= form_open('prodi/setpengumuman') ?>
                        <div class="row g-3">
                            <div class="col-sm-6 col-md-4">
                                <label>Judul</label>
                                <input type="text" name="tema" class="form-control" placeholder="Judul" required>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label>Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" required>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label>Tenggang Waktu</label>
                                <input type="date" name="tenggang_waktu" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="isi_pengumuman" placeholder="Pengumuman" id="floatingTextPengumuman" style="height: 200px" required></textarea>
                                    <label for="floatingTextPengumuman">Isi Pengumuman</label>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <label>Target Pengumuman</label>
                                <div class="mb-3">
                                    <select class="form-select" name="target" required>
                                        <option selected disabled value="">Pilih Target</option>
                                        <option value="dosen">Dosen</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                        <option value="keduanya">Keduanya</option>

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