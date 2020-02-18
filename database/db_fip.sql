-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 15, 2020 at 07:35 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cases_gender`
--

CREATE TABLE `tbl_cases_gender` (
  `ID` int(11) NOT NULL,
  `Year` int(4) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Cases` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tests`
--

CREATE TABLE `tbl_tests` (
  `ID` int(11) NOT NULL,
  `Year` int(4) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Tests` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `tbl_tests`
--
ALTER TABLE `tbl_tests`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cases_gender`
--
ALTER TABLE `tbl_cases_gender`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tests`
--
ALTER TABLE `tbl_tests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
