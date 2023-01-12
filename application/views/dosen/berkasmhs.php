<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-5 pt-xl-0">


        <div class="card mt-4">
            <div class="card-header pb-0 p-3">
                <h5 class="my-2 mb-4">Berkas Mahasiswa </h5>
            </div>
            <div class="card-body p-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    <!-- Button KRS-->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="krs-tab" data-bs-toggle="tab" data-bs-target="#krs-tab-pane" type="button" role="tab" aria-controls="mahasiswa-tab-pane" aria-selected="true">KRS</button>
                    </li>

                    <!-- Button KHS -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="khs-tab" data-bs-toggle="tab" data-bs-target="#khs-tab-pane" type="button" role="tab" aria-controls="khs-tab-pane" aria-selected="false">KHS</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <!-- KRS -->
                    <div class="tab-pane fade show active" id="krs-tab-pane" role="tabpanel" aria-labelledby="krs-tab" tabindex="0">
                        <div class="row pt-3">
                            <div class="col-12 col-lg-4 col-xxl-3">
                                <div class="card h-100 shadow" id="card-pop">
                                    <div class="card-body">
                                        <h5 class="card-title">Semester</h5>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-normal mb-0">Jumlah Mata Kuliah</p>
                                            <p class="mb-0"></p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-normal mb-0">Jumlah sks</p>
                                            <p class="mb-0" </p>
                                        </div>
                                    </div>
                                    <div class="card-footer pt-0">
                                        <a class="stretched-link text-body text-sm font-weight-bold icon-move-right mb-0" data-bs-toggle="modal" data-bs-target="#semester">
                                            Lihat Detail
                                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal krs -->
                    <div class="modal fade" id="semester">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Kartu Rencana Studi Semester</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped align-items-center ps-3" id="table">
                                            <thead>
                                                <tr>
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
                                                        Status</th>
                                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                        Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-sm">
                                                <?php foreach ($listk[$i - 1] as $krs) : ?>
                                                    <tr>
                                                        <td></td>
                                                        <td><?= $krs['kode'] ?></td>
                                                        <td><?= $krs['nama'] ?></td>
                                                        <td><?= $krs['sks'] ?></td>
                                                        <td><?= $krs['dosen'] ?></td>
                                                        <td><?= $krs['hari'] ?></td>
                                                        <td><?= $krs['waktu'] ?></td>
                                                        <td><?= $krs['ruangan'] ?></td>
                                                        <td class="text-center">
                                                            <?php if ($krs['status'] === 'Y') : ?>
                                                                <span class="badge bg-gradient-success">Aktif</span>
                                                            <?php elseif ($krs['status'] === 'N') : ?>
                                                                <span class="badge bg-gradient-warning">Menunggu Persetujuan</span>
                                                            <?php else : ?>
                                                                <span class="badge bg-gradient-danger">Tidak Aktif</span>
                                                            <?php endif ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php if ($krs['status'] === 'Y') : ?>
                                                                <span class="badge bg-secondary px-3 py-2">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </span>
                                                            <?php else : ?>
                                                                <a class="badge bg-danger px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('mahasiswa/deletekrs/' . $this->session->id . '/' . $krs['id']) ?>')">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal KHS -->
                    <div class="tab-pane fade" id="khs-tab-pane" role="tabpanel" aria-labelledby="khs-tab" tabindex="0">
                        <div class="row pt-3">
                            <div class="col-12 col-lg-4 col-xxl-3">
                                <div class="card h-100 shadow" id="card-pop">
                                    <div class="card-body">
                                        <h5 class="card-title">Semester</h5>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-normal mb-0">Jumlah Mata Kuliah</p>
                                            <p class="mb-0"></p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-normal mb-0">Jumlah sks</p>
                                            <p class="mb-0" </p>
                                        </div>
                                    </div>
                                    <div class="card-footer pt-0">
                                        <a class="stretched-link text-body text-sm font-weight-bold icon-move-right mb-0" data-bs-toggle="modal" data-bs-target="khs-tab-pane">
                                            Lihat Detail
                                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="khs-tab-pane" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kartu Hasil Studi Semester 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped align-items-center ps-3" id="table">
                            <thead>
                                <tr>
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
                                        Semester</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Huruf</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Angka</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Indeks</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-sm mx-2" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cetak</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Footer -->
<footer class="footer py-3">

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