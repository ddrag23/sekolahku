<div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><?= $page ?></h2>
            <ul class="nav navbar-right panel_toolbox">
            <li><a  href="<?= site_url('siswa'); ?>" class="collapse-link"><i class="fa fa-mail-reply"></i></a></li>
             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
             <li><a class="close-link"><i class="fa fa-close"></i></a></li>
             </ul>
             <div class="clearfix"></div>
             </div>
            <div class="x_content">
   
<form method="post" action="" enctype="multipart/form-data">
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
              Step 3 Data UKS<br />
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
      <div id="step-1" style="height:450px;">
          <?= validation_errors(); ?>
          <input type="hidden" name="id_siswa" value="<?= $query->id_siswa; ?>">
           <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Upload foto <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php if ($query->foto != null): ?>
                <div style="margin-bottom:5px">
                <img style="width:80%" src="<?=base_url('uploads/image/'.$query->foto);?>" alt="">
                </div>
              <?php endif; ?>
              <input type="file" id="gambar" name="foto" class="form-control" value="">
            </div>
          </div>
          <input type="hidden" name="id_siswa" value="<?= $query->id_siswa; ?>">
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NPSN TK <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="first-name" name="npsn" class="form-control" value="<?= $this->input->post('npsn') ?? $query->npsn; ?>">
            </div>
          </div>
        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'guru'): ?>
            <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nis <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="first-name" name="nis" class="form-control" value="<?= $this->input->post('nis') ?? $query->nis; ?>">
            </div>
          </div>
       <?php endif; ?>
           <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Lengkap <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="first-name" name="nama_siswa" class="form-control" value="<?= $this->input->post('nama_siswa') ?? $query->nama_siswa; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">TTL <span class="required">*</span>
            </label>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
              <input type="text" id="last-name" name="tempat_lahir"  class="form-control" value="<?= $this->input->post('tempat_lahir') ?? $query->tempat_lahir; ?>">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 ">
                <div class='input-group date' id='myDatepicker2'>
                  <input type='text' class="form-control" name="tanggal_lahir" value="<?= $this->input->post('tanggal_lahir') ?? $query->tanggal_lahir; ?>" />
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
              <input type="text" id="umur" name="umur" class="form-control" value="<?= $this->input->post('umur') ?? $query->umur; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">BB/TB/Gol.Darah <span class="required">*</span>
            </label>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
              <input type="text" id="last-name" name="bb" value="<?= $this->input->post('bb') ?? $query->bb; ?>"  class="form-control" placeholder="Berat Badan">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12">
                  <input type='text' class="form-control" name="tb" placeholder="Tinggi Badan" value="<?= $this->input->post('tb') ?? $query->tb; ?>" />
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
              <input type="text" id="last-name" name="gol_darah" placeholder="Golongan Darah"  class="form-control" value="<?= $this->input->post('gol_darah') ?? $query->gol_darah; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Penyakit Serius <br><small>(Tidak wajib di isi)</small>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="first-name" name="penyakit" class="form-control" value="<?= $this->input->post('penyakit') ?? $query->penyakit; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Agama
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="first-name" name="agama" class="form-control" value="<?= $this->input->post('agama') ?? $query->agama ?>">
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kelas <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="ex-select2 form-control" name="kelas_id">
                <!-- <option value="">--Pilih--</option> -->
                  <?php foreach ($kelas as $key):?>
                <option value="<?= $key->id_kelas;?>" <?= $key->id_kelas == $query->kelas_id ? 'selected' : null; ?>><?= $key->nama_kelas; ?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Wali Kelas <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="ex-select2 form-control" name="guru_id">
                <!-- <option value="">--Pilih--</option> -->
                  <?php foreach ($guru as $key):?>
                <option value="<?= $key->id_guru;?>" <?= $key->id_guru == $query->guru_id ? 'selected' : null; ?>><?= $key->nama_guru; ?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="item form-group">
              <?php $gender = $this->input->post('gender_siswa') ? $this->input->post('gender_siswa') : $query->gender_siswa; ?>
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
            <div class="col-md-6 col-sm-6 ">
              <div id="gender" class="btn-group" data-toggle="buttons">
                <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="gender_siswa" value="L"<?= $gender == 'L' ? 'checked' : null; ?> class="join-btn"> &nbsp; Laki-Laki &nbsp;
                </label>
                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="gender_siswa" value="P"<?= $gender == 'P' ? 'checked' : null; ?> class="join-btn"> Perempuan
                </label>
              </div>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <textarea name="alamat_siswa" id="" cols="30" rows="10" class="form-control"><?=
              $this->input->post('alamat_siswa') ?? $query->alamat_siswa; ?> </textarea>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Dusun <span class="required">*</span>
            </label>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
            <input class="form-control" type="text" name="dusun" value="<?=
            $this->input->post('dusun') ?? $query->dusun;?>" placeholder="Dusun">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
              <input class="form-control" type="text" name="rt" value="<?=
              $this->input->post('rt') ?? $query->rt; ?>" placeholder="RT">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 ">
              <input class="form-control" type="text" name="rw" value="<?=
              $this->input->post('rw') ?? $query->rw; ?>" placeholder="RW">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Desa <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 ">
              <input class="form-control" type="text" name="desa" value="<?=
              $this->input->post('desa')?? $query->desa; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"
            for="first-name">Kecamatan <span class="required">*</span>
            </label>
            <div class="col-md-3 col-sm-3 col-xs-12 ">
              <input class="form-control" type="text" name="kecamatan" value="<?=
              $this->input->post('kecamatan') ?? $query->kecamatan; ?>">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 ">
              <input class="form-control" type="text" name="kodepos" placeholder="Masukkan Kode Pos" value="<?=
              $this->input->post('kodepos') ?? $query->kodepos; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"
            for="first-name">Kabupaten <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 ">
              <input class="form-control" type="text" name="kabupaten" value="<?=
              $this->input->post('kabupaten') ?? $query->kabupaten; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"
            for="first-name">Provinsi<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12 ">
            <input class="form-control" type="text" name="provinsi" value="<?=
            $this->input->post('provinsi') ?? $query->provinsi; ?>" >
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Status Siswa <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $status = $this->input->post('status') ? $this->input->post('status') : $query->status; ?>
              <select class="ex-select2 form-control" name="status">
                <option value="">--Pilih--</option>
                <option value="praaktif"<?= $status == 'praaktif' ? 'selected' : null; ?> >Praaktif</option>
                <option value="aktif" <?= $status == 'aktif' ? 'selected' : null; ?>>Aktif</option>
                <option value="mutasi" <?= $status == 'mutasi' ? 'selected' : null; ?>>Mutasi</option>
                <option value="alumni" <?= $status == 'alumni' ? 'selected' : null; ?>>Alumni</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Saudara <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" class="form-control" name="jumlah_saudara" value="<?= $this->input->post('jumlah_saudara') ?? $query->jumlah_saudara; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Asal Sekolah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $asalSekolah = $this->input->post('asal_sekolah') ? $this->input->post('asal_sekolah') : $query->asal_sekolah; ?>
              <select class="ex-select2 form-control" name="asal_sekolah">
                <option value="">--Pilih--</option>
                <option value="RA"<?= $asalSekolah == 'RA' ? 'selected' : null; ?> >RA</option>
                <option value="TK" <?= $asalSekolah == 'TK' ? 'selected' : null; ?>>TK</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="asal_sekolah">Nama asal Sekolah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="nama_sekolah_asal" name="nama_sekolah_asal" class="form-control" value="<?= $this->input->post('nama_sekolah_asal') ?? $query->nama_sekolah_asal; ?>">
            </div>
          </div>
         <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="hobi">Hobi <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="hobi" name="hobi" class="form-control" value="<?= $this->input->post('hobi') ?? $query->hobi; ?>">
            </div>
          </div>
         <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="cita">Cita-Cita <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="cita" name="cita" class="form-control" value="<?= $this->input->post('cita') ?? $query->cita; ?>">
            </div>
          </div>

           <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Keadaan Status Siswa <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $keadaan = $this->input->post('keadaan_status') ? $this->input->post('keadaan_status') : $query->keadaan_status; ?>
              <select class="ex-select2 form-control" name="keadaan_status">
                <option value="">--Pilih--</option>
                <option value="yatim" <?= $keadaan == 'yatim' ? 'selected' : null; ?>>Yatim</option>
                <option value="piatu" <?= $keadaan == 'piatu' ? 'selected' : null; ?>>Piatu</option>
                <option value="yatim piatu" <?= $keadaan == 'yatim piatu' ? 'selected' : null; ?>>Yatim Piatu</option>
                <option value="tidak yatim/piatu"  <?= $keadaan == 'tidak yatim/piatu' ? 'selected' : null; ?>>Tidak Yatim/Piatu</option>
              </select>
            </div>
          </div>
      </div>
      <div id="step-2" style="height:450px;">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Ayah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="first-name" name="nama_ayah" class="form-control" value="<?= $this->input->post('nama_ayah') ?? $query->nama_ayah; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_ibu">Nama Ibu <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" value="<?= $this->input->post('nama_ibu') ?? $query->nama_ibu; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ktp_ayah">Ktp Ayah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="ktp_ayah" name="ktp_ayah" class="form-control" value="<?= $this->input->post('ktp_ayah') ?? $query->ktp_ayah; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ktp_ibu">Ktp Ibu <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="ktp_ibu" name="ktp_ibu" class="form-control" value="<?= $this->input->post('ktp_ibu') ?? $query->ktp_ibu; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Ayah <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <?php $pendidikan = $this->input->post('pendidikan_ayah') ? $this->input->post('pendidikan_ayah') : $query->pendidikan_ayah; ?>
              <select class="form-control" name="pendidikan_ayah">
                <option value="">--Pilih--</option>
                <option value="tidak sekolah" <?= $pendidikan == 'tidak sekolah' ? 'selected' : null; ?>>Tidak Sekolah</option>
                <option value="putus SD" <?= $pendidikan == 'putus SD' ? 'selected' : null; ?>>Putus SD</option>
                <option value="SD sederajat" <?= $pendidikan == 'SD sederajat' ? 'selected' : null; ?>>SD Sederajat</option>
                <option value="SMP sederajat"<?= $pendidikan == 'SMP sederajat' ? 'selected' : null; ?>>SMP Sederajat</option>
                <option value="SMA sederajat"  <?= $pendidikan == 'SMA sederajat' ? 'selected' : null; ?>>SMA sederajat</option>
                <option value="D1"<?= $pendidikan == 'D1' ? 'selected' : null; ?>>D1</option>
                <option value="D2"<?= $pendidikan == 'D2' ? 'selected' : null; ?>>D2</option>
                <option value="D3"<?= $pendidikan == 'D3' ? 'selected' : null; ?>>D3</option>
                <option value="D4/S1" <?= $pendidikan == 'D4/S1' ? 'selected' : null; ?>>D4/S1</option>
                <option value="S2"<?= $pendidikan == 'S2' ? 'selected' : null; ?>>S2</option>
                <option value="S3" <?= $pendidikan == 'S3' ? 'selected' : null; ?>>S3</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Ibu <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <?php $pendidikan = $this->input->post('pendidikan_ibu') ? $this->input->post('pendidikan_ibu') : $query->pendidikan_ibu; ?>
              <select class="form-control" name="pendidikan_ibu">
                <option value="">--Pilih--</option>
                <option value="tidak sekolah" <?= $pendidikan == 'tidak sekolah' ? 'selected' : null; ?>>Tidak Sekolah</option>
                <option value="putus SD" <?= $pendidikan == 'putus SD' ? 'selected' : null; ?>>Putus SD</option>
                <option value="SD sederajat" <?= $pendidikan == 'SD sederajat' ? 'selected' : null; ?>>SD Sederajat</option>
                <option value="SMP sederajat"<?= $pendidikan == 'SMP sederajat' ? 'selected' : null; ?>>SMP Sederajat</option>
                <option value="SMA sederajat"  <?= $pendidikan == 'SMA sederajat' ? 'selected' : null; ?>>SMA sederajat</option>
                <option value="D1"<?= $pendidikan == 'D1' ? 'selected' : null; ?>>D1</option>
                <option value="D2"<?= $pendidikan == 'D2' ? 'selected' : null; ?>>D2</option>
                <option value="D3"<?= $pendidikan == 'D3' ? 'selected' : null; ?>>D3</option>
                <option value="D4/S1" <?= $pendidikan == 'D4/S1' ? 'selected' : null; ?>>D4/S1</option>
                <option value="S2"<?= $pendidikan == 'S2' ? 'selected' : null; ?>>S2</option>
                <option value="S3" <?= $pendidikan == 'S3' ? 'selected' : null; ?>>S3</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan Ayah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $jobAyah = $this->input->post('job_ayah') ? $this->input->post('job_ayah') : $query->job_ayah; ?>
              <select class="form-control" name="job_ayah">
                <option value="">--Pilih--</option>
                <option value="tidak bekerja" <?= $jobAyah == 'tidak bekerja' ? 'selected' : null; ?>>Tidak bekerja</option>
                <option value="nelayan" <?= $jobAyah == 'nelayan' ? 'selected' : null; ?>>Nelayan</option>
                <option value="petani" <?= $jobAyah == 'petani' ? 'selected' : null; ?>>Petani</option>
                <option value="peternak" <?= $jobAyah == 'peternak' ? 'selected' : null; ?>>Peternak</option>
                <option value="PNS" <?= $jobAyah == 'PNS' ? 'selected' : null; ?>>PNS</option>
                <option value="karyawan swasta" <?= $jobAyah == 'karyawan swasta' ? 'selected' : null; ?>>Karyawan swasta</option>
                <option value="pedagang kecil" <?= $jobAyah == 'pedagang kecil' ? 'selected' : null; ?>>Pedagang kecil</option>
                <option value="pedangan besar" <?= $jobAyah == 'pedangan besar' ? 'selected' : null; ?>>Pedangan besar</option>
                <option value="wiraswasta" <?= $jobAyah == 'wiraswasta' ? 'selected' : null; ?>>wiraswasta</option>
                <option value="wirausaha" <?= $jobAyah == 'wirausaha' ? 'selected' : null; ?>>Wirausaha</option>
                <option value="buruh" <?= $jobAyah == 'buruh' ? 'selected' : null; ?>>Buruh</option>
                <option value="pensiunan" <?= $jobAyah == 'pensiunan' ? 'selected' : null; ?>>Pensiunan</option>
                <option value="lainnya" <?= $jobAyah == 'lainnya' ? 'selected' : null; ?>>Lainnya</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="job_ibu">Pekerjaan Ibu <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $jobIbu = $this->input->post('job_ibu') ? $this->input->post('job_ibu') : $query->job_ibu; ?>
              <select class="form-control" name="job_ibu">
                <option value="">--Pilih--</option>
                <option value="tidak bekerja" <?= $jobIbu == 'tidak bekerja' ? 'selected' : null; ?>>Tidak bekerja</option>
                <option value="nelayan" <?= $jobIbu == 'nelayan' ? 'selected' : null; ?>>Nelayan</option>
                <option value="petani" <?= $jobIbu == 'petani' ? 'selected' : null; ?>>Petani</option>
                <option value="peternak" <?= $jobIbu == 'peternak' ? 'selected' : null; ?>>Peternak</option>
                <option value="PNS" <?= $jobIbu == 'PNS' ? 'selected' : null; ?>>PNS</option>
                <option value="karyawan swasta" <?= $jobIbu == 'karyawan swasta' ? 'selected' : null; ?>>Karyawan swasta</option>
                <option value="pedagang kecil" <?= $jobIbu == 'pedagang kecil' ? 'selected' : null; ?>>Pedagang kecil</option>
                <option value="pedangan besar" <?= $jobIbu == 'pedangan besar' ? 'selected' : null; ?>>Pedangan besar</option>
                <option value="wiraswasta" <?= $jobIbu == 'wiraswasta' ? 'selected' : null; ?>>wiraswasta</option>
                <option value="wirausaha" <?= $jobIbu == 'wirausaha' ? 'selected' : null; ?>>Wirausaha</option>
                <option value="buruh" <?= $jobIbu == 'buruh' ? 'selected' : null; ?>>Buruh</option>
                <option value="pensiunan" <?= $jobIbu == 'pensiunan' ? 'selected' : null; ?>>Pensiunan</option>
                <option value="lainnya" <?= $jobIbu == 'lainnya' ? 'selected' : null; ?>>Lainnya</option>
              </select>
            </div>
          </div>
           <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gaji Ibu<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $gaji = $this->input->post('gaji') ? $this->input->post('gaji') : $query->gaji ?>
              <select class="form-control" name="gaji">
                <option value="">--Pilih--</option>
                <option value="kurang dari 1 jt" <?= $gaji == 'kurang dari 1 jt' ? 'selected' : null; ?>>Kurang dari 1 juta</option>
                <option value="1 sampai 2 jt" <?= $gaji == '1 sampai 2 jt' ? 'selected' : null; ?>>1 sampai 2 juta</option>
                <option value="lebih dari 2 jt" <?= $gaji == 'lebih dari 2 jt' ? 'selected' : null; ?>>Lebih dari 3 juta</option>
              </select>
            </div>
          </div>
            <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gaji Ibu<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $gajiIbu = $this->input->post('gaji_ibu') ? $this->input->post('gaji_ibu') : $query->gaji_ibu ?>
              <select class="form-control" name="gaji_ibu">
                <option value="">--Pilih--</option>
                <option value="Kurang dari 1 juta" <?= $gajiIbu == 'Kurang dari 1 juta' ? 'selected' : null; ?>>Kurang dari 1 juta</option>
                <option value="1 juta sampai 2 juta" <?= $gajiIbu == '1 juta sampai 2 juta' ? 'selected' : null; ?>>1 sampai 2 juta</option>
                <option value="Lebih dari 3 juta" <?= $gajiIbu == 'Lebih dari 3 juta' ? 'selected' : null; ?>>Lebih dari 3 juta</option>
              </select>
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_hp">Nomor Telepon<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" id="no_hp" name="no_hp" value="<?= $this->input->post('no_hp') ?? $query->no_hp; ?>" class="form-control ">
            </div>
          </div>
      </div>
      <div id="step-3" style="height:450px;">
       <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Waktu Tempuh Ke Sekolah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" class="form-control" name="waktu" value="<?= $this->input->post('waktu') ?? $query->waktu; ?>">
            </div>
          </div>
       <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jarak Tempuh Ke Sekolah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $jarak = $this->input->post('jarak_sekolah') ? $this->input->post('jarak_sekolah') : $query->jarak_sekolah; ?>
               <select class="form-control" name="jarak_sekolah">
                <option value="">--Pilih--</option>
                <option value="0 sampai 1km" <?= $jarak == '0 sampai 1km' ? 'selected' : null; ?>>0 sampai  1 km</option>
                <option value="1km" <?= $jarak == '1km' ? 'selected' : null; ?>>1 km</option>
                <option value="2km" <?= $jarak == '2km' ? 'selected' : null; ?>>2 km</option>
                <option value="lebih dari 3km" <?= $jarak == 'lebih dari 3km' ? 'selected' : null; ?>>Lebih dari 3 km</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_ibu">Cara Ke sekolah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $caraSekolah = $this->input->post('cara_kesekolah') ? $this->input->post('cara_kesekolah') : $query->cara_kesekolah; ?>
               <select class="form-control" name="cara_kesekolah">
                <option value="">--Pilih--</option>
                <option value="jalan kaki"<?= $caraSekolah == 'jalan kaki' ? 'selected' : null; ?>>Jalan Kaki</option>
                <option value="sepeda"<?= $caraSekolah == 'sepeda' ? 'selected' : null; ?>>Naik sepeda</option>
                <option value="kendaraan pribadi"<?= $caraSekolah == 'kendaraan pribadi' ? 'selected' : null; ?>>Kendaraan pribadi</option>
                <option value="kendaraan umum"<?= $caraSekolah == 'kendaraan umum' ? 'selected' : null; ?>>Kendaraan umum</option>
                <option value="jemputan"<?= $caraSekolah == 'jemputan' ? 'selected' : null; ?>>Jemputan</option>
                <option value="delman"<?= $caraSekolah == 'delman' ? 'selected' : null; ?>>Delman</option>
                <option value="kereta api"<?= $caraSekolah == 'kereta api' ? 'selected' : null; ?>>Kereta api</option>
                <option value="ojek"<?= $caraSekolah == 'ojek' ? 'selected' : null; ?>>Ojek</option>
                <option value="getek"<?= $caraSekolah == 'getek' ? 'selected' : null; ?>>Getek</option>
                <option value="lainnya"<?= $caraSekolah == 'lainnya' ? 'selected' : null; ?>>Lainnya</option>
              </select>
          </div>
        </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ktp_ayah">Tempat Tinggal <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $tinggal = $this->input->post('tempat_tinggal') ? $this->input->post('tempat_tinggal') : $query->tempat_tinggal; ?>
               <select class="form-control" name="tempat_tinggal">
                <option value="">--Pilih--</option>
                <option value="orang tua" <?= $tinggal == 'orang tua' ? 'selected' : null; ?>>Orang Tua</option>
                <option value="saudara"<?= $tinggal == 'saudara' ? 'selected' : null; ?>>Saudara</option>
                <option value="kos"<?= $tinggal == 'kos' ? 'selected' : null; ?>>Kos/Kontrak</option>
                <option value="panti asuhan"<?= $tinggal == 'panti asuhan' ? 'selected' : null; ?>>Panti asuhan</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ktp_ayah">Tempat Mandi <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $tempat = $this->input->post('tempat_mandi') ? $this->input->post('tempat_mandi') : $query->tempat_mandi?>
               <select class="form-control" name="tempat_mandi">
                <option value="">--Pilih--</option>
                <option value="kamar mandi" <?= $tempat == 'kamar mandi' ? 'selected' : null; ?>>Kamar Mandi</option>
                <option value="sumber"<?= $tempat == 'sumber' ? 'selected' : null; ?>>Sumber</option>
                <option value="sungai"<?= $tempat == 'sungai' ? 'selected' : null; ?>>Sungai</option>
                <option value="kamar mandi umum"<?= $tempat == 'kamar mandi umum' ? 'selected' : null; ?>>Kamar Mandi Umum</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ktp_ibu">Air mandi <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $mandi = $this->input->post('air_mandi') ? $this->input->post('air_mandi') : $query->air_mandi; ?>
              <select class="form-control" name="air_mandi">
                <option value="">--Pilih--</option>
                <option value="PDAM" <?= $mandi == 'PDAM' ? 'selected' : null; ?>>PDAM</option>
                <option value="sumber" <?= $mandi == 'sumber' ? 'selected' : null; ?>>Sumber</option>
                <option value="sungai" <?= $mandi == 'sungai' ? 'selected' : null; ?>>Sungai</option>
                <option value="kamar mandi umum" <?= $mandi == 'kamar mandi umum' ? 'selected' : null; ?>>Kamar Mandi Umum</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Air Minum <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="air_minum">
                <?php $minum = $this->input->post('air_minum') ? $this->input->post('air_minum') : $query->air_minum; ?>
                <option value="">--Pilih--</option>
                <option value="PDAM" <?= $minum == 'PDAM' ? 'selected' : null; ?>>PDAM</option>
                <option value="sungai"<?= $minum == 'sungai' ? 'selected' : null; ?>>Sungai</option>
                <option value="sumber"<?= $minum == 'sumber' ? 'selected' : null; ?>>Sumber</option>
                <option value="tengki"<?= $minum == 'tengki' ? 'selected' : null; ?>>Tengki</option>
                <option value="kemasan"<?= $minum == 'kemasan' ? 'selected' : null; ?>>Kemasan</option>
                <option value="isi ulang"<?= $minum == 'isi ulang' ? 'selected' : null; ?>>Isi Ulang</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Bangunan Rumah <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <?php $bangunan = $this->input->post('bangunan') ? $this->input->post('bangunan') : $query->bangunan;  ?>
              <select class="form-control" name="bangunan">
                <option value="">--Pilih--</option>
                <option value="tembok"<?= $bangunan == 'tembok' ? 'selected' : null; ?>>Tembok</option>
                <option value="klenengan" <?= $bangunan == 'klenengan' ? 'selected' : null; ?>>Klenengan</option>
                <option value="papan" <?= $bangunan == 'papan' ? 'selected' : null; ?>>Papan</option>
                <option value="gedek" <?= $bangunan == 'gedek' ? 'selected' : null; ?>>Gedek</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Lantai Rumah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $lantai = $this->input->post('lantai') ? $this->input->post('lantai') : $query->lantai; ?>
              <select class="form-control" name="lantai">
                <option value="">--Pilih--</option>
                <option value="keramik"<?= $lantai == 'keramik' ? 'selected' : null; ?>>Keramik</option>
                <option value="tegel" <?= $lantai == 'tegel' ? 'selected' : null; ?>>Tegel</option>
                <option value="plesteran" <?= $lantai == 'plesteran' ? 'selected' : null; ?>>Plesteran</option>
                <option value="tanah" <?= $lantai == 'tanah' ? 'selected' : null; ?>>Tanah</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="job_ibu">Penerangan Rumah <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <select class="form-control" name="penerangan">
                <?php $penerangan = $this->input->post('penerangan') ? $this->input->post('penerangan') : $query->penerangan; ?>
                <option value="">--Pilih--</option>
                <option value="lampu listrik" <?= $penerangan == 'lampu listrik' ? 'selected' : null; ?>>Lampu Listrik</option>
                <option value="lampu minyak" <?= $penerangan == 'lampu minyak' ? 'selected' : null; ?>>Lampu Minyak</option>
              </select>
            </div>
          </div>
      </div>
      <div id="step-4" style="height:450px;">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_wali">Nama Wali <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?= $this->input->post('nama_wali') ?? $query->nama_wali; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Wali <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
              <?php $pendWali = $this->input->post('pendidikan_wali') ? $this->input->post('pendidikan_wali') : $query->pendidikan_wali; ?>
              <select class="form-control" name="pendidikan_wali">
                <option value="">--Pilih--</option>
                <option value="tidak sekolah" <?= $pendWali == 'tidak sekolah' ? 'selected' : null; ?>>Tidak Sekolah</option>
                <option value="putus SD" <?= $pendWali == 'putus SD' ? 'selected' : null; ?>>Putus SD</option>
                <option value="SD sederajat" <?= $pendWali == 'SD sederajat' ? 'selected' : null; ?>>SD Sederajat</option>
                <option value="SMP sederajat"<?= $pendWali == 'SMP sederajat' ? 'selected' : null; ?>>SMP Sederajat</option>
                <option value="SMA sederajat"  <?= $pendWali == 'SMA sederajat' ? 'selected' : null; ?>>SMA sederajat</option>
                <option value="D1"<?= $pendWali == 'D1' ? 'selected' : null; ?>>D1</option>
                <option value="D2"<?= $pendWali == 'D2' ? 'selected' : null; ?>>D2</option>
                <option value="D3"<?= $pendWali == 'D3' ? 'selected' : null; ?>>D3</option>
                <option value="D4/S1" <?= $pendWali == 'D4/S1' ? 'selected' : null; ?>>D4/S1</option>
                <option value="S2"<?= $pendWali == 'S2' ? 'selected' : null; ?>>S2</option>
                <option value="S3" <?= $pendWali == 'S3' ? 'selected' : null; ?>>S3</option>
              </select>
            </div>
          </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="job_wali">Pekerjaan Wali <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $jobWali = $this->input->post('job_wali') ? $this->input->post('job_wali') : $query->job_wali; ?>
              <select class="form-control" name="job_wali">
                <option value="">--Pilih--</option>
                <option value="tidak bekerja" <?= $jobWali == 'tidak bekerja' ? 'selected' : null; ?>>Tidak bekerja</option>
                <option value="nelayan" <?= $jobWali == 'nelayan' ? 'selected' : null; ?>>Nelayan</option>
                <option value="petani" <?= $jobWali == 'petani' ? 'selected' : null; ?>>Petani</option>
                <option value="peternak" <?= $jobWali == 'peternak' ? 'selected' : null; ?>>Peternak</option>
                <option value="PNS" <?= $jobWali == 'PNS' ? 'selected' : null; ?>>PNS</option>
                <option value="karyawan swasta" <?= $jobWali == 'karyawan swasta' ? 'selected' : null; ?>>Karyawan swasta</option>
                <option value="pedagang kecil" <?= $jobWali == 'pedagang kecil' ? 'selected' : null; ?>>Pedagang kecil</option>
                <option value="pedangan besar" <?= $jobWali == 'pedangan besar' ? 'selected' : null; ?>>Pedangan besar</option>
                <option value="wiraswasta" <?= $jobWali == 'wiraswasta' ? 'selected' : null; ?>>wiraswasta</option>
                <option value="wirausaha" <?= $jobWali == 'wirausaha' ? 'selected' : null; ?>>Wirausaha</option>
                <option value="buruh" <?= $jobWali == 'buruh' ? 'selected' : null; ?>>Buruh</option>
                <option value="pensiunan" <?= $jobWali == 'pensiunan' ? 'selected' : null; ?>>Pensiunan</option>
                <option value="lainnya" <?= $jobWali == 'lainnya' ? 'selected' : null; ?>>Lainnya</option>
              </select>
            </div>
          </div>
            <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gaji <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <?php $gajiWali = $this->input->post('gaji_wali') ? $this->input->post('gaji_wali') : $query->gaji_wali; ?>
              <select class="form-control" name="gaji_wali">
                <option value="">--Pilih--</option>
                <option value="Kurang dari 1 juta" <?= $gajiWali == 'Kurang dari 1 juta' ? 'selected' : null; ?>>Kurang dari 1 juta</option>
                <option value="1 juta sampai 2 juta" <?= $gajiWali == '1 juta sampai 2 juta' ? 'selected' : null; ?>>1 sampai 2 juta</option>
                <option value="Lebih dari 3 juta" <?= $gajiWali == 'Lebih dari 3 juta' ? 'selected' : null; ?>>Lebih dari 3 juta</option>
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
