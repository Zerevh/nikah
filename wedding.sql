-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2025 at 02:18 PM
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
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

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
-- Table structure for table `kuliner`
--

CREATE TABLE `kuliner` (
  `id_kuliner` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `nm_kuliner` varchar(300) NOT NULL,
  `nm_toko` varchar(300) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `k_id_kab` int(5) NOT NULL,
  `k_id_kec` int(5) NOT NULL,
  `jln` varchar(250) NOT NULL,
  `ket` text NOT NULL,
  `k_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuliner`
--

INSERT INTO `kuliner` (`id_kuliner`, `id_user`, `latitude`, `longitude`, `nm_kuliner`, `nm_toko`, `kategori`, `k_id_kab`, `k_id_kec`, `jln`, `ket`, `k_image`) VALUES
(1, 1, '-3.440042367880514', '114.75721836090088', 'asdfs', 'dsfsd', 'Korean Food', 3, 14, 'adsfasd', 'asdfsfd', '20200820_164605.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mall`
--

CREATE TABLE `mall` (
  `id_mall` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `nm_mall` varchar(300) NOT NULL,
  `m_id_kab` int(5) NOT NULL,
  `m_id_kec` int(5) NOT NULL,
  `jln` varchar(250) NOT NULL,
  `ket` text NOT NULL,
  `m_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mall`
--

INSERT INTO `mall` (`id_mall`, `id_user`, `latitude`, `longitude`, `nm_mall`, `m_id_kab`, `m_id_kec`, `jln`, `ket`, `m_image`) VALUES
(1, 1, '-3.4750403827564034', '114.76318359375', 'tes 1', 1, 149, 'tes 1', ' tes 1', 'photo-1500625597061-d472abd2afbb.jpg'),
(2, 1, '-1.7575368113083125', '114.43359375', 'tes 2', 13, 18, 'tes 2', 'tes 2', 'Uz_Bulat.png'),
(3, 1, '-2.284550660236957', '114.47753906249999', 'tes 3', 3, 11, 'tes 3', 'tes 3', 'black-suit-backgrounds-powerpoint.jpg'),
(4, 1, '-3.4402137199317115', '114.74477291107178', 'tes 4', 12, 27, 'tes 4', 'tes 4', 'bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pasar`
--

CREATE TABLE `pasar` (
  `id_pasar` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `nm_pasar` varchar(300) NOT NULL,
  `p_id_kab` int(5) NOT NULL,
  `p_id_kec` int(5) NOT NULL,
  `jln` varchar(250) NOT NULL,
  `ket` text NOT NULL,
  `p_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasar`
--

INSERT INTO `pasar` (`id_pasar`, `id_user`, `latitude`, `longitude`, `nm_pasar`, `p_id_kab`, `p_id_kec`, `jln`, `ket`, `p_image`) VALUES
(1, 1, '-2.0292997182390056', '113.9501953125', 'sdfsdfs', 13, 19, 'asdff', 'dfdf', '20200820_164605.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

CREATE TABLE `penginapan` (
  `id_penginapan` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `nm_penginapan` varchar(300) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `p_id_kab` int(5) NOT NULL,
  `p_id_kec` int(5) NOT NULL,
  `jln` varchar(250) NOT NULL,
  `ket` text NOT NULL,
  `p_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penginapan`
--

INSERT INTO `penginapan` (`id_penginapan`, `id_user`, `latitude`, `longitude`, `nm_penginapan`, `kategori`, `p_id_kab`, `p_id_kec`, `jln`, `ket`, `p_image`) VALUES
(1, 1, '-3.176167436147481', '115.0814437866211', 'fasdf', 'Kelas Atas', 13, 20, 'asdfssda', 'sadfsdf', '20200820_164605.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `show_image_k`
--

CREATE TABLE `show_image_k` (
  `id` int(100) NOT NULL,
  `id_kuliner` int(100) NOT NULL,
  `sk_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `show_image_m`
--

CREATE TABLE `show_image_m` (
  `id` int(100) NOT NULL,
  `id_mall` int(100) NOT NULL,
  `sm_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `show_image_p`
--

CREATE TABLE `show_image_p` (
  `id` int(100) NOT NULL,
  `id_pasar` int(100) NOT NULL,
  `sp_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `show_image_pe`
--

CREATE TABLE `show_image_pe` (
  `id` int(100) NOT NULL,
  `id_penginapan` int(100) NOT NULL,
  `sp_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `show_image_s`
--

CREATE TABLE `show_image_s` (
  `id` int(100) NOT NULL,
  `id_tksuvenir` int(100) NOT NULL,
  `ss_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_image_s`
--

INSERT INTO `show_image_s` (`id`, `id_tksuvenir`, `ss_image`) VALUES
(1, 4, 'Uz.jpg'),
(3, 4, 'photo-1500625597061-d472abd2afbb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `show_image_w`
--

CREATE TABLE `show_image_w` (
  `id` int(100) NOT NULL,
  `id_wisata` int(100) NOT NULL,
  `sw_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_image_w`
--

INSERT INTO `show_image_w` (`id`, `id_wisata`, `sw_image`) VALUES
(1, 5, 'background.jpg'),
(2, 5, 'abstract-cubes-glow-lines-corridor-wallpaper-1.jpg'),
(3, 5, 'a561.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `suvenir`
--

CREATE TABLE `suvenir` (
  `id_tksuvenir` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `nm_tksuvenir` varchar(300) NOT NULL,
  `s_id_kab` int(5) NOT NULL,
  `s_id_kec` int(5) NOT NULL,
  `jln` varchar(250) NOT NULL,
  `ket` text NOT NULL,
  `s_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suvenir`
--

INSERT INTO `suvenir` (`id_tksuvenir`, `id_user`, `latitude`, `longitude`, `nm_tksuvenir`, `s_id_kab`, `s_id_kec`, `jln`, `ket`, `s_image`) VALUES
(4, 1, '-3.3302422745300855', '114.7276496887207', 'Toko ulak', 13, 19, 'sddfs', 'asdfsdf', '3268483406_3fb34cc68d_b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tes_map`
--

CREATE TABLE `tes_map` (
  `id` int(9) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `id_prov` int(2) NOT NULL,
  `id_kab` int(2) NOT NULL,
  `id_kec` int(5) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `status` varchar(9) NOT NULL,
  `keterangan` text NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tes_map`
--

INSERT INTO `tes_map` (`id`, `latitude`, `longitude`, `id_prov`, `id_kab`, `id_kec`, `kategori`, `status`, `keterangan`, `image`) VALUES
(1, '-0.615222552406841', '113.99414062499999', 2, 13, 22, 'Dewasa', 'buka', 'adsa', '3268483406_3fb34cc68d_b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Anshor D', '1234@gmail.com', 'M_HIJRA_ANSHORI_DIKNAS.JPG', '$2y$10$0oy0rS1/1r6DcQ9Jg3gLyOYayeWR7pfbs8IcTKUZfLG/DXFGq82Aq', 1, 1, 1564716628),
(2, 'dody', 'dody@gmail.com', 'IMG_20161116_192010.jpg', '$2y$10$6ls32SEOQYip0Cp5q5/vAeSIygkDDfzbWeiWC9qGoajYVfRGyPSga', 2, 1, 1564717645),
(3, 'Erik', 'erik@gmail.com', 'default.jpg', '$2y$10$kBXVnPtBfVZ.6fWjS0NOte80zkVIDLn6NrhaCoowQqdK9NoeTuo5a', 2, 0, 1566009128),
(8, 'HIjra', 'HIjradiknas1998@gmail.com', 'default.jpg', '$2y$10$v.QX5jR8RXuKwb2zhRnCb.uLOrb4kDz7V9AouN46ZIwCI0mSTUwTi', 2, 1, 1566268193),
(9, 'Ujang', 'mhijra.ad@gmail.com', 'default.jpg', '$2y$10$uPa7BfjUUpcFo0ZSa8R/JuKwbsSewScA1QRW6i7VIHwmv4RlmqWaK', 2, 1, 1763557248);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

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
(2, 1, 2),
(3, 2, 2),
(4, 1, 6),
(5, 1, 3),
(6, 1, 5),
(20, 1, 9),
(21, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

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
(5, 'Map'),
(6, 'Data'),
(7, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

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
(1, 1, 'Dashboard', 'admin/index', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/editprofile', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 5, 'Form Map', 'map', 'fas fa-fw fa-map-marked-alt', 1),
(14, 6, 'Wisata', 'data/datawisata', 'fas fa-fw fa-chart-area', 1),
(15, 6, 'Kuliner', 'data/datakuliner', 'fas fa-fw fa-utensils', 1),
(16, 6, 'Pasar Tradisional', 'data/datapasar', 'fas fa-fw fa-store', 1),
(17, 6, 'Penginapan', 'data/datapenginapan', 'fas fa-fw fa-hotel', 1),
(18, 6, 'Mall', 'data/datamall', 'fas fa-fw fa-building', 1),
(19, 7, 'Laporan Wisata', 'laporan/lapwisata', 'fas fa-fw fa-chart-area', 1),
(20, 7, 'Laporan Event wisata', 'laporan/lapeventwisata', 'fas fa-fw fa-mountain', 1),
(21, 7, 'Laporan Wisata Tutup', 'laporan/lapwisatatutup', 'fas fa-fw fa-ban', 1),
(22, 7, 'Laporan Kuliner', 'laporan/lapkuliner', 'fas fa-fw fa-utensils', 1),
(23, 7, 'Laporan Pasar', 'laporan/lappasar', 'fas fa-fw fa-store', 1),
(24, 7, 'Laporan Penginapan', 'laporan/lappenginapan', 'fas fa-fw fa-hotel', 1),
(25, 7, 'Laporan Mall', 'laporan/lapmall', 'fas fa-fw fa-building', 1),
(26, 6, 'Toko Suvenir', 'data/datasuvenir', 'fas fa-fw fa-store-alt', 1),
(27, 7, 'Laporan Toko Suvenir', 'laporan/lapsuvenir', 'fas fa-fw fa-store-alt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(11, 'hijradiknas1998@gmail.com', 'de1c8e218098ec11420b47c74aa6aecc', 1566276039),
(12, 'mhijra.ad@gmail.com', 'UwpqRoDLkV2IbQNZg2tqCULINbNBnM/XQ9VNSRndN50=', 1763557248);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `nm_wisata` varchar(300) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `kalangan` varchar(50) NOT NULL,
  `w_id_kab` int(5) NOT NULL,
  `w_id_kec` int(5) NOT NULL,
  `jln` varchar(250) NOT NULL,
  `ket_wisata` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `ket_status` text NOT NULL,
  `event` varchar(50) NOT NULL,
  `ket_event` text NOT NULL,
  `w_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `id_user`, `latitude`, `longitude`, `nm_wisata`, `kategori`, `kalangan`, `w_id_kab`, `w_id_kec`, `jln`, `ket_wisata`, `status`, `ket_status`, `event`, `ket_event`, `w_image`) VALUES
(1, 1, '-0.8788717828324148', '115.11474609375001', 'asdfasd', 'Alam', 'Dewasa', 9, 62, 'asdfsd', 'asdfsf', 'Buka', '-', 'Tidak Ada', '-', '20200820_164605.jpg'),
(2, 1, '-3.307792353818841', '114.65881347656249', 'asdfsd', 'Alam', 'Semua Kalangan', 13, 22, 'asfdsfs', 'fasdfsd', 'Buka', '-', 'Tidak Ada', '-', 'M_HIJRA_ANSHORI_DIKNAS.JPG'),
(3, 1, '-3.606624621323674', '114.9609375', 'asdddd', 'Alam', 'Dewasa', 13, 22, 'asdfsdf', 'asddd', 'Buka', '-', 'Tidak Ada', '-', 'black-suit-backgrounds-powerpoint.jpg'),
(4, 1, '-2.622241599047191', '114.20172214508057', 'sdfdsfs', 'Alam', 'Dewasa', 13, 20, 'asdddd', 'asdsd', 'Buka', '-', 'Tidak Ada', '-', 'bg.jpg'),
(5, 1, '-1.911266535096585', '114.43359375', 'Pantai Angsana Awewe', 'Alam', 'Anak-anak', 9, 57, 'sdfsdf', 'asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs asssss sdfsdfsf  dfs dfsdsfdsdfs ', 'Buka', '-', 'Tidak Ada', '-', 'a561.jpg');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`id_kuliner`);

--
-- Indexes for table `mall`
--
ALTER TABLE `mall`
  ADD PRIMARY KEY (`id_mall`);

--
-- Indexes for table `pasar`
--
ALTER TABLE `pasar`
  ADD PRIMARY KEY (`id_pasar`);

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id_penginapan`);

--
-- Indexes for table `show_image_k`
--
ALTER TABLE `show_image_k`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_image_m`
--
ALTER TABLE `show_image_m`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_image_p`
--
ALTER TABLE `show_image_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_image_pe`
--
ALTER TABLE `show_image_pe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_image_s`
--
ALTER TABLE `show_image_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_image_w`
--
ALTER TABLE `show_image_w`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suvenir`
--
ALTER TABLE `suvenir`
  ADD PRIMARY KEY (`id_tksuvenir`);

--
-- Indexes for table `tes_map`
--
ALTER TABLE `tes_map`
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
-- AUTO_INCREMENT for table `kuliner`
--
ALTER TABLE `kuliner`
  MODIFY `id_kuliner` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mall`
--
ALTER TABLE `mall`
  MODIFY `id_mall` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasar`
--
ALTER TABLE `pasar`
  MODIFY `id_pasar` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id_penginapan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `show_image_k`
--
ALTER TABLE `show_image_k`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `show_image_m`
--
ALTER TABLE `show_image_m`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `show_image_p`
--
ALTER TABLE `show_image_p`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `show_image_pe`
--
ALTER TABLE `show_image_pe`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `show_image_s`
--
ALTER TABLE `show_image_s`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `show_image_w`
--
ALTER TABLE `show_image_w`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suvenir`
--
ALTER TABLE `suvenir`
  MODIFY `id_tksuvenir` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tes_map`
--
ALTER TABLE `tes_map`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
