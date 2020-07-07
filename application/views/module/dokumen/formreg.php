<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Dokumen</title>
<style>

body{
font-family:'Times New Roman', Times, serif;
}
.content table tr td{
font-size:10pt;
}
.page-break{
page-break-before: always;
}
.cop{
margin-bottom: 10px;
}
.logo img{
float: left;
width: 10em;
height: 9em;
margin-left: 3em;
}
.title p{
text-align: center;
text-transform: capitalize;
font-style: bold;
margin-bottom: 5px;
margin-top: 10px;
}
.title .tsatu{
font-size: 14pt;
}
.title .tdua{
font-size: 18pt;
}
.title .ttiga{
font-size: 28pt;
}
.isi{
margin-top:20px; 
box-sizing: border-box;
}
.footer {
text-align:right;
}
.footer p{
font-size: 12pt;
}

.foo2{
margin-top:-15px;
margin-right:3.5em;
margin-bottom: 5em;
}
.foo3{
margin-top:-20px;
margin-right:2.4em;
}

</style>
</head>
<body>
<div class="form-daftar-ulang">
    <div class="cop">
            <img style="float:left" width="150px" height="150px" src="assets/logo/logomi.png" alt="">
            <img style="float:right" width="114px" height="151px" src="uploads/image/<?= $row->foto;?>" alt="">
        <div class="title">
            <p style="font-size:18pt; color:blue;"> FORMULIR DAFTAR ULANG</p>
            <p style="font-size:12pt"> PESERTA DIDIK BARU TAHUN AJARAN <?= date('Y'); ?> / <?=date('Y') + 1;?> </p> 
            <p style="font-size:20pt; color:green;"> MI HASYIM ASY'ARI PEPE </p>
            <p style="font-size:9pt"> Jalan Pahlawan No.01 Pepe Sedati Sidoarjo 61253 Telp. 031-99038415</p>
            <p style="font-size:6pt"> Email : <a href="#">mihaspepe@yahoo.com</a></p> 
        </div>
            <br>
            <hr size="4">
    </div>
