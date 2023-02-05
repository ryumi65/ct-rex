    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi/civitas/data-dosen-wali') ?>"><u>Data Dosen Wali</u></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Mahasiswa Wali</li>
                    </ol>
                </nav>
            </div>

            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h5 class="mb-0">Daftar Mahasiswa Tanpa Dosen Wali</h5>
                    </div>
                    <?= validation_errors() ?>
                    <?= form_open('prodi/createwali') ?>
                    <div class="card-body p-3 pt-0">
                        <div class="mb-3">
                            <select class="form-select" name="nik" required>
                                <option selected disabled>Pilih Dosen</option>
                                <?php foreach ($listd as $dosen) : ?>
                                    <option value="<?= $dosen['nik'] ?>">
                                        <?= $dosen['nik'] . ' - ' . $dosen['nama'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <table class="table align-items-center w-100" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Mahasiswa</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIM</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        JK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Angkatan</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Dosen Wali</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Status</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center" style="width: 5%">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($listm as $mahasiswa) : ?>
                                    <tr>
                                        <td></td>
                                        <td class="text-wrap"><?= $mahasiswa['nama'] ?></td>
                                        <td><?= $mahasiswa['nim'] ?></td>
                                        <td><?= $mahasiswa['jenis_kelamin'] ?></td>
                                        <td class="text-center"><?= $mahasiswa['tahun_angkatan'] ?></td>
                                        <td class="text-wrap">
                                            <?php foreach ($listd as $dosen) {
                                                if ($mahasiswa['dosen_wali'] == $dosen['nik']) echo $dosen['nama'];
                                            } ?>
                                        </td>
                                        <td><?= $mahasiswa['status'] ?></td>
                                        <td class="d-flex justify-content-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dosen_wali[]" value="<?= $mahasiswa['nim'] ?>">
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end p-3 pt-0">
                        <button type="submit" class="btn btn-primary btn-sm mt-2 mb-0">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        let table;

        $(document).ready(() => {

            table = $('#table').DataTable({

                responsive: true,
                order: [2, 'asc'],

                columnDefs: [{
                    targets: [0, 7],
                    orderable: false,
                    searchable: false,
                }],
            });

            table.on('order.dt search.dt', () => {
                let i = 1;

                table.cells(null, 0, {
                    order: 'applied',
                    search: 'applied',
                }).every(function(cell) {
                    this.data(i++);
                });
            }).draw();
        });
    </script>