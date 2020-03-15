 <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah User</h3>
        <a href="<?=site_url('siswa'); ?>" class="btn btn-primary float-right"><i class="fa fa-user-plus"></i> Kembali</a>
      </div>
      <div class="row">
      	<div class="col-md-12">
      		<form role="form" method="post" action="">
                <div class="card-body">
                	<!-- pesan validasi -->
  					<?php if($this->session->flashdata('sukses')): ?>
  						<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('sukses'); ?></div>
  			        <?php endif; ?>
  			        <!-- end pesan validasi -->
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nis">Nis</label>
                    <input type="text" class="form-control" name="nis" placeholder="Nis" value="<?= set_value('nis'); ?>">
                    <?= form_error('nis'); ?>
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
                  	<label for="gender">Jenis Kelamin</label>
                  	<select name="gender" class="form-control">
                  		<option value="">- Pilih -</option>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                  	</select>
                    <?= form_error('gender'); ?>
                  </div>
                  <div class="form-group">
                    <label for="Kelas">Kelas</label>
                    <select name="kelas" class="form-control">
                      <option value="">- Pilih -</option>
                     <?php foreach ($join as $key) :?> 
                      <option value="<?= $key->id_kelas; ?>" <?= set_value('kelas') == $key->id_kelas ? "selected" : null; ?>><?= $key->nama_kelas; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('kelas'); ?>
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                </div>
              </form>
      	</div>
      </div>
      </div>