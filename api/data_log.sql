-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql100.infinityfree.com
-- Generation Time: Nov 28, 2025 at 03:51 AM
-- Server version: 10.6.22-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40536212_wp596`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_log`
--

CREATE TABLE `data_log` (
  `id` int(11) NOT NULL,
  `loss` decimal(10,2) DEFAULT NULL,
  `laingays` decimal(5,2) DEFAULT NULL,
  `tonglais` decimal(10,2) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `gmail` varchar(100) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `updated_unix` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `VPS_unix` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_log`
--

INSERT INTO `data_log` (`id`, `loss`, `laingays`, `tonglais`, `ip`, `gmail`, `source`, `updated_unix`, `VPS_unix`) VALUES
(82005153, '-41.07', '0.50', '136.80', '157.15.87.52 [VN (SG)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764319912, 1764319911),
(82005187, '-2.73', '0.90', '136.70', '157.15.87.52 [VN (SG)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764319912, 1764319911),
(82005391, '-123.94', '0.00', '156.10', '', 'thienquang.hdsg@gmail.com', 'thienquang', 1764317637, 0),
(82005513, '-1.23', '1.70', '137.50', '184.164.66.109 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764319912, 1764319911),
(82005515, '-2.46', '1.70', '136.90', '184.164.66.109 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764319912, 1764319911),
(82007088, '-0.58', '1.50', '136.60', '184.164.66.109 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764319912, 1764319911),
(82007105, '-14.72', '1.90', '139.30', '107.178.96.113 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764319912, 1764319911),
(82007108, '-5.44', '1.90', '140.20', '107.178.96.113 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764319912, 1764319911),
(82007128, '-1.60', '0.70', '139.20', '103.57.223.213 [INET (HN)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764319912, 1764319911),
(82008776, '-84.00', '0.00', '166.30', '', 'thienquang.hdsg@gmail.com', 'thienquang', 1764317637, 0),
(82008827, '-2.46', '0.00', '154.00', '104.161.57.45 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764319912, 0),
(82008828, '-1.53', '0.00', '154.80', '104.161.57.45 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764319912, 0),
(82008829, '-2.32', '1.50', '157.60', '104.161.57.45 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764319912, 0),
(82008830, '-3.14', '0.10', '156.10', '104.161.57.45 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764319912, 0),
(82008831, '-2.68', '0.10', '155.70', '104.161.57.45 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764319912, 0),
(82008832, '0.00', '1.60', '157.40', '148.163.76.85 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764319912, 0),
(82008833, '1.26', '1.50', '157.90', '148.163.76.85 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764319912, 0),
(82008835, '-0.88', '1.60', '156.50', '148.163.76.85 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764319912, 0),
(82008836, '-0.88', '1.50', '157.20', '148.163.76.85 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764319912, 0),
(82008837, '-0.88', '1.50', '159.30', '148.163.76.85 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764319912, 0),
(82009521, '-3.38', '0.50', '138.90', '103.57.223.213 [INET (HN)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764319912, 1764319911),
(82009522, '-3.38', '1.00', '138.70', '103.57.223.213 [INET (HN)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764319912, 1764319911),
(82010739, '-9.32', '0.00', '152.00', '192.34.100.123 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764319912, 0),
(82010750, '-17.12', '0.00', '153.30', '192.34.100.123 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764319912, 0),
(82010751, '-9.18', '0.40', '153.00', '192.34.100.123 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764319912, 0),
(82010753, '-5.62', '0.00', '152.60', '192.34.100.123 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764319912, 0),
(82010755, '-0.67', '0.00', '152.20', '192.34.100.123 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764319912, 0),
(82010756, '-2.88', '0.00', '155.00', '192.34.100.112 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764319912, 0),
(82010757, '1.39', '0.20', '156.00', '192.34.100.112 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764319912, 0),
(82010758, '1.39', '0.00', '154.60', '192.34.100.112 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764319912, 0),
(82010759, '1.39', '0.00', '154.60', '192.34.100.112 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764319912, 0),
(82010760, '1.39', '0.00', '153.10', '192.34.100.112 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764319912, 0),
(82011037, '0.00', '0.00', '172.50', '', 'thienquang.hdsg@gmail.com', 'thienquang', 1764317637, 0),
(82011038, '0.00', '0.00', '175.70', '', 'thienquang.hdsg@gmail.com', 'thienquang', 1764317637, 0),
(82011039, '-326.87', '0.00', '177.30', '', 'thienquang.hdsg@gmail.com', 'thienquang', 1764317637, 0),
(82011050, '-155.31', '0.10', '178.60', '', 'thienquang.hdsg@gmail.com', 'thienquang', 1764317637, 0),
(82011051, '-155.37', '0.10', '177.40', '', 'thienquang.hdsg@gmail.com', 'thienquang', 1764317637, 0),
(82011282, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764319912, 0),
(82011283, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764319912, 0),
(82011285, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764319912, 0),
(82011286, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764319912, 0),
(82011287, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764319912, 0),
(82011288, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764319912, 0),
(82011290, '0.00', '0.00', '0.00', '216.126.228.235 [US (TX)]', 'tthnguyen18@gmail.com', 'phuongdv', 1764319912, 0),
(82011291, '0.00', '0.00', '0.00', '216.126.228.235 [US (TX)]', 'tthnguyen18@gmail.com', 'phuongdv', 1764319912, 0),
(82011292, '-9.24', '1.40', '122.70', '216.126.228.235 [US (TX)]', 'tthnguyen18@gmail.com', 'phuongdv', 1764319912, 0),
(82011293, '-9.24', '1.40', '120.50', '216.126.228.235 [US (TX)]', 'tthnguyen18@gmail.com', 'phuongdv', 1764319912, 0),
(82011296, '0.00', '1.30', '121.20', '216.126.228.235 [US (TX)]', 'khanhln935@gmail.com', 'phuongdv', 1764319912, 0),
(82011297, '0.00', '1.20', '119.00', '104.161.16.99 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764319912, 0),
(82011298, '0.00', '1.20', '117.70', '104.161.16.99 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764319912, 0),
(82011299, '0.00', '1.20', '119.50', '104.161.16.99 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764319912, 0),
(82011300, '0.00', '1.20', '119.80', '104.161.16.99 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764319912, 0),
(82011301, '0.00', '1.10', '114.20', '104.161.16.99 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764319912, 0),
(82011302, '-5.62', '1.50', '120.20', '157.15.87.52 [VN (SG)]', 'khanhln935@gmail.com', 'phuongdv', 1764319912, 0),
(82011303, '-108.95', '0.20', '120.80', '157.15.87.52 [VN (SG)]', 'khanhln935@gmail.com', 'phuongdv', 1764319912, 0),
(82011305, '0.00', '1.20', '121.10', '184.164.66.109 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764319912, 0),
(82011306, '0.00', '1.10', '123.90', '184.164.66.109 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764319912, 0),
(82011683, '-145.61', '0.10', '149.90', '', 'thienquang.hdsg@gmail.com', 'thienquang', 1764317637, 0),
(82012017, '-145.65', '0.10', '169.90', '', 'thienquang.hdsg@gmail.com', 'thienquang', 1764317637, 0),
(82012018, '-145.61', '0.10', '148.90', '', 'thienquang.hdsg@gmail.com', 'thienquang', 1764317637, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_log`
--
ALTER TABLE `data_log`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
