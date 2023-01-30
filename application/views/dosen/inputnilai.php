    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5>Input Nilai <?= $matkul['nama'] ?></h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <?= form_open('dosen/setnilai/' . $matkul['id_matkul']) ?>
                        <table class="table table-striped align-items-center mb-0 pe-1" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIM</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Mahasiswa</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 10%">
                                        Hadir
                                    </th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 10%">
                                        Tugas
                                    </th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 10%">
                                        UTS
                                    </th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 10%">
                                        UAS
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($listm as $mahasiswa) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $mahasiswa['nim'] ?></td>
                                        <td><?= $mahasiswa['nama'] ?></td>
                                        <td>
                                            <input type="text" name="nilai-presensi-<?= $mahasiswa['id_krs'] ?>" class="form-control" value="<?= $mahasiswa['nilai_presensi'] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="nilai-tugas-<?= $mahasiswa['id_krs'] ?>" class="form-control" value="<?= $mahasiswa['nilai_tugas'] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="nilai-uts-<?= $mahasiswa['id_krs'] ?>" class="form-control" value="<?= $mahasiswa['nilai_uts'] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="nilai-uas-<?= $mahasiswa['id_krs'] ?>" class="form-control" value="<?= $mahasiswa['nilai_uas'] ?>">
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary btn-sm mb-0">Simpan</button>
                        </div>
                        </form>
                    </div>
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
                order: [1, 'asc'],

                columnDefs: [{
                    targets: [0, 3, 4, 5, 6],
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