<div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><?= $page ?></h2>
            <ul class="nav navbar-right panel_toolbox">
             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
             <li><a class="close-link"><i class="fa fa-close"></i></a></li>
             </ul>
             <div class="clearfix"></div>
             </div>
            <div class="x_content">
            <!-- content starts here -->
<form action="" method="post">
	<?= validation_errors(); ?>
	<?php if ($this->router->fetch_method() == 'edit'): ?>
	<input type="hidden" name="id_kelas" value="<?= $query->id_kelas; ?>">
	<?php endif ?>
	<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Kelas <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
      <input type="text" id="first-name" name="nama_kelas" value="<?= $query->nama_kelas; ?>" class="form-control ">
    </div>
  </div>
  <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Wali Kelas <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 ">
    	<select name="guru_id" class="form-control" id="">
    		<option value="">--Pilih--</option>
    		<?php foreach ($guru as $key ): ?>
    			<option value="<?= $key->id_guru; ?>" <?= $key->id_guru == $query->guru_id ? 'selected' : null; ?>> <?= $key->nama_guru; ?></option>
    		<?php endforeach ?>
    	</select>
    </div>
  </div>
  <div class="ln_solid"></div>
  <div class="item form-group">
    <div class="col-md-6 col-sm-6 offset-md-3">
      <button class="btn btn-primary" type="button">Cancel</button>
      <button type="submit" name="<?= $submit; ?>" class="btn btn-success">Submit</button>
    </div>
  </div>
</form>
            </div>
      </div>
    </div>
</div>
</div>
