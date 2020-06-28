 <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><?= $page ?></h2>
            <ul class="nav navbar-right panel_toolbox">
            <li><a  href="<?= site_url('ppdb'); ?>" class="text-primary"><i class="fa fa-arrow-left"></i> Kembali</a></li>
             </ul>
             <div class="clearfix"></div>
             </div>
            <div class="x_content">
            <!-- content starts here -->
<div id="error" data-error="<?= validation_errors();?>"></div>
<form class="" method="post" enctype="multipart/form-data" action="">
<input type="hidden" name="id_ppdb" value="<?= $query->id_ppdb; ?>">
<?php if ($this->session->userdata('level') == 'user'): ?>
  <input type="hidden" name="user_id" value="<?= $this->session->userdata('id')?>">
<?php endif; ?>
<?php if ($this->session->userdata('level') == 'admin'): ?>
    <input type="hidden" name="id" value="<?= $query->id;?>">
  	<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="text" id="username" name="username" value="<?= $query->username; ?>" class="form-control ">
    </div>
  </div>
<?php endif; ?>
	<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_ppdb">Nama Calon Peserta Didik Baru <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="text" id="nama_ppdb" name="nama_ppdb" value="<?= $query->nama_ppdb; ?>" class="form-control ">
    </div>
  </div>
		<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_panggilan">Nama Panggilan <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="text" id="nama_ppdb" name="nama_panggilan" value="<?= $query->nama_panggilan; ?>" class="form-control ">
    </div>
  </div>
		<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="ttl">TTL <span class="required">*</span>
    </label>
    <div class="col-md-3 col-sm-3 ">
      <input type="text" id="tempat_lahir_ppdb" name="tempat_lahir_ppdb" value="<?= $query->tempat_lahir_ppdb; ?>" class="form-control" placeholder="Tempat Lahir">
    </div>
    <div class="col-md-3 col-sm-3 ">
      <input type="date" id="tanggal_lahir_ppdb" name="tanggal_lahir_ppdb" value="<?= $query->tanggal_lahir_ppdb; ?>" class="form-control" placeholder="Tanggal Lahir">
    </div>
  </div>
  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin <span class="required">*</span></label>
    <?php $gender = $this->input->post('gender_ppdb') ? $this->input->post('gender_ppdb') : $query->gender_ppdb; ?>
    <div class="col-md-6 col-sm-6 ">
      <div id="gender" class="btn-group" data-toggle="buttons">
        <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
          <input type="radio" name="gender_ppdb" value="laki-laki"<?= $gender == 'laki-laki' ? 'checked' : null; ?> class="join-btn"> &nbsp; Laki-Laki &nbsp;
        </label>
        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
          <input type="radio" name="gender_ppdb" value="perempuan"<?= $gender == 'perempuan' ? 'checked' : null; ?> class="join-btn"> Perempuan
        </label>
      </div>
    </div>
  </div>
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat_rumah_ppdb">Alamat Rumah <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
    <textarea id="alamat_rumah_ppdb" name="alamat_rumah_ppdb" class="form-control" cols="30" rows="5"><?= $query->alamat_rumah_ppdb; ?></textarea>
    </div>
  </div>
	<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="asal_sekolah_ppdb">Asal Sekolah <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="text" id="asal_sekolah_ppdb" name="asal_sekolah_ppdb" value="<?= $query->asal_sekolah_ppdb; ?>" class="form-control ">
    </div>
  </div>
	<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="email" id="email" name="email" value="<?= $query->email; ?>" class="form-control ">
    </div>
  </div>
	<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat_sekolah_ppdb">Alamat Sekolah <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="text" id="alamat_sekolah_ppdb" name="alamat_sekolah_ppdb" value="<?= $query->alamat_sekolah_ppdb; ?>" class="form-control ">
    </div>
  </div>
	<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_hp_ppdb">No Telepon <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="text" id="no_hp_ppdb" name="no_hp_ppdb" value="<?= $query->no_hp_ppdb; ?>" class="form-control ">
    </div>
  </div>
	<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_ortu_ppdb">Nama Orang Tua <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="text" id="nama_ortu_ppdb" name="nama_ortu_ppdb" value="<?= $query->nama_ortu_ppdb; ?>" class="form-control ">
    </div>
  </div>
  <div class="ln_solid"></div>
  <div class="item form-group">
    <div class="col-md-6 col-sm-6 offset-md-3">
      <button class="btn btn-primary" type="button">Batal</button>
      <button class="btn btn-primary" type="reset">Reset</button>
      <button type="submit" name="<?= $submit; ?>" class="btn btn-success">Simpan</button>
   </div>
  </div>
 </form>
      </div>
      </div>
    </div>
 </div>
</div>
