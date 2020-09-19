<div class="row">
    <div class="col-md-6">
      <div class="x_panel">
        <div class="x_title">
			<h2>Gelombang Pendaftaran</h2>
            <ul class="nav navbar-right panel_toolbox">
	            <a href="<?= site_url('halaman/ppdb/gelombang/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
             </ul>
             <div class="clearfix"></div>
             </div>
            <div class="x_content">
            <!-- content starts here -->
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Gelombang</th>
              <th scope="col">Tanggal Awal / Tanggal Akhir</th>
              <th scope="col">Biaya</th>
              <th scope="col">Tahun Ajaran</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($gelombang as $key) : ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $key->sesi_gelombang; ?></td>
              <td><?= $key->awal; ?> sampai <?= $key->akhir ;?></td>
              <td><?= $key->biaya; ?></td>
              <td><?= $key->tahun_ajaran; ?></td>
              <td><a href="<?= site_url('halaman/ppdb/gelombang/hapus/').$key->id_gelombang; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
      <div class="x_panel">
        <div class="x_title">
          <h2>Pengaturan Pendaftaran</h2>
          <ul class="nav navbar-right panel_toolbox">
          </ul>
          <div class="clearfix"></div>
          <div class="x_content">
            <table class="table table-bordered mt-2">
              <thead>
                <tr>
                  <th scope="col">Maksimal Pendaftar</th>
                  <th scope="col">Status Pendaftaran</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody id="listSettingPendaftaran">
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
<!-- start modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <h6 class="modal-title" id="myModalLabel2">Pengaturan Pendaftaran</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= site_url('halaman/ppdb/pengumuman/ubah-pengaturan-pendaftaran');?>" method="post">
            <input type="hidden" name="id" id="id" value="">
          <div class="form-group">
            <label for="jumlah_pendaftar">Maksimal Pendaftar</label>
            <input type="text" id="jumlah_pendaftar" name="jumlah_pendaftar" value="" class="form-control">
          </div>
          <div class="form-group">
            <label for="status_pendaftaran">Status Pendaftaran</label>
            <select id="status_pendaftaran" name="status_pendaftaran" class="form-control">
               <option value="">--Pilih--</option>
              <option value="buka">Buka</option>
              <option value="tutup">Tutup</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="updated" class="btn btn-primary updated">Simpan</button>
      </div>
        </form>

    </div>
  </div>
</div>
<!-- /modals -->

   <div class="col-md-6">
    	<div class="x_panel">
        	<div class="x_title">
				<h2>Pengumuman seleksi</h2>
	            <ul class="nav navbar-right panel_toolbox">
	             <a href="<?= site_url('halaman/ppdb/pengumuman/tambah'); ?>" class="btn btn-primary"><i class="fa fa-upload"></i> Upload File</a>
	             </ul>
	             <div class="clearfix"></div>
             </div>
            <div class="x_content text-center">
	            <!-- content starts here -->
	        	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses');?> -->"></div>
	        	<div id="error" data-error="<?= validation_errors();?>"></div>
	        	<?php foreach ($pengumuman as $key) :?>
				<div class="embed-responsive embed-responsive-16by9" style="height: 29em;">
				  <iframe class="embed-responsive-item" src="<?= base_url('uploads/dokumen/pdf/'.$key->file_pengumuman); ?>"></iframe>
				</div>
				<a href="<?= site_url('halaman/ppdb/pengumuman/hapus/'.$key->id_pengumuman); ?>" class="btn btn-danger" style="margin-top: 10px; text-align: center;"><i class="fa fa-trash" onclick="return confirm(' yakin hapus data ?')"></i> Hapus Pengumuman</a>
				<?php endforeach; ?>
      		</div>
    	</div>
	</div>
</div>

<script>
  const showAllData = document.getElementById('listSettingPendaftaran');
  const btnSave = document.getElementById('updated')
  const jumlahPendaftar = document.getElementById('jumlah_pendaftar')
  const statusPendaftaran = document.getElementById('status_pendaftaran')
  const id = document.getElementById('id')

fetch('http://localhost/sekolahku/halaman/ppdb/pengumuman/getSettingPendaftaranJson').then(response => response.json()).then(response =>render(response))
  function render(response)
  {
      let html = '';
      response.forEach(response => {
        const segment = `
          <tr>
            <td>${response.jumlah_pendaftar}</td>
            <td>${response.status_pendaftaran}</td>
            <td>
              <a href="" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-primary update" data-id="${response.id}" data-jml="${response.jumlah_pendaftar}" data-status="${response.status_pendaftaran}"><i class="fa fa-pencil"></i></a>
            </td>
          </tr>
        `
        html += segment;
      })
      showAllData.innerHTML = html
  }

  document.addEventListener('click',(e) => {
    if(e.target.classList.contains('update')){
      id.value = e.target.dataset.id;
       jumlahPendaftar.value = e.target.dataset.jml;
       statusPendaftaran.value = e.target.dataset.status;
      }
  })

</script>
