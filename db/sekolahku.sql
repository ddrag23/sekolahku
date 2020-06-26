-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2020 at 02:22 AM
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
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama_guru` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_guru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_guru` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(3, 98159871, 'miftah', 'sakdnkjank', 'L', 98140980, 37, '2020-06-14 01:57:35', 37, '2020-06-14 02:38:54'),
(4, 98239813, 'sopyan', 'lkasdlkadlakla', 'L', 82828, 37, '2020-06-14 02:38:28', 37, '2020-06-14 02:40:22'),
(5, 98239813, 'sopyan', 'sidoarjo', 'L', 88888, 37, '2020-06-25 01:45:18', 0, '0000-00-00 00:00:00');

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
(1, 3, '1A', NULL, '2020-04-13 12:42:37', NULL, '2020-04-13 12:42:13'),
(2, 4, '2k', 37, '2020-06-14 02:38:38', NULL, '0000-00-00 00:00:00'),
(3, 4, '3A', 37, '2020-06-15 04:21:46', NULL, '0000-00-00 00:00:00'),
(4, 3, '2A', 37, '2020-06-15 04:21:56', NULL, '0000-00-00 00:00:00'),
(5, 5, '4a', 37, '2020-06-25 01:45:35', NULL, '0000-00-00 00:00:00');

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
(1, 10, 92, 'lulus', '2020-06-09 01:34:30', 37, 37, '2020-06-09 09:06:37'),
(2, 14, 100, 'lulus', '2020-06-09 01:37:23', 37, 0, '0000-00-00 00:00:00'),
(3, 10, 90, 'lulus', '2020-06-09 06:19:49', 37, 0, '0000-00-00 00:00:00'),
(8, 25, 90, 'lulus', '2020-06-12 07:26:01', 37, 0, '0000-00-00 00:00:00'),
(9, 27, 90, 'lulus', '2020-06-25 01:59:25', 37, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb`
--

CREATE TABLE `ppdb` (
  `id_ppdb` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_ppdb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_ppdb` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_ppdb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir_ppdb` date NOT NULL,
  `asal_sekolah_ppdb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sekolah_ppdb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah_ppdb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_ppdb` int(15) NOT NULL,
  `nama_ortu_ppdb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppdb`
--

INSERT INTO `ppdb` (`id_ppdb`, `user_id`, `nama_ppdb`, `nama_panggilan`, `gender_ppdb`, `tempat_lahir_ppdb`, `tanggal_lahir_ppdb`, `asal_sekolah_ppdb`, `alamat_sekolah_ppdb`, `alamat_rumah_ppdb`, `no_hp_ppdb`, `nama_ortu_ppdb`, `created_by`, `date_created`, `modified_by`, `date_modified`) VALUES
(10, 47, 'user', 'user', 'L', 'kono', '2020-12-31', 'kok', 'kok', 'kono', 2147483647, 'lali', 37, '2020-05-11 08:33:13', 0, '0000-00-00 00:00:00'),
(14, 48, 'coba', 'try', 'L', 'kk', '2020-12-30', 'pepe', 'kok', 'pjsad', 111, 'lali', 48, '2020-05-12 04:30:25', 0, '0000-00-00 00:00:00'),
(17, 50, 'mohammad amrubni thoyyib', 'baru', 'L', 'baru', '2020-12-31', 'RA', 'pepe sedati', 'sidoarjo', 222222, 'lali', 50, '2020-06-12 03:43:48', 37, '2020-06-22 23:54:14'),
(25, 49, 'nyobak rek', 'try', 'L', 'kono', '2020-12-30', 'ra', 'pepe brooo', 'sanfkjnfakjs', 2147483647, 'kok', 49, '2020-06-12 06:11:43', 37, '2020-06-12 07:17:20'),
(26, 52, 'pengguna baru', 'pengguna', 'L', 'sidoarjo', '2006-12-31', 'ra tadika mesra', 'dusun sidoarjo, desa sidoarjo kecamatan sidoarjo', 'jalan sidoarjo, kecamatan sidoarjo, kabupaten sidoarjo', 2147483647, 'siapa saja', 37, '2020-06-25 01:44:37', 0, '0000-00-00 00:00:00'),
(27, 53, 'coba1', 'coba1', 'L', 'coba', '2020-12-30', 'sidoarjo', 'sekolah', 'sidoarjo', 2173813, 'kkkkk', 37, '2020-06-25 01:54:53', 0, '0000-00-00 00:00:00'),
(28, 54, 'boboiboy', 'boyboy', 'L', 'sidoarjo', '2019-10-31', 'ra sidoarjo', 'ahahaah', 'sidoarjo boy', 899898, 'fisdi', 37, '2020-06-25 01:57:09', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `nis` int(11) DEFAULT NULL,
  `npsn` int(11) NOT NULL,
  `nik_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_siswa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusun` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `desa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` int(11) NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('praaktif','aktif','mutasi','alumni') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur` int(11) NOT NULL,
  `bb` int(11) NOT NULL,
  `tb` int(11) NOT NULL,
  `gol_darah` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyakit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_siswa` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `gaji` enum('kurang dari 1 jt','1 sampai 2 jt','lebih dari 2 jt') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `nama_wali` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_wali` enum('tidak sekolah','putus SD','SD sederajat','SMP sederajat','SMA sederajat','D1','D2','D3','D4/S1','S2','S3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_wali` enum('tidak bekerja','nelayan','petani','peternak','PNS','karyawan swasta','pedagang kecil','pedagang besar','wirausaha','buruh','pensiunan','lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_wali` enum('Kurang dari 1 juta','1 juta sampai 2 juta','Lebih dari 3 juta') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `users_id`, `kelas_id`, `guru_id`, `foto`, `nis`, `npsn`, `nik_siswa`, `nama_siswa`, `alamat_siswa`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kodepos`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status`, `umur`, `bb`, `tb`, `gol_darah`, `penyakit`, `gender_siswa`, `jumlah_saudara`, `hobi`, `cita`, `asal_sekolah`, `nama_sekolah_asal`, `cara_kesekolah`, `keadaan_status`, `nama_ayah`, `nama_ibu`, `ktp_ayah`, `ktp_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `job_ayah`, `job_ibu`, `gaji`, `gaji_ibu`, `no_hp`, `tempat_tinggal`, `waktu`, `jarak_sekolah`, `tempat_mandi`, `air_mandi`, `air_minum`, `bangunan`, `lantai`, `penerangan`, `nama_wali`, `pendidikan_wali`, `job_wali`, `gaji_wali`, `tahun_ajaran`, `created_by`, `date_created`, `modified_by`, `modified_date`) VALUES
(36, 49, 1, 3, 'item_20200613.png', 282882, 18989898, 273987, 'sopyan jr', 'jalan pepe tani sawah      ', 'pepe tani sawah', 12, 6, 'pepe', 'sedati', 'sidoarjo', 'Jawa Timur', 72727, 'sidoarjo', '2020-06-01', 'islam', 'aktif', 6, 25, 25, 'o', 'tidak punya', 'L', 2, 'dolen ', 'orep enak', 'RA', 'raudhotul athfal', 'kendaraan pribadi', 'tidak yatim/piatu', 'suher', 'tintini', 92934884, 8383938, 'SD sederajat', 'SMP sederajat', 'PNS', 'petani', '1 sampai 2 jt', 'Lebih dari 3 juta', '089678783876', 'saudara', '1 hari', '1km', 'kamar mandi', 'sumber', 'sungai', 'klenengan', 'tegel', 'lampu listrik', 'lali', 'S3', 'karyawan swasta', 'Lebih dari 3 juta', '', 49, '2020-06-13 07:02:12', 37, '2020-06-25 02:09:30'),
(37, 47, 2, 4, 'item-20200625.png', 2147483647, 38383939, 219871398, 'hora umum', 'pacet   ', 'pacet', 2, 2, 'pacet', 'mojokerto', 'mojokerto', 'Jawa Timur', 892, 'pacet', '2020-12-31', 'islam', 'mutasi', 9, 9, 9, 'k', 'tidak ada', 'L', 3, 'dolen', 'orep uenak ', 'TK', 'tidak tahu', 'kendaraan umum', 'tidak yatim/piatu', 'siap', 'sip', 2727722, 72737373, 'D4/S1', 'D1', 'tidak bekerja', 'tidak bekerja', 'kurang dari 1 jt', '1 juta sampai 2 juta', '9383838', 'orang tua', '8jam', '1km', 'kamar mandi', 'sumber', 'PDAM', 'tembok', 'keramik', 'lampu minyak', 'anjay', 'tidak sekolah', 'nelayan', 'Lebih dari 3 juta', '2020 / 2021', 47, '2020-06-15 03:52:46', 37, '2020-06-25 01:41:41'),
(40, NULL, 1, 3, 'item-2020062317.png', 213333, 12313, 21313, 'kok', 'asad  ', 'sad', 2, 2, 'sad', 'sad', 'asdsa', 'Jawa Timur', 213, 'kok', '2020-12-30', 'ksajdkaj', 'aktif', 88, 88, 88, 'k', 'asdsa', 'L', 2, 'sad', 'sad', 'TK', 'asdas', 'jalan kaki', 'yatim piatu', 'sada', 'sada', 213123, 21121, 'tidak sekolah', 'putus SD', 'tidak bekerja', 'tidak bekerja', 'kurang dari 1 jt', 'Kurang dari 1 juta', '1231', 'orang tua', '888', '1km', 'kamar mandi', 'sumber', 'PDAM', 'tembok', 'keramik', 'lampu listrik', '888', 'putus SD', 'tidak bekerja', '', '2020 / 2021', 37, '2020-06-23 23:04:38', 37, '2020-06-23 23:16:42'),
(41, NULL, 3, 3, 'item_202006232.png', 1273918739, 927398, 213971397, 'jasd', 'askdk', 'askdj', 8, 8, 'sakadk', 'ksdakjk', 'nkadnsk', 'Jawa Timur', 9080, 'lsalkasdj', '2020-12-31', 'ahsd', 'aktif', 8, 8, 8, 'k', 'lksadjl', 'L', 8, 'kjasdk', 'ksakdj', 'TK', 'kasbd', 'jalan kaki', 'tidak yatim/piatu', 'aksjdk', 'ksadkj', 98797, 98779, 'S3', 'tidak sekolah', 'tidak bekerja', 'tidak bekerja', 'kurang dari 1 jt', 'Kurang dari 1 juta', '23123', 'orang tua', 'sdasd', '0 sampai 1km', 'sumber', 'sumber', 'PDAM', 'tembok', 'keramik', 'lampu listrik', 'kk', 'SD sederajat', 'tidak bekerja', '', '2020 / 2021', 37, '2020-06-23 23:06:46', 0, '0000-00-00 00:00:00'),
(42, NULL, 3, 4, 'item-2020062327.png', 972948719, 987397, 9274971, 'ksaldk', 'kdk   ', 'sad', 2, 2, 'sad', 'sedati', 'sada', 'Jawa Timur', 61253, 'sajdlk', '1997-12-30', 'ksadk', 'aktif', 7, 7, 77, 'j', 'kjsahdk', 'L', 2, 'kjn', 'sad', 'RA', 'sad', 'jalan kaki', 'tidak yatim/piatu', 'kjkjasndk', 'kjnsakjndk', 881231, 997123, 'S2', 'tidak sekolah', 'nelayan', 'tidak bekerja', 'kurang dari 1 jt', 'Kurang dari 1 juta', '21311231', 'orang tua', 'asdsa', '1km', 'sumber', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu minyak', 'kk', 'SD sederajat', 'tidak bekerja', 'Kurang dari 1 juta', '2020 / 2021', 37, '2020-06-23 23:34:00', 37, '2020-06-23 23:40:14'),
(43, NULL, 1, 3, 'item-202006241.png', 8668686, 9797979, 97988668, 'sadakhbk', 'kasdbkajb   ', 'ww', 2, 5, 'knknkj', 'knkn', 'nakdn', 'Jawa Timur', 79879, 'sakdn', '2015-12-30', 'nl', 'alumni', 9, 2, 2, 'k', 'll', 'L', 8, 'ksajdk', 'ksadn', 'RA', 'masbd', 'jalan kaki', 'tidak yatim/piatu', 'askdn', 'nskjdn', 98979, 97997, 'tidak sekolah', 'tidak sekolah', 'tidak bekerja', 'tidak bekerja', 'kurang dari 1 jt', '1 juta sampai 2 juta', '21312312', 'orang tua', 'sadasad', '0 sampai 1km', 'kamar mandi', 'PDAM', 'PDAM', 'klenengan', 'keramik', 'lampu listrik', 'sadasd', 'putus SD', 'tidak bekerja', 'Kurang dari 1 juta', '2020 / 2021', 37, '2020-06-23 23:44:15', 37, '2020-06-24 00:17:53'),
(47, NULL, 1, 3, 'item_202006242.png', 2138613861, 2138618, 1638168, 'aksjdkja', 'askjdka', 'ksk', 8, 8, 'kajndkjan', 'knakd', 'kasdb', 'Jawa Timur', 99999, 'askdbjkb', '2020-12-30', 'andkajsn', 'aktif', 2, 2, 2, 'k', '', 'L', 9, 'asbdaj', 'jkasndj', 'RA', 'sadads', 'jalan kaki', 'tidak yatim/piatu', 'adkbabd', 'bjbdjsbajb', 788768, 87987979, 'tidak sekolah', 'putus SD', 'tidak bekerja', 'tidak bekerja', 'kurang dari 1 jt', 'Kurang dari 1 juta', '213123', 'saudara', '231', 'lebih dari 3km', 'kamar mandi', 'PDAM', 'sungai', 'tembok', 'keramik', 'lampu listrik', '', '', '', '', '2020 / 2021', 37, '2020-06-24 00:08:35', 0, '0000-00-00 00:00:00'),
(48, 50, 3, 3, 'item-20200624.png', 2147483647, 231863812, 263816813, 'kasndkand', 'sadkj ', 'kk', 9, 9, 'asdkjk', 'kasndk', 'nkjndkjan', 'Jawa Timur', 98798, 'ksajdnk', '2020-12-31', 'islam', 'aktif', 77, 7, 7, 'k', '', 'L', 8, 'knskjadnkd', 'knsadkn', 'RA', 'askjdnkja', 'jalan kaki', 'tidak yatim/piatu', 'jahsdbjhab', 'jbsajhdb', 987979, 97977, 'putus SD', 'tidak sekolah', 'tidak bekerja', 'tidak bekerja', '1 sampai 2 jt', 'Kurang dari 1 juta', '9888888', 'orang tua', '8732794', '1km', 'kamar mandi', 'sumber', 'PDAM', 'klenengan', 'keramik', 'lampu listrik', '', '', '', '', '2020 / 2021', 50, '2020-06-24 00:12:56', 37, '2020-06-24 00:15:48'),
(49, NULL, 1, 3, 'item_202006243.png', 98799, 97979, 97979, 'sadnkj', 'sadas', 'ksadkj', 123, 0, 'sada', 'sad', 'sadas', 'Jawa Timur', 61253, 'iadsih', '2020-10-31', 'islam', 'aktif', 1, 1, 1, 'k', '', 'L', 1, 'sadasd', 'asda', 'RA', 'asdas', 'jalan kaki', 'tidak yatim/piatu', 'asdasda', 'asdasd', 123123, 123123, 'tidak sekolah', 'tidak sekolah', 'tidak bekerja', 'tidak bekerja', 'kurang dari 1 jt', 'Kurang dari 1 juta', '88888', 'orang tua', '2131231', '1km', 'sumber', 'PDAM', 'PDAM', 'tembok', 'keramik', 'lampu listrik', 'lsdkfqlsd', 'putus SD', 'petani', '', '2020 / 2021', 37, '2020-06-24 00:28:23', 0, '0000-00-00 00:00:00'),
(50, NULL, 1, 3, 'item_20200625.png', 377383838, 87487483, 827837384, 'rendi siaga', 'jalan surabaya', 'surabaya', 8, 9, 'surabaya', 'surabaya', 'surabaya', 'Jawa Timur', 76677, 'surabaya', '2004-06-25', 'islam', 'aktif', 7, 28, 50, 'o', '', 'L', 3, 'bermain sepak bola', 'programmer', 'TK', 'tadika mesra', 'sepeda', 'tidak yatim/piatu', 'ayah', 'ibu', 8834848, 84884488, 'SD sederajat', 'SD sederajat', 'pensiunan', 'pensiunan', 'lebih dari 2 jt', 'Lebih dari 3 juta', '089898833221', 'orang tua', '1 jam', '1km', 'kamar mandi', 'PDAM', 'isi ulang', 'tembok', 'keramik', 'lampu listrik', '', '', '', '', '2020 / 2021', 37, '2020-06-25 01:40:03', 0, '0000-00-00 00:00:00'),
(51, 52, NULL, NULL, 'item_202006251.png', NULL, 887686, 87686, 'fairus al', 'jalan malang', 'malang', 8, 8, 'malang', 'malang', 'malang', 'Jawa Timur', 828282, 'malang', '2009-12-31', 'islam', 'aktif', 6, 29, 40, 'o', '', 'L', 2, 'bermain layang-layang', 'guru', 'RA', 'malang', 'sepeda', 'tidak yatim/piatu', 'sodik', 'lilis', 98288383, 88383883, 'D1', 'SMP sederajat', 'PNS', 'peternak', 'lebih dari 2 jt', '', '93028289', 'orang tua', '1 jam', '1km', 'kamar mandi', 'PDAM', 'isi ulang', 'tembok', 'keramik', 'lampu listrik', '', '', '', '', '2020 / 2021', 52, '2020-06-25 01:49:32', 0, '0000-00-00 00:00:00');

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
(46, '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', 'user', '1', NULL, '2020-05-10 10:06:39', NULL, '0000-00-00 00:00:00'),
(47, 'user', '12dea96fec20593566ab75692c9949596833adc9', '', '', 'user', '1', NULL, '2020-05-11 15:33:13', NULL, '0000-00-00 00:00:00'),
(48, 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', '', '', 'user', '1', NULL, '2020-05-12 01:23:18', NULL, '0000-00-00 00:00:00'),
(49, 'saya', 'b820db6e2ababf0afd7e36bb065db969162ad06d', '', '', 'user', '1', NULL, '2020-06-12 02:45:19', NULL, '0000-00-00 00:00:00'),
(50, 'baru1', '8cb2237d0679ca88db6464eac60da96345513964', 'aaa@aaa.cp', '08989898', 'user', '1', NULL, '2020-06-12 03:07:26', 37, '2020-06-23 23:51:46'),
(51, 'panitia', '8cb2237d0679ca88db6464eac60da96345513964', '', '', 'guru', '1', 37, '2020-06-21 08:50:04', NULL, '0000-00-00 00:00:00'),
(52, 'pengguna', 'e2c80c2062bbb24aa828f9d5f874fb8122d5145e', 'email@email.com', '089898989898', 'user', '1', NULL, '2020-06-25 08:44:37', NULL, '2020-06-25 08:44:37'),
(53, 'coba1', '6bca54961f06f184b6cc93f7b3506fb4c0b51248', 'email@email.com', '2173813', 'user', '1', NULL, '2020-06-25 08:54:53', NULL, '2020-06-25 08:54:53'),
(54, 'boyboy', '39687fde653319818c4ed88e20de12d3621fc800', 'tadika@tadika.com', '0899898', 'user', '1', NULL, '2020-06-25 08:57:09', NULL, '2020-06-25 08:57:09');

--
-- Indexes for dumped tables
--

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
  ADD KEY `guru_id` (`guru_id`),
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
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `id_ppdb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
