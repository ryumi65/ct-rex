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
                        <li class="breadcrumb-item active" aria-current="page">Ubah Capaian</li>
                    </ol>
                </nav>
            </div>

            <!-- Profil -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5 class="mb-0">Ubah Capaian <?= $matkul['nama'] ?></h5>
                    </div>
                    <div class="card-body p-3">
                        <?= form_open('dosen/updatecapaian/' . $matkul['id_matkul']) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>CPL Prodi</label>
                                <div class="mb-3">
                                    <input type="text" name="cpl_prodi" class="form-control" placeholder="CPL Prodi" value="<?= $matkul['cpl_prodi'] ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>CP Mata Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="cp_mk" class="form-control" placeholder="CP Mata Kuliah" value="<?= $matkul['cp_mk'] ?>" required>
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

        <?php $this->load->view('_partials/footer') ?>
    </div>