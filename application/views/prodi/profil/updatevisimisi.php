    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi/profil') ?>"><u>Profil</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Ubah Visi Misi</li>
                    </ol>
                </nav>
            </div>

            <!-- Form Visi Misi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Visi Misi <?= $prodi['nama'] ?></h5>
                    </div>
                    <?= form_open('prodi/updatevisimisi') ?>
                    <div class="card-body px-3 py-0">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="visi" class="form-control" placeholder="Visi" id="floatingTextVisi" style="height: 200px" required><?= $prodi['visi'] ?></textarea>
                                    <label for="floatingTextVisi">Isi Visi</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="misi" class="form-control" placeholder="Misi" id="floatingTextMisi" style="height: 200px" required><?= $prodi['misi'] ?></textarea>
                                    <label for="floatingTextMisi">Isi Misi</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end p-3">
                        <button type="submit" class="btn btn-primary btn-sm mb-0">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>