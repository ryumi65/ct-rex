<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-5 pt-xl-0">

        <!-- Absensi -->
        <div class="col-12 my-3">
            <div class="card">
                <div class="card-header p-3">
                    <div>
                        <div class="d-inline d-flex justify-content-between">
                            <h5>Pengumuman Prodi Informatika</h5>
                            <a href="<?= site_url('prodi/inputpengumuman') ?>" class="btn btn-primary btn-sm mb-0">Buat Pengumuman</a>
                            <!-- <a class="btn btn-primary mx-2" href="pengumuman"> Buat Pengumuman</a> -->
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div>
                            <table class="table align-items-center" id="table">
                                <thead class="bg-gradient-primary text-white text-center">
                                    <th class=" font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Id Pengumuman</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Tanggal Mulai</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Tema</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Isi Pengumuman</th>
                                    </th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Tenggang Waktu</th>
                                    </th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Aksi</th>
                                    </th>
                                </thead>
                                <tbody class="text-sm">
                                <?php foreach ($listp as $pengumuman) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $pengumuman['id_pengumuman'] ?></td>
                                        <td><a href="<?= site_url('prodi/pengumuman/' . $pengumuman['id_pengumuman']) ?>"><?= $pengumuman['tanggal_mulai'] ?></a></td>
                                        <td><?= $pengumuman['tema'] ?></td>
                                        <td><?= $pengumuman['isi_pengumuman'] ?></td>
                                        <td><?= $pengumuman['tenggang_waktu'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('prodi/civitas/pengumuman/edit/' . $pengumuman['id_pengumuman']) ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="badge bg-danger px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url('prodi/civitas/pengumuman/delete/' . $pengumuman['id_pengumuman']) ?>')">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                    <!-- <tr class="text-center">
                                        <td>1</td>
                                        <td>Kamis,25 Januari 2002</td>
                                        <td>UAS</td>
                                        <td>Telat</td>
                                        <td>25-27 Januari 2000</td>
                                        <td class="text-center">
                                            <a class="badge bg-warning px-3 py-2" href="editpengumuman">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="badge bg-danger px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url() ?>')">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
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
            <p class="mb-0 text-secondary">
                Copyright ©
                <script>
                    document.write(new Date().getFullYear())
                </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
            </p>
        </div>
    </footer>
</div>