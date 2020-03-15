  <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar siswa</h3>
        <a href="<?=site_url('siswa/add'); ?>" class="btn btn-primary float-right"><i class="fa fa-user-plus"></i> Tambah</a>

      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id_siswa="example1" class="table table-bordered table-hover datatables">
          <thead>
          <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Action</th>
          </tr>
          </thead>
           <?php $no =0; foreach($query as $key):?>
          <tr>
            <td><?= ++$no;?></td>
            <td><?= $key->nis;?></td>
            <td><?= $key->nama;?></td>
            <td><?= $key->alamat;?></td>
            <td><?= $key->gender;?></td>
            <td><?= $key->nama_kelas;?></td>
            <td><?= $key->nama_status;?></td>
            <td wid_siswath="160px" class="text-center">
              <a href="<?=site_url('siswa/edit/'.$key->id_siswa); ?>" class="btn btn-success btn-xs"><i class="fas fa-edit"></i> Ubah</a>

              <a href="<?=site_url('siswa/delete/'.$key->id_siswa); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>

            </td>
          </tr>
          <?php endforeach; ?>
          
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->


