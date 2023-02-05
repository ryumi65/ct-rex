    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="mb-0">Daftar Prodi <?= $fakultas['nama'] ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            ID Prodi</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama Prodi</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Jumlah Mahasiswa</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Jumlah Dosen</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm">
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/datatables.min.js"></script>
    <script>
        let table;

        $(document).ready(() => {

            table = $('#table').DataTable({

                "deferRender": true,
                "responsive": true,
                "serverSide": true,
                "order": [],

                "ajax": {
                    "url": "<?= site_url('prodi/ajax_list/dosen') ?>",
                    "type": "POST"
                },

                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }, {
                    "targets": [2],
                    "data": null,
                    "render": (data, type, row, meta) => {
                        return '<a href="data-dosen/' + row['1'] + '">' + row['2'] + '</a>';
                    }
                }],

            });

        });
    </script>