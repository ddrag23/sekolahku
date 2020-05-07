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


<form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?= site_url('siswa/add'); ?>">
<div id="wizard" class="form_wizard wizard_horizontal">
      <ul class="wizard_steps">
        <li>
          <a href="#step-1">
            <span class="step_no">1</span>
            <span class="step_descr">
                Step 1 Data Pribadi<br />
            </span>
          </a>
        </li>
        <li>
          <a href="#step-2">
            <span class="step_no">2</span>
            <span class="step_descr">
                Step 2 Data Orang Tua<br />
            </span>
          </a>
        </li>
        <li>
          <a href="#step-3">
            <span class="step_no">3</span>
            <span class="step_descr">
              Step 3 Data Kehidupan<br />
          </span>
          </a>
        </li>
        <li>
          <a href="#step-4">
            <span class="step_no">4</span>
            <span class="step_descr">
              Step 4 Data Wali<br />
          </span>
          </a>
        </li>
      </ul>
      <div id="step-1">
          <?= validation_errors(); ?>
           <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Foto<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="file" id="first-name" name="foto" class="form-control" value="">
            </div>
          </div>
           <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nis <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="first-name" name="nis" class="form-control" value="<?= set_value('nis'); ?>">
            </div>
          </div>
           <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Lengkap <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="first-name" name="nama_siswa" class="form-control" value="<?= set_value('nama_siswa'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">TTL <span class="required">*</span>
            </label>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
              <input type="text" id="last-name" name="tempat_lahir"  class="form-control" value="<?= set_value('tempat_lahir'); ?>">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 ">
                <div class='input-group date' id='myDatepicker2'>
                  <input type='text' class="form-control" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>" />
                  <span class="input-group-addon">
                     <span class="fa fa-calendar"></span>
                  </span>
              </div>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="umur">Umur <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="umur" name="umur" class="form-control" value="<?= set_value('umur'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">BB/TB/Gol.Darah <span class="required">*</span>
            </label>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
              <input type="text" id="last-name" name="bb" value="<?= set_value('bb'); ?>"  class="form-control" placeholder="Berat Badan">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12">
                  <input type='text' class="form-control" name="tb" placeholder="Tinggi Badan" value="<?= set_value('tb'); ?>" />
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
              <input type="text" id="last-name" name="gol_darah" placeholder="Golongan Darah"  class="form-control" value="<?= set_value('gol_darah'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Penyakit Serius <br><small>(Tidak wajib di isi)</small>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="first-name" name="penyakit" class="form-control" value="<?= set_value('penyakit'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Agama
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="first-name" name="agama" class="form-control" value="<?= set_value('agama'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kelas <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="ex-select2 form-control" name="kelas_id">
                <option value="">--Pilih--</option>
                <?php foreach ($kelas as $key):?>
                <option value="<?= $key->id_kelas;?>" <?= set_value('kelas_id') == $key->id_kelas ? 'selected' : null; ?>><?= $key->nama_kelas; ?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Wali Kelas <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="ex-select2 form-control" name="guru_id">
                <option value="">--Pilih--</option>
                <?php foreach ($guru as $key):?>
                <option value="<?= $key->id_guru;?>" <?= set_value('guru_id') == $key->id_guru ? 'selected' : null; ?>><?= $key->nama_guru; ?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
            <div class="col-md-6 col-sm-6 ">
              <div id="gender" class="btn-group" data-toggle="buttons">
                <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="gender_siswa" value="L" <?= set_value('gender') == 'L' ? 'checked' : null; ?> class="join-btn"> &nbsp; Laki-Laki &nbsp;
                </label>
                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="gender_siswa" value="P"<?= set_value('gender') == 'P' ? 'checked' : null; ?> class="join-btn"> Perempuan
                </label>
              </div>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <textarea name="alamat_siswa" id="" cols="30" rows="4" class="form-control"><?= set_value('alamat_siswa'); ?></textarea>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Dusun <span class="required">*</span>
            </label>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
              <input class="form-control" type="text" name="dusun" value="<?= set_value('dusun')?>" placeholder="Dusun">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
              <input class="form-control" type="text" name="rt" value="<?= set_value('rt')?>" placeholder="RT">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
              <input class="form-control" type="text" name="rw" value="<?= set_value('rw')?>" placeholder="RW">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Desa <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 ">
              <input class="form-control" type="text" name="desa" value="<?= set_value('desa')?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"
            for="first-name">Kecamatan <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 ">
              <input class="form-control" type="text" name="kecamatan" value="<?= set_value('kecamatan')?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"
            for="first-name">Kabupaten <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 ">
              <input class="form-control" type="text" name="kabupaten" value="<?= set_value('kabupaten')?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"
            for="first-name">Provinsi<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 ">
              <input class="form-control" type="text" name="provinsi" value="Jawa Timur" readonly>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Status Siswa <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="ex-select2 form-control" name="status">
                <option value="">--Pilih--</option>
                <option value="praaktif"<?= set_value('status') == 'praaktif' ? 'selected' : null; ?> >Praaktif</option>
                <option value="aktif" <?= set_value('status') == 'aktif' ? 'selected' : null; ?>>Aktif</option>
                <option value="mutasi" <?= set_value('status') == 'mutasi' ? 'selected' : null; ?>>Mutasi</option>
                <option value="alumni" <?= set_value('status') == 'alumni' ? 'selected' : null; ?>>Alumni</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Saudara <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" class="form-control" name="jumlah_saudara" value="<?= set_value('jumlah_saudara'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Asal Sekolah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="ex-select2 form-control" name="asal_sekolah">
                <option value="">--Pilih--</option>
                <option value="RA"<?= set_value('asal_sekolah') == 'RA' ? 'selected' : null; ?> >RA</option>
                <option value="TK" <?= set_value('asal_sekolah') == 'TK' ? 'selected' : null; ?>>TK</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="asal_sekolah">Nama asal Sekolah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="nama_sekolah_asal" name="nama_sekolah_asal" class="form-control" value="<?= set_value('nama_sekolah_asal'); ?>">
            </div>
          </div>
           <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Keadaan Status Siswa <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="ex-select2 form-control" name="keadaan_status">
                <option value="">--Pilih--</option>
                <option value="yatim" <?= set_value('keadaan_status') == 'yatim' ? 'selected' : null; ?>>Yatim</option>
                <option value="piatu" <?= set_value('keadaan_status') == 'piatu' ? 'selected' : null; ?>>Piatu</option>
                <option value="yatim piatu" <?= set_value('keadaan_status') == 'yatim piatu' ? 'selected' : null; ?>>Yatim Piatu</option>
                <option value="tidak yatim/piatu"  <?= set_value('keadaan_status') == 'tidak yatim/piatu' ? 'selected' : null; ?>>Tidak yatim/piatu</option>
              </select>
            </div>
          </div>
      </div>
      <div id="step-2">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Ayah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="first-name" name="nama_ayah" class="form-control" value="<?= set_value('nama_ayah'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_ibu">Nama Ibu <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" value="<?= set_value('nama_ibu'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ktp_ayah">Ktp Ayah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="ktp_ayah" name="ktp_ayah" class="form-control" value="<?= set_value('ktp_ayah'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ktp_ibu">Ktp Ibu <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="ktp_ibu" name="ktp_ibu" class="form-control" value="<?= set_value('ktp_ibu'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Ayah <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="pendidikan_ayah">
                <option value="">--Pilih--</option>
                <option value="tidak sekolah" <?= set_value('pendidikan_ayah') == 'tidak sekolah' ? 'selected' : null; ?>>Tidak Sekolah</option>
                <option value="putus sd" <?= set_value('pendidikan_ayah') == 'putus sd' ? 'selected' : null; ?>>Putus Sd</option>
                <option value="sd sederajat" <?= set_value('pendidikan_ayah') == 'sd sederajat' ? 'selected' : null; ?>>Sd Sederajat</option>
                <option value="smp sederajat"<?= set_value('pendidikan_ayah') == 'smp sederajat' ? 'selected' : null; ?>>Smp Sederajat</option>
                <option value="sma sederajat"  <?= set_value('pendidikan_ayah') == 'sma sederajat' ? 'selected' : null; ?>>Sma sederajat</option>
                <option value="D1"<?= set_value('pendidikan_ayah') == 'D1' ? 'selected' : null; ?>>D1</option>
                <option value="D2"<?= set_value('pendidikan_ayah') == 'D2' ? 'selected' : null; ?>>D2</option>
                <option value="D3"<?= set_value('pendidikan_ayah') == 'D3' ? 'selected' : null; ?>>D3</option>
                <option value="D4/S1" <?= set_value('pendidikan_ayah') == 'D4/S1' ? 'selected' : null; ?>>D4/S1</option>
                <option value="S2"<?= set_value('pendidikan_ayah') == 'S2' ? 'selected' : null; ?>>S2</option>
                <option value="S3" <?= set_value('pendidikan_ayah') == 'S3' ? 'selected' : null; ?>>S3</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Ibu <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="pendidikan_ibu">
                <option value="">--Pilih--</option>
                <option value="tidak sekolah" <?= set_value('pendidikan_ibu') == 'tidak sekolah' ? 'selected' : null; ?>>Tidak Sekolah</option>
                <option value="putus SD" <?= set_value('pendidikan_ibu') == 'putus SD' ? 'selected' : null; ?>>Putus SD</option>
                <option value="SD sederajat" <?= set_value('pendidikan_ibu') == 'SD sederajat' ? 'selected' : null; ?>>SD Sederajat</option>
                <option value="SMP sederajat"<?= set_value('pendidikan_ibu') == 'SMP sederajat' ? 'selected' : null; ?>>SMP Sederajat</option>
                <option value="SMA sederajat"  <?= set_value('pendidikan_ibu') == 'SMA sederajat' ? 'selected' : null; ?>>SMA sederajat</option>
                <option value="D1"<?= set_value('pendidikan_ibu') == 'D1' ? 'selected' : null; ?>>D1</option>
                <option value="D2"<?= set_value('pendidikan_ibu') == 'D2' ? 'selected' : null; ?>>D2</option>
                <option value="D3"<?= set_value('pendidikan_ibu') == 'D3' ? 'selected' : null; ?>>D3</option>
                <option value="D4/S1" <?= set_value('pendidikan_ibu') == 'D4/S1' ? 'selected' : null; ?>>D4/S1</option>
                <option value="S2"<?= set_value('pendidikan_ibu') == 'S2' ? 'selected' : null; ?>>S2</option>
                <option value="S3" <?= set_value('pendidikan_ibu') == 'S3' ? 'selected' : null; ?>>S3</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan Ayah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="job_ayah">
                <option value="">--Pilih--</option>
                <option value="tidak bekerja" <?= set_value('job_ayah') == 'tidak bekerja' ? 'selected' : null; ?>>Tidak bekerja</option>
                <option value="nelayan" <?= set_value('job_ayah') == 'nelayan' ? 'selected' : null; ?>>Nelayan</option>
                <option value="petani" <?= set_value('job_ayah') == 'petani' ? 'selected' : null; ?>>Petani</option>
                <option value="peternak" <?= set_value('job_ayah') == 'peternak' ? 'selected' : null; ?>>Peternak</option>
                <option value="PNS" <?= set_value('job_ayah') == 'PNS' ? 'selected' : null; ?>>PNS</option>
                <option value="karyawan swasta" <?= set_value('job_ayah') == 'karyawan swasta' ? 'selected' : null; ?>>Karyawan swasta</option>
                <option value="pedagang kecil" <?= set_value('job_ayah') == 'pedagang kecil' ? 'selected' : null; ?>>Pedagang kecil</option>
                <option value="pedangan besar" <?= set_value('job_ayah') == 'pedangan besar' ? 'selected' : null; ?>>Pedangan besar</option>
                <option value="wiraswasta" <?= set_value('job_ayah') == 'wiraswasta' ? 'selected' : null; ?>>wiraswasta</option>
                <option value="wirausaha" <?= set_value('job_ayah') == 'wirausaha' ? 'selected' : null; ?>>Wirausaha</option>
                <option value="buruh" <?= set_value('job_ayah') == 'buruh' ? 'selected' : null; ?>>Buruh</option>
                <option value="pensiunan" <?= set_value('job_ayah') == 'pensiunan' ? 'selected' : null; ?>>Pensiunan</option>
                <option value="lainnya" <?= set_value('job_ayah') == 'lainnya' ? 'selected' : null; ?>>Lainnya</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="job_ibu">Pekerjaan Ibu <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="job_ibu">
                <option value="">--Pilih--</option>
                <option value="tidak bekerja" <?= set_value('job_ibu') == 'tidak bekerja' ? 'selected' : null; ?>>Tidak bekerja</option>
                <option value="nelayan" <?= set_value('job_ibu') == 'nelayan' ? 'selected' : null; ?>>Nelayan</option>
                <option value="petani" <?= set_value('job_ibu') == 'petani' ? 'selected' : null; ?>>Petani</option>
                <option value="peternak" <?= set_value('job_ibu') == 'peternak' ? 'selected' : null; ?>>Peternak</option>
                <option value="PNS" <?= set_value('job_ibu') == 'PNS' ? 'selected' : null; ?>>PNS</option>
                <option value="karyawan swasta" <?= set_value('job_ibu') == 'karyawan swasta' ? 'selected' : null; ?>>Karyawan swasta</option>
                <option value="pedagang kecil" <?= set_value('job_ibu') == 'pedagang kecil' ? 'selected' : null; ?>>Pedagang kecil</option>
                <option value="pedangan besar" <?= set_value('job_ibu') == 'pedangan besar' ? 'selected' : null; ?>>Pedangan besar</option>
                <option value="wiraswasta" <?= set_value('job_ibu') == 'wiraswasta' ? 'selected' : null; ?>>wiraswasta</option>
                <option value="wirausaha" <?= set_value('job_ibu') == 'wirausaha' ? 'selected' : null; ?>>Wirausaha</option>
                <option value="buruh" <?= set_value('job_ibu') == 'buruh' ? 'selected' : null; ?>>Buruh</option>
                <option value="pensiunan" <?= set_value('job_ibu') == 'pensiunan' ? 'selected' : null; ?>>Pensiunan</option>
                <option value="lainnya" <?= set_value('job_ibu') == 'lainnya' ? 'selected' : null; ?>>Lainnya</option>
              </select>
            </div>
          </div>
           <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gaji <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="gaji">
                <option value="">--Pilih--</option>
                <option value="kurang dari 1 jt" <?= set_value('gaji') == 'kurang dari 1jt' ? 'selected' : null; ?>>Kurang dari 1 juta</option>
                <option value="1 sampai 2 jt" <?= set_value('gaji') == '1 sampai 2 jt' ? 'selected' : null; ?>>1 sampai 2 juta</option>
                <option value="lebih dari 2 jt" <?= set_value('gaji') == 'lebih dari 2 jt' ? 'selected' : null; ?>>Lebih dari 2 juta</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_hp">Nomor Telepon<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="no_hp" name="no_hp" value="<?= set_value('no_hp'); ?>" class="form-control ">
            </div>
          </div>
      </div>
      <div id="step-3">
       <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Waktu Tempuh Ke Sekolah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" class="form-control" name="waktu" value="<?= set_value('waktu'); ?>">
            </div>
          </div>
       <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jarak Tempuh Ke Sekolah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
               <select class="form-control" name="jarak_sekolah">
                <option value="">--Pilih--</option>
                <option value="0 sampai 1km" <?= set_value('jarak_sekolah') == '0 sampai 1km' ? 'selected' : null; ?>>0 sampai  1 km</option>
                <option value="1km" <?= set_value('jarak_sekolah') == '1km' ? 'selected' : null; ?>>1 km</option>
                <option value="2km" <?= set_value('jarak_sekolah') == '2km' ? 'selected' : null; ?>>2 km</option>
                <option value="lebih dari 3km" <?= set_value('jarak_sekolah') == 'lebih dari 3km' ? 'selected' : null; ?>>Lebih dari 3 km</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_ibu">Cara Ke sekolah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
               <select class="form-control" name="cara_kesekolah">
                <option value="">--Pilih--</option>
                <option value="jalan kaki" <?= set_value('cara_kesekolah') == 'jalan kaki' ? 'selected' : null; ?>>Jalan Kaki</option>
                <option value="sepeda" <?= set_value('cara_kesekolah') == 'sepeda' ? 'selected' : null; ?>>Naik sepeda</option>
                <option value="kendaraan pribadi" <?= set_value('cara_kesekolah') == 'kendaraan pribadi' ? 'selected' : null; ?>>Kendaraan pribadi</option>
                <option value="kendaraan umum" <?= set_value('cara_kesekolah') == 'kendaraan umum' ? 'selected' : null; ?>>Kendaraan umum</option>
                <option value="jemputan" <?= set_value('cara_kesekolah') == 'jemputan' ? 'selected' : null; ?>>Jemputan</option>
                <option value="delman" <?= set_value('cara_kesekolah') == 'delman' ? 'selected' : null; ?>>Delman</option>
                <option value="kereta api" <?= set_value('cara_kesekolah') == 'kereta api' ? 'selected' : null; ?>>Kereta api</option>
                <option value="ojek" <?= set_value('cara_kesekolah') == 'ojek' ? 'selected' : null; ?>>Ojek</option>
                <option value="getek" <?= set_value('cara_kesekolah') == 'getek' ? 'selected' : null; ?>>Getek</option>
                <option value="lainnya" <?= set_value('cara_kesekolah') == 'lainnya' ? 'selected' : null; ?>>Lainnya</option>
              </select>
          </div>
        </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ktp_ayah">Tempat Tinggal <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
               <select class="form-control" name="tempat_tinggal">
                <option value="">--Pilih--</option>
                <option value="orang tua" <?= set_value('tempat_tinggal') == 'orang tua' ? 'selected' : null; ?>>Orang Tua</option>
                <option value="saudara"<?= set_value('tempat_tinggal') == 'saudara' ? 'selected' : null; ?>>Saudara</option>
                <option value="kos"<?= set_value('tempat_tinggal') == 'kos' ? 'selected' : null; ?>>Kos/Kontrak</option>
                <option value="panti asuhan"<?= set_value('tempat_tinggal') == 'panti asuhan' ? 'selected' : null; ?>>Panti asuhan</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ktp_ayah">Tempat Mandi <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
               <select class="form-control" name="tempat_mandi">
                <option value="">--Pilih--</option>
                <option value="kamar mandi" <?= set_value('tempat_mandi') == 'kamar mandi' ? 'selected' : null; ?>>Kamar Mandi</option>
                <option value="sumber "<?= set_value('tempat_mandi') == 'sumber' ? 'selected' : null; ?>>Sumber</option>
                <option value="sungai "<?= set_value('tempat_mandi') == 'sungai' ? 'selected' : null; ?>>Sungai</option>
                <option value="kamar mandi umum "<?= set_value('tempat_mandi') == 'kamar mandi umum' ? 'selected' : null; ?>>Kamar Mandi Umum</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ktp_ibu">Air mandi <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="air_mandi">
                <option value="">--Pilih--</option>
                <option value="pdam" <?= set_value('air_mandi') == 'pdam' ? 'selected' : null; ?>>Pdam</option>
                <option value="sumber" <?= set_value('air_mandi') == 'sumber' ? 'selected' : null; ?>>Sumber</option>
                <option value="sungai" <?= set_value('air_mandi') == 'sungai' ? 'selected' : null; ?>>Sungai</option>
                <option value="kamar mandi umum" <?= set_value('air_mandi') == 'kamar mandi umum' ? 'selected' : null; ?>>Kamar Mandi Umum</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Air Minum <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="air_minum">
                <option value="">--Pilih--</option>
                <option value="pdam" <?= set_value('air_minum') == 'pdam' ? 'selected' : null; ?>>Pdam</option>
                <option value="sungai"<?= set_value('air_minum') == 'sungai' ? 'selected' : null; ?>>Sungai</option>
                <option value="sumber"<?= set_value('air_minum') == 'sumber' ? 'selected' : null; ?>>Sumber</option>
                <option value="tengki"<?= set_value('air_minum') == 'tengki' ? 'selected' : null; ?>>Tengki</option>
                <option value="kemasan"<?= set_value('air_minum') == 'kemasan' ? 'selected' : null; ?>>Kemasan</option>
                <option value="isi ulang"<?= set_value('air_minum') == 'isi ulang' ? 'selected' : null; ?>>Isi Ulang</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Bangunan Rumah <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="bangunan">
                <option value="">--Pilih--</option>
                <option value="tembok"<?= set_value('bangunan') == 'tembok' ? 'selected' : null; ?>>Tembok</option>
                <option value="klenengan" <?= set_value('bangunan') == 'klenengan' ? 'selected' : null; ?>>Klenengan</option>
                <option value="papan" <?= set_value('bangunan') == 'papan' ? 'selected' : null; ?>>Papan</option>
                <option value="gedek" <?= set_value('bangunan') == 'gedek' ? 'selected' : null; ?>>Gedek</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Lantai Rumah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="lantai">
                <option value="">--Pilih--</option>
                <option value="keramik"<?= set_value('lantai') == 'keramik' ? 'selected' : null; ?>>Keramik</option>
                <option value="tegel" <?= set_value('lantai') == 'tegel' ? 'selected' : null; ?>>Tegel</option>
                <option value="plesteran" <?= set_value('lantai') == 'plesteran' ? 'selected' : null; ?>>Plesteran</option>
                <option value="tanah" <?= set_value('lantai') == 'tanah' ? 'selected' : null; ?>>Tanah</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="job_ibu">Penerangan Rumah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="penerangan">
                <option value="">--Pilih--</option>
                <option value="lampu listrik" <?= set_value('penerangan') == 'lampu listrik' ? 'selected' : null; ?>>Lampu Listrik</option>
                <option value="lampu minyak" <?= set_value('penerangan') == 'lampu minyak' ? 'selected' : null; ?>>Lampu Minyak</option>
              </select>
            </div>
          </div>
      </div>
      <div id="step-4">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_wali">Nama Wali <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?= set_value('nama_wali'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Wali <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="pendidikan_wali">
                <option value="">--Pilih--</option>
                <option value="tidak sekolah"<?= set_value('pendidikan_wali') == 'tidak sekolah' ? 'selected' : null; ?>>Tidak Sekolah</option>
                <option value="putus SD"<?= set_value('pendidikan_wali') == 'putus SD' ? 'selected' : null; ?>>Putus SD</option>
                <option value="SD sederajat"<?= set_value('pendidikan_wali') == 'SD sederajat' ? 'selected' : null; ?>>SD Sederajat</option>
                <option value="SMP sederajat"<?= set_value('pendidikan_wali') == 'SMP sederajat' ? 'selected' : null; ?>>SMP Sederajat</option>
                <option value="SMA sederajat"<?= set_value('pendidikan_wali') == 'SMA sederajat' ? 'selected' : null; ?>>SMA sederajat</option>
                <option value="D1"<?= set_value('pendidikan_wali') == 'D1' ? 'selected' : null; ?>>D1</option>
                <option value="D2"<?= set_value('pendidikan_wali') == 'D2' ? 'selected' : null; ?>>D2</option>
                <option value="D3"<?= set_value('pendidikan_wali') == 'D3' ? 'selected' : null; ?>>D3</option>
                <option value="D4/S1" <?= set_value('pendidikan_wali') == 'D4/S1' ? 'selected' : null; ?>>D4/S1</option>
                <option value="S2"<?= set_value('pendidikan_wali') == 'S2' ? 'selected' : null; ?>>S2</option>
                <option value="S3" <?= set_value('pendidikan_wali') == 'S3' ? 'selected' : null; ?>>S3</option>
              </select>
            </div>
          </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="job_wali">Pekerjaan Wali <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="job_wali">
                <option value="">--Pilih--</option>
                <option value="tidak bekerja" <?= set_value('job_wali') == 'tidak bekerja' ? 'selected' : null; ?>>Tidak bekerja</option>
                <option value="nelayan" <?= set_value('job_wali') == 'nelayan' ? 'selected' : null; ?>>Nelayan</option>
                <option value="petani" <?= set_value('job_wali') == 'petani' ? 'selected' : null; ?>>Petani</option>
                <option value="peternak" <?= set_value('job_wali') == 'peternak' ? 'selected' : null; ?>>Peternak</option>
                <option value="PNS" <?= set_value('job_wali') == 'PNS' ? 'selected' : null; ?>>PNS</option>
                <option value="karyawan swasta" <?= set_value('job_wali') == 'karyawan swasta' ? 'selected' : null; ?>>Karyawan swasta</option>
                <option value="pedagang kecil" <?= set_value('job_wali') == 'pedagang kecil' ? 'selected' : null; ?>>Pedagang kecil</option>
                <option value="pedangan besar" <?= set_value('job_wali') == 'pedangan besar' ? 'selected' : null; ?>>Pedangan besar</option>
                <option value="wiraswasta" <?= set_value('job_wali') == 'wiraswasta' ? 'selected' : null; ?>>wiraswasta</option>
                <option value="wirausaha" <?= set_value('job_wali') == 'wirausaha' ? 'selected' : null; ?>>Wirausaha</option>
                <option value="buruh" <?= set_value('job_wali') == 'buruh' ? 'selected' : null; ?>>Buruh</option>
                <option value="pensiunan" <?= set_value('job_wali') == 'pensiunan' ? 'selected' : null; ?>>Pensiunan</option>
                <option value="lainnya" <?= set_value('job_wali') == 'lainnya' ? 'selected' : null; ?>>Lainnya</option>
              </select>
            </div>
          </div>
      </div>

    </div>
      <!-- End SmartWizard Content -->
      </form>
            </div>
      </div>
    </div>
 </div>
</div>
