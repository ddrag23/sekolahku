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


 <a href="<?= site_url('user/add'); ?>">add</a>
 <?php if ($this->session->flashdata('sukses')): ?>
   <?= $this->session->flashdata('sukses'); ?>
 <?php endif ?>
 <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
  <thead>
  <tr>
    <th>No</th>
    <th>Username</th>
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
      </div>
    </div>
  </div>
</div>
