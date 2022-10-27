-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2022 at 05:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('P','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tahun_angkatan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kewarganegaraan` enum('WNI','WNA') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_prodi` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tahun_angkatan`, `email`, `no_hp`, `kewarganegaraan`, `agama`, `nik`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `id_prodi`) VALUES
('200102009', 'Raessandra Putri Mayendra', 'P', 'Jakarta', '2002-06-12', '2020', 'sndra@gmail.com', '081234567890', 'WNI', 'Islam', '1387984765198347', 'Jalan jalan', 'Aaaa', 'Bbbb', 'Cccc', 'Dddd', '40000', 'IF'),
('200102011', 'Renal Sukma Widiarsa', 'L', 'Bandung', '2001-01-25', '2020', 'renal@gmail.com', '081234567890', 'WNI', 'Islam', '7592509183746122', 'Jalan Buah', 'Aaaa', 'Bbbb', 'Cccc', 'Dddd', '42000', 'IF'),
('200102021', 'Aiman Muhammad Awwaluddin', 'L', 'Bandung', '2000-08-13', '2020', 'aiman@gmail.com', '081234567890', 'WNI', 'Islam', '0812487056742918', 'Jalan Batu', 'Aaaa', 'Bbbb', 'Cccc', 'Dddd', '43000', 'IF'),
('200102075', 'Luthfi Arief Ardiansyah', 'L', 'Bandung', '2000-08-19', '2020', 'luthfi@gmail.com', '081234567890', 'WNI', 'Islam', '8296036271068463', 'Jalan sekawan', 'Aaaa', 'Bbbb', 'Cccc', 'Dddd', '44000', 'IF'),
('200102083', 'Muhamad Reza Putra Aditya', 'L', 'Bandung', '2002-02-09', '2020', 'mrezaputraa@gmail.com', '081234567890', 'WNI', 'Islam', '9845728652948801', 'Jalan Manggis', 'Aaaa', 'Bbbb', 'Cccc', 'Dddd', '41000', 'IF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
