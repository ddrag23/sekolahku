<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
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
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  <table class="table">
                      <tbody>
                        <tr>
                          <th>NIS</th>
                          <td>:</td>
                          <td><?= $query['nis'];?></td>
                        </tr>
                        <tr>
                          <th>Nama</th>
                          <td>:</td>
                          <td><?= $query['nama_siswa'];?></td>
                        </tr>
                       <tr>
                          <th>Jenis Kelamin<br>Agama</th>
                          <td>:</td>
                          <td><?= $query['gender_siswa'];?><br><?= $query['agama'];?></td>
                        </tr>
                        <tr>
                          <th>Alamat</th>
                          <td>:</td>
                          <td><?= $query['alamat_siswa']; ?></td>
                        </tr>
                        <tr>
                          <th>Dusun</th>
                          <td>:</td>
                          <td><?= $query['dusun'];?></td>
                        </tr>
                        <tr>
                          <th>RT<br>RW</th>
                          <td>:</td>
                          <td><?= $query['rt'];?><br><?= $query['rw'];?></td>
                        </tr>
                        <tr>
                          <th>Desa</th>
                          <td>:</td>
                          <td><?= $query['desa'];?></td>
                        </tr>
                        <tr>
                          <th>Kecamatan</th>
                          <td>:</td>
                          <td><?= $query['kecamatan']?></td>
                        </tr>
                        <tr>
                          <th>Kabupaten</th>
                          <td>:</td>
                          <td><?= $query['kabupaten']?></td>
                        </tr>
                        <tr>
                          <th>Provinsi</th>
                          <td>:</td>
                          <td><?=$query['provinsi'];?></td>
                        </tr>
                        <tr>
                          <th>TTL</th>
                          <td>:</td>
                          <td><?= $query['tempat_lahir']?>, <?= $query['tanggal_lahir'];?></td>
                        </tr>
                        <tr>
                          <th>Status Siswa</th>
                          <td>:</td>
                          <td><?= $query['status'];?></td>
                        </tr>
                        <tr>
                          <th>Umur</th>
                          <td>:</td>
                          <td><?= $query['umur'];?></td>
                        </tr>
                        <tr>
                          <th>Berat Badan<br>Tinggi Badan</th>
                          <td>:</td>
                          <td><?= $query['bb'];?><br><?= $query['tb'];?></td>
                        </tr>
                        <tr>
                          <th>Golongan Darah</th>
                          <td>:</td>
                          <td><?= $query['gol_darah'];?></td>
                        </tr>
                        <tr>
                          <th>Penyakit Serius</th>
                          <td>:</td>
                          <td><?= $query['penyakit'];?></td>
                        </tr>
                        <tr>
                          <th>Jumlah Saudara</th>
                          <td>:</td>
                          <td><?= $query['jumlah_saudara'];?></td>
                        </tr>
                        <tr>
                          <th>Asal Sekolah<br>Nama Asal Sekolah</th>
                          <td>:</td>
                          <td><?= $query['asal_sekolah'];?><br><?= $query['nama_sekolah_asal'];?></td>
                        </tr>
                        <tr>
                          <th>Hobi</th>
                          <td>:</td>
                          <td><?= $query['hobi'];?></td>
                        </tr>
                        <tr>
                          <th>Cita-Cita</th>
                          <td>:</td>
                          <td><?= $query['cita'];?></td>
                        </tr>
                        <tr>
                          <th scope="row" colspan="3" style="text-align:center;">Wali</th>
                        </tr>
                        <tr>
                          <th>Nama</th>
                          <td>:</td>
                          <td><?= $query['nama_wali'];?></td>
                        </tr>
                        <tr>
                          <th>Pendidikan</th>
                          <td>:</td>
                          <td><?= $query['pendidikan_wali'];?></td>
                        </tr>
                        <tr>
                          <th>Pekerjaan</th>
                          <td>:</td>
                          <td><?= $query['job_wali'] ;?></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <table class="table">
                      <tr>
                        <td>Foto</td>
                        <td>:</td>
                        <td>
                        <img src="<?= base_url('uploads/image/'.$query['foto']);?>" style="margin:0;width:150px;height:170px;" alt="">
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
                            <td><?= $query['ktp_ayah'];?></td>
                          </tr>
                          <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td><?= $query['nama_ayah'];?></td>
                          </tr>
                          <tr>
                            <th>Pendidikan Ayah</th>
                            <td>:</td>
                            <td><?= $query['pendidikan_ayah'];?></td>
                          </tr>
                          <tr>
                            <th>Pekerjaan Ayah</th>
                            <td>:</td>
                            <td><?= $query['job_ayah'];?></td>
                          </tr>
                          <tr>
                          <th colspan="3" style="text-align:center;" scope="row">Ibu</th>
                          </tr>
                          <tr>
                            <th>KTP</th>
                            <td>:</td>
                            <td><?= $query['ktp_ibu'];?></td>
                          </tr>
                          <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td><?= $query['nama_ibu'];?></td>
                          </tr>
                          <tr>
                            <th>Pendidikan Ibu</th>
                            <td>:</td>
                            <td><?= $query['pendidikan_ibu'];?></td>
                          </tr>
                          <tr>
                            <th>Pekerjaan Ibu</th>
                            <td>:</td>
                            <td><?= $query['job_ibu'];?></td>
                          </tr>
                          <tr>
                            <th>Gaji</th>
                            <td>:</td>
                            <td><?= $query['gaji'];?></td>
                          </tr>
                          <tr>
                            <th>No Telepon / No Whatsapp</th>
                            <td>:</td>
                            <td><?= $query['no_hp'];?></td>
                          </tr>
                          <tr>
                          <th colspan="3" style="text-align:center" scope="row">Data UKS</th>
                          </tr>
                        <tr>
                          <th>Keadaan Status</th>
                          <td>:</td>
                          <td><?= $query['keadaan_status'];?></td>
                          </tr>
                          <tr>
                            <th>Tempat Tinggal</th>
                            <td>:</td>
                            <td><?= $query['tempat_tinggal'];?></td>
                          </tr>
                          <tr>
                            <th>Jarak ke Sekolah</th>
                            <td>:</td>
                            <td><?= $query['jarak_sekolah'];?></td>
                          </tr>
                          <tr>
                            <th>Cara ke Sekolah</th>
                            <td>:</td>
                            <td><?= $query['cara_kesekolah'];?></td>
                          </tr>
                          <tr>
                            <th>Tempat Mandi</th>
                            <td>:</td>
                            <td><?= $query['tempat_mandi'];?></td>
                          </tr>
                          <tr>
                            <th>Pengadaan Air Mandi</th>
                            <td>:</td>
                            <td><?= $query['air_mandi'];?></td>
                          </tr>
                          <tr>
                            <th>Pengadaan Air Minum</th>
                            <td>:</td>
                            <td><?= $query['air_minum'] ;?></td>
                          </tr>
                          <tr>
                            <th>Bangunan Rumah</th>
                            <td>:</td>
                            <td><?= $query['bangunan'];?></td>
                          </tr>
                          <tr>
                            <th>Lantai Rumah</th>
                            <td>:</td>
                            <td><?= $query['lantai'];?></td>
                          </tr>
                          <tr>
                            <th>Penerangan Rumah</th>
                            <td>:</td>
                            <td><?= $query['penerangan'];?></td>
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

