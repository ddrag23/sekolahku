<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?= base_url()?>assets/template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url()?>assets/template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url()?>assets/template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url()?>assets/template/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url()?>assets/template/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?= site_url('halaman/login/daftar');?>">
              <h1>Buat Akun</h1>
              <div>
              <input type="text" class="form-control" placeholder="NPSN TK" name="username" value="<?=set_value('username');?>" autocomplete="off" autofocus/>
                <small class="text-danger"><?= form_error('username'); ?></small>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" />
                <small class="text-danger"><?= form_error('password'); ?></small>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Konfirmasi Password" name="passconf" value="<?=set_value('passconf');?>" autocomplete="off"/>
                <small class="text-danger"><?= form_error('passconf'); ?></small>
              </div>
              <div>
              <input type="number" class="form-control" placeholder="No Telepon" name="notelp" value="<?= set_value('notelp');?>"/>
                <small class="text-danger"><?= form_error('notelp'); ?></small>
              </div>
              <div>
                <button class="btn btn-secondary btn-sm mt-3" type="submit">Daftar Akun</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah Mempunyai akun ?
                  <a href="<?= site_url('halaman/login'); ?>" class="to_register"> Masuk </a>
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
  </body>
</html>
