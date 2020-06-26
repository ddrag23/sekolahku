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
          <a href="<?= site_url('ppdb');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
          </p>
        </div>
        </div>
         <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $aktif;?></div>
          <h3>Siswa</h3>
          <p>
          <a href="<?= site_url('siswa');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
         </p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $mutasi;?></div>
          <h3>Siswa Mutasi</h3>
          <p>
          <a href="<?= site_url('siswa/siswaMutasi');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
          </p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $alumni;?></div>
          <h3>Alumni</h3>
          <p>
          <a href="<?= site_url('siswa/alumni');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
          </p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count"><?= $lulus;?></div>
          <h3>Peserta Didik Baru</h3>
          <p>
          <a href="<?= site_url('ppdb');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
          </p>
        </div>
        </div>
         <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Bar graph <small>Sessions</small></h2>
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
                <canvas id="chartBar"></canvas>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    <!--end content-->


<?php include 'application/views/template/footer.php';?>
