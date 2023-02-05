    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <div class="row">

                <!-- Foto Profil -->
                <div class="col-md-6 my-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <h5 class="mb-0">Edit Foto Profil</h5>
                        </div>
                        <div class="card-body p-3">
                            <?= form_open_multipart('upload/upload_profil') ?>
                            <label class="d-flex d-inline justify-content-between">Foto Profil
                                <p class="text-sm"> Ukuran Disarankan 1080 x1080</p>
                            </label>
                            <div class="mb-3">
                                <input type="file" name="userfile" class="form-control" required>
                            </div>
                            <div class="text-end">
                                <a href="<?= site_url('upload/delete_profil') ?>" class="btn btn-danger mt-2 mb-0">Hapus</a>
                                <button type="submit" class="btn btn-primary mt-2 mb-0">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Foto Header -->
                <div class="col-md-6 my-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <h5 class="mb-0">Edit Foto Header</h5>
                        </div>
                        <div class="card-body p-3">
                            <?= form_open_multipart('upload/upload_header') ?>
                            <label class="d-flex d-inline justify-content-between">Foto Header
                                <p class="text-sm"> Ukuran Disarankan 1080 x1080</p>
                            </label>
                            <div class="mb-3">
                                <input type="file" name="userfile" class="form-control" required>
                            </div>
                            <div class="text-end">
                                <a href="<?= site_url('upload/delete_header') ?>" class="btn btn-danger mt-2 mb-0">Hapus</a>
                                <button type="submit" class="btn btn-primary mt-2 mb-0">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>