-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 03:26 PM
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
  `id_user` int(11) DEFAULT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `status_user` enum('Bagian Keuangan','Mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_user`, `id_mahasiswa`, `keterangan`, `waktu`, `status_user`) VALUES
(1, 2, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107052', '2023-04-05 14:23:34', ''),
(2, 2, NULL, 'Melakukan hapus staff dengan NIK 109089742154211', '2023-04-05 14:28:40', ''),
(3, 2, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107052', '2023-04-05 14:29:03', ''),
(4, 2, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107051', '2023-04-06 13:51:49', ''),
(5, 2, NULL, 'Melakukan edit mahasiswa dengan NIM 10107051', '2023-04-06 13:54:42', ''),
(6, 2, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107051', '2023-04-06 13:55:09', ''),
(7, 2, NULL, 'Melakukan tambah staff dengan NIK/NIP 111111111', '2023-04-06 13:56:41', ''),
(8, NULL, NULL, 'Melakukan edit staff dengan NIK/NIP 111111111', '2023-04-06 13:57:37', ''),
(9, NULL, 7, 'Melakukan hapus staff dengan NIK/NIP 111111111', '2023-04-06 13:57:55', 'Mahasiswa'),
(10, 2, NULL, 'Melakukan tambah staff dengan NIK/NIP 1111111', '2023-04-06 14:22:41', ''),
(11, 2, NULL, 'Melakukan tambah staff dengan NIK/NIP 1111111', '2023-04-06 14:27:41', ''),
(12, 2, NULL, 'Melakukan hapus staff dengan NIK/NIP 1111111', '2023-04-06 14:27:49', ''),
(13, 2, NULL, 'Melakukan tambah mahasiswa dengan NIM 11111111', '2023-04-06 14:30:12', ''),
(14, 2, NULL, 'Melakukan edit mahasiswa dengan NIM 11111111', '2023-04-06 14:30:29', ''),
(15, 2, NULL, 'Melakukan hapus mahasiswa dengan NIM 11111111', '2023-04-06 14:30:34', ''),
(16, 2, NULL, 'Melakukan tambah Kelompok UKT 1dengan nominal Rp 500.000', '2023-04-07 21:04:31', ''),
(17, 2, NULL, 'Melakukan edit Kelompok UKT 1dengan nominal Rp 500.000', '2023-04-07 21:23:19', ''),
(18, 2, NULL, 'Melakukan hapus Kelompok UKT dengan nominal Rp 0', '2023-04-07 22:23:30', ''),
(19, 2, NULL, 'Melakukan tambah Kelompok UKT 1dengan nominal Rp 500.000', '2023-04-07 22:27:20', ''),
(20, 2, NULL, 'Melakukan tambah Kelompok UKT 2dengan nominal Rp 1.000.000', '2023-04-07 22:27:59', ''),
(21, 2, NULL, 'Melakukan tambah Kelompok UKT 3dengan nominal Rp 2.500.000', '2023-04-07 22:28:19', ''),
(22, 2, NULL, 'Melakukan tambah Kelompok UKT 4dengan nominal Rp 3.000.000', '2023-04-07 22:29:07', ''),
(23, 2, NULL, 'Melakukan tambah Kelompok UKT 5dengan nominal Rp 3.500.000', '2023-04-07 22:29:32', ''),
(24, 2, NULL, 'Melakukan tambah Kelompok UKT 6dengan nominal Rp 4.000.000', '2023-04-07 22:29:52', ''),
(25, 2, NULL, 'Melakukan tambah Kelompok UKT 7dengan nominal Rp 4.500.000', '2023-04-07 22:30:09', ''),
(26, 2, NULL, 'Melakukan tambah Kelompok UKT 8dengan nominal Rp 5.000.000', '2023-04-07 22:30:24', ''),
(27, 2, NULL, 'Melakukan tambah admin dengan Email admin1@gmail.com', '2023-04-09 01:00:47', ''),
(28, 2, NULL, 'Melakukan tambah admin dengan Email admin1@gmail.com', '2023-04-09 01:01:51', ''),
(29, 2, NULL, 'Melakukan edit admin dengan Email admin1@gmail.com', '2023-04-09 01:16:00', ''),
(30, 2, NULL, 'Melakukan edit admin dengan Email admin1@gmail.com', '2023-04-09 01:16:24', ''),
(31, 2, NULL, 'Melakukan hapus admin dengan Email admin1@gmail.com', '2023-04-09 01:17:57', ''),
(32, 2, NULL, 'Melakukan edit mahasiswa dengan NIM 10107050', '2023-04-09 01:32:09', ''),
(33, 2, NULL, 'Melakukan edit profil', '2023-04-18 16:49:11', ''),
(34, 2, NULL, 'Melakukan edit profil', '2023-04-18 16:49:37', ''),
(35, 2, NULL, 'Melakukan edit profil', '2023-04-18 16:50:04', ''),
(36, 2, NULL, 'Melakukan edit profil', '2023-04-18 16:50:47', ''),
(37, 2, NULL, 'Melakukan edit profil', '2023-04-18 16:52:08', ''),
(38, 2, NULL, 'Melakukan edit profil', '2023-04-18 16:53:46', ''),
(39, 2, NULL, 'Melakukan edit profil', '2023-04-18 16:54:08', ''),
(40, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:34:17', 'Mahasiswa'),
(41, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:35:03', 'Mahasiswa'),
(42, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:35:32', 'Mahasiswa'),
(43, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:35:44', 'Mahasiswa'),
(44, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:36:29', 'Mahasiswa'),
(45, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:36:50', 'Mahasiswa'),
(46, NULL, NULL, 'Melakukan edit profil', '2023-04-18 20:58:27', ''),
(47, NULL, NULL, 'Melakukan edit profil', '2023-04-18 20:58:47', ''),
(48, NULL, NULL, 'Melakukan edit profil', '2023-04-18 20:59:18', ''),
(49, 2, NULL, 'Melakukan tambah Kelompok UKT 1 dengan nominal Rp 500.000', '2023-05-01 08:09:45', ''),
(50, 2, NULL, 'Melakukan edit Kelompok UKT 1 dengan nominal Rp 500.000', '2023-05-01 08:10:33', ''),
(51, 2, NULL, 'Melakukan tambah Kelompok UKT 2 dengan nominal Rp 1.000.000', '2023-05-01 08:11:39', ''),
(52, 2, NULL, 'Melakukan tambah Kelompok UKT 3 dengan nominal Rp 5.000.000', '2023-05-01 08:12:08', ''),
(53, 2, NULL, 'Melakukan tambah Kelompok UKT 4 dengan nominal Rp 6.000.000', '2023-05-01 08:13:05', ''),
(54, 2, NULL, 'Melakukan tambah Kelompok UKT 5 dengan nominal Rp 7.000.000', '2023-05-01 08:13:31', ''),
(55, 2, NULL, 'Melakukan tambah Kelompok UKT 6 dengan nominal Rp 8.000.000', '2023-05-01 08:14:17', ''),
(56, 2, NULL, 'Melakukan tambah Kelompok UKT 7 dengan nominal Rp 9.000.000', '2023-05-01 08:14:37', ''),
(57, 2, NULL, 'Melakukan tambah Kelompok UKT 8 dengan nominal Rp 10.000.000', '2023-05-01 08:15:24', ''),
(58, 2, NULL, 'Melakukan tambah Kelompok UKT 1 dengan nominal Rp 500.000', '2023-05-01 08:21:26', ''),
(59, 2, NULL, 'Melakukan tambah Kelompok UKT 2 dengan nominal Rp 1.000.000', '2023-05-01 08:21:49', ''),
(60, 2, NULL, 'Melakukan tambah Kelompok UKT 3 dengan nominal Rp 3.000.000', '2023-05-01 08:22:10', ''),
(61, 2, NULL, 'Melakukan tambah Kelompok UKT 4 dengan nominal Rp 4.000.000', '2023-05-01 08:22:37', ''),
(62, 2, NULL, 'Melakukan tambah Kelompok UKT 5 dengan nominal Rp 5.000.000', '2023-05-01 08:23:07', ''),
(63, 2, NULL, 'Melakukan tambah Kelompok UKT 6 dengan nominal Rp 6.000.000', '2023-05-01 08:23:26', ''),
(64, 2, NULL, 'Melakukan tambah Kelompok UKT 7 dengan nominal Rp 7.000.000', '2023-05-01 08:23:40', ''),
(65, 2, NULL, 'Melakukan tambah Kelompok UKT 8 dengan nominal Rp 8.000.000', '2023-05-01 08:23:57', ''),
(66, 2, NULL, 'Melakukan tambah Kriteria', '2023-05-01 09:56:34', ''),
(67, 2, NULL, 'Melakukan tambah Kriteria', '2023-05-01 09:58:38', ''),
(68, 2, NULL, 'Melakukan edit Kriteria', '2023-05-01 10:01:13', ''),
(69, 2, NULL, 'Melakukan edit Kriteria', '2023-05-01 10:01:22', ''),
(70, 2, NULL, 'Melakukan hapus Kriteria', '2023-05-01 10:01:31', ''),
(71, 2, NULL, 'Melakukan tambah Kriteria', '2023-05-01 10:01:47', ''),
(72, 2, NULL, 'Melakukan tambah Kriteria', '2023-05-01 10:02:20', ''),
(73, 2, NULL, 'Melakukan hapus Kriteria', '2023-05-01 10:02:30', ''),
(74, 2, NULL, 'Melakukan hapus Kriteria', '2023-05-01 10:02:48', ''),
(75, 2, NULL, 'Melakukan tambah Kriteria', '2023-05-01 10:03:03', ''),
(76, 2, NULL, 'Melakukan tambah Kriteria', '2023-05-01 10:03:24', ''),
(77, 2, NULL, 'Melakukan edit Kriteria', '2023-05-01 10:07:18', ''),
(78, 2, NULL, 'Melakukan tambah nilai kriteria', '2023-05-01 14:33:09', ''),
(79, 2, NULL, 'Melakukan edit nilai kriteria', '2023-05-01 14:34:15', ''),
(80, 2, NULL, 'Melakukan edit nilai kriteria', '2023-05-01 14:34:28', ''),
(81, 2, NULL, 'Melakukan hapus nilai kriteria', '2023-05-01 14:35:20', ''),
(82, NULL, 7, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:40:06', 'Mahasiswa'),
(83, NULL, 7, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:41:18', 'Mahasiswa'),
(84, NULL, 9, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:52:12', 'Mahasiswa'),
(85, NULL, 9, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:56:01', 'Mahasiswa'),
(86, NULL, 9, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:57:53', 'Mahasiswa'),
(87, NULL, 9, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:58:35', 'Mahasiswa'),
(88, NULL, 9, 'Melakukan hapus data pengajuan', '2023-05-06 21:05:55', 'Mahasiswa'),
(89, 2, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107040', '2023-05-09 12:37:04', ''),
(90, 2, NULL, 'Melakukan edit mahasiswa dengan NIM 10107040', '2023-05-09 12:37:17', ''),
(91, 2, NULL, 'Melakukan edit mahasiswa dengan NIM 10107040', '2023-05-09 12:37:39', ''),
(92, 2, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107040', '2023-05-09 12:37:57', ''),
(93, 2, NULL, 'Melakukan tambah nilai kriteria', '2023-05-09 12:50:45', ''),
(94, NULL, 9, 'Melakukan hapus data pengajuan', '2023-05-09 19:52:37', 'Mahasiswa'),
(95, NULL, 9, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-10 04:36:45', 'Mahasiswa'),
(96, NULL, 9, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-10 04:46:31', 'Mahasiswa'),
(97, NULL, 9, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-10 04:47:00', 'Mahasiswa'),
(98, NULL, 9, 'Melakukan kirim data pengajuan', '2023-05-10 05:20:49', 'Mahasiswa'),
(99, NULL, 9, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-10 14:38:18', 'Mahasiswa'),
(100, NULL, 9, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-10 14:38:38', 'Mahasiswa'),
(101, NULL, 9, 'Melakukan kirim data pengajuan', '2023-05-10 14:38:44', 'Mahasiswa'),
(102, NULL, NULL, 'Memberi jadwal wawancara', '2023-05-10 15:00:33', ''),
(103, NULL, NULL, 'Memberi jadwal wawancara', '2023-05-10 15:01:22', ''),
(104, NULL, NULL, 'Memberi keputusan setuju untuk pengajuan penangguhan UKT dari Renaldi', '2023-05-11 09:24:21', ''),
(105, NULL, NULL, 'Memberi keputusan setuju untuk pengajuan penangguhan UKT dari Renaldi', '2023-05-11 09:29:22', ''),
(106, NULL, NULL, 'Memberi keputusan tidak setuju untuk pengajuan penangguhan UKT dari Renaldi', '2023-05-11 09:29:48', ''),
(107, 2, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107054', '2023-05-11 10:01:50', ''),
(108, 2, NULL, 'Melakukan edit mahasiswa dengan NIM 10107054', '2023-05-11 10:02:02', ''),
(109, 2, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107054', '2023-05-11 10:05:20', ''),
(110, 1, NULL, 'Melakukan edit profil', '2023-05-13 08:15:02', 'Bagian Keuangan'),
(111, 1, NULL, 'Melakukan edit profil', '2023-05-13 08:15:14', 'Bagian Keuangan'),
(112, 1, NULL, 'Melakukan edit profil', '2023-05-13 08:16:07', 'Bagian Keuangan'),
(113, 1, NULL, 'Melakukan edit profil', '2023-05-13 08:16:16', 'Bagian Keuangan'),
(114, 1, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107040', '2023-05-13 10:32:31', 'Bagian Keuangan'),
(115, 1, NULL, 'Melakukan edit mahasiswa dengan NIM 10107040', '2023-05-13 10:32:54', 'Bagian Keuangan'),
(116, 1, NULL, 'Melakukan edit mahasiswa dengan NIM 10107041', '2023-05-13 10:33:24', 'Bagian Keuangan'),
(117, 1, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107041', '2023-05-13 10:33:32', 'Bagian Keuangan'),
(118, 1, NULL, 'Melakukan tambah Kelompok UKT 8 dengan nominal Rp 1.000.000.000', '2023-05-13 10:36:25', 'Bagian Keuangan'),
(119, 1, NULL, 'Melakukan edit Kelompok UKT 7 dengan nominal Rp 2.000.000.000', '2023-05-13 10:36:57', 'Bagian Keuangan'),
(120, 1, NULL, 'Melakukan hapus Kelompok UKT  dengan nominal Rp 0', '2023-05-13 10:37:07', 'Bagian Keuangan'),
(121, 1, NULL, 'Melakukan edit Kriteria', '2023-05-13 10:40:26', 'Bagian Keuangan'),
(122, 1, NULL, 'Melakukan tambah Kriteria', '2023-05-13 10:40:48', 'Bagian Keuangan'),
(123, 1, NULL, 'Melakukan hapus Kriteria', '2023-05-13 10:41:24', 'Bagian Keuangan'),
(124, 1, NULL, 'Melakukan edit Kriteria', '2023-05-13 10:41:37', 'Bagian Keuangan'),
(125, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-05-13 10:42:39', 'Bagian Keuangan'),
(126, 1, NULL, 'Melakukan edit nilai kriteria', '2023-05-13 10:42:57', 'Bagian Keuangan'),
(127, 1, NULL, 'Melakukan hapus nilai kriteria', '2023-05-13 10:43:04', 'Bagian Keuangan'),
(128, 1, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107054', '2023-05-15 10:13:54', 'Bagian Keuangan'),
(129, 1, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107050', '2023-05-15 10:14:14', 'Bagian Keuangan'),
(130, 1, NULL, 'Melakukan tambah Kelompok UKT 8 dengan nominal Rp 1.000', '2023-05-15 10:15:04', 'Bagian Keuangan'),
(131, 1, NULL, 'Melakukan edit Kelompok UKT 8 dengan nominal Rp 1.000', '2023-05-15 10:15:35', 'Bagian Keuangan'),
(132, 1, NULL, 'Melakukan hapus Kelompok UKT 8 dengan nominal Rp 1.000', '2023-05-15 10:15:51', 'Bagian Keuangan'),
(133, 1, NULL, 'Melakukan edit Kriteria', '2023-05-15 10:16:32', 'Bagian Keuangan'),
(134, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-05-15 10:16:57', 'Bagian Keuangan'),
(135, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-05-15 10:17:25', 'Bagian Keuangan'),
(136, 1, NULL, 'Melakukan hapus nilai kriteria', '2023-05-15 10:17:39', 'Bagian Keuangan'),
(137, 1, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107050', '2023-05-15 10:27:15', 'Bagian Keuangan'),
(138, NULL, 17, 'Melakukan pengajuan penangguhan UKT ', '2023-05-15 10:31:18', 'Mahasiswa'),
(139, NULL, 17, 'Melakukan kirim data pengajuan', '2023-05-15 10:31:45', 'Mahasiswa'),
(140, 1, NULL, 'Memberi jadwal wawancara', '2023-05-15 10:33:22', 'Bagian Keuangan'),
(141, NULL, 17, 'Melakukan pengajuan penurunan UKT ', '2023-05-21 11:59:44', 'Mahasiswa'),
(142, NULL, 17, 'Melakukan pengajuan penurunan UKT ', '2023-05-21 12:00:36', 'Mahasiswa'),
(143, NULL, 17, 'Melakukan pengajuan penurunan UKT ', '2023-05-21 12:02:16', 'Mahasiswa'),
(144, NULL, 17, 'Melakukan pengajuan penurunan UKT ', '2023-05-21 12:09:36', 'Mahasiswa'),
(145, NULL, 17, 'Melakukan pengajuan penurunan UKT ', '2023-05-21 12:29:28', 'Mahasiswa'),
(146, NULL, 17, 'Melakukan edit pengajuan penurunan UKT ', '2023-05-21 18:03:24', 'Mahasiswa'),
(147, NULL, 17, 'Melakukan edit pengajuan penurunan UKT ', '2023-05-21 18:10:43', 'Mahasiswa'),
(148, NULL, 17, 'Melakukan edit pengajuan penurunan UKT ', '2023-05-21 18:13:58', 'Mahasiswa'),
(149, NULL, 17, 'Melakukan kirim pengajuan penurunan UKT ', '2023-05-21 18:21:41', 'Mahasiswa'),
(150, 1, NULL, 'Memberikan jadwal survey pengajuan penurunan UKT Renaldi', '2023-05-21 19:57:57', 'Bagian Keuangan'),
(151, 1, NULL, 'Memberikan keputusan tidak setuju untuk pengajuan penurunan UKT Renaldi', '2023-05-21 20:09:31', 'Bagian Keuangan'),
(152, 1, NULL, 'Memberikan keputusan setuju untuk pengajuan penurunan UKT Renaldi', '2023-05-21 20:15:07', 'Bagian Keuangan');

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
  `status_pengajuan` enum('Tidak','Penangguhan','Penurunan') DEFAULT 'Tidak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `prodi`, `nomor_telepon`, `nim`, `email`, `password`, `status`, `id_kelompok_ukt`, `foto_user`, `status_pengajuan`) VALUES
(16, 'Mahasiswa 5', 'D3 Sistem Informasi', '08989784353', 10107054, 'sistempakar2022@gmail.com', '$2y$10$nPZZw0.69g30t.5CaqRv2e0NGybSqkxWnhpVihgxLSKU6r/vXlvHq', 'Mahasiswa', NULL, '05152023031354 Mahasiswa 5.png', 'Tidak'),
(17, 'Renaldi', 'D3 Sistem Informasi', '08989784353', 10107050, 'renaldinoviandi9@gmail.com', '$2y$10$NghATCuiW6ZCt.RVMKg.seM6RXNLWHcmuopT.KpCp0iXQOExYPqa.', 'Mahasiswa', 2, '05152023032715 Renaldi.png', 'Penurunan');

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

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_nilai_kriteria`, `id_kriteria`, `nilai_kriteria`, `ukt`) VALUES
(2, 4, '1000000-2000000', 1),
(5, 5, '1000000-2000000', 8);

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
  `tanggal_wawancara` date DEFAULT NULL,
  `jam_wawancara` varchar(10) DEFAULT NULL,
  `jenis_wawancara` enum('Online','Offline') DEFAULT NULL,
  `link_wawancara` text DEFAULT NULL,
  `status_penangguhan` enum('Setuju','Tidak Setuju','Proses','Belum Dikirim') DEFAULT NULL,
  `tanggal_pengajuan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penangguhan_ukt`
--

INSERT INTO `penangguhan_ukt` (`id_penangguhan_ukt`, `id_mahasiswa`, `nama_orang_tua`, `alamat_orang_tua`, `nomor_telepon_orang_tua`, `semester`, `nominal_ukt`, `denda`, `alasan`, `angsuran_pertama`, `angsuran_kedua`, `tanggal_angsuran_pertama`, `tanggal_angsuran_kedua`, `tanggal_wawancara`, `jam_wawancara`, `jenis_wawancara`, `link_wawancara`, `status_penangguhan`, `tanggal_pengajuan`) VALUES
(3, 9, 'Nama Orang Tua edit', 'Subang edit', '08989978877', 1, 5000000, 250000, 'Alasan edit', 2500000, 2750000, '2023-05-06', '2023-05-13', '2023-05-10', '15:00', 'Online', 'http://localhost:8000/kelola-penangguhan-ukt', 'Tidak Setuju', '2023-05-06 00:00:00'),
(6, 17, 'Nama Orang Tua', 'Subang', '0893489734', 2, 1000000, 50000, 'Alasan', 20322, 200000, '2023-05-16', '2023-05-18', '2023-05-17', '10:33', 'Online', 'http://localhost:8000/kelola-penangguhan-ukt', 'Proses', '2023-05-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `penurunan_ukt`
--

CREATE TABLE `penurunan_ukt` (
  `id_penurunan_ukt` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `tanggal_survey` date DEFAULT NULL,
  `status_penurunan` enum('Belum Dikirim','Proses','Setuju','Tidak Setuju') NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `surat_pengajuan` text DEFAULT NULL,
  `sktm` text DEFAULT NULL,
  `khs` text DEFAULT NULL,
  `struk_listrik` text DEFAULT NULL,
  `foto_rumah` text DEFAULT NULL,
  `slip_gaji` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penurunan_ukt`
--

INSERT INTO `penurunan_ukt` (`id_penurunan_ukt`, `id_mahasiswa`, `semester`, `tanggal_survey`, `status_penurunan`, `tanggal_pengajuan`, `surat_pengajuan`, `sktm`, `khs`, `struk_listrik`, `foto_rumah`, `slip_gaji`) VALUES
(2, 17, 5, '2023-05-31', 'Setuju', '2023-05-21 18:21:41', '05212023181358 Surat Pengajuan Renaldi.pdf', '05212023181358 SKTM Renaldi.pdf', '05212023181358 KHS Renaldi.pdf', '05212023181358 Struk Listrik Renaldi.pdf', '05212023181358 Foto Rumah Renaldi.pdf', '05212023181358 Slip Gaji Renaldi.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` enum('Bagian Keuangan') NOT NULL,
  `foto_user` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `nik`, `password`, `status`, `foto_user`) VALUES
(1, 'Bu Ida', 'renaldinoviandi0@gmail.com', '11111111', '$2y$10$sIgZRbYhk3OmrUSTZBJyH.qMkghMa7bdaAFwODNfSCZ8OIfsB4cZi', 'Bagian Keuangan', '05132023011607Bu Ida Update.jpg');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `penurunan_ukt`
--
ALTER TABLE `penurunan_ukt`
  ADD PRIMARY KEY (`id_penurunan_ukt`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelompok_ukt`
--
ALTER TABLE `kelompok_ukt`
  MODIFY `id_kelompok_ukt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilai_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penangguhan_ukt`
--
ALTER TABLE `penangguhan_ukt`
  MODIFY `id_penangguhan_ukt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penurunan_ukt`
--
ALTER TABLE `penurunan_ukt`
  MODIFY `id_penurunan_ukt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
