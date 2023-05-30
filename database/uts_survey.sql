-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 02:15 PM
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
-- Database: `uts_survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jawaban`
--

CREATE TABLE `data_jawaban` (
  `ID_JAWABAN` int(11) NOT NULL,
  `ID_SURVEY` int(11) NOT NULL,
  `ID_PERTANYAAN` int(11) NOT NULL,
  `JAWABAN` enum('Sangat Jelek','Jelek','Netral','Bagus','Sangat Bagus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_jawaban`
--

INSERT INTO `data_jawaban` (`ID_JAWABAN`, `ID_SURVEY`, `ID_PERTANYAAN`, `JAWABAN`) VALUES
(1, 1, 1, 'Sangat Bagus'),
(2, 2, 2, 'Bagus'),
(3, 3, 3, 'Netral');

-- --------------------------------------------------------

--
-- Table structure for table `data_pertanyaan`
--

CREATE TABLE `data_pertanyaan` (
  `ID_PERTANYAAN` int(11) NOT NULL,
  `ID_SURVEY` int(11) NOT NULL,
  `PERTANYAAN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pertanyaan`
--

INSERT INTO `data_pertanyaan` (`ID_PERTANYAAN`, `ID_SURVEY`, `PERTANYAAN`) VALUES
(1, 1, 'apakah one pis anime bagus?'),
(2, 2, 'apakah anime ini bagus?'),
(3, 3, 'Apakah anime bleach bagus?');

-- --------------------------------------------------------

--
-- Table structure for table `data_survey`
--

CREATE TABLE `data_survey` (
  `ID_SURVEY` int(11) NOT NULL,
  `JUDUL_SURVEY` varchar(100) NOT NULL,
  `TANGGAL_PEMBUATAN` varchar(20) NOT NULL,
  `TIPE_HIBURAN` varchar(20) NOT NULL,
  `DESKRIPSI` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_survey`
--

INSERT INTO `data_survey` (`ID_SURVEY`, `JUDUL_SURVEY`, `TANGGAL_PEMBUATAN`, `TIPE_HIBURAN`, `DESKRIPSI`) VALUES
(1, 'One Piece', '2023-05-30', 'anime', 'anime dengan 1000 episode'),
(2, 'Naruto', '2023-05-30', 'anime', 'anime tentang pak kades konoha'),
(3, 'Bleach', '2023-05-30', 'anime', 'Anime tentang per dukunan');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jawaban`
--
ALTER TABLE `data_jawaban`
  ADD PRIMARY KEY (`ID_JAWABAN`),
  ADD UNIQUE KEY `ID_SURVEY` (`ID_SURVEY`),
  ADD UNIQUE KEY `ID_PERTANYAAN` (`ID_PERTANYAAN`);

--
-- Indexes for table `data_pertanyaan`
--
ALTER TABLE `data_pertanyaan`
  ADD PRIMARY KEY (`ID_PERTANYAAN`),
  ADD UNIQUE KEY `ID_SURVEY` (`ID_SURVEY`);

--
-- Indexes for table `data_survey`
--
ALTER TABLE `data_survey`
  ADD PRIMARY KEY (`ID_SURVEY`);

--
-- Indexes for table `komik`
--
ALTER TABLE `komik`
  ADD PRIMARY KEY (`id_komik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jawaban`
--
ALTER TABLE `data_jawaban`
  MODIFY `ID_JAWABAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_pertanyaan`
--
ALTER TABLE `data_pertanyaan`
  MODIFY `ID_PERTANYAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_survey`
--
ALTER TABLE `data_survey`
  MODIFY `ID_SURVEY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komik`
--
ALTER TABLE `komik`
  MODIFY `id_komik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
