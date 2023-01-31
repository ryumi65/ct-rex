    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5>Tambah Kartu Rencana Studi Semester <?= $mahasiswa['semester'] ?></h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <?= form_open('krs/create') ?>
                        <?php for ($i = 1; $i <= 8; $i++) :
                            if ($i % 2 === $semester) : ?>
                                <h6>KRS Semester <?= $i ?></h6>
                                <table class="table table-striped align-items-center" id="table<?= $i ?>">
                                    <thead>
                                        <tr class="bg-gradient-primary text-white">
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                No.</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Kode MK</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Nama MK</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Total SKS</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Dosen Pengampu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Hari</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Waktu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Ruangan</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm">
                                        <?php foreach ($listj[$i] as $jadwal) : ?>
                                            <?php
                                            $status = '';

                                            foreach ($listk as $krs) {
                                                if ($jadwal['id'] == $krs['id_jadwal']) {
                                                    $status = 'break';
                                                }
                                            }

                                            if ($status === 'break') {
                                                break;
                                            } ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $jadwal['kode'] ?></td>
                                                <td><?= $jadwal['nama'] ?></td>
                                                <td><?= $jadwal['sks'] ?></td>
                                                <td><?= $jadwal['dosen'] ?></td>
                                                <td><?= $jadwal['hari'] ?></td>
                                                <td><?= $jadwal['waktu'] ?></td>
                                                <td><?= $jadwal['ruangan'] ?></td>
                                                <td class="d-flex justify-content-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="id_jadwal[]" value="<?= $jadwal['id'] ?>">
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                        <?php endif;
                        endfor; ?>
                        <div class="d-flex justify-content-end text-center">
                            <button type="submit" class="btn btn-primary btn-sm mt-3 mb-0">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--
            Form KRS
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5>Form Pengisian Kartu Rencana Studi</h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <table class="table table-striped align-items-center mb-0" id="table1">
                            <thead>
                                <tr>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        ID Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Total SKS</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Kategori</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="products">
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end p-3 pt-0">
                        <a class="btn btn-primary btn-sm mb-0">Ambil Semua</a>
                    </div>
                </div>
            </div>

            Tabel Hasil Pilihan
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-body p-3">
                        <p class="mb-0" id="total-price"></p>
                        <table class="table table-striped align-items-center mb-0" id="table2">
                            <thead>
                                <tr>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        ID Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Total SKS</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Kategori</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="cart-items">
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end p-3 pt-0">
                        <a class="btn btn-primary btn-sm mb-0">Submit</a>
                    </div>
                </div>
            </div>
            -->
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- KRS -->
    <script src="<?= base_url(); ?>assets/js/krs.js"></script>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        for (let i = 1; i <= 8; i++) {
            if (i % 2 == <?= $semester ?>) {
                let table;

                $(document).ready(() => {

                    table = $(`#table${i}`).DataTable({

                        dom: "",
                        paging: false,
                        order: [1, 'asc'],

                        columnDefs: [{
                            targets: [0, 8],
                            orderable: false,
                            searchable: false,
                        }],
                    });

                    table.on('order.dt search.dt', () => {
                        let j = 1;

                        table.cells(null, 0, {
                            order: 'applied',
                            search: 'applied',
                        }).every(function(cell) {
                            this.data(j++);
                        });
                    }).draw();
                });
            }
        }
    </script>