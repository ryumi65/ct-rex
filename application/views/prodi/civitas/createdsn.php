    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Profil -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Tambah Data Dosen</h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <?= validation_errors() ?>
                        <?= form_open('prodi/inputdsn') ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label>Nomor Induk Kependudukan</label>
                                <div class="mb-3">
                                    <input type="text" name="nik" class="form-control" placeholder="NIK" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama Lengkap</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jenis Kelamin</label>
                                <div class="mb-3">
                                    <select class="form-select" name="jenis_kelamin" required>
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <?php if ($dosen['jenis_kelamin'] === 'L') : ?>
                                            <option selected value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        <?php elseif ($dosen['jenis_kelamin'] === 'P') : ?>
                                            <option value="L">Laki-laki</option>
                                            <option selected value="P">Perempuan</option>
                                        <?php else : ?>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Tempat Lahir</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Tanggal Lahir</label>
                                <div class="mb-3">
                                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tangga Lahir" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Email</label>
                                <div class="mb-3">
                                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>No Handphone</label>
                                <div class="mb-3">
                                    <input type="text" name="no_handphone" class="form-control" placeholder="No Handphone" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kewarganegaraan</label>
                                <div class="mb-3">
                                    <select class="form-select" name="kewarganegaraan" required>
                                        <option selected disabled>Pilih Kewarganegaraan</option>
                                        <?php if ($dosen['kewarganegaraan'] === 'WNI') : ?>
                                            <option selected value="WNI">Warga Negara Indonesia</option>
                                            <option value="WNA">Warga Negara Asing</option>
                                        <?php elseif ($dosen['kewarganegaraan'] === 'WNA') : ?>
                                            <option value="WNI">Warga Negara Indonesia</option>
                                            <option selected value="WNA">Warga Negara Asing</option>
                                        <?php else : ?>
                                            <option value="WNI">Warga Negara Indonesia</option>
                                            <option value="WNA">Warga Negara Asing</option>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Agama</label>
                                <div class="mb-3">
                                    <input type="text" name="agama" class="form-control" placeholder="Agama" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Alamat</label>
                                <div class="mb-3">
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>NIDN</label>
                                <div class="mb-3">
                                    <input type="text" name="nidn" class="form-control" placeholder="NIDN" required>
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