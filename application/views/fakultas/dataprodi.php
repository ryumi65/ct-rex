<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid py-3">

        <!-- Daftar Prodi -->
        <div class="col-12 my-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="mb-0">Daftar Prodi <?= $fakultas['nama'] ?></h5>
                </div>

                <!-- Card Prodi -->
                <div class="row g-4 mx-1 mt-2 mb-4">
                    <?php foreach ($listp as $prodi): ?>
                        <div class="col-4">
                            <div class="card h-100 shadow">
                                <div class="card-body my-2">
                                    <h5 class="card-title"><?= $prodi['nama'] ?></h5>
                                    <div class="d-flex justify-content-between">
                                        <p class="font-weight-normal mb-0">Jumlah Dosen</p>
                                        <p class="mb-0"><?= $prodi['jdosen'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="font-weight-normal mb-0">Jumlah Mahasiswa</p>
                                        <p class="mb-0"><?= $prodi['jmhs'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer py-3">

        <!-- Logo Medsos -->
        <div class="container mx-auto text-center my-2">
            <a href="https://www.youtube.com/channel/UCdo5vics8bEFAd9h6aghLYQ" target="_blank"
                class="text-secondary mx-3">
                <i class="text-lg fa-brands fa-youtube"></i>
            </a>
            <a href="https://id-id.facebook.com/universitasmuhammadiyahbandung" target="_blank"
                class="text-secondary mx-3">
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
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