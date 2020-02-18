-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 18, 2020 at 07:03 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cases`
--

CREATE TABLE `tbl_cases` (
  `ID` int(11) NOT NULL,
  `Year` int(4) NOT NULL,
  `Cases` int(5) NOT NULL,
  `Rate` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cases`
--

INSERT INTO `tbl_cases` (`ID`, `Year`, `Cases`, `Rate`) VALUES
(1, 1996, 2712, '9.1'),
(2, 1997, 2444, '8.1'),
(3, 1998, 2262, '7.5'),
(4, 1999, 2176, '7.1'),
(5, 2000, 2062, '6.7'),
(6, 2001, 2195, '7.1'),
(7, 2002, 2436, '7.7'),
(8, 2003, 2441, '7.7'),
(9, 2004, 2493, '7.8'),
(10, 2005, 2455, '7.6'),
(11, 2006, 2509, '7.7'),
(12, 2007, 2403, '7.3'),
(13, 2008, 2599, '7.8'),
(14, 2009, 2364, '7.0'),
(15, 2010, 2300, '6.7'),
(16, 2011, 2273, '6.6'),
(17, 2012, 2073, '5.9'),
(18, 2013, 2060, '5.8'),
(19, 2014, 2053, '5.8'),
(20, 2015, 2100, '5.8'),
(21, 2016, 2344, '6.4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cases_gender`
--

CREATE TABLE `tbl_cases_gender` (
  `ID` int(11) NOT NULL,
  `Year` int(4) NOT NULL,
  `Male_Cases` int(10) NOT NULL,
  `Female_Cases` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cases_gender`
--

INSERT INTO `tbl_cases_gender` (`ID`, `Year`, `Male_Cases`, `Female_Cases`) VALUES
(1, 2008, 804, 256),
(2, 2009, 729, 210),
(3, 2010, 778, 181),
(4, 2011, 753, 202),
(5, 2012, 655, 184),
(6, 2013, 649, 129),
(7, 2014, 647, 167),
(8, 2015, 659, 160),
(9, 2016, 691, 176),
(10, 2017, 717, 195);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `ID` int(11) NOT NULL,
  `F_Name` varchar(30) NOT NULL,
  `L_Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `User_Name` varchar(40) NOT NULL,
  `User_Pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`ID`, `F_Name`, `L_Name`, `Email`, `User_Name`, `User_Pass`) VALUES
(1, 'Philip', 'Wood', 'a_wood60810@fanshaweonline.ca', 'Philly0912', 'imsofly');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cases`
--
ALTER TABLE `tbl_cases`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_cases_gender`
--
ALTER TABLE `tbl_cases_gender`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cases`
--
ALTER TABLE `tbl_cases`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_cases_gender`
--
ALTER TABLE `tbl_cases_gender`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
