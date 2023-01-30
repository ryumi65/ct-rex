    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="row">
                <div class="col-md-6 my-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <h5 class="mb-0">Ubah Tahun Ajaran</h5>
                        </div>
                        <div class="card-body p-3">
                            <?= form_open('admin/ubahtahun') ?>
                            <label>Tahun Ajaran</label>
                            <div class="mb-3">
                                <select class="form-select" name="id_tahun">
                                    <option selected disabled>Pilih Tahun Ajaran</option>
                                    <?php foreach ($listt as $tahun) : ?>
                                        <option value="<?= $tahun['id_tahun'] ?>"><?= $tahun['tahun_ajaran'] . ' - ' . ucfirst($tahun['nama']) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary mt-2 mb-0">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>