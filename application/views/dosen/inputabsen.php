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
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Input</li>
                    </ol>
                </nav>
            </div>

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5>Input Presensi <?= $matkul['nama'] ?></h5>
                    </div>
                    <?= form_open('dosen/inputpresensi/' . $matkul['id_matkul']) ?>
                    <div class="card-body px-3 py-0">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Pertemuan</label>
                                <select class="form-select" name="pertemuan" required>
                                    <option selected disabled value="">Pilih Pertemuan</option>
                                    <?php for ($i = 1; $i <= 16; $i++) : ?>
                                        <?php if ($pertemuan[$i - 1] === 'false') : ?>
                                            <li>
                                                <option value="<?= $i ?>">Pertemuan
                                                    <?php if ($i === 8) echo 'UTS';
                                                    elseif ($i === 16) echo 'UAS';
                                                    else echo $i; ?>
                                                </option>
                                            </li>
                                        <?php endif ?>
                                    <?php endfor ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Tanggal Pertemuan</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                            <table class="table table-sm table-striped align-items-center dt-responsive w-100" id="table">
                                <thead>
                                    <tr class="bg-gradient-primary text-white">
                                        <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
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
                                <tbody class="text-sm">
                                    <?php foreach ($listm as $mahasiswa) : ?>
                                        <tr>
                                            <td></td>
                                            <td class="d-flex d-inline text-wrap">
                                                <div hidden><?= $mahasiswa['nim'] ?> - </div>
                                                <img src="<?= base_url('assets/img/uploads/profile/curved.jpg') ?>" class="avatar avatar-sm me-3">
                                                <div>
                                                    <?= $mahasiswa['nama'] ?>
                                                    <p class="text-secondary text-xs mb-0"><?= $mahasiswa['nim'] ?></p>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Hadir-<?= $mahasiswa['nim'] ?>" value="Hadir" required>
                                                <label class="btn btn-outline-primary btn-sm px-2 py-1 m-0" for="Hadir-<?= $mahasiswa['nim'] ?>">H</label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Izin-<?= $mahasiswa['nim'] ?>" value="Izin" required>
                                                <label class="btn btn-outline-info btn-sm px-2 py-1 m-0" for="Izin-<?= $mahasiswa['nim'] ?>">I</label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Sakit-<?= $mahasiswa['nim'] ?>" value="Sakit" required>
                                                <label class="btn btn-outline-dark btn-sm px-2 py-1 m-0" for="Sakit-<?= $mahasiswa['nim'] ?>">S</label>
                                            </td>
                                            <td class="text-center">
                                                <input type="radio" class="btn-check" name="presensi-<?= $mahasiswa['nim'] ?>-<?= $mahasiswa['id_krs'] ?>" id="Alfa-<?= $mahasiswa['nim'] ?>" value="Alfa" required>
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
                columnDefs: [{
                    targets: [0, 2, 3, 4, 5],
                    orderable: false,
                    searchable: false,
                }],
                order: [1, 'asc'],
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