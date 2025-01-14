-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2024 at 09:18 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `macopa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Idno` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`Idno`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Idno`, `name`, `username`, `password`) VALUES
(2, ' ADMIN', 'admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `households`
--

DROP TABLE IF EXISTS `households`;
CREATE TABLE IF NOT EXISTS `households` (
  `id` int NOT NULL AUTO_INCREMENT,
  `household_id` int NOT NULL,
  `purok` varchar(50) NOT NULL,
  `First_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Middle_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `households`
--

INSERT INTO `households` (`id`, `household_id`, `purok`, `First_name`, `Middle_name`, `Last_name`, `phone`, `date`) VALUES
(46, 22561, 'Purok 2', 'Renie', 'Larong', 'Navallo', '09975705643', '2025-12-21 00:00:00'),
(47, 21403, 'Purok 3', 'ma. ernestina', 'madjos', 'merin', '09091965349', '2024-12-27 00:00:00'),
(42, 22561, 'Purok 2', 'Renie', 'Larong', 'Navallo', '09975705643', '2024-12-21 16:57:38'),
(43, 12222222, 'Purok 2', 'Angelou', 'Meta', 'Alinsunod', '09507078427', '2024-12-21 23:47:53'),
(48, 35466, 'Purok 3', 'nikki faye', 'madjos', 'merin', '09091965349', '2024-12-27 16:35:35'),
(41, 21721, 'Purok 1', 'Mackie', 'Aleria', 'Navallo', '09507078427', '2024-12-21 16:47:17'),
(49, 12345678, 'Purok 7', 'Angelou', 'A', 'Alinsunod', '090706767657', '2024-12-27 16:37:56'),
(50, 9090909, 'Purok 7', 'Angelou', 'A', 'Alinsunod', '09511260456', '2024-12-27 16:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `household_members`
--

DROP TABLE IF EXISTS `household_members`;
CREATE TABLE IF NOT EXISTS `household_members` (
  `member_id` int NOT NULL AUTO_INCREMENT,
  `household_id` int NOT NULL,
  `purok` varchar(11) DEFAULT NULL,
  `First_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Middle_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pob` varchar(100) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `marital_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `vulnerability` varchar(100) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=371 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `household_members`
--

INSERT INTO `household_members` (`member_id`, `household_id`, `purok`, `First_name`, `Middle_name`, `Last_name`, `gender`, `dob`, `pob`, `relationship`, `marital_status`, `nationality`, `occupation`, `vulnerability`, `Date`) VALUES
(355, 22561, 'Purok 2', 'Cindy', 'Aleria', 'Navallo', 'Female', '2024-12-24', 'Claver', 'Daughter', 'Single', 'Filipino', 'None', '4ps', '2024-12-21 16:57:38'),
(354, 22561, 'Purok 2', 'Chenie', 'Aleria', 'Navallo', 'Female', '2025-01-09', 'Claver', 'Daughter', 'Single', 'Filipino', 'Student', 'New Born', '2024-12-21 16:57:38'),
(353, 22561, 'Purok 2', 'Archie', 'Aleria', 'Navallo', 'Male', '2024-12-18', 'Claver', 'Son', 'Single', 'Filipino', 'IT', '4ps', '2024-12-21 16:57:38'),
(352, 22561, 'Purok 2', 'Ascel Maius', 'Aleria', 'Navallo', 'Male', '2025-01-11', 'Butuan city', 'Son', 'Single', 'Filiipino', 'Police', '4ps', '2024-12-21 16:57:38'),
(351, 22561, 'Purok 2', 'Mackie', 'Aleria', 'Navallo', 'Male', '2024-12-18', 'Magallanes Claver SDN', 'Son', 'Single', 'Filipino', 'PROGRAMMER', 'None', '2024-12-21 16:57:38'),
(350, 22561, 'Purok 2', 'Lutchie', 'Aleria', 'Navallo', 'Female', '2024-12-10', 'Pintuyan Southern Leyte', 'Mother', 'Married', 'Filipino', 'House Wife', '4ps', '2024-12-21 16:57:38'),
(346, 21721, 'Purok 1', 'Mackie', 'Aleria', 'Navallo', 'Male', '2024-12-18', 'Claver', 'Son', 'Single', 'Filipino', 'PROGRAMMER', 'None', '2024-12-21 16:47:17'),
(347, 21721, 'Purok 1', 'Kristene', 'Cabreza', 'Diaz', 'Female', '2024-12-18', 'Claver', 'Daugher', 'Single', 'Filipino', 'PROGRAMMER', '4ps', '2024-12-21 16:47:17'),
(348, 21721, 'Purok 1', 'Kristene', 'Cabreza', 'Navallo', 'Female', '2024-12-18', 'Claver', 'Daugher', 'Single', 'Filipino', 'PROGRAMMER', '4ps', '2025-12-21 16:47:17'),
(349, 22561, 'Purok 2', 'Renie', 'Larong', 'Navallo', 'Male', '2024-12-18', 'Claver Surigao del Norte', 'Father', 'Married', 'Filipino', 'Human Resources', 'None', '2024-12-21 16:57:38'),
(356, 12222222, 'Purok 2', 'Angelou', 'Meta', 'Alinsunod', 'Male', '2024-12-17', 'Dinagat', 'Father', 'Married', 'Filipino', 'PROGRAMMER', 'Solo Parent', '2024-12-21 23:47:53'),
(357, 12222222, 'Purok 2', 'Karen', 'Meta', 'Alinsunod', 'Female', '2024-12-18', 'Macopa', 'Mother', 'Married', 'Filipino', 'KKKKKKKK', '4ps', '2024-12-21 23:47:53'),
(358, 12222222, 'Purok 2', 'Nikki Faye', 'Meta', 'Alinsunod', 'Female', '2024-12-01', 'Siargao', 'Daughter', 'Single', 'Filipino', 'None', 'New Born', '2024-12-21 23:47:53'),
(359, 12222222, 'Purok 2', 'Lyka', 'Meta', 'Saberon', 'Female', '2024-12-08', 'Dinagat', 'Daughter', 'Single', 'Filipino', 'None', 'Mortality', '2024-12-21 23:47:53'),
(363, 12222222, 'Purok 2', 'Lyka', 'Meta', 'LADRAGON', 'Female', '2024-12-08', 'Dinagat', 'Daughter', 'Single', 'Filipino', 'None', 'Mortality', '2025-12-21 23:47:53'),
(364, 21403, 'Purok 3', 'ma. ernestina', 'madjos', 'merin', 'Female', '2023-10-15', 'sapao', 'DAUGHTER', 'Single', 'filipino', 'n/a', 'New Born', '2024-12-27 16:30:54'),
(365, 35466, 'Purok 3', 'nikki faye', 'madjos', 'merin', 'Female', '2003-06-29', 'sta.monica', 'sister', 'Divorced', 'filipino', 'PROGRAMMER', 'Solo Parent', '2024-12-27 16:35:35'),
(367, 9090909, 'Purok 7', 'Angel', 'A', 'Alinsunodd', 'Female', '2024-12-29', 'Valencia', 'son', 'Single', 'chinese', 'asdsadas', 'None', '2024-12-27 16:41:42'),
(368, 12345678, 'Purok 7', 'Jeengoy', 'A', 'Alinsunod', 'Male', '2024-12-30', 'Valencia', 'son', 'Single', 'KKKKKKKKK', 'sadasd', 'None', '2024-12-27 16:37:56'),
(369, 21403, 'Purok 3', 'axel', 'madjos', 'Merin', 'Male', '2024-12-18', 'sapao', 'SON', 'Single', 'Filipino', 'STUDENT', 'none', '2024-12-27 16:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int NOT NULL AUTO_INCREMENT,
  `household_id` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `First_name` varchar(100) NOT NULL,
  `Middle_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `household_id`, `purok`, `First_name`, `Middle_name`, `Last_name`) VALUES
(10, '0022561', 'Purok 2', 'Lutchie', 'Aleria', 'Navallo'),
(9, '0022561', 'Purok 2', 'Renie', 'Larong', 'Navallo'),
(8, '0021721', 'Purok 1', 'Kristene', 'Cabreza', 'Diaz'),
(7, '0021721', 'Purok 1', 'Mackie', 'Aleria', 'Navallo'),
(11, '0022561', 'Purok 2', 'Mackie', 'Aleria', 'Navallo'),
(12, '0022561', 'Purok 2', 'Ascel Maius', 'Aleria', 'Navallo'),
(13, '0022561', 'Purok 2', 'Archie', 'Aleria', 'Navallo'),
(14, '0022561', 'Purok 2', 'Chenie', 'Aleria', 'Navallo'),
(15, '0022561', 'Purok 2', 'Cindy', 'Aleria', 'Navallo'),
(24, '09090909', 'Purok 7', 'Angelou', 'A', 'Alinsunod'),
(23, '12345678', 'Purok 7', 'Angelou', 'A', 'Alinsunod'),
(22, '35466', 'Purok 3', 'nikki faye', 'madjos', 'merin'),
(21, '0021403', 'Purok 3', 'ma. ernestina', 'madjos', 'merin');

-- --------------------------------------------------------

--
-- Table structure for table `purok`
--

DROP TABLE IF EXISTS `purok`;
CREATE TABLE IF NOT EXISTS `purok` (
  `id` int NOT NULL AUTO_INCREMENT,
  `purok` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purok`
--

INSERT INTO `purok` (`id`, `purok`, `name`) VALUES
(5, 'Purok 5', ''),
(4, 'Purok 4', ''),
(3, 'Purok 3', ''),
(2, 'Purok 2', ''),
(1, 'Purok 1', ''),
(15, 'Purok 6', ''),
(16, 'Purok 7', '');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

DROP TABLE IF EXISTS `residents`;
CREATE TABLE IF NOT EXISTS `residents` (
  `household_id` int NOT NULL AUTO_INCREMENT,
  `First_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Middle_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `vulnerability` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`household_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2147483648 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`household_id`, `First_name`, `Middle_name`, `Last_name`, `purok`, `vulnerability`, `phone`) VALUES
(12345678, 'Angelou', 'A', 'Alinsunod', 'Purok 7', '', '090706767657'),
(9090909, 'Angelou', 'A', 'Alinsunod', 'Purok 7', '', '09511260456'),
(35466, 'nikki faye', 'madjos', 'merin', 'Purok 3', '', '09091965349'),
(21403, 'ma. ernestina', 'madjos', 'merin', 'Purok 3', '', '09091965349'),
(12222222, 'Angelou', 'Meta', 'Alinsunod', 'Purok 2', '', '09507078427'),
(22561, 'Renie', 'Larong', 'Navallo', 'Purok 2', '', '09975705643'),
(21721, 'Mackie', 'Aleria', 'Navallo', 'Purok 1', '', '09507078427');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

DROP TABLE IF EXISTS `security`;
CREATE TABLE IF NOT EXISTS `security` (
  `idno` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=123467 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`idno`, `username`, `password`, `email`, `name`) VALUES
(123465, 'mackie', 'mackie', 'mackienavallo08@gmail.com', 'MACKIE A. LARONG'),
(123466, 'angelou', 'angelou', 'mackienavallo08@gmail.com', 'Angelou alinsunod');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
