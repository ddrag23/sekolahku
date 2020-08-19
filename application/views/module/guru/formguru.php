<div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
            <li><a  href="<?= site_url('halaman/guru'); ?>" class="text-primary"><i class="fa fa-arrow-left"></i> Kembali</a></li>
             </ul>
             <div class="clearfix"></div>
             </div>
            <div class="x_content">
            <!-- content starts here -->

    <form action="" method="post">
    <div id="error" data-error="<?= validation_errors();?>"></div>
    <?php if ($this->router->fetch_method() == 'editGuru'): ?>
      <input type="hidden" name="id_guru" value="<?php echo $query->id_guru; ?>">
    <?php endif ?>
      <div class="row form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NUPTK / Peg.id <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" id="first-name" name="nip" value="<?= $query->nip; ?>" class="form-control ">
        </div>
      </div>
      <div class="row form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Guru <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" id="last-name" name="nama_guru" value="<?php echo $query->nama_guru; ?>" class="form-control">
        </div>
      </div>
      <div class="row form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin <span class="required">*</span></label>
        <?php $gender = $this->input->post('gender_guru') ? $this->input->post('gender_guru') : $query->gender_guru; ?>
        <div class="col-md-6 col-sm-6 ">
          <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="gender_guru" value="laki-laki"<?= $gender == 'laki-laki' ? 'checked' : null; ?> class="join-btn"> &nbsp; Laki-Laki &nbsp;
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="gender_guru" value="perempuan"<?= $gender == 'perempuan' ? 'checked' : null; ?> class="join-btn">Perempuan
            </label>
          </div>
        </div>
      </div>
      <div class="row form-group">
        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">No Telepon <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 ">
          <input id="middle-name" class="form-control" type="text" name="no_hp_guru" value="<?= $query->no_hp_guru; ?>">
        </div>
      </div>
      <div class="row form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <textarea class="form-control" name="alamat_guru" id="" cols="30" rows="5"><?= $query->alamat_guru; ?></textarea>
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="row form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
          <button class="btn btn-primary" type="button">Cancel</button>
          <button class="btn btn-primary" type="reset">Reset</button>
          <button type="submit" name="<?= $submit; ?>" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
            </div>
      </div>
    </div>
</div>
</div>
