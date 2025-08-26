-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for perpustakaan
CREATE DATABASE IF NOT EXISTS `perpustakaan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `perpustakaan`;

-- Dumping structure for table perpustakaan.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.books: ~15 rows (approximately)
INSERT INTO `books` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
	(3, 'Seporsi Mie Ayam Sebelum Mati', 'Brian Khrisna', 'Gramedia Widiasarana Indonesia', '2025', 9, 'buku/YaeALudMLNls0R0UYQ4PyInzDJx1Zl3zFjkkOTND.png', '2025-08-25 05:01:50', '2025-08-25 18:50:17'),
	(4, 'Sisi Tergelap Surga', 'Brian Khrisna', 'Gramedia Pustaka Utama', '2023', 81, 'buku/qimPBPYtdFpYCat2uHt0zD1fcOcx24bmxWDhUtTu.png', '2025-08-25 05:06:34', '2025-08-25 05:06:34'),
	(5, 'Laut Bercerita', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', '2017', 10, 'buku/m3qDIk3QRRjIBENkBMSVhLHEcceRkYUvPzanRXIX.png', '2025-08-25 05:08:50', '2025-08-25 18:52:33'),
	(6, 'Cantik Itu Luka', 'Eka Kurniawan', 'Gramedia Pustaka Utama', '2018', 12, 'buku/eruZHVIzkjtn1SpuAdXmLcwn2qKYCTroiww9quEi.png', '2025-08-25 05:11:18', '2025-08-25 17:17:01'),
	(7, 'Ragna Crimson Vol. 15', 'Daiki Kobayashi', 'm&c!', '2025', 0, 'buku/GVmx8SVvO3cFxc5WumuAhNMOmadj8T2lZ5G6DlQf.jpg', '2025-08-25 05:13:59', '2025-08-25 18:50:51'),
	(10, 'Alya Sometimes Hides Her Feelings in Russian Vol. 6', 'sunsunsun', 'Phoenix Gramedia Indonesia', '2025', 7, 'buku/NzwpRhEhio391ke0yMf3xmkt9NS8uF2SZVCWQqU8.png', '2025-08-25 07:50:22', '2025-08-25 07:50:22'),
	(11, 'Mushoku Tensei – Jobless Reincarnation Vol. 03', 'Rifujin Na Magonote', 'Phoenix Gramedia Indonesia', '2025', 9, 'buku/VEs9YzhH1Im5kXlmWDCkPGBEPYXxdYjxIINSL1AH.jpg', '2025-08-25 07:52:33', '2025-08-25 17:16:44'),
	(12, 'The Alchemist', 'Paulo Coelho', 'Gramedia Pustaka Utama', '2021', 18, 'buku/CaMX6vClxBp1YFCMHh685NCHe2Y9E3uSBWv0SUzQ.jpg', '2025-08-25 07:54:22', '2025-08-25 18:50:25'),
	(13, 'Ronggeng Dukuh Paruk', 'Ahmad Tohari', 'Gramedia Pustaka Utama', '2025', 2, 'buku/XZZosQ2WGZXR5GUSGiOugGrKCLP31LUt2K2qKoca.jpg', '2025-08-25 17:13:12', '2025-08-25 17:13:12'),
	(14, 'Moriarty the Patriot Vol. 19', 'Miyoshi Hikaru', 'Elex Media Komputindo', '2025', 11, 'buku/1gTBfC0gfthznWJvjUNQLRuyVwR587Lm6WxoQye5.png', '2025-08-25 17:17:38', '2025-08-25 18:50:42'),
	(15, 'Mieruko-Chan : The Girl That Sees 05', 'Tomoki Izumi', 'm&c!', '2025', 2, 'buku/Qits0M95YFpwOGcLoDX3vnR1k7o5PkNeLuqrZnNX.jpg', '2025-08-25 17:19:21', '2025-08-25 18:50:31'),
	(16, 'Pulang', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', '2023', 1, 'buku/QY7X4Z2L7hyH1Rv5g0aYQMHC5aLkHA9JskGWAhfe.jpg', '2025-08-25 17:21:51', '2025-08-25 17:21:51'),
	(17, 'Namaku Alam', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', '2023', 5, 'buku/xEbJCqkZS1zDXccjYaoGIBBC0Z1L7WRi2DYS3CEQ.png', '2025-08-25 17:22:46', '2025-08-25 17:22:46'),
	(18, 'Malam Terakhir', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', '2018', 3, 'buku/gvHFJldDRUqybTyahAExNaAfbWBKmOga4MfxGy4w.jpg', '2025-08-25 17:23:46', '2025-08-25 17:23:46'),
	(19, 'Seakan Bisa Dipisahkan', 'Ruhaeni Intan', 'Kepustakaan Populer Gramedia', '2025', 1, NULL, '2025-08-25 18:14:34', '2025-08-25 18:14:34');

-- Dumping structure for table perpustakaan.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.cache: ~6 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-daffa@daffa.com|127.0.0.1', 'i:1;', 1756169788),
	('laravel-cache-daffa@daffa.com|127.0.0.1:timer', 'i:1756169788;', 1756169788),
	('laravel-cache-daffa@example.com|127.0.0.1', 'i:1;', 1756123139),
	('laravel-cache-daffa@example.com|127.0.0.1:timer', 'i:1756123139;', 1756123139),
	('laravel-cache-daffa1@gmail.com|127.0.0.1', 'i:2;', 1756116757),
	('laravel-cache-daffa1@gmail.com|127.0.0.1:timer', 'i:1756116757;', 1756116757);

-- Dumping structure for table perpustakaan.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.cache_locks: ~0 rows (approximately)

-- Dumping structure for table perpustakaan.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table perpustakaan.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.jobs: ~0 rows (approximately)

-- Dumping structure for table perpustakaan.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.job_batches: ~0 rows (approximately)

-- Dumping structure for table perpustakaan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.migrations: ~6 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_08_25_050228_add_role_to_users_table', 2),
	(5, '2025_08_25_050337_create_books_table', 2),
	(6, '2025_08_25_050525_create_peminjamen_table', 2),
	(7, '2025_08_25_083910_add_gambar_to_books_table', 3);

-- Dumping structure for table perpustakaan.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table perpustakaan.peminjamans
CREATE TABLE IF NOT EXISTS `peminjamans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `book_id` bigint(20) unsigned NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'dipinjam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjamans_user_id_foreign` (`user_id`),
  KEY `peminjamans_book_id_foreign` (`book_id`),
  CONSTRAINT `peminjamans_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `peminjamans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.peminjamans: ~14 rows (approximately)
