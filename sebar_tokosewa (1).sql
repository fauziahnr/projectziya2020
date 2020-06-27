-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 08:11 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sebar_tokosewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `desa_id` int(11) NOT NULL,
  `desa_nama` varchar(50) NOT NULL,
  `desa_kecamatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`desa_id`, `desa_nama`, `desa_kecamatan_id`) VALUES
(1, 'Cabawan', 1),
(2, 'Kaligangsa', 1),
(3, 'Kalinyamat Kulon', 1),
(4, 'Krandon', 1),
(5, 'Margadana', 1),
(6, 'Pesurungan Lor', 1),
(7, 'Sumurpanggang', 1),
(8, 'Debong Lor', 2),
(9, 'Kemandungan', 2),
(10, 'Kraton', 2),
(11, 'Muarareja', 2),
(12, 'Pekauman', 2),
(13, 'Pesurungan Kidul', 2),
(14, 'Tegal Sari', 2),
(15, 'Bandung', 3),
(16, 'Debong Kidul', 3),
(17, 'Debong Kulon', 3),
(18, 'Debong Tengah', 3),
(19, 'Kalinyamat Wetan', 3),
(20, 'Keturen', 3),
(21, 'Randu Gunting', 3),
(22, 'Tunon', 3),
(23, 'Kejambon', 4),
(24, 'Mangkukusuman', 4),
(25, 'Mintaragen', 4),
(26, 'Panggung', 4),
(27, 'Slerok', 4),
(28, 'Adiwerna', 5),
(29, 'Bersole', 5),
(30, 'Gumalar', 5),
(31, 'Harjosari Kidul', 5),
(32, 'Harjosari Lor', 5),
(33, 'Kalimati', 5),
(34, 'Kaliwadas', 5),
(35, 'Kedungsukun', 5),
(36, 'Lemahduwur', 5),
(37, 'Lumingser', 5),
(38, 'Pagedangan', 5),
(39, 'Pagiyanten', 5),
(40, 'Pecangakan', 5),
(41, 'Pedeslohor', 5),
(42, 'Penarukan', 5),
(43, 'Pesarean', 5),
(44, 'Tembok Banjaran', 5),
(45, 'Tembok Kidul', 5),
(46, 'Tembok Lor', 5),
(47, 'Tembok Luwung', 5),
(48, 'Ujungrusi', 5),
(49, 'Balapulang Lor', 6),
(50, 'Balapulang Wetan', 6),
(51, 'Banjaranyar', 6),
(52, 'Batuagung', 6),
(53, 'Bukateja', 6),
(54, 'Cenggini', 6),
(55, 'Cibunar', 6),
(56, 'Cilongok', 6),
(57, 'Danareja', 6),
(58, 'Danawarih', 6),
(59, 'Harjawinangun', 6),
(60, 'Kalibakung', 6),
(61, 'Kaliwungu', 6),
(62, 'Karangjambu', 6),
(63, 'Pagerwangi', 6),
(64, 'Pamiritan', 6),
(65, 'Sangkajaya', 6),
(66, 'Sesepan', 6),
(67, 'Tembongwah', 6),
(68, 'Wringin Jenggot', 6),
(69, ' Batunyana ', 7),
(70, ' Bojong ', 7),
(71, ' Buniwah ', 7),
(72, 'Cikura', 7),
(73, 'Danasari', 7),
(74, 'Dukuhtengah', 7),
(75, 'Gunungjati', 7),
(76, 'Kajenengan', 7),
(77, 'Kalijambu', 7),
(78, 'Karangmulyo', 7),
(79, 'Kedawung', 7),
(80, 'Lengkong', 7),
(81, 'Pucang Luwuk', 7),
(82, 'Rembul', 7),
(83, 'Sangkanayu', 7),
(84, 'Suniarsih', 7),
(85, 'Tuwel', 7),
(86, ' Batumirah ', 8),
(87, 'Begawat ', 8),
(88, ' Bumijawa ', 8),
(89, 'Carul', 8),
(90, 'Cawitali', 8),
(91, 'Cempaka', 8),
(92, 'Cintamanik', 8),
(93, 'Dukuh Benda', 8),
(94, 'Guci', 8),
(95, 'Gunung Agung', 8),
(96, 'Jejeg', 8),
(97, 'Muncanglarang', 8),
(98, 'Pagerkasih', 8),
(99, 'Sigedong', 8),
(100, 'Sokatengah', 8),
(101, 'Sumbaga', 8),
(102, 'Traju', 8),
(103, ' Bandasari', 9),
(104, 'Debong Wetan ', 9),
(105, ' Dukuhturi ', 9),
(106, 'Grogol', 9),
(107, 'Kademangaran', 9),
(108, 'Karangayar', 9),
(109, 'Kepandean', 9),
(110, 'Ketanggungan', 9),
(111, 'Kupu', 9),
(112, 'Lawatan', 9),
(113, 'Pagongan', 9),
(114, 'Pekauman Kulon', 9),
(115, 'Pangabean', 9),
(116, 'Pengarasan', 9),
(117, 'Sidakaton', 9),
(118, 'Sidapurna', 9),
(119, 'Sutapranan', 9),
(120, ' Blubuk', 10),
(121, 'Bulakpacing', 10),
(122, ' Dukuhwaru ', 10),
(123, 'Gumayun', 10),
(124, 'Kabunan', 10),
(125, 'Kalisoka', 10),
(126, 'Pedagangan', 10),
(127, 'Selapura', 10),
(128, 'Sindang', 10),
(129, 'Slarang Lor', 10),
(130, 'Argatawang', 11),
(131, 'Capar', 11),
(132, 'Cerih', 11),
(133, 'Dukuhbangsa', 11),
(134, 'Gantungan', 11),
(135, 'Jatinegara', 11),
(136, 'Kedungwungu', 11),
(137, 'Lebakwangi', 11),
(138, 'Lembahsari', 11),
(139, 'Luwijawa', 11),
(140, 'Mokaha', 11),
(141, 'Padasari', 11),
(142, 'Penyalahan', 11),
(143, 'Setail', 11),
(144, 'Sumbarang', 11),
(145, 'Tamansari', 11),
(146, 'Wotgalih', 11),
(147, 'Dukuhjati Wetan', 12),
(148, 'Karang Anyar', 12),
(149, 'Karangmalang', 12),
(150, 'Kebandingan', 12),
(151, 'Kedungbanteng', 12),
(152, 'Margamulya', 12),
(153, 'Penujah', 12),
(154, 'Semedo', 12),
(155, 'Sumingkir', 12),
(156, 'Tonggara', 12),
(157, 'Babakan', 13),
(158, 'Bangun Galih', 13),
(159, 'Bangkok', 13),
(160, 'Dampyak', 13),
(161, 'Dinuk', 13),
(162, 'Jati Lawang', 13),
(163, 'Kemantran', 13),
(164, 'Kemuning', 13),
(165, 'Kepunduhan', 13),
(166, 'Kertaharja', 13),
(167, 'Kertayasa', 13),
(168, 'Ketileng', 13),
(169, 'Kramat', 13),
(170, 'Maribaya', 13),
(171, 'Mejasem Barat', 13),
(172, 'Mejasem Timur', 13),
(173, 'Munjung Agung', 13),
(174, 'Padaharja', 13),
(175, 'Plumbungan', 13),
(176, 'Tanjungharja', 13),
(177, 'Balaradin', 14),
(178, 'Dukuhdamu', 14),
(179, 'Dukuhlo', 14),
(180, 'Jatimulya', 14),
(181, 'Kajen', 14),
(182, 'Kambangan', 14),
(183, 'Kesuben', 14),
(184, 'Lebakgowah', 14),
(185, 'Lebaksiu Kidul', 14),
(186, 'Lebaksiu Lor', 14),
(187, 'Pendawa', 14),
(188, 'Slarang Kidul', 14),
(189, 'Tegalandong', 14),
(190, 'Timbangreja', 14),
(191, 'Yamansari', 14),
(192, 'Danareja', 15),
(193, 'Dukuh Tengah', 15),
(194, 'Jatilaba', 15),
(195, 'Jembayat', 15),
(196, 'Kaligayam', 15),
(197, 'Kalisalak', 15),
(198, 'Karangdawa', 15),
(199, 'Marga Ayu', 15),
(200, 'Margasari', 15),
(201, 'Pakulaut', 15),
(202, 'Prupuk Selatan', 15),
(203, 'Prupuk Utara', 15),
(204, 'Wanasari', 15),
(205, 'Jatiwangi', 16),
(206, 'Karanganyar', 16),
(207, 'Kedungsugih', 16),
(208, 'Kertaharja', 16),
(209, 'Mulyoharjo', 16),
(210, 'Pagerbarang', 16),
(211, 'Pesarean', 16),
(212, 'Rajegwesi', 16),
(213, 'Randusari', 16),
(214, 'Semboja', 16),
(215, 'Sidamulya', 16),
(216, 'Srengseng', 16),
(217, 'Surokidul', 16),
(218, 'Balamoa', 17),
(219, 'Bedug', 17),
(220, 'Bogares Kidul', 17),
(221, 'Bogares Lor', 17),
(222, 'Curug', 17),
(223, 'Depok', 17),
(224, 'Dermasandi', 17),
(225, 'Dermasuci', 17),
(226, 'Dukuhjati Kidul', 17),
(227, 'Dukuhsembung', 17),
(228, 'Grobog Kulon', 17),
(229, 'Grobog Wetan', 17),
(230, 'Jenggawur', 17),
(231, 'Kalikangkung', 17),
(232, 'Kendalserut', 17),
(233, 'Paketiban', 17),
(234, 'Pangkah', 17),
(235, 'Pecabean', 17),
(236, 'Pener', 17),
(237, 'Penusupan', 17),
(238, 'Purbayasa', 17),
(239, 'Rancawiru', 17),
(240, 'Talok', 17),
(241, 'Dukuh Ringin', 18),
(242, 'Dukuh Salam', 18),
(243, 'Kagok', 18),
(244, 'Kalisapu', 18),
(245, 'Kudaile', 18),
(246, 'Pakembaran', 18),
(247, 'Procot', 18),
(248, 'Slawi Kulon', 18),
(249, 'Slawi Wetan', 18),
(250, 'Trayeman', 18),
(251, 'Bojongsana', 19),
(252, 'Gembongdadi', 19),
(253, 'Harjasari', 19),
(254, 'Jatibogor', 19),
(255, 'Jatimulya', 19),
(256, 'Karangmulya', 19),
(257, 'Karangwuluh', 19),
(258, 'Kertasari', 19),
(259, 'Purwahamba', 19),
(260, 'Sidaharja', 19),
(261, 'Suradadi', 19),
(262, 'Bengle', 20),
(263, 'Cangkring', 20),
(264, 'Dukuhmalang', 20),
(265, 'Gembongkulon', 20),
(266, 'Getaskerep', 20),
(267, 'Kajen', 20),
(268, 'Kaladawa', 20),
(269, 'Kaligayam', 20),
(270, 'Kebasen', 20),
(271, 'Langgen', 20),
(272, 'Pacul', 20),
(273, 'Pasangan', 20),
(274, 'Pegirikan', 20),
(275, 'Pekiringan', 20),
(276, 'Pesayangan', 20),
(277, 'Talang', 20),
(278, 'Tegalwangi', 20),
(279, 'Wangandawa', 20),
(280, 'Dawuhan', 20),
(281, 'Brekat', 21),
(282, 'Bulakwaru', 21),
(283, 'Bumiharja', 21),
(284, 'Jatirawa', 21),
(285, 'Kabukan', 21),
(286, 'Kalijambe', 21),
(287, 'Karangjati', 21),
(288, 'Karangmangu', 21),
(289, 'Kedokan Sayang', 21),
(290, 'Kedung Bungkus', 21),
(291, 'Kemanggungan', 21),
(292, 'Kesadikan', 21),
(293, 'Kesamiran', 21),
(294, 'Lebeteng', 21),
(295, 'Mangunsaren', 21),
(296, 'Margapadang', 21),
(297, 'Mindaka', 21),
(298, 'Purbasana', 21),
(299, 'Setu', 21),
(300, 'Tarub', 21),
(301, 'Banjaragung', 22),
(302, 'Banjarturi', 22),
(303, 'Demangharjo', 22),
(304, 'Kedungjati', 22),
(305, 'Kedungkelor', 22),
(306, 'Kendayakan', 22),
(307, 'Kreman', 22),
(308, 'Rangi Mulya', 22),
(309, 'Sidamulya', 22),
(310, 'Sigentong', 22),
(311, 'Sukareja', 22),
(312, 'Warureja', 22);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(2, 10, 'hgjguy', '12.jpg', '2019-05-23 05:09:04'),
(3, 9, 'ljfiojdfffdf', 'favicon1.png', '2019-05-24 05:10:52'),
(4, 10, 'djhjhd', 'logosss.png', '2019-05-24 07:45:35'),
(6, 15, 'guy', '1200px-Regular_octagon_svg.png', '2019-06-14 18:48:56'),
(7, 15, 'yuggy', '4x6im2.jpg', '2019-06-14 18:52:16'),
(8, 35, 'gmbar1', 'Screenshot_1.jpg', '2019-07-27 02:12:34'),
(9, 35, 'gambar2', 'Screenshot_32.jpg', '2019-07-27 02:12:49'),
(10, 39, 'running1', 'Screenshot_5.jpg', '2019-08-07 19:35:04'),
(11, 43, '2', 'Screenshot_8.jpg', '2019-08-07 19:58:09'),
(12, 43, '3', 'Screenshot_9.jpg', '2019-08-07 19:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelapak` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(13) NOT NULL,
  `status_sewa` varchar(20) NOT NULL,
  `status_pembayaran` varchar(7) NOT NULL,
  `jumlah_bayar` int(13) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelapak`, `id_pelanggan`, `id_produk`, `nama_pelanggan`, `email_pelanggan`, `telepon`, `tanggal_sewa`, `stok`, `jumlah_hari`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_sewa`, `status_pembayaran`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(53, 0, 62, 12, 30, 'pelanggan', 'pelanggan@gmail.com', '085443217865', '2019-08-07', 1, 1, '   Slawi', '06082019J4VPCLKJ', '2019-08-06 00:00:00', 350000, 'Disewa', 'online', 350000, '974830304', 'pelanggan', 'e-cash-palsu11.jpg', 0, '20-08-2019', 'Bank BRI', '2019-08-06 14:20:56', '2019-09-14 13:24:09'),
