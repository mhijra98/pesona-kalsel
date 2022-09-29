-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 01:54 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesona_kalsel`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

DROP TABLE IF EXISTS `buku_tamu`;
CREATE TABLE `buku_tamu` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `saran` text NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `nama`, `email`, `saran`, `tgl`) VALUES
(5, 'Rajif', 'rajif@gmail.com', 'Mudah menerima informasi wisata', '2020-09-23'),
(6, 'Faiq', 'faiq@gmail.com', 'Tolong data terkait wisata diperbanyak', '2020-09-24'),
(7, 'Akli', 'akli@gmail.com', 'Terimakasih telah menyediakan informasi terkait wisata', '2020-09-25'),
(8, 'Anshor', 'Hijra@gmail.com', 'siip ok', '2020-10-07'),
(9, 'tes', 'tes@gmail.com', 'coba coba', '2020-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

DROP TABLE IF EXISTS `data_guru`;
CREATE TABLE `data_guru` (
  `id` int(3) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id`, `nis`, `nama`, `no_hp`, `alamat`) VALUES
(1, '09239232 edit', 'Hijra edit', '087312312 edit', 'jl a yani edit'),
(2, '12312948128 edit', 'nama edit', '12312312 edit', 'jl a yani');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id_event` int(25) NOT NULL,
  `id_user` int(9) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `e_id_kab` int(9) NOT NULL,
  `e_id_kec` int(9) NOT NULL,
  `jalan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `jam` varchar(25) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `e_image` varchar(100) NOT NULL,
  `acc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_user`, `latitude`, `longitude`, `tema`, `tempat`, `jenis`, `e_id_kab`, `e_id_kec`, `jalan`, `deskripsi`, `jam`, `tgl_mulai`, `tgl_selesai`, `e_image`, `acc`) VALUES
