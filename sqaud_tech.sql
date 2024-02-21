-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table sqaud_tech.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `product_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table sqaud_tech.product: ~0 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `product_name`, `slug`, `product_description`) VALUES
	(1, 'test', 'teee', ' hello this test description'),
	(3, 'sdsdsadsadasdsadasdasdas', 'dasdasdasdasdsdsadsa', 'sadsdasdasdasdasdasdas'),
	(4, 'dsdsadasdasdas', 'sdasdasdasd', ' sadasdasdasdasdas'),
	(5, 'dsdsadsad', 'eeee', ' asdsadasdasd'),
	(6, 'dsdsadasdasdas', 'sdasdasdasd', ' sadasdasdasdasdas'),
	(7, 'dsdsadasdasdas', 'sdasdasdasd', ' sadasdasdasdasdas'),
	(8, 'rajat', 'rfajwww', '    sdsdasdasdasdasdasdasd'),
	(9, 'rajdsadasdasdasd', 'sdsdsadsdas', ' dsadasdasdasdasdas'),
	(10, 'ssdsadasd', 'saddsdsd', ' sdsdsdsdsads'),
	(11, 'rest', 'tesr', 'asasaSAsaSAsa');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table sqaud_tech.product_image
CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `image_url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table sqaud_tech.product_image: ~0 rows (approximately)
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
INSERT INTO `product_image` (`id`, `product_id`, `image_url`, `created_at`, `update_at`) VALUES
	(1, 8, '366906071-pharmision-intro-banner-v2-_-white-_-mobile.png', '2024-02-22 03:03:52', '2024-02-22 03:03:52'),
	(2, 8, 'SRE_logo6.png', '2024-02-22 03:03:52', '2024-02-22 03:03:52'),
	(3, 9, '366906062-pharmision-intro-banner-v2-_-white-_-desktop1.png', '2024-02-22 03:14:18', '2024-02-22 03:14:18'),
	(4, 9, 'SRE_logo5.png', '2024-02-22 03:14:18', '2024-02-22 03:14:18'),
	(5, 10, '366906062-pharmision-intro-banner-v2-_-white-_-desktop2.png', '2024-02-22 03:14:54', '2024-02-22 03:14:54'),
	(6, 10, '366906071-pharmision-intro-banner-v2-_-white-_-mobile1.png', '2024-02-22 03:14:54', '2024-02-22 03:14:54'),
	(7, 11, '366906015-seed-company-case-study-banner-_-white-_-mobile.png', '2024-02-22 03:16:12', '2024-02-22 03:16:12'),
	(8, 11, '366906029-seed-company-case-study-banner-_-white-_-desktop.png', '2024-02-22 03:16:12', '2024-02-22 03:16:12');
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;

-- Dumping structure for table sqaud_tech.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(150) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sqaud_tech.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `FirstName`, `LastName`, `Email`, `Password`, `created_at`) VALUES
	(1, 'rajat', 'ahuja', 'rajatahuja2022@gmail.com', '12345678', '2024-02-21 22:03:56'),
	(2, 'rajat1', 'ahuja', 'rajatahuja143@gmail.com', '12345678', '2024-02-21 22:14:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
