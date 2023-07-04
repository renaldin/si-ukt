-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 12:44 AM
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
(9, 1, 'D3 Sistem Informasi', 500000),
(10, 2, 'D3 Sistem Informasi', 1000000),
(11, 3, 'D3 Sistem Informasi', 3000000),
(12, 4, 'D3 Sistem Informasi', 4000000),
(13, 5, 'D3 Sistem Informasi', 5000000),
(14, 6, 'D3 Sistem Informasi', 6000000),
(15, 7, 'D3 Sistem Informasi', 7000000),
(16, 8, 'D3 Sistem Informasi', 8000000),
(35, 1, 'D3 Agroindustri', 500000),
(36, 2, 'D3 Agroindustri', 1000000),
(37, 3, 'D3 Agroindustri', 3000000),
(38, 4, 'D3 Agroindustri', 4000000),
(39, 5, 'D3 Agroindustri', 5000000),
(40, 6, 'D3 Agroindustri', 6000000),
(41, 7, 'D3 Agroindustri', 7000000),
(42, 8, 'D3 Agroindustri', 8000000),
(43, 1, 'D3 Pemeliharaan Mesin', 500000),
(44, 2, 'D3 Pemeliharaan Mesin', 1000000),
(45, 3, 'D3 Pemeliharaan Mesin', 3000000),
(46, 4, 'D3 Pemeliharaan Mesin', 4000000),
(47, 5, 'D3 Pemeliharaan Mesin', 5000000),
(48, 6, 'D3 Pemeliharaan Mesin', 6000000),
(49, 7, 'D3 Pemeliharaan Mesin', 7000000),
(50, 8, 'D3 Pemeliharaan Mesin', 8000000),
(51, 1, 'D4 Teknologi Produksi Tanaman Pangan', 500000),
(52, 2, 'D4 Teknologi Produksi Tanaman Pangan', 1000000),
(53, 3, 'D4 Teknologi Produksi Tanaman Pangan', 3500000),
(54, 4, 'D4 Teknologi Produksi Tanaman Pangan', 4500000),
(55, 5, 'D4 Teknologi Produksi Tanaman Pangan', 5500000),
(56, 6, 'D4 Teknologi Produksi Tanaman Pangan', 6500000),
(57, 7, 'D4 Teknologi Produksi Tanaman Pangan', 7500000),
(58, 8, 'D4 Teknologi Produksi Tanaman Pangan', 8500000),
(59, 1, 'D4 Teknologi Rekayasa Manufaktur', 500000),
(60, 2, 'D4 Teknologi Rekayasa Manufaktur', 1000000),
(61, 3, 'D4 Teknologi Rekayasa Manufaktur', 3500000),
(62, 4, 'D4 Teknologi Rekayasa Manufaktur', 4500000),
(63, 5, 'D4 Teknologi Rekayasa Manufaktur', 5500000),
(64, 6, 'D4 Teknologi Rekayasa Manufaktur', 6500000),
(65, 7, 'D4 Teknologi Rekayasa Manufaktur', 7500000),
(66, 8, 'D4 Teknologi Rekayasa Manufaktur', 8500000),
(67, 1, 'D4 Teknologi Rekayasa Perangkat Lunak', 500000),
(68, 2, 'D4 Teknologi Rekayasa Perangkat Lunak', 1000000),
(69, 3, 'D4 Teknologi Rekayasa Perangkat Lunak', 3500000),
(70, 4, 'D4 Teknologi Rekayasa Perangkat Lunak', 4500000),
(71, 5, 'D4 Teknologi Rekayasa Perangkat Lunak', 5500000),
(72, 6, 'D4 Teknologi Rekayasa Perangkat Lunak', 6500000),
(73, 7, 'D4 Teknologi Rekayasa Perangkat Lunak', 7500000),
(74, 8, 'D4 Teknologi Rekayasa Perangkat Lunak', 8500000);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `bobot` varchar(11) DEFAULT NULL,
  `ideal` enum('Benefit','Cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `ideal`) VALUES
(4, 'Pendapatan Orang Tua', '0.6', 'Benefit'),
(5, 'Pekerjaan Orang Tua', '0.4', 'Benefit');

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
  `status_user` enum('Bagian Keuangan','Mahasiswa','Akademik','Kabag Umum & Akademik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_user`, `id_mahasiswa`, `keterangan`, `waktu`, `status_user`) VALUES
(9, NULL, 7, 'Melakukan hapus staff dengan NIK/NIP 111111111', '2023-04-06 13:57:55', 'Mahasiswa'),
(40, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:34:17', 'Mahasiswa'),
(41, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:35:03', 'Mahasiswa'),
(42, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:35:32', 'Mahasiswa'),
(43, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:35:44', 'Mahasiswa'),
(44, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:36:29', 'Mahasiswa'),
(45, NULL, 7, 'Melakukan edit profil', '2023-04-18 20:36:50', 'Mahasiswa'),
(81, 2, NULL, 'Melakukan hapus nilai kriteria', '2023-05-01 14:35:20', ''),
(82, NULL, 7, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:40:06', 'Mahasiswa'),
(83, NULL, 7, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:41:18', 'Mahasiswa'),
(84, NULL, 9, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:52:12', 'Mahasiswa'),
(85, NULL, 9, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:56:01', 'Mahasiswa'),
(86, NULL, 9, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:57:53', 'Mahasiswa'),
(87, NULL, 9, 'Melakukan pengajuan penangguhan UKT ', '2023-05-06 20:58:35', 'Mahasiswa'),
(94, NULL, 9, 'Melakukan hapus data pengajuan', '2023-05-09 19:52:37', 'Mahasiswa'),
(95, NULL, 9, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-10 04:36:45', 'Mahasiswa'),
(96, NULL, 9, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-10 04:46:31', 'Mahasiswa'),
(97, NULL, 9, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-10 04:47:00', 'Mahasiswa'),
(98, NULL, 9, 'Melakukan kirim data pengajuan', '2023-05-10 05:20:49', 'Mahasiswa'),
(99, NULL, 9, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-10 14:38:18', 'Mahasiswa'),
(100, NULL, 9, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-10 14:38:38', 'Mahasiswa'),
(101, NULL, 9, 'Melakukan kirim data pengajuan', '2023-05-10 14:38:44', 'Mahasiswa'),
(104, NULL, NULL, 'Memberi keputusan setuju untuk pengajuan penangguhan UKT dari Renaldi', '2023-05-11 09:24:21', ''),
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
(152, 1, NULL, 'Memberikan keputusan setuju untuk pengajuan penurunan UKT Renaldi', '2023-05-21 20:15:07', 'Bagian Keuangan'),
(153, 1, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107052', '2023-05-22 11:34:50', 'Bagian Keuangan'),
(154, NULL, 18, 'Melakukan pengajuan penangguhan UKT ', '2023-05-22 11:37:00', 'Mahasiswa'),
(155, NULL, 18, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-22 11:37:20', 'Mahasiswa'),
(156, NULL, 18, 'Melakukan kirim data pengajuan', '2023-05-22 11:37:31', 'Mahasiswa'),
(157, 1, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107001', '2023-05-24 09:37:50', 'Bagian Keuangan'),
(158, 1, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107002', '2023-05-24 09:39:03', 'Bagian Keuangan'),
(159, NULL, 20, 'Melakukan pengajuan penurunan UKT ', '2023-05-24 09:42:56', 'Mahasiswa'),
(160, NULL, 20, 'Melakukan kirim pengajuan penurunan UKT ', '2023-05-24 09:43:47', 'Mahasiswa'),
(161, 1, NULL, 'Memberikan jadwal survey pengajuan penurunan UKT Mahasiswa 2', '2023-05-24 09:45:46', 'Bagian Keuangan'),
(162, 1, NULL, 'Memberikan keputusan setuju untuk pengajuan penurunan UKT Mahasiswa 2', '2023-05-24 09:47:13', 'Bagian Keuangan'),
(163, NULL, 19, 'Melakukan pengajuan penurunan UKT ', '2023-05-25 10:21:50', 'Mahasiswa'),
(164, NULL, 19, 'Melakukan kirim pengajuan penurunan UKT ', '2023-05-25 10:22:49', 'Mahasiswa'),
(165, 1, NULL, 'Memberikan jadwal survey pengajuan penurunan UKT Mahasiswa 1', '2023-05-25 10:26:37', 'Bagian Keuangan'),
(166, 1, NULL, 'Memberikan keputusan setuju untuk pengajuan penurunan UKT Mahasiswa 1', '2023-05-25 10:27:05', 'Bagian Keuangan'),
(167, NULL, 19, 'Melakukan pengajuan penurunan UKT ', '2023-05-26 13:23:07', 'Mahasiswa'),
(168, NULL, 19, 'Melakukan kirim pengajuan penurunan UKT ', '2023-05-26 13:23:30', 'Mahasiswa'),
(169, 1, NULL, 'Memberikan jadwal survey pengajuan penurunan UKT Mahasiswa 1', '2023-05-26 13:25:16', 'Bagian Keuangan'),
(170, 1, NULL, 'Memberikan keputusan setuju untuk pengajuan penurunan UKT Mahasiswa 1', '2023-05-26 13:25:49', 'Bagian Keuangan'),
(171, NULL, 19, 'Melakukan pengajuan penangguhan UKT ', '2023-05-26 21:44:51', 'Mahasiswa'),
(172, NULL, 19, 'Melakukan pengajuan penangguhan UKT ', '2023-05-26 21:54:11', 'Mahasiswa'),
(173, NULL, 19, 'Melakukan edit pengajuan penangguhan UKT ', '2023-05-26 21:54:54', 'Mahasiswa'),
(174, NULL, 19, 'Melakukan kirim data pengajuan', '2023-05-26 21:55:19', 'Mahasiswa'),
(175, 1, NULL, 'Memberi jadwal wawancara', '2023-05-26 22:00:27', 'Bagian Keuangan'),
(176, 1, NULL, 'Memberi keputusan setuju untuk pengajuan penangguhan UKT dari Mahasiswa 1', '2023-05-26 22:02:12', 'Bagian Keuangan'),
(177, 1, NULL, 'Memberi keputusan setuju untuk pengajuan penangguhan UKT dari Renaldi 5', '2023-05-26 22:02:17', 'Bagian Keuangan'),
(178, 1, NULL, 'Memberi keputusan setuju untuk pengajuan penangguhan UKT dari Renaldi', '2023-05-26 22:02:21', 'Bagian Keuangan'),
(179, NULL, 19, 'Melakukan pengajuan penurunan UKT ', '2023-05-26 23:03:35', 'Mahasiswa'),
(180, NULL, 19, 'Melakukan edit pengajuan penurunan UKT ', '2023-05-26 23:07:13', 'Mahasiswa'),
(181, NULL, 19, 'Melakukan kirim pengajuan penurunan UKT ', '2023-05-26 23:07:42', 'Mahasiswa'),
(182, 1, NULL, 'Memberikan jadwal survey pengajuan penurunan UKT Mahasiswa 1', '2023-05-26 23:08:27', 'Bagian Keuangan'),
(183, 1, NULL, 'Memberikan keputusan setuju untuk pengajuan penurunan UKT Mahasiswa 1', '2023-05-26 23:08:33', 'Bagian Keuangan'),
(184, 1, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107003', '2023-05-27 18:48:09', 'Bagian Keuangan'),
(185, NULL, 21, 'Melakukan pengajuan penurunan UKT ', '2023-05-27 19:50:07', 'Mahasiswa'),
(186, NULL, 21, 'Melakukan edit pengajuan penurunan UKT ', '2023-05-27 19:51:48', 'Mahasiswa'),
(187, NULL, 21, 'Melakukan kirim pengajuan penurunan UKT ', '2023-05-27 19:58:24', 'Mahasiswa'),
(188, 1, NULL, 'Memberikan jadwal survey pengajuan penurunan UKT Mahasiswa 3', '2023-05-27 20:01:16', 'Bagian Keuangan'),
(189, 1, NULL, 'Melakukan edit pengaturan', '2023-05-28 14:42:34', 'Bagian Keuangan'),
(190, 1, NULL, 'Melakukan edit pengaturan', '2023-05-28 14:43:25', 'Bagian Keuangan'),
(191, 1, NULL, 'Melakukan edit pengaturan', '2023-05-28 14:46:20', 'Bagian Keuangan'),
(192, 1, NULL, 'Melakukan edit pengaturan', '2023-05-28 14:48:58', 'Bagian Keuangan'),
(193, 1, NULL, 'Melakukan edit pengaturan', '2023-05-28 14:49:32', 'Bagian Keuangan'),
(194, 1, NULL, 'Melakukan edit nilai kriteria', '2023-05-29 09:21:08', 'Bagian Keuangan'),
(195, 1, NULL, 'Melakukan edit pengaturan', '2023-05-29 11:02:39', 'Bagian Keuangan'),
(196, 1, NULL, 'Melakukan tambah user dengan role ', '2023-06-05 05:34:43', 'Bagian Keuangan'),
(197, 1, NULL, 'Melakukan edit user dengan role ', '2023-06-05 05:45:03', 'Bagian Keuangan'),
(198, 1, NULL, 'Melakukan edit user dengan role ', '2023-06-05 05:45:16', 'Bagian Keuangan'),
(199, 1, NULL, 'Melakukan edit user dengan role ', '2023-06-05 05:45:47', 'Bagian Keuangan'),
(200, 1, NULL, 'Melakukan edit user dengan role ', '2023-06-05 05:46:14', 'Bagian Keuangan'),
(201, 1, NULL, 'Melakukan edit user dengan role ', '2023-06-05 05:46:30', 'Bagian Keuangan'),
(202, 1, NULL, 'Melakukan hapus user dengan role ', '2023-06-05 05:48:47', 'Bagian Keuangan'),
(203, 1, NULL, 'Melakukan edit pengaturan', '2023-06-05 13:13:46', 'Bagian Keuangan'),
(204, 1, NULL, 'Melakukan tambah user dengan role ', '2023-06-05 19:31:51', 'Bagian Keuangan'),
(205, 1, NULL, 'Melakukan tambah user dengan role ', '2023-06-05 19:41:38', 'Bagian Keuangan'),
(206, 8, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107005', '2023-06-05 20:57:43', 'Akademik'),
(207, 8, NULL, 'Melakukan edit mahasiswa dengan NIM 10107005', '2023-06-05 20:57:55', 'Akademik'),
(208, 8, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107005', '2023-06-05 20:58:07', 'Akademik'),
(209, 8, NULL, 'Melakukan edit profil', '2023-06-05 21:19:48', 'Akademik'),
(210, 8, NULL, 'Melakukan edit profil', '2023-06-05 21:20:04', 'Akademik'),
(211, 7, NULL, 'Melakukan edit profil', '2023-06-05 21:23:57', 'Kabag Umum & Akademik'),
(212, NULL, 21, 'Melakukan pengajuan penangguhan UKT ', '2023-06-05 21:52:53', 'Mahasiswa'),
(213, NULL, 21, 'Melakukan edit pengajuan penangguhan UKT ', '2023-06-05 21:53:07', 'Mahasiswa'),
(214, NULL, 21, 'Melakukan kirim data pengajuan', '2023-06-05 21:53:24', 'Mahasiswa'),
(215, NULL, 21, 'Melakukan kirim data pengajuan', '2023-06-05 21:54:42', 'Mahasiswa'),
(216, 1, NULL, 'Memberi jadwal wawancara', '2023-06-06 01:39:56', 'Bagian Keuangan'),
(217, 1, NULL, 'Memberi keputusan tidak setuju untuk pengajuan penangguhan UKT dari Mahasiswa 3', '2023-06-06 01:42:03', 'Bagian Keuangan'),
(218, 1, NULL, 'Memberi keputusan setuju dan mengirim data pengajuan penangguhan UKT ke Kabag Umum & Akademik', '2023-06-06 01:45:27', 'Bagian Keuangan'),
(219, 7, NULL, 'Memberi keputusan tidak setuju untuk pengajuan penangguhan UKT dari Mahasiswa 3', '2023-06-06 10:51:04', 'Kabag Umum & Akademik'),
(220, 7, NULL, 'Memberi keputusan setuju data pengajuan penangguhan UKT Mahasiwa yang bernama Mahasiswa 3', '2023-06-06 10:59:14', 'Kabag Umum & Akademik'),
(221, 1, NULL, 'Memberi keputusan tidak setuju untuk pengajuan penangguhan UKT dari Mahasiswa 3', '2023-06-06 11:24:53', 'Bagian Keuangan'),
(222, 1, NULL, 'Memberi keputusan setuju dan mengirim data pengajuan penangguhan UKT ke Kabag Umum & Akademik', '2023-06-06 11:26:12', 'Bagian Keuangan'),
(223, 7, NULL, 'Memberi keputusan tidak setuju untuk pengajuan penangguhan UKT dari Mahasiswa 3', '2023-06-06 11:26:36', 'Kabag Umum & Akademik'),
(224, 7, NULL, 'Memberi keputusan setuju data pengajuan penangguhan UKT Mahasiwa yang bernama Mahasiswa 3', '2023-06-06 11:26:57', 'Kabag Umum & Akademik'),
(225, 7, NULL, 'Melakukan edit profil', '2023-06-06 12:05:10', 'Kabag Umum & Akademik'),
(226, 7, NULL, 'Melakukan edit profil', '2023-06-06 12:05:15', 'Kabag Umum & Akademik'),
(227, 7, NULL, 'Melakukan edit profil', '2023-06-06 12:15:51', 'Kabag Umum & Akademik'),
(228, 7, NULL, 'Memberi keputusan setuju data pengajuan penangguhan UKT Mahasiwa yang bernama Mahasiswa 3', '2023-06-06 12:28:59', 'Kabag Umum & Akademik'),
(229, 1, NULL, 'Memberi keputusan setuju dan mengirim data pengajuan penangguhan UKT ke Kabag Umum & Akademik', '2023-06-06 13:28:30', 'Bagian Keuangan'),
(230, 7, NULL, 'Memberi keputusan setuju data pengajuan penangguhan UKT Mahasiwa yang bernama Mahasiswa 3', '2023-06-06 13:28:56', 'Kabag Umum & Akademik'),
(231, 1, NULL, 'Melakukan edit pengaturan', '2023-06-06 15:04:20', 'Bagian Keuangan'),
(232, 7, NULL, 'Memberi keputusan setuju data pengajuan penangguhan UKT Mahasiwa yang bernama Mahasiswa 3', '2023-06-06 15:06:28', 'Kabag Umum & Akademik'),
(233, 1, NULL, 'Melakukan edit pengaturan', '2023-06-06 21:38:11', 'Bagian Keuangan'),
(234, NULL, 21, 'Melakukan pengajuan penurunan UKT ', '2023-06-06 21:43:46', 'Mahasiswa'),
(235, NULL, 21, 'Melakukan edit pengajuan penurunan UKT ', '2023-06-06 21:46:17', 'Mahasiswa'),
(236, NULL, 21, 'Melakukan kirim pengajuan penurunan UKT ', '2023-06-06 21:55:35', 'Mahasiswa'),
(237, NULL, 21, 'Melakukan kirim pengajuan penurunan UKT Mahasiswa dengan NIM 10107003', '2023-06-06 22:03:45', 'Mahasiswa'),
(238, 1, NULL, 'Memberikan jadwal survey pengajuan penurunan UKT Mahasiswa 3', '2023-06-06 22:20:06', 'Bagian Keuangan'),
(239, 1, NULL, 'Memberikan keputusan tidak setuju untuk pengajuan penurunan UKT Mahasiswa 3', '2023-06-06 22:33:30', 'Bagian Keuangan'),
(240, 1, NULL, 'Memberikan keputusan setuju untuk pengajuan penurunan UKT Mahasiswa 3', '2023-06-06 22:42:25', 'Bagian Keuangan'),
(241, 7, NULL, 'Memberikan keputusan tidak setuju untuk pengajuan penurunan UKT Mahasiswa 3', '2023-06-06 23:24:44', 'Kabag Umum & Akademik'),
(242, 7, NULL, 'Memberikan keputusan setuju untuk pengajuan penurunan UKT Mahasiswa 3', '2023-06-06 23:40:52', 'Kabag Umum & Akademik'),
(243, 8, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107050', '2023-06-07 23:58:17', 'Akademik'),
(244, 8, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107042', '2023-06-07 23:58:28', 'Akademik'),
(245, 8, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107042', '2023-06-08 00:05:03', 'Akademik'),
(246, 8, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107055', '2023-06-08 00:05:09', 'Akademik'),
(247, 8, NULL, 'Melakukan edit mahasiswa dengan NIM 10107055', '2023-06-08 00:05:52', 'Akademik'),
(248, NULL, 22, 'Melakukan edit profil', '2023-06-10 01:05:21', 'Mahasiswa'),
(249, 1, NULL, 'Melakukan edit pengaturan', '2023-06-10 01:06:33', 'Bagian Keuangan'),
(250, 1, NULL, 'Melakukan edit profil', '2023-06-10 01:15:19', 'Bagian Keuangan'),
(251, 1, NULL, 'Melakukan edit profil', '2023-06-10 01:16:50', 'Bagian Keuangan'),
(252, 7, NULL, 'Melakukan edit profil', '2023-06-10 01:31:55', 'Kabag Umum & Akademik'),
(253, 7, NULL, 'Melakukan edit profil', '2023-06-10 01:32:06', 'Kabag Umum & Akademik'),
(254, 1, NULL, 'Melakukan hapus nilai kriteria', '2023-06-10 07:15:19', 'Bagian Keuangan'),
(255, 1, NULL, 'Melakukan edit nilai kriteria', '2023-06-10 07:25:37', 'Bagian Keuangan'),
(256, 1, NULL, 'Melakukan edit nilai kriteria', '2023-06-10 07:26:05', 'Bagian Keuangan'),
(257, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 07:49:26', 'Bagian Keuangan'),
(258, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 07:51:17', 'Bagian Keuangan'),
(259, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 07:52:28', 'Bagian Keuangan'),
(260, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 07:54:08', 'Bagian Keuangan'),
(261, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 07:54:57', 'Bagian Keuangan'),
(262, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 07:55:36', 'Bagian Keuangan'),
(263, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 07:57:12', 'Bagian Keuangan'),
(264, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 07:59:35', 'Bagian Keuangan'),
(265, 1, NULL, 'Melakukan edit nilai kriteria', '2023-06-10 08:02:06', 'Bagian Keuangan'),
(266, 1, NULL, 'Melakukan edit nilai kriteria', '2023-06-10 08:04:34', 'Bagian Keuangan'),
(267, 1, NULL, 'Melakukan hapus nilai kriteria', '2023-06-10 08:04:44', 'Bagian Keuangan'),
(268, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 08:06:55', 'Bagian Keuangan'),
(269, 1, NULL, 'Melakukan hapus nilai kriteria', '2023-06-10 08:07:08', 'Bagian Keuangan'),
(270, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 08:18:20', 'Bagian Keuangan'),
(271, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 08:18:37', 'Bagian Keuangan'),
(272, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 08:18:53', 'Bagian Keuangan'),
(273, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 08:19:25', 'Bagian Keuangan'),
(274, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 08:21:02', 'Bagian Keuangan'),
(275, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 08:21:15', 'Bagian Keuangan'),
(276, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 08:21:29', 'Bagian Keuangan'),
(277, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 08:21:41', 'Bagian Keuangan'),
(278, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-10 08:21:55', 'Bagian Keuangan'),
(279, 8, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107008', '2023-06-10 08:30:57', 'Akademik'),
(280, 8, NULL, 'Melakukan tambah mahasiswa dengan NIM 10107006', '2023-06-11 19:33:58', 'Akademik'),
(281, 8, NULL, 'Melakukan edit mahasiswa dengan NIM 10107006', '2023-06-11 19:34:20', 'Akademik'),
(282, 8, NULL, 'Melakukan edit mahasiswa dengan NIM 10107006', '2023-06-11 19:36:13', 'Akademik'),
(283, 8, NULL, 'Melakukan edit mahasiswa dengan NIM 10107006', '2023-06-11 19:36:35', 'Akademik'),
(284, 8, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107042', '2023-06-11 19:39:52', 'Akademik'),
(285, 8, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107055', '2023-06-11 19:39:57', 'Akademik'),
(286, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 20:25:16', 'Bagian Keuangan'),
(287, 1, NULL, 'Melakukan tambah Kriteria', '2023-06-11 20:26:05', 'Bagian Keuangan'),
(288, 1, NULL, 'Melakukan hapus Kriteria', '2023-06-11 20:26:21', 'Bagian Keuangan'),
(289, 1, NULL, 'Melakukan tambah Kriteria', '2023-06-11 20:26:47', 'Bagian Keuangan'),
(290, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 20:28:57', 'Bagian Keuangan'),
(291, 1, NULL, 'Melakukan hapus Kriteria', '2023-06-11 20:29:05', 'Bagian Keuangan'),
(292, 1, NULL, 'Melakukan tambah Kriteria', '2023-06-11 20:33:00', 'Bagian Keuangan'),
(293, 1, NULL, 'Melakukan hapus Kriteria', '2023-06-11 20:33:13', 'Bagian Keuangan'),
(294, 1, NULL, 'Melakukan tambah Kriteria', '2023-06-11 20:33:34', 'Bagian Keuangan'),
(295, 1, NULL, 'Melakukan hapus Kriteria', '2023-06-11 20:34:17', 'Bagian Keuangan'),
(296, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 20:39:09', 'Bagian Keuangan'),
(297, 1, NULL, 'Melakukan tambah Kriteria', '2023-06-11 20:39:36', 'Bagian Keuangan'),
(298, 1, NULL, 'Melakukan hapus Kriteria', '2023-06-11 20:40:08', 'Bagian Keuangan'),
(299, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 20:40:23', 'Bagian Keuangan'),
(300, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 20:41:16', 'Bagian Keuangan'),
(301, 1, NULL, 'Melakukan tambah Kriteria', '2023-06-11 20:41:27', 'Bagian Keuangan'),
(302, 1, NULL, 'Melakukan hapus Kriteria', '2023-06-11 20:42:30', 'Bagian Keuangan'),
(303, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 20:42:43', 'Bagian Keuangan'),
(304, 1, NULL, 'Melakukan tambah Kriteria', '2023-06-11 20:42:55', 'Bagian Keuangan'),
(305, 1, NULL, 'Melakukan hapus Kriteria', '2023-06-11 20:43:31', 'Bagian Keuangan'),
(306, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 20:43:40', 'Bagian Keuangan'),
(307, 1, NULL, 'Melakukan tambah Kriteria', '2023-06-11 20:43:54', 'Bagian Keuangan'),
(308, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 20:44:30', 'Bagian Keuangan'),
(309, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 20:44:43', 'Bagian Keuangan'),
(310, 1, NULL, 'Melakukan hapus Kriteria', '2023-06-11 20:51:47', 'Bagian Keuangan'),
(311, 1, NULL, 'Melakukan tambah Kriteria', '2023-06-11 20:52:04', 'Bagian Keuangan'),
(312, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 20:52:16', 'Bagian Keuangan'),
(313, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 20:52:25', 'Bagian Keuangan'),
(314, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-11 20:58:49', 'Bagian Keuangan'),
(315, 1, NULL, 'Melakukan edit nilai kriteria', '2023-06-11 20:59:05', 'Bagian Keuangan'),
(316, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-11 21:00:25', 'Bagian Keuangan'),
(317, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-11 21:00:33', 'Bagian Keuangan'),
(318, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-11 21:00:41', 'Bagian Keuangan'),
(319, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-11 21:00:51', 'Bagian Keuangan'),
(320, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-11 21:01:14', 'Bagian Keuangan'),
(321, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-11 21:01:24', 'Bagian Keuangan'),
(322, 1, NULL, 'Melakukan tambah nilai kriteria', '2023-06-11 21:01:29', 'Bagian Keuangan'),
(323, 1, NULL, 'Melakukan hapus Kriteria', '2023-06-11 21:05:03', 'Bagian Keuangan'),
(324, 1, NULL, 'Melakukan edit Kriteria', '2023-06-11 21:05:16', 'Bagian Keuangan'),
(325, NULL, 30, 'Melakukan penentuan UKT ', '2023-06-12 02:39:38', 'Mahasiswa'),
(326, NULL, 30, 'Melakukan penentuan UKT ', '2023-06-12 02:42:17', 'Mahasiswa'),
(327, NULL, 30, 'Melakukan penentuan UKT ', '2023-06-12 02:44:50', 'Mahasiswa'),
(328, NULL, 30, 'Melakukan proses penentuan UKT ', '2023-06-12 03:20:35', 'Mahasiswa'),
(329, NULL, 30, 'Mengulangi proses penentuan UKT ', '2023-06-12 03:21:22', 'Mahasiswa'),
(330, NULL, 30, 'Melakukan proses penentuan UKT ', '2023-06-12 03:33:52', 'Mahasiswa'),
(331, NULL, 1, 'Memberikan keputusan tidak setuju penentuan UKT kepada Baga', '2023-06-12 04:41:14', 'Bagian Keuangan'),
(332, NULL, 1, 'Memberikan keputusan tidak setuju penentuan UKT kepada Baga', '2023-06-12 04:42:12', 'Bagian Keuangan'),
(333, NULL, 30, 'Mengulangi proses penentuan UKT ', '2023-06-12 04:42:57', 'Mahasiswa'),
(334, NULL, 30, 'Melakukan proses penentuan UKT ', '2023-06-12 05:10:48', 'Mahasiswa'),
(335, NULL, 1, 'Memberikan keputusan setuju penentuan UKT kepada Baga', '2023-06-12 05:25:51', 'Bagian Keuangan'),
(336, NULL, 34, 'Melakukan proses penentuan UKT ', '2023-06-12 13:30:14', 'Mahasiswa'),
(337, NULL, 1, 'Memberikan keputusan setuju penentuan UKT kepada Mahasiswa 7', '2023-06-12 13:34:51', 'Bagian Keuangan'),
(338, NULL, 31, 'Melakukan proses penentuan UKT ', '2023-06-13 02:27:23', 'Mahasiswa'),
(339, NULL, 31, 'Melakukan edit proses penentuan UKT ', '2023-06-13 02:50:13', 'Mahasiswa'),
(340, NULL, 31, 'Melakukan edit proses penentuan UKT ', '2023-06-13 02:53:31', 'Mahasiswa'),
(341, NULL, 31, 'Mengirim data penentuan UKT ', '2023-06-13 03:14:58', 'Mahasiswa'),
(342, NULL, 1, 'Memberikan keputusan setuju penentuan UKT kepada Mahasiswa 6', '2023-06-13 03:15:44', 'Bagian Keuangan'),
(343, 8, NULL, 'Melakukan hapus mahasiswa dengan NIM 10107042', '2023-06-13 14:54:23', 'Akademik'),
(344, NULL, 34, 'Melakukan proses penentuan UKT ', '2023-06-13 15:22:54', 'Mahasiswa'),
(345, NULL, 34, 'Mengirim data penentuan UKT ', '2023-06-13 15:23:12', 'Mahasiswa'),
(346, NULL, 1, 'Memberikan keputusan setuju penentuan UKT kepada Mahasiswa 7', '2023-06-13 15:27:22', 'Bagian Keuangan'),
(347, 8, NULL, 'Melakukan tambah mahasiswa dengan NIM 10110001', '2023-06-14 13:16:01', 'Akademik'),
(348, 8, NULL, 'Melakukan tambah mahasiswa dengan NIM 10110002', '2023-06-14 13:18:39', 'Akademik'),
(349, 7, NULL, 'Memberi keputusan setuju data pengajuan penangguhan UKT Mahasiwa yang bernama Renaldi Noviandi', '2023-06-14 14:07:10', 'Kabag Umum & Akademik'),
(350, NULL, 37, 'Melakukan proses penentuan UKT ', '2023-06-14 14:09:27', 'Mahasiswa'),
(351, NULL, 37, 'Mengirim data penentuan UKT ', '2023-06-14 14:09:47', 'Mahasiswa'),
(352, NULL, 1, 'Memberikan keputusan setuju penentuan UKT kepada Mahasiswa 1', '2023-06-14 14:10:52', 'Bagian Keuangan'),
(353, NULL, 38, 'Melakukan proses penentuan UKT ', '2023-06-14 15:23:50', 'Mahasiswa'),
(354, NULL, 38, 'Melakukan edit proses penentuan UKT ', '2023-06-14 15:25:02', 'Mahasiswa'),
(355, NULL, 38, 'Mengirim data penentuan UKT ', '2023-06-14 15:26:03', 'Mahasiswa'),
(356, NULL, 37, 'Melakukan proses penentuan UKT ', '2023-06-16 10:52:39', 'Mahasiswa'),
(357, NULL, 37, 'Mengirim data penentuan UKT ', '2023-06-16 10:53:18', 'Mahasiswa'),
(358, NULL, 1, 'Memberikan keputusan setuju penentuan UKT kepada Mahasiswa 1', '2023-06-16 10:57:59', 'Bagian Keuangan'),
(359, NULL, 37, 'Melakukan proses penentuan UKT ', '2023-06-16 12:43:10', 'Mahasiswa'),
(360, NULL, 37, 'Mengirim data penentuan UKT ', '2023-06-16 12:43:53', 'Mahasiswa'),
(361, NULL, 1, 'Memberikan keputusan setuju penentuan UKT kepada Mahasiswa 1', '2023-06-16 12:45:39', 'Bagian Keuangan'),
(362, NULL, 37, 'Melakukan proses penentuan UKT ', '2023-06-16 16:38:01', 'Mahasiswa'),
(363, NULL, 37, 'Mengirim data penentuan UKT ', '2023-06-16 16:38:26', 'Mahasiswa'),
(364, NULL, 1, 'Memberikan keputusan setuju penentuan UKT kepada Mahasiswa 1', '2023-06-16 16:40:50', 'Bagian Keuangan'),
(365, NULL, 37, 'Melakukan proses penentuan UKT ', '2023-06-17 14:40:05', 'Mahasiswa'),
(366, NULL, 1, 'Memberikan keputusan setuju penentuan UKT kepada Mahasiswa 1', '2023-06-17 16:29:43', 'Bagian Keuangan'),
(367, 1, NULL, 'Memberi jadwal wawancara', '2023-06-17 16:45:47', 'Bagian Keuangan'),
(368, 8, NULL, 'Melakukan tambah mahasiswa dengan NIM 10110008', '2023-06-17 20:28:07', 'Akademik'),
(369, NULL, 37, 'Melakukan proses penentuan UKT ', '2023-06-18 12:39:31', 'Mahasiswa'),
(370, NULL, 37, 'Melakukan proses penentuan UKT ', '2023-06-18 14:50:26', 'Mahasiswa'),
(371, NULL, 37, 'Melakukan pengajuan penurunan UKT ', '2023-06-18 15:26:02', 'Mahasiswa'),
(372, NULL, 37, 'Melakukan proses penentuan UKT ', '2023-06-19 11:13:05', 'Mahasiswa'),
(373, NULL, 37, 'Melakukan proses penentuan UKT ', '2023-06-19 11:33:53', 'Mahasiswa'),
(374, NULL, 37, 'Melakukan edit proses penentuan UKT ', '2023-06-19 11:49:35', 'Mahasiswa'),
(375, NULL, 37, 'Mengirim data penentuan UKT ', '2023-06-19 11:49:57', 'Mahasiswa'),
(376, NULL, 1, 'Memberikan keputusan tidak setuju penentuan UKT kepada Mahasiswa 1', '2023-06-19 11:54:58', 'Bagian Keuangan'),
(377, NULL, 37, 'Mengulangi proses penentuan UKT ', '2023-06-19 11:55:50', 'Mahasiswa'),
(378, NULL, 37, 'Melakukan proses penentuan UKT ', '2023-06-19 11:56:41', 'Mahasiswa'),
(379, NULL, 37, 'Mengirim data penentuan UKT ', '2023-06-19 11:57:17', 'Mahasiswa'),
(380, NULL, 1, 'Memberikan keputusan setuju penentuan UKT kepada Mahasiswa 1', '2023-06-19 15:15:13', 'Bagian Keuangan'),
(381, NULL, 1, 'Memberikan keputusan setuju penentuan UKT kepada Mahasiswa 1', '2023-06-19 15:23:56', 'Bagian Keuangan'),
(382, NULL, 37, 'Melakukan edit profil', '2023-06-20 12:44:22', 'Mahasiswa'),
(383, NULL, 37, 'Melakukan edit profil', '2023-06-20 12:44:39', 'Mahasiswa'),
(384, NULL, 37, 'Melakukan pengajuan penangguhan UKT ', '2023-06-20 14:26:15', 'Mahasiswa'),
(385, NULL, 37, 'Melakukan pengajuan penurunan UKT ', '2023-06-21 19:26:56', 'Mahasiswa'),
(386, NULL, 37, 'Melakukan kirim pengajuan penurunan UKT Mahasiswa dengan NIM 10110001', '2023-06-21 19:27:11', 'Mahasiswa'),
(387, 1, NULL, 'Memberikan jadwal survey pengajuan penurunan UKT Mahasiswa 1', '2023-06-21 20:00:34', 'Bagian Keuangan'),
(388, 1, NULL, 'Memberikan keputusan setuju dan kirim data ke Kabag Umum & Akademik untuk pengajuan penurunan UKT Mahasiswa 1', '2023-06-21 20:00:52', 'Bagian Keuangan'),
(389, NULL, 40, 'Melakukan proses penentuan UKT ', '2023-06-27 19:32:28', 'Mahasiswa'),
(390, NULL, 40, 'Mengirim data penentuan UKT ', '2023-06-27 19:32:40', 'Mahasiswa'),
(391, 1, NULL, 'Memberikan keputusan setuju penentuan UKT kepada Mahasiswa 3', '2023-06-27 19:32:53', 'Bagian Keuangan'),
(392, NULL, 40, 'Melakukan pengajuan penangguhan UKT ', '2023-06-27 19:33:48', 'Mahasiswa'),
(393, NULL, 40, 'Melakukan kirim data pengajuan', '2023-06-27 19:54:11', 'Mahasiswa'),
(394, 1, NULL, 'Memberi jadwal wawancara', '2023-06-27 19:57:09', 'Bagian Keuangan'),
(395, 1, NULL, 'Memberi jadwal wawancara', '2023-06-27 19:57:56', 'Bagian Keuangan'),
(396, 1, NULL, 'Memberi keputusan setuju dan mengirim data pengajuan penangguhan UKT ke Kabag Umum & Akademik', '2023-06-27 20:09:19', 'Bagian Keuangan'),
(397, 7, NULL, 'Memberi keputusan tidak setuju untuk pengajuan penangguhan UKT dari Mahasiswa 3', '2023-06-27 20:19:08', 'Kabag Umum & Akademik'),
(398, 7, NULL, 'Memberi keputusan setuju data pengajuan penangguhan UKT Mahasiwa yang bernama Mahasiswa 3', '2023-06-27 20:21:40', 'Kabag Umum & Akademik');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `tahun_angkatan` varchar(5) DEFAULT NULL,
  `nomor_telepon` varchar(30) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` enum('Mahasiswa') DEFAULT 'Mahasiswa',
  `id_kelompok_ukt` int(11) DEFAULT NULL,
  `foto_user` text DEFAULT NULL,
  `status_pengajuan` enum('Tidak','Penangguhan','Penurunan','Penentuan') DEFAULT 'Tidak',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `prodi`, `tahun_angkatan`, `nomor_telepon`, `nim`, `email`, `password`, `status`, `id_kelompok_ukt`, `foto_user`, `status_pengajuan`, `created_at`, `updated_at`) VALUES
(37, 'Mahasiswa 1', 'D3 Sistem Informasi', '2023', '0895336928026', 10110001, 'renaldinoviandi9@gmail.com', '$2y$10$5LIKxuhlzbOSxgr1ZU6TS.XvurcsKLpiT0hWvHOf7E/RhkNRlfR9G', 'Mahasiswa', 13, '06202023054439Mahasiswa 1.png', 'Tidak', NULL, NULL),
(38, 'Mahasiswa 2', 'D3 Sistem Informasi', '2023', '0895336928026', 10110002, 'renaldinoviandi00@gmail.com', '$2y$10$R.tXZ37ZowPCxqbERQxiZ.4Zm5VbFAQcznXxJ7Bub5w3736RyAFfS', 'Mahasiswa', NULL, '06142023061838 Mahasiswa 2.png', 'Tidak', NULL, NULL),
(40, 'Mahasiswa 3', 'D3 Sistem Informasi', '2023', '0895336928026', 10110003, 'mahasiswa30@gmail.com', '$2y$10$R.tXZ37ZowPCxqbERQxiZ.4Zm5VbFAQcznXxJ7Bub5w3736RyAFfS', 'Mahasiswa', 11, NULL, 'Tidak', NULL, NULL);

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
(2, 4, 'Rp. 0 - Rp. 1.000.000', 1),
(6, 4, 'Rp. 1.000.001 - Rp. 2.000.000', 2),
(7, 4, 'Rp. 2.000.001 - Rp. 4.000.000', 3),
(8, 4, 'Rp. 4.000.001 - Rp. 6.000.000', 4),
(9, 4, 'Rp. 6.000.001 - Rp. 8.000.000', 5),
(10, 4, 'Rp. 8.000.001 - Rp. 10.000.000', 6),
(11, 4, 'Rp. 10.000.001 - Rp. 15.000.000', 7),
(12, 4, '>= Rp. 15.000.001', 8),
(15, 5, 'Kuli Pasar', 1),
(16, 5, 'Buruh Tani', 2),
(17, 5, 'Buruh Pabrik', 3),
(18, 5, 'Kuli Bangunan', 3),
(19, 5, 'Pegawai Negeri Sipil dengan golongan I atau II', 4),
(20, 5, 'Pegawai Negeri Sipil dengan golongan III atau IV yang sudah memperoleh Tukin/TPP/Tunjangan Profesi', 5),
(21, 5, 'Pegawai BUMN', 6),
(22, 5, 'Pejabat negara (maksimal setingkat kepala pemerintahan kabupaten atau kota)', 7),
(23, 5, 'Pejabat Negara (di atas tingkat kepala pemerintahan kabupaten atau kota)', 8),
(24, 15, '>=8', 1),
(25, 15, '7', 2),
(26, 15, '6', 3),
(27, 15, '5', 4),
(28, 15, '4', 5),
(29, 15, '3', 6),
(30, 15, '2', 7),
(31, 15, '1', 8);

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
  `status_penangguhan` enum('Setuju','Tidak Setuju','Proses di Bagian Keuangan','Belum Dikirim','Proses di Kepala Bagian') DEFAULT NULL,
  `tanggal_pengajuan` datetime DEFAULT NULL,
  `bagian_keuangan` varchar(30) DEFAULT NULL,
  `kabag` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penangguhan_ukt`
--

INSERT INTO `penangguhan_ukt` (`id_penangguhan_ukt`, `id_mahasiswa`, `nama_orang_tua`, `alamat_orang_tua`, `nomor_telepon_orang_tua`, `semester`, `nominal_ukt`, `denda`, `alasan`, `angsuran_pertama`, `angsuran_kedua`, `tanggal_angsuran_pertama`, `tanggal_angsuran_kedua`, `tanggal_wawancara`, `jam_wawancara`, `jenis_wawancara`, `link_wawancara`, `status_penangguhan`, `tanggal_pengajuan`, `bagian_keuangan`, `kabag`) VALUES
(10, 37, 'Nama Orang Tua', 'Subang', '08989897979', 3, 6000000, 300000, 'Alasan', 3150000, 3150000, '2023-07-07', '2023-07-07', NULL, NULL, 'Online', NULL, 'Proses di Bagian Keuangan', '2023-06-20 14:26:15', NULL, NULL),
(11, 40, 'Nama Orang Tua', 'Subang', '0898989898', 1, 3000000, 150000, 'Alasan', 1575000, 1575000, '2023-07-27', '2023-08-05', '2023-07-06', '19:57', 'Online', 'http://localhost:8000/kelola-penangguhan-ukt', 'Setuju', '2023-06-27 19:33:48', 'Bagian Keuangan Polsub', 'Kepala Bagian Umum Polsub');

-- --------------------------------------------------------

--
-- Table structure for table `penentuan_ukt`
--

CREATE TABLE `penentuan_ukt` (
  `id_penentuan_ukt` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `label_kriteria` text NOT NULL,
  `value_kriteria` text NOT NULL,
  `target_kriteria` text NOT NULL,
  `hasil_ukt` varchar(5) NOT NULL,
  `tanggal_penentuan` datetime DEFAULT NULL,
  `status_penentuan` enum('Proses','Setuju','Tidak Setuju','Belum Dikirim') DEFAULT NULL,
  `status_laporan` enum('Belum','Sudah') NOT NULL DEFAULT 'Belum',
  `slip_gaji` text DEFAULT NULL,
  `struk_listrik` text DEFAULT NULL,
  `struk_air` text DEFAULT NULL,
  `kk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penentuan_ukt`
--

INSERT INTO `penentuan_ukt` (`id_penentuan_ukt`, `id_mahasiswa`, `label_kriteria`, `value_kriteria`, `target_kriteria`, `hasil_ukt`, `tanggal_penentuan`, `status_penentuan`, `status_laporan`, `slip_gaji`, `struk_listrik`, `struk_air`, `kk`) VALUES
(20, 37, 'Pendapatan Orang Tua;Pekerjaan Orang Tua', 'Rp. 2.000.001 - Rp. 4.000.000;Buruh Pabrik', '3;3', '6', '2023-06-19 11:56:41', 'Proses', 'Sudah', '06192023115641 Slip Gaji Mahasiswa 1.pdf', '06192023115641 Struk Listrik Mahasiswa 1.pdf', '06192023115641 Struk Air Mahasiswa 1.pdf', '06192023115641 Kartu Keluarga Mahasiswa 1.pdf'),
(21, 40, 'Pendapatan Orang Tua;Pekerjaan Orang Tua', 'Rp. 2.000.001 - Rp. 4.000.000;Kuli Bangunan', '3;3', '3', '2023-06-27 19:32:28', 'Setuju', 'Belum', '06272023193227 Slip Gaji Mahasiswa 3.pdf', '06272023193227 Struk Listrik Mahasiswa 3.pdf', '06272023193227 Struk Air Mahasiswa 3.pdf', '06272023193227 Kartu Keluarga Mahasiswa 3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `penurunan_ukt`
--

CREATE TABLE `penurunan_ukt` (
  `id_penurunan_ukt` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `alamat_rumah` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `tanggal_survey` date DEFAULT NULL,
  `status_penurunan` enum('Belum Dikirim','Proses di Bagian Keuangan','Setuju','Tidak Setuju','Proses di Kepala Bagian') NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `surat_pengajuan` text DEFAULT NULL,
  `sktm` text DEFAULT NULL,
  `khs` text DEFAULT NULL,
  `struk_listrik` text DEFAULT NULL,
  `foto_rumah` text DEFAULT NULL,
  `slip_gaji` text DEFAULT NULL,
  `bagian_keuangan` varchar(30) DEFAULT NULL,
  `kabag` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penurunan_ukt`
--

INSERT INTO `penurunan_ukt` (`id_penurunan_ukt`, `id_mahasiswa`, `alamat_rumah`, `semester`, `tanggal_survey`, `status_penurunan`, `tanggal_pengajuan`, `surat_pengajuan`, `sktm`, `khs`, `struk_listrik`, `foto_rumah`, `slip_gaji`, `bagian_keuangan`, `kabag`) VALUES
(10, 37, 'Jl. Mayjen Sutoyo No.46, Karanganyar, Kec. Subang, Kab. Subang, Jawa Barat 41211', 4, '2023-07-08', 'Proses di Kepala Bagian', '2023-06-21 19:27:10', '06212023192656 Surat Pengajuan Mahasiswa 1.pdf', '06212023192656 SKTM Mahasiswa 1.pdf', '06212023192656 KHS Mahasiswa 1.pdf', '06212023192656 Struk Listrik Mahasiswa 1.pdf', '06212023192656 Foto Rumah Mahasiswa 1.pdf', '06212023192656 Slip Gaji Mahasiswa 1.pdf', 'Bagian Keuangan Polsub', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `batas_ukt_penangguhan` int(11) NOT NULL,
  `batas_ukt_penurunan` int(11) NOT NULL,
  `persen_denda` int(11) NOT NULL,
  `persen_angsuran_pertama` int(11) NOT NULL,
  `batas_tanggal_angsuran` int(11) NOT NULL,
  `form_penurunan_sktm` int(11) NOT NULL,
  `form_penurunan_khs` int(11) NOT NULL,
  `form_penurunan_struk_listrik` int(11) NOT NULL,
  `form_penurunan_slip_gaji` int(11) NOT NULL,
  `form_penurunan_foto_rumah` int(11) NOT NULL,
  `form_penurunan_surat_pengajuan` int(11) NOT NULL,
  `tanda_tangan_kabag` text DEFAULT NULL,
  `form_penentuan_slip_gaji` int(11) NOT NULL,
  `form_penentuan_struk_listrik` int(11) NOT NULL,
  `form_penentuan_struk_air` int(11) NOT NULL,
  `form_penentuan_kk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `batas_ukt_penangguhan`, `batas_ukt_penurunan`, `persen_denda`, `persen_angsuran_pertama`, `batas_tanggal_angsuran`, `form_penurunan_sktm`, `form_penurunan_khs`, `form_penurunan_struk_listrik`, `form_penurunan_slip_gaji`, `form_penurunan_foto_rumah`, `form_penurunan_surat_pengajuan`, `tanda_tangan_kabag`, `form_penentuan_slip_gaji`, `form_penentuan_struk_listrik`, `form_penentuan_struk_air`, `form_penentuan_kk`) VALUES
(1, 2, 2, 5, 50, 60, 1, 1, 1, 1, 1, 1, ' Tanda Tangan Kepala Bagian.png', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(30) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` enum('Bagian Keuangan','Kabag Umum & Akademik','Akademik') NOT NULL,
  `foto_user` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `nomor_telepon`, `nik`, `password`, `status`, `foto_user`) VALUES
(1, 'Bagian Keuangan Polsub', 'renaldinoviandi0@gmail.com', '0895336928026', '11111111', '$2y$10$sIgZRbYhk3OmrUSTZBJyH.qMkghMa7bdaAFwODNfSCZ8OIfsB4cZi', 'Bagian Keuangan', '06092023181650 Bagian Keuangan Polsub.png'),
(7, 'Kepala Bagian Umum Polsub', 'kabagumum@gmail.com', '0895336928026', '22222222', '$2y$10$Mi7m2zB8AeozsKahryXjjOAv02twIJSnZ1yTBj1XcTWplf2t8mhcW', 'Kabag Umum & Akademik', '06092023183206 Kepala Bagian Umum Polsub.png'),
(8, 'Akademik Polsub', 'akademik@gmail.com', '0895336928026', '33333333', '$2y$10$YD65weMRRPxSaNpz.UWNJ.KCc4I4ovIyk4R4imWD914o9COvvqNwe', 'Akademik', '06052023124138 Akademik.png');

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
-- Indexes for table `penentuan_ukt`
--
ALTER TABLE `penentuan_ukt`
  ADD PRIMARY KEY (`id_penentuan_ukt`);

--
-- Indexes for table `penurunan_ukt`
--
ALTER TABLE `penurunan_ukt`
  ADD PRIMARY KEY (`id_penurunan_ukt`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

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
  MODIFY `id_kelompok_ukt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilai_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `penangguhan_ukt`
--
ALTER TABLE `penangguhan_ukt`
  MODIFY `id_penangguhan_ukt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penentuan_ukt`
--
ALTER TABLE `penentuan_ukt`
  MODIFY `id_penentuan_ukt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `penurunan_ukt`
--
ALTER TABLE `penurunan_ukt`
  MODIFY `id_penurunan_ukt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
