<div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
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
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Tanggal Daftar Ulang</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($query as $value): ?>
            <tr>
            <td><?= $no++;?></td>
            <td><?= $value->nama_siswa;?></td>
            <td><?= $value->alamat_siswa;?></td>
            <td><?= $value->no_hp;?></td>
            <td><?= date('d-M-Y',strtotime($value->date_created));?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
            </div>
      </div>
    </div>
</div>