INSERT INTO `peminjamans` (`id`, `user_id`, `book_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `created_at`, `updated_at`) VALUES
	(2, 1, 3, '2025-08-25', '2025-08-25', 'dikembalikan', '2025-08-25 05:15:41', '2025-08-25 05:16:20'),
	(3, 1, 7, '2025-08-25', '2025-08-25', 'dikembalikan', '2025-08-25 05:15:46', '2025-08-25 05:16:15'),
	(4, 1, 7, '2025-08-25', '2025-08-25', 'dikembalikan', '2025-08-25 05:15:52', '2025-08-25 05:16:12'),
	(5, 1, 7, '2025-08-25', '2025-08-25', 'dikembalikan', '2025-08-25 05:15:56', '2025-08-25 05:16:08'),
	(6, 1, 15, '2025-08-26', '2025-08-26', 'dikembalikan', '2025-08-25 17:48:30', '2025-08-25 17:48:39'),
	(8, 2, 5, '2025-08-26', '2025-08-26', 'dikembalikan', '2025-08-25 17:55:51', '2025-08-25 17:58:21'),
	(9, 1, 3, '2025-08-26', '2025-08-26', 'dikembalikan', '2025-08-25 18:03:16', '2025-08-25 18:03:21'),
	(10, 2, 3, '2025-08-26', NULL, 'dipinjam', '2025-08-25 18:50:17', '2025-08-25 18:50:17'),
	(11, 2, 12, '2025-08-26', NULL, 'dipinjam', '2025-08-25 18:50:25', '2025-08-25 18:50:25'),
	(12, 2, 15, '2025-08-26', NULL, 'dipinjam', '2025-08-25 18:50:31', '2025-08-25 18:50:31'),
	(13, 2, 14, '2025-08-26', NULL, 'dipinjam', '2025-08-25 18:50:42', '2025-08-25 18:50:42'),
	(14, 2, 7, '2025-08-26', NULL, 'dipinjam', '2025-08-25 18:50:51', '2025-08-25 18:50:51'),
	(15, 2, 5, '2025-08-26', NULL, 'dipinjam', '2025-08-25 18:51:01', '2025-08-25 18:51:01'),
	(16, 2, 5, '2025-08-26', '2025-08-26', 'dikembalikan', '2025-08-25 18:51:10', '2025-08-25 18:52:33');

-- Dumping structure for table perpustakaan.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('dh73rQAyVWzH7rKfDxWiDS68pVRyXYloTvnN39W0', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWlpGdUdBU1JyVkFvYW1kU0ZldlgxSE5PU21zbkV4bmxaRUZ0dm12eiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1756172969),
	('ekJfmWjjCc4Bp9rKXAooRWlCLSbLOBGh0k6VGkCi', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 Edg/139.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSTZsWElxT0hOcUdoTklUaWRUT1VwY0pkd1BkZ2l0clZ2Vnhmcm1neiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1756173157);

-- Dumping structure for table perpustakaan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin Daffa Aditya', 'admin@gmail.com', NULL, '$2y$12$kmDERk6Z1ZK418tvlk8HFuGuXG0HK0EJldcJ6LuN9s08oW0Qp8Fh.', 'admin', NULL, '2025-08-24 23:07:08', '2025-08-25 18:52:13'),
	(2, 'Daffa Aditya Purwanto', 'daffa@gmail.com', NULL, '$2y$12$9sPKgx7xXv0X7bi.0I92Mevla30OdhcgmlpAZT3xiR19/XjrtQgRq', 'user', NULL, '2025-08-25 04:42:08', '2025-08-25 18:00:04');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
