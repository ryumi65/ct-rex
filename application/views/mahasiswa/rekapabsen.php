    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Jadwal Kuliah -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5>Presensi Mata Kuliah <?= $matkul['nama'] ?></h5>
                    </div>
                    <div class="card-body p-0 pb-3">
                        <div class="table-responsive">
                            <table class="table align-items-center w-100" id="table">
                                <thead>
                                    <tr class="bg-gradient-primary text-white">
                                        <th colspan="16" class="font-weight-bolder text-uppercase text-xs text-center">
                                            Pertemuan</th>
                                    </tr>
                                    <tr class="bg-gradient-primary text-white">
                                        <?php for ($i = 1; $i <= 16; $i++) : ?>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                <?php if ($i === 8) echo 'UTS';
                                                elseif ($i === 16) echo 'UAS';
                                                else echo $i; ?>
                                            </th>
                                        <?php endfor ?>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-100 text-dark text-sm">
                                    <tr>
                                        <?php for ($i = 0; $i < 16; $i++) {
                                            if (isset($presensi[$i])) {
                                                switch ($presensi[$i]) {
                                                    case 'Hadir':
                                                        echo '<td class="text-center"><span class="badge bg-primary">H</span></td>';
                                                        break;
                                                    case 'Izin':
                                                        echo '<td class="text-center"><span class="badge bg-info">I</span></td>';
                                                        break;
                                                    case 'Sakit':
                                                        echo '<td class="text-center"><span class="badge bg-dark">S</span></td>';
                                                        break;
                                                    case 'Alfa':
                                                        echo '<td class="text-center"><span class="badge bg-danger">A</span></td>';
                                                        break;
                                                }
                                            } else echo '<td class="text-center">-</td>';
                                        } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer p-3">
                        <h6>Keterangan</h6>
                        <div class="d-flex gap-3">
                            <p class="mb-0"><span class="badge bg-primary">H</span> = Hadir</p>
                            <p class="mb-0"><span class="badge bg-info">I</span> = Izin</p>
                            <p class="mb-0"><span class="badge bg-dark">S</span> = Sakit</p>
                            <p class="mb-0"><span class="badge bg-danger">A</span> = Alfa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- JQuery -->
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script>
        let table;

        $(document).ready(() => {
            table = $('#table').DataTable({
                columnDefs: [{
                    targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
                    orderable: false,
                    searchable: false,
                }],
                dom: "",
                paging: false,
                responsive: true,
            });
        });
    </script>