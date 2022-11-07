    <div class="container-fluid d-flex aligns-items-center justify-content-center vh-100">
        <div class="card my-auto">
            <div class="card-body fw-light">
                <?= validation_errors() ?>
                <?= form_open('akun/register') ?>
                    <h4 class="card-title text-center fw-light">REGISTER</h4>

                    <div class="d-grid gap-2 mb-3">
                        <div>
                            <label for="id_akun" class="form-label">ID Akun</label>
                            <input type="text" name="id_akun" id="id_akun" class="form-control form-select-sm" size="30" required>
                        </div>

                        <div>
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control form-select-sm" size="30" required>
                        </div>

                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-select-sm" size="30" required>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <label class="form-label">Status</label><br>
                                <div class="d-flex justify-content-evenly">
                                    <input type="radio" class="btn-check" name="status" id="y" value="y" required>
                                    <label class="btn btn-outline-secondary text-white btn-sm fw-light" for="y">Y</label>
                                    <input type="radio" class="btn-check" name="status" id="n" value="n" required>
                                    <label class="btn btn-outline-secondary text-white btn-sm fw-light" for="n">N</label>
                                </div>
                            </div>
                            <div class="col-7">
                                <label for="level" class="form-label">Level</label>
                                <select class="form-select form-select-sm fw-light" name="level" id="level" required>
                                    <option selected disabled>Pilih Level</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Fakultas</option>
                                    <option value="2">Prodi</option>
                                    <option value="3">Dosen</option>
                                    <option value="4">Mahasiswa</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn btn-primary btn-sm">Register</button>
                    </div>

                    <div class="fw-light link-secondary text-center mt-2">
                        <a href="<?= site_url('login') ?>" class="text-decoration-none">Already have an account? <u>Login!</u></a>
                    </div>
                </form>
            </div>
        </div>
    </div>