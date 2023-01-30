    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Profil -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h5 class="mb-0">Input Data Ruangan</h5>
                    </div>
                    <div class="card-body p-3">
                        <?= validation_errors() ?>
                        <?= form_open('admin/inputruangan') ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label>Id Ruangan</label>
                                <div class="mb-3">
                                    <input type="text" name="id_ruangan" class="form-control" placeholder="Id_Ruangan" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nomor</label>
                                <div class="mb-3">
                                    <input type="text" name="nomor" class="form-control" placeholder="Nomor" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jenis</label>
                                <div class="mb-3">
                                    <select class="form-select" name="jenis" required>
                                        <option selected disabled>Pilih Jenis Ruangan</option>
                                        <?php if ($ruangan['jenis'] === 'laboratorium') : ?>
                                            <option selected value="laboratorium">Laboratorium</option>
                                            <option value="kelas">Kelas</option>
                                        <?php elseif ($ruangan['jenis'] === 'kelas') : ?>
                                            <option value="laboratorium">Laboratorium</option>
                                            <option selected value="kelas">Kelas</option>
                                        <?php else : ?>
                                            <option value="laboratorium">Laboratorium
                                            </option>
                                            <option value="kelas">Kelas</option>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label>Kapasitas</label>
                            <div class="mb-3">
                                <input type="text" name="kapasitas" class="form-control" placeholder="kapasitas" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label>Lantai</label>
                            <div class="mb-3">
                                <input type="text" name="lantai" class="form-control" placeholder="lantai" required>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary mt-2 mb-0">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>