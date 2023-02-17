    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <div class="row">

                <!-- Foto Profil -->
                <div class="col-md-6 my-3">
                    <div class="card">
                        <div class="card-header p-3">
                            <h5 class="mb-0">Edit Foto Profil</h5>
                        </div>
                        <?= form_open_multipart('upload/upload_profil') ?>
                        <div class="card-body px-3 py-0">
                            <label class="d-flex d-inline justify-content-between">Foto Profil
                                <p class="text-sm"> Ukuran Disarankan 500 x 500, Maks. 2MB</p>
                            </label>
                            <div class="mb-3">
                                <input type="file" name="userfile" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end p-3">
                            <a href="<?= site_url('upload/delete_profil') ?>" class="btn btn-danger btn-sm mx-2 mb-0">Hapus</a>
                            <button type="submit" class="btn btn-primary btn-sm mb-0">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- Foto Header -->
                <div class="col-md-6 my-3">
                    <div class="card">
                        <div class="card-header p-3">
                            <h5 class="mb-0">Edit Foto Header</h5>
                        </div>
                        <?= form_open_multipart('upload/upload_header') ?>
                        <div class="card-body px-3 py-0">
                            <label class="d-flex d-inline justify-content-between">Foto Header
                                <p class="text-sm"> Ukuran Disarankan 1000 x 300, Maks. 2MB</p>
                            </label>
                            <div class="mb-3">
                                <input type="file" name="userfile" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end p-3">
                            <a href="<?= site_url('upload/delete_header') ?>" class="btn btn-danger btn-sm mx-2 mb-0">Hapus</a>
                            <button type="submit" class="btn btn-primary btn-sm mb-0">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>