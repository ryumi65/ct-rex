    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Form KRS -->
            <!-- <div class="col-12 my-3">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between">
                            <h6> Kartu Rencana Studi</h6>
                            <div>
                                <a href="<?= site_url('mahasiswa/formkrs') ?>" class="btn btn-primary btn-sm ">Tambah KRS</a>
                            </div>
                        </div>
                        <div class="mb-2">
                            <select class="form-select" name="nik" required>
                                <option selected disabled>Pilih Tahun Ajaran</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mb-2">
                                <select class="form-select" name="nik" required>
                                    <option selected disabled>Pilih Semester</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


            <!-- Daftar Matkul dari KRS -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between">
                            <h6> Kartu Rencana Studi</h6>
                            <div>
                                <a href="<?= site_url('mahasiswa/formkrs') ?>" class="btn btn-primary btn-sm ">Tambah KRS</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <ul class="nav nav-pills mx-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane pills\" aria-selected="true">Semester 1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Semester 2</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Semester 3</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="call-tab" data-bs-toggle="tab" data-bs-target="#call-tab-pane" type="button" role="tab" aria-controls="call-tab-pane" aria-selected="false">Semester 4</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Semester 5</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                No.</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                ID Matkul</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Nama Matkul</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Total SKS</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Semester</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Kelas</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Dosen Pengampu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Mode Kuliah</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Waktu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Ruang</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                No.</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                ID Matkul</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Nama Matkul</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Total SKS</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Semester</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Kelas</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Dosen Pengampu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Mode Kuliah</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Waktu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Ruang</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                No.</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                ID Matkul</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Nama Matkul</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Total SKS</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Semester</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Kelas</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Dosen Pengampu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Mode Kuliah</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Waktu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Ruang</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="call-tab-pane" role="tabpanel" aria-labelledby="call-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                No.</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                ID Matkul</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Nama Matkul</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Total SKS</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Semester</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Kelas</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Dosen Pengampu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Mode Kuliah</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Waktu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs text-center">
                                                Ruang</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0"></div>
                    </div>
                    <div class="dropdown d-flex justify-content-end mx-3">
                        <button class="btn btn-success btn dropdown-toggl btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"> Cetak</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="javascript:;">Makan</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Minum</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Tidur </a></li>
                        </ul>
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