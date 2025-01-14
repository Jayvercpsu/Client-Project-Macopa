-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2025 at 02:14 PM
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
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`Idno`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Idno`, `name`, `username`, `password`) VALUES
(2, ' ADMIN', 'admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

DROP TABLE IF EXISTS `families`;
CREATE TABLE IF NOT EXISTS `families` (
  `id` int NOT NULL AUTO_INCREMENT,
  `member_id` int NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `family_address` varchar(255) NOT NULL,
  `family_contact` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_members`
--

DROP TABLE IF EXISTS `family_members`;
CREATE TABLE IF NOT EXISTS `family_members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `household_id` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pob` varchar(100) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `vulnerability` varchar(100) DEFAULT NULL,
  `member_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `household_id` (`household_id`),
  KEY `fk_member` (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `family_members`
--

INSERT INTO `family_members` (`id`, `household_id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `pob`, `relationship`, `marital_status`, `nationality`, `occupation`, `vulnerability`, `member_id`) VALUES
(84, '123456', 'joshua family', 'op', 'algadipe', 'Male', '2025-01-14', 'samplea', 'samplea', 'Single', 'samplea', 'samplea', '4ps', 580),
(85, '123456', 'joshua family', 'op', 'algadipe', 'Male', '2025-01-14', 'samplea', 'samplea', 'Single', 'samplea', 'samplea', '4ps', 581);

-- --------------------------------------------------------

--
-- Table structure for table `households`
--

DROP TABLE IF EXISTS `households`;
CREATE TABLE IF NOT EXISTS `households` (
  `id` int NOT NULL AUTO_INCREMENT,
  `household_id` int NOT NULL,
  `purok` varchar(50) NOT NULL,
  `hh_First_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hh_Middle_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hh_Last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=234 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `households`
--

INSERT INTO `households` (`id`, `household_id`, `purok`, `hh_First_name`, `hh_Middle_name`, `hh_Last_name`, `phone`, `date`) VALUES
(233, 123456, 'Purok 5', 'jayver', 'p', 'algadipe', '09702005316', '2025-01-14 21:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `household_members`
--

DROP TABLE IF EXISTS `household_members`;
CREATE TABLE IF NOT EXISTS `household_members` (
  `member_id` int NOT NULL AUTO_INCREMENT,
  `household_id` int NOT NULL,
  `purok` varchar(11) DEFAULT NULL,
  `First_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Middle_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pob` varchar(100) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `marital_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `vulnerability` varchar(100) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=582 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `household_members`
--

INSERT INTO `household_members` (`member_id`, `household_id`, `purok`, `First_name`, `Middle_name`, `Last_name`, `gender`, `dob`, `pob`, `relationship`, `marital_status`, `nationality`, `occupation`, `vulnerability`, `Date`) VALUES
(580, 123456, 'Purok 5', 'joel', 'p', 'algadipe', 'Male', '2025-01-14', 'sample', 'sample', 'Single', 'filipino', 'sample', '4ps', '2025-01-14 21:54:50'),
(581, 123456, 'Purok 5', 'JOSHUA', 'P', 'ALGADIPE', 'Male', '2025-01-14', 'ad', 'sample', 'Single', 'filipino', '4ps', '4ps', '2025-01-14 21:54:50');

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
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(16, 'Purok 7', ''),
(21, 'Purok 8', '');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

DROP TABLE IF EXISTS `residents`;
CREATE TABLE IF NOT EXISTS `residents` (
  `household_id` int NOT NULL AUTO_INCREMENT,
  `First_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Middle_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `vulnerability` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`household_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2147483648 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`household_id`, `First_name`, `Middle_name`, `Last_name`, `purok`, `vulnerability`, `phone`) VALUES
(2147483647, 'MACKIE', 'LARONG', 'NAVALLO', 'Purok 5', '', '09975705643'),
(21721, 'Renie', 'Larong', 'Navallo', 'Purok 5', '', '09975705643'),
(98765, 'RENIE', 'LARONG', 'NAVALLO', 'Purok 5', '', '09975705643'),
(123456, 'jayver', 'p', 'algadipe', 'Purok 5', '', '09702005316');

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
) ENGINE=MyISAM AUTO_INCREMENT=123471 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`idno`, `username`, `password`, `email`, `name`) VALUES
(123468, 'lorenz', 'lorenz', 'rubio@gmail.com', 'lorenz navallo'),
(123465, 'mackie', 'mackie', 'mackienavallo08@gmail.com', 'MACKIE A. LARONG'),
(123466, 'angelou', 'angelou', 'mackienavallo08@gmail.com', 'Angelou alinsunod'),
(123467, 'kristene', 'kristene', 'mackienavallo08@gmail.com', 'kristene Mae Diaz'),
(123469, 'ACE', 'ACE', 'mackienavallo08@gmail.com', 'ace tapal'),
(123470, 'genio', 'genio', 'diazkristene@gmail.com', 'genio tubas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
