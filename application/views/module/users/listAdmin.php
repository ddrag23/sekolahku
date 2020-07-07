  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <a href="<?= site_url('halaman/pengguna/tambah'); ?>" class="btn btn-primary" ><i class="fa fa-plus"></i> Tambah Akun</a>
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
                <th>Username</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Level</th>
                <th>Status User</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <?php $no =0; foreach($query as $key):?>
              <td><?= ++$no;?></td>
              <td><?= $key->username;?></td>
              <td><?= $key->email;?></td>
              <td><?= $key->notelp;?></td>
              <td><?= $key->level;?></td>
              <td><?= $key->is_active;?></td>
              <td width="160px" class="text-center">
                <a href="<?=site_url('user/edit/'.$key->id); ?>" data-toggle="tooltip"
                data-placement="left" title="Edit" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                <a href="<?=site_url('user/delete/'.$key->id); ?>" data-toggle="tooltip"
                data-placement="left" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
              </td>
              </tr>
            <?php endforeach;?>
          </table>
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
