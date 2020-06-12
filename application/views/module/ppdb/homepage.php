<div><?= $this->session->flashdata('sukses') ;?></div>
<?= print_r($nilai);?>
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><?= $page ?></h2>
            <ul class="nav navbar-right panel_toolbox">
             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
             <li><a class="close-link"><i class="fa fa-close"></i></a></li>
             <li><a href="<?= site_url('ppdb/printPdf/'. $query['id_ppdb']);?>" class="close-link"><i class="fa fa-print"></i></a></li>
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
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><?= $page ?></h2>
            <ul class="nav navbar-right panel_toolbox">
             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
             <li><a class="close-link"><i class="fa fa-close"></i></a></li>
             <li><a href="<?= site_url('ppdb/printPdfSiswa/'. $siswa['id_siswa']);?>" class="close-link"><i class="fa fa-print"></i></a></li>
             </ul>
             <div class="clearfix"></div>
             </div>
            <div class="x_content">
            <!-- content starts here -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  <table class="table">
                      <tbody>
                        <tr>
                          <th>NIS</th>
                          <td>:</td>
                          <td><?= $siswa['nis'];?></td>
                        </tr>
                        <tr>
                          <th>Nama</th>
                          <td>:</td>
                          <td><?= $siswa['nama_siswa'];?></td>
                        </tr>
                       <tr>
                          <th>Jenis Kelamin<br>Agama</th>
                          <td>:</td>
                          <td><?= $siswa['gender_siswa'];?><br><?= $siswa['agama'];?></td>
                        </tr>
                        <tr>
                          <th>Alamat</th>
                          <td>:</td>
                          <td><?= $siswa['alamat_siswa']; ?></td>
                        </tr>
                        <tr>
                          <th>Dusun</th>
                          <td>:</td>
                          <td><?= $siswa['dusun'];?></td>
                        </tr>
                        <tr>
                          <th>RT<br>RW</th>
                          <td>:</td>
                          <td><?= $siswa['rt'];?><br><?= $siswa['rw'];?></td>
                        </tr>
                        <tr>
                          <th>Desa</th>
                          <td>:</td>
                          <td><?= $siswa['desa'];?></td>
                        </tr>
                        <tr>
                          <th>Kecamatan <br> Kodepos</th>
                          <td>:</td>
                          <td><?= $siswa['kecamatan']?> <br> <?= $siswa['kodepos']?> </td>
                        </tr>
                        <tr>
                          <th>Kabupaten</th>
                          <td>:</td>
                          <td><?= $siswa['kabupaten']?></td>
                        </tr>
                        <tr>
                          <th>Provinsi</th>
                          <td>:</td>
                          <td><?=$siswa['provinsi'];?></td>
                        </tr>
                        <tr>
                          <th>TTL</th>
                          <td>:</td>
                          <td><?= $siswa['tempat_lahir']?>, <?= $siswa['tanggal_lahir'];?></td>
                        </tr>
                        <tr>
                          <th>Status Siswa</th>
                          <td>:</td>
                          <td><?= $siswa['status'];?></td>
                        </tr>
                        <tr>
                          <th>Umur</th>
                          <td>:</td>
                          <td><?= $siswa['umur'];?></td>
                        </tr>
                        <tr>
                          <th>Berat Badan<br>Tinggi Badan</th>
                          <td>:</td>
                          <td><?= $siswa['bb'];?><br><?= $siswa['tb'];?></td>
                        </tr>
                        <tr>
                          <th>Golongan Darah</th>
                          <td>:</td>
                          <td><?= $siswa['gol_darah'];?></td>
                        </tr>
                        <tr>
                          <th>Penyakit Serius</th>
                          <td>:</td>
                          <td><?= $siswa['penyakit'];?></td>
                        </tr>
                        <tr>
                          <th>Jumlah Saudara</th>
                          <td>:</td>
                          <td><?= $siswa['jumlah_saudara'];?></td>
                        </tr>
                        <tr>
                          <th>Asal Sekolah<br>Nama Asal Sekolah</th>
                          <td>:</td>
                          <td><?= $siswa['asal_sekolah'];?><br><?= $siswa['nama_sekolah_asal'];?></td>
                        </tr>
                        <tr>
                          <th>Hobi</th>
                          <td>:</td>
                          <td><?= $siswa['hobi'];?></td>
                        </tr>
                        <tr>
                          <th>Cita-Cita</th>
                          <td>:</td>
                          <td><?= $siswa['cita'];?></td>
                        </tr>
                        <tr>
                          <th scope="row" colspan="3" style="text-align:center;">Wali</th>
                        </tr>
                        <tr>
                          <th>Nama</th>
                          <td>:</td>
                          <td><?= $siswa['nama_wali'];?></td>
                        </tr>
                        <tr>
                          <th>Pendidikan</th>
                          <td>:</td>
                          <td><?= $siswa['pendidikan_wali'];?></td>
                        </tr>
                        <tr>
                          <th>Pekerjaan</th>
                          <td>:</td>
                          <td><?= $siswa['job_wali'] ;?></td>
                        </tr>
                        <tr>
                            <th>Gaji Wali</th>
                            <td>:</td>
                            <td><?= $siswa['gaji_wali'];?></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <table class="table">
                      <tr>
                        <th>Foto</th>
                        <td>:</td>
                        <td>
                        <img src="<?= base_url('uploads/image/'.$siswa['foto']);?>" style="margin:0;width:150px;height:170px;" alt="">
                        </td>
                      </tr>
                    </table>
                    <div class="clearfix"></div>
                    <table class="table">
                      <tbody>
                        <tr>
                          <th colspan="3" style="text-align:center;" scope="row">Ayah</th>
                          </tr>
                           <tr>
                            <th>KTP</th>
                            <td>:</td>
                            <td><?= $siswa['ktp_ayah'];?></td>
                          </tr>
                          <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td><?= $siswa['nama_ayah'];?></td>
                          </tr>
                          <tr>
                            <th>Pendidikan Ayah</th>
                            <td>:</td>
                            <td><?= $siswa['pendidikan_ayah'];?></td>
                          </tr>
                          <tr>
                            <th>Pekerjaan Ayah</th>
                            <td>:</td>
                            <td><?= $siswa['job_ayah'];?></td>
                          </tr>
                          <tr>
                          <th colspan="3" style="text-align:center;" scope="row">Ibu</th>
                          </tr>
                        <tr>
                            <th>Gaji Ayah</th>
                            <td>:</td>
                            <td><?= $siswa['gaji'];?></td>
                        </tr>
                          <tr>
                            <th>KTP</th>
                            <td>:</td>
                            <td><?= $siswa['ktp_ibu'];?></td>
                          </tr>
                          <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td><?= $siswa['nama_ibu'];?></td>
                          </tr>
                          <tr>
                            <th>Pendidikan Ibu</th>
                            <td>:</td>
                            <td><?= $siswa['pendidikan_ibu'];?></td>
                          </tr>
                          <tr>
                            <th>Pekerjaan Ibu</th>
                            <td>:</td>
                            <td><?= $siswa['job_ibu'];?></td>
                          </tr>
                        <tr>
                            <th>Gaji Ibu</th>
                            <td>:</td>
                            <td><?= $siswa['gaji_ibu'];?></td>
                        </tr>
                          <tr>
                            <th>No Telepon / No Whatsapp</th>
                            <td>:</td>
                            <td><?= $siswa['no_hp'];?></td>
                          </tr>
                          <tr>
                          <th colspan="3" style="text-align:center" scope="row">Data UKS</th>
                          </tr>
                        <tr>
                          <th>Keadaan Status</th>
                          <td>:</td>
                          <td><?= $siswa['keadaan_status'];?></td>
                          </tr>
                          <tr>
                            <th>Tempat Tinggal</th>
                            <td>:</td>
                            <td><?= $siswa['tempat_tinggal'];?></td>
                          </tr>
                          <tr>
                            <th>Jarak ke Sekolah</th>
                            <td>:</td>
                            <td><?= $siswa['jarak_sekolah'];?></td>
                          </tr>
                          <tr>
                            <th>Cara ke Sekolah</th>
                            <td>:</td>
                            <td><?= $siswa['cara_kesekolah'];?></td>
                          </tr>
                          <tr>
                            <th>Tempat Mandi</th>
                            <td>:</td>
                            <td><?= $siswa['tempat_mandi'];?></td>
                          </tr>
                          <tr>
                            <th>Pengadaan Air Mandi</th>
                            <td>:</td>
                            <td><?= $siswa['air_mandi'];?></td>
                          </tr>
                          <tr>
                            <th>Pengadaan Air Minum</th>
                            <td>:</td>
                            <td><?= $siswa['air_minum'] ;?></td>
                          </tr>
                          <tr>
                            <th>Bangunan Rumah</th>
                            <td>:</td>
                            <td><?= $siswa['bangunan'];?></td>
                          </tr>
                          <tr>
                            <th>Lantai Rumah</th>
                            <td>:</td>
                            <td><?= $siswa['lantai'];?></td>
                          </tr>
                          <tr>
                            <th>Penerangan Rumah</th>
                            <td>:</td>
                            <td><?= $siswa['penerangan'];?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>

