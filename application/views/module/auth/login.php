<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MI Hasyim Asy'ari | <?= $this->uri->segment(3); ?> </title>

    <!-- Bootstrap -->
    <link href="<?= base_url()?>assets/template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url()?>assets/template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url()?>assets/template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url()?>assets/template/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/template/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/template/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/template/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url()?>assets/template/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php if ($this->session->flashdata('gagal')) :?>
              <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('gagal'); ?></div>
            <?php endif; ?>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>
            <form method="post" action="<?= site_url('halaman/login'); ?>">
              <h1>Selamat Datang</h1>
              <div>
                <input type="text" class="form-control" placeholder="NPSN TK" name="username" />
                <?= form_error('username'); ?>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" />
                <?= form_error('password'); ?>
              </div>
              <div>
                <button class="btn btn-secondary btn-sm" type="submit" name="login">Masuk</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum punya akun ?
                  <a href="<?= site_url('halaman/login/daftar');?>" class="to_register"> Buat Akun Baru </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                <a href="<?= site_url();?>" style="font-size:20px;"><i class="fa fa-home"></i> Halaman Utama</a>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script src="<?= base_url('assets/template/vendors/jquery/dist/jquery.js');?>"></script>
    <script src="<?= base_url()?>assets/template/vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?= base_url()?>assets/template/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?= base_url()?>assets/template/vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <script src="<?= base_url()?>assets/template/vendors/moment/min/moment.min.js"></script>

    <script src="<?= base_url()?>assets/template/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url('assets/template/build/js/myscript.js');?>"></script>
  </body>
</html>
