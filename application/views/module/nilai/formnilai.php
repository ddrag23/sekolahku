<div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
            <li><a  href="<?= site_url('halaman/ppdb/nilai'); ?>" class="text-primary"><i class="fa fa-arrow-left"></i> Kembali</a></li>
             </ul>
             <div class="clearfix"></div>
             </div>
            <div class="x_content">
            <!-- content starts here -->
        <form class="" method="post" enctype="multipart/form-data" action="">
        <div id="error" data-error="<?=validation_errors();?>"></div>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>
        <input type="hidden" name="id_nilai" value="<?= $query->id_nilai; ?>">
        	<div class="row form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_ppdb">Nama Calon Peserta Didik Baru <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <select id="" name="ppdb_id" class="ex-select2 form-control">
                <option>pilih</option>
               <?php foreach ($ppdb as $key): ?>
               <option value="<?= $key->id_ppdb; ?>" <?= $key->id_ppdb == $query->ppdb_id ? 'selected' : null ;?>><?= $key->nama_ppdb;?></option>
               <?php endforeach; ?>
                </select>
            </div>
          </div>
        		<div class="row form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="jum_nilai">Nilai Peserta <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="jum_nilai" name="jum_nilai" value="<?= $query->jum_nilai; ?>" class="form-control" >
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="row form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
              <button class="btn btn-primary" type="button">Cancel</button>
              <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" name="<?= $submit; ?>" class="btn btn-success">Simpan</button>
            </div>
          </div>
         </form>
      </div>
      </div>
    </div>
 </div>
