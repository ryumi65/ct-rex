-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2022 at 06:49 AM
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
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','n') COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `status`, `level`) VALUES
('09977665414', 'Dosen', '123', 'y', 3),
('200102083', 'Mahasiswa Reza', '124', 'y', 4),
('FST', 'Fakultas Sains dan Teknologi', '121', 'y', 1),
('IF', 'Prodi Informatika', '122', 'y', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('l','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` enum('wni','wna') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_dosen` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_dosen` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn_dosen` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_dosen` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kerja` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `email`, `no_hp`, `kewarganegaraan`, `agama`, `alamat`, `id_prodi`, `kode_dosen`, `password_dosen`, `nidn_dosen`, `status_dosen`, `status_kerja`) VALUES
('09977665414', 'Lutfi', 'l', 'Bandung', '2022-10-29', 'Lutfi@gmail.com', '1329371529382', 'wni', 'Islam', 'kota bandung', 'IF', '12345678', 'iniinininin', '019283748273928374', 'aktif', 'dosen kontrak'),
('1029384756192837', 'Aiman Muhammad', 'l', 'Bandung', '2022-10-12', 'aiman@gmail.com', '1426384950192', 'wni', 'Islam', 'sumarecon nomor 3 bandung', 'IF', '87654321', 'cvjaknl', '019283747475738291', 'cuti', 'dosen pns'),
('1029573418362937', 'Raesandra', 'p', 'Bandung', '2022-10-23', 'Raesandra@gmail.com', '1010101010101', 'wni', 'Islam', 'kabupaten bandung', 'IF', '09876543', 'uhuy', '098765432123456890', 'tugas di instansi lain', 'dosen ptn'),
('1726394826374618', 'Reza', 'l', 'Bandung', '2022-10-02', 'Reza@gmail.com', '2345123456743', 'wni', 'Islam', 'bandung city', 'IF', '13579086', 'lalalal', '123456789009876543', 'pensiun', 'dosen tetap'),
('4253627381927364', 'Renal', 'l', 'Bandung', '2022-10-05', 'Renal@gmail.com', '1234567890987', 'wni', 'Islam', 'komplek bandung', 'IF', '67890123', 'yaya', '345678900987654321', 'pensiun', 'dosen tetap');

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
  `jenis_kelamin` enum('l','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tahun_angkatan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kewarganegaraan` enum('wni','wna') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
('200102009', 'Raessandra Putri Mayendra', 'p', 'Jakarta', '2002-06-12', '2020', 'sndra@gmail.com', '081234567890', 'wni', 'Islam', '1387984765198347', 'Jalan jalan', 'Aaaa', 'Bbbb', 'Cccc', 'Dddd', '40000', 'IF'),
('200102011', 'Renal Sukma Widiarsa', 'l', 'Bandung', '2001-01-25', '2020', 'renal@gmail.com', '081234567890', 'wni', 'Islam', '7592509183746122', 'Jalan Buah', 'Aaaa', 'Bbbb', 'Cccc', 'Dddd', '42000', 'IF'),
('200102021', 'Aiman Muhammad Awwaluddin', 'l', 'Bandung', '2000-08-13', '2020', 'aiman@gmail.com', '081234567890', 'wni', 'Islam', '0812487056742918', 'Jalan Batu', 'Aaaa', 'Bbbb', 'Cccc', 'Dddd', '43000', 'IF'),
('200102075', 'Luthfi Arief Ardiansyah', 'l', 'Bandung', '2000-08-19', '2020', 'luthfi@gmail.com', '081234567890', 'wni', 'Islam', '8296036271068463', 'Jalan sekawan', 'Aaaa', 'Bbbb', 'Cccc', 'Dddd', '44000', 'IF'),
('200102083', 'Muhamad Reza Putra Aditya', 'l', 'Bandung', '2002-02-09', '2020', 'mrezaputraa@gmail.com', '081234567890', 'wni', 'Islam', '9845728652948801', 'Jalan Manggis', 'Aaaa', 'Bbbb', 'Cccc', 'Dddd', '41000', 'IF');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matkul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matkul_inggris` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_matkul` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int(1) NOT NULL,
  `sks_praktikum` int(1) NOT NULL,
  `nik_dosen` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama_matkul`, `nama_matkul_inggris`, `jenis_matkul`, `sks`, `sks_praktikum`, `nik_dosen`, `id_prodi`) VALUES
('FR2012', 'OBAT TRADISIONAL', 'TRADITIONAL DRUGS', 'WAJIB PRODI', 3, 1, '09977665414', 'FA'),
('IF2020', 'AHLI PERMAINAN', 'GAME MASTER', 'IF2020', 3, 1, '1726394826374618', 'IF'),
('IK2012', 'WAWANCARA', 'TALKING', 'WAJIB PRODI', 3, 1, '09977665414', 'IK');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fakultas` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama`, `id_fakultas`) VALUES
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
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `fk_id_dosen` (`id_prodi`) USING BTREE;

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
  ADD KEY `fk_nik_dosen` (`nik_dosen`),
  ADD KEY `fk_id_dosen` (`id_prodi`);

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
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `test` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_id_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `fk_id_dosen` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
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
