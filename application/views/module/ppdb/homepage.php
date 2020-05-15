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
                  <table class="table">
                    <h6 class="text-center">Biodata PPDB</h6>
                    <div class="clearfix"></div>
                      <tbody>
                        <tr>
                          <th>Nama Lengkap</th>
                          <td>:</td>
                          <td><?= $query['nama_ppdb'];?></td>
                        </tr>
                        <tr>
                          <th>Nama Panggilan</th>
                          <td>:</td>
                          <td><?= $query['nama_panggilan'];?></td>
                        </tr>
                        <tr>
                          <th>Jenis Kelamin</th>
                          <td>:</td>
                          <td><?= $query['gender_ppdb'];?></td>
                        </tr>
                        <tr>
                          <th>TTL</th>
                          <td>:</td>
                          <td><?= $query['tempat_lahir_ppdb'];?>, <?= $query['tanggal_lahir_ppdb'];?></td>
                        </tr>
                        <tr>
                        <tr>
                          <th>Alamat Rumah</th>
                          <td>:</td>
                          <td><?= $query['alamat_rumah_ppdb'];?></td>
                        </tr>
                        <tr>
                          <th>No Telepon <small>Beserta Whatsapp</small></th>
                          <td>:</td>
                          <td><?= $query['no_hp_ppdb'];?></td>
                        </tr>
                        <tr>
                          <th>Nama Orang Tua</th>
                          <td>:</td>
                          <td><?= $query['nama_ortu_ppdb'];?></td>
                        </tr>
                          <th>Asal Sekolah</th>
                          <td>:</td>
                          <td><?= $query['asal_sekolah_ppdb'];?></td>
                        </tr>
                        <tr>
                          <th>Alamat Sekolah</th>
                          <td>:</td>
                          <td><?= $query['alamat_sekolah_ppdb'];?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
