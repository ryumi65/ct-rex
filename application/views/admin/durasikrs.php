    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Form Durasi KRS -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5 class="mb-0">Durasi Kartu Rencana Studi</h5>
                    </div>
                    <div class="card-body p-3">
                        <?= form_open('admin/setdurasi') ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label>Tanggal Awal</label>
                                <div class="mb-3">
                                    <input type="date" name="tanggal_awal" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Tanggal Akhir</label>
                                <div class="mb-3">
                                    <input type="date" name="tanggal_akhir" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Tahun Ajaran</label>
                                <div class="mb-3">
                                    <select class="form-select" name="id_tahun">
                                        <option selected disabled>Pilih Tahun Ajaran</option>
                                        <?php foreach ($listt as $tahun) : ?>
                                            <option value="<?= $tahun['id_tahun'] ?>"><?= $tahun['tahun_ajaran'] . ' - ' . ucfirst($tahun['nama']) ?></option>
                                        <?php endforeach ?>
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