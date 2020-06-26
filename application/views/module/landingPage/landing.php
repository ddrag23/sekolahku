<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="<?= base_url()?>assets/template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/template/vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/template/build/css/mystyle.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>

<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-light">
<div class="container">
  <a class="navbar-brand" href="#">mi hasyim asy'ari</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#gelombang">Gelombang</a>
      <a class="nav-item nav-link" href="#persyaratan">Persyartan</a>
      <a class="nav-item nav-link" href="#">Pengumuman</a>
      <a class="nav-item btn btn-primary tombol" href="#follow">Ikuti Kami</a>
    </div>
  </div>
</div>
</nav>
<!-- navbar end -->

<!-- jumbotron start -->
<div id="home" class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">MI HASYIM ASY'ARI </h1>
    <p class="lead">Untuk peserta didik baru bisa mendaftar dibawah ini atau jika sudah mempunyai akun bisa langsung klik tombol masuk </p>
    <div class="btn-group">
        <a href="<?=site_url('auth');?>" class="btn btn-primary">Masuk</a>
        <a href="<?=site_url('auth/register');?>" class="btn btn-success">Daftar</a>
    </div>
  </div>
</div>
<!-- jumbotron end -->

<!-- container start-->
<div class="container">

    <!--info panel start-->
    <div id="gelombang" class="row justify-content-center">
       <div class="col-7 info-panel">
        <div class="row">
            <div class="col-md">
                <img src="<?= base_url('assets/template/production/images/paper.png');?>" alt="Gelombang 1" class="float-left">
                <h4>Gelombang I</h4>
                <p>Mulai : 24-mei-2020</p>
                <p>Akhir : 28-juni-2020</p>
                <p>Biaya : 100.000</p>
            </div>
            <div class="col-md">
                <img src="<?= base_url('assets/template/production/images/paper1.png');?>" alt="" class="float-left">
                <h4>Gelombang II</h4>
                <p>Mulai : 24-mei-2020</p>
                <p>Akhir : 28-juni-2020</p>
                <p>Biaya : 100.000</p>
            </div>
        </div>
       </div> 
    </div>
    <!--info panel end-->

    <!-- info syarat pendaftaran start-->
    <div id="persyaratan" class="row info-syarat">
        <div class="col-lg-6">
            <img src="<?= base_url('assets/template/production/images/com.jpg');?>" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6">
            <h3>Syarat Pendaftaran</h3>
            <table>
                <tr>
                    <td>1.</td>
                    <td>Mengisi Formulir Pendaftaran</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Foto Copy STTB TK</td>
                    <td>:</td>
                    <td>3 Lembar</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Foto Copy Akte Kelahiran</td>
                    <td>:</td>
                    <td>3 Lembar</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Foto Copy Kartu Keluarga</td>
                    <td>:</td>
                    <td>3 Lembar</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Pas Foto Berwarna 3 x 4</td>
                    <td>:</td>
                    <td>3 Lembar</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- info syarat pendaftaran end-->

    <!--info Prestasi start-->
    <div class="row info-prestasi">
        <div class="col-lg-6">
            <h3>Prestasi</h3>
            <table>
                <tr>
                    <td>Finalis Olimpiade SAINS Kuark</td>
                    <td>:</td>
                    <td>Tingkat Nasional</td>
                </tr>
                <tr>
                    <td>Juara II Olimpiade SAINS</td>
                    <td>:</td>
                    <td>se-Jawa & Bali</td>
                </tr>
                <tr>
                    <td>Juara III Olimpiade Matematika</td>
                    <td>:</td>
                    <td>Tingkat Provinsi</td>
                </tr>
                <tr>
                    <td>Juara I Lomba Gerak Jalan</td>
                    <td>:</td>
                    <td>Tingkat Kabupaten</td>
                </tr>
                <tr>
                    <td>Juara I Lomba Senam Santri</td>
                    <td>:</td>
                    <td>Tingkat Kabupaten</td>
                </tr>
                <tr>
                    <td>Juara I Lomba Puisi</td>
                    <td>:</td>
                    <td>Tingkat Kabupaten</td>
                </tr>
                <tr>
                    <td>Juara II Pidato Bahasa Arab</td>
                    <td>:</td>
                    <td>Tingkat Kabupaten</td>
                </tr>
                <tr>
                    <td>Juara I Lomba MIPA</td>
                    <td>:</td>
                    <td>Tingkat Kecamatan</td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6">
            <img src="<?= base_url('assets/template/production/images/prestasi.jpg');?>" alt="" class="img-fluid">
        </div>
    </div>
    <!--info Prestasi end-->

    <!--kontak kami start-->
    <div id="follow" class="row contact-us">
        <div class="col-lg-6">
            <img src="<?= base_url('assets/template/production/images/kontak.jpg');?>" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6">
            <h3>Ikuti Kami</h3>
            <ul>
                <li>
                    <a href=""><img src="<?= base_url('assets/template/production/images/facebook.png');?>" class="img-fluid">&nbsp; Facebook</a>
                </li>
                <li>
                    <a href=""><img src="<?= base_url('assets/template/production/images/instagram.png');?>" class="img-fluid">&nbsp; Instagram</a>
                </li>
                <li>
                    <a href=""><img src="<?= base_url('assets/template/production/images/email.png');?>" class="img-fluid">&nbsp; Email</a>
                </li>
                <li>
                    <a href=""><img src="<?= base_url('assets/template/production/images/whatsapp.png');?>" class="img-fluid">&nbsp; Whatsapp</a>
                </li>
            </ul>
        </div>
    </div>
    <!--kontak kami end-->

    <!--stiky start-->
    <div class="sticky-top">
        <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="sticky" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
        </a>
    </div>
    <!--stiky end-->

</div>
<!-- container end-->

<div class="pembatas"></div>

<!--  FOOTER START -->
  
<div class="footer">
  <div class="inner-footer">

<!--  for company name and description -->
    <div class="footer-items">
      <h2>MI HASYIM ASY'ARI</h2>
      <p>Description of any product or motto of the company.</p>
    </div>

<!--  for quick links  -->
    <div class="footer-items">
      <h3>Quick Links</h3>
      <div class="border1"></div> <!--for the underline -->
        <ul>
          <a href="#home"><li>Home</li></a>
          <a href="#gelombang"><li>Gelombang</li></a>
          <a href="#persyaratan"><li>Persyaratan</li></a>
          <a href="#pengumuman"><li>Persyaratan</li></a>
          <a href="#follow"><li>Ikuti Kami</li></a>
        </ul>
    </div>

<!--  for contact us info -->
    <div class="footer-items">
      <h3>Contact us</h3>
      <div class="border1"></div>
        <ul>
          <li><i class="fa fa-map-marker" aria-hidden="true"></i>XYZ, abc</li>
          <li><i class="fa fa-phone" aria-hidden="true"></i>123456789</li>
          <li><i class="fa fa-envelope" aria-hidden="true"></i>xyz@gmail.com</li>
        </ul> 
      
<!--   for social links -->
        <div class="social-media">
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-google-plus-square"></i></a>
        </div> 
    </div>
  </div>
  
<!--   Footer Bottom start  -->
  <div class="footer-bottom">
    Copyright &copy; Food and Burps 2020.
  </div>
</div>
  
<!--   Footer Bottom end -->
  
<!--   FOOTER END -->
 

     <script src="<?= base_url()?>assets/template/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url()?>assets/template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
