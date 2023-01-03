    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Profil -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h5 class="mb-0">Edit Profil</h5>
                    </div>
                    <div class="card-body p-3">
                        <?= validation_errors() ?>
                        <?= form_open('mahasiswa/update/' . $mahasiswa['nim']) ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label>Nomor Induk Mahasiswa</label>
                                <div class="mb-3">
                                    <input type="text" name="nim" class="form-control" placeholder="NIM" value="<?= $mahasiswa['nim'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama Lengkap</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $mahasiswa['nama'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Tempat Lahir</label>
                                <div class="mb-3">
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?= $mahasiswa['tempat_lahir'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Tanggal Lahir</label>
                                <div class="mb-3">
                                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?= $mahasiswa['tanggal_lahir'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jenis Kelamin</label>
                                <div class="mb-3">
                                    <select class="form-select" name="jenis_kelamin" required>
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <?php if ($mahasiswa['jenis_kelamin'] === 'L') : ?>
                                            <option selected value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        <?php elseif ($mahasiswa['jenis_kelamin'] === 'P') : ?>
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
                                <label>Agama</label>
                                <div class="mb-3">
                                    <input type="text" name="agama" class="form-control" placeholder="Agama" value="<?= $mahasiswa['agama'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nomor Handphone</label>
                                <div class="mb-3">
                                    <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone" value="<?= $mahasiswa['no_hp'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Email</label>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $mahasiswa['email'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Program Studi</label>
                                <div class="mb-3">
                                    <select class="form-select" name="id_prodi" disabled>
                                        <option selected disabled>Pilih Program Studi</option>
                                        <?php foreach ($listp as $prodi) : ?>
                                            <?php if ($prodi['id_prodi'] === $mahasiswa['id_prodi']) : ?>
                                                <option selected value="<?= $prodi['id_prodi'] ?>">
                                                    <?= $prodi['nama'] ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?= $prodi['id_prodi'] ?>">
                                                    <?= $prodi['nama'] ?>
                                                </option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Tahun Angkatan</label>
                                <div class="mb-3">
                                    <input type="text" name="tahun_angkatan" class="form-control" placeholder="Tahun Angkatan" value="<?= $mahasiswa['tahun_angkatan'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kewarganegaraan</label>
                                <div class="mb-3">
                                    <select class="form-select" name="kewarganegaraan" required>
                                        <option selected disabled>Pilih Kewarganegaraan</option>
                                        <?php if ($mahasiswa['kewarganegaraan'] === 'WNI') : ?>
                                            <option selected value="WNI">Warga Negara Indonesia</option>
                                            <option value="WNA">Warga Negara Asing</option>
                                        <?php elseif ($mahasiswa['kewarganegaraan'] === 'WNA') : ?>
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
                                <label>Nomor Induk Kependudukan</label>
                                <div class="mb-3">
                                    <input type="text" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan" value="<?= $mahasiswa['nik'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Alamat Tempat Tinggal</label>
                                <div class="mb-3">
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat Tempat Tinggal" value="<?= $mahasiswa['alamat'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Desa/Kelurahan</label>
                                <div class="mb-3">
                                    <input type="text" name="kelurahan" class="form-control" placeholder="Desa/Kelurahan" value="<?= $mahasiswa['kelurahan'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kecamatan</label>
                                <div class="mb-3">
                                    <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" value="<?= $mahasiswa['kecamatan'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kabupaten/Kota</label>
                                <div class="mb-3">
                                    <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten/Kota" value="<?= $mahasiswa['kabupaten'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Provinsi</label>
                                <div class="mb-3">
                                    <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" value="<?= $mahasiswa['provinsi'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kode Pos</label>
                                <div class="mb-3">
                                    <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" value="<?= $mahasiswa['kode_pos'] ?>" required>
                                </div>
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



        <!-- Footer -->
        <footer class="footer pb-3">

            <!-- Logo Medsos -->
            <div class="container mx-auto text-center my-2">
                <a href="https://www.youtube.com/channel/UCdo5vics8bEFAd9h6aghLYQ" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-youtube"></i>
                </a>
                <a href="https://id-id.facebook.com/universitasmuhammadiyahbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.twitter.com/umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-twitter"></i>
                </a>
                <a href="https://www.tiktok.com/@umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-tiktok"></i>
                </a>
            </div>

            <!-- Copyright -->
            <div class="container mx-auto text-center">
                <p class="mb-0 text-secondary text-xs">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
                </p>
            </div>
        </footer>
    </div>