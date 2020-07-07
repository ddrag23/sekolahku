<div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <a href="<?= site_url('halaman/ppdb/nilai/masukkan-nilai');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Masukkan Nilai</a>

            <ul class="nav navbar-right panel_toolbox">
            <a href="<?= site_url('halaman/ppdb/nilai/print');?>" class="text-danger" style="font-size: 15px;" target="_blank"><i class="fa fa-download"></i> Export Pdf</a>
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
                        <th>Nama</th>
                        <th>Nilai</th>
                        <th>Seleksi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                   <!--    <?php $no=0; foreach ($query as $key) :?>
                      <tr>
                       <td><?= ++$no;?></td>
                        <td><?= $key->nama_ppdb;?></td>
                        <td><?= $key->jum_nilai;?></td>
                        <td><?= $key->status_ppdb;?></td>
                         <td wid_siswath="160px" class="text-center">
                          <a href="<?=site_url('nilai/edit/'.$key->id_nilai); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Ubah</a>
                          <a href="<?=site_url('nilai/del/'.$key->id_nilai); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach; ?> -->
                    </tbody>
                  </table>
            </div>
      </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    $('#datatable').DataTable({
      "processing" : true,
      "responsive" : true,
      "serverSide" : true,
      "ajax" : {
        "url" : "<?= site_url('halaman/ppdb/nilai/data-nilai') ;?>",
        "type" : "POST"
      } 
    })
  })
</script>
