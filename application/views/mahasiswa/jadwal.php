    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('mahasiswa') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Jadwal Kuliah</li>
                    </ol>
                </nav>
            </div>

            <!-- Jadwal Kuliah -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between p-3">
                        <h5>Jadwal Kuliah <?= $mahasiswa['nama'] ?></h5>
                        <a href="#" class="btn btn-primary btn-sm mb-0">Cetak</a>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <?php for ($i = 0; $i < count($listh); $i++) : ?>
                            <?php if (count($listj[$listh[$i]]) > 0) : ?>
                                <h6><?= $listh[$i] ?></h6>
                                <table class="table align-items-center w-100" id="table<?= $i ?>">
                                    <thead>
                                        <tr class="bg-gradient-primary text-white">
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Nama MK</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Dosen Pengampu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Waktu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Ruangan</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-100 text-dark text-sm">
                                        <?php foreach ($listj[$listh[$i]] as $jadwal) : ?>
                                            <tr>
                                                <td class="text-wrap w-25"><?= $jadwal['nama'] ?></td>
                                                <td class="text-wrap w-25"><?= $jadwal['dosen'] ?></td>
                                                <td><?= $jadwal['waktu'] ?></td>
                                                <td><?= $jadwal['ruangan'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= site_url('mahasiswa/perkuliahan/presensi/' . $jadwal['id_matkul']) ?>" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Presensi">
                                                        <i class="fa-solid fa-book-bookmark"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <hr class="bg-dark">
                            <?php endif ?>
                        <?php endfor ?>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- JQuery -->
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script>
        for (let i = 0; i < 7; i++) {

            $(document).ready(() => {
                $(`#table${i}`).DataTable({
                    columnDefs: [{
                        targets: [4],
                        orderable: false,
                        searchable: false,
                    }],
                    dom: "",
                    paging: false,
                    order: [2, 'asc'],
                    responsive: true,
                });
            });
        }
    </script>