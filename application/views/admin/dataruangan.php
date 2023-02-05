    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Daftar Matkul dari KRS -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between">
                            <h6>Data Ruangan</h6>
                        </div>
                        <div><a href="<?php echo site_url('admin/inputruangan'); ?>" <button type="button">Tambah Data ruangan</button>

                        </div>
                        <table class="table align-items-center w-100" id="table">
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
                            <tbody class="bg-gray-100 text-dark text-sm">
                                <?php foreach ($listr as $ruangan) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $ruangan['id_ruangan'] ?></td>
                                        <td><a href="<?= site_url('admin/dataruangan' . $ruangan['id_ruangan']) ?>"><?= $ruangan['nama'] ?></a></td>
                                        <td><?= $ruangan['nomor'] ?></td>
                                        <td><?= $ruangan['jenis'] ?></td>
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

        <?php $this->load->view('_partials/footer') ?>
    </div>