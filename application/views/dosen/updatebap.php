    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen/perkuliahan/mata-kuliah') ?>"><u>Perkuliahan</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen/perkuliahan/bap/' . $matkul['id_matkul']) ?>"><u>BAP</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Ubah</li>
                    </ol>
                </nav>
            </div>

            <!-- Form BAP -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Berita Acara Perkuliahan <?= $matkul['nama'] ?> Pertemuan <?= $pertemuan ?></h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <?= form_open('dosen/updatebap/' . $matkul['id_matkul'] . '/' . $pertemuan . '/' . $bap['id_bap']) ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea name="pokok" class="form-control" placeholder="Pokok Bahasan" id="floatingTextPokok" style="height: 200px" required><?= $bap['pokok'] ?></textarea>
                                    <label for="floatingTextPokok">Isi Pokok Bahasan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea name="metode" class="form-control" placeholder="Metode Pembelajaran" id="floatingTextMetode" style="height: 200px" required><?= $bap['metode'] ?></textarea>
                                    <label for="floatingTextMetode">Isi Metode Pembelajaran</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="evaluasi" class="form-control" placeholder="Evaluasi" id="floatingTextEvaluasi" style="height: 200px" required><?= $bap['evaluasi'] ?></textarea>
                                    <label for="floatingTextEvaluasi">Isi Evaluasi</label>
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