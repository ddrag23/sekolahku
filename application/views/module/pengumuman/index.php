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
            <?php $no = 0; foreach ($gelombang as $key) : ?>
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
</div>
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
	        	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>
	        	<div id="error" data-error="<?= validation_errors();?>"></div>
	        	<?php foreach ($pengumuman as $key) :?>
				<div class="embed-responsive embed-responsive-16by9">
				  <iframe class="embed-responsive-item" src="<?= base_url('uploads/dokumen/pdf/'.$key->file_pengumuman); ?>"></iframe>
				</div>
				<a href="<?= site_url('halaman/ppdb/pengumuman/hapus/'.$key->id_pengumuman); ?>" class="btn btn-danger" style="margin-top: 10px; text-align: center;"><i class="fa fa-trash" onclick="return confirm(' yakin hapus data ?')"></i> Hapus Pengumuman</a>
				<?php endforeach; ?>
      		</div>
    	</div>
	</div>
</div>
