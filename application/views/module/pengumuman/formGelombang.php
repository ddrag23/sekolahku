<div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
            <li><a  href="<?= site_url('pengumuman'); ?>" class="text-primary"><i class="fa fa-arrow-left"></i> Kembali</a></li>
             </ul>
             <div class="clearfix"></div>
             </div>
            <div class="x_content">
            <!-- content starts here -->

          <form action="" method="post">
          <div id="error" data-error="<?= validation_errors();?>"></div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="sesi_gelombang">Gelombang <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input type="text" id="sesi_gelombang" name="sesi_gelombang" value="<?= set_value('sesi_gelombang'); ?>" class="form-control ">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="awal">Tanggal Awal <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input type="text" id="awal" name="awal" value="<?= set_value('awal'); ?>" class="form-control">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Akhir <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 ">
                <input class="form-control" type="text" name="akhir" value="<?= set_value('akhir'); ?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Biaya <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 ">
                <input class="form-control" type="number" name="biaya" value="<?= set_value('biaya'); ?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Ajaran<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input type="text" name="tahun_ajaran" class="form-control" value="<?= set_value('tahun_ajaran'); ?>">
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
              <div class="col-md-6 col-sm-6 offset-md-3">
                <button class="btn btn-primary" type="button">Cancel</button>
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit"  class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
</div>