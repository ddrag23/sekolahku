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
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>
    <a class="btn btn-success" style="margin-bottom:20px;" href="<?= base_url('siswa/export');?>"><i class="fa fa-file-excel-o"></i> Export</a>
     <a class="btn btn-success" style="margin-bottom:20px;" href="<?= base_url('siswa/export');?>"><i class="fa fa-download"></i> Download Format</a>
     <a class="btn btn-success" style="margin-bottom:20px;" href="<?= base_url('siswa/import');?>"><i class="fas fa-file-import"></i> Import Data</a>
      <table id="datatable" class="table table-striped table-bordered" style="width:100%"> 
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Status Siswa</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=0; foreach ($try as $key) :?>
          <tr>
           <td><?= ++$no;?></td>
            <td>
              <img src="<?= base_url('uploads/image/'.$key->foto)?>" class="img-thumbnail" alt="" style="width:150px; height:170px;margin:0; ">
              </td>
            <td><?= $key->nis;?></td>
            <td><?= $key->nama_siswa;?></td>
            <td><?= $key->alamat_siswa;?></td>
            <td><?= $key->gender_siswa;?></td>
            <td><?= $key->nama_kelas;?></td>
            <td><?= $key->status;?></td>
             <td class="text-center">
              <a href="<?=site_url('siswa/printpdf/'.$key->id_siswa); ?>"
              data-toggle="tooltip" data-placement="left" title="Print Pdf"  class="btn btn-warning btn-xs"><i class="fa fa-file-pdf-o"></i></a>
              <a href="<?=site_url('siswa/edit/'.$key->id_siswa); ?>"
              data-toggle="tooltip" data-placement="left" title="Edit Data Siswa" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
              <a href="<?=site_url('siswa/detail/'.$key->id_siswa); ?>"
              data-toggle="tooltip" data-placement="left" title="Lihat Detail Siswa" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
              <a href="<?=site_url('siswa/delete/'.$key->id_siswa); ?>"
              data-toggle="tooltip"  data-placement="left" title="Hapus" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
</div>
      </div>
</div>
  </div>
</div>
