-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2025 at 06:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thiennhanweb`
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
  `updated_unix` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_log`
--

INSERT INTO `data_log` (`id`, `loss`, `laingays`, `tonglais`, `ip`, `gmail`, `updated_unix`) VALUES
(82005153, -474.83, 0.10, 154.50, '157.15.87.52', 'dvphuong.dev@gmail.com', 1763659037),
(82005187, -568.42, 0.10, 154.70, '157.15.87.52', 'dvphuong.dev@gmail.com', 1763659037),
(82005513, -633.96, 0.00, 153.60, '184.164.66.109', 'dvphuong.dev@gmail.com', 1763659037),
(82005515, -631.28, 0.00, 154.50, '184.164.66.109', 'dvphuong.dev@gmail.com', 1763659037),
(82007088, -633.08, 0.00, 153.60, '184.164.66.109', 'dvphuong.dev@gmail.com', 1763659037),
(82007105, -478.54, 0.10, 153.50, '107.178.96.113', 'dvphuong.dev@gmail.com', 1763659037),
(82007108, -478.74, 0.10, 153.70, '107.178.96.113', 'dvphuong.dev@gmail.com', 1763659037),
(82007128, -478.89, 0.10, 154.10, '107.178.96.113', 'dvphuong.dev@gmail.com', 1763659037),
(82008827, -459.38, 0.10, 154.10, '104.161.57.45', 'dv.francois207.4@gmail.com', 1763659038),
(82008828, -338.98, 0.10, 154.30, '104.161.57.45', 'dv.francois207.4@gmail.com', 1763659038),
(82008829, -338.87, 0.10, 153.80, '104.161.57.45', 'dv.francois207.4@gmail.com', 1763659038),
(82008830, -338.87, 0.10, 154.20, '104.161.57.45', 'dv.francois207.4@gmail.com', 1763659038),
(82008831, -267.00, 0.20, 154.40, '104.161.57.45', 'dv.francois207.4@gmail.com', 1763659038),
(82008832, -271.85, 0.10, 153.40, '148.163.76.85', 'dv.francois207.4@gmail.com', 1763659038),
(82008833, -270.53, 0.10, 153.40, '148.163.76.85', 'dv.francois207.4@gmail.com', 1763659038),
(82008835, -268.94, 0.20, 153.90, '148.163.76.85', 'dv.francois207.4@gmail.com', 1763659038),
(82008836, -312.65, 0.20, 153.80, '148.163.76.85', 'dv.francois207.4@gmail.com', 1763659038),
(82008837, -312.76, 0.20, 153.60, '148.163.76.85', 'dv.francois207.4@gmail.com', 1763659038),
(82009521, -478.98, 0.10, 154.50, '107.178.96.113', 'dvphuong.dev@gmail.com', 1763659037),
(82009522, -405.28, 0.00, 153.90, '107.178.96.113', 'dvphuong.dev@gmail.com', 1763659037),
(82010739, -399.01, 0.20, 154.40, '192.34.100.123', 'dv.francois207.5@gmail.com', 1763659038),
(82010750, -462.66, 0.10, 153.70, '192.34.100.123', 'dv.francois207.5@gmail.com', 1763659038),
(82010751, -459.15, 0.00, 153.70, '192.34.100.123', 'dv.francois207.5@gmail.com', 1763659038),
(82010753, -34.02, 0.40, 154.20, '192.34.100.123', 'dv.francois207.5@gmail.com', 1763659038),
(82010755, -459.26, 0.10, 153.50, '192.34.100.123', 'dv.francois207.5@gmail.com', 1763659038),
(82010756, -272.17, 0.20, 153.30, '192.34.100.112', 'dv.francois207.5@gmail.com', 1763659038),
(82010757, -341.35, 0.10, 154.10, '192.34.100.112', 'dv.francois207.5@gmail.com', 1763659038),
(82010758, -341.65, 0.10, 153.60, '192.34.100.112', 'dv.francois207.5@gmail.com', 1763659038),
(82010759, -272.18, 0.20, 154.40, '192.34.100.112', 'dv.francois207.5@gmail.com', 1763659038),
(82010760, -341.87, 0.10, 154.10, '192.34.100.112', 'dv.francois207.5@gmail.com', 1763659038),
(82011296, 0.00, 0.00, 0.00, NULL, 'khanhln935@gmail.com', 1763659038),
(82011297, 0.00, 0.00, 0.00, NULL, 'khanhln935@gmail.com', 1763659038),
(82011298, 0.00, 0.00, 0.00, NULL, 'khanhln935@gmail.com', 1763659038),
(82011299, 0.00, 0.00, 0.00, NULL, 'khanhln935@gmail.com', 1763659038),
(82011300, 0.00, 0.00, 0.00, NULL, 'khanhln935@gmail.com', 1763659038),
(82011301, -448.94, 13.10, 78.90, '104.161.16.99', 'khanhln935@gmail.com', 1763659038),
(82011302, -529.45, 0.00, 150.40, '157.15.87.52', 'khanhln935@gmail.com', 1763659038),
(82011303, -557.35, 0.00, 150.30, '157.15.87.52', 'khanhln935@gmail.com', 1763659038),
(82011305, -653.28, 0.00, 150.10, '184.164.66.109', 'khanhln935@gmail.com', 1763659038),
(82011306, -653.51, 0.00, 150.30, '184.164.66.109', 'khanhln935@gmail.com', 1763659038);

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