(9, 3, '-3.449443', '114.802889', 'South Borneo Festival 2020', 'Lapangan Bola Brimob', 'Festival', 12, 29, 'Jl. A. Yani, Guntungmanggis', '<p>Festival tahunan yang dilaksanakan oleh kota banjarbaru</p>\r\n', '14:00 - 23:00', '2020-10-22', '2020-10-29', 'festival.png', 1),
(10, 3, '-2.980961', '114.765234', 'Hari Jadi Barito Kuala', 'Lapangan 5 Desember ', 'Pameran', 3, 11, 'Jl. Panglima Antasari, Marabahan Kota', '<p>Hari memperingati jadinya kabupaten Barito Kuala yang dilakukan setiap tahunya</p>\r\n', '15:00 - 22:00', '2020-11-04', '2020-11-18', 'pameran.png', 1),
(11, 3, '-3.298276', '114.589875', 'Konser Noah', 'Taman Budaya Kalimantan Selatan', 'Konser', 13, 22, 'Jl. Brigjen Hasan Basri No.2, Sungai Miai', '<p>Acara konser yang diadakan untuk para fans Noah Band</p>\r\n', '20:00 - 24:00', '2020-10-22', '2020-10-22', 'unnamed.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

DROP TABLE IF EXISTS `kabupaten`;
CREATE TABLE `kabupaten` (
  `id_kab` int(2) NOT NULL,
  `nama_kab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kab`, `nama_kab`) VALUES
(1, 'Balangan'),
(2, 'Banjar'),
(3, 'Barito Kuala'),
(4, 'Hulu Sungai Selatan'),
(5, 'Hulu Sungai Tengah'),
(6, 'Hulu Sungai Utara'),
(7, 'Kotabaru'),
(8, 'Tabalong'),
(9, 'Tanah Bumbu'),
(10, 'Tanah Laut'),
(11, 'Tapin'),
(12, 'Kota Banjarbaru'),
(13, 'Kota Banjarmasin');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE `kecamatan` (
  `id_kec` int(5) NOT NULL,
  `nama_kec` varchar(200) NOT NULL,
  `kec_id_kab` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `nama_kec`, `kec_id_kab`) VALUES
(1, 'Alalak', 3),
(2, 'Anjir Muara', 3),
(3, 'Anjir Pasar', 3),
(4, 'Bakumpai', 3),
(5, 'Barambai', 3),
(6, 'Belawang', 3),
(7, 'Cerbon', 3),
(8, 'Kuripan', 3),
(9, 'Jejangkit', 3),
(10, 'Mandastana', 3),
(11, 'Marabahan', 3),
(12, 'Mekarsari', 3),
(13, 'Rantau Badauh', 3),
(14, 'Tabukan', 3),
(15, 'Tabunganen', 3),
(16, 'Tamban ', 3),
(17, 'Wanaraya', 3),
(18, 'Banjarmasin Barat', 13),
(19, 'Banjarmasin Selatan', 13),
(20, 'Banjarmasin Tengah', 13),
(21, 'Banjarmasin Timur', 13),
(22, 'Banjarmasin Utara', 13),
(26, 'Banjarbaru Selatan', 12),
(27, 'Banjarbaru Utara', 12),
(28, 'Cempaka', 12),
(29, 'Landasan Ulin', 12),
(30, 'Liang Langgang', 12),
(31, 'Bakarangan', 11),
(32, 'Binuang', 11),
(33, 'Bungur', 11),
(34, 'Candi Laras Selatan', 11),
(35, 'Hatungun', 11),
(36, 'Lokpaikat', 11),
(37, 'pinai', 11),
(38, 'Salam Babaris', 11),
(39, 'Tapin Selatan', 11),
(40, 'Taping Tengah', 11),
(41, 'Tapin Utara', 11),
(42, 'Candi Laras Utara', 11),
(43, 'Bajuin', 10),
(44, 'Bati Bati', 10),
(45, 'Batu Ampar', 10),
(46, 'Bumi Makmur', 10),
(47, 'Jorong', 10),
(48, 'Kintap', 10),
(49, 'Kurau', 10),
(50, 'Penyipatan', 10),
(51, 'Pelaihari', 10),
(52, 'Takisung', 10),
(53, 'Tambang', 10),
(54, 'Angsana', 9),
(55, 'Batulicin', 9),
(56, 'Karang Bintang', 9),
(57, 'Kuranji', 9),
(58, 'Kusan Hilir', 9),
(59, 'Kusan Hulu', 9),
(60, 'Mentewe', 9),
(61, 'Santui', 9),
(62, 'Simpang Empat', 9),
(63, 'Sungai Loban', 9),
(64, 'Banua Lawas', 8),
(65, 'Bintang Ara', 8),
(66, 'Haruai', 8),
(67, 'Jaro', 8),
(68, 'Kelua', 8),
(69, 'Muara Harus', 8),
(70, 'Murung Pundak', 8),
(71, 'Muara Uya', 8),
(72, 'Pugaan', 8),
(73, 'Tanta', 8),
(74, 'Tanjung', 8),
(75, 'Upau', 8),
(76, 'Hampang', 7),
(77, 'Kelumpang Barat', 7),
(78, 'Kelumpang Hilir', 7),
(79, 'Kelumpang Hulu', 7),
(80, 'Keumpang Selatan', 7),
(81, 'Kelumpang Tengah', 7),
(82, 'Kelumpang Utara', 7),
(83, 'Pamukan Barat', 7),
(84, 'Pamukan Selatan', 7),
(85, 'Pamukan Utara', 7),
(86, 'Pulau Laut Barat', 7),
(87, 'Pulau Laut Kepulauan', 7),
(88, 'Pulau Laut Selatan', 7),
(89, 'Pulau Laut Tanjung Selayar', 7),
(90, 'Pulau Laut Tengah', 7),
(91, 'Pulau Laut Timur', 7),
(92, 'Pulau Laut Utara', 7),
(93, 'Pulau Sebuku', 7),
(94, 'Pulau Sembilan', 7),
(95, 'Sampanahan', 7),
(96, 'Sungai Durian', 7),
(97, 'Amuntai Selatan', 6),
(98, 'Amuntai Tengah', 6),
(99, 'Amuntai Utara', 6),
(100, 'Babirik', 6),
(101, 'Banjang', 6),
(102, 'Danau Panggang', 6),
(103, 'Haur Gading', 6),
(104, 'Paminggir', 6),
(105, 'Sungai Pandan', 6),
(106, 'Sungai Tabukan', 6),
(107, 'Barabai', 5),
(108, 'Batang Alai Selatan', 5),
(109, 'Batang Alai Timur', 5),
(110, 'Batang Alai Utara', 5),
(111, 'Batu Benawa', 5),
(112, 'Hantakan', 5),
(113, 'Haruyan', 5),
(114, 'Labuan Amas Selatan', 5),
(115, 'Labuan Amas Utara', 5),
(116, 'Limpasu', 5),
(117, 'Pandawan', 5),
(118, 'Angkinang', 4),
(119, 'Daha Barat', 4),
(120, 'Daha Selatan', 4),
(121, 'Daha Utara', 4),
(122, 'Kalumpang', 4),
(123, 'Kandangan', 4),
(124, 'Loksado', 4),
(125, 'Padang Batung', 4),
(126, 'Simpur', 4),
(127, 'Sungai Raya', 4),
(128, 'Telaga Langsat', 4),
(129, 'Aluh Aluh', 2),
(130, 'Aranio', 2),
(131, 'Astambul', 2),
(132, 'Beruntung Baru', 2),
(133, 'Cintapuri Darussalam', 2),
(134, 'Gambut', 2),
(135, 'Karang Intan', 2),
(136, 'Kertak Hanyar', 2),
(137, 'Mataraman', 2),
(138, 'Martapura', 2),
(139, 'Martapura Barat', 2),
(140, 'Martapura Timur', 2),
(141, 'Paramasan', 2),
(142, 'Pengaron', 2),
(143, 'Sambung Makmur', 2),
(144, 'Simpang Empat', 2),
(145, 'Sungai Pinang', 2),
(146, 'Sungai Tabuk', 2),
(147, 'Tatah Makmur', 2),
(148, 'Telaga Bauntung', 2),
(149, 'Awayan', 1),
(150, 'Batu Mandi', 1),
(151, 'Halong', 1),
(152, 'Juai', 1),
(153, 'Lampihong', 1),
(154, 'Paringin', 1),
(155, 'Paringin Selatan', 1),
(156, 'Tebing Tinggi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ktg_wisata`
--

DROP TABLE IF EXISTS `ktg_wisata`;
CREATE TABLE `ktg_wisata` (
  `id_ktg` int(3) NOT NULL,
  `nm_ktg` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ktg_wisata`
--

INSERT INTO `ktg_wisata` (`id_ktg`, `nm_ktg`, `icon`) VALUES
(1, 'Wisata Alam', ''),
(2, 'Wisata Buatan', ''),
(3, 'Wisata Kuliner', ''),
(4, 'Wisata Religi', ''),
(5, 'Wisata Budaya', ''),
(6, 'Wisata Edukasi', '');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

DROP TABLE IF EXISTS `notifikasi`;
CREATE TABLE `notifikasi` (
  `id` int(100) NOT NULL,
  `id_user` int(9) NOT NULL,
  `notif_to` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ket1` varchar(50) NOT NULL,
  `ket2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_user`, `notif_to`, `nama`, `ket1`, `ket2`) VALUES
(3, 3, 2, 'Konser Noah', 'diterima', ''),
(4, 3, 2, 'Hari Jadi Baritokuala', 'diterima', ''),
(5, 3, 2, 'South Borneo Festival 2020', 'diterima', ''),
(6, 3, 1, 'tes wisata baru 2', 'ditolak', 'data tidak sesuai'),
(8, 3, 1, 'tes uji 1', 'diterima', ''),
(10, 3, 3, 'tes hotel uji', 'diterima', '');

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

DROP TABLE IF EXISTS `penginapan`;
CREATE TABLE `penginapan` (
  `id_penginapan` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `nm_penginapan` varchar(300) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga_mulai` varchar(25) NOT NULL,
  `p_id_kab` int(5) NOT NULL,
  `p_id_kec` int(5) NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `jln` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `p_image` varchar(300) NOT NULL,
  `acc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penginapan`
--

INSERT INTO `penginapan` (`id_penginapan`, `id_user`, `latitude`, `longitude`, `nm_penginapan`, `kategori`, `harga_mulai`, `p_id_kab`, `p_id_kec`, `kontak`, `jln`, `deskripsi`, `p_image`, `acc`) VALUES
(2, 1, '-3.338049', '114.623908', 'OYO 1864 Tiara Residence', 'Kelas Menengah', '300000', 13, 21, '089834323434', 'Jl. Dharma Bakti V No.4 No.25, Pemurus Luar', '<p>OYO 1864 Tiara Residence terletak di Banjarmasin. Hotel bintang 2 ini menawarkan Wi-Fi gratis, resepsionis 24 jam, dan lounge bersama. Tempat parkir pribadi tersedia dengan biaya tambahan.</p>\r\n\r\n<p>Setiap kamar di hotel ini memiliki AC dan TV.</p>\r\n\r\n<p>Bandara terdekat adalah Bandara Internasional Syamsudin Noor, 22 km dari OYO 1864 Tiara Residence.</p>\r\n', 'oyo.PNG', 1),
(3, 1, '-3.338548', ' 114.618486', 'Best Western Kindai Hotel', 'Kelas Atas', '500000', 13, 21, '089823243432', 'Jl. Ahmad Yani Km.4,5 No.437', '<p>Terletak di Banjarmasin, Best Western Kindai Hotel memiliki bar dan teras. Berbagai fasilitas yang tersedia di akomodasi ini adalah restoran, resepsionis 24 jam, layanan kamar, dan Wi-Fi gratis di seluruh areanya. Hotel ini menawarkan kolam renang luar ruangan dan layanan pramutamu.</p>\r\n\r\n<p>Tersedia juga pilihan sarapan prasmanan dan khas Asia setiap pagi di hotel ini.</p>\r\n\r\n<p>Bandara terdekat adalah Bandara Internasional Syamsudin Noor, 24 km dari Best Western Kindai Hotel, dan tersedia layanan antar-jemput bandara berbayar.</p>\r\n', 'western.PNG', 1),
(4, 1, '-3.323255', '114.600397', 'Favehotel', 'Kelas Atas', '600000', 13, 20, '089823882128', 'Jalan A. Yani No.Km, RW No.35, Sungai Baru', '<p>Favehotel Ahmad Yani Banjarmasin terletak di Banjarmasin. Berbagai fasilitas yang tersedia di akomodasi ini adalah restoran, resepsionis 24 jam, layanan kamar, dan Wi-Fi gratis. Tempat parkir pribadi tersedia dengan biaya tambahan.</p>\r\n\r\n<p>Semua kamar di hotel ini menyediakan AC dan meja kerja.</p>\r\n\r\n<p>Pilihan sarapan kontinental dan prasmanan tersedia setiap pagi di Favehotel Ahmad Yani Banjarmasin.</p>\r\n\r\n<p>Bandara terdekat adalah Bandara Internasional Syamsudin Noor, 25 km dari akomodasi.</p>\r\n', 'favehotel.PNG', 1),
(6, 3, '-3.3544053576029516', '115.2740478515625', 'Tes Hotel Baru', 'Kelas Menengah', '350000', 2, 132, '08984564564', 'Jl. RE Martadinata No.3-1, Telawang', '<p>df asd fsda fa sdfasd&nbsp;</p>\r\n', 'Uz_Bulat.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `show_image_pe`
--

DROP TABLE IF EXISTS `show_image_pe`;
CREATE TABLE `show_image_pe` (
  `id` int(100) NOT NULL,
  `id_penginapan` int(100) NOT NULL,
  `sp_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_image_pe`
--

INSERT INTO `show_image_pe` (`id`, `id_penginapan`, `sp_image`) VALUES
(1, 2, 'oyo1.PNG'),
(2, 2, 'oyo2.PNG'),
(3, 3, 'wester1.PNG'),
(4, 3, 'western2.PNG'),
(5, 4, 'favehotel1.PNG'),
(6, 4, 'favehotel2.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `show_image_w`
--

DROP TABLE IF EXISTS `show_image_w`;
CREATE TABLE `show_image_w` (
  `id` int(100) NOT NULL,
  `id_wisata` int(100) NOT NULL,
  `sw_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_image_w`
--

INSERT INTO `show_image_w` (`id`, `id_wisata`, `sw_image`) VALUES
(7, 7, 'angsana1.PNG'),
(8, 7, 'angsana2.PNG'),
(9, 7, 'angsana3.PNG'),
(10, 7, 'angsana4.PNG'),
(11, 8, 'waterboom1.PNG'),
(13, 8, 'waterboom2.PNG'),
(14, 9, 'pulaukembang1.PNG'),
(15, 9, 'pulaukambang2.PNG'),
(16, 9, 'pulaukambang3.PNG'),
(17, 10, 'airterjun_bajuin3.PNG'),
(18, 10, 'airterjun_bajuin2.PNG'),
(19, 10, 'ariterjunbajuin1.PNG'),
(20, 11, 'rimpi1.PNG'),
(21, 11, 'rimpi2.PNG'),
(22, 11, 'rimpi3.PNG'),
(23, 13, 'museum_lambung_mangkurat.PNG'),
(24, 14, 'taman_edukasi_lalulintas.PNG'),
(25, 15, 'terapunglokbaintan2.PNG'),
(26, 16, 'makam_sultan_suriansah2.PNG'),
(27, 17, 'gg_pengkor2.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jenkel` varchar(30) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `image_ktp` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `jenkel`, `no_hp`, `alamat`, `image_ktp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Anshor D', '1234@gmail.com', 'Laki - laki', '08315997123', 'Jl. Pahlawan Gg.Cemara No.12 RT.1', 'ktp-wna.jpg', 'M_HIJRA_ANSHORI_DIKNAS.JPG', '$2y$10$0oy0rS1/1r6DcQ9Jg3gLyOYayeWR7pfbs8IcTKUZfLG/DXFGq82Aq', 1, 1, '2020-10-04'),
(3, 'Hijra', 'hijradiknas1998@gmail.com', 'Laki - laki', '083159971232', 'Jl. Pahlawan Gg.Cemara No.12', 'ktp-wna2.jpg', 'photo-1500625597061-d472abd2afbb.jpg', '$2y$10$cLBtkuU8SMlrfolig8NdhOHFmcZJQnZu3s5H9izhS5ZYaN42eva8S', 2, 1, '2020-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(6, 1, 5),
(20, 1, 9),
(22, 1, 8),
(23, 2, 8),
(25, 1, 4),
(26, 1, 6),
(28, 2, 7),
(30, 1, 2),
(31, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Verifikasi'),
(5, 'Data'),
(6, 'Laporan'),
(7, 'Postingan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/index', 'fas fa-fw fa-chart-bar', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/editprofile', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(14, 5, 'Wisata', 'data/datawisata', 'fas fa-fw fa-chart-area', 1),
(17, 5, 'Hotel', 'data/datapenginapan', 'fas fa-fw fa-hotel', 1),
(19, 6, 'List Laporan', 'laporan/listlap', 'fas fa-fw fa-chart-area', 1),
(28, 7, 'Wisata', 'postingan/datawisata', 'fas fa-fw fa-chart-area', 1),
(30, 7, 'Hotel', 'postingan/datapenginapan', 'fas fa-fw fa-hotel', 1),
(33, 4, 'Data Baru', 'verifikasi/listdatabaru', 'fas fa-fw fa-chart-area', 1),
(34, 5, 'Data Guru', 'data/dataguru', 'fas fa-fw fa-hotel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

DROP TABLE IF EXISTS `wisata`;
CREATE TABLE `wisata` (
  `id_wisata` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `nm_wisata` varchar(300) NOT NULL,
  `id_ktg` int(2) NOT NULL,
  `kalangan` varchar(50) NOT NULL,
  `jam_buka` varchar(25) NOT NULL,
  `w_id_kab` int(5) NOT NULL,
  `w_id_kec` int(5) NOT NULL,
  `jln` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `ket_status` text NOT NULL,
  `event` varchar(50) NOT NULL,
  `ket_event` text NOT NULL,
  `w_image` varchar(300) NOT NULL,
  `ket_tambah` varchar(100) NOT NULL,
  `acc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `id_user`, `latitude`, `longitude`, `nm_wisata`, `id_ktg`, `kalangan`, `jam_buka`, `w_id_kab`, `w_id_kec`, `jln`, `deskripsi`, `status`, `ket_status`, `event`, `ket_event`, `w_image`, `ket_tambah`, `acc`) VALUES
(8, 1, '-3.3885550429669062', '114.6496832370758', 'Waterboom Pesona Modern', 2, 'Semua Kalangan', '10.00 - 18.00', 2, 136, 'Jl. A. Yani Km.11, Ps. Kemis ', '<p>Waterboom Pesona Modern merupakan kolam renang di Banjarmasin yang menyimpan banyak keseruan di dalamnya. Sekitar 300&nbsp;sampai dengan 500&nbsp;pengunjung perharinya datang di waterboom ini. Pada akhir pekan, jumlah pengunjung bisa lebih banyak lagi.</p>\r\n\r\n<p>Ramainya pengunjung yang datang ke water park tentu karena memiliki daya tarik lebih. Daya tarik tersebut ialah karena waterboom ini memiliki tata ruang yang baik, serta wahana yang banyak dan beragam.</p>\r\n\r\n<p>Ragam wahana yang tersedia tersebut juga bisa mengakomodir semua kalangan usia dari untuk balita, anak-anak, hingga yang dewasa. Tak ketinggalan, wahana ekstrem juga tersedia untuk memenuhi hasrat pecinta tantangan.&nbsp;</p>\r\n', 'Tutup', '<p>Tutup Selama Pandemi Covid-19</p>\r\n', 'Tidak Ada', '-', 'waterboom.PNG', '', 1),
(9, 1, '-3.304258', '114.561398', 'Pulau Kambang', 1, 'Semua Kalangan', '10.00 - 15.00', 3, 1, 'PH26+37 Pulau Alalak', '<p>Pulau Kembang merupakan sebuah pulau yang berada di tengah Sungai Barito. Tempat wisata ini menjadi habitat monyet dan beberapa jenis burung. Menurut warga, di pulau ini terdapat seekor monyet besar yang merupakan raja monyet.</p>\r\n\r\n<p>Saat berada di pulau ini, berhati-hatilah dengan barang bawaan Anda. Monyet-monyet seringkali penasaran dan ingin melihat apa saja yang Anda bawa. Sebaiknya bawa makanan ringan atau buahbuahan untuk mengalihkan perhatian mereka dari tas Anda.</p>\r\n', 'Buka', '-', 'Ada', '<p>Acara memperingati sejarahnya pulau kambang</p>\r\n', 'pulau_kambang.PNG', '', 1),
(10, 1, '-3.772887302449057', '114.86014008522034', 'Air Terjun Bajuin', 1, 'Kalangan Dewasa', '08.00 - 17.00', 10, 43, '6VG6+J8 Sungai Bakar', '<p>Air terjun Bajuin memiliki panorama pegunungan yang indah, eksotik, dan udaranya pun masih sangat sejuk karena banyaknya pepohonan. Di kawasan ini terdapat tiga air terjun dengan ketinggian yang berbeda, dikarenakan alamnya yang masih asri dan alami.</p>\r\n\r\n<p>Di sini juga terdapat beberapa jenis burung dan tanaman anggrek hutan, serta bunga bangkai. Air Terjun Bajuin berada di kawasan pegunungan Maratus.</p>\r\n\r\n<p>Kawasan ini dikembangkan menjadi ekowisata alam seperti traking, climbing, hiking. Meskipun objek wisata ini memiliki area parkir yang luas namun sayangnya belum tersedia fasilitas yang memadai seperti banyaknya jalan rusak. Oleh karena itu untuk menuju objek wisata ini masih sangat sulit, namun pemerintah setempat sedang melakukan perbaikan. Di kawasan ini juga terdapat telaga alam batuah yang tidak jauh dari area parkir.</p>\r\n', 'Tutup', '<p>Tutup Selama Pandemi Covid-19</p>\r\n', 'Tidak Ada', '-', 'airterjun_bajuin.PNG', '', 1),
(11, 1, '-3.846420', '114.791695', 'Bukit Rimpi', 1, 'Semua Kalangan', '08.00 - 17.00', 10, 53, '5Q3R+9M Tampang, Jl. Jend. Ahmad Yani', '<p>Siapapun yang datang pasti akan terkagum-kagum dengan keindahan&nbsp; panorama di sekitarnya yang serasa berada di New Zealand. Tak jarang, gerombolan hewan ternak pun terlihat di sekitar kawasan bukit sedang mencari makanan. Perpaduan bukit hijau dan hewan ternak di sekitar bukit semakin menambah keindahan Bukit Rimpi ini. Bukit Rimpi juga merupakan salah satu spot terbaik untuk menikmati panorama keindahan matahari terbit di pagi hari.</p>\r\n', 'Buka', '<p>-</p>\r\n', 'Tidak Ada', '<p>-</p>\r\n', 'bukit_rimpi.PNG', '', 1),
(12, 1, '-3.303922', '114.609079', 'Museum Wasaka', 6, 'Semua Kalangan', '08.00 - 17.00', 13, 22, 'Jl. Kampung Kenanga, Sungai Jingah', '<p>fdsfgsgf sdf gsd</p>\r\n', 'Buka', '-', 'Tidak Ada', '-', 'museum_wasaka.PNG', '', 1),
(13, 3, '-3.442121', '114.838160', 'Museum Lambung Mangkurat', 6, 'Semua Kalangan', '08.00 - 17.00', 12, 27, 'Jl. Garuda, Komet', '<p>Museum Lambung Mangkurat sendiri terbagi menjadi 3 ruangan, yakni ruang pra sejarah, ruang sejarah dan ruang etnis budaya. Ketiga ruang tersebut hanya memamerkan sepertiga dari koleksi museum yang berjumlah lebih dari 12.000 koleksi. Jenis koleksi yang terdaat pada Museum Lambung Mangkurat ini berupa etnografika, historika, geologika/geografika, heraldika, biologika, arkeologika, numansimatika, keramalogika, Filologika, tekhnologika dan berbagai koleksi seni rupa.</p>\r\n', 'Buka', '-', 'Tidak Ada', '-', 'museum_lambung_mangkurat1.PNG', '', 1),
(14, 3, '-3.316921', '114.590982', 'Taman Edukasi Lalulintas', 6, 'Kalangan Anak-anak', '08.00 - 17.00', 13, 20, 'Jl. AS Musaffa No.2, Antasan Besar', '<p>Taman Edukasi Lalu Lintas Banua yang diresmikan Ketua Tim Penggerak PKK Pusat, dr Erni Guntarti Tjahyo Kumolo, pada awal 2018 itu bertujuan memberikan pengetahuan tertib berlalulintas sejak usia dini.</p>\r\n\r\n<p>Sementara anak-anak bermain, orangtua bisa bersantai menunggu di bawah pohon atau tempat duduk yag disediakan.</p>\r\n', 'Buka', '-', 'Tidak Ada', '-', 'taman_edukasi_lalulintas.PNG', '', 1),
(15, 3, '-3.289173', '114.669831', 'Pasar Terapung Lok Baintan', 5, 'Semua Kalangan', '07.00 - 11.00', 2, 146, 'Jalan Sungai Martapura Jl. Sungai Tandipah', '<p>Karena sebagian masyarakat Banjarmasin ini hidup ditepi sungai,makan lumrah saja kalau pasar yang adapun berkegiatan di sungai,namun hal ini menjadi menarik bagi wisatawan karena bisa jadi barang yang kita beli diulurkan pakai tongkat oleh pembelinya,jangan lupa untuk berkunjung ke Pasar Teapung ini kalau anda ke Banjarmasin.</p>\r\n', 'Buka', '-', 'Tidak Ada', '-', 'terapung_lokbaintan1.PNG', '', 1),
(16, 3, '-3.293379', '114.572498', 'Makam Sultan Suriansyah', 4, 'Kalangan Dewasa', '08.00 - 17.00', 13, 22, 'Jl. Kuin Utara No.220, Kuin Utara', '<p>Komplek makam Sultan Suriansyah berlokasi di kelurahan Kuin Utara kecamatan Banjarmasin Utara Kota Banjarmasin.</p>\r\n\r\n<p>Bangunan situs benda cagar budaya tidak bergerak dengan ukuran luas bangunan 305,5 M2 di dalam komplek pemakaman inilah Sultan Suriansyah beserta ratunya dimakamkan secara berdampingan.</p>\r\n\r\n<p>Pada kompleks makam Sultan Suriansyah terdapat pula makam para pembesar lainnya yaitu khatib Dayyan, Patih Kuin, Patih Masih, Hulu Balang kesultanan atau Senopati Antakesuma, Pangeran Muhammad, Pangeran Ahmad, Hajah Saanah dan makam anak seorang Cina Islam.</p>\r\n', 'Buka', '-', 'Tidak Ada', '-', 'makam_sultan_suriansah1.PNG', '', 1),
(17, 3, '-3.300106', '114.591014', 'Kawasan Wista Kuliner Gg. Pengkor', 3, 'Semua Kalangan', '10.00 - 20.00', 13, 22, 'Jl. Kayu Tangi I No.10, Sungai Miai', '<p>Di dalamnya banyak warung atau kafe kecil yang menjual berbagai makanan yang murah. Tak hanya makanan khas Banjar yang dijual di sini, namun ada juga kuliner dari daerah lain seperti dari Jawa Timur, serabi Sunda dari Jawa Barat, rawon hingga makanan khas Jepang seperti Mi Udon.</p>\r\n', 'Buka', '-', 'Tidak Ada', '-', 'gg_pengkor1.PNG', 'Cafe', 1),
(23, 3, '-3.348921589569934', '115.67504882812501', 'tes wisata baru', 2, 'Semua Kalangan', '10.00 - 15.00', 1, 151, 'Jl. Sawit KM.8, Bunati', '<p>sdfa sdfa sdf as dfa dsf asd fasdf asd fa sd f</p>\r\n', 'Buka', '-', 'Tidak Ada', '-', 'Uz_Bulat.png', '', 0),
(24, 3, '-3.332470101396139', '114.61486816406251', 'wisata lokbaintan', 1, 'Semua Kalangan', '10:00 - 15:00', 13, 19, 'jl a yani', '<p>wisata lokbaintan alam adalah bla bla bla</p>\r\n', 'Buka', '-', 'Tidak Ada', '-', 'Uz2.jpg', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kab`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `ktg_wisata`
--
ALTER TABLE `ktg_wisata`
  ADD PRIMARY KEY (`id_ktg`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id_penginapan`);

--
-- Indexes for table `show_image_pe`
--
ALTER TABLE `show_image_pe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_image_w`
--
ALTER TABLE `show_image_w`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kab` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `ktg_wisata`
--
ALTER TABLE `ktg_wisata`
  MODIFY `id_ktg` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id_penginapan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `show_image_pe`
--
ALTER TABLE `show_image_pe`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `show_image_w`
--
ALTER TABLE `show_image_w`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
