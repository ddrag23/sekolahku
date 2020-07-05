  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <a class="btn btn-primary" href="<?= site_url('halaman/guru/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Guru</a>
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
            <th>NIP</th>
            <th>Nama</th>
            <th>Alamat Guru</th>
            <th>Jenis Kelamin</th>
            <th>No HP Guru</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=0; foreach ($query as $key) :?>
          <tr>
           <td><?= ++$no;?></td>
            <td><?= $key->nip;?></td>
            <td><?= $key->nama_guru;?></td>
            <td><?= $key->alamat_guru;?></td>
            <td><?= $key->gender_guru;?></td>
            <td><?= $key->no_hp_guru;?></td>
             <td wid_siswath="160px" class="text-center">
              <a href="<?=site_url('halaman/guru/ubah/'.$key->id_guru); ?>"
              data-tonggle="tooltip" data-placement="left" title="Edit" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
              <a href="<?=site_url('halaman/guru/hapus/'.$key->id_guru); ?>"
              data-tonggle="tooltip" data-placement="left" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </form>
    </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $('#datatable').DataTable({
    "responsive" : true
})
})

</script>
