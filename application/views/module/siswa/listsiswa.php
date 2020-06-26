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
    <a class="btn btn-success" style="margin-bottom:20px;" href=""><i class="fa fa-download"></i> Download Format</a>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm" style="margin-bottom:20px;">Import Data Siswa</button>
      <table id="datatable" class="table table-striped table-bordered" style="width:100%"> 
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nis / Nama Siswa</th>
            <th>No Telepon</th>
            <th>Kelas</th>
            <th>Status Siswa</th>
            <th>Tahun Ajaran</th>
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
              <td><strong><?= $key->nis;?></strong><br><?=$key->nama_siswa;?><br><?= $key->gender_siswa;?><br><?= $key->alamat_siswa;?></td>
              <td>
                 <a href="https://wa.me/<?=$key->no_hp;?>"><i class="fa fa-whatsapp"></i> &nbsp;<?= $key->no_hp;?></a>
             </td>
            <td><?= $key->nama_kelas;?></td>
            <td><?= $key->status;?></td>
            <td><?= $key->tahun_ajaran;?></td>
             <td class="text-center">
              <a href="<?=site_url('siswa/printpdf/'.$key->id_siswa); ?>"
              data-toggle="tooltip" data-placement="left" title="Print Pdf"  class="btn btn-warning btn-xs"><i class="fa fa-print"></i></a>
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

<!--modal-->
                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Import Data</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h4 style="margin-bottom:20px;">Masukkan File</h4>
                        <?= form_open_multipart('siswa/import');?>
                            <input type="file" name="import" class="form-control">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>

