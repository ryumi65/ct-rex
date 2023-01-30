    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Form Mata Kuliah -->
            <div class="col-12 mb-md-0 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Form Pengisian Mata Kuliah</h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <?= validation_errors() ?>
                        <?= form_open('matkul/create') ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label>Kode Mata Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="kode_matkul" class="form-control" placeholder="Kode Matkul" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama Mata Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Matkul" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama Mata Kuliah (Inggris)</label>
                                <div class="mb-3">
                                    <input type="text" name="nama_inggris" class="form-control" placeholder="Nama Matkul Inggris">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jenis Mata Kuliah</label>
                                <div class="mb-3">
                                    <select class="form-select" name="jenis">
                                        <option selected disabled>Pilih Jenis Mata Kuliah</option>
                                        <?php for ($i = 0; $i < count($jenis); $i++) : ?>
                                            <option value="<?= $jenis[$i] ?>"><?= $jenis[$i] ?></option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kategori sks</label>
                                <div class="mb-3">
                                    <select class="form-select" name="kategori">
                                        <option selected disabled>Pilih Kategori sks</option>
                                        <?php for ($i = 0; $i < count($kategori); $i++) : ?>
                                            <option value="<?= $kategori[$i] ?>"><?= $kategori[$i] ?></option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jumlah sks</label>
                                <div class="mb-3">
                                    <input type="text" name="sks" class="form-control" placeholder="Jumlah sks">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Dosen Pengampu</label>
                                <div class="mb-3">
                                    <select class="form-select" name="nik_dosen">
                                        <option selected disabled>Pilih Dosen Pengampu</option>
                                        <?php foreach ($listd as $dosen) : ?>
                                            <option value="<?= $dosen['nik'] ?>"><?= $dosen['nik'] . ' - ' . $dosen['nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Semester</label>
                                <div class="mb-3">
                                    <select class="form-select" name="id_semester">
                                        <option selected disabled>Pilih Semester</option>
                                        <?php for ($i = 0; $i < count($semester); $i++) : ?>
                                            <option value="<?= $semester[$i] ?>"><?= $semester[$i] ?></option>
                                        <?php endfor ?>
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