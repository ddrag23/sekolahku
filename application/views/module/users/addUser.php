 <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah User</h3>
        <a href="<?=site_url('user'); ?>" class="btn btn-primary float-right"><i class="fa fa-user-plus"></i> Kembali</a>
      </div>
      <div class="row">
      	<div class="col-md-12">
      		<form role="form" method="post" action="<?=site_url('user/add'); ?>">
                <div class="card-body">
                	<!-- pesan validasi -->
  					<?php if($this->session->flashdata('sukses')): ?>
  						<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('sukses');; ?></div>
  			        <?php endif; ?>
  			        <!-- end pesan validasi -->
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama'); ?>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                    <?= form_error('username'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nip">Nip</label>
                    <input type="text" class="form-control" name="nmr_induk" placeholder="Nip" value="<?= set_value('nmr_induk'); ?>">
                    <?= form_error('nmr_induk'); ?>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" cols="30" rows="5"><?= set_value('alamat');  ?></textarea>
                    <?= form_error('alamat'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nomor">Nomor Telepon</label>
                    <input type="text" class="form-control" name="nomor" placeholder="Nomor Telepon" value="<?= set_value('nomor'); ?>">
                    <?= form_error('nomor'); ?>
                  </div>
                  <div class="form-group">
                  	<label for="level">Level User</label>
                  	<select name="level" class="form-control">
                  		<option value="">- Pilih -</option>
                  		<option value="admin " <?= set_value('level') == 'admin' ? "selected" : null; ?>>Admin</option>
                  		<option value="guru" <?= set_value('level') == 'guru' ? "selected" : null; ?>>Guru</option>
                      <option value="siswa" <?= set_value('level') == 'siswa' ? "selected" : null; ?>>Siswa</option>
                  	</select>
                    <?= form_error('level'); ?>
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                </div>
              </form>
      	</div>
      </div>
      </div>