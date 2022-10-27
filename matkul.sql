-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 05:28 AM
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
  `id_matkul` varchar(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sks` int(3) NOT NULL,
  `status_matkul` enum('T','P') NOT NULL,
  `level_matkul` varchar(12) NOT NULL,
  `nik_dosen` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama`, `sks`, `status_matkul`, `level_matkul`, `nik_dosen`) VALUES
('IF2010', 'DESAIN INTERAKSI', 2, 'T', '1', '09977665414'),
('IF2011', 'PEMOGRAMAN ', 1, 'P', '1', '098768899557'),
('IF2019', 'KALKULUS', 1, 'P', '2', '09977665411'),
('IF2020', 'GAME MASTER', 3, 'T', '5', '0997766543'),
('IF2021', 'DASAR PEMOGRAMAN', 3, 'T', '5', '093456677');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
