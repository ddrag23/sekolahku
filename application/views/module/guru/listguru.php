<?php if ($this->session->flashdata('sukses')):?>
  <?= $this->session->flashdata('sukses'); ?>
  <?php endif;?>
  <a href="<?= site_url('master/addGuru'); ?>">add</a>
      <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%"> 
        <thead>
          <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Alamat Guru</th>
            <th>Jenis Kelamin</th>
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
            <td><?= $key->gender;?></td>
             <td wid_siswath="160px" class="text-center">
              <a href="<?=site_url('siswa/edit/'.$key->id_guru); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Ubah</a>

              <a href="<?=site_url('siswa/delete/'.$key->id_guru); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>

            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>