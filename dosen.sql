-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2022 at 11:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

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
('1029573418362937', 'Raesandra', 'l', 'Bandung', '2022-10-23', 'Raesandra@gmail.com', '1010101010101', 'wni', 'Islam', 'kabupaten bandung', 'IF', '09876543', 'uhuy', '098765432123456890', 'tugas di instansi lain', 'dosen ptn'),
('1726394826374618', 'Reza', 'l', 'Bandung', '2022-10-02', 'Reza@gmail.com', '2345123456743', 'wni', 'Islam', 'bandung city', 'IF', '13579086', 'lalalal', '123456789009876543', 'pensiun', 'dosen tetap'),
('4253627381927364', 'Renal', 'l', 'Bandung', '2022-10-05', 'Renal@gmail.com', '1234567890987', 'wni', 'Islam', 'komplek bandung', 'IF', '67890123', 'yaya', '345678900987654321', 'pensiun', 'dosen tetap');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `fk_id_dosen` (`id_prodi`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `test` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
