-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: sql103.byetcluster.com
-- Thời gian đã tạo: Th10 26, 2025 lúc 11:29 PM
-- Phiên bản máy phục vụ: 11.4.7-MariaDB
-- Phiên bản PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `if0_40475278_wp646`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_log`
--

CREATE TABLE `data_log` (
  `id` int(11) NOT NULL,
  `loss` decimal(10,2) DEFAULT NULL,
  `laingays` decimal(5,2) DEFAULT NULL,
  `tonglais` decimal(10,2) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `gmail` varchar(100) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `updated_unix` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `data_log`
--

INSERT INTO `data_log` (`id`, `loss`, `laingays`, `tonglais`, `ip`, `gmail`, `source`, `updated_unix`) VALUES
(82005153, '-202.29', '0.50', '135.30', '157.15.87.52 [VN (SG)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764217798),
(82005187, '-202.55', '0.40', '134.80', '157.15.87.52 [VN (SG)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764217798),
(82005513, '-183.38', '0.30', '134.70', '184.164.66.109 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764217798),
(82005515, '-120.76', '0.40', '134.00', '184.164.66.109 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764217798),
(82007088, '-102.48', '0.40', '133.90', '184.164.66.109 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764217798),
(82007105, '-26.54', '0.80', '136.40', '107.178.96.113 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764217798),
(82007108, '-28.22', '1.10', '137.30', '107.178.96.113 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764217798),
(82007128, '-28.22', '0.80', '137.40', '107.178.96.113 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764217798),
(82008827, '-190.74', '0.40', '153.20', '104.161.57.45 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764217798),
(82008828, '-190.42', '0.30', '153.90', '104.161.57.45 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764217798),
(82008829, '-15.71', '1.20', '155.00', '104.161.57.45 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764217798),
(82008830, '-190.64', '0.40', '155.10', '104.161.57.45 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764217798),
(82008831, '-16.93', '1.10', '154.60', '104.161.57.45 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764217798),
(82008832, '-194.06', '0.30', '154.90', '148.163.76.85 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764217798),
(82008833, '-193.20', '0.30', '155.50', '148.163.76.85 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764217798),
(82008835, '-194.17', '0.20', '154.00', '148.163.76.85 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764217798),
(82008836, '-193.46', '0.20', '154.70', '148.163.76.85 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764217798),
(82008837, '-193.26', '0.30', '156.90', '148.163.76.85 [US (AZ)]', 'dv.francois207.4@gmail.com', 'phuongdv', 1764217798),
(82009521, '-16.93', '1.20', '137.30', '107.178.96.113 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764217798),
(82009522, '-120.66', '0.30', '136.40', '107.178.96.113 [US (AZ)]', 'dvphuong.dev@gmail.com', 'phuongdv', 1764217798),
(82010739, '-186.60', '0.50', '151.30', '192.34.100.123 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764217798),
(82010750, '-186.65', '0.50', '152.50', '192.34.100.123 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764217798),
(82010751, '-109.18', '0.50', '151.70', '192.34.100.123 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764217798),
(82010753, '-111.73', '0.40', '151.90', '192.34.100.123 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764217798),
(82010755, '-108.96', '0.40', '151.50', '192.34.100.123 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764217798),
(82010756, '-109.27', '0.40', '154.30', '192.34.100.112 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764217798),
(82010757, '-108.96', '0.40', '154.80', '192.34.100.112 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764217798),
(82010758, '-108.96', '0.50', '154.00', '192.34.100.112 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764217798),
(82010759, '-186.60', '0.50', '153.90', '192.34.100.112 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764217798),
(82010760, '-186.43', '0.50', '152.40', '192.34.100.112 [US (NY)]', 'dv.francois207.5@gmail.com', 'phuongdv', 1764217798),
(82011282, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764217798),
(82011283, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764217798),
(82011285, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764217798),
(82011286, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764217798),
(82011287, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764217798),
(82011288, '0.00', '0.00', '0.00', '', 'tthnguyen18@gmail.com', 'phuongdv', 1764217798),
(82011290, '0.00', '0.00', '0.00', '216.126.228.235 [US (TX)]', 'tthnguyen18@gmail.com', 'phuongdv', 1764217798),
(82011291, '0.00', '0.00', '0.00', '216.126.228.235 [US (TX)]', 'tthnguyen18@gmail.com', 'phuongdv', 1764217798),
(82011292, '-15.71', '1.60', '120.30', '216.126.228.235 [US (TX)]', 'tthnguyen18@gmail.com', 'phuongdv', 1764217798),
(82011293, '-15.71', '1.60', '118.10', '216.126.228.235 [US (TX)]', 'tthnguyen18@gmail.com', 'phuongdv', 1764217798),
(82011296, '-15.71', '1.50', '118.80', '216.126.228.235 [US (TX)]', 'khanhln935@gmail.com', 'phuongdv', 1764217798),
(82011297, '-16.93', '1.60', '116.80', '104.161.16.99 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764217798),
(82011298, '-15.71', '0.90', '115.50', '104.161.16.99 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764217798),
(82011299, '-190.42', '0.40', '117.40', '104.161.16.99 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764217798),
(82011300, '-190.42', '0.30', '117.70', '104.161.16.99 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764217798),
(82011301, '-190.42', '0.30', '112.20', '104.161.16.99 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764217798),
(82011302, '-106.05', '0.40', '117.70', '157.15.87.52 [VN (SG)]', 'khanhln935@gmail.com', 'phuongdv', 1764217798),
(82011303, '-106.20', '0.50', '119.60', '157.15.87.52 [VN (SG)]', 'khanhln935@gmail.com', 'phuongdv', 1764217798),
(82011305, '-22.38', '0.50', '118.80', '184.164.66.109 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764217798),
(82011306, '-30.56', '1.40', '121.70', '184.164.66.109 [US (AZ)]', 'khanhln935@gmail.com', 'phuongdv', 1764217798);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `data_log`
--
ALTER TABLE `data_log`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
