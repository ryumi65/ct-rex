    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Beban Mengajar -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="mb-0">Daftar Dosen Prodi <?= $prodi['nama'] ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            NIK</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama Dosen</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Jenis Kelamin</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            NIDN</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Status</th>
                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                            Aksi</th>
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

        <!-- Footer -->
        <footer class="footer pb-3">

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
                <p class="mb-0 text-secondary text-xs">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
                </p>
            </div>
        </footer>
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
                }, {
                    "targets": [6],
                    "data": null,
                    "render": (data, type, row, meta) => {
                        return '<div class="text-center"><a href="<?= site_url('prodi/civitas/data-dosen/edit/') ?>' + row['1'] + '" class="btn btn-warning mx-1 mb-0"><i class="fa-solid fa-pen-to-square"></i></a>' +
                            '<a href="<?= site_url('prodi/civitas/data-dosen/delete/') ?>' + row['1'] + '" class="btn btn-danger mx-1 mb-0"><i class="fa-solid fa-trash-can"></i></a></div>';
                    }
                }],

            });

        });
    </script>