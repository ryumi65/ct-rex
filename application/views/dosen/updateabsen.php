    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen/perkuliahan/mata-kuliah') ?>"><u>Perkuliahan</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen/perkuliahan/presensi/' . $matkul['id_matkul']) ?>"><u>Presensi</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Ubah</li>
                    </ol>
                </nav>
            </div>

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5>Ubah Presensi <?= $matkul['nama'] ?> Pertemuan
                            <?php if ($pertemuan == 8) echo 'UTS';
                            if ($pertemuan == 16) echo 'UAS'; ?></h5>
                    </div>
                    <?= form_open('dosen/updatepresensi/' . $matkul['id_matkul'] . '/' . $pertemuan) ?>
                    <div class="card-body px-3 py-0">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label>Tanggal Pertemuan</label>
                                <input type="date" name="tanggal" class="form-control" value="<?= $tanggal ?>">
                            </div>
                            <table class="table align-items-center w-100" id="table">
                                <thead>
                                    <tr class="bg-gradient-primary text-white">
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                            NIM</th>
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama Mahasiswa</th>
                                        <th colspan="4" class="font-weight-bolder text-uppercase text-xs text-center" style="width: 10%">
                                            Presensi</th>
                                    </tr>
                                    <tr class="bg-gradient-primary text-white">
                                        <th class="p-1">
                                            <div class="form-check d-flex justify-content-center">
                                                <input class="form-check-input" type="checkbox" name="cb" onchange="cbCheckAll(this, 'cb', 'table', 'Hadir')">
                                            </div>
                                        </th>
                                        <th class="p-1">
                                            <div class="form-check d-flex justify-content-center">
                                                <input class="form-check-input" type="checkbox" name="cb" onchange="cbCheckAll(this, 'cb', 'table', 'Izin')">
                                            </div>
                                        </th>
                                        <th class="p-1">
                                            <div class="form-check d-flex justify-content-center">
                                                <input class="form-check-input" type="checkbox" name="cb" onchange="cbCheckAll(this, 'cb', 'table', 'Sakit')">
                                            </div>
                                        </th>
                                        <th class="p-1">
                                            <div class="form-check d-flex justify-content-center">
                                                <input class="form-check-input" type="checkbox" name="cb" onchange="cbCheckAll(this, 'cb', 'table', 'Alfa')">
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-100 text-dark text-sm">
                                    <?php foreach ($listm as $mahasiswa) :
                                        foreach ($listp as $presensi) {
                                            if ($mahasiswa['id_krs'] === $presensi['id_krs']) {
                                                $hadir_check = '';
                                                $izin_check = '';
                                                $sakit_check = '';
                                                $alfa_check = '';

                                                switch ($presensi['kehadiran']) {
                                                    case 'Hadir':
                                                        $hadir_check = 'checked';
                                                        break;
                                                    case 'Izin':
                                                        $izin_check = 'checked';
                                                        break;
                                                    case 'Sakit':
                                                        $sakit_check = 'checked';
                                                        break;
                                                    case 'Alfa':
                                                        $alfa_check = 'checked';
                                                        break;
                                                }
                                            }
                                        } ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $mahasiswa['nim'] ?></td>
                                            <td class="text-wrap"><?= $mahasiswa['nama'] ?></td>
                                            <td class="text-center">
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Hadir-<?= $mahasiswa['nim'] ?>" value="Hadir" required <?= $hadir_check ?>>
                                                <label class="btn btn-outline-primary btn-sm px-2 py-1 m-0" for="Hadir-<?= $mahasiswa['nim'] ?>">H</label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Izin-<?= $mahasiswa['nim'] ?>" value="Izin" required <?= $izin_check ?>>
                                                <label class="btn btn-outline-info btn-sm px-2 py-1 m-0" for="Izin-<?= $mahasiswa['nim'] ?>">I</label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Sakit-<?= $mahasiswa['nim'] ?>" value="Sakit" required <?= $sakit_check ?>>
                                                <label class="btn btn-outline-dark btn-sm px-2 py-1 m-0" for="Sakit-<?= $mahasiswa['nim'] ?>">S</label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Alfa-<?= $mahasiswa['nim'] ?>" value="Alfa" required <?= $alfa_check ?>>
                                                <label class="btn btn-outline-danger btn-sm px-2 py-1 m-0" for="Alfa-<?= $mahasiswa['nim'] ?>">A</label>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex inline align-items-end justify-content-between p-3">
                        <div>
                            <h6>Keterangan</h6>
                            <div class="d-flex gap-3">
                                <p class="mb-0"><span class="badge bg-primary">H</span> = Hadir</p>
                                <p class="mb-0"><span class="badge bg-info">I</span> = Izin</p>
                                <p class="mb-0"><span class="badge bg-dark">S</span> = Sakit</p>
                                <p class="mb-0"><span class="badge bg-danger">A</span> = Alfa</p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mb-0">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- Check All -->
    <script src="<?= base_url('assets/js/check-all.js') ?>"></script>

    <!-- JQuery -->
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script>
        let table;

        $(document).ready(() => {

            table = $('#table').DataTable({

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