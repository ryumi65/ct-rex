    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between p-3 pb-0">
                        <h5 class="mb-0">Berita Acara Perkuliahan <?= $matkul['nama'] ?></h5>
                        <div class="dropdown">
                            <a class="btn btn-primary btn-sm dropdown-toggle mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Buat BAP
                            </a>
                            <ul class="dropdown-menu">
                                <?php for ($i = 1; $i <= 16; $i++) : ?>
                                    <?php if ($pertemuan[$i - 1] === 'true') : ?>
                                        <li>
                                            <a class="dropdown-item" href="<?= site_url('dosen/perkuliahan/bap/' . $matkul['id_matkul'] . '/tambah/' . $i) ?>">Pertemuan
                                                <?php if ($i === 8) echo 'UTS';
                                                elseif ($i === 16) echo 'UAS';
                                                else echo $i; ?>
                                            </a>
                                        </li>
                                    <?php endif ?>
                                <?php endfor ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="my-2">
                            <h6 class="mb-0">CPL Prodi : </h6><?= $matkul['cpl_prodi'] ?>
                            <h6 class="mb-0">CP Mata Kuliah : </h6><?= $matkul['cp_mk'] ?>
                        </div>
                        <table class="table table-bordered align-items-center mb-0 pe-1" id="table">
                            <thead>
                                <th class=" font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                    TM ke</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Hari/Tanggal/Jam</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Pokok Bahasan</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Metode</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Evaluasi</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Kehadiran</th>
                                <th class="font-weight-bolder text-uppercase text-xs text-center">
                                    Aksi</th>
                            </thead>
                            <tbody class="text-sm">
                                <?php foreach ($listb as $bap) : ?>
                                    <tr>
                                        <td><?= $bap['pertemuan'] ?></td>
                                        <td class="text-wrap"><?= $tanggal[$bap['pertemuan']] ?></td>
                                        <td><?= $bap['pokok'] ?></td>
                                        <td><?= $bap['metode'] ?></td>
                                        <td><?= $bap['evaluasi'] ?></td>
                                        <td><?= $bap['jumlah_mhs_hadir'] ?></td>
                                        <td class="text-center">
                                            <a class="badge bg-warning cursor-pointer px-3 py-2" data-bs-toggle="">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="badge bg-danger cursor-pointer px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url() ?>')">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer p-3 pt-0 d-flex justify-content-end">
                        <a class="btn btn-primary btn-sm mb-0" href="#">Cetak</a>
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

                dom: "",
                responsive: true,
                order: [0, 'asc'],

                columnDefs: [{
                    targets: [0, 6],
                    orderable: false,
                    searchable: false,
                }],
            });
        });
    </script>