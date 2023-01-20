    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Form Mata Kuliah -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h5 class="mb-0">Form Pengisian Pengumuman</h5>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label>Hari/Tanggal/Jam</label>
                                <div class="mb-3">
                                    <input type="date" name="kode_matkul" class="form-control" placeholder="Capaian Prodi" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Tema</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Tema" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Evaluasi</label>
                                <div class="mb-3">
                                    <input type="text" name="nama_inggris" class="form-control" placeholder="Evaluasi">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Tenggang Waktu</label>
                                <div class="mb-3">
                                    <input type="date" name="nama_inggris" class="form-control" placeholder="Metode Pengajaran">
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