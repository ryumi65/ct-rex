-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 11:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct-rex`
--

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `program_studi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_matkul` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matkul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matkul_inggris` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_matkul` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int(1) NOT NULL,
  `sks_praktikum` int(1) NOT NULL,
  `nik_dosen` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`program_studi`, `id_matkul`, `nama_matkul`, `nama_matkul_inggris`, `jenis_matkul`, `sks`, `sks_praktikum`, `nik_dosen`) VALUES
('FARMASI', 'FR2012', 'OBAT TRADISIONAL', 'TRADITIONAL DRUGS', 'WAJIB PRODI', 3, 1, '09977665414'),
('informatika', 'IF2020', 'GAME MASTER', 'permainan', 'IF2020', 3, 0, '1726394826374618'),
('ILMU KOMUNIKASI', 'IK2012', 'WAWANCARA', 'TALKING', 'WAJIB PRODI', 3, 1, '09977665414');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `fk_nik_dosen` (`nik_dosen`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `fk_nik_dosen` FOREIGN KEY (`nik_dosen`) REFERENCES `dosen` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
