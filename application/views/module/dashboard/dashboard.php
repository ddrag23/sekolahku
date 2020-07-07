<?php include 'application/views/template/header.php';?>
<?php include 'application/views/template/navbar.php';?>

<div id="sukses" data-flashdata="<?= $this->session->flashdata('sukses');?>" data-name="<?= $this->fungsi->user_login()->username;?>"></div>
     <!-- page content -->
      <div class="right_col" role="main">
        <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12" >
          <div class="well" style="overflow:auto; text-align:center;">
          <h2><strong> Selamat Datang <?= $this->fungsi->user_login()->username;?></strong></h2>
          <h3></h3>
          <span id="systime" style="font-size:30px; font-weight:600" onload="showTime()"></span>
          <span id="sysdate" style="font-size:30px; font-weight:600" onload="showDate()"></span>
           </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $admin;?></div>
          <h3>Admin</h3>
          <p>
          <a href="<?= site_url('user');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
         </p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $panitia;?></div>
          <h3>Panitia</h3>
          <p>
          <a href="<?= site_url('user/listPanitia');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
          </p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $guru;?></div>
          <h3>Guru</h3>
          <p>
          <a href="<?= site_url('guru');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
          </p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $ppdb;?></div>
          <h3>Pendaftar</h3>
          <p>
          <a href="<?= site_url('halaman/ppdb/daftar-ppdb');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
          </p>
        </div>
        </div>
         <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $aktif;?></div>
          <h3>Siswa</h3>
          <p>
          <a href="<?= site_url('halaman/siswa');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
         </p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $mutasi;?></div>
          <h3>Siswa Mutasi</h3>
          <p>
          <a href="<?= site_url('halaman/siswa/mutasi');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
          </p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $alumni;?></div>
          <h3>Alumni</h3>
          <p>
          <a href="<?= site_url('halaman/siswa/alumni');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
          </p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $lulus;?></div>
          <h3>Peserta Didik Baru</h3>
          <p>
          <a href="<?= site_url('halaman/ppdb/daftar-ppdb');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
          </p>
        </div>
        </div>
          <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Grafik Pendaftar Perhari</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="barPerhari"></canvas>
              </div>
            </div>
          </div>
           <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Grafik Pembayaran PPDB </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="barPembayaran"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Grafik Gelombang Pendaftaran </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="barGelombang"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Grafik Seleksi  </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="barSeleksi"></canvas>
              </div>
            </div>
          </div>
           <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Grafik Daftar Ulang </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="barDu"></canvas>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    <!--end content-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


<script type="text/javascript">
//pembayaran start
var perhari = document.getElementById('barPerhari').getContext('2d');
var chartPerhari = new Chart(perhari, {
    type: 'bar',
    data: {
        labels: <?= $rekap_tanggal; ?>,
        datasets: [{
            label: '# Pendaftar',
            data: <?= $dataPerhari; ?>,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
               
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
// pembayaran end
  //pembayaran start
var bayar = document.getElementById('barPembayaran').getContext('2d');
var chartPembayaran = new Chart(bayar, {
    type: 'bar',
    data: {
        labels: ['Lunas', 'Belum Lunas'],
        datasets: [{
            label: '# Pembayaran',
            data: [<?= json_encode($lunas); ?>,<?= json_encode($belumLunas); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
// pembayaran end
//gelombang start
var ctx = document.getElementById('barGelombang').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Gelombang 1', 'Gelombang 2'],
        datasets: [{
            label: '# Gelombang',
            data: [<?= json_encode($gelombang1); ?>,<?= json_encode($gelombang2); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
// gelombang end
  //seleksi start
var seleksi = document.getElementById('barSeleksi').getContext('2d');
var chartSeleksi = new Chart(seleksi, {
    type: 'bar',
    data: {
        labels: ['Lulus', 'Tidak Lulus'],
        datasets: [{
            label: '# Status Seleksi',
            data: [<?= json_encode($lulus); ?>,<?= json_encode($tidakLulus); ?>],
            backgroundColor: [
                'rgba(153, 102, 255, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(153, 102, 255, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
// seleksi end
//daftarUlang start
var daftarUlang = document.getElementById('barDu').getContext('2d');
var chartDaftarUlang = new Chart(daftarUlang, {
    type: 'bar',
    data: {
    labels: <?= $rekapDaftarUlang;?>,
        datasets: [{
            label: '# Siswa Daftar Ulang',
                data: <?= $dataDaftarUlang;?>,
            backgroundColor: [
                'rgba(153, 102, 255, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(153, 102, 255, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
//daftarUlang end
</script>


<?php include 'application/views/template/footer.php';?>
