    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            

            <!-- Daftar Matkul dari KRS -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between">
                            <h6>Data Ruangan</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            ID Ruangan</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nomor</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Jenis</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Kapasitas</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Lantai</th>
                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                <?php foreach ($listr as $ruangan) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $ruangan['id_ruangan'] ?></td>
                                        <td><a href="<?= site_url('admin/dataruangan' . $ruangan['id_ruangan']) ?>"><?= $ruangan['nama'] ?></a></td>
                                        <td><?= $ruangan['nomor'] ?></td>
                                        <td><?=$ruangan['jenis'] ?></td>
                                        <td><?= $ruangan['kapasitas'] ?></td>
                                        <td><?= $ruangan['lantai'] ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a href="<?= site_url('admin/dataruangan/edit/' . $ruangan['id_ruangan']) ?>" class="btn btn-warning mx-1 mb-0" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a class="btn btn-danger mx-1 mb-0" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('admin/dataruangan/delete/' . $ruangan['id_ruangan']) ?>')">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
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