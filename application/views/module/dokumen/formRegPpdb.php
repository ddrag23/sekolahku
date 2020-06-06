<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Formulir PPDB</title>
    
    <style>
body{
font-family: 'Times New Roman', Times, serif;
}
.page-break{ page-break-before:always;}
.logo img{
float: left;
width: 10em;
height: 9em;
}
.tittle p{
text-align: center;
text-transform: capitalize;
font-style: bold;
margin-bottom: 5px;
margin-top: 10px;
}
.t-1, .t-2{
font-size:18pt;
}
.t-3, .t-5{
font-size:11pt;
}
.t-3{
font-style:normal !important; 
}
.t-1{
color: blue;
}
.t-2, .t-3, .t-4, .t-5{
color:green;
}
.t-5 span{
margin-left:6em;
}
.break{
background-color:green;
height:30px;
}
.break p{
color:white;
text-align:center;
padding-top: 5px;
font-style:bold;
}
.judul p{
text-align:center;
font-size:15pt;
font-style:bold;
text-transform: uppercase;
}
.isi table{
margin-left:20px;
}
.isi-2 p{
line-height:2;
text-align:justify;
}
    </style>

</head>
<body>
    <div class="page-surat-pernyataan">
        <div class="cop">
            <div class="logo"><img src="assets/logo/logomi.png" alt=""></div>
            <div class="tittle">
                <p class="t-1">PANITIA PPDB TAHUN AJARAN <?= date('Y');?> / <?= date('Y')+1; ?></p>
                <p class="t-2">MADRASAH IBTIDAIYAH HASYIM ASY'ARI</p>
                <p class="t-3">AkteNotari : MunyatiSullam, SH. Nomor 04 Tanggal 10 April 2013</p>
                <p class="t-4">TERAKREDITASI A (AMAT BAIK)</p>
                <p class="t-5">NPSN : 60717038 <span>NSM : 111 23515 0096</span> </p>
            </div>
            <div class="break">
                <p>Alamat : JalanPahlawan No.01 PepeSedatiSidoarjoKodePos 61253 Telp.031-99038415</p>
            </div>
        </div>
        <div class="content">
            <div class="judul">
                <p>surat pernyataan</p>
            </div>
            <div class="isi">
                <p>Yang bertandatangan dibawah ini :</p>
               <table cellpadding="6">
                   <tr>
                       <td>Nama</td>
                       <td>:</td>
                       <td><?= $row->nama_ppdb;?></td>
                   </tr>
                   <tr>
                       <td>Calon Wali Murid dari</td>
                       <td>:</td>
                       <td><?= $row->nama_ortu_ppdb;?></td>
                   </tr>
                   <tr>
                       <td>Asal RA/TK</td>
                       <td>:</td>
                       <td><?= $row->asal_sekolah_ppdb;?></td>
                   </tr>
                   <tr>
                       <td>Alamat</td>
                       <td>:</td>
                       <td><?= $row->alamat_rumah_ppdb;?></td>
                   </tr>
               </table>
            </div>
            <div class="isi-2">
                <p>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Sesuai dengan ketentuan <span style="text-transform:capitalize">penerimaan peserta didik baru (PPDB) tahun ajaran <?= date('Y');?>/<?= date('Y')+1;?>MI hasyim asy'ari,</span> dengan ini menyatakan bahwa biaya yang sudah saya bayarkan (biaya pendaftaran dan biaya daftar ulang) tidak akan kami minta kembali apabila kami mengundurkan diri dengan alasan apapun</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Demikian surat pernyataan ini kami buat dengan penuh kesadaran dan tanpa ada paksaan dari pihak manapun</p>
            </div>
            <div class="footer">
                <table cellpadding="6" width="100%">
                    <tr>
                        <td width="60%"></td>
                        <td style="text-align:center;">Sidoarjo, <?php $tanggal = date('d-M-Y'); echo date('d-M-Y', strtotime($tanggal));?></td>
                    </tr>
                    <tr>
                        <td width="60%"></td>
                        <td style="text-align:center;">Calon Wali Murid</td>
                    </tr>
                </table>
                <br>
                <br>
                <table width="100%">
                     <tr>
                        <td width="60%"></td>
                        <td style="text-align:center;"><small style="font-size:7pt">Materai 6000</small></td>
                    </tr>
                </table>
                <br><br><br><br>
                <table width="100%">
                    <tr>
                        <td width="60%"></td>
                        <td style="text-align:center;">(.................................................)</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="page-break"></div>
     <div class="page-form-pendaftaran">
        <div class="cop">
            <div class="logo"><img src="assets/logo/logomi.png" alt=""></div>
            <div class="tittle">
                <p class="t-1">PANITIA PPDB TAHUN AJARAN <?= date('Y');?> / <?= date('Y')+1; ?></p>
                <p class="t-2">MADRASAH IBTIDAIYAH HASYIM ASY'ARI</p>
                <p class="t-3">AkteNotari : MunyatiSullam, SH. Nomor 04 Tanggal 10 April 2013</p>
                <p class="t-4">TERAKREDITASI A (AMAT BAIK)</p>
                <p class="t-5">NPSN : 60717038 <span>NSM : 111 23515 0096</span> </p>
            </div>
            <div class="break">
                <p>Alamat : JalanPahlawan No.01 PepeSedatiSidoarjoKodePos 61253 Telp.031-99038415</p>
            </div>
        </div>
        <div class="content">
            <div class="judul">
                <p>formulir pendaftaran peserta didik baru</p>
                <p><u>tahun ajaran <?= date('Y');?>/<?= date('Y')+1;?></u></p>
            </div>
            <div class="isi"> 
            <table style="margin-top:20px;" cellpadding="7">
                <tr>
                    <td>Nama Calon Peserta Didik</td>
                    <td>:</td>
                    <td><?= strtoupper($row->nama_ppdb);?></td>
                </tr>
                <tr>
                    <td>Panggilan</td>
                    <td>:</td>
                    <td><?= strtoupper($row->nama_panggilan);?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= strtoupper($row->gender_ppdb);?></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td><?= strtoupper($row->tempat_lahir_ppdb);?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= strtoupper($row->tanggal_lahir_ppdb);?></td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>:</td>
                    <td><?= strtoupper($row->asal_sekolah_ppdb);?></td>
                </tr>
                <tr>
                    <td>Alamat Sekolah</td>
                    <td>:</td>
                    <td><?= strtoupper($row->alamat_sekolah_ppdb);?></td>
                </tr>
                <tr>
                    <td>Alamat Rumah</td>
                    <td>:</td>
                    <td><?= strtoupper($row->alamat_rumah_ppdb);?></td>
                </tr>
                <tr>
                    <td>Nomor Telp Rumah / HP</td>
                    <td>:</td>
                    <td><?= strtoupper($row->no_hp_ppdb);?></td>
                </tr>
            </table>
            </div>
            <div class="footer">
            <table style="margin-top:5em;" width="100%">
                <tr>
                    <td width="60%"></td>
                    <td style="text-align:center;">pepe, <?php $tanggal = date('d-M-Y'); echo date('d-M-Y', strtotime($tanggal)); ?></td>
                </tr>
                <tr>
                    <td width="60%"></td>
                    <td style="text-align:center;">Calon Wali Murid</td>
                </tr>
                </table>
                <br><br><br><br>
            <table width="100%">
                <tr>
                    <td width="60%"></td>
                    <td style="text-align:center;">(...............................................................)</td>
                </tr>
              </table>
            </div>
        </div>
    </div> 
</body>
</html>
