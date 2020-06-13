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
      <table id="datatable" class="table table-striped table-bordered" style="width:100%"> 
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=0; foreach ($query as $key) :?>
          <tr>
           <td><?= ++$no;?></td>
            <td><?= $key->nama_ppdb;?></td>
            <td><?= $key->nama_panggilan;?></td>
            <td><?= $key->alamat_rumah_ppdb;?></td>
            <td><?= $key->asal_sekolah_ppdb;?></td>
             <td wid_siswath="160px" class="text-center">
              <a href="<?=site_url('ppdb/printPdf/'.$key->id_ppdb); ?>" data-toggle="tooltip" data-placement="left" title="Print Pdf" class="btn btn-warning btn-xs"><i class="fa fa-print"></i></a>
              <a href="<?=site_url('ppdb/edit/'.$key->id_ppdb); ?>" data-toggle="tooltip" data-placement="left" title="Edit Data"  class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
              <a href="<?=site_url('ppdb/delete/'.$key->id_ppdb); ?>" data-toggle="tooltip" data-placement="left" title="Hapus Data"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
            </div>
      </div>
    </div>
</div>
