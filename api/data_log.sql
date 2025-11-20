-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2025 at 12:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_log`
--

INSERT INTO `data_log` (`id`, `loss`, `laingays`, `tonglais`, `ip`, `gmail`, `created_at`) VALUES
(82005153, 0.00, 1.60, 152.60, '157.15.87.52', 'dvphuong.dev@gmail.com', '2025-11-20 15:19:01'),
(82005187, 0.00, 1.90, 152.80, '157.15.87.52', 'dvphuong.dev@gmail.com', '2025-11-20 15:19:01'),
(82005513, 0.00, 1.80, 151.90, '184.164.66.109', 'dvphuong.dev@gmail.com', '2025-11-20 15:19:01'),
(82005515, 0.00, 1.80, 152.60, '184.164.66.109', 'dvphuong.dev@gmail.com', '2025-11-20 15:19:01'),
(82007088, 0.00, 1.60, 152.10, '184.164.66.109', 'dvphuong.dev@gmail.com', '2025-11-20 15:19:01'),
(82007105, 0.00, 1.50, 151.50, '107.178.96.113', 'dvphuong.dev@gmail.com', '2025-11-20 15:19:01'),
(82007108, 0.00, 1.50, 151.70, '107.178.96.113', 'dvphuong.dev@gmail.com', '2025-11-20 15:19:01'),
(82007128, 0.00, 1.60, 152.10, '107.178.96.113', 'dvphuong.dev@gmail.com', '2025-11-20 15:19:01'),
(82008827, 0.00, 1.40, 152.20, '104.161.57.45', 'dv.francois207.4@gmail.com', '2025-11-20 15:29:29'),
(82008828, 0.00, 1.90, 152.60, '104.161.57.45', 'dv.francois207.4@gmail.com', '2025-11-20 15:29:29'),
(82008829, 0.00, 1.80, 151.90, '104.161.57.45', 'dv.francois207.4@gmail.com', '2025-11-20 15:29:29'),
(82008830, 0.00, 1.80, 152.30, '104.161.57.45', 'dv.francois207.4@gmail.com', '2025-11-20 15:29:29'),
(82008831, 0.00, 1.80, 152.40, '104.161.57.45', 'dv.francois207.4@gmail.com', '2025-11-20 15:29:29'),
(82008832, 0.00, 1.60, 151.70, '148.163.76.85', 'dv.francois207.4@gmail.com', '2025-11-20 15:29:29'),
(82008833, 0.00, 1.50, 151.50, '148.163.76.85', 'dv.francois207.4@gmail.com', '2025-11-20 15:29:29'),
(82008835, 0.00, 1.40, 152.00, '148.163.76.85', 'dv.francois207.4@gmail.com', '2025-11-20 15:29:29'),
(82008836, 0.00, 1.60, 151.80, '148.163.76.85', 'dv.francois207.4@gmail.com', '2025-11-20 15:29:29'),
(82008837, 0.00, 1.60, 151.60, '148.163.76.85', 'dv.francois207.4@gmail.com', '2025-11-20 15:29:29'),
(82009521, 0.00, 1.50, 152.40, '107.178.96.113', 'dvphuong.dev@gmail.com', '2025-11-20 15:19:01'),
(82009522, 0.00, 1.80, 152.60, '107.178.96.113', 'dvphuong.dev@gmail.com', '2025-11-20 15:19:01'),
(82010739, 0.00, 1.60, 152.30, '192.34.100.123', 'dv.francois207.5@gmail.com', '2025-11-20 15:29:35'),
(82010750, 0.00, 1.60, 152.10, '192.34.100.123', 'dv.francois207.5@gmail.com', '2025-11-20 15:29:35'),
(82010751, 0.00, 1.50, 152.10, '192.34.100.123', 'dv.francois207.5@gmail.com', '2025-11-20 15:29:35'),
(82010753, 0.00, 1.60, 152.50, '192.34.100.123', 'dv.francois207.5@gmail.com', '2025-11-20 15:29:35'),
(82010755, 0.00, 1.30, 151.60, '192.34.100.123', 'dv.francois207.5@gmail.com', '2025-11-20 15:29:35'),
(82010756, 0.00, 1.40, 151.40, '192.34.100.112', 'dv.francois207.5@gmail.com', '2025-11-20 15:29:35'),
(82010757, 0.00, 1.60, 152.50, '192.34.100.112', 'dv.francois207.5@gmail.com', '2025-11-20 15:29:35'),
(82010758, 0.00, 1.40, 152.00, '192.34.100.112', 'dv.francois207.5@gmail.com', '2025-11-20 15:29:35'),
(82010759, 0.00, 1.30, 152.20, '192.34.100.112', 'dv.francois207.5@gmail.com', '2025-11-20 15:29:35'),
(82010760, 0.00, 1.60, 152.50, '192.34.100.112', 'dv.francois207.5@gmail.com', '2025-11-20 15:29:35'),
(82011296, 0.00, 0.00, 0.00, NULL, 'khanhln935@gmail.com', '2025-11-20 15:18:17'),
(82011297, 0.00, 0.00, 0.00, NULL, 'khanhln935@gmail.com', '2025-11-20 15:18:17'),
(82011298, 0.00, 0.00, 0.00, NULL, 'khanhln935@gmail.com', '2025-11-20 15:18:17'),
(82011299, 0.00, 0.00, 0.00, NULL, 'khanhln935@gmail.com', '2025-11-20 15:18:17'),
(82011300, 0.00, 0.00, 0.00, NULL, 'khanhln935@gmail.com', '2025-11-20 15:18:17'),
(82011301, 0.00, 3.30, 64.20, '104.161.16.99', 'khanhln935@gmail.com', '2025-11-20 15:18:17'),
(82011302, 0.00, 1.60, 151.60, '157.15.87.52', 'khanhln935@gmail.com', '2025-11-20 15:18:17'),
(82011303, 0.00, 0.60, 151.30, '157.15.87.52', 'khanhln935@gmail.com', '2025-11-20 15:18:17'),
(82011305, 0.00, 1.80, 152.40, '184.164.66.109', 'khanhln935@gmail.com', '2025-11-20 15:18:17'),
(82011306, 0.00, 0.80, 151.70, '184.164.66.109', 'khanhln935@gmail.com', '2025-11-20 15:18:17');

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
