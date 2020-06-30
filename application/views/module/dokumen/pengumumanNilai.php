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
.content table,  td,th{
font-size:14pt;
border:1px solid black;
text-align:center;
border-collapse:collapse;

}
.content td{
padding:10px;
}
.content th{
    padding:15px;
}
.thead-bg{
    background-color:#343A40;
    color:white;
}
.page-break{
page-break-before: always;
}
.cop{
margin-bottom: 10px;
}

.title p{
text-align: center;
text-transform: capitalize;
font-style: bold;
margin-bottom: 5px;
margin-top: 10px;
}

</style>
</head>
<body>
<div class="form-daftar-ulang">
    <div class="cop">
            <img style="float:left" width="150px" height="150px" src="assets/logo/logomi.png" alt="">
        <div class="title">
            <p style="font-size:18pt; color:blue;"> PENGUMUMAN HASIL SELEKSI</p>
            <p style="font-size:12pt"> PESERTA DIDIK BARU TAHUN AJARAN <?= date('Y'); ?> / <?=date('Y') + 1;?> </p> 
            <p style="font-size:20pt; color:green;"> MI HASYIM ASY'ARI PEPE </p>
            <p style="font-size:9pt"> Jalan Pahlawan No.01 Pepe Sedati Sidoarjo 61253 Telp. 031-99038415</p>
            <p style="font-size:6pt"> Email : <a href="#">mihaspepe@yahoo.com</a></p> 
        </div>
            <br>
            <hr size="4">
    </div>
<div class="content">
    <table width="100%">
        <thead class="thead-bg">
          <tr>
            <th width="10px;">No</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Seleksi</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 0;foreach ($result as $value): ?>
           <tr>
           <td><?= ++$no;?></td>
            <td><?= $value->nama_ppdb;?></td>
            <td><?= $value->jum_nilai;?></td>
            <td><?= $value->status_ppdb;?></td>
           </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
