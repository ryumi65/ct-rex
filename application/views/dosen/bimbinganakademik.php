    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0">Daftar Mahasiswa Bimbingan <?= $dosen['nama'] ?></h5>
                            <div class="mx-0 col-4 my-1">
                                <select class="form-select" name="nik_dosen" required>
                                    <option selected disabled>Pilih Tahun Angkatan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIM</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Mahasiswa</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        JK</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Angkatan</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($lists as $mhs) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $mhs['nim'] ?></td>
                                        <td><a href="berkasmhs"><?= $mhs['nama'] ?></a></td>
                                        <td><?= $mhs['jenis_kelamin'] ?></td>
                                        <td><?= $mhs['tahun_angkatan'] ?></td>
                                        <td class="d-flex justify-content-center">
                                            <div class="mx-1" data-bs-toggle="modal" data-bs-target="#id-<?= $mhs['nim'] ?>" style="cursor: pointer; max-width: fit-content;">
                                                <a class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="KRS">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                        <!-- Modal -->
                        <?php foreach ($lists as $mhs) : ?>
                            <div class="modal fade" id="id-<?= $mhs['nim'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="label-<?= $mhs['nim'] ?>">Kartu Rencana Studi <?= $mhs['nama'] ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <?= form_open('krs/acc') ?>
                                        <div class="modal-body">
                                            <table class="table table-striped align-items-center ps-3">
                                                <thead>
                                                    <tr class="bg-gradient-primary text-white">
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                            No.</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Nama MK</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            sks</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Dosen Pengampu</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Hari</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Waktu</th>
                                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                            Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-sm">
                                                    <?php foreach ($mhs['listj'] as $krs) :
                                                        if ($krs['status'] == 'N') : ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?= $krs['nama'] ?></td>
                                                                <td><?= $krs['sks'] ?></td>
                                                                <td><?= $krs['dosen'] ?></td>
                                                                <td><?= $krs['hari'] ?></td>
                                                                <td><?= $krs['waktu'] ?></td>
                                                                <td>
                                                                    <input class="form-check-input" type="checkbox" name="id_krs[]" value="<?= $krs['id_krs'] ?>">
                                                                </td>
                                                            </tr>
                                                    <?php endif;
                                                    endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary mb-0">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
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

    <!-- Alert -->
    <script defer src="<?= base_url(); ?>assets/js/alert.js"></script>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        let table;

        $(document).ready(() => {

            table = $('#table').DataTable({

                responsive: true,
                order: [1, 'asc'],

                columnDefs: [{
                    targets: [0, 5],
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