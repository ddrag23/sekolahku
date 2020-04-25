<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Dokumen</title>
<style>
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
font-size: 14px;
}
.title .tdua{
font-size: 18px;
}
.title .ttiga{
font-size: 28px;
}
/* hr{ */
/* margin-top: 30px; */
/* } */
.isi{
margin-top:20px; 
}
.ttd p{
text-align: left;
}
</style>
</head>
<body>
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
  <table cellpadding="5">
    <tr>
      <td>Nama Peserta Didik</td>
      <td>:</td>
      <td><?=$row->nama_siswa;?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?=$row->alamat_siswa;?></td>
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
<div class="ttd">
<p><Pepe, <?= strtotime(date('Y-m-d'));?></p>
<p>Orang Tua/Wali Murid</p>
<p>(...................................................................)</p>
<p>Nama Jelas dan Tanda Tangan</p>
</div>
</div>
</body>
</html>
