<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <a href="<?=site_url('halaman/dashboard');?>" class="site_title"><img src="<?=base_url('assets/logo/logomi-nobg.png');?>" alt="mi" class="img-fluid float-left" style="margin-top:10px; border-radius:50%; margin-right:5px; margin-left:-5px;  height:1cm; width:1cm"> <span>MI Hasyim Asy'ari</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url();?>assets/template/production/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <?php if ($this->fungsi->user_login()->level == 'admin'): ?>
                  <h2>Adminstrator</h2>
                <?php endif ?>
                <?php if ($this->fungsi->user_login()->level == 'guru'): ?>
                  <h2>Panitia</h2>
                <?php endif ?>
                <?php if ($this->fungsi->user_login()->level == 'user'): ?>
                  <h2>Siswa</h2>
                <?php endif ?>
                
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <?php if ($this->session->userdata('level') == 'admin'): ?>
                    <li>
                    <a href="<?= site_url('halaman/dashboard');?>"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <?php endif; ?>
                  <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'guru' ): ?>
                  <li><a><i class="fa fa-users"></i> Siswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('halaman/siswa/tambah'); ?>">Tambah Data Siswa</a></li>
                      <li><a href="<?= site_url('halaman/siswa'); ?>">Aktif</a></li>
                      <li><a href="<?= site_url('halaman/siswa/mutasi'); ?>">Mutasi</a></li>
                      <li><a href="<?= site_url('halaman/siswa/alumni') ;?>">Alumni</a></li>
                    </ul>
                  </li>
                  <?php endif ?>
                  
                  <li><a><i class="fa fa-folder"></i> Ppdb <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('halaman/ppdb'); ?>">Dashboard PPDB</a></li>
                    <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'guru'): ?>
                      <li><a href="<?= site_url('halaman/ppdb/pengumuman'); ?>">Pengumuman PPDB</a></li>
                      <li><a href="<?= site_url('halaman/ppdb/nilai'); ?>">Nilai PPDB</a></li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('level') == 'user' && empty($this->session->userdata('id_ppdb'))): ?>
                      <li><a  href="<?= site_url('halaman/ppdb/tambah'); ?>">Masukkan Data PPDB</a></li>
                    <?php endif; ?>
                      <?php if($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'guru') : ?>
                      <li><a href="<?= site_url('halaman/ppdb/daftar-ppdb') ;?>">Data Calon Siswa</a></li>
                      <?php  endif; ?>
                    </ul>
                  </li>
                  <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'guru'): ?>
                    <li><a><i class="fa fa-desktop"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('halaman/kelas'); ?>">Master Kelas</a></li>
                      <li><a href="<?= site_url('halaman/guru'); ?>">Master Wali Kelas</a></li>
                    </ul>
                  </li>
                  <?php endif ?>
                </ul>
              </div>
              <?php if($this->session->userdata('level')== 'admin'): ?>
              <div class="menu_section">
                <h3>Fitur Admin</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-users"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                     <ul class="nav child_menu">
                     <li><a href="<?= site_url('halaman/pengguna/admin');?>">Level Admin</a></li>
                     <li><a href="<?= site_url('halaman/pengguna/panitia');?>">Level Panitia</a></li>
                     <li><a href="<?= site_url('halaman/pengguna/siswa');?>">Level User</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <?php endif; ?>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings"  style="width: 50%">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= site_url('halaman/login/keluar'); ?>" style="width: 50%">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?= base_url(); ?>assets/template/production/images/user.png" alt=""><?= $this->fungsi->user_login()->username; ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
      <!--               <a class="dropdown-item"  href="<?= site_url('profile');?>"> Profile</a> -->
                    <a class="dropdown-item"  href="<?= site_url('halaman/login/keluar'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->