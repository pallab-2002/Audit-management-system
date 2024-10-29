-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 29, 2024 at 11:26 AM
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
-- Database: `cfees`
--

-- --------------------------------------------------------

--
-- Table structure for table `ams_audit`
--

DROP TABLE IF EXISTS `ams_audit`;
CREATE TABLE IF NOT EXISTS `ams_audit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `group_name` varchar(110) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `room_no` varchar(122) NOT NULL,
  `bios` varchar(122) NOT NULL,
  `pop` varchar(122) NOT NULL,
  `os_level_pass` varchar(122) NOT NULL,
  `remote_access` varchar(121) NOT NULL,
  `separate_partition` varchar(122) NOT NULL,
  `log_enteries` varchar(121) NOT NULL,
  `antivirus_installed` varchar(121) NOT NULL,
  `antivirus_update` varchar(121) NOT NULL,
  `data_time_scan` varchar(121) NOT NULL,
  `suspicious_activity` varchar(121) NOT NULL,
  `shared_folders` varchar(121) NOT NULL,
  `p2p` varchar(122) NOT NULL,
  `wireless` varchar(121) NOT NULL,
  `firewall` varchar(121) NOT NULL,
  `another_account` varchar(121) NOT NULL,
  `os_update` varchar(121) NOT NULL,
  `unlicensed_software` varchar(500) NOT NULL,
  `ip_address` varchar(121) NOT NULL,
  `mac_address` varchar(122) NOT NULL,
  `make` varchar(121) NOT NULL,
  `model` varchar(121) NOT NULL,
  `network_card` varchar(212) NOT NULL,
  `non_authorized` varchar(121) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `audited_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `id_cadre`
--

DROP TABLE IF EXISTS `id_cadre`;
CREATE TABLE IF NOT EXISTS `id_cadre` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `is_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` enum('YES','NO') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `id_cadre`
--

INSERT INTO `id_cadre` (`id`, `name`, `is_created`, `is_deleted`) VALUES
(101, 'test cadre', '2022-07-19 02:06:45', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `id_desig`
--

DROP TABLE IF EXISTS `id_desig`;
CREATE TABLE IF NOT EXISTS `id_desig` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `desig` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `cadre_id` int NOT NULL,
  `is_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1015 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `id_desig`
--

INSERT INTO `id_desig` (`id`, `name`, `desig`, `full_name`, `cadre_id`, `is_created`, `is_deleted`) VALUES
(1, 'sapna ', 'SCIENTIST \'E\'', 'sapna kharwar', 0, '2024-08-28 09:51:35', 'no'),
(2, 'TS rathore', 'SCIENTIST \'F\'', 'Trilochan Singh Rathore', 0, '2024-08-28 09:52:46', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `id_emp`
--

DROP TABLE IF EXISTS `id_emp`;
CREATE TABLE IF NOT EXISTS `id_emp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `mob_no` int NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `cadre_id` int NOT NULL,
  `desig_id` int NOT NULL,
  `internal_desig_id` int NOT NULL,
  `group_id` int NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `tel_no` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `is_gazetted` varchar(100) NOT NULL,
  `is_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `id_emp`
--

INSERT INTO `id_emp` (`id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `mob_no`, `email_id`, `cadre_id`, `desig_id`, `internal_desig_id`, `group_id`, `usertype`, `tel_no`, `username`, `password`, `status`, `is_gazetted`, `is_created`, `is_deleted`) VALUES
(1, 'Pawan', 'kumar', '', 'male', '0000-00-00', 0, '', 0, 0, 2, 3, '', '', '411191', 'drdo@123', '', '', '2024-08-28 10:16:43', 'no'),
(2, 'Sapna', 'Kharwar', '', 'Female', '0000-00-00', 0, '', 0, 0, 4, 3, '', '', '911141', 'drdo@123', '', '', '2024-08-28 10:18:46', 'no'),
(3, 'Trilochan', 'Singh', 'Rathore', 'Male', '0000-00-00', 0, '', 0, 0, 3, 3, '', '', '752214', 'drdo123', '', '', '2024-08-28 10:21:28', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `id_group`
--

DROP TABLE IF EXISTS `id_group`;
CREATE TABLE IF NOT EXISTS `id_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gh_id` int NOT NULL,
  `ad_id` int NOT NULL,
  `is_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `id_group`
--

INSERT INTO `id_group` (`id`, `name`, `full_name`, `gh_id`, `ad_id`, `is_created`, `is_deleted`) VALUES
(1, 'Director', 'Director', 0, 0, '2024-08-28 09:43:19', 'no'),
(2, 'tcp_hr', 'Training Cell', 0, 0, '2024-08-28 09:43:19', 'no'),
(3, 'QRS&IT', 'QRS&IT', 0, 0, '2024-08-28 09:46:11', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `id_internaldesig`
--

DROP TABLE IF EXISTS `id_internaldesig`;
CREATE TABLE IF NOT EXISTS `id_internaldesig` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shortname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `is_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` enum('YES','NO') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `id_internaldesig`
--

INSERT INTO `id_internaldesig` (`id`, `shortname`, `fullname`, `is_created`, `is_deleted`) VALUES
(1, 'Director', 'Director', '2022-08-10 07:42:18', 'NO'),
(2, 'AD', 'Associate Director', '2022-08-10 07:42:18', 'NO'),
(3, 'GH', 'Group Head', '2022-08-10 07:42:18', 'NO'),
(4, 'Employee', 'Employee', '2022-08-10 07:42:18', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `id_internal_desig`
--

DROP TABLE IF EXISTS `id_internal_desig`;
CREATE TABLE IF NOT EXISTS `id_internal_desig` (
  `id` int NOT NULL AUTO_INCREMENT,
  `short_name` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `is_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `id_internal_desig`
--

INSERT INTO `id_internal_desig` (`id`, `short_name`, `full_name`, `is_created`, `is_deleted`) VALUES
(1, 'Director', 'Director', '2024-08-28 09:35:37', 'NO'),
(2, 'Employee', 'Employee', '2024-08-28 09:37:27', 'no'),
(3, 'Admin', 'Admin', '2024-08-28 09:37:27', 'no'),
(4, 'Auditor', 'Auditor', '2024-08-28 09:38:16', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

DROP TABLE IF EXISTS `user_logins`;
CREATE TABLE IF NOT EXISTS `user_logins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `login_time`) VALUES
(2, '2024-08-28 10:50:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
