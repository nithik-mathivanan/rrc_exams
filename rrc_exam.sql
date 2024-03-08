-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 07:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rrc_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_exam_name`
--

CREATE TABLE `bank_exam_name` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_exam_name`
--

INSERT INTO `bank_exam_name` (`id`, `exam_name`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(4, 'sample exam', '1', 0, '2023-10-17 04:00:07', '2023-10-21 12:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `bank_mark`
--

CREATE TABLE `bank_mark` (
  `id` int(11) NOT NULL,
  `mob_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `english` varchar(100) NOT NULL,
  `aptitude` varchar(100) NOT NULL,
  `reasoning` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `exam` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_mark`
--

INSERT INTO `bank_mark` (`id`, `mob_no`, `name`, `english`, `aptitude`, `reasoning`, `total`, `exam`, `updated_at`, `created_at`) VALUES
(7, '7448556179', 'Sathyendran.K', '23.75', '22.75', '35', '81.50', '4', '2023-10-11 11:32:44', '2023-10-11 11:32:44'),
(8, '9159321698', 'Silambarasi.T', '1.25', '11.50', '18', '30.75', '1', '2023-10-11 11:34:17', '2023-10-11 11:34:17'),
(9, '7358882763', 'Kethaiyal.T', '-5.0', '6.25', '-1.25', '0', '6', '2023-10-11 11:35:27', '2023-10-11 11:35:27'),
(10, '7538873313', 'Shalini.K', '7.5', '20.75', '28', '56.25', '6', '2023-10-11 11:36:58', '2023-10-11 11:36:58'),
(11, '7358891189', 'Akshayasri.R', '11', '23.75', '33.75', '68.5', '4', '2023-10-11 11:38:07', '2023-10-11 11:38:07'),
(12, '9087654321', 'admin', '25.5', '26.7', '-39', '90', '3', '2023-10-18 01:18:15', '2023-10-18 01:18:15'),
(13, '9876543201', 'harish', '25.5', '26', '-45', '90', '3', '2023-10-18 01:21:00', '2023-10-18 01:21:00'),
(14, '9807654321', 'aravinth', '25.5', '26', '-38', '98', '1', '2023-10-18 01:35:41', '2023-10-18 01:35:41'),
(15, '9456789032', 'nathan', '25.5', '26.7', '-38', '90', '3', '2023-10-18 01:38:10', '2023-10-18 01:38:10'),
(16, '9870987654', 'nithik', '5', '26.7', '-38', '98', '3', '2023-10-18 01:53:39', '2023-10-18 01:53:39'),
(17, '9870346467', 'harish', '25.5', '26.7', '-39', '90', '3', '2023-10-19 02:59:38', '2023-10-19 02:59:38'),
(18, '9075467435', 'aravinth', '25.5', '26.7', '23', '98', '3', '2023-10-20 11:24:43', '2023-10-20 11:24:43'),
(21, '9075467435', 'nathan', '25.5', '26.7', '34', '90', '3', '2023-10-21 01:24:19', '2023-10-21 01:24:19'),
(22, '9075467435', 'admin', '29', '26.7', '23', '98', '3', '2023-10-21 01:27:50', '2023-10-21 01:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `ca_exam`
--

CREATE TABLE `ca_exam` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ca_exam`
--

INSERT INTO `ca_exam` (`id`, `name`, `type`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'sample', 2, 0, 0, '2024-01-11 04:15:19', '2024-01-12 17:37:24'),
(4, 'CA Seminar Exam', 1, 1, 0, '2024-01-12 17:36:43', '2024-01-12 17:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `ca_foundation`
--

CREATE TABLE `ca_foundation` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `mob` varchar(100) NOT NULL,
  `accounts` varchar(100) NOT NULL,
  `business_law` varchar(100) NOT NULL,
  `quantitative_aptitude` varchar(100) NOT NULL,
  `business_economics` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `exam` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ca_inter`
--

CREATE TABLE `ca_inter` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `mob` varchar(100) NOT NULL,
  `advanced_accounting` varchar(100) NOT NULL,
  `COL` varchar(100) NOT NULL,
  `taxation` varchar(100) NOT NULL,
  `CMA` varchar(100) NOT NULL,
  `auditing_ethics` varchar(100) NOT NULL,
  `financial_management` varchar(100) NOT NULL,
  `strategic_management` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `exam` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cma_inter`
--

CREATE TABLE `cma_inter` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mob` varchar(100) NOT NULL,
  `BLE` varchar(100) NOT NULL,
  `financial_accounting` varchar(100) NOT NULL,
  `DIT` varchar(100) NOT NULL,
  `cost_accounting` varchar(100) NOT NULL,
  `OMSM` varchar(100) NOT NULL,
  `CAA` varchar(100) NOT NULL,
  `FMBDA` varchar(100) NOT NULL,
  `Management_accounting` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `exam` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_input`
--

CREATE TABLE `exam_input` (
  `id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `venue` varchar(1000) NOT NULL,
  `qp_medium` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_input`
--

INSERT INTO `exam_input` (`id`, `department`, `date`, `time`, `venue`, `qp_medium`, `created_at`, `updated_at`) VALUES
(1, 'tnpsc', '2023-10-08', '10:30 am', 'RRC Educational Trust - Seminar Hall,\n              Deen Complex,Marrys Corner \n                 Thanjavur.', 'tamil', '2023-10-19 10:42:01', '2023-10-19 11:06:24'),
(2, 'bank', '2023-10-14', '10:30 am', 'rrc bank', 'tamil', '2023-10-19 10:42:01', '2023-10-19 11:20:10'),
(3, 'neet', '2023-10-15', '10:30 am', 'rrc neet', 'english', '2023-10-19 10:49:08', '2023-10-19 11:24:14'),
(4, 'jee', '2023-10-01', '10:30 am', 'rrc jee', 'english', '2023-10-19 10:49:08', '2023-10-20 00:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jee_exam_name`
--

CREATE TABLE `jee_exam_name` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jee_exam_name`
--

INSERT INTO `jee_exam_name` (`id`, `exam_name`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'sample exam', '0', 0, '2023-10-16 02:23:23', '2023-10-28 16:43:23'),
(6, 'October 15 2023 JEE Model Exam', '0', 0, '2023-10-25 15:05:10', '2023-10-28 16:43:23'),
(7, 'Jee Model Exam Oct 15', '1', 0, '2023-10-28 16:43:02', '2023-10-28 16:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `jee_mark`
--

CREATE TABLE `jee_mark` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `physics` varchar(100) NOT NULL,
  `chemistry` varchar(100) NOT NULL,
  `maths` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `exam` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jee_mark`
--

INSERT INTO `jee_mark` (`id`, `name`, `number`, `physics`, `chemistry`, `maths`, `total`, `exam`, `created_at`, `updated_at`) VALUES
(4, 'T.Nithik', '7373852811', '20', '30', '15', '65', '7', '2023-10-28 16:44:45', '2023-10-28 16:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `neet_exam_name`
--

CREATE TABLE `neet_exam_name` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `neet_exam_name`
--

INSERT INTO `neet_exam_name` (`id`, `exam_name`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(9, 'sample exam', '0', 0, '2023-10-25 10:10:38', '2023-10-25 15:02:51'),
(10, 'October 15 2023', '0', 1, '2023-10-25 14:58:42', '2023-10-25 15:02:51'),
(11, 'October 15 2023', '0', 1, '2023-10-25 14:58:55', '2023-10-25 15:02:51'),
(12, 'October 15 2023', '0', 1, '2023-10-25 14:59:07', '2023-10-25 15:02:51'),
(13, 'October 15 2023 NEET Model Exam', '1', 0, '2023-10-25 15:00:06', '2023-10-25 15:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `neet_mark`
--

CREATE TABLE `neet_mark` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `physics` varchar(100) NOT NULL,
  `chemistry` varchar(100) NOT NULL,
  `biology` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `exam` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `neet_mark`
--

INSERT INTO `neet_mark` (`id`, `name`, `number`, `physics`, `chemistry`, `biology`, `total`, `exam`, `created_at`, `updated_at`) VALUES
(9, 'Varshini M', '7806859107', '60', '80', '70', '210', '13', '2023-10-25 15:36:47', '2023-10-25 15:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `speech`
--

CREATE TABLE `speech` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mark` int(11) NOT NULL,
  `selected` varchar(1000) NOT NULL,
  `notselected` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1<=active event',
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speech`
--

INSERT INTO `speech` (`id`, `name`, `mark`, `selected`, `notselected`, `status`, `is_deleted`, `Created_at`, `Updated_at`) VALUES
(1, 'speech competition', 0, '', '', 0, 1, '2023-12-11 07:49:40', '2024-01-05 09:34:32'),
(4, 'English Speech Competition(03/12/2023)', 0, '', '', 0, 1, '2023-12-14 09:42:45', '2024-01-05 09:34:32'),
(5, 'English Speeech', 0, '', '', 0, 1, '2023-12-27 06:55:29', '2024-01-05 09:34:32'),
(6, 'English Speech Competition', 0, '', '', 0, 1, '2024-01-04 04:55:08', '2024-01-05 09:34:37'),
(7, 'English Speech Competition', 0, '', '', 1, 0, '2024-01-05 09:34:13', '2024-01-05 09:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `speech_score`
--

CREATE TABLE `speech_score` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `event` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0<=not selected,1<=selected',
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speech_score`
--

INSERT INTO `speech_score` (`id`, `name`, `number`, `title`, `event`, `score`, `status`, `Created_at`, `Updated_at`) VALUES
(7, 'Varshini M', '7806859107', 'Hard Work or Smart Work', 4, 150, 1, '2023-12-27 10:54:10', '2023-12-27 10:54:10'),
(8, 'Kanimozhi.M', '8015696970', 'Hard Work or Smart Work', 4, 180, 0, '2023-12-27 10:54:49', '2023-12-27 10:54:49'),
(10, 'example', '9047232157', 'speech', 6, 100, 1, '2024-01-04 11:29:17', '2024-01-04 11:29:17'),
(11, 'nithik', '9807657667', 'sppech', 6, 180, 0, '2024-01-04 11:30:30', '2024-01-04 11:30:30'),
(12, 'varshini', '1234567890', 'hhh', 6, 120, 1, '2024-01-04 11:43:12', '2024-01-04 11:43:12'),
(13, 'Varshini', '7806859107', ',hgcvbnm,', 6, 150, 1, '2024-01-04 11:43:54', '2024-01-04 11:43:54'),
(14, 'sangeetrha', '7356789877', '656cgh444', 6, 123, 0, '2024-01-04 11:44:53', '2024-01-04 11:44:53'),
(15, 'Sara Shalini.S', '8015804580', 'dggfgbl', 6, 345, 1, '2024-01-04 18:08:12', '2024-01-04 18:08:12'),
(16, 'Arshiya Fathima.Z', '9976708654', 'My Dream Country', 7, 272, 1, '2024-01-05 14:36:39', '2024-01-05 14:36:39'),
(17, 'Bhavadharani.S', '6382558248', 'Education Shaping One\'s Destiny', 7, 266, 1, '2024-01-05 14:41:47', '2024-01-05 14:41:47'),
(18, 'Kargulali R.S', '9952633901', 'My Country in 2024', 7, 262, 1, '2024-01-05 14:44:56', '2024-01-05 14:44:56'),
(19, 'Anu Priya.S', '9361076527', 'Hard Work or Smart Work', 7, 261, 0, '2024-01-05 14:47:52', '2024-01-05 14:47:52'),
(20, 'Tamizhisai.P', '770810755', 'Education Shaping one\'s Destiny', 7, 254, 0, '2024-01-05 14:49:25', '2024-01-05 14:49:25'),
(21, 'Harini.S', '8838928304', 'My Dream Teacher', 7, 252, 0, '2024-01-05 14:52:45', '2024-01-05 14:52:45'),
(22, 'S.F.Muhammed jabbar', '8807654212', 'The Importance of education', 7, 245, 0, '2024-01-05 16:22:43', '2024-01-05 16:22:43'),
(23, 'H.HANIYA NAVREEN', '9003427942', 'Education Shaping one\'s destiny', 7, 242, 0, '2024-01-05 16:24:30', '2024-01-05 16:24:30'),
(24, 'Shameem banu.s', '9994014459', 'My Country in 2047', 7, 239, 0, '2024-01-05 16:30:13', '2024-01-05 16:30:13'),
(25, 'S Atchaya', '9344762789', 'The Importance of education', 7, 238, 0, '2024-01-05 16:32:41', '2024-01-05 16:32:41'),
(26, 'Abigail', '9965344436', 'Hard Work or Smart Work', 7, 236, 0, '2024-01-05 16:33:51', '2024-01-05 16:33:51'),
(28, 'Dhanush Sree D', '8056551206', 'My Country in 2047', 7, 232, 0, '2024-01-05 16:36:42', '2024-01-05 16:36:42'),
(29, 'VeeraRaghavan R', '9789622422', 'My Country in 2047', 7, 231, 0, '2024-01-05 16:37:36', '2024-01-05 16:37:36'),
(30, 'MERSLIN', '9500984730', 'Education Shaping one\'s destiny', 7, 227, 0, '2024-01-05 16:38:55', '2024-01-05 16:38:55'),
(32, 'Janani A', '9791402590', 'The Importance of Education', 7, 209, 0, '2024-01-05 16:42:03', '2024-01-05 16:42:03'),
(33, 'Daya Pradeepa', '9443662547', 'My Dream Teacher', 7, 213, 0, '2024-01-05 16:42:46', '2024-01-05 16:42:46'),
(34, 'Janani S', '6381535099', 'My Dream Teacher', 7, 209, 0, '2024-01-05 16:43:22', '2024-01-05 16:43:22'),
(35, 'Kishan Kumar', '9790800608', 'Hard Work or Smart Work', 7, 166, 0, '2024-01-05 16:43:57', '2024-01-05 16:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `tnpsc_exam_name`
--

CREATE TABLE `tnpsc_exam_name` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tnpsc_exam_name`
--

INSERT INTO `tnpsc_exam_name` (`id`, `exam_name`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, 'sample exam', '1', 0, '2023-10-17 02:04:58', '2023-10-20 07:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `tnpsc_result`
--

CREATE TABLE `tnpsc_result` (
  `id` int(11) NOT NULL,
  `mob_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tamil` varchar(100) NOT NULL,
  `gs` varchar(100) NOT NULL,
  `exam` varchar(100) DEFAULT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tnpsc_result`
--

INSERT INTO `tnpsc_result` (`id`, `mob_no`, `name`, `tamil`, `gs`, `exam`, `Created_at`, `Updated_at`) VALUES
(57, '7358893298', 'Sangeetha.M', '90', '78', '3', '2023-11-08 07:43:13', '2023-11-08 07:43:13'),
(58, '6385240785', 'R. DivyaDharshini', '66', '27', '3', '2023-11-08 07:57:14', '2023-11-08 07:57:14'),
(59, '9597849782', 'E.Jayalakshmi', '73', '57', '3', '2023-11-08 07:58:50', '2023-11-08 07:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'ADMIN', 'admin@gmail.com', NULL, '$2y$10$wDGL6HTvX2O4gOD6k5NozOKjsHsOG.uZrgs6LopELYjGtpgHZRIJK', NULL, '2023-09-12 12:54:44', '2023-09-12 12:54:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_exam_name`
--
ALTER TABLE `bank_exam_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_mark`
--
ALTER TABLE `bank_mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ca_exam`
--
ALTER TABLE `ca_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ca_foundation`
--
ALTER TABLE `ca_foundation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ca_inter`
--
ALTER TABLE `ca_inter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cma_inter`
--
ALTER TABLE `cma_inter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_input`
--
ALTER TABLE `exam_input`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jee_exam_name`
--
ALTER TABLE `jee_exam_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jee_mark`
--
ALTER TABLE `jee_mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neet_exam_name`
--
ALTER TABLE `neet_exam_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neet_mark`
--
ALTER TABLE `neet_mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `speech`
--
ALTER TABLE `speech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speech_score`
--
ALTER TABLE `speech_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tnpsc_exam_name`
--
ALTER TABLE `tnpsc_exam_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tnpsc_result`
--
ALTER TABLE `tnpsc_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_exam_name`
--
ALTER TABLE `bank_exam_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bank_mark`
--
ALTER TABLE `bank_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ca_exam`
--
ALTER TABLE `ca_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ca_foundation`
--
ALTER TABLE `ca_foundation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ca_inter`
--
ALTER TABLE `ca_inter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cma_inter`
--
ALTER TABLE `cma_inter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_input`
--
ALTER TABLE `exam_input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jee_exam_name`
--
ALTER TABLE `jee_exam_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jee_mark`
--
ALTER TABLE `jee_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `neet_exam_name`
--
ALTER TABLE `neet_exam_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `neet_mark`
--
ALTER TABLE `neet_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speech`
--
ALTER TABLE `speech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `speech_score`
--
ALTER TABLE `speech_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tnpsc_exam_name`
--
ALTER TABLE `tnpsc_exam_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tnpsc_result`
--
ALTER TABLE `tnpsc_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
