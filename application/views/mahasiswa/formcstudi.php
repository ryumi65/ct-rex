<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-6 pt-xl-0">

        <!-- Navigasi -->
        <div class="d-flex d-inline mt-4 mb-3">
            <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-gray-100 my-0 py-0">
                    <li class="breadcrumb-item"><a href="<?= site_url('mahasiswa') ?>"><u>Home</u></a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('mahasiswa/catatanstudi') ?>"><u>Perwalian</u></a></li>
                    <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Tambah</li>
                </ol>
            </nav>
        </div>

        <!-- Form Pengumuman -->
        <div class="col-12 my-3">
            <div class="card">
                <div class="card-header p-3">
                    <h5 class="mb-0">Form Pengisian Catatan Studi</h5>
                </div>
                <div class="card-body px-3 py-0">
                    <div class="row g-3">
                        <div class="col-sm-6 col-md-4">
                            <label>Hari, Tanggal</label>
                            <input type="date" name="tanggal_mulai" class="form-control" required>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <label>Masalah</label>
                            <input type="text" name="tenggang_waktu" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" style="height: 200px" required></textarea>
                                <label for="floatingTextPengumuman">Isi Masalah</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="isi_pengumuman" placeholder="Pengumuman" id="floatingTextPengumuman" style="height: 200px" required></textarea>
                                <label for="floatingTextPengumuman">Saran Dosen Wali</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end text-center">
                            <button type="submit" class="btn btn-primary mt-2 mb-0">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end p-3">
                    <button type="submit" class="btn btn-primary btn-sm mb-0">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('_partials/footer') ?>
</div>