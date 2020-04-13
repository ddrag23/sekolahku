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