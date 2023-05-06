-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 04:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `status`, `foto_user`) VALUES
(1, 'Admin Sistem', 'renaldinoviandi9@gmail.com', '$2y$10$u0ojF60KuNfC7/Ie6AwksOzNppApFUnocYA6dmoHGiY4N9W8PYnwy', 'Admin', '02162023154704Admin Sistem.jpg'),
(2, 'Admin Sistem UKT', 'admin@gmail.com', '$2y$10$CfofXEParDaLa28vB2/i9uxG0Z8ywPKJycZ9pBYn/vSYeZ6fd4e9a', 'Admin', '04182023095408Admin Sistem UKT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_ukt`
--

CREATE TABLE `kelompok_ukt` (
  `id_kelompok_ukt` int(11) NOT NULL,
  `kelompok_ukt` int(11) NOT NULL,
  `program_studi` varchar(100) DEFAULT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelompok_ukt`
--

INSERT INTO `kelompok_ukt` (`id_kelompok_ukt`, `kelompok_ukt`, `program_studi`, `nominal`) VALUES
(1, 1, 'D3 Keperawatan', 500000),
(2, 2, 'D3 Keperawatan', 1000000),
(3, 3, 'D3 Keperawatan', 5000000),
(4, 4, 'D3 Keperawatan', 6000000),
(5, 5, 'D3 Keperawatan', 7000000),
(6, 6, 'D3 Keperawatan', 8000000),
(7, 7, 'D3 Keperawatan', 9000000),
(8, 8, 'D3 Keperawatan', 10000000),
(9, 1, 'D3 Sistem Informasi, Agroindustri, Pemeliharaan Mesin', 500000),
(10, 2, 'D3 Sistem Informasi, Agroindustri, Pemeliharaan Mesin', 1000000),
(11, 3, 'D3 Sistem Informasi, Agroindustri, Pemeliharaan Mesin', 3000000),
(12, 4, 'D3 Sistem Informasi, Agroindustri, Pemeliharaan Mesin', 4000000),
(13, 5, 'D3 Sistem Informasi, Agroindustri, Pemeliharaan Mesin', 5000000),
(14, 6, 'D3 Sistem Informasi, Agroindustri, Pemeliharaan Mesin', 6000000),
(15, 7, 'D3 Sistem Informasi, Agroindustri, Pemeliharaan Mesin', 7000000),
(16, 8, 'D3 Sistem Informasi, Agroindustri, Pemeliharaan Mesin', 8000000),
(25, 1, 'D4', 500000),
(26, 2, 'D4', 1000000),
(27, 3, 'D4', 3500000),
(28, 4, 'D4', 4500000),
(29, 5, 'D4', 5500000),
(30, 6, 'D4', 6500000),
(31, 7, 'D4', 7500000),
(32, 8, 'D4', 8500000);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `bobot` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`) VALUES
(4, 'Pendapatan Orang Tua', '0.6'),
(5, 'Pekerjaan Orang Tua', '0.4');

-- --------------------------------------------------------

--
-- Table structure for table `log`
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
-- Dumping data for table `log`
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
(48, NULL, NULL, 1, 'Melakukan edit profil', '2023-04-18 20:59:18', 'Staff'),
(49, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 1 dengan nominal Rp 500.000', '2023-05-01 08:09:45', 'Admin'),
(50, 2, NULL, NULL, 'Melakukan edit Kelompok UKT 1 dengan nominal Rp 500.000', '2023-05-01 08:10:33', 'Admin'),
(51, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 2 dengan nominal Rp 1.000.000', '2023-05-01 08:11:39', 'Admin'),
(52, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 3 dengan nominal Rp 5.000.000', '2023-05-01 08:12:08', 'Admin'),
(53, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 4 dengan nominal Rp 6.000.000', '2023-05-01 08:13:05', 'Admin'),
(54, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 5 dengan nominal Rp 7.000.000', '2023-05-01 08:13:31', 'Admin'),
(55, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 6 dengan nominal Rp 8.000.000', '2023-05-01 08:14:17', 'Admin'),
(56, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 7 dengan nominal Rp 9.000.000', '2023-05-01 08:14:37', 'Admin'),
(57, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 8 dengan nominal Rp 10.000.000', '2023-05-01 08:15:24', 'Admin'),
(58, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 1 dengan nominal Rp 500.000', '2023-05-01 08:21:26', 'Admin'),
(59, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 2 dengan nominal Rp 1.000.000', '2023-05-01 08:21:49', 'Admin'),
(60, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 3 dengan nominal Rp 3.000.000', '2023-05-01 08:22:10', 'Admin'),
(61, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 4 dengan nominal Rp 4.000.000', '2023-05-01 08:22:37', 'Admin'),
(62, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 5 dengan nominal Rp 5.000.000', '2023-05-01 08:23:07', 'Admin'),
(63, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 6 dengan nominal Rp 6.000.000', '2023-05-01 08:23:26', 'Admin'),
(64, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 7 dengan nominal Rp 7.000.000', '2023-05-01 08:23:40', 'Admin'),
(65, 2, NULL, NULL, 'Melakukan tambah Kelompok UKT 8 dengan nominal Rp 8.000.000', '2023-05-01 08:23:57', 'Admin'),
(66, 2, NULL, NULL, 'Melakukan tambah Kriteria', '2023-05-01 09:56:34', 'Admin'),
(67, 2, NULL, NULL, 'Melakukan tambah Kriteria', '2023-05-01 09:58:38', 'Admin'),
(68, 2, NULL, NULL, 'Melakukan edit Kriteria', '2023-05-01 10:01:13', 'Admin'),
(69, 2, NULL, NULL, 'Melakukan edit Kriteria', '2023-05-01 10:01:22', 'Admin'),
(70, 2, NULL, NULL, 'Melakukan hapus Kriteria', '2023-05-01 10:01:31', 'Admin'),
(71, 2, NULL, NULL, 'Melakukan tambah Kriteria', '2023-05-01 10:01:47', 'Admin'),
(72, 2, NULL, NULL, 'Melakukan tambah Kriteria', '2023-05-01 10:02:20', 'Admin'),
(73, 2, NULL, NULL, 'Melakukan hapus Kriteria', '2023-05-01 10:02:30', 'Admin'),
(74, 2, NULL, NULL, 'Melakukan hapus Kriteria', '2023-05-01 10:02:48', 'Admin'),
(75, 2, NULL, NULL, 'Melakukan tambah Kriteria', '2023-05-01 10:03:03', 'Admin'),
(76, 2, NULL, NULL, 'Melakukan tambah Kriteria', '2023-05-01 10:03:24', 'Admin'),
(77, 2, NULL, NULL, 'Melakukan edit Kriteria', '2023-05-01 10:07:18', 'Admin'),
(78, 2, NULL, NULL, 'Melakukan tambah nilai kriteria', '2023-05-01 14:33:09', 'Admin'),
(79, 2, NULL, NULL, 'Melakukan edit nilai kriteria', '2023-05-01 14:34:15', 'Admin'),
(80, 2, NULL, NULL, 'Melakukan edit nilai kriteria', '2023-05-01 14:34:28', 'Admin'),
(81, 2, NULL, NULL, 'Melakukan hapus nilai kriteria', '2023-05-01 14:35:20', 'Admin'),
(82, NULL, 7, NULL, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:40:06', 'Mahasiswa'),
(83, NULL, 7, NULL, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:41:18', 'Mahasiswa'),
(84, NULL, 9, NULL, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:52:12', 'Mahasiswa'),
(85, NULL, 9, NULL, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:56:01', 'Mahasiswa'),
(86, NULL, 9, NULL, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:57:53', 'Mahasiswa'),
(87, NULL, 9, NULL, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:58:35', 'Mahasiswa'),
(88, NULL, 9, NULL, 'Melakukan hapus data pengajuan', '2023-05-06 21:05:55', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(30) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` enum('Mahasiswa') DEFAULT 'Mahasiswa',
  `id_kelompok_ukt` int(11) DEFAULT NULL,
  `foto_user` text DEFAULT NULL,
  `status_penentuan_ukt` enum('Sudah','Belum') DEFAULT 'Belum',
  `status_pengajuan` enum('Tidak','Penangguhan','Penurunan') DEFAULT 'Tidak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `prodi`, `nomor_telepon`, `nim`, `email`, `password`, `status`, `id_kelompok_ukt`, `foto_user`, `status_penentuan_ukt`, `status_pengajuan`) VALUES
(9, 'Renaldi', 'D3 Sistem Informasi', '0898989833', 10107050, 'elang@gmail.com', '$2y$10$IzEQ2VnYF1x2vxwWAZRtKe7/W4UQgV.8XUytkrr/s7Wa8BiDM9DJS', 'Mahasiswa', 3, '04052023063227 Elang Muera.jpg', 'Belum', 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id_nilai_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_kriteria` varchar(100) DEFAULT NULL,
  `ukt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penangguhan_ukt`
--

CREATE TABLE `penangguhan_ukt` (
  `id_penangguhan_ukt` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nama_orang_tua` varchar(100) DEFAULT NULL,
  `alamat_orang_tua` varchar(255) DEFAULT NULL,
  `nomor_telepon_orang_tua` varchar(30) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `nominal_ukt` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `angsuran_pertama` int(11) DEFAULT NULL,
  `angsuran_kedua` int(11) DEFAULT NULL,
  `tanggal_angsuran_pertama` date DEFAULT NULL,
  `tanggal_angsuran_kedua` date DEFAULT NULL,
  `jadwal_wawancara` datetime DEFAULT NULL,
  `link_wawancara` text DEFAULT NULL,
  `status_penangguhan` enum('Setuju','Tidak Setuju','Menunggu','Belum Dikirim') DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penangguhan_ukt`
--

INSERT INTO `penangguhan_ukt` (`id_penangguhan_ukt`, `id_mahasiswa`, `nama_orang_tua`, `alamat_orang_tua`, `nomor_telepon_orang_tua`, `semester`, `nominal_ukt`, `denda`, `alasan`, `angsuran_pertama`, `angsuran_kedua`, `tanggal_angsuran_pertama`, `tanggal_angsuran_kedua`, `jadwal_wawancara`, `link_wawancara`, `status_penangguhan`, `tanggal_pengajuan`) VALUES
(3, 9, 'Nama Orang Tua', 'Subang', '08989978877', 2, 5000000, 250000, 'Alasan', 2500000, 2750000, '2023-05-06', '2023-05-13', NULL, NULL, 'Belum Dikirim', '2023-05-06'),
(4, 9, 'Nama Orang Tua', 'Subang', '08989978877', 2, 5000000, 250000, 'Alasan', 2500000, 2750000, '2023-05-06', '2023-05-13', NULL, NULL, 'Belum Dikirim', '2023-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
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
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_staff`, `email`, `nik`, `password`, `status`, `foto_user`) VALUES
(1, 'Pak Tri', 'renaldinoviandi9@gmail.com', '109089742154215', '$2y$10$X9WrHVrhRMA3cxx8EqYo1.S2dSgkXIMci7HWIZGOAJWHQ8KCMiQ4.', 'Staff', '04182023135918Pak Tri.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kelompok_ukt`
--
ALTER TABLE `kelompok_ukt`
  ADD PRIMARY KEY (`id_kelompok_ukt`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_nilai_kriteria`);

--
-- Indexes for table `penangguhan_ukt`
--
ALTER TABLE `penangguhan_ukt`
  ADD PRIMARY KEY (`id_penangguhan_ukt`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelompok_ukt`
--
ALTER TABLE `kelompok_ukt`
  MODIFY `id_kelompok_ukt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilai_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penangguhan_ukt`
--
ALTER TABLE `penangguhan_ukt`
  MODIFY `id_penangguhan_ukt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
