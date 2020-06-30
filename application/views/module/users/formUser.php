    <form action="" method="post">
    <div id="error" data-error="<?= validation_errors();?>"></div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="hidden" name="id" value="<?= $query->id; ?>">
          <input type="text" id="username" name="username" value="<?= $query->username; ?>" class="form-control " autofocus>
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="password" id="password" name="password" value="" class="form-control">
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Konfirmasi Password <br> <small>(Harus sama dengan password diatas)</small> <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="password" id="password" name="passconf" value="" class="form-control">
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" id="email" name="email" value="<?= $query->email; ?>" class="form-control" autocomplete="off">
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="notelp">No Telepon <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" id="notelp" name="notelp" value="<?= $query->notelp; ?>" class="form-control ">
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="level">Level <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <?php $level = $this->input->post('level') ? $this->input->post('level') : $query->level; ?>
          <select name="level" id="level" class="form-control">
            <option value="">--Pilih--</option>
            <option value="admin"<?= $level == 'admin' ? 'selected' : null; ?>>Administrator</option>
            <option value="kepala sekolah"<?= $level == 'kepala sekolah' ? 'selected' : null; ?>>Kepala Sekolah</option>
            <option value="guru"<?= $level == 'guru' ? 'selected' : null; ?>>Guru</option>
            <option value="user"<?= $level == 'user' ? 'selected' : null; ?>>User</option>
          </select>
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Aktif User *</label>
        <?php $active = $this->input->post('is_active') ? $this->input->post('is_active') : $query->is_active; ?>
        <div class="col-md-6 col-sm-6 ">
          <div id="gender" class="btn-group" data-toggle="buttons">
            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="is_active" value="1" <?= $active == '1' ? 'checked' : null; ?> class="join-btn"> &nbsp; Aktif &nbsp;
            </label>
            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
              <input type="radio" name="is_active" value="0"<?= $active == '0' ? 'checked' : null; ?> class="join-btn"> Non-aktif
            </label>
          </div>
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
          <button class="btn btn-primary" type="button">Cancel</button>
          <button class="btn btn-primary" type="reset">Reset</button>
          <button type="submit" name="<?= $submit; ?>" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
