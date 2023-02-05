   <?php
    $label1 = "FST";
    $label2 = "FSH";
    $label3 = "FEB";
    $label4 = "FAI";
    ?>

   <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
       <div class="container-fluid pt-6 pt-xl-0">

           <!-- Header -->
           <div class="page-header height-200 border-radius-xl mt-3" style="background-image: url('<?= base_url(); ?>assets/img/uploads/header/gedungdash.jpg'); background-position-y: 80%;"></div>
           <div class="card card-body blur shadow-blur mx-4 p-1 mt-n5 overflow-hidden">
               <div class="d-flex justify-content-between">
                   <div class="row gx-3">
                       <div class="col-auto my-auto">
                           <div class="avatar avatar-xl position-relative">
                               <img src="<?= base_url(); ?>assets/img/curved-images/curved10.jpg" alt="profile_image" class="w-75 h-75 border-radius-lg shadow-sm">
                           </div>
                       </div>
                   </div>
                   <div class="d-flex d-inline ms-auto">
                       <div>
                           <h6 class="mx-3 my-0"><u>Mahasiswa Aktif</u></h6>
                           <h3 class="text-center my-0">1</h3>
                           <h6 class="font-weight- text-center my-0">Mahasiswa</h6>
                       </div>
                       <div>
                           <h6 class="mx-3 my-0"><u>Dosen Aktif</u></h6>
                           <h3 class="text-center my-0">1</h3>
                           <h6 class="font-weight- text-center my-0">Dosen</h6>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Grafik -->
           <div class="row mt-4">
               <div class="col">
                   <div class="card z-index-2">
                       <div class="card-header pb-0">
                           <h5>Jumlah Mahasiswa dan Dosen</h5>
                       </div>
                       <div class="card-body p-2">
                           <div class="chart">
                               <canvas id="chart1" class="chart-canvas" height="300"></canvas>
                           </div>
                           <div>
                               <button class="btn btn-primary" onclick="updateLabel( '<?= $label1;  ?>' )"><?= $label1; ?></button>
                               <button class="btn btn-primary" onclick="updateLabel( '<?= $label2; ?>' )"><?= $label2; ?></button>
                               <button class="btn btn-primary" onclick="updateLabel( '<?= $label3; ?>' )"><?= $label3; ?></button>
                               <button class="btn btn-primary" onclick="updateLabel( '<?= $label4; ?>' )"><?= $label4; ?></button>
                           </div>
                       </div>
                   </div>
               </div>
               <div class=" col">
                   <div class="card z-index-2">
                       <div class="card-header pb-0">
                           <h5>Penghasilan Orang Tua Mahasiswa</h5>
                       </div>
                       <div class="card-body p-1">
                           <div class="chart">
                               <canvas id="chart3" class="chart-canvas1" height="300"></canvas>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <!-- grafik2 -->
           <div class="row mt-4">
               <div class=" col">
                   <div class="card z-index-2">
                       <div class="card-header pb-0">
                           <h5>Rerata Indeks Perkuliahan Kumulatif</h5>
                       </div>
                       <div class="card-body p-2">
                           <div class="chart">
                               <canvas id="chart2" class="chart-canvas2" height="300"></canvas>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- grafik3 -->
               <div class=" col">
                   <div class="card z-index-2">
                       <div class="card-header pb-0">
                           <h5>Penghasilan Orang </h5>
                       </div>
                       <div class="card-body p-2">
                           <div class="chart">
                               <canvas id="chart4" class="chart-canvas3" height="300"></canvas>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Beban Mengajar -->
           <div class="col-12 mb-md-0 my-4">
               <div class="card">
                   <div class="card-header pb-0">
                       <h5 class="mb-0">Beban Dosen Mengajar Tahun Akademik 2022 - 2023 Ganjil</h5>
                   </div>
                   <div class="card-body px-0 pb-2">
                       <div class="table-responsive">
                           <table class="table align-items-center mb-0">
                               <thead>
                                   <tr>
                                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           Kode Dosen</th>
                                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           Nama Dosen</th>
                                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           NIDN</th>
                                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           Status Dosen</th>
                                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           Beban SKS</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td>
                                           <div class="px-2 py-1">
                                               <h6 class="mb-0 text-sm">IF0201</h6>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="px-2 py-1">
                                               <h6 class="mb-0 text-sm">Rektivianto</h6>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="px-2 py-1">
                                               <h6 class="mb-0 text-sm">0000000000</h6>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="px-2 py-1">
                                               <h6 class="mb-0 text-sm">Aktif</h6>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="px-2 py-1">
                                               <h6 class="mb-0 text-sm">Aktif</h6>
                                           </div>
                                       </td>


                                   </tr>
                               </tbody>
                           </table>
                       </div>

                   </div>
               </div>
           </div>

           <!-- Jadwal Kuliah -->
           <div class="col-12 mb-md-0 my-4">
               <div class="card">
                   <div class="card-header pb-0">
                       <h5>Jadwal Perkuliahan Dosen Prodi Hari ini</h5>
                       <p class="text-sm mb-0">
                           <i class="fa fa-check text-info" aria-hidden="true"></i>
                           <span class="font-weight-bold ms-1">2 Mata Kuliah</span> hari ini
                       </p>
                   </div>
                   <div class="card-body px-0 pb-2">
                       <div class="table-responsive">
                           <table class="table align-items-center mb-0">
                               <thead>
                                   <tr>
                                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           Mata Kuliah</th>
                                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           Dosen Pengampu</th>
                                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           Ruangan</th>
                                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           Waktu</th>
                                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                           Jumlah Pertemuan</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td>
                                           <div class="px-2 py-1">
                                               <h6 class="mb-0 text-sm">Arsitektur Komputer</h6>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="px-2 py-1">
                                               <h6 class="mb-0 text-sm">Renal Sukma Widiarsa</h6>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="px-2 py-1">
                                               <h6 class="mb-0 text-sm">Lantai 6 Ruangan 7</h6>
                                           </div>
                                       </td>
                                       <td>
                                           <div class="px-2 py-1">
                                               <h6 class="mb-0 text-sm">08:00-10:00</h6>
                                           </div>
                                       </td>
                                       <td class="align-middle">
                                           <div class="progress-wrapper w-90 mx-auto">
                                               <div class="progress-info">
                                                   <div class="progress-percentage">
                                                       <span class="text-xs font-weight-bold">60%</span>
                                                   </div>
                                               </div>
                                               <div class="progress">
                                                   <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                               </div>
                                           </div>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Pengumuman -->
           <div class="row mt-4">

               <!-- Pengumuman 1 -->
               <div class="col-lg-6 mb-lg-0 mb-4">
                   <div class="card">
                       <div class="card-body p-3">
                           <div class="row">
                               <div class="col-lg-6">
                                   <div class="d-flex flex-column h-100">
                                       <h5 class="font-weight-bolder">Pengumuman</h5>
                                       <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et.</p>
                                       <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                                           Read More
                                           <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                       </a>
                                   </div>
                               </div>
                               <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                   <div class="bg-gradient-primary border-radius-lg h-100">
                                       <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                           <img class="w-100 position-relative z-index-2 pt-4" src="<?= base_url() ?>assets/img/illustrations/rocket-white.png" alt="rocket">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               <!-- Pengumuman 2 -->
               <div class="col-lg-6 mb-lg-0 mb-7">
                   <div class="card">
                       <div class="card-body p-3">
                           <div class="row">
                               <div class="col-lg-6">
                                   <div class="d-flex flex-column h-100">
                                       <h5 class="font-weight-bolder">Pengumumn</h5>
                                       <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et.</p>
                                       <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                                           Read More
                                           <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                       </a>
                                   </div>
                               </div>
                               <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                   <div class="bg-gradient-primary border-radius-lg h-100">
                                       <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                           <img class="w-100 position-relative z-index-2 pt-4" src="<?= base_url() ?>assets/img/illustrations/rocket-white.png" alt="rocket">
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <?php $this->load->view('_partials/footer') ?>
       </div>
   </div>

   <!--   Core JS Files   -->

   <script src="<?= base_url(); ?>assets/js/plugins/chartjs.min.js"></script>
   <script>
       const mauData = [5, 5, 3, 4];
       const mau1Data = [15, 15, 13, 14];
       const mauColor = 'rgba(152, 90,  0, 1)';
       const mau1Color = 'rgba(352, 90,  0, 1)';
       const mauBorder = 'rgba(152, 50, 0, 0.1)';
       const mau1Border = 'rgba(452, 50, 0, 0.1)';
       const makanData = [12, 19, 3, 5];
       const makanColor = 'rgba(100, 160,  0, 1)';
       const makanBorder = 'rgba(100, 100, 0, 1)';
       const apaData = [1, 5, 5, 3];
       const apaColor = 'rgba(0, 162,  0, 0.2)';
       const apaBorder = 'rgba(0, 162, 0, 1)';
       const skrgData = [15, 25, 35, 53];
       const skrgColor = 'rgba(162, 0,  0, 1)';
       const skrgBorder = 'rgba(162, 0, 0, 0.1)';
       const data = {
           labels: ['FST', 'FSH', 'FEB', 'FAI'],
           datasets: [{
               label: 'Dosen',
               data: mauData,
               backgroundColor: mauColor,
               borderColor: mauBorder,
               borderWidth: 1
           }, {
               label: 'Mahasiswa',
               data: mau1Data,
               backgroundColor: mau1Color,
               borderColor: mau1Border,
               borderWidth: 1
           }]
       };

       // config
       const config = {
           type: 'bar',
           data,
           options: {
               scales: {
                   y: {
                       beginAtZero: true
                   }
               }
           }
       }
       // render
       const chart1 = new Chart(
           document.getElementById('chart1'),
           config
       );

       function updateLabel(label) {
           chart1.data.datasets[0].label = label;
           if (label === 'FST') {
               chart1.data.datasets[0].data = FSTData;
               chart1.data.datasets[0].backgroundColor = FSTColor;
               chart1.data.datasets[0].borderColor = FSTBorder;
           }
           if (label === 'FSH') {
               chart1.data.datasets[0].data = FSHData;
               chart1.data.datasets[0].backgroundColor = FSHColor;
               chart1.data.datasets[0].borderColor = FSHBorder;
           }
           if (label === 'FEB') {
               chart1.data.datasets[0].data = FEBData;
               chart1.data.datasets[0].backgroundColor = FEBColor;
               chart1.data.datasets[0].borderColor = FEBBorder;
           }
           if (label === 'FAI') {
               chart1.data.datasets[0].data = FAIData;
               chart1.data.datasets[0].backgroundColor = FAIColor;
               chart1.data.datasets[0].borderColor = FAIBorder;
           }
           console.log(label);
           chart1.update();
       };
   </script>

   <script>
       var ctx3 = document.getElementById("chart2").getContext("2d");

       var gradientStroke1 = ctx3.createLinearGradient(0, 230, 0, 50);

       gradientStroke1.addColorStop(1, 'rgba(88, 219, 88, 0.2)');
       gradientStroke1.addColorStop(0.2, 'rgba(119, 230, 119, 0.1)');
       gradientStroke1.addColorStop(0.1, 'rgba(154, 230, 154, 0 )'); //purple colors

       var gradientStroke2 = ctx3.createLinearGradient(0, 230, 0, 50);

       gradientStroke2.addColorStop(1, 'rgba(66, 135, 245,0.2)');
       gradientStroke2.addColorStop(0.2, 'rgba(96, 151, 240,0.1)');
       gradientStroke2.addColorStop(0, 'rgba(195, 215, 247,0)'); //purple colors

       new Chart(ctx3, {
           type: "bar",
           data: {
               labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024"],
               datasets: [{
                   label: "Rerata IPK",
                   tension: 0.3,
                   borderWidth: 0,
                   pointRadius: 0,
                   borderColor: "#2cb72c",
                   borderWidth: 3,
                   backgroundColor: gradientStroke1,
                   fill: true,
                   data: [3.55, 4.00, 2.35, 3.00, 3.55, 2.50, 4.00, 2.30, 4.00],
                   maxBarThickness: 6

               }, ],
           },
           options: {
               responsive: true,
               maintainAspectRatio: false,
               plugins: {
                   legend: {
                       display: false,
                   }
               },
               interaction: {
                   intersect: false,
                   mode: 'index',
               },
               scales: {
                   y: {
                       grid: {
                           drawBorder: false,
                           display: true,
                           drawOnChartArea: true,
                           drawTicks: false,
                           borderDash: [5, 5]
                       },
                       ticks: {
                           display: true,
                           padding: 10,
                           color: '#b2b9bf',
                           font: {
                               size: 11,
                               family: "Open Sans",
                               style: 'normal',
                               lineHeight: 2
                           },
                       }
                   },
                   x: {
                       grid: {
                           drawBorder: false,
                           display: false,
                           drawOnChartArea: false,
                           drawTicks: false,
                           borderDash: [5, 5]
                       },
                       ticks: {
                           display: true,
                           color: '#b2b9bf',
                           padding: 20,
                           font: {
                               size: 11,
                               family: "Open Sans",
                               style: 'normal',
                               lineHeight: 2
                           },
                       }
                   },
               },
           },
       });
   </script>

   <script>
       var ctx4 = document.getElementById("chart3").getContext("2d");

       var gradientStroke1 = ctx4.createLinearGradient(0, 230, 0, 50);

       gradientStroke1.addColorStop(1, 'rgba(88, 219, 88, 0.2)');
       gradientStroke1.addColorStop(0.2, 'rgba(119, 230, 119, 0.1)');
       gradientStroke1.addColorStop(0.1, 'rgba(154, 230, 154, 0 )'); //purple colors

       var gradientStroke2 = ctx4.createLinearGradient(0, 230, 0, 50);

       gradientStroke2.addColorStop(1, 'rgba(66, 135, 245,0.2)');
       gradientStroke2.addColorStop(0.2, 'rgba(96, 151, 240,0.1)');
       gradientStroke2.addColorStop(0, 'rgba(195, 215, 247,0)'); //purple colors

       new Chart(ctx4, {
           type: "polarArea",
           data: {
               labels: ["2016", "May", "Jun", "Jul,"],
               datasets: [{
                       label: "Perempuan",
                       tension: 0.3,
                       borderWidth: 0,
                       pointRadius: 0,
                       borderColor: "#2cb72c",
                       borderWidth: 3,
                       backgroundColor: gradientStroke1,
                       fill: true,
                       data: [10, ],
                       maxBarThickness: 6

                   },
                   {
                       label: "Laki-Laki",
                       tension: 0.4,
                       borderWidth: 0,
                       pointRadius: 0,
                       borderColor: "#3a416f",
                       borderWidth: 3,
                       backgroundColor: gradientStroke2,
                       fill: true,
                       data: [30, ],
                       maxBarThickness: 6
                   },
                   {
                       label: "Laki-Laki",
                       tension: 0.4,
                       borderWidth: 0,
                       pointRadius: 0,
                       borderColor: "#9c0606",
                       borderWidth: 3,
                       backgroundColor: gradientStroke2,
                       fill: true,
                       data: [30, ],
                       maxBarThickness: 6
                   },
               ],
           },
           options: {
               responsive: true,
               maintainAspectRatio: false,
               plugins: {
                   legend: {
                       display: false,
                   }
               },
               interaction: {
                   intersect: false,
                   mode: 'index',
               },
               scales: {
                   y: {
                       grid: {
                           drawBorder: false,
                           display: true,
                           drawOnChartArea: true,
                           drawTicks: false,
                           borderDash: [5, 5]
                       },
                       ticks: {
                           display: true,
                           padding: 10,
                           color: '#b2b9bf',
                           font: {
                               size: 11,
                               family: "Open Sans",
                               style: 'normal',
                               lineHeight: 2
                           },
                       }
                   },
                   x: {
                       grid: {
                           drawBorder: false,
                           display: false,
                           drawOnChartArea: false,
                           drawTicks: false,
                           borderDash: [5, 5]
                       },
                       ticks: {
                           display: true,
                           color: '#b2b9bf',
                           padding: 20,
                           font: {
                               size: 11,
                               family: "Open Sans",
                               style: 'normal',
                               lineHeight: 2
                           },
                       }
                   },
               },
           },
       });
   </script>

   <script>
       var ctx5 = document.getElementById("chart4").getContext("2d");

       var gradientStroke1 = ctx5.createLinearGradient(0, 230, 0, 50);

       gradientStroke1.addColorStop(1, 'rgba(88, 219, 88, 0.2)');
       gradientStroke1.addColorStop(0.2, 'rgba(119, 230, 119, 0.1)');
       gradientStroke1.addColorStop(0.1, 'rgba(154, 230, 154, 0 )'); //purple colors

       var gradientStroke2 = ctx5.createLinearGradient(0, 230, 0, 50);

       gradientStroke2.addColorStop(1, 'rgba(66, 135, 245,0.2)');
       gradientStroke2.addColorStop(0.2, 'rgba(96, 151, 240,0.1)');
       gradientStroke2.addColorStop(0, 'rgba(195, 215, 247,0)'); //purple colors

       new Chart(ctx5, {
           type: "radar",
           data: {
               labels: ["2016", "May", "Jun", "Jul,"],
               datasets: [{
                       label: "Perempuan",
                       tension: 0.3,
                       borderWidth: 0,
                       pointRadius: 0,
                       borderColor: "#2cb72c",
                       borderWidth: 3,
                       backgroundColor: gradientStroke1,
                       fill: true,
                       data: [10, ],
                       maxBarThickness: 6

                   },
                   {
                       label: "Laki-Laki",
                       tension: 0.4,
                       borderWidth: 0,
                       pointRadius: 0,
                       borderColor: "#3a416f",
                       borderWidth: 3,
                       backgroundColor: gradientStroke2,
                       fill: true,
                       data: [30, ],
                       maxBarThickness: 6
                   },
                   {
                       label: "Laki-Laki",
                       tension: 0.4,
                       borderWidth: 0,
                       pointRadius: 0,
                       borderColor: "#9c0606",
                       borderWidth: 3,
                       backgroundColor: gradientStroke2,
                       fill: true,
                       data: [30, ],
                       maxBarThickness: 6
                   },
               ],
           },
           options: {
               responsive: true,
               maintainAspectRatio: false,
               plugins: {
                   legend: {
                       display: false,
                   }
               },
               interaction: {
                   intersect: false,
                   mode: 'index',
               },
               scales: {
                   y: {
                       grid: {
                           drawBorder: false,
                           display: true,
                           drawOnChartArea: true,
                           drawTicks: false,
                           borderDash: [5, 5]
                       },
                       ticks: {
                           display: true,
                           padding: 10,
                           color: '#b2b9bf',
                           font: {
                               size: 11,
                               family: "Open Sans",
                               style: 'normal',
                               lineHeight: 2
                           },
                       }
                   },
                   x: {
                       grid: {
                           drawBorder: false,
                           display: false,
                           drawOnChartArea: false,
                           drawTicks: false,
                           borderDash: [5, 5]
                       },
                       ticks: {
                           display: true,
                           color: '#b2b9bf',
                           padding: 20,
                           font: {
                               size: 11,
                               family: "Open Sans",
                               style: 'normal',
                               lineHeight: 2
                           },
                       }
                   },
               },
           },
       });
   </script>