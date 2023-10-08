-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 08:26 PM
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
-- Database: `historical_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `chichen itza, mexico`
--

CREATE TABLE `chichen_itza_mexico` (
  `ID` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `Time` int(255) NOT NULL,
  `Number_people` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `colosseum, italy`
--

CREATE TABLE `colosseum_italy` (
  `ID` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `Time` int(255) NOT NULL,
  `Number_people` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colosseum, italy`
--


CREATE TABLE `great_pyramid_egypt` (
  `ID` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `Time` int(255) NOT NULL,
  `Number_people` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `great wall, china`
--

CREATE TABLE `great_wall_china` (
  `ID` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `Time` int(255) NOT NULL,
  `Number_people` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `machu picchu, peru`
--

CREATE TABLE `machu_picchu_peru` (
  `ID` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `Time` int(255) NOT NULL,
  `Number_people` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `petra, jordan`
--

CREATE TABLE `petra_jordan` (
  `ID` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `Time` int(255) NOT NULL,
  `Number_people` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `taj mahal, india`
--

CREATE TABLE `taj_mahal_india` (
  `ID` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `Time` int(255) NOT NULL,
  `Number_people` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chichen itza, mexico`
--
ALTER TABLE `chichen_itza_mexico`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Time` (`Time`);

--
-- Indexes for table `colosseum, italy`
--
ALTER TABLE `colosseum_italy`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Time` (`Time`);

--
-- Indexes for table `great pyramid, egypt`
--
ALTER TABLE `great_pyramid_egypt`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Time` (`Time`);

--
-- Indexes for table `great wall, china`
--
ALTER TABLE `great_wall_china`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Time` (`Time`);

--
-- Indexes for table `machu picchu, peru`
--
ALTER TABLE `machu_picchu_peru`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Time` (`Time`);

--
-- Indexes for table `petra, jordan`
--
ALTER TABLE `petra_jordan`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Time` (`Time`);

--
-- Indexes for table `taj mahal, india`
--
ALTER TABLE `taj_mahal_india`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Time` (`Time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chichen itza, mexico`
--
ALTER TABLE `chichen_itza_mexico`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colosseum, italy`
--
ALTER TABLE `colosseum_italy`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `great pyramid, egypt`
--
ALTER TABLE `great_pyramid_egypt`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `great wall, china`
--
ALTER TABLE `great_wall_china`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machu picchu, peru`
--
ALTER TABLE `machu_picchu_peru`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petra, jordan`
--
ALTER TABLE `petra_jordan`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taj mahal, india`
--
ALTER TABLE `taj_mahal_india`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
