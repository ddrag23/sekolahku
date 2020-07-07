-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2020 at 11:07 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahku`
--

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `id_gelombang` int(11) NOT NULL,
  `sesi_gelombang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akhir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`id_gelombang`, `sesi_gelombang`, `awal`, `akhir`, `biaya`, `tahun_ajaran`, `created_by`, `date_created`, `modified_by`, `modified_date`) VALUES
(1, 'gelombang 1', '12-06-2020', '12-07-2020', '100000', '2020/2021', 37, '2020-06-29 14:34:13', 37, '2020-06-29 14:34:13'),
(7, 'gelombang 2', '12-07-2020', '12-08-2020', '150000', '2020 / 2021', 37, '2020-06-29 10:21:31', NULL, '2020-06-29 17:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama_guru` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_guru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_guru` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp_guru` int(12) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `alamat_guru`, `gender_guru`, `no_hp_guru`, `created_by`, `date_created`, `modified_by`, `modified_date`) VALUES
(6, 98239813, 'sopyan', 'sidoarjo', 'laki-laki', 929292, 37, '2020-06-28 02:54:24', 0, '0000-00-00 00:00:00'),
(7, 23131231, 'paijo', 'gresik', 'laki-laki', 82828, 37, '2020-06-28 02:54:42', 0, '0000-00-00 00:00:00'),
(8, 4323411, 'lilis', 'porong', 'perempuan', 88888, 37, '2020-06-28 02:55:02', 0, '0000-00-00 00:00:00'),
(9, 12313131, 'didik', 'keboguyang', 'laki-laki', 929292, 37, '2020-06-28 05:36:32', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `nama_kelas` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `guru_id`, `nama_kelas`, `created_by`, `date_created`, `modified_by`, `modified_date`) VALUES
(6, 6, '1A', 37, '2020-06-28 02:55:13', NULL, '0000-00-00 00:00:00'),
(7, 7, '1B', 37, '2020-06-28 02:55:24', NULL, '0000-00-00 00:00:00'),
(8, 8, '2A', 37, '2020-06-28 02:55:30', NULL, '0000-00-00 00:00:00'),
(9, 9, '1C', 37, '2020-06-28 05:36:51', NULL, '0000-00-00 00:00:00'),
(10, 9, '3A', 37, '2020-06-30 05:17:50', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `ppdb_id` int(11) NOT NULL,
  `jum_nilai` float NOT NULL,
  `status_ppdb` enum('lulus','tidak lulus') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `ppdb_id`, `jum_nilai`, `status_ppdb`, `date_created`, `created_by`, `modified_by`, `modified_date`) VALUES
(10, 29, 40, 'tidak lulus', '2020-06-28 06:11:57', 37, 37, '2020-07-01 14:13:46'),
(11, 35, 30, 'tidak lulus', '2020-06-30 05:14:42', 37, 37, '2020-07-04 01:52:53'),
(18, 35, 92, 'lulus', '2020-07-01 14:13:36', 37, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `file_pengumuman` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pengumuman` enum('publis','tunda') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `file_pengumuman`, `status_pengumuman`, `created_by`, `date_created`, `modified_by`, `modified_created`) VALUES
(6, 'seleksi20200630.pdf', 'publis', 37, '2020-06-30 10:31:18', 0, '2020-06-30 17:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb`
--

CREATE TABLE `ppdb` (
  `id_ppdb` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_ppdb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_ppdb` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_ppdb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir_ppdb` date NOT NULL,
  `asal_sekolah_ppdb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sekolah_ppdb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah_ppdb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_ppdb` int(15) NOT NULL,
  `nama_ortu_ppdb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sesi_gelombang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` enum('lunas','belum lunas') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppdb`
--

INSERT INTO `ppdb` (`id_ppdb`, `user_id`, `nama_ppdb`, `nama_panggilan`, `gender_ppdb`, `tempat_lahir_ppdb`, `tanggal_lahir_ppdb`, `asal_sekolah_ppdb`, `alamat_sekolah_ppdb`, `alamat_rumah_ppdb`, `no_hp_ppdb`, `nama_ortu_ppdb`, `sesi_gelombang`, `status_pembayaran`, `created_by`, `date_created`, `modified_by`, `date_modified`) VALUES
(29, 56, 'user baru', 'user', 'laki-laki', 'sidoarjo', '1997-02-28', 'RA tadika mesra', 'pepe', 'pepe tani sawah sedati sidoarjo', 2147483647, 'lali', '', 'lunas', 56, '2020-06-28 06:11:20', 0, '0000-00-00 00:00:00'),
(35, 66, 'riki andri hermanto', 'andri', 'laki-laki', 'sidoarjo', '2004-06-02', 'RA Hasyim asy\'ari', 'pepe sedati', 'jl.pepe tani sawah no 3, dusun pepe tani sawah, desa pepe sedati sidoarjo', 2147483647, 'fiki', 'gelombang 1', 'lunas', 66, '2020-06-30 05:10:06', 37, '2020-06-30 05:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npsn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_siswa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_siswa` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_siswa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dusun` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `desa` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kodepos` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('praaktif','aktif','mutasi','alumni') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur` int(11) NOT NULL,
  `bb` int(11) NOT NULL,
  `tb` int(11) NOT NULL,
  `gol_darah` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyakit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_siswa` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_saudara` int(11) NOT NULL,
  `hobi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cita` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` enum('RA','TK') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sekolah_asal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cara_kesekolah` enum('jalan kaki','kendaraan pribadi','kendaraan umum','jemputan','kereta api','ojek','delman','getek','sepeda','lainnya') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keadaan_status` enum('yatim','piatu','yatim piatu','tidak yatim/piatu') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp_ayah` int(15) NOT NULL,
  `ktp_ibu` int(15) NOT NULL,
  `pendidikan_ayah` enum('tidak sekolah','putus SD','SD sederajat','SMP sederajat','SMA sederajat','D1','D2','D3','D4/S1','S2','S3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_ibu` enum('tidak sekolah','putus SD','SD sederajat','SMP sederajat','SMA sederajat','D1','D2','D3','D4/S1','S2','S3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_ayah` enum('tidak bekerja','nelayan','petani','PNS','karyawan swasta','pedagang kecil','pedagang besar','wiraswasta','wirausaha','buruh','pensiunan','lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_ibu` enum('tidak bekerja','nelayan','petani','peternak','PNS','karyawan swasta','pedagang kecil','pedagang besar','wiraswasta','wirausaha','buruh','pensiunan','lainnya') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaji` enum('kurang dari 1 juta','1 sampai 2 juta','lebih dari 3 juta') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaji_ibu` enum('Kurang dari 1 juta','1 juta sampai 2 juta','Lebih dari 3 juta') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tinggal` enum('orang tua','saudara','kos','panti asuhan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak_sekolah` enum('0 sampai 1km','1km','2km','lebih dari 3km') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_mandi` enum('kamar mandi','sumber','sungai','kamar mandi umum') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `air_mandi` enum('PDAM','sumber','tangki','sungai') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `air_minum` enum('PDAM','sumber','sungai','tangki','kemasan','isi ulang') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangunan` enum('tembok','klenengan','papan','gedek') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lantai` enum('keramik','tegel','plesteran','tanah') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerangan` enum('lampu listrik','lampu minyak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_wali` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_wali` enum('tidak sekolah','putus SD','SD sederajat','SMP sederajat','SMA sederajat','D1','D2','D3','D4/S1','S2','S3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_wali` enum('tidak bekerja','nelayan','petani','peternak','PNS','karyawan swasta','pedagang kecil','pedagang besar','wirausaha','buruh','pensiunan','lainnya') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaji_wali` enum('Kurang dari 1 juta','1 juta sampai 2 juta','Lebih dari 3 juta') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp_wali` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_doc_mutasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_get_ijazah` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_ijazah` enum('sudah diambil','belum diambil') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `users_id`, `kelas_id`, `foto`, `nis`, `nisn`, `npsn`, `nik_siswa`, `nama_siswa`, `alamat_siswa`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kodepos`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status`, `umur`, `bb`, `tb`, `gol_darah`, `penyakit`, `gender_siswa`, `jumlah_saudara`, `hobi`, `cita`, `asal_sekolah`, `nama_sekolah_asal`, `cara_kesekolah`, `keadaan_status`, `nama_ayah`, `nama_ibu`, `ktp_ayah`, `ktp_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `job_ayah`, `job_ibu`, `gaji`, `gaji_ibu`, `no_hp`, `tempat_tinggal`, `waktu`, `jarak_sekolah`, `tempat_mandi`, `air_mandi`, `air_minum`, `bangunan`, `lantai`, `penerangan`, `nama_wali`, `pendidikan_wali`, `job_wali`, `gaji_wali`, `no_hp_wali`, `link_doc_mutasi`, `date_get_ijazah`, `status_ijazah`, `tahun_ajaran`, `created_by`, `date_created`, `modified_by`, `modified_date`) VALUES
(17, NULL, 8, 'default.png', '1234124', '1234567', '123131', '213123', 'sirogane miyuki', 'jl pepep tani sawah   ', 'pepe tani', 2, 2, 'pepe', 'sedati', 'sidoarjo', 'jawa timur', 6215, 'jonggol', '12-juni-2020', 'islam', 'mutasi', 6, 30, 50, 'o', 'tidak ada', 'laki-laki', 3, 'sepak bola', 'atlit', 'RA', 'tadika mesra', 'jalan kaki', 'yatim piatu', 'sodik', 'dinda', 987979879, 21313112, 'SD sederajat', 'SMA sederajat', 'PNS', 'PNS', 'lebih dari 3 juta', 'Kurang dari 1 juta', '9797799', 'saudara', '3 jam', '1km', 'kamar mandi', 'sumber', 'sumber', 'tembok', 'tegel', 'lampu minyak', 'sori', 'SD sederajat', 'nelayan', '1 juta sampai 2 juta', '0898989889', 'https://docs.google.com/spreadsheets/d/1bnJmyv03p1cTdOS1lHg2qsnHwm2ya1HWwClQ6GIwuYQ/edit?usp=sharing', NULL, NULL, '2020 / 2021', 0, '2020-06-28 12:03:15', 37, '2020-07-03 08:26:07'),
(18, NULL, 8, 'default.png', '324224', '12345678', '212342', '211112', 'miyuki', 'jl pepep tani sawah ', 'pepe tani', 3, 3, 'pepe', 'sedati', 'sidoarjo', 'jawa timur', 6215, 'surabaya', '13-juni-2020', 'islam', 'aktif', 6, 30, 50, 'a', 'tidak ada', 'laki-laki', 2, 'belajar', 'dokter', 'TK', 'tadika mesra', 'kendaraan pribadi', 'tidak yatim/piatu', 'rodi', 'lilik', 2311231, 1231321, 'D3', 'SMP sederajat', 'karyawan swasta', 'petani', '1 sampai 2 juta', '1 juta sampai 2 juta', '980980980', 'saudara', '3 jam', '2km', 'sumber', 'PDAM', 'sumber', 'klenengan', 'keramik', 'lampu minyak', 'fitri', 'putus SD', 'PNS', '1 juta sampai 2 juta', '0898989889', NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-28 12:03:15', 37, '2020-07-03 08:30:47'),
(19, NULL, 7, 'default.png', '9879797', '123456789', '9798799', '797987', 'ryugo', 'jl pepep tani sawah ', 'pepe tani', 4, 4, 'pepe', 'sedati', 'sidoarjo', 'jawa timur', 6215, 'jager', '13-juni-2020', 'islam', 'aktif', 6, 30, 50, 'b', 'tidak ada', 'laki-laki', 2, 'ngoding', 'programmer', 'RA', 'tadika mesra', 'kereta api', 'piatu', 'hilmi', 'rea', 12313131, 2131231321, 'SMA sederajat', 'D1', 'petani', 'petani', 'kurang dari 1 juta', 'Lebih dari 3 juta', '9809808', 'orang tua', '3 jam', '2km', 'sungai', 'sumber', 'PDAM', 'klenengan', 'keramik', 'lampu minyak', 'lesti', 'tidak sekolah', 'nelayan', '1 juta sampai 2 juta', '0898989889', NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-28 12:03:15', 37, '2020-06-28 22:14:38'),
(20, NULL, 8, 'default.png', '8876757', '123456710', '8768768', '312331', 'figure', 'jl pepep tani sawah ', 'pepe tani', 5, 5, 'pepe', 'sedati', 'sidoarjo', 'jawa timur', 6215, 'porong', '12-juni2020', 'islam', 'aktif', 6, 30, 50, 'c', 'tidak ada', 'laki-laki', 2, 'Halan-halan', 'orep enak', 'RA', 'tadika mesra', 'kendaraan umum', 'tidak yatim/piatu', 'deri', 'vivi', 124153255, 1231231234, 'SMP sederajat', 'SMP sederajat', 'PNS', 'petani', 'lebih dari 3 juta', 'Lebih dari 3 juta', '980808', 'orang tua', '3 jam', 'lebih dari 3km', 'kamar mandi umum', 'PDAM', 'PDAM', 'klenengan', 'keramik', 'lampu listrik', 'deni', 'SD sederajat', 'petani', 'Lebih dari 3 juta', '0898989889', NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-28 12:03:15', 37, '2020-06-28 22:15:04'),
(21, 56, 6, 'item_20200628.png', '11111111', '1234567', '98327498', '9839873', 'user baru', 'jalan pepe tani sawah   ', 'pepe tani', 8, 12, 'pepe', 'sedati', 'sidoarjo', 'jawa timur', 6251, 'sidoarjo', '2020-06-28', 'islam', 'aktif', 8, 8, 8, 'o', '', 'laki-laki', 2, 'dolen', 'orep enak bos', 'RA', 'tadika mesra', 'sepeda', 'tidak yatim/piatu', 'sandi', 'tini', 891293719, 2147483647, 'S2', 'D4/S1', 'PNS', 'PNS', 'lebih dari 3 juta', 'Lebih dari 3 juta', '123123', 'orang tua', '1 jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', '', '', '', '', '', NULL, NULL, NULL, '2020 / 2021', 56, '2020-06-28 06:15:30', 37, '2020-06-28 22:15:16'),
(22, 66, 8, 'item_202006301.png', '9879872382', '987987922', '9832749822', '9839873', 'riki andri hermanto', 'jalan pepe tani sawah sedati sidoarjo     ', 'pepe', 12, 6, 'pepe', 'sedati', 'sidoarjo', 'jawa timur', 61253, 'sidoarjo', '20-06-2004', 'islam', 'alumni', 5, 28, 50, 'o', 'tidak ada', 'laki-laki', 2, 'menggambar', 'pelukis', 'RA', 'hasim asyari', 'sepeda', 'tidak yatim/piatu', 'fiki', 'lilik', 82798379, 847981123, 'S2', 'S2', 'wirausaha', 'wirausaha', 'lebih dari 3 juta', 'Lebih dari 3 juta', '0980932898', 'orang tua', '1 jam', '2km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', '', '', '', '', '', NULL, '20-04-2020', 'sudah diambil', '2020 / 2021', 66, '2020-06-30 05:24:43', 37, '2020-07-01 15:21:18'),
(23, NULL, 6, 'default.png', '81739713', '32123123', '4687642818', '86386486', 'riki alfi', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(24, NULL, 6, 'default.png', '238187687', '12321113', '7163876813', '868787236', 'verdi', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(25, NULL, 6, 'default.png', '876324868', '98798766668', '7868688764', '72371771', 'riki alfi p', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(26, NULL, 6, 'default.png', '1231231', '879879797987', '213121112', '235464364', 'sein', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(27, NULL, 6, 'default.png', '123135436', '897879879', '2131231', '31231255532', 'riki alfi a', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(28, NULL, 6, 'default.png', '213123112', '87987987997', '52523252', '2525325253', 'riki alfi d', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(29, NULL, 6, 'default.png', '123124435', '987978766', '654456454', '77756463', 'riki alfi sa', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(30, NULL, 6, 'default.png', '43242431', '67867868768', '213341543', '43634634', 'sandi', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(31, NULL, 6, 'default.png', '125325252', '898798798798', '4214143256', '14124132', 'didin', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(32, NULL, 6, 'default.png', '12412543612', '87987987979', '52352332', '1212412412', 'lucki', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(33, NULL, 6, 'default.png', '2352323', '8797979799', '12313131', '23423422', 'nanik', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(34, NULL, 6, 'default.png', '12411124', '98798799787', '24214111', '14112414', 'karim', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(35, NULL, 6, 'default.png', '81739713', '987777789', '2412414', '1231311', 'sofyan', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(36, NULL, 6, 'default.png', '12412211122', '7987878777', '4242222', '1241243634', 'sobah', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(37, NULL, 6, 'default.png', '32311211231', '9879879879879', '222222211', '2221211', 'fajar', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(38, NULL, 6, 'default.png', '21312312312', '87987999797', '123123121', '232131321', 'anas', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(39, NULL, 6, 'default.png', '222222222', '878798797', '213213123', '21312314555', 'tatik', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(40, NULL, 6, 'default.png', '321231312', '97987997977', '232112222', '3211214444', 'lilik', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35'),
(41, NULL, 6, 'default.png', '233333222', '7978978989', '3333333111', '553453444', 'nur', 'pepe tani sedati sidoarj', 'kalibogo', 8, 8, 'pepe', 'sedati', 'sidoarjo', 'jawa timu', 8263, 'sidorarjo', '21-04-2009', 'islam', 'aktif', 8, 38, 40, 'o', 'tidak ada', 'laki-laki', 2, 'makan', 'chef', 'RA', 'hasyim asyar', 'jalan kaki', 'tidak yatim/piatu', 'sodik', 'rini', 63886836, 76883686, 'D1', 'SD sederajat', 'PNS', 'petani', 'lebih dari 3 juta', '', '980183098', 'orang tua', '1jam', '1km', 'kamar mandi', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020 / 2021', 0, '2020-06-30 15:43:35', 0, '2020-06-30 15:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','kepala','guru','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `notelp`, `level`, `is_active`, `created_by`, `date_created`, `modified_by`, `modified_date`) VALUES
(37, 'admin', '8cb2237d0679ca88db6464eac60da96345513964', '', '', 'admin', '1', NULL, '2020-05-08 14:50:22', NULL, '2020-05-08 14:49:58'),
(51, 'panitia', '8cb2237d0679ca88db6464eac60da96345513964', '', '', 'guru', '1', 37, '2020-06-21 08:50:04', NULL, '0000-00-00 00:00:00'),
(56, 'user', '8cb2237d0679ca88db6464eac60da96345513964', 'user@user.com', '08989898', 'user', '1', NULL, '2020-06-28 06:05:27', NULL, '2020-06-28 13:05:27'),
(66, 'user1', '8cb2237d0679ca88db6464eac60da96345513964', 'email@email.com', '0892398913', 'user', '1', NULL, '2020-06-30 05:07:45', NULL, '2020-06-30 12:07:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id_gelombang`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `ppdb_id` (`ppdb_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`id_ppdb`),
  ADD KEY `ppdb_ibfk_1` (`user_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `siswa_ibfk_3` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `id_gelombang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `id_ppdb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id_guru`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`ppdb_id`) REFERENCES `ppdb` (`id_ppdb`);

--
-- Constraints for table `ppdb`
--
ALTER TABLE `ppdb`
  ADD CONSTRAINT `ppdb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
