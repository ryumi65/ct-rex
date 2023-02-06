<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-6 pt-xl-0">

        <!-- Navigasi -->
        <div class="d-flex d-inline mt-4 mb-3">
            <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-gray-100 my-0 py-0">
                    <li class="breadcrumb-item"><a href="<?= site_url('mahasiswa') ?>"><u>Home</u></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Perwalian</li>
                </ol>
            </nav>
        </div>


        <div class="col-12 my-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between p-3">
                    <h5 class="mb-0">Catatan Studi </h5>
                    <a href="<?= site_url('mahasiswa/tambahperwalian') ?>" class="btn btn-primary btn-sm mb-0">Tambah Perwalian</a>
                </div>
                <div class="card-body p-3 pt-0">
                    <div>
                        <table class="table align-items-center w-100" id="table">
                            <thead class="bg-gradient-primary text-white text-center">
                                <th class=" font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                    No</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Hari, Tanggal</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Masalah</th>
                                <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                    Saran Pembimbing</th>
                                <th class="font-weight-bolder text-uppercase text-xs text-center">
                                    Aksi</th>
                            </thead>
                            <tbody class="bg-gray-100 text-dark text-sm-center">
                                <tr>
                                    <td></td>
                                    <td>Sabtu, 26 Februari 2020</td>
                                    <td>Gapunya Duit</td>
                                    <td>Main Slot</td>
                                    <td class="text-center">
                                        <a href="#" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a class="badge bg-danger cursor-pointer px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick"">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Sabtu, 26 Februari 2020</td>
                                    <td>Gapunya Duit</td>
                                    <td>Main Slot</td>
                                    <td class="text-center">
                                        <a href="#" class="badge bg-warning px-3 py-2" data-bs-toggle="tooltip" title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a class="badge bg-danger cursor-pointer px-3 py-2" data-bs-toggle="tooltip" title="Hapus" onclick"">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
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

<!-- Alert -->
<script defer src="<?= base_url(); ?>assets/js/alert.js"></script>

<!-- JQuery -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
<script>
    let table;

    $(document).ready(() => {

        table = $('#table').DataTable({

            responsive: true,
            order: [3, 'asc'],

            columnDefs: [{
                targets: [0, 6],
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