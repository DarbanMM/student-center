-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 11:25 AM
-- Server version: 11.5.2-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `nama`, `level`) VALUES
('admin', 'admin', 'admin', 'admin'),
('akrimna', 'akrimna', 'AKRIMNA FAHMA', 'admin'),
('darban', 'darban', 'DARBAN MAHA MURSYIDI', 'admin'),
('mahasiswa', 'mahasiswa', 'Mahasiswa', 'mahasiswa'),
('user', 'user', 'usercoba', 'mahasiswa'),
('yusrina', 'yusrina', 'YUSRINA MASTURA', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `fakultas` varchar(35) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `ruang` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `waktu_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `nama`, `asal`, `fakultas`, `keperluan`, `ruang`, `tanggal`, `waktu`, `waktu_selesai`) VALUES
(22, 'Mahasiswa', 'Umum', 'Adab dan Ilmu Budaya', 'Belajar kelompok', 'Co-Working Space A', '2025-01-02', '18:20:00', '19:18:00'),
(24, 'Mahasiswa', 'HMPS', 'Adab dan Ilmu Budaya', 'Rapat Bulanan', 'Co-Working Space A', '2025-06-09', '16:00:00', '16:30:00'),
(25, 'Mahasiswa', 'hmps', 'Adab dan Ilmu Budaya', 'Belajar kelompok', 'Co-Working Space A', '2025-06-09', '16:30:00', '17:00:00'),
(26, 'Mahasiswa', 'Umum', 'Dakwah dan Komunikasi', 'Pengajuan Pemberian Penghargaan Prestasi Mahasiswa UIN Sunan Kalijaga 2024', 'Co-Working Space B', '2025-06-09', '16:00:00', '16:30:00'),
(27, 'Mahasiswa', 'INFORMATIKA', 'Dakwah dan Komunikasi', 'Diskusi pembuatan aplikasi untuk SC', 'Co-Working Space B', '2025-06-09', '17:00:00', '17:30:00'),
(28, 'Mahasiswa', 'HMPS', 'Syari\'ah dan Hukum', 'makan', 'Co-Working Space B', '2025-06-10', '18:02:00', '20:02:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