<div class="content">
    <table>
        <tr>
            <td>Nomor Urut Pendaftaran</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?= $row->nama_siswa;?></td>
        </tr>
        <tr>
            <td>Asal RA/TK</td>
            <td>:</td>
            <td><?= $row->asal_sekolah;?></td>
        </tr>
        <tr>
            <td>NPSN RA/TK</td>
            <td>:</td>
            <td><?= $row->npsn;?></td>
        </tr>
        <tr>
            <td>Nomor NIK</td>
            <td>:</td>
            <td><?= $row->nik_siswa; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?= $row->gender_siswa; ?></td>
            <td>NIS</td>
            <td>: &nbsp;&nbsp;<?=$row->nis;?></td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td><?= $row->tempat_lahir;?>, <?= $row->tanggal_lahir;?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td><?= $row->agama;?></td>
        </tr>
        <tr>
            <td>Alamat Tempat Tinggal</td>
            <td>:</td>
            <td><?= $row->alamat_siswa;?></td>
        </tr>
        <tr>
            <td>Dusun</td>
            <td>:</td>
            <td><?= $row->dusun ;?></td>
            <td>RT</td>
            <td>: &nbsp;&nbsp;<?= $row->rt;?></td>
            <td>RW</td>
            <td>: &nbsp;&nbsp;<?= $row->rw;?></td>
        </tr>
        <tr>
            <td>Kelurahan / Desa</td>
            <td>:</td>
            <td><?= $row->desa;?></td>
            <td>Kode Pos</td>
            <td>: &nbsp;&nbsp;<?= $row->kodepos;?></td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td><?= $row->kecamatan;?></td>
        </tr>
        <tr>
            <td>Kabupaten</td>
            <td>:</td>
            <td><?= $row->kabupaten;?></td>
        </tr>
        <tr>
            <td>Provinsi</td>
            <td>:</td>
            <td><?= $row->provinsi;?></td>
        </tr>
        <tr>
            <td>Alat Transportasi Sekolah</td>
            <td>:</td>
            <td><?= $row->cara_kesekolah;?></td>
        </tr>
        <tr>
            <td>Jenis Tinggal</td>
            <td>:</td>
            <td><?= $row->tempat_tinggal;?></td>
        </tr>
        <tr>
            <td>No Telepon</td>
            <td>:</td>
            <td><?= $row->no_hp;?></td>
        </tr>
        <tr>
            <td>Nama Ayah Kandung</td>
            <td>:</td>
            <td><?= $row->nama_ayah;?></td>
        </tr>
        <tr>
            <td>Nomor KTP Ayah</td>
            <td>:</td>
            <td><?= $row->ktp_ayah;?></td>
        </tr>
        <tr>
            <td>Pekerjaan Ayah</td>
            <td>:</td>
            <td><?= $row->job_ayah;?></td>
        </tr>
        <tr>
            <td>pendidikan</td>
            <td>:</td>
            <td><?= $row->pendidikan_ayah;?></td>
        </tr>
        <tr>
            <td>Penghasilan Bulanan</td>
            <td>:</td>
            <td><?= $row->gaji;?></td>
        </tr>
        <tr>
            <td>Nama Ibu Kandung</td>
            <td>:</td>
            <td><?= $row->nama_ibu;?></td>
        </tr>
        <tr>
            <td>Nomor KTP Ibu</td>
            <td>:</td>
            <td><?= $row->ktp_ibu;?></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td><?= $row->job_ibu;?></td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td><?= $row->pendidikan_ibu;?></td>
        </tr>
        <tr>
            <td>Penghasilan Bulanan</td>
            <td>:</td>
            <td><?= $row->gaji;?></td>
        </tr>
        <tr>
            <th style="font-size:10pt;text-align:center;" colspan="10">&nbsp; &nbsp; &nbsp;APABILA TINGGGAL BERSAMA WALI</th>
        </tr>
        <tr>
            <td>Nama Wali</td>
            <td>:</td>
            <td><?= $row->nama_wali;?></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td><?= $row->job_wali;?></td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td><?= $row->pendidikan_wali;?></td>
        </tr>
        <tr>
            <td>Penghasilan Perbulan</td>
            <td>:</td>
            <td><?=$row->gaji_wali;?></td>
        </tr>
        <tr>
            <td>Tinggi Badan</td>
            <td>:</td>
            <td><?= $row->tb;?> cm</td>
            <td>Berat Badan</td>
            <td>:&nbsp;&nbsp;<?= $row->bb;?> kg</td>
        </tr>
        <tr>
            <td>Jarak Tempat Tinggal ke Sekolah</td>
            <td>:</td>
            <td><?= $row->jarak_sekolah;?></td>
        </tr>
        <tr>
            <td>Waktu Tempu Berangkat Ke Sekolah</td>
            <td>:</td>
            <td><?= $row->waktu;?></td>
        </tr>
        <tr>
            <td>Jumlah Saudara Kandung</td>
            <td>:</td>
            <td><?=$row->jumlah_saudara;?></td>
        </tr>
        <tr>
            <td>Hobby</td>
            <td>:</td>
            <td><?=$row->hobi;?></td>
        </tr>
        <tr>
            <td>Cita-Cita</td>
            <td>:</td>
            <td><?= $row->cita;?></td>
        </tr>
    </table>
<table width="100%">
    <tr>
        <td width="60%"></td>
        <td style="text-align:center;">pepe, <?php $tanggal = date('Y-m-d'); echo date('d F Y', strtotime($tanggal)); ?></td>
    </tr>
    <tr>
        <td width="60%"></td>
        <td style="text-align:center;">Orang Tua/Wali Murid</td>
    </tr>
    </table>
    <br><br><br><br>
