<?php include 'application/views/template/header.php';?>
<?php include 'application/views/template/navbar.php';?>

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
          <div class="count"><?= $akun;?></div>
          <h3>Admin</h3>
          <p>
          <a href="<?= site_url('user');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
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
          <div class="count"><?= $siswa;?></div>
          <h3>Siswa</h3>
          <p>
          <a href="<?= site_url('siswa');?>">Lihat Selengkapnya <i class="fa fa-arrow-right"></i></a>
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
        </div>
      </div>
    <!--end content-->


<?php include 'application/views/template/footer.php';?>
