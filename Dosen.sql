-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2022 at 05:27 AM
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
-- Table structure for table `Dosen`
--

CREATE TABLE `Dosen` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('p','l') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `kewarganegaraan` enum('wni','wna') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Dosen`
--

INSERT INTO `Dosen` (`nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `email`, `no_hp`, `kewarganegaraan`, `agama`, `alamat`) VALUES
('0987654321256942', 'Lutfi', 'l', 'Bandung', '2022-10-29', 'Lutfi@gmail.com', '1329371529382', 'wni', 'Islam', 'kota bandung'),
('1029384756192837', 'Aiman Muhammad', 'l', 'Bandung', '2022-10-12', 'aiman@gmail.com', '1426384950192', 'wni', 'Islam', 'sumarecon nomor 3 bandung'),
('1029573418362937', 'Raesandra', 'p', 'Bandung', '2022-10-23', 'Raesandra@gmail.com', '1010101010101', 'wni', 'Islam', 'kabupaten bandung'),
('1726394826374618', 'Reza', 'l', 'Bandung', '2022-10-02', 'Reza@gmail.com', '2345123456743', 'wni', 'Islam', 'bandung city'),
('4253627381927364', 'Renal', 'l', 'Bandung', '2022-10-05', 'Renal@gmail.com', '1234567890987', 'wni', 'Islam', 'komplek bandung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Dosen`
--
ALTER TABLE `Dosen`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
