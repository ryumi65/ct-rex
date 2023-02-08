    <?php
    if (isset($_SESSION['updatefailed'])) {
        $var = $_SESSION['updatefailed'];
        echo "<script>alert('{$var}')</script>";
        unset($_SESSION['updatefailed']);
    } ?>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen/perkuliahan/mata-kuliah') ?>"><u>Perkuliahan</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">BAP</li>
                    </ol>
                </nav>
            </div>

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between p-3 pb-0">
                        <h5 class="mb-0">Berita Acara Perkuliahan <?= $matkul['nama'] ?></h5>
                        <div class="d-flex d-inline">
                            <a href="<?= site_url('dosen/ubahcapaian/' . $matkul['id_matkul']) ?>" class="btn btn-primary btn-sm mx-2 mb-0">Ubah Capaian</a>
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
                    </div>
                    <div class="card-body px-3 py-0">
                        <div class="my-2">
                            <h6 class="mb-0">CPL Prodi : </h6><?= $matkul['cpl_prodi'] ?>
                            <h6 class="mb-0">CP Mata Kuliah : </h6><?= $matkul['cp_mk'] ?>
                        </div>
                        <table class="table align-items-center w-100" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
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
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Kehadiran</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-100 text-dark text-sm">
                                <?php foreach ($listb as $bap) : ?>
                                    <tr>
                                        <td><?= $bap['pertemuan'] ?></td>
                                        <td class="text-wrap"><?= $tanggal[$bap['pertemuan']] ?></td>
                                        <td class="text-wrap"><?= $bap['pokok'] ?></td>
                                        <td class="text-wrap"><?= $bap['metode'] ?></td>
                                        <td class="text-wrap"><?= $bap['evaluasi'] ?></td>
                                        <td class="text-center"><?= $bap['jumlah_mhs_hadir'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('dosen/ubahbap/' . $matkul['id_matkul'] . '/' . $bap['pertemuan'] . '/' . $bap['id_bap']) ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="badge bg-danger cursor-pointer px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('dosen/deletebap/' . $matkul['id_matkul'] . '/' . $bap['id_bap']) ?>')">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end p-3">
                        <a class="btn btn-primary btn-sm mb-0" href="#">Cetak</a>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- Alert -->
    <script defer src="<?= base_url(); ?>assets/js/alert.js"></script>

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