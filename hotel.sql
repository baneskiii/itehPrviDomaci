-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 12:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'bane', 'bane'),
(3, 'luka', 'luka');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `rezervacijaID` int(11) NOT NULL,
  `imeGosta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datumOd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `datumDo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `brojSobe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`rezervacijaID`, `imeGosta`, `datumOd`, `datumDo`, `brojSobe`) VALUES
(1, 'Milovan Glisic', '15.12.2022.', '17.12.2022.', 1),
(2, 'Ivan Ivanovic', '31.12.2022.', '10.01.2023.', 2),
(3, 'Jovana Jovanovic', '10.12.2022.', '15.12.2022.', 3),
(4, 'Sima Simic', '14.12.2022.', '16.12.2022.', 3),
(5, 'Zika Zikic', '16.10.2022.', '18.10.2022.', 3),
(6, 'Mira Miric', '20.10.2022.', '02.01.2023.', 4),
(7, 'Ivana Ivic', '20.10.2022.', '02.01.2023.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `soba`
--

CREATE TABLE `soba` (
  `sobaID` int(11) NOT NULL,
  `sprat` int(11) NOT NULL,
  `povrsina` int(11) NOT NULL,
  `brojKreveta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `soba`
--

INSERT INTO `soba` (`sobaID`, `sprat`, `povrsina`, `brojKreveta`) VALUES
(1, 1, 50, 2),
(2, 1, 50, 2),
(3, 2, 70, 3),
(4, 2, 65, 3),
(5, 3, 100, 4),
(6, 3, 85, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`rezervacijaID`),
  ADD KEY `brojSobe` (`brojSobe`);

--
-- Indexes for table `soba`
--
ALTER TABLE `soba`
  ADD PRIMARY KEY (`sobaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `rezervacijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `soba`
--
ALTER TABLE `soba`
  MODIFY `sobaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`brojSobe`) REFERENCES `soba` (`sobaID`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
