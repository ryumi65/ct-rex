-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2022 at 04:01 AM
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
  `nidn_dosen` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_dosen` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kerja` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `email`, `no_hp`, `kewarganegaraan`, `agama`, `alamat`, `id_prodi`, `nidn_dosen`, `status_dosen`, `status_kerja`) VALUES
('09977665414', 'Lutfi', 'l', 'Bandung', '2022-10-29', 'Lutfi@gmail.com', '1329371529382', 'wni', 'Islam', 'kota bandung', 'IF', '019283748273928374', 'aktif', 'dosen kontrak'),
('1029384756192837', 'Aiman Muhammad', 'l', 'Bandung', '2022-10-12', 'aiman@gmail.com', '1426384950192', 'wni', 'Islam', 'sumarecon nomor 3 bandung', 'IF', '019283747475738291', 'cuti', 'dosen pns'),
('1029573418362937', 'Raesandra', 'p', 'Bandung', '2022-10-23', 'Raesandra@gmail.com', '1010101010101', 'wni', 'Islam', 'kabupaten bandung', 'IF', '098765432123456890', 'tugas di instansi lain', 'dosen ptn'),
('1726394826374618', 'Reza', 'l', 'Bandung', '2022-10-02', 'Reza@gmail.com', '2345123456743', 'wni', 'Islam', 'bandung city', 'IF', '123456789009876543', 'pensiun', 'dosen tetap'),
('4253627381927364', 'Renal', 'l', 'Bandung', '2022-10-05', 'Renal@gmail.com', '1234567890987', 'wni', 'Islam', 'komplek bandung', 'IF', '345678900987654321', 'pensiun', 'dosen tetap');

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
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_matkul` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_waktu` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_matkul`, `id_waktu`) VALUES
('L2L108IF2020', 'IF2020', 'L2L108');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `nim` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jadwal` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`nim`, `id_jadwal`, `nilai`) VALUES
('200102083', 'L2L108IF2020', NULL),
('200102083', 'L2L108IF2020', NULL);

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
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_inggris` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int(1) NOT NULL,
  `sks_praktikum` int(1) NOT NULL,
  `nik_dosen` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_semester` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama`, `nama_inggris`, `jenis`, `sks`, `sks_praktikum`, `nik_dosen`, `id_prodi`, `id_semester`) VALUES
('FR2012', 'OBAT TRADISIONAL', 'TRADITIONAL DRUGS', 'WAJIB PRODI', 3, 1, '09977665414', 'FA', '20211'),
('IF2020', 'AHLI PERMAINAN', 'GAME MASTER', 'IF2020', 3, 1, '1726394826374618', 'IF', '20211'),
('IK2012', 'WAWANCARA', 'TALKING', 'WAJIB PRODI', 3, 1, '09977665414', 'IK', '20211');

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `nim` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ayah` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `pendidikan_ayah` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ayah` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ibu` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `pendidikan_ibu` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ibu` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_wali` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_wali` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_wali` date DEFAULT NULL,
  `pendidikan_wali` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_wali` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_wali` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`nim`, `nik_ayah`, `nama_ayah`, `tanggal_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nik_ibu`, `nama_ibu`, `tanggal_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `nik_wali`, `nama_wali`, `tanggal_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`) VALUES
('200102009', NULL, NULL, NULL, NULL, NULL, NULL, '8100462781', 'Yanti Suryati', '1982-09-21', 'SMA', 'Ibu rumah tangga', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('200102083', '7380185637', 'Ujang Sentosa', '1979-11-13', 'SMA', 'Wiraswasta', '5000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama`, `nomor`, `jenis`, `kapasitas`, `lantai`) VALUES
('K6L4', 'Kelas Informatika', '6', 'kelas', '30', '4'),
('L2L1', 'Lab Informatika', '2', 'laboratorium', '40', '1');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `nama`, `tahun_ajaran`) VALUES
('20202', 'genap', '2020'),
('20211', 'ganjil', '2021'),
('20212', 'genap', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `id_waktu` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pukul` time NOT NULL,
  `id_ruangan` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`id_waktu`, `pukul`, `id_ruangan`) VALUES
('K6L408', '08:00:00', 'K6L4'),
('K6L410', '10:00:00', 'K6L4'),
('L2L108', '08:00:00', 'L2L1');

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
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_id_matkul` (`id_matkul`),
  ADD KEY `fk_id_waktu` (`id_waktu`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD KEY `fk_nim` (`nim`),
  ADD KEY `fk_id_jadwal` (`id_jadwal`);

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
  ADD KEY `fk_id_dosen` (`id_prodi`),
  ADD KEY `fk_id_semester` (`id_semester`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `fk_id_fakultas` (`id_fakultas`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id_waktu`),
  ADD KEY `fk_id_ruangan` (`id_ruangan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `test` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_id_matkul` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`),
  ADD CONSTRAINT `fk_id_waktu` FOREIGN KEY (`id_waktu`) REFERENCES `waktu` (`id_waktu`);

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `fk_id_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `fk_nim` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

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
  ADD CONSTRAINT `fk_id_semester` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`),
  ADD CONSTRAINT `fk_nik_dosen` FOREIGN KEY (`nik_dosen`) REFERENCES `dosen` (`nik`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `fk_id_fakultas` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Constraints for table `waktu`
--
ALTER TABLE `waktu`
  ADD CONSTRAINT `fk_id_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
