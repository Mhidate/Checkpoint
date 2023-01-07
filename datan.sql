-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2022 pada 16.36
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `no` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`no`, `username`, `pass`) VALUES
(1, 'min', 'min');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catat`
--

CREATE TABLE `catat` (
  `nomer` int(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `grup` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(5) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pos` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `catat`
--

INSERT INTO `catat` (`nomer`, `id`, `grup`, `nama`, `jenis`, `nik`, `alamat`, `pos`, `waktu`) VALUES
(93, '535FDE32', 'Grup 1', 'kina', '', '1234567', 'PANCOR', 'Pos 1▲', '2022-10-04 12:50:42'),
(94, 'AA329380', 'Grup 2', 'Rida zaimus', '', '8674534232', 'Pancor', 'Pos 1▲', '2022-10-04 12:52:05'),
(95, 'AA329380', 'Grup 2', 'Rida zaimus', '', '8674534232', 'Pancor', 'Pos 1▲', '2022-10-04 12:54:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gelang`
--

CREATE TABLE `gelang` (
  `id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(255) NOT NULL,
  `lat_long` varchar(50) NOT NULL,
  `nama_pos` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `lat_long`, `nama_pos`, `keterangan`) VALUES
(1, '-8.361763385675092, 116.47637364751641', 'Pos 1', '-'),
(2, '-8.3730354,116.4608215', 'Pos 2', '-'),
(3, '-8.382404, 116.448502', 'Pos 3', '-'),
(4, '-8.395698072010607, 116.43808610123656', 'Pos 4', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaki`
--

CREATE TABLE `pendaki` (
  `nom` int(100) NOT NULL,
  `id` varchar(255) NOT NULL,
  `grup` varchar(255) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `jenis` varchar(5) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaki`
--

INSERT INTO `pendaki` (`nom`, `id`, `grup`, `nama`, `jenis`, `nik`, `alamat`) VALUES
(17, 'AA329380', 'Grup 2', 'Rida zaimus', 'P', '8674534232', 'Pancor'),
(18, 'AA3293802', 'Grup 1', 'abd', 'L', '2356863213', 'pancor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `selesai`
--

CREATE TABLE `selesai` (
  `no` int(100) NOT NULL,
  `grup` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(3) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `selesai`
--

INSERT INTO `selesai` (`no`, `grup`, `nama`, `jk`, `nik`, `alamat`, `tgl`, `catatan`) VALUES
(1, 'Grup 2', 'hanA', 'L', '98697976', 'menara', '2022-08-21 12:07:30', '-'),
(2, 'Grup 3', 'nana', 'P', '7890876', 'midlane', '2022-08-21 12:07:30', 'ada orang buang sampah'),
(3, 'Grup 1', 'rida', 'P', '24234', 'selong', '2022-08-20 21:15:38', '-'),
(4, 'Grup 1', 'zaimus', 'P', '78678', 'SELONG', '2022-08-20 21:15:38', 'melamun'),
(5, 'Grup 1', 'Nurull Septirida Hidayatullah Zaimus', 'P', '213256', 'selong', '2022-08-22 02:46:48', 'gud'),
(6, 'Grup 1', 'yuki', 'L', '6875555', 'selong', '2022-09-04 17:02:58', 'ya'),
(7, 'Grup 1', 'kina', 'P', '1234567', 'PANCOR', '2022-10-12 05:57:46', 'e');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `catat`
--
ALTER TABLE `catat`
  ADD PRIMARY KEY (`nomer`);

--
-- Indeks untuk tabel `gelang`
--
ALTER TABLE `gelang`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaki`
--
ALTER TABLE `pendaki`
  ADD PRIMARY KEY (`nom`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `selesai`
--
ALTER TABLE `selesai`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `catat`
--
ALTER TABLE `catat`
  MODIFY `nomer` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pendaki`
--
ALTER TABLE `pendaki`
  MODIFY `nom` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `selesai`
--
ALTER TABLE `selesai`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
