<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-5 pt-xl-0">

        <!-- Absensi -->
        <div class="col-12 my-3">
            <div class="card">
                <div class="card-header p-3 pb-0">
                    <div class="d-flex justify-content-between">
                        <h5>Presensi</h5>
                        <a href="" class="btn btn-primary btn-sm">input Absen</a>
                    </div>
                </div>
                <div class="card-body p-3 pt-0">
                    <div class="table-responsive">
                        <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                            <thead>
                                <tr class="bg-gradient-primary text-white">
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                        NIM</th>
                                    <th rowspan="2" class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Mahasiswa</th>
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
                                    <td></td>
                                    <td>200102011</td>
                                    <td>renal</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer py-3">

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
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
<script>
    let table;

    $(document).ready(() => {

        table = $('#table').DataTable({

            dom: "",
            order: [1, 'asc'],

            columnDefs: [{
                targets: [0],
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