<table width="100%">
    <tr>
        <td width="60%"></td>
        <td style="text-align:center;">(...............................................................)<br><small>Nama Jelas dan Tanda Tangan</small></td>
    </tr>
  </table>
</div>
</div>

<div class="page-break"></div>
<div class="form-uks">
    <div class="cop">
        <div class="logo">
            <img src="assets/logo/logouks.png" alt="">
         </div>
        <div class="title">
            <p class="tsatu"> FORMULIR DATA UKS</p>
            <p class="tdua"> PESERTA DIDIK BARU</p>
            <p class="ttiga"> MI HASYIM ASY'ARI PEPE </p>
            <p class="tempat"> PESERTA DIDIK BARU</p>
        </div>
    </div>
<hr>
<div class="isi">
  <table cellpadding="6">
    <tr>
      <td>Nama Peserta Didik</td>
      <td>:</td>
      <td><?=$row->nama_siswa;?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?=wordwrap($row->alamat_siswa,60,'<br>',true);?></td> 
    </tr>
    <tr>
      <td>Kelas</td>
      <td>:</td>
      <td><?=$row->nama_kelas;?></td>
    </tr>
    <tr>
      <td>Berat Badan</td>
      <td>:</td>
      <td><?=$row->bb;?></td>
    </tr>
    <tr>
      <td>Golongan Darah</td>
      <td>:</td>
      <td><?=$row->gol_darah;?></td>
    </tr>
     <tr>
      <td>Penyakit Serius</td>
      <td>:</td>
      <td><?=$row->penyakit;?></td>
    </tr>
     <tr>
      <td>Asal Sekolah</td>
      <td>:</td>
      <td><?=$row->asal_sekolah;?></td>
    </tr>
     <tr>
      <td>Keadaan / Status</td>
      <td>:</td>
      <td><?=$row->keadaan_status;?></td>
    </tr>
     <tr>
      <td>Tempat Tinggal</td>
      <td>:</td>
      <td><?=$row->tempat_tinggal;?></td>
    </tr>
   <tr>
      <td>Jara Ke Sekolah</td>
      <td>:</td>
      <td><?=$row->jarak_sekolah;?></td>
    </tr>
    <tr>
      <td>Cara Ke Sekolah</td>
      <td>:</td>
      <td><?=$row->tempat_mandi;?></td>
    </tr>
    <tr>
      <td>Pengadaan Air Mandi</td>
      <td>:</td>
      <td><?=$row->air_mandi;?></td>
    </tr>
    <tr>
      <td>Pengadaan Air Minum</td>
      <td>:</td>
      <td><?=$row->air_minum;?></td>
    </tr>
    <tr>
      <td>Bangunan Rumah</td>
      <td>:</td>
      <td><?=$row->bangunan;?></td>
    </tr>
      <tr>
        <td>Lantai Rumah</td>
      <td>:</td>
      <td><?=$row->lantai;?></td>
    </tr>
    <tr>
      <td>Penerangan Rumah</td>
      <td>:</td>
      <td><?=$row->penerangan;?></td>
    </tr>
    <tr>
      <td>Pekerjaan Orang Tua</td>
      <td>:</td>
      <td><?=$row->job_ayah;?></td>
    </tr>
  </table>
</div>
<div class="footer">
<table width="100%">
    <tr>
        <td width="60%"></td>
        <td style="text-align:center;">pepe, <?php $tanggal = date('Y-m-d'); echo date('d F Y', strtotime($tanggal)); ?></td>
    </tr>
    <tr>
        <td width="60%"></td>
        <td style="text-align:center;">Orang Tua/Wali Murid</td>
    </tr>
    </table>
    <br><br><br><br>
<table width="100%">
    <tr>
        <td width="60%"></td>
        <td style="text-align:center;">(...............................................................)<br><small>Nama Jelas dan Tanda Tangan</small></td>
    </tr>
  </table>
</div>
</div>
</body>
</html>