(54, 0, 10, 12, 33, 'pelanggan', 'pelanggan@gmail.com', '085443217865', '2019-08-21', 0, 1, '   Slawi', '06082019WQHB60OR', '2019-08-06 00:00:00', 10000, 'Menunggu Konfirmasi', 'offline', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-06 14:21:19', '2019-08-06 07:21:19'),
(55, 0, 62, 18, 31, 'deni', 'deni@for.rwo', '081902321234', '2019-08-15', 0, 5, '   jalanfeeir', '07082019E5DILH2T', '2019-08-07 00:00:00', 1750000, 'Disewa', 'offline', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-07 22:03:47', '2019-08-12 13:24:09'),
(56, 0, 67, 19, 38, 'pelanggann', 'pelanggann@123.com', '08483723324', '2019-07-18', 0, 3, '  bogor', '08082019LOTSHA5Q', '2019-08-08 00:00:00', 1050000, 'Konfirmasi', 'online', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-08 08:40:13', '2019-08-08 01:50:36'),
(57, 0, 62, 12, 31, 'pelanggan', 'pelanggan@gmail.com', '085443217865', '2019-08-24', 2, 1, '   Jalan merak ', '29082019GYOFOAYU', '2019-08-29 00:00:00', 350000, 'Konfirmasi', 'offline', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-29 21:00:34', '2019-09-14 13:22:09'),
(58, 0, 67, 12, 40, 'pelanggan', 'pelanggan@gmail.com', '085443217865', '0000-00-00', 2, 1, '   Jalan merak ', '14092019IK6CFEZC', '2019-09-14 00:00:00', 350000, 'Menunggu Konfirmasi', 'online', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-14 20:05:03', '2019-09-14 13:09:22'),
(59, 0, 67, 12, 41, 'pelanggan', 'pelanggan@gmail.com', '085443217865', '0000-00-00', NULL, 2, '   Jalan merak ', '150920195RFBNQZI', '2019-09-15 00:00:00', 700000, 'Menunggu Konfirmasi', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-15 08:23:40', '2019-09-15 01:23:40'),
(60, 0, 62, 12, 30, 'pelanggan', 'pelanggan@gmail.com', '085443217865', '0000-00-00', NULL, 1, '   Jalan merak ', '150920195ZLIRLOY', '2019-09-15 00:00:00', 350000, 'Menunggu Konfirmasi', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-15 08:26:29', '2019-09-15 01:26:29'),
(61, 0, 62, 12, 29, 'pelanggan', 'pelanggan@gmail.com', '085443217865', '0000-00-00', NULL, 2, '   Jalan merak ', '150920192A6IHQJW', '2019-09-15 00:00:00', 1000000, 'Menunggu Konfirmasi', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-15 08:28:20', '2019-09-15 01:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(3, 'elektronik', 'Elektronik', 1, '2019-05-16 04:08:27'),
(4, 'sepatu', 'Sepatu', 4, '2019-05-12 08:16:50'),
(5, 'pakaian', 'Pakaian', 2, '2019-05-12 08:20:57'),
(6, 'buku', 'Buku', 5, '2019-05-16 05:20:33'),
(7, 'mainan-anak', 'Mainan Anak', 3, '2019-05-16 07:03:53'),
(10, 'dekorasi', 'Dekorasi', NULL, '2019-05-24 12:44:53'),
(12, 'alat-bangunan', 'Alat Bangunan', NULL, '2019-06-30 15:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kecamatan_id` int(11) NOT NULL,
  `kecamatan_nama` varchar(50) NOT NULL,
  `kecamatan_kota_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kecamatan_id`, `kecamatan_nama`, `kecamatan_kota_id`) VALUES
(1, 'Margadana', 1),
(2, 'Tegal Barat', 1),
(3, 'Tegal Selatan', 1),
(4, 'Tegal Timur', 1),
(5, 'Adiwerna', 2),
(6, 'Balapulang', 2),
(7, 'Bojong', 2),
(8, 'Bumijawa', 2),
(9, 'Dukuhturi', 2),
(10, 'Dukuhwaru', 2),
(11, 'Jatinegara', 2),
(12, 'Kedungbanteng', 2),
(13, 'Kramat', 2),
(14, 'Lebaksiu', 2),
(15, 'Margasari', 2),
(16, 'Pagerbarang', 2),
(17, 'Pangkah', 2),
(18, 'Slawi', 2),
(19, 'Suradadi', 2),
(20, 'Talang', 2),
(21, 'Tarub', 2),
(22, 'Warureja', 2);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text,
  `metatext` text,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Sebar', 'Sewa apa saja jadi lebih mudah', 'utianailma@gmail.com', 'http://sebar.com', 'Sewa menyewa barang', 'OK', '081902321234', 'Tegal', 'http://facebook.com/sebarweb', 'http://instagram.com/sebarweb', 'OKk', 'logo2.png', 'favicon21.png', 'OK', '2019-08-12 13:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pelapak`
--

CREATE TABLE `konfirmasi_pelapak` (
  `id_konfirmasi_pelapak` int(11) NOT NULL,
  `id_pelapak` int(11) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tanggal_konfirmasi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `kota_id` int(11) NOT NULL,
  `kota_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`kota_id`, `kota_nama`) VALUES
(1, 'Kota Tegal'),
(2, 'Kabupaten Tegal');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kota` int(6) NOT NULL,
  `kecamatan` int(6) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password`, `telepon`, `alamat`, `kota`, `kecamatan`, `tanggal_daftar`, `tanggal_update`, `is_active`) VALUES
(8, 0, 'Pending', 'pelanggan', 'mailmail@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '08535933242', ' Jalan Banjaran No5 Rt8 Rw 2', 0, 0, '2019-08-05 00:39:35', '2019-08-05 00:39:35', 0),
(10, 0, 'Pending', 'itaafiat', 'itaafiat@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '081733333312', ' Jalan mawar tegal', 0, 0, '2019-06-20 10:59:59', '2019-06-20 15:59:59', 0),
(11, 0, 'Pending', 'sicuy', 'alfan@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '087877632412', ' Brebes', 0, 0, '2019-06-22 05:01:23', '2019-06-22 10:01:23', 0),
(12, 0, 'Pending', 'pelanggan', 'pelanggan@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '085443217865', '  Jalan merak ', 0, 0, '2019-08-07 09:24:08', '2019-08-07 09:24:08', 0),
(13, 0, 'Pending', 'cobaaaaa', 'cobaaaaa@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '088889765456', ' tegal', 0, 0, '2019-07-12 06:26:06', '2019-07-12 11:26:06', 0),
(14, 0, 'Pending', 'mahmud', 'mahmud@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 'slawi', 0, 0, '2019-07-17 17:00:08', '2019-07-17 17:00:08', 0),
(16, 0, 'Pending', 'pelangganbaru', 'pelangganbaru@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 'jalan mawar nomor 53 rt 4 rw 4 Ds Bedug Kec Pangkag Kab Tegal', 0, 0, '2019-08-06 01:20:33', '2019-08-06 01:20:33', 0),
(17, 0, 'Pending', 'tukutuku', 'compong@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, ' jalan melati 034', 0, 0, '2019-08-07 14:53:32', '2019-08-07 14:53:32', 0),
(18, 0, 'Pending', 'deni', 'deni@for.rwo', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, '  jalanfeeir', 0, 0, '2019-08-07 14:54:35', '2019-08-07 14:54:35', 0),
(19, 0, 'Pending', 'pelanggann', 'pelanggann@123.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '08483723324', ' bogor', 0, 0, '2019-08-08 01:38:57', '2019-08-08 01:38:57', 0),
(24, 0, 'Pending', 'dandy', 'dandyazidansyah@gmail.com', '3873e65215137cb2fb8c78682f0a822f4759d71a', NULL, 'Jl Kemerdekaan', 2, 5, '2019-09-15 17:04:34', '2019-09-15 17:04:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_token`
--

CREATE TABLE `pelanggan_token` (
  `id` int(11) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `tanggal_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan_token`
--

INSERT INTO `pelanggan_token` (`id`, `email_pelanggan`, `token`, `tanggal_daftar`) VALUES
(85, 'dandyazidansyah@gmail.com', 'ePEFwWjN0qiC4X1fxFEQhJvbxHXYMPr/91RYIX29pCQ=', 1568566743),
(86, 'dandyazidansyah@gmail.com', 'mYXhOR42zgIhujkObAd4Avezt1UBnAJwiyj+CmiCZAo=', 1568566771),
(87, 'dandyazidansyah@gmail.com', 'sRMar2AhdLb83rZaVfDEO4ChqfcYguM4i30TC5LXf/4=', 1568566817),
(88, 'dandyazidansyah@gmail.com', 'wJUvzgT7HhghgZT2Q33iEBbwYasxjIM/bboWtRVxghY=', 1568566913);

-- --------------------------------------------------------

--
-- Table structure for table `pelapak`
--

CREATE TABLE `pelapak` (
  `id_pelapak` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pelapak` varchar(50) NOT NULL,
  `email_pelapak` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_rekening` int(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `is_active` int(11) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `foto_bukti` varchar(255) NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelapak`
--

INSERT INTO `pelapak` (`id_pelapak`, `id_user`, `nama_pelapak`, `email_pelapak`, `password`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `status`, `is_active`, `telepon`, `alamat`, `foto_profil`, `bukti_bayar`, `foto_bukti`, `tanggal_bayar`, `tanggal_daftar`, `tanggal_update`) VALUES
(6, 0, 'marpuah', 'marpuah@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0, '', 0, 1, '086754567654', ' Mejasem', '', '', '', '0000-00-00 00:00:00', '2019-07-13 09:30:20', '2019-07-13 09:30:20'),
(7, 0, 'akhila', 'akhila@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0, '', 0, 1, '087678765678', ' slawi', '', '', '', '0000-00-00 00:00:00', '2019-07-13 08:00:04', '2019-07-13 08:00:04'),
(10, 0, 'pelapak', 'pelapak@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0, '', 1, 1, '089878987678', '  pegirikan', '', 'Sudah', 'e-cash-palsu9.jpg', '0000-00-00 00:00:00', '2019-08-07 16:35:38', '2019-08-07 16:35:38'),
(62, 0, 'Pelapak', 'asiyahsayur@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0, '', 1, 1, '08787654123', '  pegirikan', '4x6im17.jpg', 'Sudah', 'e-cash-palsu10.jpg', '0000-00-00 00:00:00', '2019-08-07 14:40:54', '2019-08-07 14:40:54'),
(63, 0, 'wahyuadi', 'wahyu@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0, '', 0, 0, NULL, ' slawi', '', 'Belum', '', '0000-00-00 00:00:00', '2019-07-17 17:01:38', '2019-07-17 17:01:38'),
(65, 0, 'pelapakbaru', 'mailutiana@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0, '', 0, 1, NULL, '  Jalan Mawar No 6 Tegal', '', 'Belum', '', '0000-00-00 00:00:00', '2019-07-27 12:43:47', '2019-07-27 12:43:47'),
(66, 0, 'ujicoba', 'ujicobailma@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Mandiri', 859395742, 'udin', 0, 0, NULL, ' Pegirikan Talang', '', 'Belum', '', '0000-00-00 00:00:00', '2019-08-12 13:11:32', '2019-08-12 13:11:32'),
(67, 0, 'sobirin', 'sobirin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0, '', 0, 1, '087563475231', 'Jalan Gemahsari Rt 06 Desa Pegirikan- Kecamatan Talang- Kab. Tegal', 'IMG-20180926-WA0042-01.jpeg', 'Belum', '', '0000-00-00 00:00:00', '2019-08-07 14:11:11', '2019-08-07 14:11:11'),
(68, 0, 'Mustika Salon', 'tunjikha@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0, '', 0, 1, NULL, 'Jalan Raya Pegirikan Rt 08 Rw 02 Desa Pegirikan Kecamatan Talang Kabupaten Tegal', 'Screenshot_34.jpg', 'Belum', '', '0000-00-00 00:00:00', '2019-08-07 17:20:00', '2019-08-07 17:20:00'),
(69, 0, 'sicuy', 'sicuy@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0, '', 0, 1, NULL, 'jalan kenari no 09', 'DSC06357-01.jpeg', 'Belum', '', '0000-00-00 00:00:00', '2019-08-07 19:50:53', '2019-08-07 19:50:53'),
(70, 0, 'pelapaknew', 'dandyazidansyah@gmail.com', 'cbfdac6008f9cab4083784cbd1874f76618d2a97', '', 0, '', 0, 1, NULL, 'jalan merak kota tegal', '', 'Belum', '', '0000-00-00 00:00:00', '2019-09-13 07:21:25', '2019-09-13 07:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `pelapak_token`
--

CREATE TABLE `pelapak_token` (
  `id` int(11) NOT NULL,
  `email_pelapak` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `tanggal_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelapak_token`
--

INSERT INTO `pelapak_token` (`id`, `email_pelapak`, `token`, `tanggal_daftar`) VALUES
(40, 'wahyu@gmail.com', 'cvHmaGJgaNBs0epRnRixrS/UpsrZW57leeeIAd19bhA=', 1563382898),
(41, 'asiyahsayur@gmail.com', '2x7WqsrtHRlBGRqZylrBikJ/7bXV6SkRoKDhzu1Z5MM=', 1563541316),
(42, 'asiyahsayur@gmail.com', 'ryZV/9NZrNmz8Hwmzs/zZm8HrCDALFeZt+FZGuqNQKc=', 1563541371),
(43, 'asiyahsayur@gmail.com', 'ZnOOnqMKYrY+8Klgz540Xg8jRgKEInsvOf06CiT3jIU=', 1563542356),
(44, 'asiyahsayur@gmail.com', '7unLno99CJDSmQyEE7XvJUnTtO64/Kk1HacUs1quU7g=', 1563543378),
(45, 'asiyahsayur@gmail.com', 'yR5zPuvcri4+OPuhB65fCVd33yU9T1f+iNt4+3L2C4I=', 1563543428),
(46, 'asiyahsayur@gmail.com', 'QpHoUlMeauMO43gtOrYZMRFJNdXePSXB5rW3yvp/iHk=', 1563543479),
(47, 'asiyahsayur@gmail.com', 'bMUrrqlNq0ZHb2zS7XkNKbrqD7Y4FixTBVNWXnCP2ko=', 1563543681),
(48, 'asiyahsayur@gmail.com', 'G9CxEBjKnMXiwJrmrnaGtG9j4QMiVHdaIl8ToXhyprE=', 1563543989),
(49, 'asiyahsayur@gmail.com', 'yrh+K/Vti6mQaNwS3QBI9y9z3FtccGAXdMwgHe2xMM8=', 1563544041),
(50, 'asiyahsayur@gmail.com', 'eZ9BTQpDnG+OXS763Tbf9MLOqheJZNnGw2MgnnLrF/w=', 1563544081),
(51, 'asiyahsayur@gmail.com', 'sYmapzR2O6dxALWpQuAj3xZqN7WblkIX4EcebTW/s3U=', 1563544317),
(52, 'asiyahsayur@gmail.com', 'HSPrrbnVqZlbdGTVjp8iG0tXsqv3RP72icWOga41FfE=', 1563626347),
(53, 'asiyahsayur@gmail.com', 'dRfbnBsSqlkO2bsC99eZg0a7oL8cz6XS3z5VN23Gqp0=', 1563626683),
(54, 'asiyahsayur@gmail.com', 'JAjgC1lEfD6gReR5NfHN4dzZRIcgGRK+4Ejke/zTCTY=', 1563626718),
(55, 'asiyahsayur@gmail.com', 'VcAS2u7Qs0/SfsObMilTZO9iYnJN48vvj3a5TY7Apow=', 1563626762),
(56, 'asiyahsayur@gmail.com', 'at9sPqDFcXbxnzZxdFsgwM05fKrV36psJq6ltkRrfkc=', 1563626859),
(57, 'asiyahsayur@gmail.com', 'SejAZiud4pnskjMi31c7L5/KO/bRaRcsPGYh+dS7swU=', 1563627685),
(58, 'asiyahsayur@gmail.com', 'G3Pm2GECfoOncd+TrmxRTDMoM8DYXRNoLmM3rnMRe6I=', 1563627976),
(59, 'asiyahsayur@gmail.com', 'KoScPowPp8rGSdjsNuO90yIQIPnA0xpo7MKbYxPpRwQ=', 1563628102),
(60, 'asiyahsayur@gmail.com', 'IypP93ztVvPfE92X7Egzvsa0nYJ9Q3G+vKNQRtZv0GM=', 1563628496),
(61, 'ujicobailma@gmail.com', 'U/JcG3JF+nl4BoZlv679oMf+lnIavgsFxNtv84cjEdA=', 1563629210),
(62, 'mailutiana@gmail.com', 'xmWXpQPRvjCSvrsvdHEQRINnwOGnQusRVeQdtWjCYAI=', 1564230882),
(63, 'ujicobailma@gmail.com', '8zwATLqnCF6IzjGRNAEZb5Ey57FhNtpmQnaRMAWdZ44=', 1564960733),
(64, 'sobirin@gmail.com', 'keolDKb0oQ69WUVYn0fsCMtuuRii0iSB7EPJ7+OHnqE=', 1565185397),
(65, 'tunjikha@gmail.com', 'xGNvhJBQyP0xiJ1tp8VeF9apiDRE0TbjzgfghS8ADs8=', 1565197849),
(66, 'sicuy@gmail.com', 'MPTTVC1xZYyWfEx/N08GGjyiaF1gdeXZtoIAG5R2As8=', 1565207377),
(67, 'pelapaknew@gmail.com', 'IugSJiGZMyq9mY2hgLytOLaI9FgazUQlhPQvY1KCrR8=', 1565229824),
(68, 'dandyazidansyah@gmail.com', 'ibWwSTaNUZGXvGqC5KMkYgqJ/zeyO5t8FH+1vdHfiCU=', 1568260926),
(69, 'dandyazidansyah@gmail.com', 'GXoIYbzsiMShZY8c5pzlr3NmEzJ3tpEImqSXBw4MF6E=', 1568261024),
(70, 'dandyazidansyah@gmail.com', 'nd22sHc/0EnmazDe7DwTru+dZo8qUwX5m7zbhksX4YM=', 1568261283),
(71, 'dandyazidansyah@gmail.com', 'LtvPANe+LzMfOi6O73q0oVw6mPk5zsHyA69sqwSyqXk=', 1568261400),
(72, 'dandyazidansyah@gmail.com', 'HnZSHWooSe6c0SmbGHTTcBdyTaQFxUSzEcRvNZdDwnA=', 1568261614),
(73, 'dandyazidansyah@gmail.com', '+59JkOpG/jb3kwgihYKtIid7f5XfXW5fyb4CzEDDowc=', 1568261678),
(74, 'dandyazidansyah@gmail.com', 'jWFozZt6xy2tdXpbGF4vbadBsNVhwssMHQcSV8VfoKM=', 1568261756),
(75, 'dandyazidansyah@gmail.com', 'oE8qDUL2fNiW4v9doakcrgz3azY0FfAzt+59wCS0N48=', 1568262148),
(76, 'dandyazidansyah@gmail.com', '+S+0U66mTI3W0HCPXTspLXIJ+4HtKsvbxM3EaQFDHlQ=', 1568262258),
(77, 'dandyazidansyah@gmail.com', 'xvtDSITdAInCpiJw+C0fI/wKFDPq+8S/kiyofox19jc=', 1568262482),
(78, 'dandyazidansyah@gmail.com', 'ycNhqJUsiG1GV6Vdnflv8MRgyhqeY9n+Ow1I4rVhbS0=', 1568262579),
(79, 'dandyazidansyah@gmail.com', 'RA+oRY13++xk6wdgNoQet9EBbWEq3w+yNLkBJH3auv8=', 1568262675),
(80, 'dandyazidansyah@gmail.com', 'GuuYvsiqajXUvt5sNta95Hko8mvfI9T5b5pI3188P/0=', 1568310050),
(81, 'dandyazidansyah@gmail.com', 'vl760EFfQjwHzPPPlHekKYp2lmYYbvvf4oZ/i9vbjmA=', 1568310964),
(82, 'dandyazidansyah@gmail.com', 'eZI48qc1zc38bdpKCN6k8efZ6yLuSZzXdUJcxP9Mv7A=', 1568311016),
(83, 'dandyazidansyah@gmail.com', 'xMzTZa+YxePUAbYBIHlPh5nVDAvyIw0bTGpxmWg9Ids=', 1568311192),
(84, 'dandyazidansyah@gmail.com', '2yYyro3bwmvP6At6bTgrHQqSw/GexQxylyXw1I5NKL4=', 1568358943);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelapak` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggak_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_pelapak`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggak_update`) VALUES
(29, 0, 62, 10, 'DT01', 'Dekorasi Tunangan Home White Ring', 'dekorasi-tunangan-home-white-ring-dt01', '<p>Dekorasi Tunangan&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'dekor', 500000, 5, 'dekor12.jpg', 500, '3 x 5 Meter', 'Publish', '2019-07-26 11:22:49', '2019-07-26 04:22:49'),
(30, 0, 62, 10, 'DT02', 'Dekorasi Tunangan Pink', 'dekorasi-tunangan-pink-dt02', '', 'dekor', 350000, 1, 'dekor22.jpg', 15, '3 x 5 Meter', 'Publish', '2019-07-26 11:24:13', '2019-08-07 14:41:59'),
(31, 0, 62, 10, 'DT03', 'Dekorasi Tunangan Rose Pastel', 'dekorasi-tunangan-rose-pastel-dt03', '<p>Dekorasi tunangan rose pastel</p>\r\n', 'Dekorasi tunangan rose pastel', 350000, 7, 'dekor31.jpg', 15, '3 x 5 Meter', 'Publish', '2019-07-26 11:39:32', '2019-09-14 13:22:09'),
(32, 0, 10, 7, 'MA01', 'Scooter Pink ', 'scooter-pink-ma01', '<p>Skuter mainan anak usia 2 tahun.</p>\r\n', 'mainan anak', 5000, 4, 'SKUTER3.jpg', 5, 'S', 'Publish', '2019-07-26 14:32:40', '2019-07-29 10:23:37'),
(33, 0, 10, 7, 'MA02', 'Kursi makan bayi Cocolatte', 'kursi-makan-bayi-cocolatte-ma02', '<p>kursi makan anak usia 5&nbsp;bulan</p>\r\n', 'kursi makan anak', 10000, 5, 'Untitled-3.jpg', 500, 'S', 'Publish', '2019-07-26 14:36:02', '2019-08-04 11:35:24'),
(34, 0, 10, 7, 'MA03', 'Sepeda roda 3 ', 'sepeda-roda-3-ma03', '<p>Sepeda roda 3 untuk anak usia 1 tahun</p>\r\n', 'sepeda anak', 10000, 5, 'sepeda1.jpg', 5, 'S', 'Publish', '2019-07-26 14:44:46', '2019-07-27 02:14:25'),
(35, 0, 10, 12, 'MA04', 'Skuter anak ungu', 'skuter-anak-ungu-ma04', '<p>mainan anak skuter untuk anak usia 1 tahun</p>\r\n', 'mainan anak', 20000, 2, 'Screenshot_2.jpg', 5, 'Small ', 'Publish', '2019-07-26 16:23:15', '2019-08-06 04:57:32'),
(36, 0, 62, 10, 'DTS1', 'Dekorasi Tunangan Simple Putih Bunga', 'dekorasi-tunangan-simple-putih-bunga-dts1', '<p>Dekorasi murah untuk tunangan simpel</p>\r\n', 'dekor', 500000, 6, 'JFD.jpg', 5, '5x3 Meter', 'Publish', '2019-07-27 22:40:56', '2019-08-06 14:12:38'),
(37, 0, 67, 10, 'LY01', 'Set Layos biasa', 'set-layos-biasa-ly01', '<p>satu set tenda ukuran 3m x 8m atau 4m x 6m</p>\r\n', 'tenda, layos', 250000, 1, 'Screenshot_4.jpg', 100, '24 m2', 'Publish', '2019-08-08 02:22:16', '2019-08-07 19:23:57'),
(38, 0, 67, 10, 'LY02', 'Layos Tenda Balon Pink', 'layos-tenda-balon-pink-ly02', '<p>Tenda pelaminan jenis balon&nbsp;</p>\r\n', 'Tenda pelaminan jenis balon ', 350000, 1, 'Screenshot_12.jpg', 100, '3 x 4 Meter , 4 x 6 Meter', 'Publish', '2019-08-08 02:27:09', '2019-08-08 01:50:36'),
(39, 0, 67, 3, 'LMT1', 'Lampu Running Text ', 'lampu-running-text-lmt1', '<p>Lampu running text untuk segala jenis pesanan</p>\r\n', 'Running Text, Lampu', 250000, 3, 'Screenshot_35.jpg', 7, '1,5 meter ', 'Publish', '2019-08-08 02:34:24', '2019-08-07 19:34:24'),
(40, 0, 67, 10, 'LY03', 'Layos Tenda Balon Biru', 'layos-tenda-balon-biru-ly03', '<p>Layos Balon Biru ukura 24 meter2</p>\r\n', 'layos biru', 350000, 3, 'Screenshot_61.jpg', 100, '3 x 4 Meter , 4 x 6 Meter', 'Publish', '2019-08-08 02:38:34', '2019-08-07 19:38:34'),
(41, 0, 67, 10, 'LYS1', 'Layos Sulur Kuning', 'layos-sulur-kuning-lys1', '<p>layos sulur kuning ukuran 24 meter persegi, untuk acara hajatan</p>\r\n', 'layos sulur kuning', 350000, 2, 'Screenshot_21.jpg', 100, '3 x 4 Meter , 4 x 6 Meter', 'Publish', '2019-08-08 02:41:28', '2019-08-07 19:41:28'),
(42, 0, 67, 3, 'SB01', 'Satu Stage Sound Berkatan', 'satu-stage-sound-berkatan-sb01', '<p>Satu Stage Sound berkatan berisi 6 sound</p>\r\n', 'sound berkatan', 200000, 10, 'Screenshot_7.jpg', 50, '18 inc', 'Publish', '2019-08-08 02:46:30', '2019-08-07 19:46:30'),
(43, 0, 69, 3, 'Dell1', 'Laptop Dell Inspiron 14 3000 Series', 'laptop-dell-inspiron-14-3000-series-dell1', '<table border=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Processor</td>\r\n			<td>Intel&reg; Celeron&reg; 2957U processor (2M Cache, 1.4 GHz)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>OS</td>\r\n			<td>Ubuntu Linux 12.04z</td>\r\n		</tr>\r\n		<tr>\r\n			<td>VGA</td>\r\n			<td>Intel HD Graphics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HDD</td>\r\n			<td>500 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM</td>\r\n			<td>2GB DDR3 SDRAM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ukuran Layar</td>\r\n			<td>14&quot; HD WLED TrueLife</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'leptop dell', 100000, 4, 'laptop1.jpg', 2, '14 inc', 'Publish', '2019-08-08 02:56:46', '2019-08-07 19:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `produk_id`, `rating`) VALUES
(1, 29, 3),
(2, 29, 5),
(3, 30, 3),
(4, 30, 3),
(5, 31, 2),
(6, 32, 5),
(7, 33, 5),
(8, 33, 5),
(9, 34, 1),
(10, 35, 5),
(11, 36, 3),
(12, 36, 5),
(13, 37, 3),
(14, 38, 5),
(15, 39, 3),
(16, 40, 1),
(17, 41, 2),
(18, 41, 5),
(19, 42, 5),
(20, 43, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `id_pelapak` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomer_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `id_pelapak`, `nama_bank`, `nomer_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 0, 'ABC', '6786292732', 'Ilma', NULL, '2019-06-22 07:30:51'),
(3, 0, 'Mandiri', '2652731233', 'mamad', NULL, '2019-06-21 02:11:24'),
(5, 62, 'Bank BRI', '973346225', 'Asiyah Sayur', NULL, '2019-08-05 01:52:27'),
(6, 10, 'Bank BRI', '8670734758', 'pelapak', NULL, '2019-08-05 14:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelapak` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelapak`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `stok`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(64, 62, 12, '06082019J4VPCLKJ', 30, 350000, 0, 1, 350000, '2019-08-06 00:00:00', '2019-08-06 07:20:56'),
(65, 10, 12, '06082019WQHB60OR', 33, 10000, 0, 1, 10000, '2019-08-06 00:00:00', '2019-08-06 07:21:20'),
(66, 62, 18, '07082019E5DILH2T', 31, 350000, 0, 5, 1750000, '2019-08-07 00:00:00', '2019-08-07 15:03:47'),
(67, 67, 19, '08082019LOTSHA5Q', 38, 350000, 0, 3, 1050000, '2019-08-08 00:00:00', '2019-08-08 01:40:13'),
(68, 62, 12, '29082019GYOFOAYU', 31, 350000, 0, 1, 350000, '2019-08-29 00:00:00', '2019-08-29 14:00:34'),
(69, 67, 12, '14092019IK6CFEZC', 40, 350000, 1, 1, 350000, '2019-09-14 00:00:00', '2019-09-14 13:05:03'),
(70, 67, 12, '150920195RFBNQZI', 41, 350000, 1, 2, 700000, '2019-09-15 00:00:00', '2019-09-15 01:23:40'),
(71, 62, 12, '150920195ZLIRLOY', 30, 350000, 1, 1, 350000, '2019-09-15 00:00:00', '2019-09-15 01:26:29'),
(72, 62, 12, '150920192A6IHQJW', 29, 500000, 2, 2, 2000000, '2019-09-15 00:00:00', '2019-09-15 01:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `foto`, `akses_level`, `tanggal_update`) VALUES
(11, 'ilmautiana', 'dandyazidansyah@gmail.com', 'ilmautiana', 'b53bf0c2ba0c7345ca70b9bde66bfe83d6a0ad36', NULL, 'Admin', '2019-09-15 17:21:00'),
(18, 'admin', 'admin@gmail.com', 'f865b53623b121fd34ee5426c792e5c3', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 'Admin', '2019-07-14 05:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `users_token`
--

CREATE TABLE `users_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `tanggal_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_token`
--

INSERT INTO `users_token` (`id`, `email`, `token`, `tanggal_daftar`) VALUES
(85, 'utianailma@gmail.com', '4e+Rlot+xIsMd4jm+uKMnJX/TUqBIz0/rf2fSrdTAVE=', 1568567866),
(86, 'utianailma@gmail.com', 'Nuiw59sr6Nw0edCSBA3JnbYmOFtFDr5qkYvXAjuqjpE=', 1568567888),
(87, 'utianailma@gmail.com', 'q7OMOjFXTTQmPU+LAe8s4h3odXf06zBTIU/UovwWGF8=', 1568567929),
(88, 'dandyazidansyah@gmail.com', 'ZKElbDkX89fcd9dGt1FbGqyNHGSDZO4y0/EVrcgpgf4=', 1568568087);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`desa_id`),
  ADD KEY `desa_kecamatan_id` (`desa_kecamatan_id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`),
  ADD KEY `kecamatan_kota_id` (`kecamatan_kota_id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `konfirmasi_pelapak`
--
ALTER TABLE `konfirmasi_pelapak`
  ADD PRIMARY KEY (`id_konfirmasi_pelapak`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email_pelanggan`);

--
-- Indexes for table `pelanggan_token`
--
ALTER TABLE `pelanggan_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelapak`
--
ALTER TABLE `pelapak`
  ADD PRIMARY KEY (`id_pelapak`);

--
-- Indexes for table `pelapak_token`
--
ALTER TABLE `pelapak_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomer_rekening` (`nomer_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_token`
--
ALTER TABLE `users_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `desa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `kecamatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konfirmasi_pelapak`
--
ALTER TABLE `konfirmasi_pelapak`
  MODIFY `id_konfirmasi_pelapak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pelanggan_token`
--
ALTER TABLE `pelanggan_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `pelapak`
--
ALTER TABLE `pelapak`
  MODIFY `id_pelapak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pelapak_token`
--
ALTER TABLE `pelapak_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users_token`
--
ALTER TABLE `users_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`desa_kecamatan_id`) REFERENCES `kecamatan` (`kecamatan_id`);

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`kecamatan_kota_id`) REFERENCES `kota` (`kota_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
