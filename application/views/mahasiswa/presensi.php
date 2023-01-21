    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Jadwal Kuliah -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5>Presensi Mata Kuliah <?= $matkul['nama'] ?></h5>
                    </div>
                    <div class="card-body p-0 pb-3">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                <thead>
                                    <tr class="bg-gradient-primary text-white">
                                        <th colspan="16" class="font-weight-bolder text-uppercase text-xs text-center">
                                            Pertemuan</th>
                                    </tr>
                                    <tr class="bg-gradient-primary text-white">
                                        <?php for ($i = 1; $i <= 16; $i++) : ?>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                <?= $i ?>
                                            </th>
                                        <?php endfor ?>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
                                    <tr>
                                        <?php for ($i = 0; $i < 16; $i++) : ?>
                                            <?php if (isset($presensi[$i])) : ?>
                                                <td><?= $presensi[$i] ?></td>
                                            <?php else : ?>
                                                <td>-</td>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        let table;

        $(document).ready(() => {

            table = $('#table').DataTable({

                dom: "",
                responsive: true,
                order: [0, 'asc'],
            });
        });
    </script>