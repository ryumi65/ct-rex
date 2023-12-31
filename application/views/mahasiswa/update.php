    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('mahasiswa') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('mahasiswa/profil') ?>"><u>Profil</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Ubah</li>
                    </ol>
                </nav>
            </div>

            <!-- Update -->
            <div class="col-12 my-3">
                <div class="card">

                    <!-- Button -->
                    <div class="card-header p-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <!-- Button Mahasiswa -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="mahasiswa-tab" data-bs-toggle="tab" data-bs-target="#mahasiswa-tab-pane" type="button" role="tab" aria-controls="mahasiswa-tab-pane" aria-selected="true">Mahasiswa</button>
                            </li>

                            <!-- Button Orang Tua -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="orangtua-tab" data-bs-toggle="tab" data-bs-target="#orangtua-tab-pane" type="button" role="tab" aria-controls="orangtua-tab-pane" aria-selected="false">Orang Tua</button>
                            </li>
                        </ul>
                    </div>

                    <!-- Isi -->
                    <div class="card-body p-3 pt-0">
                        <div class="tab-content" id="myTabContent">

                            <!-- Mahasiswa -->
                            <div class="tab-pane fade show active" id="mahasiswa-tab-pane" role="tabpanel" aria-labelledby="mahasiswa-tab" tabindex="0">

                                <!-- Judul -->
                                <h5>Ubah Profil Mahasiswa</h5>

                                <!-- Form -->
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
                                                <option selected disabled value="">Pilih Jenis Kelamin</option>
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
                                            <?php
                                            $is_selected = '';
                                            $kr_selected = '';
                                            $kt_selected = '';
                                            $hd_selected = '';
                                            $bd_selected = '';
                                            $kc_selected = '';

                                            switch ($mahasiswa['agama']) {
                                                case 'Islam':
                                                    $is_selected = 'selected';
                                                    break;
                                                case 'Kristen':
                                                    $kr_selected = 'selected';
                                                    break;
                                                case 'Katolik':
                                                    $kt_selected = 'selected';
                                                    break;
                                                case 'Hindu':
                                                    $hd_selected = 'selected';
                                                    break;
                                                case 'Budha':
                                                    $bd_selected = 'selected';
                                                    break;
                                                case 'Khonghucu':
                                                    $kc_selected = 'selected';
                                                    break;
                                            }
                                            ?>
                                            <select class="form-select" name="agama" required>
                                                <option selected disabled value="">Pilih Agama</option>
                                                <option value="Islam" <?= $is_selected ?>>Islam</option>
                                                <option value="Kristen" <?= $kr_selected ?>>Kristen</option>
                                                <option value="Katolik" <?= $kt_selected ?>>Katolik</option>
                                                <option value="Hindu" <?= $hd_selected ?>>Hindu</option>
                                                <option value="Budha" <?= $bd_selected ?>>Budha</option>
                                                <option value="Khonghucu" <?= $kc_selected ?>>Khonghucu</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6">
                                        <label>Nomor Handphone</label>
                                        <div class="mb-3">
                                            <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone" value="<?= $mahasiswa['no_hp'] ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-4 col-sm-6">
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $mahasiswa['email'] ?>">
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
                                            <select class="form-select" name="kewarganegaraan">
                                                <option selected disabled>Pilih Kewarganegaraan</option>
                                                <?php if ($mahasiswa['kewarganegaraan'] === 'WNI') : ?>
                                                    <option selected value="wni">Warga Negara Indonesia</option>
                                                    <option value="wna">Warga Negara Asing</option>
                                                <?php elseif ($mahasiswa['kewarganegaraan'] === 'WNA') : ?>
                                                    <option value="wni">Warga Negara Indonesia</option>
                                                    <option selected value="wna">Warga Negara Asing</option>
                                                <?php else : ?>
                                                    <option value="wni">Warga Negara Indonesia</option>
                                                    <option value="wna">Warga Negara Asing</option>
                                                <?php endif ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan" value="<?= $mahasiswa['nik'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Alamat Tempat Tinggal</label>
                                        <div class="mb-3">
                                            <input type="text" name="alamat" class="form-control" placeholder="Alamat Tempat Tinggal" value="<?= $mahasiswa['alamat'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Desa/Kelurahan</label>
                                        <div class="mb-3">
                                            <input type="text" name="kelurahan" class="form-control" placeholder="Desa/Kelurahan" value="<?= $mahasiswa['kelurahan'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Kecamatan</label>
                                        <div class="mb-3">
                                            <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" value="<?= $mahasiswa['kecamatan'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Kabupaten/Kota</label>
                                        <div class="mb-3">
                                            <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten/Kota" value="<?= $mahasiswa['kabupaten'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Provinsi</label>
                                        <div class="mb-3">
                                            <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" value="<?= $mahasiswa['provinsi'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Kode Pos</label>
                                        <div class="mb-3">
                                            <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" value="<?= $mahasiswa['kode_pos'] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end text-center">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2 mb-0">Simpan</button>
                                </div>
                                </form>
                            </div>

                            <!-- Orang Tua -->
                            <div class="tab-pane fade" id="orangtua-tab-pane" role="tabpanel" aria-labelledby="orangtua-tab" tabindex="0">

                                <!-- Judul -->
                                <h5>Ubah Profil Orang Tua/Wali</h5>

                                <!-- Form -->
                                <?= form_open('mahasiswa/update_ortu/' . $mahasiswa['nim']) ?>
                                <div class="row">

                                    <!-- Ayah -->
                                    <div class="col-12">
                                        <h6 class="mb-0">Data Ayah</h6>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik_ayah" class="form-control" placeholder="NIK" value="<?= $ortu['nik_ayah'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nama Lengkap</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama_ayah" class="form-control" placeholder="Nama" value="<?= $ortu['nama_ayah'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" name="tanggal_lahir_ayah" class="form-control" placeholder="Tanggal Lahir" value="<?= $ortu['tanggal_lahir_ayah'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Pendidikan</label>
                                        <div class="mb-3">
                                            <select class="form-select" name="pendidikan">
                                                <option selected disabled>Pilih Pendidikan</option>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP/MTS</option>
                                                <option value="SMA">SMA/MA</option>
                                                <option value="D3">Diploma 3</option>
                                                <option value="S1">Sarjana/Strata 1</option>
                                                <option value="S2">Magister/Strata 2</option>
                                                <option value="Doktor">Doktor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Pekerjaan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan" value="<?= $ortu['pekerjaan_ayah'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <select class="form-select" name="jenis_kelamin">
                                                <option selected disabled>Pilih Penghasilan</option>
                                                <option value="<500k">Kurang dari Rp.500.000</option>
                                                <option value="600-1k">Rp.500.000 -Rp.1.000.000</option>
                                                <option value="1k-2k">Rp.1.000.000 - Rp.2.000.000</option>
                                                <option value="2k-5k">Rp.2.000.000 - Rp.5.000.000</option>
                                                <option value="5k-20k">Rp.5.000.00 - Rp.20.000.000</option>
                                                <option value="Lebih">Lebih Dari Rp.20.000.000</option>
                                            </select>
                                        </div>
                                    </div>


                                    <!-- Ibu -->
                                    <div class="col-12">
                                        <hr class="bg-dark">
                                        <h6 class="mb-0">Data Ibu</h6>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik_ibu" class="form-control" placeholder="NIK" value="<?= $ortu['nik_ibu'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nama Lengkap</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama_ibu" class="form-control" placeholder="Nama" value="<?= $ortu['nama_ibu'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" name="tanggal_lahir_ibu" class="form-control" placeholder="Tanggal Lahir" value="<?= $ortu['tanggal_lahir_ibu'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Pendidikan</label>
                                        <div class="mb-3">
                                            <select class="form-select" name="pendidikan">
                                                <option selected disabled>Pilih Pendidikan</option>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP/MTS</option>
                                                <option value="SMA">SMA/MA</option>
                                                <option value="D3">Diploma 3</option>
                                                <option value="S1">Sarjana/Strata 1</option>
                                                <option value="S2">Magister/Strata 2</option>
                                                <option value="Doktor">Doktor</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6">
                                        <label>Pekerjaan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan" value="<?= $ortu['pekerjaan_ibu'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <select class="form-select" name="jenis_kelamin">
                                                <option selected disabled>Pilih Penghasilan</option>
                                                <option value="<500k">Kurang dari Rp.500.000</option>
                                                <option value="600-1k">Rp.500.000 -Rp.1.000.000</option>
                                                <option value="1k-2k">Rp.1.000.000 - Rp.2.000.000</option>
                                                <option value="2k-5k">Rp.2.000.000 - Rp.5.000.000</option>
                                                <option value="5k-20k">Rp.5.000.00 - Rp.20.000.000</option>
                                                <option value="Lebih">Lebih Dari Rp.20.000.000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Wali -->
                                    <div class="col-12">
                                        <hr class="bg-dark">
                                        <h6 class="mb-0">Data Wali</h6>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik_wali" class="form-control" placeholder="NIK" value="<?= $ortu['nik_wali'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nama Lengkap</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama_wali" class="form-control" placeholder="Nama" value="<?= $ortu['nama_wali'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" name="tanggal_lahir_wali" class="form-control" placeholder="Tanggal Lahir" value="<?= $ortu['tanggal_lahir_wali'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Pendidikan</label>
                                        <div class="mb-3">
                                            <select class="form-select" name="pendidikan">
                                                <option selected disabled>Pilih Pendidikan</option>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP/MTS</option>
                                                <option value="SMA">SMA/MA</option>
                                                <option value="D3">Diploma 3</option>
                                                <option value="S1">Sarjana/Strata 1</option>
                                                <option value="S2">Magister/Strata 2</option>
                                                <option value="Doktor">Doktor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Pekerjaan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pekerjaan_wali" class="form-control" placeholder="Pekerjaan" value="<?= $ortu['pekerjaan_wali'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <select class="form-select" name="jenis_kelamin">
                                                <option selected disabled>Pilih Penghasilan</option>
                                                <option value="<500k">Kurang dari Rp.500.000</option>
                                                <option value="600-1k">Rp.500.000 -Rp.1.000.000</option>
                                                <option value="1k-2k">Rp.1.000.000 - Rp.2.000.000</option>
                                                <option value="2k-5k">Rp.2.000.000 - Rp.5.000.000</option>
                                                <option value="5k-20k">Rp.5.000.00 - Rp.20.000.000</option>
                                                <option value="Lebih">Lebih Dari Rp.20.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end text-center">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2 mb-0">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>