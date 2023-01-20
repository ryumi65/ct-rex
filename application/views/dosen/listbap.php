    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Absensi -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3">
                        <div>
                            <div class="d-inline d-flex justify-content-between">
                                <h5>Berita Acara Perkuliahan</h5>
                                <div class="d-inline d-flex justify-content-end">
                                    <a class="btn btn-primary btn-sm mx-2" href="formbap"> Buat BAP</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div>
                                <table class="table align-items-center" id="table">
                                    <thead class="bg-gradient-primary text-white">
                                        <th class=" font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            TM ke</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Hari/Tanggal/Jam</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            CP.Prodi</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            CP.Mata Kuliah</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Pokok Bahasan</th>
                                        </th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Evaluasi</th>
                                        </th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Mhs Hadir</th>
                                        </th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Aksi</th>
                                        </th>
                                    </thead>
                                    <tbody class="text-sm">
                                        <tr class="text-center">
                                            <td>1</td>
                                            <td>Jumat,25 Januari 2001</td>
                                            <td>Ilmu Inti Keprodian</td>
                                            <td class="text-wrap">Memahami ruang lingkup Akuntansi Manajemen, hubungannya dengan Akuntansi Biaya dan Akuntansi Keuangan. Selain itu mahasiswa memahami profesi & kode etik akuntan manajemen</td>
                                            <td>Role of Management Accountants in Organization</td>
                                            <td>Sinyal Putus</td>
                                            <td>80</td>
                                            <td class="text-center">
                                                <a class="badge bg-warning px-3 py-2" data-bs-toggle="">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a class="badge bg-danger px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick="deleteAlert('<?= site_url() ?>')">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-inline d-flex justify-content-end">
                                    <a class="btn btn-primary btn-sm mx-2" href="#">Cetak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>