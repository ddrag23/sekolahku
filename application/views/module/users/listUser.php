    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List User</h3>
        <a href="<?=site_url('user/add'); ?>" class="btn btn-primary float-right"><i class="fa fa-user-plus"></i> Tambah</a>
      </div>
      <?php if($this->session->flashdata('hapus')) : ?>
      <div class="alert alert-success" role="alert">
         <?= $this->session->flashdata('hapus'); ?>
      </div>
      <?php endif; ?>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped datatables">
          <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Alamat</th>
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
            <td><?= $key->nama;?></td>
            <td><?= $key->alamat;?></td>
            <td><?= $key->level;?></td>
            <td><?= $key->is_active;?></td>
            <td width="160px" class="text-center">
              <a href="<?=site_url('user/edit/'.$key->id); ?>" class="btn btn-success btn-xs"><i class="fa fa-user-edit"></i> Ubah</a>

              <a href="<?=site_url('user/delete/'.$key->id); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>

            </td>
            
            </tr>
          <?php endforeach;?>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->