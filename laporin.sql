-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2022 pada 01.07
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
-- Struktur dari tabel `admin_detail`
--

CREATE TABLE `admin_detail` (
  `id_user_detail` varchar(100) NOT NULL,
  `nuptk` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_detail`
--

INSERT INTO `admin_detail` (`id_user_detail`, `nuptk`, `nama`, `telp`, `alamat`, `kelas`, `date_registered`) VALUES
('3a98dd0dc20df652ab860e96e2ebafbe', '1289301938', 'Rudi', '089732163', 'Purwokerto', 'III', '2022-08-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskusi`
--

CREATE TABLE `diskusi` (
  `id_diskusi` varchar(100) NOT NULL,
  `id_laporin` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diskusi`
--

INSERT INTO `diskusi` (`id_diskusi`, `id_laporin`, `pesan`, `id_user`, `date_created`, `time_created`) VALUES
('ad2c572c05c12be03fd4acda01ab48fd', 'f5fdb42a9beea634b62ed77933ebf54d', 'Kamu di apain?', 'ef6e295b553be6143f5179fd1955515f', '2022-08-28', '06:08:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_masalah`
--

CREATE TABLE `jenis_masalah` (
  `id_jenis_masalah` int(11) NOT NULL,
  `nama_jenis_masalah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_masalah`
--

INSERT INTO `jenis_masalah` (`id_jenis_masalah`, `nama_jenis_masalah`) VALUES
(1, 'Bullying'),
(2, 'Infrastruktur'),
(3, 'Pelecehan Seksual'),
(4, 'Pungutan Liar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporin`
--

CREATE TABLE `laporin` (
  `id_laporin` varchar(100) NOT NULL,
  `nisn` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_masalah` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `tgl_melapor` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporin`
--

INSERT INTO `laporin` (`id_laporin`, `nisn`, `nama`, `email`, `alamat`, `jenis_masalah`, `status`, `tgl_melapor`, `foto`) VALUES
('f5fdb42a9beea634b62ed77933ebf54d', 2147483647, 'Priskila H', 'halepy.k@gmail.com', 'Sokaraja', 1, 4, '2022-08-25', 'c4317ea700ec60da9e2e93e38e7ca6bb.png'),
('', 0, '', '', '', 0, 1, '2022-08-28', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `id_loker` varchar(256) NOT NULL,
  `id_perusahaan_details` varchar(256) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `jumlah_rekrut` int(30) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `batas_akhir` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`id_loker`, `id_perusahaan_details`, `judul`, `deskripsi`, `posisi`, `jumlah_rekrut`, `salary`, `batas_akhir`, `created_at`) VALUES
('66946b44ab37c0675d6e543afcc22256', 'd509166e5f7601075b91b2de69f13471', 'Pusri', 'Admin', 'Admin Perusahaan', 100, '100000000', '2022-05-31', '2022-05-31'),
('a0fcae9ddf1f8ef6c0b679409f96253e', 'e64405bfb4d637b3902f0806a494e801', 'Penerimaan Pegawai Kontrak', 'Penerimaan Pegawai Kontrak tahun 2022', 'Operator Tambang', 100, '4000000000', '2022-06-30', '2022-06-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_laporin`
--

CREATE TABLE `status_laporin` (
  `id_status_laporin` int(11) NOT NULL,
  `nama_status_laporin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_laporin`
--

INSERT INTO `status_laporin` (`id_status_laporin`, `nama_status_laporin`) VALUES
(1, 'Belum diproses'),
(2, 'Diproses'),
(3, 'Ditolak'),
(4, 'Selesai'),
(5, 'Didisposisikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `id_user_level`, `id_user_detail`) VALUES
('2ddcc6572a650abcd68720289397457d', 'deni', 'deni', 'mar@gmail.com', '3', '2ddcc6572a650abcd68720289397457d'),
('3a98dd0dc20df652ab860e96e2ebafbe', 'rudi', 'rudi123', 'rudi@gmail.com', '2', '3a98dd0dc20df652ab860e96e2ebafbe'),
('83755e649ad3f71f0ebd3f8cee81b9b9', 'dicky', 'dicky', 'dickydif@gmil.com', '31', '83755e649ad3f71f0ebd3f8cee81b9b9'),
('ef6e295b553be6143f5179fd1955515f', 'superadmin', 'superadmin', 'superadmin@gmail.com', '1', 'ef6e295b553be6143f5179fd1955515f'),
('f20100fba58ef20bd77eb67bc86f51d6', 'jovan', 'jovan', 'halepy.k@gmail.com', '3', 'f20100fba58ef20bd77eb67bc86f51d6'),
('f5fdb42a9beea634b62ed77933ebf54d', 'ika', '123', 'ika@gmail.com', '3', 'f5fdb42a9beea634b62ed77933ebf54d');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user_detail` varchar(256) NOT NULL,
  `no_pendaftaran` varchar(20) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kelas` varchar(30) DEFAULT NULL,
  `nama_ortu` varchar(100) DEFAULT NULL,
  `telp_ortu` varchar(20) DEFAULT NULL,
  `alamat_ortu` varchar(100) DEFAULT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`id_user_detail`, `no_pendaftaran`, `nama_lengkap`, `nisn`, `telp`, `alamat`, `kelas`, `nama_ortu`, `telp_ortu`, `alamat_ortu`, `date_registered`) VALUES
('2ddcc6572a650abcd68720289397457d', '27640027', 'Deni', '2891023', '08999317283', 'skadmkad', 'III', 'Mkmm', '023812903', 'dmd', '2022-08-28'),
('48efe2979c5c115b8ce4237510bb157a', '43808415', 'Yans', '7312938922', '0838812391', 'Purwokerto', '1 A', 'Yeni', '908492034', 'dajdad', '2022-08-25'),
('83755e649ad3f71f0ebd3f8cee81b9b9', '18567565', 'Dicky', '13890193', '083819239', 'PWt', 'I', 'Yeni', '082939123', 'DJadkjad', '2022-08-28'),
('8afecfbc3731b9a6c601ae70da706442', '24918943', 'Taufiiqulhakim', '061827182871812', '+62812781728', 'Jl. Sekip', 'SD', 'Teknik komputer', 'Islam', 'Kawin', '2022-07-07'),
('e2c929f4edd991d6371a719e8c72c3ec', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-17'),
('ef6e295b553be6143f5179fd1955515f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-18'),
('f5fdb42a9beea634b62ed77933ebf54d', '64955937', 'Jovanka', '2147483647\n', '08129381283', 'fnjklsk', 'I', 'fnjekefk', '248912938', ' fsmf', '2022-08-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Admin'),
(2, 'Superadmin'),
(3, 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_detail`
--
ALTER TABLE `admin_detail`
  ADD PRIMARY KEY (`nuptk`);

--
-- Indeks untuk tabel `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`id_diskusi`);

--
-- Indeks untuk tabel `jenis_masalah`
--
ALTER TABLE `jenis_masalah`
  ADD PRIMARY KEY (`id_jenis_masalah`);

--
-- Indeks untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indeks untuk tabel `status_laporin`
--
ALTER TABLE `status_laporin`
  ADD PRIMARY KEY (`id_status_laporin`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id_user_detail`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_masalah`
--
ALTER TABLE `jenis_masalah`
  MODIFY `id_jenis_masalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `status_laporin`
--
ALTER TABLE `status_laporin`
  MODIFY `id_status_laporin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
