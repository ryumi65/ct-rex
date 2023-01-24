    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Profil -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h5 class="mb-0">Edit Profil</h5>
                            </div>
                            <div class="card-body p-3">
                                <?= validation_errors() ?>
                                <?= form_open('mahasiswa/update') ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <div class="mb-3">
                                            <input type="text" name="username" class="form-control" placeholder="username" value="<?= $mahasiswa['username'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="text" name="password" class="form-control" placeholder="password" value="<?= $mahasiswa['password'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end text-center">
                                        <button type="submit" class="btn btn-primary my-4">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>