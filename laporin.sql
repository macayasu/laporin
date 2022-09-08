-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 08:13 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE `admin_detail` (
  `id_user_detail` varchar(100) NOT NULL,
  `nuptk` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `foto` text NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`id_user_detail`, `nuptk`, `nama`, `telp`, `alamat`, `kelas`, `foto`, `date_registered`) VALUES
('ef6e295b553be6143f5179fd1955515f', '1289301938', 'Rudi Sud', '089732163', 'Purwokerto', '', '786387903e052c8f0dac655d8109e0d0.PNG', '2022-08-28'),
('ace12a1d6dc8a1d27b955ea000c3f3cb', '217638183', 'Budi Sudi', '02893013', 'Banyumas', 'I', 'e1c5956300bf59926b59e240103a850f4.jpg', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `id_diskusi` varchar(100) NOT NULL,
  `id_laporin` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`id_diskusi`, `id_laporin`, `pesan`, `id_user`, `date_created`) VALUES
('18a787799336dd97bf156b0307f44df6', 'd38851dd1e041cfdba9c8309a8bbec5a', 'p\r\n', 'ef6e295b553be6143f5179fd1955515f', '2002-09-22 11:09:04'),
('3066ee347d8d896c7647abd636413c20', 'd38851dd1e041cfdba9c8309a8bbec5a', 'p', 'ef6e295b553be6143f5179fd1955515f', '2002-09-22 00:00:00'),
('3db270f9615279bc1832dbedce678bb6', 'd38851dd1e041cfdba9c8309a8bbec5a', 'iya', 'ef6e295b553be6143f5179fd1955515f', '2022-09-02 00:00:00'),
('42a4a928ef393c661c21469f9f1c5f7e', '9a4514c1bc0e6c92a3e2fc7d779bc545', 'halo kak', '2ddcc6572a650abcd68720289397457d', '2022-09-02 16:47:09'),
('45febb28d329100f83ec2e535a638120', 'd38851dd1e041cfdba9c8309a8bbec5a', 'hai', 'ef6e295b553be6143f5179fd1955515f', '2022-09-02 12:12:06'),
('4c888e78ad4d68d05adb4c8ebde3f9c0', 'd38851dd1e041cfdba9c8309a8bbec5a', 'halo km kenapa', 'ef6e295b553be6143f5179fd1955515f', '2022-09-02 00:00:00'),
('4f8b59dc2c55f3b320291a441bd18e5c', 'd38851dd1e041cfdba9c8309a8bbec5a', 'jia', 'ef6e295b553be6143f5179fd1955515f', '2022-09-02 11:58:08'),
('649cfe3848a62dcab6b1af4fcb619bd3', 'd38851dd1e041cfdba9c8309a8bbec5a', 'halo\r\n', 'ef6e295b553be6143f5179fd1955515f', '2002-09-22 11:09:46'),
('ad2c572c05c12be03fd4acda01ab48fd', 'f5fdb42a9beea634b62ed77933ebf54d', 'Kamu di apain?', 'ef6e295b553be6143f5179fd1955515f', '2022-08-28 00:00:00'),
('ad7abd4b4c93b689c239abe678181e51', 'd38851dd1e041cfdba9c8309a8bbec5a', 'yakin kamu dek', 'ef6e295b553be6143f5179fd1955515f', '2022-09-02 12:11:07'),
('b3a82ba030e166c2b50def97e84c4f13', '9a4514c1bc0e6c92a3e2fc7d779bc545', 'bisa minta tolong', '2ddcc6572a650abcd68720289397457d', '2022-09-02 16:47:15'),
('d07645492636f2010bd997e1516e022e', '0198a8a483b44f60ab997d7aa8888308', 'dadad', 'ef6e295b553be6143f5179fd1955515f', '2022-09-06 12:56:09'),
('e2716f4ca8c0a1b4b388246913524846', 'd38851dd1e041cfdba9c8309a8bbec5a', 'halo', 'ef6e295b553be6143f5179fd1955515f', '0000-00-00 00:00:00'),
('fc0b1ef8571c25d32c5812a70c7b0e40', '9a4514c1bc0e6c92a3e2fc7d779bc545', 'iya gimana', 'ef6e295b553be6143f5179fd1955515f', '2022-09-02 16:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_masalah`
--

CREATE TABLE `jenis_masalah` (
  `id_jenis_masalah` int(11) NOT NULL,
  `nama_jenis_masalah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_masalah`
--

INSERT INTO `jenis_masalah` (`id_jenis_masalah`, `nama_jenis_masalah`) VALUES
(1, 'Bullying'),
(2, 'Infrastruktur'),
(3, 'Pelecehan Seksual'),
(4, 'Pungutan Liar');

-- --------------------------------------------------------

--
-- Table structure for table `laporin`
--

CREATE TABLE `laporin` (
  `id_laporin` varchar(100) NOT NULL,
  `nisn` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `nama_ortu` varchar(200) DEFAULT NULL,
  `telp_ortu` varchar(20) DEFAULT NULL,
  `alamat_ortu` varchar(100) DEFAULT NULL,
  `deskripsi_masalah` varchar(255) DEFAULT NULL,
  `jenis_masalah` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `tgl_melapor` datetime NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporin`
--

INSERT INTO `laporin` (`id_laporin`, `nisn`, `nama`, `email`, `alamat`, `kelas`, `nama_ortu`, `telp_ortu`, `alamat_ortu`, `deskripsi_masalah`, `jenis_masalah`, `status`, `tgl_melapor`, `foto`) VALUES
('0198a8a483b44f60ab997d7aa8888308', 2891023, 'Calvin YS', 'mariuzcalvin@gmail.com', 'PIK', 'III', 'Budi', '0839123', 'PIK', 'dadada', 1, 5, '2022-09-05 13:31:04', '7be0a410253ac5a16cfac4ade23bc2eb.jpg'),
('846f0c0e9de6db35b2fb2f27254c500a', 2891023, 'Deni Siregar', 'mar@gmail.com', 'skadmkad', 'III', 'Mkmm', '023812903', 'dmd', 'Saya di bully richard', 1, 1, '2022-09-06 13:12:20', '');

-- --------------------------------------------------------

--
-- Table structure for table `status_laporin`
--

CREATE TABLE `status_laporin` (
  `id_status_laporin` int(11) NOT NULL,
  `nama_status_laporin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_laporin`
--

INSERT INTO `status_laporin` (`id_status_laporin`, `nama_status_laporin`) VALUES
(1, 'Belum diproses'),
(2, 'Diproses'),
(3, 'Ditolak'),
(4, 'Selesai'),
(5, 'Didisposisikan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_user_level` varchar(256) NOT NULL,
  `id_user_detail` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `id_user_level`, `id_user_detail`) VALUES
('2ddcc6572a650abcd68720289397457d', 'deni', '123', 'mar@gmail.com', '3', '2ddcc6572a650abcd68720289397457d'),
('ace12a1d6dc8a1d27b955ea000c3f3cb', 'budi', '123', 'budi@gmail.com', '2', 'ace12a1d6dc8a1d27b955ea000c3f3cb'),
('ef6e295b553be6143f5179fd1955515f', 'superadmin', 'superadmin', 'superadmin@gmail.com', '1', 'ef6e295b553be6143f5179fd1955515f');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user_detail` varchar(256) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kelas` varchar(30) DEFAULT NULL,
  `nama_ortu` varchar(100) DEFAULT NULL,
  `telp_ortu` varchar(20) DEFAULT NULL,
  `alamat_ortu` varchar(100) DEFAULT NULL,
  `foto` text NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user_detail`, `nama_lengkap`, `nisn`, `telp`, `alamat`, `kelas`, `nama_ortu`, `telp_ortu`, `alamat_ortu`, `foto`, `date_registered`) VALUES
('2ddcc6572a650abcd68720289397457d', 'Deni Siregar', '2891023', '08999317283', 'skadmkad', 'III', 'Mkmm', '023812903', 'dmd', '', '2022-08-28'),
('48efe2979c5c115b8ce4237510bb157a', 'Yans', '7312938922', '0838812391', 'Purwokerto', '1 A', 'Yeni', '908492034', 'dajdad', '', '2022-08-25'),
('83755e649ad3f71f0ebd3f8cee81b9b9', 'Dicky', '13890193', '083819239', 'PWt', 'I', 'Yeni', '082939123', 'DJadkjad', '', '2022-08-28'),
('8afecfbc3731b9a6c601ae70da706442', 'Taufiiqulhakim', '061827182871812', '+62812781728', 'Jl. Sekip', 'SD', 'Teknik komputer', 'Islam', 'Kawin', '', '2022-07-07'),
('e2c929f4edd991d6371a719e8c72c3ec', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2022-06-17'),
('ef6e295b553be6143f5179fd1955515f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2022-05-18'),
('f5fdb42a9beea634b62ed77933ebf54d', 'Jovanka', '2147483647\n', '08129381283', 'fnjklsk', 'I', 'fnjekefk', '248912938', ' fsmf', '', '2022-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Admin'),
(2, 'Superadmin'),
(3, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_detail`
--
ALTER TABLE `admin_detail`
  ADD PRIMARY KEY (`nuptk`);

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`id_diskusi`);

--
-- Indexes for table `jenis_masalah`
--
ALTER TABLE `jenis_masalah`
  ADD PRIMARY KEY (`id_jenis_masalah`);

--
-- Indexes for table `status_laporin`
--
ALTER TABLE `status_laporin`
  ADD PRIMARY KEY (`id_status_laporin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id_user_detail`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_masalah`
--
ALTER TABLE `jenis_masalah`
  MODIFY `id_jenis_masalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status_laporin`
--
ALTER TABLE `status_laporin`
  MODIFY `id_status_laporin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
