<div class="row">
<div class="col-md-12">
<div class="x_panel">
  <div class="x_title">
    <h2><?= $page ?></h2>
      <ul class="nav navbar-right panel_toolbox">
      <li><a  href="<?= site_url('halaman/siswa'); ?>" class="text-primary"><i class="fa fa-arrow-left"></i> Kembali</a></li>
       </ul>
       <div class="clearfix"></div>
       </div>
      <div class="x_content">
            <!-- content starts here -->
        <form class="" method="post" enctype="multipart/form-data" action="">
        <div id="error" data-error="<?=validation_errors();?>"></div>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>
        <!-- <input type="hidden" name="id_siswa" value="<?= $query->id_siswa; ?>"> -->
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nama Siswa <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="ex-select2 form-control" id='id' name="id_siswa">
                <option value="">--Pilih--</option>
                  <?php foreach ($siswa as $key):?>
                <option value="<?= $key->id_siswa;?>"><?= $key->nama_siswa; ?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kelas <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="ex-select2 form-control" name="kelas_id">
                <option>--Pilih--</option>
                <?php foreach ($kelas as $key):?>
                <option value="<?= $key->id_kelas;?>"><?= $key->nama_kelas; ?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
              <button class="btn btn-primary" type="button">Cancel</button>
              <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" name="" class="btn btn-success">Simpan</button>
            </div>
          </div>
         </form>
      </div>
      </div>
    </div>
 </div>
