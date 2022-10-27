-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2022 at 08:56 AM
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
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('p','l') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` enum('wni','wna') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `email`, `no_hp`, `kewarganegaraan`, `agama`, `alamat`, `id_prodi`) VALUES
('09977665414', 'Lutfi', 'l', 'Bandung', '2022-10-29', 'Lutfi@gmail.com', '1329371529382', 'wni', 'Islam', 'kota bandung', 'IF'),
('1029384756192837', 'Aiman Muhammad', 'l', 'Bandung', '2022-10-12', 'aiman@gmail.com', '1426384950192', 'wni', 'Islam', 'sumarecon nomor 3 bandung', 'IF'),
('1029573418362937', 'Raesandra', 'p', 'Bandung', '2022-10-23', 'Raesandra@gmail.com', '1010101010101', 'wni', 'Islam', 'kabupaten bandung', 'IF'),
('1726394826374618', 'Reza', 'l', 'Bandung', '2022-10-02', 'Reza@gmail.com', '2345123456743', 'wni', 'Islam', 'bandung city', 'IF'),
('4253627381927364', 'Renal', 'l', 'Bandung', '2022-10-05', 'Renal@gmail.com', '1234567890987', 'wni', 'Islam', 'komplek bandung', 'IF');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama`) VALUES
('FAI', 'Fakultas Agama Islam'),
('FEB', 'Fakultas Ekonomi dan Bisnis'),
('FSH', 'Fakultas Sosial dan Humaniora'),
('FST', 'Fakultas Sains dan Teknologi');

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
  `id_prodi` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int(3) NOT NULL,
  `status_matkul` enum('T','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_matkul` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_dosen` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama`, `sks`, `status_matkul`, `level_matkul`, `nik_dosen`) VALUES
('IF2010', 'DESAIN INTERAKSI', 2, 'T', '1', '09977665414'),
('IF2011', 'PEMOGRAMAN ', 1, 'P', '1', '1029384756192837'),
('IF2019', 'KALKULUS', 1, 'P', '2', '1029573418362937'),
('IF2020', 'GAME MASTER', 3, 'T', '5', '1726394826374618'),
('IF2021', 'DASAR PEMOGRAMAN', 3, 'T', '5', '4253627381927364');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fakultas` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `Nama`, `id_fakultas`) VALUES
('AKS', 'Akuntansi', 'FEB'),
('BT', 'Bioteknologi', 'FST'),
('ES', 'Ekonomi Syariah', 'FAI'),
('FA', 'Farmasi', 'FST'),
('IF', 'Informatika', 'FST'),
('IK', 'Ilmu Komunikasi', 'FSH'),
('MNJ', 'Manajemen', 'FEB'),
('TE', 'Teknik Elektro', 'FST'),
('TI', 'Teknik Industri', 'FST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `fk_id_prodi` (`id_prodi`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `fk_nik_dosen` (`nik_dosen`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `fk_id_fakultas` (`id_fakultas`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_id_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `fk_nik_dosen` FOREIGN KEY (`nik_dosen`) REFERENCES `dosen` (`nik`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `fk_id_fakultas` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
