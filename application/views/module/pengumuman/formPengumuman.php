<div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
            <li><a  href="<?= site_url('halaman/ppdb/pengumuman'); ?>" class="text-primary"><i class="fa fa-arrow-left"></i> Kembali</a></li>
             </ul>
             <div class="clearfix"></div>
             </div>
            <div class="x_content">
            <!-- content starts here -->
        <form method="post" enctype="multipart/form-data" action="">
        <div id="error" data-error="<?=validation_errors();?>"></div>
        		<div class="row form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="file_pengumuman">Upload File Pengumuman <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="file" id="file_pengumuman" name="file_pengumuman" class="form-control" >
            </div>
          </div>
        	  <div class="row form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Status Seleksi <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <div id="seleksi" class="btn-group" data-toggle="buttons">
                <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="status_pengumuman" value="publis" class="join-btn"> &nbsp; Publis &nbsp;
                </label>
                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="status_pengumuman" value="tunda" class="join-btn">Tunda
                </label>
              </div>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="row form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
              <button class="btn btn-primary" type="button">Cancel</button>
              <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </div>
         </form>
      </div>
      </div>
    </div>
 </div>
