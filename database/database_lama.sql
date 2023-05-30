-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 11:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter4`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_survey`
--

CREATE TABLE `data_survey` (
  `ID_SISWA` int(6) NOT NULL,
  `JUDUL_SURVEY` varchar(100) NOT NULL,
  `TANGGAL_PEMBUATAN` varchar(20) NOT NULL,
  `TIPE_HIBURAN` varchar(20) NOT NULL,
  `DESKRIPSI` text NOT NULL,
  `PERTANYAAN` varchar(255) NOT NULL,
  `JAWABAN` enum('Sangat Jelek','Jelek','Netral','Bagus','Sangat Bagus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_survey`
--

INSERT INTO `data_survey` (`ID_SISWA`, `JUDUL_SURVEY`, `TANGGAL_PEMBUATAN`, `TIPE_HIBURAN`, `DESKRIPSI`, `PERTANYAAN`, `JAWABAN`) VALUES
(1, 'One Piece Bagus?', '2023-05-28', 'anime', 'anime dengan 1000 episode lebih', 'bagus nga?', 'Sangat Bagus'),
(2, 'Naruto anime bagus?', '2023-05-28', 'anime', 'Mberr', 'apik ra?', 'Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `komik`
--

CREATE TABLE `komik` (
  `id_komik` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `sampul` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komik`
--

INSERT INTO `komik` (`id_komik`, `judul`, `slug`, `penulis`, `penerbit`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'Hunter x Hunter', 'hunterxhunter', 'Togashi', 'Weekly Shonen Jump', 'Hunter x Hunter.jpeg', NULL, NULL),
(2, 'One Piece', 'one-piece', 'Eichiro Oda', 'Weekly Shonen Jump', 'One Piece.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pertanyaan`
--

CREATE TABLE `tabel_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_survey` int(11) DEFAULT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL,
  `tipe_pertanyaan` enum('skala_likert','jawaban_pendek') DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_responden`
--

CREATE TABLE `tabel_responden` (
  `id_responden` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_survey`
--

CREATE TABLE `tabel_survey` (
  `id_survey` int(11) NOT NULL,
  `judul_survey` varchar(150) NOT NULL,
  `deskripsi` varchar(350) DEFAULT NULL,
  `tanggal_dibuat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_survey`
--
ALTER TABLE `data_survey`
  ADD PRIMARY KEY (`ID_SISWA`);

--
-- Indexes for table `komik`
--
ALTER TABLE `komik`
  ADD PRIMARY KEY (`id_komik`);

--
-- Indexes for table `tabel_pertanyaan`
--
ALTER TABLE `tabel_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `tabel_responden`
--
ALTER TABLE `tabel_responden`
  ADD PRIMARY KEY (`id_responden`);

--
-- Indexes for table `tabel_survey`
--
ALTER TABLE `tabel_survey`
  ADD PRIMARY KEY (`id_survey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_survey`
--
ALTER TABLE `data_survey`
  MODIFY `ID_SISWA` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komik`
--
ALTER TABLE `komik`
  MODIFY `id_komik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_pertanyaan`
--
ALTER TABLE `tabel_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_responden`
--
ALTER TABLE `tabel_responden`
  MODIFY `id_responden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_survey`
--
ALTER TABLE `tabel_survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
