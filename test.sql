-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 01:01 PM
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
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `nama`, `level`) VALUES
(25, 'admin', 'admin', 'admin', 'admin'),
(30, '22106050046', 'yusrina', 'YUSRINA MASTURA', 'admin'),
(31, '22106050083', 'darban', 'DARBAN MAHA MURSYIDI', 'admin'),
(32, '22106050085', 'akrimna', 'AKRIMNA FAHMA', 'admin'),
(34, 'mahasiswa', 'mahasiswa', 'Mahasiswa', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(9, 'Darban Maha Mursyidi', 'HMPS', 'Adab dan Ilmu Budaya', 'Rapat Bulanan', 'Co-Working Space A', '2025-01-02', '19:05:00', '00:00:00'),
(10, 'Fakhri Arrouf', 'HMPS', 'Adab dan Ilmu Budaya', 'Mungkid', 'Co-Working Space A', '2024-12-02', '04:02:00', '06:06:00'),
(11, 'Darban Maha Mursyidi', 'Umum', 'Sains dan Teknologi', 'Belajar kelompok', 'Co-Working Space D', '2024-12-02', '11:16:00', '18:16:00'),
(14, 'YUSRINA MASTURA', 'Umum', 'Sains dan Teknologi', 'Belajar kelompok', 'Co-Working Space Timur', '2024-12-25', '00:00:00', '20:10:00'),
(16, 'Fakhri Arrouf', 'HMPS', 'Ushuluddin dan Pemikiran Islam', 'Rapat Bulanan', 'Co-Working Space C', '2024-12-25', '08:00:00', '10:45:00'),
(17, 'AKRIMNA FAHMA', 'iNFORMATIKA', 'Sains dan Teknologi', 'Pembahasan sportif', 'Co-Working Space C', '2024-12-25', '00:00:00', '13:00:00'),
(18, 'AKRIMNA FAHMA', 'INFORMATIKA', 'Sains dan Teknologi', 'Pengajuan Pemberian Penghargaan Prestasi Mahasiswa UIN Sunan Kalijaga 2024', 'Co-Working Space E', '2024-12-23', '15:00:00', '18:00:00'),
(19, 'Darban Maha Mursyidi', 'Umum', 'Sains dan Teknologi', 'Belajar kelompok', 'Co-Working Space F', '2024-12-31', '15:27:00', '19:30:00'),
(20, 'Darban Maha Mursyidi', 'HMPS', 'Ilmu Sosial dan Humaniora', 'Rapat Bulanan', 'Co-Working Space Timur', '2024-12-28', '15:50:00', '23:50:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
