-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2023 pada 16.17
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-ukt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` enum('Admin') DEFAULT 'Admin',
  `foto_user` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `status`, `foto_user`) VALUES
(1, 'Admin Sistem', 'admin122@gmail.com', '$2y$10$FOLMcTQ.ZQmG4XkXHemNkuvTur77scCIzvFMyQyRV9SdbHXGYN0iy', 'Admin', '02162023154704Admin Sistem.jpg'),
(2, 'Admin Sistem UKT', 'admin@gmail.com', '$2y$10$CfofXEParDaLa28vB2/i9uxG0Z8ywPKJycZ9pBYn/vSYeZ6fd4e9a', 'Admin', '04182023095408Admin Sistem UKT.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok_ukt`
--

CREATE TABLE `kelompok_ukt` (
  `id_kelompok_ukt` int(11) NOT NULL,
  `kelompok_ukt` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelompok_ukt`
--

INSERT INTO `kelompok_ukt` (`id_kelompok_ukt`, `kelompok_ukt`, `nominal`) VALUES
(2, 1, 500000),
(3, 2, 1000000),
(4, 3, 2500000),
(5, 4, 3000000),
(6, 5, 3500000),
(7, 6, 4000000),
(8, 7, 4500000),
(9, 8, 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `status_user` enum('Admin','Mahasiswa','Staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `id_admin`, `id_mahasiswa`, `id_staff`, `keterangan`, `waktu`, `status_user`) VALUES
(1, 2, NULL, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107052', '2023-04-05 14:23:34', 'Admin'),
(2, 2, NULL, NULL, 'Melakukan hapus staff dengan NIK 109089742154211', '2023-04-05 14:28:40', 'Admin'),
(3, 2, NULL, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107052', '2023-04-05 14:29:03', 'Admin'),
(4, 2, NULL, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107051', '2023-04-06 13:51:49', 'Admin'),
(5, 2, NULL, NULL, 'Melakukan edit mahasiswa dengan NIM 10107051', '2023-04-06 13:54:42', 'Admin'),
(6, 2, NULL, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107051', '2023-04-06 13:55:09', 'Admin'),
(7, 2, NULL, NULL, 'Melakukan tambah staff dengan NIK/NIP 111111111', '2023-04-06 13:56:41', 'Admin'),
(8, NULL, NULL, 1, 'Melakukan edit staff dengan NIK/NIP 111111111', '2023-04-06 13:57:37', 'Staff'),
(9, NULL, 7, NULL, 'Melakukan hapus staff dengan NIK/NIP 111111111', '2023-04-06 13:57:55', 'Mahasiswa'),
(10, 2, NULL, NULL, 'Melakukan tambah staff dengan NIK/NIP 1111111', '2023-04-06 14:22:41', 'Admin'),
(11, 2, NULL, NULL, 'Melakukan tambah staff dengan NIK/NIP 1111111', '2023-04-06 14:27:41', 'Admin'),
(12, 2, NULL, NULL, 'Melakukan hapus staff dengan NIK/NIP 1111111', '2023-04-06 14:27:49', 'Admin'),
(13, 2, NULL, NULL, 'Melakukan tambah mahasiswa dengan NIM 11111111', '2023-04-06 14:30:12', 'Admin'),
(14, 2, NULL, NULL, 'Melakukan edit mahasiswa dengan NIM 11111111', '2023-04-06 14:30:29', 'Admin'),
(15, 2, NULL, NULL, 'Melakukan hapus mahasiswa dengan NIM 11111111', '2023-04-06 14:30:34', 'Admin'),
(16, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 1dengan nominal Rp 500.000', '2023-04-07 21:04:31', 'Admin'),
(17, 2, NULL, NULL, 'Melakukan edit Kelompok UKT 1dengan nominal Rp 500.000', '2023-04-07 21:23:19', 'Admin'),
(18, 2, NULL, NULL, 'Melakukan hapus Kelompok UKT dengan nominal Rp 0', '2023-04-07 22:23:30', 'Admin'),
(19, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 1dengan nominal Rp 500.000', '2023-04-07 22:27:20', 'Admin'),
(20, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 2dengan nominal Rp 1.000.000', '2023-04-07 22:27:59', 'Admin'),
(21, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 3dengan nominal Rp 2.500.000', '2023-04-07 22:28:19', 'Admin'),
(22, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 4dengan nominal Rp 3.000.000', '2023-04-07 22:29:07', 'Admin'),
(23, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 5dengan nominal Rp 3.500.000', '2023-04-07 22:29:32', 'Admin'),
(24, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 6dengan nominal Rp 4.000.000', '2023-04-07 22:29:52', 'Admin'),
(25, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 7dengan nominal Rp 4.500.000', '2023-04-07 22:30:09', 'Admin'),
(26, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 8dengan nominal Rp 5.000.000', '2023-04-07 22:30:24', 'Admin'),
(27, 2, NULL, NULL, 'Melakukan tambah admin dengan Email admin1@gmail.com', '2023-04-09 01:00:47', 'Admin'),
(28, 2, NULL, NULL, 'Melakukan tambah admin dengan Email admin1@gmail.com', '2023-04-09 01:01:51', 'Admin'),
(29, 2, NULL, NULL, 'Melakukan edit admin dengan Email admin1@gmail.com', '2023-04-09 01:16:00', 'Admin'),
(30, 2, NULL, NULL, 'Melakukan edit admin dengan Email admin1@gmail.com', '2023-04-09 01:16:24', 'Admin'),
(31, 2, NULL, NULL, 'Melakukan hapus admin dengan Email admin1@gmail.com', '2023-04-09 01:17:57', 'Admin'),
(32, 2, NULL, NULL, 'Melakukan edit mahasiswa dengan NIM 10107050', '2023-04-09 01:32:09', 'Admin'),
(33, 2, NULL, NULL, 'Melakukan edit profil', '2023-04-18 16:49:11', 'Admin'),
(34, 2, NULL, NULL, 'Melakukan edit profil', '2023-04-18 16:49:37', 'Admin'),
(35, 2, NULL, NULL, 'Melakukan edit profil', '2023-04-18 16:50:04', 'Admin'),
(36, 2, NULL, NULL, 'Melakukan edit profil', '2023-04-18 16:50:47', 'Admin'),
(37, 2, NULL, NULL, 'Melakukan edit profil', '2023-04-18 16:52:08', 'Admin'),
(38, 2, NULL, NULL, 'Melakukan edit profil', '2023-04-18 16:53:46', 'Admin'),
(39, 2, NULL, NULL, 'Melakukan edit profil', '2023-04-18 16:54:08', 'Admin'),
(40, NULL, 7, NULL, 'Melakukan edit profil', '2023-04-18 20:34:17', 'Mahasiswa'),
(41, NULL, 7, NULL, 'Melakukan edit profil', '2023-04-18 20:35:03', 'Mahasiswa'),
(42, NULL, 7, NULL, 'Melakukan edit profil', '2023-04-18 20:35:32', 'Mahasiswa'),
(43, NULL, 7, NULL, 'Melakukan edit profil', '2023-04-18 20:35:44', 'Mahasiswa'),
(44, NULL, 7, NULL, 'Melakukan edit profil', '2023-04-18 20:36:29', 'Mahasiswa'),
(45, NULL, 7, NULL, 'Melakukan edit profil', '2023-04-18 20:36:50', 'Mahasiswa'),
(46, NULL, NULL, 1, 'Melakukan edit profil', '2023-04-18 20:58:27', 'Staff'),
(47, NULL, NULL, 1, 'Melakukan edit profil', '2023-04-18 20:58:47', 'Staff'),
(48, NULL, NULL, 1, 'Melakukan edit profil', '2023-04-18 20:59:18', 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` enum('Mahasiswa') DEFAULT 'Mahasiswa',
  `id_kelompok_ukt` int(11) DEFAULT NULL,
  `foto_user` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `email`, `password`, `status`, `id_kelompok_ukt`, `foto_user`) VALUES
