<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link href="<?= base_url() ?>assets/template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/template/vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<style>
		.menu-content h1 {
			text-transform: uppercase;
			font-weight: bold;
		}

		.menu-content p {
			font-size: 14px;
			color: #a3a3a3;
		}

		.navbar-brand {
			font-family: viga;
			font-size: 32px;
			text-transform: uppercase;
		}

		.navbar-brand,
		.nav-link {
			color: white !important;
			text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
		}

		/* DEKSTOP VERSION */
		@media (min-width: 992px) {

			.navbar-brand,
			.nav-link {
				color: white !important;
				text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
			}

			.nav-link-fixed {
				color: black !important;
			}

			.nav-link {
				text-transform: uppercase;
				margin-right: 30px;
			}

			.nav-link:hover::after {
				content: '';
				display: block;
				border-bottom: 3px solid #0b63DC;
				width: 50%;
				margin: auto;
				padding-bottom: 5px;
				margin-bottom: -8px;
			}
		}

		.menu-content {
			margin-top: 100px;
		}
	</style>
</head>

<body>
	<!-- navbar start -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark" id="mynavbar">
		<div class="container">
			<a class="navbar-brand" href="<?= site_url(); ?>">mi hasyim asy'ari</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav ml-auto">
					<a class="nav-item nav-link" href="<?= site_url(); ?>">Home <span class="sr-only">(current)</span></a>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							PPDB
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#gelombang">Gelombang</a>
							<a class="dropdown-item" href="#persyaratan">Persyaratan</a>
							<a class="dropdown-item" href="#prestasi">Prestasi</a>
							<a class="dropdown-item" href="<?= base_url('uploads/dokumen/pdf/') . $pengumuman; ?>" target="_blank">Pengumuman</a>
						</div>
					</li>
					<a class="nav-item nav-link" href="<?= site_url('welcome/dataSiswa') ?>">Siswa</a>
					<a class="nav-item nav-link" href="<?= site_url('welcome/alumni') ?>">Alumni</a>

					<a class="nav-item btn btn-primary tombol" href="#follow">Ikuti Kami</a>
				</div>
			</div>
		</div>
	</nav>
	<!-- navbar end -->

	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content col-lg-8">
				<div class="title text-center">
					<h1>Data Siswa</h1>
					<p>Data Siswa di MI Hasyim Asy'ari</p>
				</div>
			</div>
			<div class="col-md-12 mt-3">
				<form action="" method="get">
					<div class="input-group mb-3">
						<input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari Siswa" autocomplete="off">
						<div class="input-group-append">
							<a href="<?= site_url('welcome/dataSiswa'); ?>" class="btn btn-success"><i class="fa fa-refresh"></i> Refresh </a>
						</div>
					</div>
				</form>
				<div class="table-content col-md-12" style="height: 100px;">
					<table id="datatable" class="table table-bordered table-hover table-condensed " style="width:100%">
						<thead class="thead-dark">
							<th scope="col" class="text-center">No</th>
							<th scope="col" class="text-center">Nama Alumni</th>
							<th scope="col" class="text-center">Jenis Kelamin</th>
							<th scope="col" class="text-center">Tahun Ajaran</th>
						</thead>
						<tbody id="tbody">
							<?php $no = $this->uri->segment(3) + 1;
							foreach ($query as $key) : ?>
								<tr>
									<th scope="row" class="text-center"><?= $no++ ?></th>
									<td class="text-center"><?= $key->nama_siswa; ?></td>
									<td class="text-center"><?= $key->gender_siswa; ?></td>
									<td class="text-center"><?= $key->tahun_ajaran; ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<div class="row">
						<div class="col">
							<!--Tampilkan pagination-->
							<?= $this->pagination->create_links(); ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<script src="<?= base_url() ?>assets/template/vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url() ?>assets/template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url(); ?>assets/template/build/js/data_siswa.js"></script>
</body>

</html>