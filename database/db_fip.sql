-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 12, 2020 at 11:34 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `tbl_about`
--

DROP TABLE IF EXISTS `tbl_about`;
CREATE TABLE IF NOT EXISTS `tbl_about` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(63) NOT NULL,
  `Text` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`ID`, `Title`, `Text`) VALUES
(1, 'Our Campaign Goals', 'Make young Canadians aware of HIV and AIDS, and how to prevent them.^Connect Canadians of all ages to testing services.^Promote an Open discussions with partners, peers and Health Care Providers.'),
(2, 'Why Get Tested?', 'Getting Tested for HIV / AIDs is important for all Canadians, regardless of race, gender, ethnicity or sexual preference.^Although many young Canadians are not sexually active, learning the importance of preventing these diseases can make young people more comfortable when talking about their overall sexual health.'),
(4, 'What Sets Us Apart', 'A campaign like ours can help young people feel pride and encouragement in taking control of their sexual health.^It also aids in helping make them aware of the necessary prevention methods against HIV, AIDS and STD\'s.^Having proper access to factual information can aid young Canadians on understanding how important it is to get tested if they are having or are thinking about having sexual interactions.'),
(5, 'How To Get Involved', 'By Phone : +1 555-555-5555^By Email : contact@gettested.ca^By Fax : +1 555-555-5555^In Person : 123 Main Street, London On, Canada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinics`
--

DROP TABLE IF EXISTS `tbl_clinics`;
CREATE TABLE IF NOT EXISTS `tbl_clinics` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Clinic_Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Website` varchar(150) NOT NULL,
  `Latt` decimal(8,6) NOT NULL,
  `Longt` decimal(9,6) NOT NULL,
  `Distance` decimal(10,3) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_clinics`
--

INSERT INTO `tbl_clinics` (`ID`, `Clinic_Name`, `Address`, `Phone`, `Website`, `Latt`, `Longt`, `Distance`) VALUES
(1, 'Middlesex-London Health Unit - London', '50 King Street\r\nLondon ON, N6A 5L7', '519-663-5317', 'https://www.healthunit.com/sexually-transmitted-infection-clinic', '42.981372', '-81.253924', '0.000'),
(2, 'Regional HIV/AIDS Connection', '186 King St #30, London, ON N6A 1C7', '1 866-920-1601', 'https://hivaidsconnection.ca/', '42.982908', '-81.248297', '0.000'),
(3, 'Options Clinic - London Intercommunity Health Centre', '659 Dundas St\r\nLondon, ON N5W 2Z1', '519-433-3491', 'https://lihc.on.ca/programs/anonymous-hiv-testing/', '42.989216', '-81.229672', '0.000'),
(4, 'Central Spa Bathhouse', '722 York St, London, ON N5W 2S8', '(519) 438-2625', 'https://www.centralspa.com/', '42.987667', '-81.226596', '0.000'),
(5, 'Anova', '101 Wellington Rd, London, ON N6C 4M7', '(519) 642-3003', 'http://www.anovafuture.org/', '42.970600', '-81.237400', '0.000'),
(6, 'Anova', '450 Clarke Rd, London, ON N5W 6H1', '(519) 642-3003', 'http://www.anovafuture.org/', '43.007013', '-81.176283', '0.000'),
(7, 'Crouch Neighbourhood Resource Centre', '550 Hamilton Rd, London, ON N5Z 1S4', '(519) 642-7630', 'https://www.crouchnrc.org/', '42.980627', '-81.215043', '0.000'),
(8, 'My Sister\'s Place', '566 Dundas St, London, ON N6B 1W8', '(519) 679-9570', 'https://cmhamiddlesex.ca/about-cmha/msp/', '42.988579', '-81.233352', '0.000'),
(9, 'Salvation Army Centre of Hope ', '281 Wellington St, London, ON N6B 2L4', '(519) 661-0343', 'https://centreofhope.ca/', '42.981020', '-81.243662', '0.000'),
(10, 'Unity Project', '717 Dundas St, London, ON N5W 2Z4', '(519) 433-8700', 'https://unityproject.ca/', '42.999630', '-81.193970', '0.000'),
(11, 'Southwestern Public Health - St. Thomas', '1230 Talbot St,\r\nSt. Thomas, ON', '(519) 631-9900', 'https://www.swpublichealth.ca/clinics-classes-forms/clinics/sexual-health-clinics', '42.778365', '-81.149884', '0.000'),
(12, 'Southwestern Public Health - Woodstock', '410 Buller St, Woodstock, ON N4S 6G9', '519-421-9901', 'https://www.swpublichealth.ca/clinics-classes-forms/clinics/sexual-health-clinics', '43.132900', '-80.760267', '0.000'),
(13, 'Southwestern Public Health - Tillsonburg', '167 Rolph St, Tillsonburg, ON', '519-539-4431', 'https://www.swpublichealth.ca/clinics-classes-forms/clinics/sexual-health-clinics', '42.863574', '-80.735023', '0.000'),
(14, 'Middlesex-London Health Unit - Strathroy', '51 Front St, Strathroy, ON N7G 1Y5\r\n', '(519) 245-3230', 'https://www.healthunit.com/sexually-transmitted-infection-clinic', '42.957832', '-81.625569', '0.000'),
(15, 'Perth District Health Unit - St. Marys', '268 Maiden Lane\r\nSt. Marys ON, N4X 1B7', '519-271-7600', 'https://www.hpph.ca/en/classes-clinics-and-services/sexual-health-clinics-and-sti-testing.aspx', '43.259946', '-81.151934', '0.000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home`
--

DROP TABLE IF EXISTS `tbl_home`;
CREATE TABLE IF NOT EXISTS `tbl_home` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(63) NOT NULL,
  `Text` text NOT NULL,
  `Image` varchar(63) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_home`
--

INSERT INTO `tbl_home` (`ID`, `Title`, `Text`, `Image`) VALUES
(1, 'Get Yourself Tested!', 'There is no reason to be ashamed of knowing Your HIV and STD status! Knowing helps you choose options to stay healthy!', 'doctor.svg'),
(2, 'Talk About PrEP!', 'Talk to your doctor about pre-exposure prophylaxis (PrEP) as it can greatly reduce your risk of infection.', 'drugs.svg'),
(3, 'HIV Treatment!', 'HIV treatment keeps you healthy and minimizes the risk of spreading the disease to others! Taking responsibility of your health will positively effect you and others in your life.', '760434a1d26777cef91c53b29cf5c6dd.svg'),
(4, 'Use A Condom!', 'Condoms are more than a way to prevent pregnancy. They are highly effective at preventing both HIV, AIDS and other STDs!', 'f37ba97b208242f15d13519701cb44f1.svg'),
(5, 'Don\'t Inject Drugs!', 'But if you do, only use sterile equipment and water. And most importantly, never share your gear with anyone! HIV and AIDS can be transmitted through contact with blood, so proceed with caution!', 'needle.svg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `F_Name` varchar(30) NOT NULL,
  `L_Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `User_Name` varchar(40) NOT NULL,
  `User_Pass` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`ID`, `F_Name`, `L_Name`, `Email`, `User_Name`, `User_Pass`) VALUES
(1, 'Philip', 'Wood', 'philipwood0912@gmail.com', 'Philly0912', '$2y$10$3Hv5.KFWWqE/VrJyB5focuSYFb01fLyyne.LdYxMj.1yTFnz0XLPS'),
(4, 'Philip', 'Wood', 'a_wood60810@fanshaweonline.ca', 'phil', '$2y$10$jC7sPFVTp2g8f7R6haN0quEkdyT3HpT5dlFvVNTP6sY1Wpyh57Iem'),
(5, 'mike', 'prior', '', 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