(7, 'Renaldi Noviandi', 10107050, 'renaldinoviandi9@gmail.com', '$2y$10$i0xPf3ppilwCMYPFhB1zhu0dqP32dSuuglrVfiY2j4jji6k4jFmea', 'Mahasiswa', 3, '04182023133629Renaldi.jpg'),
(9, 'Elang Muera', 10107040, 'elang@gmail.com', '$2y$10$IzEQ2VnYF1x2vxwWAZRtKe7/W4UQgV.8XUytkrr/s7Wa8BiDM9DJS', 'Mahasiswa', NULL, '04052023063227 Elang Muera.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nama_staff` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` enum('Staff') DEFAULT 'Staff',
  `foto_user` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_staff`, `email`, `nik`, `password`, `status`, `foto_user`) VALUES
(1, 'Pak Tri', 'tri@gmail.com', '109089742154215', '$2y$10$CMF/70ywx8praUefATN1zuAW7xJqvdrJtdqEBO8hSpcOumseI9Y/W', 'Staff', '04182023135918Pak Tri.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kelompok_ukt`
--
ALTER TABLE `kelompok_ukt`
  ADD PRIMARY KEY (`id_kelompok_ukt`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelompok_ukt`
--
ALTER TABLE `kelompok_ukt`
  MODIFY `id_kelompok_ukt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
