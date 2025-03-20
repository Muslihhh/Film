-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2025 at 06:09 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `id_user`, `action`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tambah Film', 'Menambahkan film baru: APAYA', '2025-03-17 04:48:45', '2025-03-17 04:48:45'),
(2, 1, 'Tambah Film', 'Menambahkan film baru: abc', '2025-03-17 06:12:37', '2025-03-17 06:12:37'),
(3, 1, 'Edit Film', 'Mengedit film : APAYA', '2025-03-17 07:31:17', '2025-03-17 07:31:17'),
(4, 1, 'Tambah Film', 'Menambahkan film baru: APAYh', '2025-03-17 07:32:01', '2025-03-17 07:32:01'),
(5, 1, 'Edit Film', 'Mengedit film : abc', '2025-03-17 07:33:08', '2025-03-17 07:33:08'),
(6, 1, 'Edit Film', 'Mengedit film : abc', '2025-03-17 15:31:13', '2025-03-17 15:31:13'),
(7, 1, 'Edit Film', 'Mengedit film : abc', '2025-03-17 15:33:07', '2025-03-17 15:33:07'),
(8, 1, 'Edit Film', 'Mengedit film : abc', '2025-03-17 15:36:04', '2025-03-17 15:36:04'),
(9, 4, 'Tambah Film', 'Menambahkan film baru: Tes', '2025-03-17 15:53:38', '2025-03-17 15:53:38'),
(10, 4, 'Hapus Film', 'Menghapus film : Tes', '2025-03-17 17:52:55', '2025-03-17 17:52:55'),
(11, 1, 'Hapus Film', 'Menghapus film : abc', '2025-03-17 17:53:26', '2025-03-17 17:53:26'),
(12, 1, 'Hapus Film', 'Menghapus film : APAYA', '2025-03-17 17:53:34', '2025-03-17 17:53:34'),
(13, 1, 'Edit Film', 'Mengedit film : APAYh', '2025-03-17 17:57:48', '2025-03-17 17:57:48'),
(14, 1, 'Hapus Film', 'Menghapus film : APAYh', '2025-03-17 17:58:47', '2025-03-17 17:58:47'),
(15, 1, 'Tambah Film', 'Menambahkan film baru: Godzilla: King Of Monster', '2025-03-17 18:00:40', '2025-03-17 18:00:40'),
(16, 1, 'Tambah Film', 'Menambahkan film baru: apu', '2025-03-17 18:01:02', '2025-03-17 18:01:02'),
(17, 1, 'Hapus Film', 'Menghapus film : apu', '2025-03-17 18:01:10', '2025-03-17 18:01:10'),
(18, 1, 'Tambah Film', 'Menambahkan film baru: Jumbo', '2025-03-17 18:03:02', '2025-03-17 18:03:02'),
(19, 1, 'Tambah Film', 'Menambahkan film baru: Komang', '2025-03-17 18:06:57', '2025-03-17 18:06:57'),
(20, 1, 'Tambah Film', 'Menambahkan film baru: Petaka Gunung Gede', '2025-03-17 18:14:00', '2025-03-17 18:14:00'),
(21, 1, 'Tambah Film', 'Menambahkan film baru: 2nd Mirracle In Cell Number 7', '2025-03-17 18:20:18', '2025-03-17 18:20:18'),
(22, 1, 'Tambah Film', 'Menambahkan film baru: Pantaskah Aku Berhijab', '2025-03-17 18:23:21', '2025-03-17 18:23:21'),
(23, 4, 'Tambah Film', 'Menambahkan film baru: Aquaman And The Lost Kingdom', '2025-03-17 18:38:24', '2025-03-17 18:38:24'),
(24, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-17 18:46:37', '2025-03-17 18:46:37'),
(25, 4, 'Tambah Film', 'Menambahkan film baru: APAYA', '2025-03-17 18:59:30', '2025-03-17 18:59:30'),
(26, 4, 'Hapus Film', 'Menghapus film : APAYA', '2025-03-17 18:59:39', '2025-03-17 18:59:39'),
(27, 4, 'Tambah Film', 'Menambahkan film baru: abc', '2025-03-17 19:10:30', '2025-03-17 19:10:30'),
(28, 4, 'Tambah Film', 'Menambahkan film baru: APAYA', '2025-03-17 19:10:53', '2025-03-17 19:10:53'),
(29, 4, 'Edit Film', 'Mengedit film : APAYA', '2025-03-17 19:11:14', '2025-03-17 19:11:14'),
(30, 4, 'Edit Film', 'Mengedit film : abc', '2025-03-17 19:11:37', '2025-03-17 19:11:37'),
(31, 4, 'Edit Film', 'Mengedit film : abc', '2025-03-17 19:12:12', '2025-03-17 19:12:12'),
(32, 4, 'Edit Film', 'Mengedit film : abc', '2025-03-17 19:12:22', '2025-03-17 19:12:22'),
(33, 4, 'Edit Film', 'Mengedit film : APAYA', '2025-03-17 19:13:05', '2025-03-17 19:13:05'),
(34, 4, 'Tambah Film', 'Menambahkan film baru: Aquaman', '2025-03-17 19:15:12', '2025-03-17 19:15:12'),
(35, 4, 'Hapus Film', 'Menghapus film : Aquaman', '2025-03-17 19:16:11', '2025-03-17 19:16:11'),
(36, 4, 'Tambah Film', 'Menambahkan film baru: aquaman', '2025-03-17 19:17:06', '2025-03-17 19:17:06'),
(37, 4, 'Hapus Film', 'Menghapus film : Aquaman And The Lost Kingdom', '2025-03-17 19:17:40', '2025-03-17 19:17:40'),
(38, 4, 'Hapus Film', 'Menghapus film : aquaman', '2025-03-17 19:17:43', '2025-03-17 19:17:43'),
(39, 4, 'Hapus Film', 'Menghapus film : abc', '2025-03-17 19:17:48', '2025-03-17 19:17:48'),
(40, 4, 'Hapus Film', 'Menghapus film : APAYA', '2025-03-17 19:17:51', '2025-03-17 19:17:51'),
(41, 4, 'Tambah Film', 'Menambahkan film baru: Aquaman And The Lost Kingdom', '2025-03-17 19:19:16', '2025-03-17 19:19:16'),
(42, 4, 'Tambah Film', 'Menambahkan film baru: abc', '2025-03-17 19:19:48', '2025-03-17 19:19:48'),
(43, 4, 'Hapus Film', 'Menghapus film : abc', '2025-03-17 19:21:44', '2025-03-17 19:21:44'),
(44, 4, 'Hapus Film', 'Menghapus film : Aquaman And The Lost Kingdom', '2025-03-17 19:21:49', '2025-03-17 19:21:49'),
(45, 4, 'Tambah Film', 'Menambahkan film baru: Aquaman And The Lost Kingdom', '2025-03-17 19:22:16', '2025-03-17 19:22:16'),
(46, 4, 'Edit Film', 'Mengedit film : Aquaman And The Lost Kingdom', '2025-03-17 19:23:08', '2025-03-17 19:23:08'),
(47, 4, 'Hapus Film', 'Menghapus film : Aquaman And The Lost Kingdom', '2025-03-17 19:26:59', '2025-03-17 19:26:59'),
(48, 4, 'Tambah Film', 'Menambahkan film baru: Aquaman And The Lost Kingdom', '2025-03-17 19:27:23', '2025-03-17 19:27:23'),
(49, 4, 'Hapus Film', 'Menghapus film : Aquaman And The Lost Kingdom', '2025-03-17 19:27:35', '2025-03-17 19:27:35'),
(50, 4, 'Tambah Film', 'Menambahkan film baru: Aquaman And The Lost Kingdom', '2025-03-17 19:28:12', '2025-03-17 19:28:12'),
(51, 4, 'Edit Film', 'Mengedit film : Aquaman And The Lost Kingdom', '2025-03-17 19:28:40', '2025-03-17 19:28:40'),
(52, 4, 'Hapus Film', 'Menghapus film : Aquaman And The Lost Kingdom', '2025-03-17 19:28:48', '2025-03-17 19:28:48'),
(53, 4, 'Tambah Film', 'Menambahkan film baru: Aquaman And The Lost Kingdom', '2025-03-17 19:29:35', '2025-03-17 19:29:35'),
(54, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-17 19:31:14', '2025-03-17 19:31:14'),
(55, 1, 'Hapus Film', 'Menghapus film : Aquaman And The Lost Kingdom', '2025-03-17 19:37:08', '2025-03-17 19:37:08'),
(56, 4, 'Tambah Film', 'Menambahkan film baru: Aquaman And The Lost Kingdom', '2025-03-17 19:38:18', '2025-03-17 19:38:18'),
(57, 1, 'Hapus Film', 'Menghapus film : Aquaman And The Lost Kingdom', '2025-03-17 19:40:02', '2025-03-17 19:40:02'),
(58, 1, 'Hapus Film', 'Menghapus film : Godzilla: King Of Monster', '2025-03-17 19:40:08', '2025-03-17 19:40:08'),
(59, 1, 'Hapus Film', 'Menghapus film : Jumbo', '2025-03-17 19:40:13', '2025-03-17 19:40:13'),
(60, 1, 'Hapus Film', 'Menghapus film : Komang', '2025-03-17 19:40:16', '2025-03-17 19:40:16'),
(61, 1, 'Hapus Film', 'Menghapus film : Pantaskah Aku Berhijab', '2025-03-17 19:40:21', '2025-03-17 19:40:21'),
(62, 1, 'Hapus Film', 'Menghapus film : Petaka Gunung Gede', '2025-03-17 19:40:25', '2025-03-17 19:40:25'),
(63, 4, 'Tambah Film', 'Menambahkan film baru: Aquaman And The Lost Kingdom', '2025-03-17 19:41:26', '2025-03-17 19:41:26'),
(64, 4, 'Edit Film', 'Mengedit film : Aquaman And The Lost Kingdom', '2025-03-17 19:41:37', '2025-03-17 19:41:37'),
(65, 4, 'Edit Film', 'Mengedit film : Aquaman And The Lost Kingdom', '2025-03-17 19:41:38', '2025-03-17 19:41:38'),
(66, 4, 'Edit Film', 'Mengedit film : Aquaman And The Lost Kingdom', '2025-03-17 19:41:44', '2025-03-17 19:41:44'),
(67, 4, 'Tambah Film', 'Menambahkan film baru: Godzilla: King Of Monster', '2025-03-17 19:42:59', '2025-03-17 19:42:59'),
(68, 4, 'Tambah Film', 'Menambahkan film baru: Jumbo', '2025-03-17 19:44:49', '2025-03-17 19:44:49'),
(69, 4, 'Tambah Film', 'Menambahkan film baru: Komang', '2025-03-17 19:46:19', '2025-03-17 19:46:19'),
(70, 4, 'Tambah Film', 'Menambahkan film baru: Petaka Gunung Gede', '2025-03-17 19:48:46', '2025-03-17 19:48:46'),
(71, 4, 'Tambah Film', 'Menambahkan film baru: Pantaskah Aku Berhijab', '2025-03-17 19:50:24', '2025-03-17 19:50:24'),
(72, 4, 'Tambah Film', 'Menambahkan film baru: World War Z', '2025-03-17 20:12:40', '2025-03-17 20:12:40'),
(73, 1, 'Edit Film', 'Mengedit film : World War Z', '2025-03-17 20:53:58', '2025-03-17 20:53:58'),
(74, 1, 'Edit Film', 'Mengedit film : Jumbo', '2025-03-17 21:10:13', '2025-03-17 21:10:13'),
(75, 1, 'Tambah Film', 'Menambahkan film baru: Oppenhheimer', '2025-03-17 21:24:58', '2025-03-17 21:24:58'),
(76, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-17 23:21:03', '2025-03-17 23:21:03'),
(77, 1, 'Tambah Film', 'Menambahkan film baru: abc', '2025-03-17 23:33:46', '2025-03-17 23:33:46'),
(78, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-18 20:15:56', '2025-03-18 20:15:56'),
(79, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-18 20:55:44', '2025-03-18 20:55:44'),
(80, 1, 'Edit Film', 'Mengedit film : abc', '2025-03-18 20:57:30', '2025-03-18 20:57:30'),
(81, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-18 21:01:20', '2025-03-18 21:01:20'),
(82, 1, 'Tambah Film', 'Menambahkan film baru: APAYAwwww', '2025-03-18 21:47:43', '2025-03-18 21:47:43'),
(83, 1, 'Hapus Film', 'Menghapus film : APAYAwwww', '2025-03-18 21:48:21', '2025-03-18 21:48:21'),
(84, 1, 'Tambah Film', 'Menambahkan film baru: APAYA', '2025-03-18 21:48:48', '2025-03-18 21:48:48'),
(85, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-18 23:08:33', '2025-03-18 23:08:33'),
(86, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-18 23:09:21', '2025-03-18 23:09:21'),
(87, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-18 23:10:05', '2025-03-18 23:10:05'),
(88, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-18 23:11:29', '2025-03-18 23:11:29'),
(89, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-18 23:18:14', '2025-03-18 23:18:14'),
(90, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-18 23:18:47', '2025-03-18 23:18:47'),
(91, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-18 23:27:00', '2025-03-18 23:27:00'),
(92, 1, 'Hapus Film', 'Menghapus film : abc', '2025-03-18 23:31:33', '2025-03-18 23:31:33'),
(93, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-18 23:42:42', '2025-03-18 23:42:42'),
(94, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-19 05:12:01', '2025-03-19 05:12:01'),
(95, 1, 'Edit Film', 'Mengedit film : 2nd Mirracle In Cell Number 7', '2025-03-19 05:57:22', '2025-03-19 05:57:22'),
(96, 4, 'Edit Film', 'Mengedit film : Aquaman And The Lost Kingdom', '2025-03-19 18:03:10', '2025-03-19 18:03:10'),
(97, 1, 'Hapus Film', 'Menghapus film : APAYA', '2025-03-19 20:09:51', '2025-03-19 20:09:51'),
(98, 1, 'Tambah Film', 'Menambahkan film baru: APAYA', '2025-03-19 20:10:21', '2025-03-19 20:10:21'),
(99, 1, 'Hapus Film', 'Menghapus film : APAYA', '2025-03-19 20:38:45', '2025-03-19 20:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sinopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_negara` bigint UNSIGNED NOT NULL,
  `tahun_rilis` int NOT NULL,
  `cast` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` int NOT NULL,
  `banner_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `id_user`, `judul`, `slug`, `image`, `banner`, `sinopsis`, `trailer`, `id_negara`, `tahun_rilis`, `cast`, `age_category`, `durasi`, `banner_status`, `created_at`, `updated_at`) VALUES
(11, 1, '2nd Mirracle In Cell Number 7', '2nd-mirracle-in-cell-number-7', 'film_images/d0GsCjchQ3sOaITmsdpChvHZWz8UT9uWJOVK3JQx.jpg', 'film_banners/F39wH0gO32d9mlpt4gmvENLrQI0FZs0elLYpLNyp.png', 'Dua tahun setelah Ayah Dodo (Vino G Bastian) dihukum mati. Kartika (Graciella Abigail) tinggal bersama Hendro (Denny Sumargo) dan Linda (Agla Artalidia). Kartika masih diselundupkan untuk bertemu dengan para napi di sel no.7. Semua sepakat untuk merahasiakan kenyataan bahwa Ayah Dodo sudah meninggal. Ketika Hendro sepakat untuk mengadopsi Kartika. Kepala Dinas Sosial menghalangi hal tersebut terjadi. Para napi no.7 dan Hendro memutuskan untuk melawan dengan cara mereka untuk mendapatkan keadilan.', 'https://youtu.be/EnQntzbV62E?si=_TmX6a9tNfwi-5a5', 1, 2024, 'p', '7', 120, 0, '2025-03-17 18:20:18', '2025-03-19 20:47:53'),
(26, 4, 'Aquaman And The Lost Kingdom', 'aquaman-and-the-lost-kingdom', 'film_images/KM5sxFjLNv4Xp5DoOvTPSnRUEDcQ90tADYnRk6gy.jpg', 'film_banners/3FTdgkQ9r09TWeUXUi0HGxjeTmDPIgNBwInCfK6V.jpg', 'Cerita Aquaman 2 berlatar beberapa tahun usai peristiwa film pertama. Arthur Curry alias Aquaman (Jason Momoa) menjalani hidup baru setelah menjadi Raja Atlantis. Ia harus memimpin kerajaan bawah laut itu dengan berbagai aktivitas kerajaan, seperti hal-hal yang berhubungan dengan politik dan diplomasi.', NULL, 3, 2024, 'qqqqq', '0', 110, 1, '2025-03-17 19:41:26', '2025-03-19 20:55:32'),
(27, 4, 'Godzilla: King Of Monster', 'godzilla-king-of-monster', 'film_images/KU6OkXUR7kACMsiGtXGuhCn4YMEISiMlcj2xk6PO.jpg', 'film_banners/5017fanbnVPuT5zBiG0D65ZHu2VHPWlK7m6NEPcx.png', 'Kisah baru ini mengikuti upaya heroik agensi kripto zoologi Monarch ketika anggotanya berhadapan dengan monster seukuran dewa, termasuk Godzilla yang perkasa, yang harus berhadapan dengan Mothra, Rodan, dan musuh bebuyutannya, si kepala tiga King Ghidorah. Ketika super spesies purba iniyang sebelumnya hanya dianggap mitosbangkit kembali, mereka semua bersaing untuk supremasi, membuat keberadaan manusia tergantung dalam keseimbangan.', NULL, 3, 2014, 'a', '7', 130, 1, '2025-03-17 19:42:59', '2025-03-19 21:03:18'),
(28, 4, 'Jumbo', 'jumbo', 'film_images/3g8jmtyRVExPzxeuUklXBWGN3i4AP26YYdEspGNK.jpg', 'film_banners/BYMMPXlbxmODJ4BVD3hlH96b3TGVr5v6aKt2ZGnl.jpg', 'mengisahkan petualangan Don, seorang anak yang berkeinginan untuk mementaskan buku dongeng peninggalan Ayah dan Ibunya. Dalam perjalanannya, Don bertemu dengan berbagai karakter unik dan menghadapi berbagai tantangan.', NULL, 1, 2025, 'b', '0', 90, 0, '2025-03-17 19:44:49', '2025-03-19 20:51:16'),
(29, 4, 'Komang', 'komang', 'film_images/YRTfDnp4poQpL3jsvA4a3wR9Nya8wshBnE6dy3UM.jpg', NULL, 'Film Komang berpusat pada Ode seorang pemuda asal Buton yang memiliki impian besar dan hati yang tulus. Dia jatuh cinta kepada Ade seorang perantau dari Bali yang membawa kehangatan dan ketulusan dalam hidupnya. Pertemuan mereka di Sulawesi Tenggara menjadi awal dari kisah cinta yang penuh warna.', NULL, 1, 2025, 'aa', '13', 100, 0, '2025-03-17 19:46:19', '2025-03-19 17:30:45'),
(30, 4, 'Petaka Gunung Gede', 'petaka-gunung-gede', 'film_images/hDo0QNBv9Pb9xomtaaJOSXnz2Ulx7un0DwiDXwRP.jpg', NULL, 'Ketika semua orang menyalahkan Ita (Adzana Ashel) akibat melanggar mitos, Maya (Arla Ailani) tidak percaya. Apakah cuma karena hal itu sahabatnya harus menanggung akibat yang sangat mengenaskan? Ataukah ada hal lain yang Ita telah perbuat hingga ia harus menanggung siksa dan teror sedemikian kejamnya?', NULL, 1, 2024, 'an', '13', 100, 0, '2025-03-17 19:48:46', '2025-03-19 17:31:14'),
(31, 4, 'Pantaskah Aku Berhijab', 'pantaskah-aku-berhijab', 'film_images/NY9PnTCXC0hhsbKq1dUl4QqeQEytymskC13Cs41P.jpg', NULL, 'menceritakan perjalanan Sofi, seorang perempuan muda yang menghadapi berbagai tantangan hidup, termasuk percintaan yang toxic, kehamilan tak direncanakan, dan kehilangan figur ayah yang bertanggung jawab, serta perjuangannya untuk menemukan jati diri dan makna hidup melalui proses hijrah.', NULL, 1, 2024, 'aaaa', '17', 90, 0, '2025-03-17 19:50:24', '2025-03-19 17:31:05'),
(32, 4, 'World War Z', 'world-war-z', 'film_images/E75BZWztSjWVbEQtiNXg37aoK5tOqGPF5fzASauG.jpg', 'film_banners/E5tgx6iyepowwzqlqOm88dHCGd9P6NExK2XI1CFk.jpg', 'Ketika infeksi misterius melanda dunia dan mengubah manusia menjadi kawanan zombie, Gerry Lane, mantan penyelidik PBB, berpacu dengan waktu untuk menemukan sumber infeksi. Dunia di ambang kehancuran.', 'https://youtu.be/Md6Dvxdr0AQ?si=-_QSKfw8Y4Nuvf7v', 3, 2013, 'aswer', '13', 150, 1, '2025-03-17 20:12:40', '2025-03-19 20:58:52'),
(33, 1, 'Oppenhheimer', 'oppenhheimer', 'film_images/cpPW7YflCwzFz1b8IghKs4tUU9INBmzT4hD5OIms.jpg', 'film_banners/ZkvDieEua1J0SiQmujOkOwvbAUxS31fcyHHGBN2A.jpg', 'bercerita tentang kisah seorang fisikawan bernama J. Robert Oppehheimer yang menemukan bom atom. Dari trailernya terlihat bahwa Oppenheimer membayangkan rasa khawatir tentang masa depan yang dapat membuat semua orang takut terhadap penemuannya tersebut. Tetapi, kekhawatirannya tidak dapat dijelaskan dengan kata-kata sampai benar-benar terjadi.', NULL, 3, 2023, 'bbb', '13', 120, 0, '2025-03-17 21:24:58', '2025-03-19 20:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `film_genre`
--

CREATE TABLE `film_genre` (
  `id` bigint UNSIGNED NOT NULL,
  `film_id` bigint UNSIGNED NOT NULL,
  `genre_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film_genre`
--

INSERT INTO `film_genre` (`id`, `film_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(24, 11, 2, NULL, NULL),
(25, 11, 5, NULL, NULL),
(26, 11, 6, NULL, NULL),
(54, 26, 3, NULL, NULL),
(55, 26, 4, NULL, NULL),
(56, 26, 5, NULL, NULL),
(57, 27, 3, NULL, NULL),
(58, 27, 4, NULL, NULL),
(59, 27, 5, NULL, NULL),
(60, 28, 4, NULL, NULL),
(61, 29, 2, NULL, NULL),
(62, 29, 5, NULL, NULL),
(63, 29, 6, NULL, NULL),
(64, 29, 9, NULL, NULL),
(65, 30, 1, NULL, NULL),
(66, 30, 5, NULL, NULL),
(67, 30, 9, NULL, NULL),
(68, 31, 5, NULL, NULL),
(69, 31, 6, NULL, NULL),
(70, 31, 9, NULL, NULL),
(71, 32, 1, NULL, NULL),
(72, 32, 3, NULL, NULL),
(73, 28, 10, NULL, NULL),
(74, 33, 3, NULL, NULL),
(75, 33, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `nama_genre`, `created_at`, `updated_at`) VALUES
(1, 'Horror', '2025-03-17 04:48:01', '2025-03-17 21:17:19'),
(2, 'Comedy', '2025-03-17 04:48:05', '2025-03-17 04:48:05'),
(3, 'Action', '2025-03-17 15:32:18', '2025-03-17 15:32:18'),
(4, 'Fantasy', '2025-03-17 15:32:25', '2025-03-17 15:32:25'),
(5, 'Drama', '2025-03-17 15:34:40', '2025-03-17 15:34:40'),
(6, 'Family', '2025-03-17 15:34:49', '2025-03-17 15:34:49'),
(7, 'Music', '2025-03-17 15:35:05', '2025-03-17 15:35:05'),
(9, 'Romance', '2025-03-17 18:24:29', '2025-03-17 18:24:29'),
(10, 'Animasi', '2025-03-17 21:08:05', '2025-03-17 21:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint UNSIGNED NOT NULL,
  `isi_komentar` text COLLATE utf8mb4_unicode_ci,
  `rating` int DEFAULT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_film` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `isi_komentar`, `rating`, `id_user`, `id_film`, `parent_id`, `created_at`, `updated_at`) VALUES
(8, 'bagus', 5, 6, 32, NULL, '2025-03-18 19:06:49', '2025-03-18 19:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_12_040128_create_genre_table', 1),
(5, '2025_01_12_040154_create_negara_table', 1),
(6, '2025_01_12_040204_create_film_table', 1),
(7, '2025_01_12_125757_create_komentar_table', 1),
(8, '2025_02_12_020533_create_film_genre_table', 1),
(9, '2025_03_09_035122_create_activity_logs_table', 1),
(10, '2025_03_15_154816_create_watchlists_table', 1),
(11, '2025_03_18_062557_add_cast_to_film_table', 2),
(12, '2025_03_19_042757_add_banner_to_film_table', 3),
(13, '2025_03_19_043915_add_banner_to_film_table', 4),
(14, '2025_03_19_045240_add_banner_status_to_film_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_negara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id`, `nama_negara`, `created_at`, `updated_at`) VALUES
(1, 'Indonesia', '2025-03-17 04:48:10', '2025-03-17 04:48:10'),
(2, 'Malaysia', '2025-03-17 04:48:13', '2025-03-17 04:48:13'),
(3, 'Amerika Serikat', '2025-03-17 18:24:42', '2025-03-17 18:24:42'),
(5, 'Jepang', '2025-03-17 18:24:58', '2025-03-17 18:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6Il0KA17XWtKlH624xwkbYwUFKUWS2PNdczS6OBn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZGNLWGFRTUZYUTgyeW1TQ2g1Y1JrZDdlWUJvcWhJVkQ2RnpQR3hCYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9maWxtLnRlc3QvYWRtaW4va29tZW50YXJzIjt9czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovL2ZpbG0udGVzdC9hZG1pbi9maWxtcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1742449350);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','author','subscriber') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'subscriber',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `foto_profil`, `tanggal_lahir`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'aku admin', 'admin@gmail.com', 'profile_pictures/aHeVjWi93k6J2yOiRSWNfooQ7y6JLgv3KOhBNcNc.jpg', '2025-02-26', '$2y$12$vmg6BryyEGskPGfJAmTb7eBxlmqsN/frbhVy/r/cXYy4ou8vPZVeW', 'admin', '2025-03-17 04:47:42', '2025-03-17 20:59:13'),
(4, 'aku author', 'author@gmail.com', 'profile_pictures/WR8SQgxOJYC6paPC1jzy5OMRYZoPO2E3radwEa7P.jpg', '2025-02-26', '$2y$12$Or8n5xypVrJ1./hTmAKPluvwp46evquInTO8ZSehmHEGAkq0anxSe', 'author', '2025-03-17 15:42:39', '2025-03-17 23:06:50'),
(5, 'aku subscriber', 'user@gmail.com', 'profile_pictures/PL9tu0uAit8lOQeCZcLNOBHHHvVdgg71mDRI8yYH.jpg', '2006-06-30', '$2y$12$WXkqoYjgY9v8fhB69.XrBeM2DppN80PWrZG.7qsV.nPKUrEFVxvLC', 'subscriber', '2025-03-17 19:51:27', '2025-03-19 21:10:22'),
(6, 'kamu', 'rifaimuh760@gmail.com', 'profile_pictures/b94LdGmc17h5XNu63vXBeRR0SARQMLNu1WwmJqvF.jpg', '2007-02-22', '$2y$12$MVasrUGRfSLd/egEAoafSOY5h2up51HAcdRsBpWjUSoS6.H2sgz5K', 'subscriber', '2025-03-17 23:18:46', '2025-03-18 20:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `watchlists`
--

CREATE TABLE `watchlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `film_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_id_user_foreign` (`id_user`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `film_slug_unique` (`slug`),
  ADD KEY `film_id_user_foreign` (`id_user`),
  ADD KEY `film_id_negara_foreign` (`id_negara`);

--
-- Indexes for table `film_genre`
--
ALTER TABLE `film_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_genre_film_id_foreign` (`film_id`),
  ADD KEY `film_genre_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_id_user_foreign` (`id_user`),
  ADD KEY `komentar_id_film_foreign` (`id_film`),
  ADD KEY `komentar_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `watchlists`
--
ALTER TABLE `watchlists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `watchlists_user_id_film_id_unique` (`user_id`,`film_id`),
  ADD KEY `watchlists_film_id_foreign` (`film_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `film_genre`
--
ALTER TABLE `film_genre`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `watchlists`
--
ALTER TABLE `watchlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_id_negara_foreign` FOREIGN KEY (`id_negara`) REFERENCES `negara` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `film_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `film_genre`
--
ALTER TABLE `film_genre`
  ADD CONSTRAINT `film_genre_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `film_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_id_film_foreign` FOREIGN KEY (`id_film`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `komentar` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `watchlists`
--
ALTER TABLE `watchlists`
  ADD CONSTRAINT `watchlists_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watchlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
