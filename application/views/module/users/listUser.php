     <?php if($this->session->flashdata('hapus')) : ?>
      <div class="alert alert-success" role="alert">
         <?= $this->session->flashdata('hapus'); ?>
      </div>
      <?php endif; ?>
       <!-- start accordion -->
      <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
        <div class="panel">
          <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
            <h4 class="panel-title">Data List Admin</h4>
          </a>
          <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
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
          </div>
        </div>
        <div class="panel">
          <a class="panel-heading collapsed" role="tab" id="headingTwo1" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo">
            <h4 class="panel-title">Data List Panitia Peserta Didik Baru</h4>
          </a>
          <div id="collapseTwo1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              <p><strong>Data List Panitia Peserta Didik Baru</strong>
              </p>
              <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
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
          </div>
        </div>
        <div class="panel">
          <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree">
            <h4 class="panel-title">Data List Akun Peserta Didik Baru</h4>
          </a>
          <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
              <p><strong>Data List Akun Peserta Didik Baru</strong>
              </p>
              <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
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
          </div>
        </div>
      </div>
      <!-- end of accordion -->

