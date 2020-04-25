     <?php if($this->session->flashdata('sukses')) : ?>
      <div class="alert alert-success" role="alert">
         <?= $this->session->flashdata('sukses'); ?>
      </div>
      <?php endif; ?>
      <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%"> 
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Status Siswa</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=0; foreach ($try as $key) :?>
          <tr>
           <td><?= ++$no;?></td>
            <td>
              <img src="<?= base_url('uploads/image/'.$key->foto)?>" alt="" style="width: 100%">
              </td>
            <td><?= $key->nis;?></td>
            <td><?= $key->nama_siswa;?></td>
            <td><?= $key->alamat_siswa;?></td>
            <td><?= $key->gender_siswa;?></td>
            <td><?= $key->nama_kelas;?></td>
            <td><?= $key->status;?></td>
             <td wid_siswath="160px" class="text-center">
              <a href="<?=site_url('siswa/printpdf/'.$key->id_siswa); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Print</a>
              <a href="<?=site_url('siswa/edit/'.$key->id_siswa); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Ubah</a>
              <a href="<?=site_url('siswa/delete/'.$key->id_siswa); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
