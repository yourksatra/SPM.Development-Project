-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2024 at 02:53 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spmproyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `capaian`
--

CREATE TABLE `capaian` (
  `IdCapaian` varchar(255) NOT NULL,
  `IdLayanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CapaianBLN` int NOT NULL,
  `P_Anggaran` decimal(15,2) NOT NULL,
  `Bulan` varchar(3) NOT NULL,
  `Tahun` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `capaian`
--

INSERT INTO `capaian` (`IdCapaian`, `IdLayanan`, `CapaianBLN`, `P_Anggaran`, `Bulan`, `Tahun`) VALUES
('1AP022SBW202401', '1AP022SBW2024', 53, 500.00, '1', '2024'),
('1BP022SBW202401', '1BP022SBW2024', 10, 20.00, '1', '2024'),
('9AP022SBW202401', '9AP022SBW2024', 11, 1.00, '1', '2024'),
('9BP022SBW202401', '9BP022SBW2024', 12, 1.00, '1', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `IdIndikator` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `Detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`IdIndikator`, `name`, `Detail`) VALUES
(1, 'Ibu Hamil', NULL),
(2, 'Ibu Bersalin', NULL),
(3, 'Bayi Baru Lahir', NULL),
(4, 'Balita', NULL),
(5, 'Pada Usia Pendidikan Dasar', NULL),
(6, 'Pada Usia Produktif', NULL),
(7, 'Pada Usia Lanjut', NULL),
(8, 'Penderita Hipertensi', NULL),
(9, 'Diabetes Melitus', NULL),
(10, 'Orang Dengan Gangguan Jiwa (ODGJ) Berat', NULL),
(11, 'Orang Terduga Tuberkulosis', NULL),
(12, 'Human Immunodeficiency Virus', 'Orang dengan Resiko Terinfeksi Virus yang melemahkan Daya Tahan Tubuh');

-- --------------------------------------------------------

--
-- Table structure for table `inputc`
--

CREATE TABLE `inputc` (
  `Id` int NOT NULL,
  `IdCapaian` varchar(255) DEFAULT NULL,
  `IdUser` int DEFAULT NULL,
  `Acces` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logacces`
--

CREATE TABLE `logacces` (
  `log_id` int NOT NULL,
  `IdUser` int NOT NULL,
  `TimeAcces` timestamp NOT NULL,
  `LastAcces` timestamp NULL DEFAULT NULL,
  `Expires_time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logacces`
--

INSERT INTO `logacces` (`log_id`, `IdUser`, `TimeAcces`, `LastAcces`, `Expires_time`) VALUES
(1, 5, '2024-06-05 06:42:14', NULL, '2024-06-05 07:12:14'),
(2, 5, '2024-06-05 06:42:23', '2024-06-05 06:51:16', '2024-06-05 07:12:23'),
(3, 5, '2024-06-05 06:53:19', '2024-06-05 06:53:36', '2024-06-05 07:23:19'),
(4, 5, '2024-06-05 07:25:54', '2024-06-05 07:26:35', '2024-06-05 07:55:54'),
(5, 5, '2024-06-05 07:48:33', '2024-06-05 07:50:18', '2024-06-05 08:18:33'),
(6, 5, '2024-06-05 07:51:08', '2024-06-05 07:51:16', '2024-06-05 08:21:08'),
(7, 2, '2024-06-05 07:51:31', '2024-06-05 07:51:35', '2024-06-05 08:21:31'),
(8, 5, '2024-06-05 15:34:12', '2024-06-05 15:54:06', '2024-06-05 16:04:12'),
(9, 5, '2024-06-05 21:02:41', '2024-06-05 21:04:25', '2024-06-05 21:32:41'),
(10, 5, '2024-06-06 01:54:01', '2024-06-06 01:55:45', '2024-06-06 02:24:01'),
(11, 2, '2024-06-06 01:55:53', '2024-06-06 01:55:57', '2024-06-06 02:25:53'),
(12, 5, '2024-06-06 01:56:08', '2024-06-06 01:58:54', '2024-06-06 02:26:08'),
(13, 5, '2024-06-06 01:59:05', '2024-06-06 01:59:38', '2024-06-06 02:29:05'),
(14, 5, '2024-06-06 01:59:49', '2024-06-06 02:01:39', '2024-06-06 02:29:49'),
(15, 2, '2024-06-06 02:01:56', '2024-06-06 02:05:45', '2024-06-06 02:31:56'),
(16, 2, '2024-06-08 19:11:44', '2024-06-08 19:12:37', '2024-06-08 19:41:44'),
(17, 2, '2024-06-08 19:13:00', '2024-06-08 19:15:59', '2024-06-08 19:43:00'),
(18, 5, '2024-06-08 19:18:08', '2024-06-08 19:18:20', '2024-06-08 19:48:08'),
(19, 2, '2024-06-08 19:18:28', '2024-06-08 19:18:34', '2024-06-08 19:48:28'),
(20, 5, '2024-06-09 06:23:45', '2024-06-09 06:24:14', '2024-06-09 06:53:45'),
(21, 5, '2024-06-09 06:44:38', '2024-06-09 06:56:14', '2024-06-09 07:14:38'),
(22, 2, '2024-06-09 19:22:58', '2024-06-09 19:48:02', '2024-06-09 19:52:58'),
(23, 2, '2024-06-09 19:50:15', NULL, '2024-06-09 20:20:15'),
(24, 5, '2024-06-09 19:51:32', '2024-06-09 20:12:32', '2024-06-09 20:21:32'),
(25, 2, '2024-06-09 20:20:59', '2024-06-09 20:24:26', '2024-06-09 20:50:59'),
(26, 2, '2024-06-11 04:34:03', '2024-06-11 04:39:56', '2024-06-11 05:04:03'),
(27, 2, '2024-06-11 04:40:08', '2024-06-11 05:10:08', '2024-06-11 05:10:08'),
(28, 5, '2024-06-11 04:44:25', '2024-06-11 05:14:25', '2024-06-11 05:14:25'),
(29, 2, '2024-06-11 05:15:56', '2024-06-11 05:30:16', '2024-06-11 05:45:56'),
(30, 5, '2024-06-11 05:23:29', '2024-06-11 05:23:44', '2024-06-11 05:53:29'),
(31, 5, '2024-06-11 16:10:11', '2024-06-11 16:40:11', '2024-06-11 16:40:11'),
(32, 5, '2024-06-11 16:57:46', '2024-06-11 17:27:46', '2024-06-11 17:27:46'),
(33, 5, '2024-06-11 18:14:43', '2024-06-11 18:22:16', '2024-06-11 18:44:43'),
(34, 5, '2024-06-12 19:01:04', '2024-06-12 19:31:04', '2024-06-12 19:31:04'),
(35, 5, '2024-06-12 19:33:17', '2024-06-12 19:49:33', '2024-06-12 20:03:17'),
(36, 5, '2024-06-12 21:00:14', '2024-06-12 21:06:05', '2024-06-12 21:30:14'),
(37, 5, '2024-06-13 01:10:12', NULL, '2024-06-13 01:40:12'),
(38, 2, '2024-06-13 01:19:17', NULL, '2024-06-13 01:49:17'),
(39, 5, '2024-06-14 16:54:18', '2024-06-14 17:54:18', '2024-06-14 17:54:18'),
(40, 5, '2024-06-14 17:58:58', '2024-06-14 18:37:53', '2024-06-14 18:58:58'),
(41, 5, '2024-06-15 08:15:38', NULL, '2024-06-15 09:15:38'),
(42, 5, '2024-06-15 12:53:28', '2024-06-15 13:53:28', '2024-06-15 13:53:28'),
(43, 5, '2024-06-15 15:10:45', '2024-06-15 16:10:45', '2024-06-15 16:10:45'),
(44, 5, '2024-06-15 16:40:46', '2024-06-15 17:18:01', '2024-06-15 17:40:46'),
(45, 5, '2024-06-18 10:50:56', '2024-06-18 11:01:20', '2024-06-18 11:50:56'),
(46, 5, '2024-06-19 00:36:59', '2024-06-19 01:14:09', '2024-06-19 01:36:59'),
(47, 5, '2024-06-19 03:10:25', '2024-06-19 03:32:11', '2024-06-19 04:10:25'),
(48, 5, '2024-06-19 06:41:36', '2024-06-19 06:45:19', '2024-06-19 07:41:36'),
(49, 5, '2024-06-19 13:35:49', '2024-06-19 14:35:49', '2024-06-19 14:35:49'),
(50, 5, '2024-06-19 15:05:48', '2024-06-19 16:00:12', '2024-06-19 16:05:48'),
(51, 5, '2024-06-19 23:53:31', '2024-06-20 00:50:37', '2024-06-20 00:53:31'),
(52, 5, '2024-06-20 02:27:54', '2024-06-20 03:03:44', '2024-06-20 03:27:54'),
(53, 5, '2024-06-23 15:39:09', '2024-06-23 16:01:15', '2024-06-23 16:39:09'),
(54, 5, '2024-06-24 13:30:44', '2024-06-24 14:30:44', '2024-06-24 14:30:44'),
(55, 5, '2024-06-24 14:53:07', '2024-06-24 15:53:07', '2024-06-24 15:53:07'),
(56, 5, '2024-06-24 15:55:06', '2024-06-24 16:16:54', '2024-06-24 16:55:06'),
(57, 5, '2024-06-26 05:52:17', NULL, '2024-06-26 06:52:17'),
(58, 5, '2024-06-26 09:27:31', '2024-06-26 10:27:31', '2024-06-26 10:27:31'),
(59, 5, '2024-06-26 13:08:21', '2024-06-26 13:41:01', '2024-06-26 14:08:21'),
(60, 5, '2024-06-27 16:42:34', '2024-06-27 16:44:40', '2024-06-27 17:42:34'),
(61, 5, '2024-06-28 00:30:03', '2024-06-28 01:09:22', '2024-06-28 01:30:03'),
(62, 5, '2024-06-28 05:21:40', '2024-06-28 05:58:54', '2024-06-28 06:21:40'),
(63, 5, '2024-06-28 08:09:52', '2024-06-28 08:49:11', '2024-06-28 09:09:52'),
(64, 5, '2024-06-28 23:08:02', '2024-06-28 23:08:17', '2024-06-29 00:08:02'),
(65, 5, '2024-07-01 08:01:09', NULL, '2024-07-01 09:01:09'),
(66, 5, '2024-07-02 23:45:35', '2024-07-03 00:45:35', '2024-07-03 00:45:35'),
(67, 5, '2024-07-03 00:52:25', '2024-07-03 00:59:35', '2024-07-03 01:52:25'),
(68, 5, '2024-07-03 02:18:50', '2024-07-03 02:24:54', '2024-07-03 03:18:50'),
(69, 5, '2024-07-03 02:25:18', '2024-07-03 02:47:30', '2024-07-03 03:25:18'),
(70, 5, '2024-07-03 03:57:51', '2024-07-03 04:09:32', '2024-07-03 04:57:51'),
(71, 5, '2024-07-07 02:35:00', '2024-07-07 03:10:56', '2024-07-07 03:35:00'),
(72, 2, '2024-07-07 03:11:07', '2024-07-07 03:11:12', '2024-07-07 04:11:07'),
(73, 2, '2024-07-07 03:13:49', NULL, '2024-07-07 04:13:49'),
(74, 6, '2024-07-07 03:14:06', '2024-07-07 03:14:10', '2024-07-07 04:14:06'),
(75, 5, '2024-07-07 03:19:44', '2024-07-07 03:23:28', '2024-07-07 04:19:44'),
(76, 5, '2024-07-07 03:23:35', '2024-07-07 03:24:33', '2024-07-07 04:23:35'),
(77, 5, '2024-07-07 09:47:06', '2024-07-07 09:52:34', '2024-07-07 10:47:06'),
(78, 5, '2024-07-07 09:52:41', '2024-07-07 10:22:13', '2024-07-07 10:52:41'),
(79, 5, '2024-07-08 03:38:23', NULL, '2024-07-08 04:38:23'),
(80, 5, '2024-07-08 10:46:53', '2024-07-08 11:12:35', '2024-07-08 11:46:53'),
(81, 5, '2024-07-10 06:52:11', '2024-07-10 07:52:11', '2024-07-10 07:52:11'),
(82, 5, '2024-07-10 07:55:51', NULL, '2024-07-10 08:55:51'),
(83, 5, '2024-07-11 11:18:50', '2024-07-11 12:18:50', '2024-07-11 12:18:50'),
(84, 5, '2024-07-11 12:19:27', '2024-07-11 13:16:48', '2024-07-11 13:19:27'),
(85, 2, '2024-07-11 13:16:58', '2024-07-11 13:17:04', '2024-07-11 14:16:58'),
(86, 5, '2024-07-12 08:18:41', '2024-07-12 09:18:41', '2024-07-12 09:18:41'),
(87, 5, '2024-07-12 09:33:45', '2024-07-12 10:33:45', '2024-07-12 10:33:45'),
(88, 6, '2024-07-12 10:14:53', '2024-07-12 10:14:56', '2024-07-12 11:14:53'),
(89, 5, '2024-07-12 11:41:12', '2024-07-12 12:41:12', '2024-07-12 12:41:12'),
(90, 5, '2024-07-12 12:42:40', '2024-07-12 13:33:55', '2024-07-12 13:42:40'),
(91, 5, '2024-07-13 05:55:50', '2024-07-13 06:06:24', '2024-07-13 06:55:50'),
(92, 5, '2024-07-13 06:06:31', '2024-07-13 06:32:23', '2024-07-13 07:06:31'),
(93, 5, '2024-07-13 06:32:36', '2024-07-13 06:40:00', '2024-07-13 07:32:36'),
(94, 5, '2024-07-13 06:40:10', '2024-07-13 07:12:29', '2024-07-13 07:40:10'),
(95, 5, '2024-07-13 07:13:44', '2024-07-13 07:22:14', '2024-07-13 08:13:44'),
(96, 5, '2024-07-13 07:22:57', '2024-07-13 07:23:15', '2024-07-13 08:22:57'),
(97, 5, '2024-07-13 09:03:35', '2024-07-13 09:05:05', '2024-07-13 10:03:35'),
(98, 5, '2024-07-13 13:17:07', '2024-07-13 13:17:17', '2024-07-13 14:17:07'),
(99, 5, '2024-07-13 14:26:15', '2024-07-13 14:27:02', '2024-07-13 15:26:15'),
(100, 5, '2024-07-14 09:42:37', '2024-07-14 10:06:24', '2024-07-14 10:42:37'),
(101, 5, '2024-07-14 18:20:51', '2024-07-14 18:53:25', '2024-07-14 19:20:51'),
(102, 5, '2024-07-14 19:11:33', '2024-07-14 19:14:53', '2024-07-14 20:11:33'),
(103, 5, '2024-07-16 03:41:29', '2024-07-16 04:41:29', '2024-07-16 04:41:29'),
(104, 5, '2024-07-16 07:21:36', '2024-07-16 08:21:36', '2024-07-16 08:21:36'),
(105, 6, '2024-07-16 08:05:22', NULL, '2024-07-16 09:05:22'),
(106, 6, '2024-07-16 08:05:39', '2024-07-16 08:06:44', '2024-07-16 09:05:39'),
(107, 5, '2024-07-16 19:01:25', '2024-07-16 20:01:25', '2024-07-16 20:01:25'),
(108, 5, '2024-07-16 20:05:59', '2024-07-16 20:38:31', '2024-07-16 21:05:59'),
(109, 5, '2024-07-17 06:15:58', '2024-07-17 07:15:58', '2024-07-17 07:15:58'),
(110, 5, '2024-07-17 10:51:30', '2024-07-17 11:51:30', '2024-07-17 11:51:30'),
(111, 5, '2024-07-17 12:55:42', '2024-07-17 13:24:05', '2024-07-17 13:55:42'),
(112, 5, '2024-07-18 03:51:16', '2024-07-18 04:51:16', '2024-07-18 04:51:16'),
(113, 5, '2024-07-18 04:52:41', '2024-07-18 05:52:41', '2024-07-18 05:52:41'),
(114, 5, '2024-07-18 05:56:37', '2024-07-18 06:09:46', '2024-07-18 06:56:37'),
(115, 5, '2024-07-18 11:03:24', '2024-07-18 12:03:24', '2024-07-18 12:03:24'),
(116, 5, '2024-07-18 12:04:02', '2024-07-18 13:54:16', '2024-07-18 13:04:02'),
(117, 5, '2024-07-19 02:24:17', '2024-07-19 03:24:17', '2024-07-19 03:24:17'),
(118, 5, '2024-07-19 03:26:29', NULL, '2024-07-19 04:26:29'),
(119, 5, '2024-07-19 03:26:40', '2024-07-19 03:27:59', '2024-07-19 04:26:40'),
(120, 2, '2024-07-19 06:27:55', '2024-07-19 07:09:45', '2024-07-19 07:27:55'),
(121, 5, '2024-07-19 07:10:44', '2024-07-19 07:10:49', '2024-07-19 08:10:44'),
(122, 5, '2024-07-19 07:13:46', '2024-07-19 07:13:51', '2024-07-19 08:13:46'),
(123, 2, '2024-07-21 08:24:29', '2024-07-21 08:24:40', '2024-07-21 09:24:29'),
(124, 2, '2024-07-24 07:48:40', '2024-07-24 08:48:40', '2024-07-24 08:48:40'),
(125, 2, '2024-07-24 09:07:06', NULL, '2024-07-24 10:07:06'),
(126, 2, '2024-07-24 09:07:31', '2024-07-24 09:23:50', '2024-07-24 10:07:31'),
(127, 2, '2024-07-24 09:29:32', '2024-07-24 10:29:32', '2024-07-24 10:29:32'),
(128, 2, '2024-07-24 17:09:46', '2024-07-24 17:42:30', '2024-07-24 18:09:46'),
(129, 2, '2024-07-24 23:17:41', '2024-07-25 00:17:41', '2024-07-25 00:17:41'),
(130, 2, '2024-07-25 00:34:51', '2024-07-25 01:34:51', '2024-07-25 01:34:51'),
(131, 2, '2024-07-25 01:38:19', '2024-07-25 02:38:19', '2024-07-25 02:38:19'),
(132, 6, '2024-07-25 02:39:54', '2024-07-25 03:39:54', '2024-07-25 03:39:54'),
(133, 2, '2024-07-25 03:55:00', '2024-07-25 04:55:00', '2024-07-25 04:55:00'),
(134, 2, '2024-07-25 05:24:50', '2024-07-25 05:43:32', '2024-07-25 06:24:50'),
(135, 6, '2024-07-25 05:52:20', '2024-07-25 06:52:20', '2024-07-25 06:52:20'),
(136, 2, '2024-07-25 06:52:49', '2024-07-25 07:11:26', '2024-07-25 07:52:49'),
(137, 2, '2024-07-25 09:28:50', '2024-07-25 10:28:50', '2024-07-25 10:28:50'),
(138, 2, '2024-07-25 10:35:48', '2024-07-25 11:35:48', '2024-07-25 11:35:48'),
(139, 2, '2024-07-25 11:41:07', '2024-07-25 11:46:04', '2024-07-25 12:41:07'),
(140, 5, '2024-07-25 11:46:20', '2024-07-25 12:46:20', '2024-07-25 12:46:20'),
(141, 5, '2024-07-25 13:33:17', '2024-07-25 14:36:58', '2024-07-25 14:33:17'),
(142, 5, '2024-07-25 18:29:29', '2024-07-25 18:45:16', '2024-07-25 19:29:29'),
(143, 5, '2024-07-25 18:59:50', '2024-07-25 19:05:35', '2024-07-25 19:59:50'),
(144, 2, '2024-07-25 19:05:45', '2024-07-25 19:06:47', '2024-07-25 20:05:45'),
(145, 5, '2024-07-26 02:28:08', '2024-07-26 02:38:14', '2024-07-26 03:28:08'),
(146, 2, '2024-07-26 02:38:22', '2024-07-26 02:41:54', '2024-07-26 03:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `puskesmas`
--

CREATE TABLE `puskesmas` (
  `IdPuskesmas` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Kecamatan` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `puskesmas`
--

INSERT INTO `puskesmas` (`IdPuskesmas`, `Nama`, `Alamat`, `Kecamatan`, `email`) VALUES
('P001SBW', 'PUSKESMAS ALAS', 'Jl.Pahlawan No.45 Desa Dalam', 'Alas', 'puskesmas.alas@yahoo.com'),
('P002SBW', 'PUSKESMAS ALAS BARAT', 'Jl. Pendidikan Nomor 1 Desa Lekong', 'Alas Barat', 'pkmalasbarat46@gmail.com'),
('P003SBW', 'PUSKESMAS BATULANTEH', 'Jl. Raya Semongkat - Batudulang KM 17 Desa Klungkung', 'Batulanteh ', 'pkmbatulanteh@gmail.com'),
('P004SBW', 'PUSKESMAS BUER', 'Jl. Lintas Sumbawa - Tano KM 61', 'Buer', 'puskesmasbuer@gmail.com'),
('P005SBW', 'PUSKESMAS EMPANG', 'Jl. Lintas Sumbawa Bima KM 92 Desa Pamanto ', 'Empang', 'puskesmasempang92@gmail.com'),
('P006SBW', 'PUSKESMAS LAPE', 'Jl. Lintas Sumbwa Bima KM 38 Desa Lape', 'Lape', 'puskesmaslape@gmail.com'),
('P007SBW', 'PUSKESMAS LABANGKA', 'Jl. Lingkar Selatan Desa Sukadamai', 'Labangka', 'uptpuskesmaslabangka@gmail.com'),
('P008SBW', 'PUSKESMAS LAB.BADAS UNIT I', 'Dsn. Kalibaru RT 001 RW 012 Desa Lab. Sumbawa', 'Labuhan Badas', 'puskesmaslabuhanbadasunit1@gmail.com'),
('P009SBW', 'PUSKESMAS LAB.BADAS UNIT II', 'Dsn. Sebotok Desa Sebotok', 'Labuhan Badas', 'pkm.sebotok@gmail.com'),
('P010SBW', 'PUSKESMAS PELAMPANG', 'Jl. Lintas Sumbawa Bima KM 62 Desa Plampang', 'Plampang', 'puskesmasplampang@gmail.com'),
('P011SBW', 'PUSKESMAS LENANGGUAR', 'Jl. Raya Sumbawa Lunyuk KM 40 Desa Lenangguar', 'Lenangguar', 'lenangguarpuskesmas@gmail.com'),
('P012SBW', 'PUSKESMAS LANTUNG', 'Jl. Lintas Sumbawa Ropang Desa Ai Mual', 'Lantung', 'puskesmas.lantung@gmail.com'),
('P013SBW', 'PUSKESMAS LUNYUK', 'Jl. Raya Padasuka - Sukamaju Desa Padasuka', 'Lunyuk', 'pkm_lunyuk@yahoo.co.id'),
('P014SBW', 'PUSKESMAS LOPOK', 'Jl. Lintas Sumbawa Bima KM 23 Desa Lopok', 'Lopok', 'upt.puskesmaslopok@gmail.com'),
('P015SBW', 'PUSKESMAS MARONGE', 'Jl. Lintas Sumbawa Bima KM 41 Desa Simu', 'Maronge', 'pkmmaronge@gmail.com'),
('P016SBW', 'PUSKESMAS MOYO UTARA', 'Jl. Raya Sabang Desa Sebewe', 'Moyo Utara', 'puskesmasmoyoutara@gmail.com'),
('P017SBW', 'PUSKESMAS MOYO HILIR', 'Jl. Pendidikan No. 1 Desa Berare', 'Moyo Hilir', 'pkmmoyohilir@gmail.com'),
('P018SBW', 'PUSKESMAS MOYO HULU', 'Jl. Lintas Sumbawa Lunyuk KM 21 Dsn. Pandansari Desa Maman', 'Moyo Hulu', 'pkmmoyohulu18@gmail.com'),
('P019SBW', 'PUSKESMAS ORONG TELU', 'RT 004 RW 001 Desa Sebeok', 'Orong Telu', 'pkmortel2023@gmail.com'),
('P020SBW', 'PUSKESMAS RHEE', 'Jl. Lintas Sumbawa Tano KM 33 Desa Rhee', 'Rhee', 'upt.pkmrhee@gmail.com'),
('P021SBW', 'PUSKESMAS ROPANG', 'Jl. Usaha Tani No. 01 Desa Ropang', 'Ropang', 'puskesmaskecamatanropang@gmail.com'),
('P022SBW', 'PUSKESMAS SUMBAWA UNIT I', 'Jl. Setia Budi No.5 Kelurahan Seketeng', 'Sumbawa', 'bendaharaunit1@gmail.com'),
('P023SBW', 'PUSKESMAS SUMBAWA UNIT II', 'Jl. Cendrawasih No.144 Kelurahan Brang Biji', 'Sumbawa', 'pkmunitduasumbawa@gmail.com'),
('P024SBW', 'PUSKESMAS TARANO', 'Jl. Lintas Sumbawa Tano KM 100 Desa Lab. Bontong', 'Tarano', 'puskesmastarano@gmail.com'),
('P025SBW', 'PUSKESMAS UNTER IWES', 'Jl. Unter Iwes No. 7 Desa Kerato', 'Unter Iwes', 'pkmui07@gmail.com'),
('P026SBW', 'PUSKESMAS UTAN', 'Jl. Lintas Sumbawa - Tano KM 46', 'Utan', 'puskesmas.utan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `targetlayanan`
--

CREATE TABLE `targetlayanan` (
  `IdLayanan` varchar(255) NOT NULL,
  `IdIndikator` int NOT NULL,
  `KatLayanan` char(1) NOT NULL,
  `Detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `JmlhTargetTHN` int NOT NULL,
  `Anggaran` decimal(15,2) NOT NULL,
  `Tahun` year NOT NULL,
  `IdPuskesmas` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `targetlayanan`
--

INSERT INTO `targetlayanan` (`IdLayanan`, `IdIndikator`, `KatLayanan`, `Detail`, `JmlhTargetTHN`, `Anggaran`, `Tahun`, `IdPuskesmas`) VALUES
('10AP001SBW2024', 10, 'A', NULL, 100, 100000.00, '2024', 'P001SBW'),
('10AP022SBW2024', 10, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('10BP001SBW2024', 10, 'B', NULL, 100, 100000.00, '2024', 'P001SBW'),
('10BP022SBW2024', 10, 'B', NULL, 100, 1000.00, '2024', 'P022SBW'),
('11AP001SBW2024', 11, 'A', NULL, 100, 100000.00, '2024', 'P001SBW'),
('11AP022SBW2024', 11, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('11BP001SBW2024', 11, 'B', NULL, 100, 100000.00, '2024', 'P001SBW'),
('11BP022SBW2024', 11, 'B', NULL, 100, 1000.00, '2024', 'P022SBW'),
('12AP001SBW2024', 12, 'A', NULL, 1000, 100000.00, '2024', 'P001SBW'),
('12AP022SBW2024', 12, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('12BP001SBW2024', 12, 'B', NULL, 100, 100000.00, '2024', 'P001SBW'),
('12BP022SBW2024', 12, 'B', NULL, 100, 1000.00, '2024', 'P022SBW'),
('1AP001SBW2024', 1, 'A', NULL, 1000, 100000.00, '2024', 'P001SBW'),
('1AP022SBW2024', 1, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('1BP001SBW2024', 1, 'B', NULL, 10, 100000.00, '2024', 'P001SBW'),
('1BP022SBW2024', 1, 'B', NULL, 100, 1000.00, '2024', 'P022SBW'),
('2AP001SBW2024', 2, 'A', NULL, 2000, 100000.00, '2024', 'P001SBW'),
('2AP022SBW2024', 2, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('2BP001SBW2024', 2, 'B', NULL, 200, 100000.00, '2024', 'P001SBW'),
('2BP022SBW2024', 2, 'B', NULL, 100, 1000.00, '2024', 'P022SBW'),
('3AP001SBW2024', 3, 'A', NULL, 100, 100000.00, '2024', 'P001SBW'),
('3AP022SBW2024', 3, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('3BP001SBW2024', 3, 'B', NULL, 100, 100000.00, '2024', 'P001SBW'),
('3BP022SBW2024', 3, 'B', NULL, 100, 1000.00, '2024', 'P022SBW'),
('4AP001SBW2024', 4, 'A', NULL, 100, 100000.00, '2024', 'P001SBW'),
('4AP022SBW2024', 4, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('4BP001SBW2024', 4, 'B', NULL, 100, 100000.00, '2024', 'P001SBW'),
('4BP022SBW2024', 4, 'B', NULL, 100, 1000.00, '2024', 'P022SBW'),
('5AP001SBW2024', 5, 'A', NULL, 100, 100000.00, '2024', 'P001SBW'),
('5AP022SBW2024', 5, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('5BP001SBW2024', 5, 'B', NULL, 100, 100000.00, '2024', 'P001SBW'),
('5BP022SBW2024', 5, 'B', NULL, 100, 1000.00, '2024', 'P022SBW'),
('6AP001SBW2024', 6, 'A', NULL, 100, 100000.00, '2024', 'P001SBW'),
('6AP022SBW2024', 6, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('6BP001SBW2024', 6, 'B', NULL, 100, 100000.00, '2024', 'P001SBW'),
('6BP022SBW2024', 6, 'B', NULL, 100, 1000.00, '2024', 'P022SBW'),
('7AP001SBW2024', 7, 'A', NULL, 100, 100000.00, '2024', 'P001SBW'),
('7AP022SBW2024', 7, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('7BP001SBW2024', 7, 'B', NULL, 100, 100000.00, '2024', 'P001SBW'),
('7BP022SBW2024', 7, 'B', NULL, 100, 1000.00, '2024', 'P022SBW'),
('8AP001SBW2024', 8, 'A', NULL, 100, 100000.00, '2024', 'P001SBW'),
('8AP022SBW2024', 8, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('8BP001SBW2024', 8, 'B', NULL, 100, 100000.00, '2024', 'P001SBW'),
('8BP022SBW2024', 8, 'B', NULL, 100, 1000.00, '2024', 'P022SBW'),
('9AP001SBW2024', 9, 'A', NULL, 100, 100000.00, '2024', 'P001SBW'),
('9AP022SBW2024', 9, 'A', NULL, 100, 1000.00, '2024', 'P022SBW'),
('9BP001SBW2024', 9, 'B', NULL, 100, 100000.00, '2024', 'P001SBW'),
('9BP022SBW2024', 9, 'B', NULL, 100, 1000.00, '2024', 'P022SBW');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IdUser` int NOT NULL,
  `Nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `NoTelpon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(1) NOT NULL,
  `IdPuskesmas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `Nama`, `Alamat`, `NoTelpon`, `username`, `password`, `Status`, `created_at`, `updated_at`, `role`, `IdPuskesmas`) VALUES
(2, 'Bagas', 'Moyo Hilir', '08976511231', 'OPT001', '$2y$12$ovEDa.JsF.aehc0Wprx8vuSLAqLpKbdCRTzNkPbFushPcfgMScgiy', 1, '2024-06-04 07:26:01', '2024-07-11 11:50:29', 0, 'P022SBW'),
(5, 'Asep', NULL, NULL, 'DinKes', '$2y$12$OJWGDA12V3dO0c/0t62TZerMmoOmvIMRk7oxJKugx9iKg3pVpPfCm', 1, '2024-06-04 00:26:46', '2024-07-13 07:23:13', 1, NULL),
(6, 'Ivan', 'Jl.Pahlawan No.45 Desa Dalam', '085337363939', 'OPT002', '$2y$12$VMLGJ/5sb6abo94OXmg3vOTzy5ijuGQ6/1OpqT.JHVLail/RPGg0a', 1, '2024-07-07 03:08:57', '2024-07-18 11:44:38', 0, 'P001SBW'),
(8, 'Nanda', 'Pure Cahaya', '088225322173', 'OPT003', '$2y$12$SgJGuB9X8HIgkhvSC1SrE.Aa8lMk7t3KOo/5u525hjdks0lbEAIZ2', 0, '2024-07-11 11:32:37', '2024-07-11 12:05:43', 0, 'P022SBW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capaian`
--
ALTER TABLE `capaian`
  ADD PRIMARY KEY (`IdCapaian`),
  ADD KEY `IdLayanan` (`IdLayanan`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`IdIndikator`);

--
-- Indexes for table `inputc`
--
ALTER TABLE `inputc`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdCapaian` (`IdCapaian`),
  ADD KEY `IdUser` (`IdUser`);

--
-- Indexes for table `logacces`
--
ALTER TABLE `logacces`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `IdUser` (`IdUser`);

--
-- Indexes for table `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`IdPuskesmas`);

--
-- Indexes for table `targetlayanan`
--
ALTER TABLE `targetlayanan`
  ADD PRIMARY KEY (`IdLayanan`),
  ADD KEY `IdIndikator` (`IdIndikator`),
  ADD KEY `IdPuskesmas` (`IdPuskesmas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`),
  ADD KEY `IdPuskesmas` (`IdPuskesmas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `IdIndikator` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inputc`
--
ALTER TABLE `inputc`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logacces`
--
ALTER TABLE `logacces`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capaian`
--
ALTER TABLE `capaian`
  ADD CONSTRAINT `capaian_ibfk_1` FOREIGN KEY (`IdLayanan`) REFERENCES `targetlayanan` (`IdLayanan`);

--
-- Constraints for table `inputc`
--
ALTER TABLE `inputc`
  ADD CONSTRAINT `inputc_ibfk_1` FOREIGN KEY (`IdCapaian`) REFERENCES `capaian` (`IdCapaian`),
  ADD CONSTRAINT `inputc_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `users` (`IdUser`);

--
-- Constraints for table `logacces`
--
ALTER TABLE `logacces`
  ADD CONSTRAINT `logacces_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `users` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `targetlayanan`
--
ALTER TABLE `targetlayanan`
  ADD CONSTRAINT `targetlayanan_ibfk_1` FOREIGN KEY (`IdIndikator`) REFERENCES `indikator` (`IdIndikator`),
  ADD CONSTRAINT `targetlayanan_ibfk_2` FOREIGN KEY (`IdPuskesmas`) REFERENCES `puskesmas` (`IdPuskesmas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`IdPuskesmas`) REFERENCES `puskesmas` (`IdPuskesmas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
